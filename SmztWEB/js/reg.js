var popBox = {
		id: 'success',
		cssName: 'popbox',
		eltWidth: function(){var w=$("#popup_container").outerWidth();return w;},
		eltHeight: function(){var h=$("#popup_container").outerHeight();return h;},
		scTop:50,
        _maintainPosition: function(){$(window).unbind("resize", _reposition);},
		_reposition: function(){
			var c = parseInt((($(window).height() / 2) - (popBox.eltHeight() / 2)));
			var b = parseInt((($(window).width() / 2) - (popBox.eltWidth() / 2)));
			if (c < 0) {c = 0}
			if (b < 0) {b = 0}
			if ($.browser.msie && parseInt($.browser.version) <= 6) {
				c = c + $(window).scrollTop()
			}
			$("#popup_container").css({
				top: c + "px",
				left: b + "px"
			});
			$("#popup_overlay").height($(document).height())
		},
		_show: function(a){
				popBox._hide();
				var temp=new String;
				if($.browser.safari || ($.browser.version == '6.0')){
					temp='<div id="popup_overlay" style="height:'+$(document).height()+'px"><iframe style="position:absolute;width:100%;height:100%;_filter:alpha(opacity=0);opacity=0;border-style:none;" src="javascript:false;" scrolling="no" frameborder="0" ></iframe></div>';
				}else{
					temp='<div id="popup_overlay" style="height:'+$(document).height()+'px"></div>';
				}
				
				temp+='<div id="popup_container" class=""><span class="btn close" onclick="popBox._hide()">关闭</span>';
				temp+='<div class="contents"></div>';
				temp+='</div>';
				$("body").append(temp);
				if(typeof(a)!=="undefined"){
					$("#popup_container").addClass(a)
				}else{
					$("#popup_container").addClass(popBox.cssName)				
				}
				var i = ($.browser.msie && parseInt($.browser.version) <= 6) ? "absolute": "fixed";
				$("#popup_overlay").css({position: 'absolute', top: "0px", left: "0px", zIndex: 998, opacity:0.5}).fadeIn("fast");
				$("#popup_container").css({position: i,zIndex: 999}).fadeIn("fast");
				popBox._reposition();
				$(window).bind("resize", popBox._reposition);
		},
        _hide: function() {
			$("#popup_container").removeClass();
            $("#popup_container,#popup_overlay").fadeOut().remove();
        },
		infosucc: function(ikey) {
			switch(ikey){
				case "infoA":
					var list='<div class="popbox_tit">游戏帐号注册</div><form id="reg_form" method="post" action="/do.php?do=regok"><div class="pop_form mt10"><ul><li><div class="t_l">帐 号：</div><div class="t_r"><input id="popUsernameRegInput" type="text" class="inputText" value="" name="user_name"></div><p id="popUsernameTips" class="tip eorr"><i class="pop-ico pop-ico-01"></i>请输入4-20位数字或英文</p></li><li><div class="t_l">密 码：</div><div class="t_r"><input id="popPasswordRegInput" type="password" class="inputText" value="" name="password"></div><p id="popPasswdTips" class="tip pass"><i class="pop-ico pop-ico-01"></i>请输入6-20位数字或英文</p></li><li><div class="t_l">重复密码：</div><div class="t_r"><input type="password" id="popPassword2RegInput" class="inputText" value="" name="password_retype"></div><p id="popRepasswdTips" class="tip"><i class="pop-ico pop-ico-01"></i>请输入6-20位数字或英文</p></li><li></ul><p class="popbox_footer"><a class="rl_bg regist_btn textpng" id="popRegister">立即注册</a></p></form></div>';
					var cssNames='popbox popbox-2';
					popBox._show(cssNames);
					$("#popup_container .contents").append(list);
					function checkRepasswd(){
							var passwd 		= $("#popPasswordRegInput").val();
							var repasswd 	= $("#popPassword2RegInput").val();
							if(passwd != repasswd){
								$("#popRepasswdTips").html('<i class="pop-ico pop-ico-02"></i>两次密码不一致');
							}else{
								$("#popRepasswdTips").html('<i class="pop-ico pop-ico-03"></i>输入正确');
							}
					}
					$(function(){
						$("#popUsernameRegInput").live('blur',function(){
							if(!XYUser.checkUsername($("#popUsernameRegInput").val())){
								$("#popUsernameTips").html('<i class="pop-ico pop-ico-02"></i>用户名不合法');
							}else{
								$("#popUsernameTips").html('<i class="pop-ico pop-ico-03"></i>输入正确');
							}
						});
						$("#popPasswordRegInput").live('blur',function(){
							if(!XYUser.checkPassword($("#popPasswordRegInput").val())){
								$("#popPasswdTips").html('<i class="pop-ico pop-ico-02"></i>密码不合法');
							}else{
								$("#popPasswdTips").html('<i class="pop-ico pop-ico-03"></i>输入正确');
							}
							checkRepasswd();
						});
						$("#popPassword2RegInput").live('blur',function(){
							checkRepasswd();
						});
						
					})
					$("#popup_container input").keypress(function(e){
						if(e.keyCode == 13){
							popRegister();
						}
					});
					break;	
				case "infoB":
					var list='<div class="popbox_tit">XY平台通行证</div><div class="pop_tab"><ul><li class="act">登录</li><li>用户注册</li></ul></div><div class="pop_form mt20" ><ul class="mt10"><li><div class="t_l">帐 号：</div><div class="t_r"><input type="text" id="" class="inputText" value="" /></div></li><li><div class="t_l">密 码：</div><div class="t_r"><input type="password" id="" class="inputText" value="" /></div></li></ul><p class="popbox_footer  mt20"><a class="login_btn rl_bg textpng" >立即登录</a></p></div><div  class="pop_form hide" ><ul><li><div class="t_l">帐 号：</div><div class="t_r"><input type="text" id="" class="inputText" value="" /></div></li><li><div class="t_l">密 码：</div><div class="t_r"><input type="password" id="" class="inputText" value="" /></div></li><li><div class="t_l">重复密码：</div><div class="t_r"><input type="password" id="" class="inputText" value="" /></div></li></ul><p class="popbox_footer mt10"><a class="rl_bg  regist_btn textpng" >立即注册</a></p></div>';
					popBox._show();
					$("#popup_container .contents").append(list);
					$(".pop_tab li").click(function(){
						var num = $(this).index(".pop_tab li");
						$(this).addClass("act").siblings("li").removeClass("act");
						$(".pop_form").hide().eq(num).show();
					})
					break;	
			}			
		}
}