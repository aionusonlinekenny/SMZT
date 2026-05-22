<?php
  include_once "./core/config.php";?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>神魔诛天官网_稀有独家_长久稳定网页游戏</title>
    <meta name="keywords" content="神魔诛天官网_稀有独家_长久稳定网页游戏">
    <meta name="description" content="神魔诛天官网_稀有独家_长久稳定网页游戏，让玩家第一时间得到最新开服信息活动与奖励。">
    <link rel="stylesheet" type="text/css" href="./images/colorbox.css">
    <link rel="stylesheet" type="text/css" href="./images/style.css">
    <script src="./images/jquery-1.8.3.min.js" language="javascript" type="text/javascript"></script>
    <style>
        #indulge{display: none}
    </style>
</head>
<body>
<style type="text/css">
/* CSS Document */
*{margin:0; padding:0;}
a{text-decoration:none; outline:none;}
img{border:none;}
li{list-style:none;}
.clear{float:none; clear:both;}


/*顶通样式开始*/
.g_top{background:url(https://static.xyimg.net/cn/static/gametop/top_bg.jpg) repeat-x; height:38px;}
.g_top_main{width:1000px; height:38px; margin:0 auto; position:relative; z-index:999;}

.g_top_logo{width:138px; height:38px; position:absolute; top:0; left:0; z-index:10;}

.g_top_sbanner{width:360px; height:38px; position:absolute; top:0; left:200px; cursor:pointer;}
.g_top_banner{width:1000px; height:188px; position:absolute; top:0; left:0; display:none;}
.g_top_banner img{width:100%; height:100%;}

.g_top_log{width:286px; position:absolute; top:0; right:155px; z-index:10;}
.g_top_unlog{text-align:right; font:12px/38px SimSun;}
.g_top_unlog a{color:#818080; margin:0 3px;}
.use_name, .vip_leve, .g_top_msg, .quit{float:right; display:block; height:38px; font:12px/38px SimSun; color:#818080; margin-right:15px;}
.use_name{width:90px; text-align:right;}
.vip_leve{background:url(https://static.xyimg.net/cn/static/gametop/top_icon.png?v=2016032401) no-repeat; width:47px; height:14px; margin-top:11px;}
.vip_leve0{background-position:0 -168px;}
.vip_leve1{background-position:0 -188px;}
.vip_leve2{background-position:0 -208px;}
.vip_leve3{background-position:0 -228px;}
.vip_leve4{background-position:0 -248px;}
.vip_leve5{background-position:0 -268px;}
.vip_leve6{background-position:0 -288px;}
.vip_leve7{background-position:0 -308px;}
.vip_leve8{background-position:0 -328px;}

.g_top_msg{position:relative;}
.use_msg{height:21px; line-height:21px; display:block; color:#818080; margin-top:8px; padding-right:27px; background:url(https://static.xyimg.net/cn/static/gametop/top_icon.png?v=2016032401) no-repeat; background-position:27px 5px;}
.use_msg_has{background-position:27px -17px;}

.top_msg_li{width:358px; background:#fff; border:1px solid #d9d9d9; box-shadow:0 1px 2px #e7e7e7; position:absolute; top:38px; left:-150px; font-size:12px; line-height:20px; color:#777373; display:none;}
.top_msg_li dt{line-height:43px; text-align:center;  padding:0 10px;}
.top_msg_li dt span{color:#ff7200;}
.top_msg_li dd{padding:8px 0; border-top:1px solid #ebebeb;  margin:0 10px;}
.top_msg_li dd div{font-weight:bold; color:#626262; margin-bottom:5px;}
.top_msg_li dd div p{float:left; display:inline; width:200px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
.top_msg_li dd div span{float:right; display:inline;}
.top_msg_li dd p a{color:#ff7200;}
.top_msg_li dd.g_top_more{height:34px; padding:0; text-align:center; line-height:34px; background:#f2f2f2; margin:10px 0 0; border:none;}
.top_msg_li dd.g_top_more a{color:#898888; display:block;}

.game_all{height:38px; width:85px; font:12px SimSun; color:#818080; position:absolute; top:0; right:60px; z-index:10;}
.game_all_btn{background:url(https://static.xyimg.net/cn/static/gametop/top_icon.png?v=2016032401) no-repeat; background-position:0 -37px; padding-left:21px; cursor:pointer; line-height:38px;}
.game_all_btn:hover{background-position:0 -343px;}
.game_all_btn span{background:url(https://static.xyimg.net/cn/static/gametop/top_icon.png?v=2016032401) no-repeat; background-position:46px -80px; padding-right:13px;}
.game_all_list{width:508px; height:232px; background:#fff; border:1px solid #d9d9d9; box-shadow:0 1px 2px #e7e7e7; position:absolute; top:38px; right:-60px; display:none;}
.game_all_img{width:170px; height:230px; float:left; display:inline; margin:1px 0 0 1px; overflow:hidden;}
.game_all_img ul li{display:none; width:170px; height:230px;}
.game_all_img img{width:100%; height:100%;}
.game_all_name{width:330px; float:left; display:inline;}
.game_all_til{font-weight:bold; line-height:40px; text-align:center; color:#626262;}
.game_all_name ul li{float:left; display:inline; width:80px; padding-left:20px; margin-left:10px; line-height:33px; position:relative;}
.game_all_name ul li a{color:#7e7e7e; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis;}
.game_all_h, .game_all_n{background:url(https://static.xyimg.net/cn/static/gametop/top_icon.png?v=2016032401) no-repeat; position:absolute; top:12px; left:5px; width:10px; height:10px; display:block;}
.game_all_h{background-position:-6px -144px;}
.game_all_n{background-position:-6px -114px;}

.g_top_recharge{font:12px/38px SimSun; color:#f26549; position:absolute; top:0; right:10px; z-index:10;}
.game_all_name ul{height:165px; overflow:hidden;}
.game_all_more{text-align:right; padding-right:30px;}
.game_all_more a{color:#ff6e21;}

.limit{height:13px; position:absolute; top:50%; left:-168px; margin-top:-7px;}

/*顶通样式结束*/

</style>


<script>
    $(function(){
        //banner图
        $(".g_top_sbanner").hover(function(){
            $(".g_top_banner").show();
        },function(){
            $(".g_top_banner").mouseout(function(){
                $(this).hide();
            });
        });

        //消息
        $(".g_top_msg").hover(function(){
            $(".top_msg_li").show();
        },function(){
            $(".top_msg_li").hide();
        });

        //热门游戏
        $(".game_all").hover(function(){
            $(".game_all_list").show();
            $(".game_all_name ul li").hover(function(){
                var _index = $(this).index();
                $(".game_all_img ul li").eq(_index).show().siblings("li").hide();
            });
        },function(){
            $(".game_all_list").hide();
        });
    })
</script>
<script type="text/javascript" src="./images/top.js"></script>

<div class="wrap">
    <div class="w1272">
        <!-- 头部 -->
        <div class="header">
            <a href="/" class="logo">
                <img src="./images/logo.png">
            </a>
            <div class="nav">
                <a href="/">
                    官网首页
                    <span>HOME</span>
                </a>
                <a href="<?=$pay?>" target="_blank">
                    充值中心
                    <span>PAY</span>
                </a>
                <a href="<?=$dlq?>" target="_blank">
                    微端下载
                    <span>DOWNLOAD</span>
                </a>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes" target="_blank">
                    在线客服
                    <span>SERVICE</span>
                </a>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes" target="_blank">
                    在线技术
                    <span>SERVICE</span>
                </a>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes" target="_blank">
                    商务合作
                    <span>SERVICE</span>
                </a>				
            </div>
            <div class="clear"></div>
        </div>

		<!-- 内容部分 -->
		<div class="con">
			<!-- 左侧内容 -->
			<div class="con_l">
				<!-- 开始游戏 -->
                <!-- 开始游戏 -->
<div class="start">
    <a href="#" class="start_btn"></a>
    <div class="btns">
        <a class="down" href="<?=$dlq?>" target="_blank"></a>
        <a class="reg" href="javascript:popBox.infosucc('infoA');"></a>
        <a class="pay" href="<?=$pay?>" target="_blank"></a>
    </div>
    <div class="log">
                   
<?
if(!$_SESSION['usernames']){
?>
				 <!-- 登录前 -->
            <div class="log_no">
                <div class="log_inp">
				<form action="do.php?do=login" method="post" id="form_login">
                    <p>
                        <span><i class="ico_num"></i>账号：</span>
                        <input type="text" name="username" value="" id="username">
                    </p>
                    <p>
                        <span><i class="ico_word"></i>密码：</span>
                        <input type="password" name="userpass" id="password" value="">
                    </p>
					
                    <button style="submit" class="log_btn"></button>
               </form>
                </div>
                <div class="log_other">

                </div>
            </div>
<?}else{?>
                    <!-- 登录后 -->
            <div class="log_yes" style="display: block">
                <a href="javascript:;"><?=$_SESSION['usernames']?></a>，欢迎您！
                <!--p>
                    上次玩过的服：
                                            最近没玩过游戏，快去试试吧
                                    </p-->
                <div class="user_btns">
                    <!--a href="http://127.0.0.1/profile" target="_blank">个人中心</a-->
                    <a href="do.php?do=logout">退出登录</a>
                </div>
            </div>



<?}?>
			   
			   
			   
            </div>
</div>				
				<!-- 服务器列表 -->
                <div class="ser">
                    <div class="til">
                        服务器列表<em>/</em><span>SERVER LIST</span>
                    </div>
                    <div class="ser_box">
                        <ul class="ser_lis"><br>
						
						<?
						
$sql="SELECT * from $database2.server order by sid desc limit 6";
$result=mysql_query($sql); 
While($row=mysql_fetch_array($result)){
						
						?>
                                                                <li>
<a href="game.php?gid=<?php echo $row['sid'];?>" target="_blank">双线<?php echo $row['name'];?></a>
                                                                                    <span>
                                            火爆开启
                                            <i class="h"></i>
                                        </span>
                                                                            </li>
																			<?}?>
																			
																		
                    </ul></div>
                </div>
				
				<!-- 客服中心 -->
                <!-- 客服中心 -->

<div class="kf">
    <div class="til">
        公告事宜<em>/</em><span>SERVICE</span>
    </div>
    <div class="kf_box">
		充值比列：游戏直充1:1万,平台币1:1R<br>
		兑换比列：1平台币=1万元宝
		<br>游戏福利：全自动邮件查收<br>
        友情提醒：合理健康游戏</a>
		<br>充值须知：确认好账户</a><br>
    </div>

</div>

<div class="kf">
    <div class="til">
        客服中心<em>/</em><span>SERVICE</span>
    </div>
    <div class="kf_box">
		QQ群：<?=$qun?><br>客服QQ：<?=$qq;?><br>服务时间：7*24小时<br>
        在线客服：<a class="kf_btn" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes" target="_blank">联系客服</a>
		<br>在线技术：<a class="kf_btn" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes" target="_blank">联系技术</a><br>
    </div>

</div>
				
			</div>
			
			<!-- 右侧内容 -->
			<div class="con_r">
				<div class="til_con">
					服务器列表
					<div class="addr">
						您所在的位置：<a href="javascript:;">服务器列表</a>
					</div>
					
				</div>
				<div class="service_box">
					<div class="serv_box">
						<div class="til_ser">最近登录</div>
						<div class="serv_lis">
                            							<div class="clear"></div>
						</div>
						
					</div>
					
					<div class="serv_box">
						<div class="til_ser">推荐服务器</div>
						<div class="serv_lis">
							<?
						
$sql="SELECT * from $database2.server order by sid desc limit 2";
$result=mysql_query($sql); 
While($row=mysql_fetch_array($result)){
						
						?>
  <a href="game.php?gid=<?php echo $row['sid'];?>" target="_blank">双线<?php echo $row['name'];?></a>
																			<?}?>
                                                          
                                                          
                            							<div class="clear"></div>
						</div>
						
					</div>
					
					<div class="serv_check">
						<div class="serv_ctil">
							<span>所有服务器</span>
							<ul>
								<li>双线BGP</li>
<!--								<li>双线服2</li>-->
							</ul>
						</div>
						<div class="serv_lis" style="display: block">
							<?
						
$sql="SELECT * from $database2.server order by sid desc";
$result=mysql_query($sql); 
While($row=mysql_fetch_array($result)){
						
						?>
  <a href="game.php?gid=<?php echo $row['sid'];?>" target="_blank">双线<?php echo $row['name'];?></a>
																			<?}?>
                            							<div class="clear"></div>
						</div>
						
<!--						<div class="serv_lis">-->
<!--							<a href="javascript:;">双线111服</a>-->
<!--							<div class="clear"></div>-->
<!--						</div>-->
					</div>
					
					
				</div>
			</div>
			<div class="clear"></div>
			
		</div>
	
	</div>
</div>

	<!--登录注册弹窗-->
<link href = "./images/reg.css"rel = "stylesheet"type="text/css"/>
<script src="./js/reg.js"type="text/javascript"></script>
<script src="./js/checkuser-v1.js" type="text/javascript"></script>
<script src="./js/reg_validate.js" type="text/javascript"></script>
<script type="text/javascript">
    var tmpToken = '';
    var tmpTime = '';

    function popRegister(){
        var popusername = $("#popUsernameRegInput").val();
        var poppassword = $("#popPasswordRegInput").val();
        var repassword  = $("#popPassword2RegInput").val();
        var twopassword = $("#poptwoPassword2RegInput").val();
		
        if(!XYUser.checkUsername(popusername)){
            $("#popUsernameTips").html('<i class="pop-ico pop-ico-02"></i>用户名不合法');
            return;
        }
        if(!XYUser.checkPassword(poppassword)){
            alert("密码不合法");
            return;
        }
        if(poppassword != repassword){
            alert("两次密码不一致");
            return;
        }
        XYUser.registerExtra(popusername, poppassword, twopassword, function(popusername, poppassword, status ,msg){
            if(status != 'success'){
                alert(msg);
            }
        }, function(){
            window.location.reload();
        });
    }
    $("#popRegister").live('click',function(){
        popRegister();
    });
</script> 
<!-- 登录注册结束 --> 
<script type="text/javascript">



	$(function(){
		//input标签的占位符
		$('.item_tips').focus(function(){
			$(this).hide().next('.item_input').show().focus();
		});
	
		
		//区服类型切换
		$('#server_type_id').click(function(){
			var tid = parseInt($('#server_type_id').val());
			$('.server_list').hide();
			$('#server_type_tab_'+tid).show();
			$('#server_type_name').html( $('#server_type_id option:selected').text() );
			
			$('.server_type_span').removeClass('cur');
			$('.server_type_span'+tid).addClass('cur');
		}).eq(0).click();
		
		$(".server_type_span").click(function(){
			var tid = parseInt($(this).data('typeid'));
			$('#server_type_id').find("option[value="+tid+"]").prop("selected",true);
			$('.server_list').hide();
			$('#server_type_tab_'+tid).show();
			$('#server_type_name').html( $(this).text() );
			$('.server_type_span').removeClass('cur');
			$('.server_type_span'+tid).addClass('cur');
		})
		
		function initTab(name,type) {
			var $tab = $(name);
			
			//添加区服id导航
			var sPage = '';
			var servers = $tab.find('.list_data ul');
			var len = servers.size();
			for(var i=0;i<len;i++){
				var e_sid = servers.eq(i).find("li:first").attr("data");
				var s_sid = servers.eq(i).find("li:last").attr("data");
				if(e_sid==undefined || s_sid==undefined){
					e_sid = s_sid =1;
				}
				
				s_sid=s_sid-type*100;
				e_sid=e_sid-type*100;
				sPage += '<li>'+s_sid+'-'+e_sid+'区</li>';
			}
			$tab.find(".list_li").html(sPage);
			
			$tab.find('.tit li').click(function(){
				$tab.find('.txt').hide().eq($(this).index()).show(); 
				$(this).addClass('cur').siblings().removeClass('cur');
			}).eq(0).click();
		};
        initTab('#server_type_tab_2',2);
        initTab('#server_type_tab_1',1);
		initTab('#server_type_tab_0',0);
	});
$(function () { 	
	var showNumer=24;
	var allSer = $(".g_list a").length;
	$(".g_sort").empty();
	for(i=0; i<Math.ceil(allSer/showNumer); i++)
	{		
		var ln = allSer - (i+1)*showNumer + 1;
		var rn = allSer - i*showNumer;
		var em = $("<a></a>").attr("href","javascript:void(0);").html((ln<1?1:ln) + "-" + rn + "服");
		$(".g_sort").append(em);
	}	
	$(".g_sort a").mouseover(function(){
		if(!$(this).hasClass("on")) showList($(".g_sort a").index($(this)));
	});

	function showList(index){		
		$(".g_sort a").removeClass("on").eq(index).addClass("on");
		$(".g_list a").hide().slice(index*showNumer,(index+1)*showNumer).show();
	}
	showList(0);
	$('#keleyi').addFavorite(document.title,location.href);
});	
function tologin()
{
	if ($("#user_name").val()=="")
	{
		$("#user_name").focus();
		alert("请输入账号");
		return false;  
	}
	if ($("#user_pwd").val()=="")
	{
		$("#user_pwd").focus();
		alert("请输入密码");
		return false;
	}else
	{
		$.ajax({ 
			type: "GET",  
			url: "/do.php", 
			data: "username="+$("#user_name").val()+"&userpass="+$("#user_pwd").val()+"&do="+$("#go").val(),  
			success: function(msg){ 
				if(msg == "no"){
					alert("用户名或密码错误！\n请核实您的账号密码在尝试。");
				}else if(msg == "err"){
					alert("账号已经被封闭！请联系管理员！");
				}else{
					location.reload();
					$("#LoginShowTip").show().text(msg); 
				}
			} 
		}); 
	}
}
jQuery.fn.addFavorite = function(l, h) {

	return this.click(function() {

		var t = jQuery(this);

		if(jQuery.browser.msie) {

			window.external.addFavorite(h, l);

			} else if (jQuery.browser.mozilla || jQuery.browser.opera) {

			t.attr("rel", "sidebar");

			t.attr("title", l);

			t.attr("href", h);

		} else {

			alert("请使用Ctrl+D将本页加入收藏夹！");

		}

	});

};

</SCRIPT>
<!--reg_setp end-->
<form action="do.php?do=regok" method="post" id="login_form"></form>



</body></html>