// Copyright 2002-2003.  Adobe Systems, Incorporated.  All rights reserved.
// Set the active layer to the last art layer of the active document, or the
// first if the last is already active.
   
function getLayerSetsIndex()
{
       function getNumberLayers()
       {
           var ref = new ActionReference();
           ref.putProperty( charIDToTypeID("Prpr") , charIDToTypeID("NmbL") )
           ref.putEnumerated( charIDToTypeID("Dcmn"), charIDToTypeID("Ordn"), charIDToTypeID("Trgt") );
           return executeActionGet(ref).getInteger(charIDToTypeID("NmbL"));
       }
       function hasBackground() 
       {
           var ref = new ActionReference();
           ref.putProperty( charIDToTypeID("Prpr"), charIDToTypeID( "Bckg" ));
           ref.putEnumerated(charIDToTypeID( "Lyr " ),charIDToTypeID( "Ordn" ),charIDToTypeID( "Back" ))//bottom Layer/background
           var desc =  executeActionGet(ref);
           var res = desc.getBoolean(charIDToTypeID( "Bckg" ));
           return res   
        };
       function getLayerType(idx,prop) 
       {       
           var ref = new ActionReference();
           ref.putIndex(charIDToTypeID( "Lyr " ), idx);
           var desc =  executeActionGet(ref);
           var type = desc.getEnumerationValue(prop);
           var res = typeIDToStringID(type);
           return res   
        };
        
       var cnt = getNumberLayers()+1;
       var res = new Array();
        if(hasBackground())
        {
             var i = 0;
        }
        else
        {
             var i = 1;
        };
        
       var prop =  stringIDToTypeID("layerSection")
       for(i;i<cnt;i++)
       {
          var temp = getLayerType(i,prop);
          if(temp == "layerSectionStart" || temp == "layerSectionContent") 
            res.push(i);
       };
       return res;
    };

    function makeActiveByIndex( idx, visible )
    {
       var desc = new ActionDescriptor();
       var ref = new ActionReference();
       ref.putIndex(charIDToTypeID( "Lyr " ), idx)
       desc.putReference( charIDToTypeID( "null" ), ref );
       desc.putBoolean( charIDToTypeID( "MkVs" ), visible );
       executeAction( charIDToTypeID( "slct" ), desc, DialogModes.NO );
    };
    
    function getLayerBoundsByIndex( idx ) 
    {
        var ref = new ActionReference();        
        ref.putProperty( charIDToTypeID("Prpr") , stringIDToTypeID( "bounds" ));
        ref.putIndex( charIDToTypeID( "Lyr " ), idx );
        var desc = executeActionGet(ref).getObjectValue(stringIDToTypeID( "bounds" ));
        var bounds = [];// array of Numbers as pixels regardless of ruler
        bounds.push(desc.getUnitDoubleValue(stringIDToTypeID('left')));
        bounds.push(desc.getUnitDoubleValue(stringIDToTypeID('top')));  
        bounds.push(desc.getUnitDoubleValue(stringIDToTypeID('width')));      
        bounds.push(desc.getUnitDoubleValue(stringIDToTypeID('height')));        
        return bounds;
    }
    
    function getLayerNameByIndex(idx)
    {
        var ref = new ActionReference();
        ref.putProperty( charIDToTypeID("Prpr") , stringIDToTypeID( "name" ));
        ref.putIndex( charIDToTypeID( "Lyr " ), idx );
        var name = executeActionGet(ref).getString(stringIDToTypeID( "name" ));
        return name;
    }
    
       


function StringBuffer()   
{   
    this._strings = [];   
    if(arguments.length==1)   
    {   
         this._strings.push(arguments[0]);   
    }   
}   
   
StringBuffer.prototype.Append = function(str)   
{       
     this._strings.push(str);   
     return this;   
 }   
  
 StringBuffer.prototype.ToString = function()   
 {   
     return this._strings.join("");   
 }   

var docRef = app.activeDocument;

var saveRef = File.saveDialog( "Save as","Text Files:*.imageset");
var savename = saveRef.name;
savename = savename.replace(/.imageset/, "")
if (saveRef)
{
  saveRef.open("w");
    
   var groups = getLayerSetsIndex();

    var strCotent = new StringBuffer()
    strCotent.Append("<?xml version= "+'"'+'1.0' +'"' +"?>");
    strCotent.Append("\n");
    strCotent.Append("<Imageset Name=");
    strCotent.Append('"'+savename+'"');
    strCotent.Append(" Imagefile=");
    strCotent.Append('"'+savename+'.png"');
    strCotent.Append(">\n")

    //for(var i = 0; i < groups.length; ++i)        
    for(var i = groups.length -1; i >= 0; --i)
    {      
       makeActiveByIndex( groups[i], true );
       
       var activelayer = app.activeDocument.activeLayer
                                    
        var  _layername = "" + activelayer
        var layertype = _layername.substr(1, 8)
                
        layername = getLayerNameByIndex(groups[i])   
        
        if (layertype == "ArtLayer")
        {
             var bound = getLayerBoundsByIndex(groups[i])
                
            var left = new RegExp("Left");
			var right = new RegExp("Right");
			var top = new RegExp("Top");
			var end = new RegExp("End");
			var middle = new RegExp("Middle");
			var middleCross = new RegExp("MiddleCross");
			var middleVertical = new RegExp("MiddleVertical");
			var center = new RegExp("Center");
			var leftMiddle = new RegExp("LeftMiddle");
			var rightMiddle = new RegExp("RightMiddle");
			var topMiddle = new RegExp("TopMiddle");
			var endMiddle = new RegExp("EndMiddle");
			
			var boundrect1 = parseInt(bound[0])
            var boundrect2 = parseInt(bound[1])
            var boundrect3 = parseInt(bound[2])
            var boundrect4 = parseInt(bound[3])
			
			/* if(right.test(layername) || topMiddle.test(layername) || endMiddle.test(layername) || center.test(layername) || middleCross.test(layername))
			{
				boundrect1 += 1;
			}
			if(leftMiddle.test(layername) || rightMiddle.test(layername) || end.test(layername) || center.test(layername) || middleVertical.test(layername))
			{
				boundrect2 += 1;
			}
			if(left.test(layername) || right.test(layername) || center.test(layername) || middleCross.test(layername) || topMiddle.test(layername) || endMiddle.test(layername))
			{
				boundrect3 -= 1;
			}
			if(top.test(layername) || end.test(layername) || center.test(layername) || middleVertical.test(layername) || leftMiddle.test(layername) || rightMiddle.test(layername))
			{
				boundrect4 -= 1;
			}
			if(topMiddle.test(layername) || endMiddle.test(layername) || center.test(layername) || middleCross.test(layername))
			{
				boundrect3 -= 1;
			}
			if(leftMiddle.test(layername) || rightMiddle.test(layername) || center.test(layername) || middleVertical.test(layername))
			{
				boundrect4 -= 1;
			} */
			
			strCotent.Append("\t<Image Name="+ '"'+ layername + '"');
			strCotent.Append(' XPos="' + boundrect1+ '"');
			strCotent.Append(' YPos="'+ boundrect2+ '"');
			
			strCotent.Append(' Width="' + boundrect3+ '"');
			strCotent.Append(' Height="' + boundrect4+ '"');
			
            strCotent.Append('/>\n');
            //var StringTemp = "Image" + '\t' + layername            
            //strCotent.Append(StringTemp)            
        }        
    }
    strCotent.Append('</Imageset>');
    saveRef.write(strCotent.ToString())         
}

saveRef.close();
alert("导出完成！");
docRef = null;