// JavaScript Document
function getQueryParamValue(p){
var url= document.URL.toString();
var tmpStr=p+"=";
var tmp_reg=eval("/[\?&]"+tmpStr+"/i");
if(url.search(tmp_reg)==-1)return null;
else{
    var a=url.split(/[\?&]/);
    for(var i=0;i<a.length;i++)
         if(a[i].search(eval("/^"+tmpStr+"/i"))!=-1)return a[i].substring(tmpStr.length);
}
}

function getParams()
{
	var params = new Object();
	var query = document.location.search.substr(1);
	var pairs = query.split("&");
	for ( var i=0; i<pairs.length; i++ )
	{
		var index = pairs[i].indexOf("=");
		if ( index <= 0 )
		{
			continue;
		}
		var paramName = pairs[i].substr(0, index);
		var paramValue = pairs[i].substr(index + 1);
		params[paramName] = paramValue;
	}
	return params;
}

function addBookmark(title,url) 
{
	if (window.sidebar) 
	{
		window.sidebar.addPanel(title, url,"");
	}
	else if( document.all ) 
	{
		top.external.AddFavorite( url, title);
	}
	else if( window.opera && window.print )
	{
		return true;
	}
}