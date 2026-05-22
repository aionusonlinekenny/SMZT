<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$uid = $_GET['user'];
$sid = $_GET['sid'];
$utime = $_GET['time'];
$money = $_GET['money'];
$gold = $_GET['gold'];
$fqid = $_GET['fqid'];
$sign1 = $_GET['sign'];
$server_id = $_GET['server_id'];

	$sign2 = md5($uid.$sid.$utime.$money.$gold."adsfsxaqsff5041111ff789asdh11");
	if($sign1 != $sign2){
		$data['status'] = 3; 
		$data['info'] = "验证失败！请联系管理员！";
	}else{
        $conn=@mysql_connect("127.0.0.1","root","");
		$sjk='smzt_web';
		mysql_select_db($sjk,$conn);
		mysql_query("SET NAMES utf8",$conn); 
		
		$sql="select * from server where id = {$server_id}";
		$result=mysql_query($sql,$conn);
		$row = mysql_fetch_array($result);
		$mysql_name=$row['mysql_name'];
		$port=$row['port'];

	$user = $uid;
	$url = "http://122.51.27.223:{$port}/servlet/UserChargeServlet";
	$keys = "ChargeServerYx152MiYao19880422";
	$deptidz = 21;
	$game = 'SMZT';
	$sid = 's'.$sid;
	$role = '';
	$type = 1;
	$itemid = -1;
	$price = 0;
	$cparam = "";
	$OrderID = uniqid();
	$time = time();
	$Money = $gold/100;
	$yuanbao = $gold;
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
		$data['status'] = 1; 
		$data['info'] = '元宝在线到账，无需刷新游戏';
	}else{
		$data['status'] = 2; 
		$data['info'] = '<span style="color:red">操作失败！请联系管理员！<br/>失败内容：'.$html.'</span>';
	}		
			/**代码执行区结束**/
	}
	exit(json_encode($data));  
?>