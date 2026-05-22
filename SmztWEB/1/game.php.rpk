<?php
	include_once "core/config.php";
	$name=$_GET['uid'];
	$ip=$_GET['ip'];
	$dk=$_GET['dk'];
	$fqid=$_GET['fqid'];
	if($_SESSION['accountName']<>$name) exit("<script> alert('非法用户,请重新登陆！');location.href='index.php';</script>");
	$account =$name;
	$fm="1";
	$game="SMZT";
	$server =$fqid;
	$backurl="";
	$dwservId=$fqid;
	$tocken="";
	$deptidz="21";
	$time=time();
	$bbs="";
	$pay="";
	$gm="";
	$home="";
	$key="GameServerYx152MiYao19880422";
	$sign=md5($account.$fm.$time.$game.$server.$backurl.$dwservId.$tocken.$key);

	$login_url = "http://127.0.0.1:82/SMZT/client.html";

	$url="$login_url?account={$account}&fm={$fm}&game={$game}&time={$time}&server={$server}&sign={$sign}&backurl={$backurl}&dwservId={$dwservId}&tocken={$tocken}&deptidz={$deptidz}&bbs={$bbs}&pay={$pay}&gm={$gm}&home={$home}";
	
    header("location: $url");
	exit;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="Content-Type" content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link type="text/css" rel="stylesheet" href="http://res.dqy.g.yx-g.cn/youxi/css/fancy3d.min.css" />
    <script type="text/javascript" src="http://res.dqy.g.yx-g.cn/youxi/js/fancy3d_base64.min.js"></script>
    <script type="text/javascript" src="http://res.dqy.g.yx-g.cn/youxi/js/fancy3d_v4_vs_GamePlugin.min.js?20161211/"></script>
    <title>神魔诛天</title>
  </head>
  <body>
    <center id="center">
      <script>
      </script>
    </center>
  </body>
</html>
