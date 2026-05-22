<?php
$loginKey = 'yx1528090yxw498233160HunLoginKeyX';
$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

if($action=='login')
{	
$account ='a130500';
$fm="1";
$game="SMZT";
$server =1;
$backurl="";
$dwservId=25;
$tocken="";
$deptidz="21";
$time=time();
$bbs="";
$pay="";
$gm="";
$home="";
$key="GameServerYx152MiYao19880422";
$sign=md5($account.$fm.$time.$game.$server.$backurl.$dwservId.$tocken.$key);

$login_url = "http://127.0.0.1/SMZT/client.html";

$url="$login_url?account={$account}&fm={$fm}&game={$game}&time={$time}&server={$server}&sign={$sign}&backurl={$backurl}&dwservId={$dwservId}&tocken={$tocken}&deptidz={$deptidz}&bbs={$bbs}&pay={$pay}&gm={$gm}&home={$home}";
	
    header("location: $url");		
		
		
		
		
		
        header("location:".$url);
        exit;
}
?>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body>
                <form action="" method="post">
                        帐号：<input type="text" name="account">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="登录">
                        <input type="hidden" name="action" value="login">
                </form>
        </body>
</html>
