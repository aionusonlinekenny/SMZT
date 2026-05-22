<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
//数据库链接
$db_type='mysql';
$db_charset='utf8';
$db_host='127.0.0.1';
$db_username='root';
$db_password='123456';
$database3='smzt_datacenter';
$database='smzt_web';
$database2='smzt_game_s1';
$houzhui='.s'; //大区后缀
//网站配置信息
$WebTitle='神魔诛天';
$qq='';
$fuli=0;   
$bili=1;
$tgurl="";
if(empty($tgurl)) $url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
else $url_this =$tgurl;
$conn = @mysql_connect("$db_host","$db_username","$db_password") or die ("服务器维护中~详情联系 ".$qq."。");
@mysql_select_db("$database",$conn) or die ("数据库表不存在或者未连接。请联系管理员 。");
mysql_query("set names UTF8"); //使用文件编码，防止出错
function getIP()
{
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
   $ip = $_SERVER["HTTP_CLIENT_IP"];
else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else if(!empty($_SERVER["REMOTE_ADDR"]))
   $ip = $_SERVER["REMOTE_ADDR"];
else
   $ip = "无法获取！";
return $ip;
}
?>
