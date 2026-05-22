<?php
date_default_timezone_set("PRC");
	session_start();

//====================================================
//		FileName: index.php
//		Summary:  程序入口文件
//====================================================
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE^E_WARNING);


$db_server="127.0.0.1";
$db_name="root";
$db_password="123456";
$database="api";
//连接数据库
$conn = @mysql_connect($db_server,$db_name,$db_password) or die("could not connect mysql");
mysql_select_db($database,$conn);
mysql_query("SET NAMES utf8"); 


$pwd='bf';//验证密码

$mail_url = 'http://127.0.0.1/mail.php';//地址
$gpay_url = 'http://127.0.0.1/gpay.php';//地址
$fh_url = 'http://127.0.0.1/fh.php';//地址
$gg_url = 'http://127.0.0.1/gg.php';//地址
$key ="ac59075b964b07bf";//key
$plat='bf';//pid


$ip = getIP();
function getIP()
{
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
 
    return $realip;
}

  
//$action = htmlspecialchars($_GET['action']);
$action=$_GET['action'];


if ($action == 'go')
{
$username=$_POST['username'];
$item_id=$_POST['item_id'];
$item_num=$_POST['item_num'];
$sid=$_POST['sid'];
$Scode=$_POST['Scode'];
$beizhu=$_POST['beizhu'];

		$sql = "SELECT * FROM item WHERE item_id = '$item_id'  ";
		$result12 = mysql_query($sql,$conn);
		$row12 = mysql_fetch_array($result12);
		$item_name=$row12['item_name'];

		if ($Scode!=$pwd){
					$array = array("info"=> "安全码错误!!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

		}
				$start['dingdan']='XY'.date("YmdHis").rand(100,999);
				$start['item_id']=$item_id;
				$start['beizhu']=$beizhu;
				$start['item_num']=$item_num;
				$start['item_name']=$item_name;
				$start['plat']=$plat;
				$start['user']=$username;
				$start['sid']=$sid;
				$start['time']=time();
				$start['sign']=md5($start['dingdan'].$start['plat'].$start['user'].$start['sid'].$start['item_id'].$start['item_num'].$start['time'].$key);
				$url=$mail_url.'?'.http_build_query($start);
				$ret = file_get_contents($url,false);
			if($ret=='1'){
					$array = array("info"=> "发送成功","status" => "1" ,"msg" => "4");   
					echo(json_encode($array));
					exit;	

			}else{
					$array = array("info"=> "发送失败!".$ret,"status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

			}

}
if ($action == 'gpay')
{
$username=$_POST['username'];
$gold=$_POST['gold'];
$sid=$_POST['sid'];
$Scode=$_POST['Scode'];
$beizhu=$_POST['beizhu'];
		
		if ($Scode!=$pwd){
					$array = array("info"=> "安全码错误!!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

		}
				$start['dingdan']='GP'.date("YmdHis").rand(100,999);
				$start['gold']=$gold;
				$start['money']=$gold;
				$start['beizhu']=$beizhu;
				$start['plat']=$plat;
				$start['user']=$username;
				$start['sid']=$sid;
				$start['pid']=$plat;
				$start['time']=time();
				$start['sign']=md5($start['dingdan'].$start['plat'].$start['user'].$start['sid'].$start['time'].$start['gold'].$key);
				$url=$gpay_url.'?'.http_build_query($start);
				$ret = file_get_contents($url,false);
				
			if($ret=='1'){
					$array = array("info"=> "充值成功","status" => "1" ,"msg" => "4");   
					echo(json_encode($array));
					exit;	

			}else{
					$array = array("info"=> "充值失败!".$ret,"status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	
			}

}
if ($action == 'fh')
{
$username=$_POST['username'];
$type=$_POST['type'];
$sid=$_POST['sid'];
$Scode=$_POST['Scode'];



		if ($Scode!=$pwd){
					$array = array("info"=> "安全码错误!!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

		}
				$start['type']=$type;
				$start['plat']=$plat;
				$start['user']=$username;
				$start['sid']=$sid;
				$start['time']=time();
				$start['sign']=md5($start['plat'].$start['user'].$start['sid'].$start['time'].$key);
				$url=$fh_url.'?'.http_build_query($start);
				$ret = file_get_contents($url,false);
			if($ret=='1'){
					$array = array("info"=> "操作成功","status" => "1" ,"msg" => "4");   
					echo(json_encode($array));
					exit;	

			}else{
					$array = array("info"=> "操作失败!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

			}

}
if ($action == 'gg')
{
$Scode=$_POST['Scode'];
$sid=$_POST['sid'];
$type=$_POST['type'];
$times=$_POST['times'];
$interval=$_POST['interval'];
$delay=$_POST['delay'];
$content=$_POST['content'];
$time=time();

		if ($Scode!=$pwd){
					$array = array("info"=> "安全码错误!!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

		}
		if ($times<1){
					$array = array("info"=> "循环次数错误!!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

		}
				$start['plat']=$plat;
				$start['sid']=$sid;
				$start['type']=$type;
				$start['times']=$times;				
				$start['interval']=$interval;
				$start['delay']=$delay;
				$start['content']=$content;				
				$start['time']=$time;
				$start['sign']=md5($plat.$sid.$type.$times.$interval.$delay.$content.$time.$key);
				$url=$gg_url.'?'.http_build_query($start);
				$ret = file_get_contents($url,false);
			if($ret=='1'){
					$array = array("info"=> "操作成功","status" => "1" ,"msg" => "4");   
					echo(json_encode($array));
					exit;	

			}else{
					$array = array("info"=> "操作失败!","status" => "2" ,"msg" => "1");   
					echo(json_encode($array));
					exit;	

			}

}
?>