<?php
include_once "../../core/config.php";

if(!$_SESSION['accountName'] || !$_GET['FQ']) exit("<script> alert('请登陆后使用！');location.href='index.php';</script>");

$newtime=time();
$server=$_GET['FQ'];
$sql="select * from server where sid='".$server."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$server_nm = $row['name'];
if($row['opentime']>$newtime){
	$tim3=date('y-m-d h:i:s',$row['opentime']);
	$array = array("info"=> "","status" => "y" ,"url" => "/member.php");
	echo "<script>alert('【".$row['name']."】开区时间是【".$tim3."】');location.href='../../member.php'</script>";
	exit;
}
$ip=$row['ip'];
$dk=$row['dk'];
$fqid=$row['fqid'];
$xsid=$row['xsid'];
$name=$_SESSION['accountName'];



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


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $WebTitle."-".$server_nm;?></title>
	<style type="text/css">
		a:hover{ text-decoration:underline;}
		body, html {width:100%;height:100%;margin-top:-10;margin-left:0;padding-top:0;}
	</style>
</head>
<body scroll="no" style="background:#000;">
<iframe src="<?php echo $url;?>" id='mainFrame' name='mainFrame' scrolling='no' width='100%' height='100%' frameborder='0'></iframe>
</body>
</html>
