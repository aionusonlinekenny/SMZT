<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

include_once "../../core/config.php";
$U_DH_Num=$_POST['U_DH_Num'];
if($U_DH_Num<0){
	$array = array("info"=>"元宝不能小于0！","status"=>"n");    
	echo json_encode($array);
	exit;
}
$Action=$_GET['Action'];
$serverid=$_POST['FQ'];

if($Action=='Get_GameUser'){
  	/* $sql="select * from $database2.t_user where USER_NAME='".$_SESSION['accountName']."'";
	$result=mysql_query($sql); 
	$row=mysql_fetch_array($result);
  	$sql="select * from $database2.tb_player where name='".$row['charguid']."'";
	$result=mysql_query($sql); 
	$row2=mysql_fetch_array($result);	
	if(!$row2['name']){
		$row2['name']='请先创建角色';
	} */
	$row2['name']='角色已选取';
	$array = array("status"=>"y","html"=>"<label class=\"button margin-top\"><input name=\"Rid\" value=\"4506898162254646\"  type=\"radio\" data-validate=\"radio:请选择游戏角色\"> ".$row2['name']."</label>");   
	echo json_encode($array);
	exit;
}




if($Action=='DHYB'){
  	$sql2="select * from account where name='".$_SESSION['accountName']."'";
	$result2=mysql_query($sql2); 
	$row2=mysql_fetch_array($result2);
	$sql="select * from server where fcm=".$serverid."";
	$result=mysql_query($sql); 
	$row=mysql_fetch_array($result);
	$userName = $_SESSION['accountName'];
	
	$sql="select * from $database3.t_user where name='".$userName."'";
	$result=mysql_query($sql); 
	$row3=mysql_fetch_array($result);
	
	if($U_DH_Num<=0){
		$array = array("info"=> "输入数字不正确","status" => "n" ,"url" => "member.php");   
		echo json_encode($array);
		exit;			
	}
	if($row2['dj']< $U_DH_Num){
		$array = array("info"=> "钻石不足兑换失败!!","status" => "n" ,"url" => "member.php");   
		echo json_encode($array);
		exit;			
	}
	$sql="select * from smzt_web.server where sid='".$serverid."'";
	$result=mysql_query($sql); 
	$row3=mysql_fetch_array($result);
	
	$yuanbao = $U_DH_Num*1000;
	$time = time();
	$money	=	$yuanbao;

	
	

	$user = $_SESSION['accountName'];
	$url = "http://127.0.0.1:{$row3['paydk']}/servlet/UserChargeServlet";
	$keys = "ChargeServerYx152MiYao19880422";
	$deptidz = 21;
	$game = 'SMZT';
	$fqid=$serverid;
	$sid = 's'.$serverid;
	$role = '';
	$type = 1;
	$itemid = -1;
	$price = 0;
	$cparam = "";
	$OrderID = uniqid();
	$time = time();
	$Money = $yuanbao/100;
	$yuanbao = $yuanbao;
	$signs = md5($user.$OrderID.$Money.$yuanbao.$type.$time.$game.$fqid.$role.$itemid.$price.$cparam.$keys);
	
	$info = array(
	'deptidz'   => $deptidz,
	'serverid'  => $fqid,
	'game'      => $game,
	'account'   => $user,
	'role'      => $role,
	'orderid'   => $OrderID,
	'rmb'       => $Money,
	'num'       => $yuanbao,
	'type'      => $type,
	'itemid'    => $itemid,
	'price'     => $price,
	'cparam'    => $cparam,
	'time'      => $time,
	'sign'      => $signs
	);
	$context = stream_context_create(array(  
	'http' => array(  
	'method' => 'POST',  
	'header' => 'Content-type:application/x-www-form-urlencoded',
	'content' => http_build_query($info)
	)  
	));
	
	
	$html=file_get_contents($url,false,$context);
	if($html == 1){
			mysql_query("update account set dj=dj-".$U_DH_Num." where name='".$_SESSION['accountName']."'");
			$array = array("info"=> " 兑换成功","status" => "y" ,"url" => "/member.php");
			echo json_encode($array);
			exit;
		}else{
		$array = array("info"=> "网络繁忙！","status" => "n" ,"url" => "member.php");   
		echo json_encode($array);
		exit;			
		
		}		
	
	
		
		
		
}
?>
