<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>系统提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css"> 
*{ word-break:break-all }
body{ color:#000; font-size:12px; font-family:"宋体", Arial, Times; text-align:left; line-height:120%; background:#fff; }
body, ul, li, h3 { margin:0px; padding:0px; }
ul, li { list-style:none; }
.big{text-align:center; margin:15px 2px 0 2px}
.big span {padding:2px 10px; display:inline-block; }
a:link, a:visited { color:#1E62B0; text-decoration:none; }
a:hover { color:#ff0000; text-decoration:underline; }
 
.wrapper { width:500px; padding:3px; border:1px solid #D1DDAA; background:#DBEEBD; margin: auto; }
.container { padding:15px; background:#F4F9FB; }
.container li.h3 {margin:0px; width:440px; height:30px;line-height:18px;}
.container ul{ font-size:14px; margin:15px; } 
.container div.buttons { text-align:center; margin:0px; } 
.container ul.h1 { margin:0px;}
</style>
</head>
<body>
<br><br><br>
<div class="wrapper" style="position: absolute; left: 433px; top: 119px;">
	<div class="container">
	    <ul class="h1">
			<li class="h3"><b>系统提示</b></li>
		</ul>
		
		<ul>

<?php
  include_once "./core/config.php";
  
$time=time();

if($_GET['do']=="login"){

	$username = $_POST['username'];
	$password = $_POST['userpass'];
$tgip = $_SERVER["REMOTE_ADDR"];	
 if ($username=="") {
	 	echo "<li>用户名不能为空！</li> </ul>";
	 	  echo "<div class='buttons'><a id='href' href='javascript:history.back(-1);'>页面将在<b id='wait'>3</b>秒后跳转,不想等待请点击此链接</a>";  
		  echo "<script type='text/javascript'> (function(){ var wait = document.getElementById('wait'),href = document.getElementById('href').href; var interval = setInterval(function(){ 	var time = --wait.innerHTML; 	if(time <= 0) { 		location.href = href; 		clearInterval(interval); 	}; }, 1000); })(); </script></div></div></div></body></html>"; 
	  exit;
  }
  if ((strlen($password) < 3) || (strlen($password) > 16)) {
	 	echo "<li>密码长度不正确！</li> </ul>";
	 	  echo "<div class='buttons'><a id='href' href='javascript:history.back(-1);'>页面将在<b id='wait'>3</b>秒后跳转,不想等待请点击此链接</a>";  echo "<script type='text/javascript'> (function(){ var wait = document.getElementById('wait'),href = document.getElementById('href').href; var interval = setInterval(function(){ 	var time = --wait.innerHTML; 	if(time <= 0) { 		location.href = href; 		clearInterval(interval); 	}; }, 1000); })(); </script></div></div></div></body></html>"; 
	  exit;
  }
	if ($username && $password) {
			$exec1 = "select * from account where account='".$username."' and passwd = '".md5($password)."' and pf='".$PLAT."' ";
			$result1 =mysql_query($exec1);
			$rs1 = mysql_fetch_array($result1);
			if ($rs1['userid']!="") {
			$_SESSION['userid'] = $rs1['userid'];
			$_SESSION['usernames'] = $username;
			$_SESSION['userpass'] = $password;
			$_SESSION['userpf'] = $PLAT;
			header("Location: index.php?"); 
			}else{
			  echo "<li>用户名或者密码错误！请重新登录！</li> </ul>";
	 	  echo "<div class='buttons'><a id='href' href='javascript:history.back(-1);'>页面将在<b id='wait'>3</b>秒后跳转,不想等待请点击此链接</a>";  echo "<script type='text/javascript'> (function(){ var wait = document.getElementById('wait'),href = document.getElementById('href').href; var interval = setInterval(function(){ 	var time = --wait.innerHTML; 	if(time <= 0) { 		location.href = href; 		clearInterval(interval); 	}; }, 1000); })(); </script></div></div></div></body></html>"; 
			  exit;
			}

	}
	
}elseif($_GET['do']=="logout"){
  if (isset($_SESSION['userid']))  {
	unset($_SESSION['userid']);
	unset($_SESSION['usernames']);
	unset($_SESSION['userpass']);
	unset($_SESSION['userpf']);
    echo "<li>您已成功退出!</font></li> </ul>";
	 	  echo "<div class='buttons'><a id='href' href='javascript:history.back(-1);'>页面将在<b id='wait'>3</b>秒后跳转,不想等待请点击此链接</a>";  echo "<script type='text/javascript'> (function(){ var wait = document.getElementById('wait'),href = document.getElementById('href').href; var interval = setInterval(function(){ 	var time = --wait.innerHTML; 	if(time <= 0) { 		location.href = href; 		clearInterval(interval); 	}; }, 1000); })(); </script></div></div></div></body></html>";
    exit;
  }
}elseif($_GET['do']=="regok"){
  $username=strtoupper($_POST['user_name']);
  $password=$_POST['password'];
  $password2=$_POST['password_retype'];
  $tgip=$_SERVER["REMOTE_ADDR"]; 
  if ($username=="") {
	  echo "<b>用户名不能为空！</b>";
	  echo "<br><br><input type='button'  class='btnFont' onclick='history.go(-1)' value=' 返 回 ' />";
	  exit;
  }
  if ((strlen($password) < 6) || (strlen($password) > 16)) {
	  echo "<b>密码长度不正确！</b>";
	  echo "<br><br><input type='button'  class='btnFont' onclick='history.go(-1)' value=' 返 回 ' />";
	  exit;
  }
  if ($password != $password2) {
      throw new Exception('两次输入的密码不一致！');
    }
	$exec1 = "select userid from $database.account where account='".$username."'";
	$result1 = mysql_query($exec1);
	$rs1 = mysql_fetch_array($result1);
	if ($rs1['userid']!="") {
	  echo "<b>不好意思，该用户名已经被注册了！</b>";
	  echo "<br><br><input type='button'  class='btnFont' onclick='history.go(-1)' value=' 返 回 ' />";
	  exit;
	}
	//die("123");
	$exec1 = "select count(*) as num from $database.account where zcip='".$tgip."' and zcip<>'' ";
	$result1 = mysql_query($exec1);
	$rs1 = mysql_fetch_array($result1);
	if (1>2) {
	  echo "<b>该IP地址已经注册太多次</b>";
	  echo "<br><br><input type='button'  class='btnFont' onclick='history.go(-1)' value=' 返 回 ' />";
	  exit;
	}
	$exec1 = "select count(*) as num from $database.account where pf='".$PLAT."'";
	$result1 = mysql_query($exec1);
	$rs1 =mysql_fetch_array($result1);
	if ($rs1['num']>=$tg_num) {
	$tg="";
	}

$sql="insert into $database.account (account,passwd,pass2,zctime,zcip,pf)values('".$username."','".md5($password)."','".$password."','".time()."','".$tgip."','".$PLAT."')";
mysql_query($sql);


			$exec1 = "select userid from $database.account where account='".$username."'";
			$result1 = mysql_query($exec1);
			$rs1 = mysql_fetch_array($result1);
			$_SESSION['userid'] = $rs1['userid'];
			$_SESSION['usernames'] = $username;
			$_SESSION['userpass'] = $password;
			$_SESSION['userpf'] = $PLAT;

	  echo "<script>alert('恭喜您注册成功！开始你的冒险之旅吧！!');history.go(-1);</script>";
			  exit;
}
  
?>

	
								<li>意外错误,请返回!</li>		</ul>
		
		<div class="buttons"><a id="href" href="javascript:history.back(-1);">页面将在<b id="wait">3</b>秒后跳转,不想等待请点击此链接</a></div></div></div>
</body></html>

 