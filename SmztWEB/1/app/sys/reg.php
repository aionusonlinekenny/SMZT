<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/WebRes/Css/pintuer.css">
<link rel="stylesheet" href="/WebRes/Css/my.css">
<script src="/WebRes/Js/jquery.js"></script>
<script src="/WebRes/Js/pintuer.js"></script>
<!--[if lt IE 9]><script src="/WebRes/Js/html5.js"></script><![endif]-->
<!--[if IE 6]><script src="/WebRes/Js/DD_belatedPNG.js"></script><![endif]-->
<script src="/WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/WebRes/Js/layer.min.js"></script>
<script src="/WebRes/Js/core.js"></script>
<script src="/webres/js/cookie.js"></script>
<script src="/WebRes/Js/respond.js"></script></head>
<body>
<div class="container-layout margin-big-top">
    <div class="line  form-x">
        <form id="Register">
        <div class="form-group">
            	<input type="hidden" id="RegKey" name="RegKey" value="455befdf66989d3d">
                <input type="hidden" id="TG" name="TG" value="0">
            	<div class="label"><label for="Uname">注册账号</label></div>
            <div class="field field-icon-right">
                <input type="text" class="input" ID="Uname" name="Uname" placeholder="登录账号" data-validate="required:请填写账号,username:必须字母开头,length#>5:账号长度不低于6位" />
                <span class="icon icon-user"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="Upass">登录密码</label></div>
            <div class="field field-icon-right">
                <input type="password" class="input" ID="Upass" name="Upass" placeholder="登录密码" data-validate="required:请填写密码,length#>5:密码长度不低于6位" />
                <span class="icon icon-key"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="password">安&nbsp;&nbsp;全&nbsp;码</label></div>
            <div class="field field-icon-right">
                <input type="text" class="input" ID="Scode" name="Scode" placeholder="安全码" data-validate="required:请填写安全码,length#>5:安全码长度不低于6位" />
                <span class="icon icon-key"></span>
            </div>
        </div>
       
    	<div class="margin-big-top text-center"><button class="button button-block bg-sub text-big" type="button" onclick="Ajax_Action('Register')"  >立即注册</button></div>
    
</div>
</body>
</html>