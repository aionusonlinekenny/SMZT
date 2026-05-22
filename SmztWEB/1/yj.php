<?php
$uid = $_GET['uid'];
$sid = $_GET['sid'];
$num = $_GET['item_num'];
$itemid = $_GET['item_id'];
$utime = $_GET['time'];
$type = $_GET['type'];
$sign1 = $_GET['sign'];


	$sign2 = md5($uid.$sid.$num.$itemid.$utime."adsfq23w1e41111ff789asdh11");
	if($sign1 != $sign2){
		$data['status'] = 3; 
		$data['info'] = "验证失败！请联系管理员！";
	}else{
		$dbs = $sid;

	//$user = $uid.'_s'.$sid;
	$user = $uid;
	$item_id = $itemid;
	$dbconfig = array(
		'db_host'			=> '127.0.0.1:3306',					//数据库地址 IP:端口
		'db_username'		=> 'root',							//数据库账号
		'db_password'		=> '123456',						//数据库密码
		'database1'			=> 'smzt_datacenter',							//数据库名
		'database2'			=> 'smzt_game_s'.$sid,							//数据库名
		//'database2'			=> 'smzt_game_server',							//数据库名
		'database3'			=> 'smzt_conf',							//数据库名
	);
		$conn = @mysql_connect($dbconfig['db_host'],$dbconfig['db_username'],$dbconfig['db_password']);
		@mysql_select_db($dbconfig['database1'],$conn);
		@mysql_select_db($dbconfig['database2'],$conn);
		@mysql_select_db($dbconfig['database3'],$conn);
		@mysql_query("set names UTF8");//t_goods_normal
		$time = time();

		if($type == 1){
			/**代码执行区开始**/
				$mail_id = 'm'.md5($time*$time);
				
				$sql1="select * from `{$dbconfig['database3']}`.`t_goods_normal` where id = '{$item_id}'";
				$result1=mysql_query($sql1);
				$row1=mysql_fetch_array($result1);
				
				// $sql2 = "SELECT * FROM `{$dbconfig['database1']}`.t_user WHERE name = '{$uid}' and serverId = {$sid}";
				$sql2 = "SELECT * FROM `{$dbconfig['database1']}`.t_user WHERE name = '{$user}'";
				$result2=mysql_query($sql2);
				$row2=mysql_fetch_array($result2);

				$sql3 = "SELECT * FROM  `{$dbconfig['database2']}`.t_game_role WHERE userId = '{$row2['id']}'";
				$result3=mysql_query($sql3);
				$row3=mysql_fetch_array($result3);

				
				$timex = $time*1000;	
				$sql = "INSERT INTO `{$dbconfig['database2']}`.`t_mail` (`id`, `mailType`, `templateId`, `param`, `senderId`, `senderName`, `receiverId`, `subject`, `content`, `copperCoin`, `goldIngot`, `state`, `sendTime`) VALUES ('{$mail_id}', '2', '-1', '', '0', '', '{$row3['id']}', 'GM邮件', 'GM邮件', '0', '0', '0', '{$timex}');";
				$ret=mysql_query($sql);
				
				$sql_item = "INSERT INTO `{$dbconfig['database2']}`.`t_mail_attachment` (`mailId`, `logicIndex`, `roleId`, `goodsId`, `goodsType`, `itemNum`, `binded`, `quality`, `strRequired`, `bodRequired`, `staRequired`, `intenLv`, `intenNum`, `refineLv`, `baseProps`, `purityProps`, `purityTimes`, `fivePurityOpen`, `skillId`, `shapeId`, `expJadeExp`, `expiredDate`, `createtime`, `param`) VALUES ('{$mail_id}', '1', '{$row3['id']}', '{$item_id}', '{$row1['type']}', '{$num}', '1', '5', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '', '0', '0', '0', '{$timex}', '');";
				$ret_item=mysql_query($sql_item);
				if($ret && $ret_item)
				{
					$data['status'] = 1; 
					$data['info'] = '邮件需要刷新游戏到账！';
				}else{
					$data['status'] = 1; 
					$data['info'] = '邮件发送失败！！';
				}
			/**代码执行区结束**/
		}elseif($type == 2){
			/**代码执行区开始**/
			
			/**代码执行区结束**/
			$data['status'] = 1; 
			$data['info'] = '测试功能，无法到账！';//--测试无限银两-.$num;
		}elseif($type == 3){
			/**代码执行区开始**/
			
			/**代码执行区结束**/
			$data['status'] = 1; 
			$data['info'] = '测试功能，无法到账！';//--测试无限绑定元宝-.$num;
		}elseif($type == 4){
			/**代码执行区开始**/
			
			/**代码执行区结束**/
			$data['status'] = 1; 
			$data['info'] = '测试功能，无法到账！';//--测试无限绑定银两-.$num;
		}
		
		
	}
	exit(json_encode($data));  

?>