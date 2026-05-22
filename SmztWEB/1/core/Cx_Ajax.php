<?php 
include_once "config.php";
$Action=$_REQUEST['Action'];
$acc=$_POST['Uname'];
$passwd=$_POST['Upass'];
date_default_timezone_set("PRC");
if($_SESSION['tgid'] || $_SESSION['tgid'] != ""){
	$tgsid=$_SESSION['tgid'];
  }else{
	$tgsid=="";
}
$Action=$_GET['Action'];
if($Action=='SignOut'){
	logout();
	$array = array("info"=> "用户退出系统成功!","status" => "y" ,"url" => "/index.php");
	echo json_encode($array);
	exit;
}
if($Action=='Login'){
	$sql="SELECT * FROM account WHERE name='".$acc."' and password='".$passwd."' ";
	$result=mysql_query($sql);
	$row2=mysql_fetch_array($result);
	$total=mysql_num_rows($result);
	$logintime = date("Y-m-d H:i:s");
	$ip = GetIP();
	if ($total<1){
		$array = array("info"=> "账号不存在,或密码错误","status" => "n" ,"url" => "index.php");
		echo json_encode($array);
		exit;
	}else{
		$_SESSION['accountName'] = $acc;
		$sql="update account set  logintime='".$logintime."',loginip='".$ip."' WHERE name='".$_SESSION['accountName']."'";
		$result=mysql_query($sql);
		$array = array("info"=> "登陆成功，点击确定后自动跳转至会员中心!!","status" => "y" ,"url" => "/member.php");
		echo json_encode($array);
		exit;
	}
}
if($Action=='EditPass'){
	$Scode=$_POST['Scode'];
	$sql="SELECT * FROM account WHERE name='".$_SESSION['accountName']."' ";
	$result=mysql_query($sql);
	$row2=mysql_fetch_array($result);
	if($Scode==$row2['Scode']){
		$sql="update account set  password='".$passwd."' WHERE name='".$_SESSION['accountName']."'";
		$result=mysql_query($sql);
		$array = array("info"=> "密码修改成功，请重新登陆","status" => "y");
		echo json_encode($array);
		exit;
	}else{
		$array = array("info"=> "安全码不正确，不能修改","status" => "n" ); 
		echo json_encode($array);
		exit;
	}
}
if($Action=='FindPass'){
	$Scode=$_POST['Scode'];
	$sql="SELECT * FROM account WHERE name='".$acc."' ";
	$result=mysql_query($sql);
	$row2=mysql_fetch_array($result);
	if($Scode==$row2['Scode']){
		$sql="update account set  password='".$passwd."' WHERE name='".$acc."'";
		$result=mysql_query($sql);
		$array = array("info"=> "密码修改成功，请重新登陆","status" => "y");
		echo json_encode($array);
		exit;
	}else{
		$array = array("info"=> "安全码不正确，不能修改","status" => "n" ); 
		echo json_encode($array);
		exit;
	}	
}
if($Action=='Register'){
	$Scode=$_POST['Scode'];
	$sql="SELECT * FROM account WHERE name='".$acc."'";
	$result=mysql_query($sql);
	$total=mysql_num_rows($result);
	$ip = GetIP();
	$createtime = date("Y-m-d H:i:s");
	if($total>0){
		$array = array("info"=> "帐号已被注册，请换其他用户","status" => "n" ); 
		echo json_encode($array);
		exit;
	}
	$sql="INSERT INTO account (name,password,Scode,createtime,logintime,createip,dj) VALUES ('".$acc."', '".$passwd."', '".$Scode."', '".$createtime."','".$createtime."', '".$ip."', '".$fuli."')";
	$result=mysql_query($sql);
	$_SESSION['accountName'] = $acc;
	if($result){
		$array = array("info"=> "注册成功，点击确定后自动跳转至会员中心!!","status" => "y" ,"url" => "/member.php"); 
		echo json_encode($array);
		exit;
	}else{
		$array = array("info"=> "网络繁忙，请稍后再试!!","status" => "n" ); 
		echo json_encode($array);
		exit;		
	}
}
function logout(){
	$_SESSION['accountName'] = '';
} 
?> 