<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  include_once "core/config.php";
if(!$_SESSION['accountName']) exit("<script> alert('请登陆后使用！');location.href='index.php';</script>");
$sql2="select * from account where name='".$_SESSION['accountName']."'";
$result2=mysql_query($sql2); 
$row2=mysql_fetch_array($result2);
$SCDJ=$row2['dj'];
$shop = urlencode('{"Url":"/app/shop/","title":"在线商城","Is_Max":"0","W_w":"1280","W_h":"750","fn":""}');
?>
	<title><?php echo $WebTitle?>—会员中心</title>
	<meta name="description" content="<?php echo $WebTitle?>" />
	<meta name="keywords" content="<?php echo $WebTitle?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/WebRes/Css/pintuer.css">
<link rel="stylesheet" href="/WebRes/Css/my.css">
<script src="/WebRes/Js/jquery.js"></script>
<script src="/WebRes/Js/pintuer.js"></script>
<script src="/WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/WebRes/Js/layer.min.js"></script>
<script src="/WebRes/Js/core.js"></script>
<script src="/webres/js/cookie.js"></script>
<script src="/WebRes/Js/respond.js"></script></head>
<body class="body_2" >
	<div class="main_bj">
		<div class="Cx_Nav">
	<div class="DH_Panel float-left">
		<?php 
	require 'top.php';//引用模板 
	?> 
	</div>
	<div class="User_Panel bg-main float-right">		
		<img src="/webres/img/logo1.png" class="margin" width="80" height="80" />
		<div class="margin float-right User_Xx">	
						<strong class="text-white">嗨! <strong class="text-dot"><?php echo $_SESSION['accountName']?></strong> 欢迎回家! </strong>
						<strong class="float-right margin-big-right"> 
					<button class="button button-little bg-sub" onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fsys%5C%2Feditpass.php%22%2C%22title%22%3A%22%5Cu4fee%5Cu6539%5Cu5bc6%5Cu7801%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22350%22%2C%22fn%22%3A%22%22%7D'); ">修改密码</button>
					<button class="button button-little bg-dot" onclick="Ajax_Action('','SignOut')">退出系统</button>
							</strong>
			<hr />
			<div class="media-inline">
				<div class="media text-center User_Login">
					<div class="txt bg-main" title="用户充值未领取的元宝"><strong><?php echo $row2['dj']?></strong><br>充值钻石</div>
									</div>
			</div>
		</div>
	</div>
</div>		<div id="Main_Content" class="bg border border-main">
			<div class="margin">
				<div class="container-layout">
	<br>
		<div class="tab" data-toggle="hover">
			<div class="tab-head">
				<ul class="tab-nav ">
					<li class="active"><a href="#tab-0">游戏应用</a></li></li>				</ul>
			</div>
			<div class="tab-body">
				<div class="tab-panel active" id="tab-0">
				<div class="line-small ">	
				
				<div class="x4">
				<div class="pro radius-big  border border-dashed border-small " >
				<div class="wait"><img src="/webres/img/gcds-dragon-512.png" />
				<div class="margin-big-top">
				<a onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2FGame%5C%2Findex.php%22%2C%22title%22%3A%22%5Cu5f00%5Cu59cb%5Cu6e38%5Cu620f%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22800%22%2C%22W_h%22%3A%22480%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">开始游戏</a>
				</div>
				</div>
				</div>
				</div>
				
				<div class="x4">
				<div class="pro radius-big  border border-dashed border-small " >
				<div class="wait"><img src="/webres/img/gcds-red-envelope-512.png" />
				<div class="margin-big-top">
				<a onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fdh%5C%2Findex.php%22%2C%22title%22%3A%22%5Cu5145%5Cu503c%5Cu5151%5Cu6362%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22600%22%2C%22W_h%22%3A%22600%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">兑换充值</a>
				</div>
				</div>
				</div>
				</div>
				
				<div class="x4">
				<div class="pro radius-big  border border-dashed border-small " >
				<div class="wait"><img src="/webres/img/pay.png" />
				<div class="margin-big-top">
				<a target="_blank" href="<?php echo $pay;?>" class="button button-block  button-big bg-main">游戏充值</a>
				</div>
				</div>
				</div>
				</div>
				<div class="x4">
				<div class="pro radius-big  border border-dashed border-small " >
				<div class="wait"><img src="/webres/img/gcds-lantern-512.png" />
				<div class="margin-big-top">
				<a onclick="OpenApp('<?php echo $shop;?>');" class="button button-block  button-big bg-main">在线商城</a>
				</div>
				</div>
				</div>
				</div>
				<div class="x4">
				<div class="pro radius-big  border border-dashed border-small " >
				<div class="wait"><img src="/webres/img/ewm.jpg" />
				<div class="margin-big-top">
				<a onclick="" class="button button-block  button-big bg-main">联系客服</a>
				</div>
				</div>
				</div>
				</div>
				
				
				</div>
				</div>
				<div class="tab-panel" id="tab-2"><div class="line-small "></div>
				</div>			
				</div>
				
			
				
		</div>
</div>			</div>	
		</div>
	</div>

<div class="bg-inverse" id="footer">
		<div class="navbar">
			<div class="navbar-body nav-navicon" id="navbar-footer">
				<div class="navbar-text"><div class="navbar-text">《<?php echo $WebTitle?>》公益服 诚邀你的加入!</div></div>
			</div>
		</div>
</div></body>
</html>

