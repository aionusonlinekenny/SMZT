// JavaScript Document
var t = n = 0, count;
  count=$("#ost_banner_list a").length;
  $("#ost_banner_list a:not(:first-child)").hide();
  $("#ost_banner li").click(function() {
  var i = $(this).text() - 1;
  n = i;
  if (i >= count) return;
  $("#ost_banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
  document.getElementById("ost_banner").style.background="";
  $(this).toggleClass("on");
  $(this).siblings().removeAttr("class");
  });
  t = setInterval("showAuto()", 8000);
  $("#ost_banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 8000);});
  function showAuto(){
	  n = n >=(count - 1) ? 0 : ++n;
	  $("#ost_banner li").eq(n).trigger('click');
  }
  
  function addFavoritePlatform(){
    var w = window;
    var d = document;
    var t = '逍遥游戏';
    var u = 'http://www.xy.com';
    if(w.sidebar){
		w.sidebar.addPanel(t,u,'');
    }else if(d.all){
		w.external.AddFavorite(u,t);
    }else{
		alert('请按 Ctrl + D 进行操作！');
    }
}