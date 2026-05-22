<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
$jiaqun='http://127.0.0.1/';
$db_type='mysql';
$db_charset='utf8';
$db_host='127.0.0.1';
$db_username='root';
$db_password='123456';
$database='smzt_web';
$database2='smzt_web';
//$database2='****';
//$database3='****';


//游戏充值接口

$payjk="http://127.0.0.1/pay.php";


//游戏登录接口
$loginurl="http://127.0.0.1/login.php";


$bili=10000;					//钻石兑换元宝比例
$gamepay="19689";
$kbpay="88744";




$tgyuanbao='1'; //每个IP获得元宝数
$lv='20';   //推广到达等级
$kg='1';   //游戏是否开启，1：开启，0：没有开启
$maxnum="3";   //单个IP最大注册次数
//$qq='1234'; //客服QQ、YY等  QQ群:1234 QQ:1234
//$kfqq=' 1234'; //客服QQ、YY等  QQ群:1234 QQ:1234
$tgurl="";
if(empty($tgurl)) $url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
else $url_this =$tgurl;
$conn = @mysql_connect("$db_host","$db_username","$db_password") or die ("服务器维护中~详情联系 ".$qq."。");
@mysql_select_db("$database",$conn) or die ("数据库表不存在或者未连接。请联系管理员 。");
mysql_query("set names UTF8"); //使用文件编码，防止出错
function getIP()
{
$ip = $_SERVER["REMOTE_ADDR"];
if($ip==""){$ip="127.0.0.1";}
return $ip;
}

function passport_encrypt($txt, $key) { 
srand((double)microtime() * 1000000); 
$encrypt_key = md5(rand(0, 32000)); 
$ctr = 0; 
$tmp = ''; 
for($i = 0;$i < strlen($txt); $i++) { 
$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]); 
} 
return base64_encode(passport_key($tmp, $key)); 
} 

function passport_decrypt($txt, $key) { 
$txt = passport_key(base64_decode($txt), $key); 
$tmp = ''; 
for($i = 0;$i < strlen($txt); $i++) { 
$md5 = $txt[$i]; 
$tmp .= $txt[++$i] ^ $md5; 
} 
return $tmp; 
} 

function passport_key($txt, $encrypt_key) { 
$encrypt_key = md5($encrypt_key); 
$ctr = 0; 
$tmp = ''; 
for($i = 0; $i < strlen($txt); $i++) { 
$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
$tmp .= $txt[$i] ^ $encrypt_key[$ctr++]; 
} 
return $tmp; 
}


//===============================================

	$username=$_SESSION['accountName'];
	$sql="select * from account where account='".$_SESSION['accountName']."'";
	$result=mysql_query($sql);
	$svipl=mysql_fetch_array($result);
    if($svipl['U_Lv']==0){
		$svipl['U_Lv2']='普通会员';
	}
    if($svipl['U_Lv']==1){
		$svipl['U_Lv2']='青铜会员';
	}
    if($svipl['U_Lv']==2){
		$svipl['U_Lv2']='白银会员';
	}
    if($svipl['U_Lv']==3){
		$svipl['U_Lv2']='黄金会员';
	}
    if($svipl['U_Lv']==4){
		$svipl['U_Lv2']='白金会员';
	}
    if($svipl['U_Lv']==5){
		$svipl['U_Lv2']='钻石会员';
	}
    if($svipl['U_Lv']==6){
		$svipl['U_Lv2']='铂金会员';
	}	
	
$url=$_SERVER['HTTP_HOST'];
$sqlid="select * from $database.hunfu where url='".$url."'";
$resultid=mysql_query($sqlid); 
$rowpt=mysql_fetch_array($resultid);




$WebTitle=$rowpt['name'];
//$HFQZ=$rowpt['hfqianzhui']."_";
$HFQZ=$rowpt['hfqianzhui'];
$PLAT=$rowpt['plat'];
$HFID=$rowpt['hfqianzhui'];



$weburl="http://".$url."/";   //游戏地址，结尾要带/
$wwwurl="http://".$rowpt['home']."/";   //官方网址，结尾要带/
$tgyuanbao='1';         //每个IP获得元宝数
$lv='20';   //推广到达等级
$kg='1';   //游戏是否开启，1：开启，0：没有开启
$maxnum="3";   //单个IP最大注册次数
$qq=$rowpt['QQ1']; //客服QQ、YY等  QQ群:1234 QQ:1234
$qun=$rowpt['QQqun'];//QQ群链接
$pay="/paygame.php";//充值链接
$bj=$rowpt['bj'];//充值链接
$onlineKF=$rowpt['onlineKF'];//漂浮客服挂件	
$res_url=$rowpt['res_url'];//资源地址
$dlq=$rowpt['dlq'];
$hfinfopkey=$rowpt['paykey'];
?>
