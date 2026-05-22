<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  include_once "core/config.php";
if($_REQUEST['tid'])
{
$_SESSION['tgid']=$_REQUEST['tid'];
}
?>
<title><?php echo $WebTitle?></title>
	<meta name="description" content="<?php echo $WebTitle?>" />
	<meta name="keywords" content="<?php echo $WebTitle?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/WebRes/Css/pintuer.css">
<link rel="stylesheet" href="/WebRes/Css/my.css">
<script src="/WebRes/Js/jquery.js"></script>
<script src="/WebRes/Js/layer.min.js"></script>
<script src="/WebRes/Js/pintuer.js"></script>
<script src="/WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
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
						<strong class="text-white">亲爱的玩家,欢迎回家! </strong>
						<strong class="float-right margin-big-right"> 
									<button class="button button-little bg-yellow" onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fsys%5C%2Flogin.php%22%2C%22title%22%3A%22%5Cu4f1a%5Cu5458%5Cu767b%5Cu9646%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22350%22%2C%22fn%22%3A%22%22%7D'); ">立即登陆</button>
					<button class="button button-little bg-dot" onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fsys%5C%2Freg.php%22%2C%22title%22%3A%22%5Cu4f1a%5Cu5458%5Cu6ce8%5Cu518c%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22410%22%2C%22fn%22%3A%22%22%7D'); ">马上注册</button>
							</strong>
			<hr />
			<div class="media-inline">
				<div class="media text-center User_Login">
											<p class="text-white">《<?php echo $WebTitle?>》公益服 诚邀你的加入! </p>
								</div>
			</div>
		</div>
	</div>
</div>		         




<style>
	.bellows {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box; }

.bellows__header {
  position: relative;
  padding: 15px 20px;
  border: 1px solid #2980b9;
  border-width: 0 0 1px;
  background: #3498db;
  color: white;
  -webkit-tap-highlight-color: transparent; }
  .bellows__header:active {
    background: #2980b9; }
  .bellows__header::before, .bellows__header::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 20px;
    z-index: 2;
    display: block;
    width: 16px;
    height: 4px;
    margin-top: -2px;
    background: white;
    pointer-events: none;
    -webkit-transition: -webkit-transform 0.25s ease-in-out;
            transition: transform 0.25s ease-in-out; }
  .bellows__header::before {
    content: '';
    -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
            transform: rotate(0deg); }
  .bellows__header::after {
    -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
            transform: rotate(90deg); }
  .bellows__item.bellows--is-open > .bellows__header::before, .bellows__item.bellows--is-opening > .bellows__header::before {
    -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
            transform: rotate(180deg); }
  .bellows__item.bellows--is-open > .bellows__header::after, .bellows__item.bellows--is-opening > .bellows__header::after {
    -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
            transform: rotate(360deg); }
  .bellows__item:last-child > .bellows__header {
    border-bottom: 0; }
  .bellows__header h1,
  .bellows__header h2,
  .bellows__header h3,
  .bellows__header h4 {
    margin: 0; }

.bellows__content {
  padding: 20px;
  border: 1px solid #ecf0f1; }
  .bellows__content .bellows {
    margin-top: 20px; }

.bellows__item:not(.bellows--is-open) > .bellows__content {
  display: none; }

.bellows__item.bellows--is-open > .bellows__content-wrapper,
.bellows__item.bellows--is-closing > .bellows__content-wrapper {
  display: block; }

.bellows__content-wrapper {
  display: none; }
</style>
<div class="alert alert-red"><span class="close rotate-hover"></span><strong>温馨提示：</strong>第一次进入游戏加载比较慢</div>
<div id="Main_Content" class="bg border border-main">
	<div class="margin">
<div class="bellows single">
<div class="bellows__item bellows--is-open" aria-hidden="true">
		<div class="bellows__header">
			<h3><span class="icon-dot-circle-o"></span>&nbsp;神魔诛天</h3>
		</div>
		<div class="bellows__content">
<p>
　　<span style="color:#FF4C4C">神魔诛天</span><br>
　　<span style="color:#FF4C4C">取意：圣经.创世纪 诺亚方舟.</span><br>
　　<span style="color:#FF4C4C">意指：创造一个新的世界，改变现有游戏圈格局.</span><br>
　　<span style="color:#FF4C4C">第九名诺亚。取意：隐藏，意图不明。黑白不明.</span><br>
　　<span style="color:#FF4C4C">旨在打造一艘能让各种精英技术人士可以乘坐的大船，远离浮华，开创我们自己的创世纪.</span><br>



</p>
</div>
	</div>

	</div>
</div>
</div>	
<div class="bg-inverse" id="footer">
		<div class="navbar">
			<div class="navbar-body nav-navicon" id="navbar-footer">
				<div class="navbar-text">《<?php echo $WebTitle?>》公益服 诚邀你的加入!</div>
			</div>
		</div>
</div>
</body>
</html>
  </tr>
</table>
