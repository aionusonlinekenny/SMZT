<?php
  include_once "./core/config.php";
 //session_start();
 if(!$_SESSION['usernames'] || !$_GET['gid']) exit("<script> alert('请登陆后使用！');location.href='/';</script>");
 
 $server=$_GET['gid'];
 $sql="select * from $database2.server where sid='$server'";
$result=mysql_query($sql); 
$row=mysql_fetch_array($result);

$newtime=time();
		$username =$_SESSION['usernames'];
		$serverID = $row['fqid'];
		$sid = $row['sid'];
		$server_nm = $row['name'];
		$kfsj=$row['time'];
		$kqsj=strtotime($row['time']);

	if(time()<$kqsj and $_SESSION['usernames'] !='qweqwe'){
			echo "<script>alert('【".$row['name']."】开区时间是【".$kfsj."】');location.href='/'</script>";
			exit;
}
$sql="select * from $database.hunfu where plat='".$PLAT."' AND ok=1";
$result=mysql_query($sql);
$hfinfo=mysql_fetch_array($result);
$lkey=$hfinfo['loginkey'];
if($hfinfo<=0)
{
	echo "-1";//平台不存在
	exit();
}



	$account =$username;
	$fm="1";
	$game="SMZT";
	$server =$sid;
	$backurl="";
	$dwservId=$sid;
	$tocken="";
	$deptidz="21";
	$time=time();
	$bbs="";
	$pay="";
	$gm="";
	$home="";
	$key="GameServerYx152MiYao19880422";
	$sign=md5($account.$fm.$time.$game.$server.$backurl.$dwservId.$tocken.$key);

	$login_url = "http://122.51.27.223:81/SMZT/client.html";

	$url="$login_url?account={$account}&fm={$fm}&game={$game}&time={$time}&server={$server}&sign={$sign}&backurl={$backurl}&dwservId={$dwservId}&tocken={$tocken}&deptidz={$deptidz}&bbs={$bbs}&pay={$pay}&gm={$gm}&home={$home}";

		$login=header("Location:{$url}");

        return $login;



?>
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
<script src="/WebRes/Js/respond.js"></script><title><?php echo $WebTitle?><?php echo $_GET['FQ']?>服</title>
<script src="/webres/js/swfobject.js" type="text/javascript"></script> 
<script src="/webres/js/swffit.js" type="text/javascript"></script>
<script type="text/javascript">
		function Play_Game(url) {
			window.layer.closeAll();
			var _h = $(window).height()
			var _w = $(window).width()
			$.layer({
			    type: 2,
			    title: false,
		     	area: [_w, _h],
			    fix: false,
			    shadeClose: false,
			    closeBtn: false,
			    border: [0],
			    shade : [0],
			    iframe: {src: url}
			});
		}
	</script>
</head>
<body>
	<script type="text/javascript">Play_Game('<?php echo $login?>');</script>	
</body>
</html>
