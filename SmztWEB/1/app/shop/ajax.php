<?php
include_once "../../core/config.php";
$U_DH_Num=$_REQUEST['U_DH_Num'];
if($U_DH_Num<0){
$array = array("info"=>"元宝不能小于0！","status"=>"n");    
echo json_encode($array);
exit;
}
$Action=$_GET['Action'];
$name=$_SESSION['accountName'];
$serverid=$_REQUEST['FQ'];

if($Action=='Get_GameUser'){
  	$sql="select * from $database2.tb_account where account='".$_SESSION['accountName']."'";
	$result=mysql_query($sql); 
	$row=mysql_fetch_array($result);
  	$sql="select * from $database2.tb_player_info where charguid='".$row['charguid']."'";
	$result=mysql_query($sql); 
	$row2=mysql_fetch_array($result);
	if(!$row2['name']){
		$row2['name']='请先创建角色';
	}	
	$array = array("status"=>"y","html"=>"<label class=\"button margin-top\"><input name=\"Rid\" value=\"4506898162254646\"  type=\"radio\" data-validate=\"radio:请选择游戏角色\"> ".$row2['name']."</label>");   
	echo json_encode($array);
	exit;;
}


if($Action=='GoShop'){
	$_SESSION['FQ']=$serverid;
$array = array("status"=> "y","Url"=> "list.php");
echo json_encode($array);
exit;
}

if($Action=='ShopBuy'){

$GID=$_REQUEST['GID'];
$Rid=$_SESSION['Rid'];
if($GID=="" || !$GID ){	
	$array = array("info"=>"数据异常,请刷新重试","status"=> "n");
	echo json_encode($array);
	exit;	
}
$sql2="select * from shop where id='".$GID."'";
$result2=mysql_query($sql2); 
$row=mysql_fetch_array($result2);

$sql="select * from $database2.tb_account where account='".$_SESSION['accountName']."'";
$result=mysql_query($sql); 
$row3=mysql_fetch_array($result);

$time=time();
$chaoshi=$time+360000;
$title='神话三国';
$content='神话三国';
$mailid=rand(1,999999);
$itemid=$row['Gid'];
$sql="insert into $database2.tb_mail (charguid,mailgid,readflag,deleteflag,recvflag) values ('".$row3['charguid']."','".$mailid."','0','0','0')";
$result=mysql_query($sql);
$sql="insert into $database2.tb_mail_content (mailgid,refflag,title,content,sendtime,validtime,item1,itemnum1) values ('".$mailid."','0','".$title."','".$content."','".$time."','".$chaoshi."','".$itemid."','1')";
$result=mysql_query($sql);
	if($result){
		$array = array("info"=> " 物品发送成功,请刷新游戏查看邮件!","status" => "y" ,"url" => "/member.php");
		echo json_encode($array);
		exit;
	}else{
		$array = array("info"=> "网络繁忙！","status" => "n" ,"url" => "member.php");   
		echo json_encode($array);
		exit;			
	}
	

}


?>