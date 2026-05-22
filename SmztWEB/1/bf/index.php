<!DOCTYPE html>
<?php
require 'action.php';
@session_start();
?>	

<html>
<head>
	<meta charset="utf-8">
	<title>后台管理系统</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style/layui/css/layui.css"  media="all">
	<link rel="stylesheet" href="style/select2/css/select2.css" />
	
	<script src="style/layui/layui.js" charset="utf-8"></script>
	<script src="style/js/jquery.js" charset="utf-8"></script>

</head>
<body>

<fieldset class="layui-elem-field layui-field-title site-demo-button" style="margin-top: 30px;">
  <legend>后台充值-会增加VIP等级与活动福利可领取</legend>
</fieldset>

<div class="layui-form layui-form-pane" action="" style="margin:0px 0px 0px 60px;">
  <div class="layui-form-item">
    <label class="layui-form-label">安全码</label>
    <div class="layui-input-inline">
      <input type="text" name="gp_Scode" id="gp_Scode" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>  
	<div class="layui-form-item">
		<label class="layui-form-label">选择分区</label>
		<div class="layui-input-block" style="width:360px">
			<select name="gp_sid" id="gp_sid" lay-filter="myselect" ><!--分区ID-->		
				<option value=""></option>
<?php
                        $result = mysql_query("select * from server order by sid desc");
                        while ($row1 = mysql_fetch_array($result)){
             ?>
		    			<option value="<?php echo $row1['sid'] ?>">&nbsp;<?php echo $row1['name'] ?></option>
						<?php } ?>

						</select>
		</div>
	</div>
  <div class="layui-form-item">
    <label class="layui-form-label">游戏账户</label>
    <div class="layui-input-inline">
      <input type="text" name="gp_username"  id="gp_username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">元宝数量</label>
    <div class="layui-input-inline">
      <input type="text" name="gp_gold"  id="gp_gold" value="1" placeholder="元宝数量" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  
    <div class="layui-form-item">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-inline">
      <input type="text" name="gp_beizhu"  id="gp_beizhu" placeholder="请输入理由" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
<div class="layui-input-block">
<button class="layui-btn layui-btn-primary layui-btn-lg" id="gpay" >后台充值</button>
</div>
</div>
<fieldset class="layui-elem-field layui-field-title site-demo-button" style="margin-top: 30px;">
  <legend>邮件物品</legend>
</fieldset>


<div class="layui-form layui-form-pane" action="" style="margin:0px 0px 0px 60px;">
  <div class="layui-form-item">
    <label class="layui-form-label">安全码</label>
    <div class="layui-input-inline">
      <input type="text" name="Scode" id="Scode" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">游戏账户</label>
    <div class="layui-input-inline">
      <input type="text" name="username"  id="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  

	<div class="layui-form-item">
		<label class="layui-form-label">选择分区</label>
		<div class="layui-input-block" style="width:360px">
			<select name="sid" id="sid" lay-filter="myselect" ><!--分区ID-->		
				<option value=""></option>
<?php
                        $result = mysql_query("select * from server order by sid desc");
                        while ($row1 = mysql_fetch_array($result)){
             ?>
		    			<option value="<?php echo $row1['sid'] ?>">&nbsp;<?php echo $row1['name'] ?></option>
						<?php } ?>

						</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">选择物品</label>
		<div class="layui-input-block" style="width:360px">
			<select name="item_id" id="item_id" lay-filter="myselect" ><!--分区ID-->		
				<option value=""></option>
<?php
                        $result = mysql_query("select * from item order by id desc");
                        while ($row1 = mysql_fetch_array($result)){
             ?>
		    			<option value="<?php echo $row1['item_id'] ?>">&nbsp;<?php echo $row1['item_name'] ?></option>
						<?php } ?>

						</select>
		</div>
	</div>
  <div class="layui-form-item">
    <label class="layui-form-label">物品数量</label>
    <div class="layui-input-inline">
      <input type="text" name="item_num"  id="item_num" value="1" placeholder="请输入物品数量" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  
    <div class="layui-form-item">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-inline">
      <input type="text" name="beizhu"  id="beizhu" placeholder="请输入理由" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
<div class="layui-input-block">
<button class="layui-btn layui-btn-primary layui-btn-lg" id="go" >发送物品</button>
</div>
</div>

<fieldset class="layui-elem-field layui-field-title site-demo-button" style="margin-top: 30px;">
  <legend>封号(注意永久解封不了,请慎用)</legend>
</fieldset>

<div class="layui-form layui-form-pane" action="" style="margin:0px 0px 0px 60px;">
  <div class="layui-form-item">
    <label class="layui-form-label">安全码</label>
    <div class="layui-input-inline">
      <input type="text" name="fh_Scode" id="fh_Scode" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">角色名称</label>
    <div class="layui-input-inline">
      <input type="text" name="fh_username"  id="fh_username" placeholder="角色名字" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>

	<div class="layui-form-item">
		<label class="layui-form-label">选择分区</label>
		<div class="layui-input-block" style="width:360px">
			<select name="fh_sid" id="fh_sid" lay-filter="myselect" ><!--分区ID-->		
				<option value=""></option>
<?php
                        $result = mysql_query("select * from server order by sid desc");
                        while ($row1 = mysql_fetch_array($result)){
             ?>
		    			<option value="<?php echo $row1['sid'] ?>">&nbsp;<?php echo $row1['name'] ?></option>
						<?php } ?>

						</select>
		</div>
	</div>

  	<div class="layui-form-item">
		<label class="layui-form-label">操作类型</label>
		<div class="layui-input-block" style="width:360px">
			<select name="fh_type" id="fh_type" lay-filter="myselect" >
				<option value=""></option>
				<option value="1">封号</option>
				<option value="2">禁言</option>
				<option value="3">解除禁言</option>
			</select>
		</div>
	</div>

<div class="layui-input-block">
<button class="layui-btn layui-btn-primary layui-btn-lg" id="fh" >提交</button>
</div>
</div>

<fieldset class="layui-elem-field layui-field-title site-demo-button" style="margin-top: 30px;">
  <legend>全服公告</legend>
</fieldset>

<div class="layui-form layui-form-pane" action="" style="margin:0px 0px 0px 60px;">
  <div class="layui-form-item">
    <label class="layui-form-label">安全码</label>
    <div class="layui-input-inline">
      <input type="text" name="gg_Scode" id="gg_Scode" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-form-mid layui-word-aux"></div>
  </div>
	<div class="layui-form-item">
		<label class="layui-form-label">选择分区</label>
		<div class="layui-input-block" style="width:360px">
			<select name="gg_sid" id="gg_sid" lay-filter="myselect" ><!--分区ID-->		
				<option value=""></option>
<?php
                        $result = mysql_query("select * from server order by sid desc");
                        while ($row1 = mysql_fetch_array($result)){
             ?>
		    			<option value="<?php echo $row1['sid'] ?>">&nbsp;<?php echo $row1['name'] ?></option>
						<?php } ?>

						</select>
		</div>
	</div>

  	<div class="layui-form-item">
		<label class="layui-form-label">公告类型</label>
		<div class="layui-input-block" style="width:360px">
			<select name="gg_type" id="gg_type" lay-filter="myselect" >
				<option value=""></option>
				<option value="1">走马灯</option>
				<option value="2">中央公告</option>
				<option value="4">聊天框播报</option>
				<option value="3">走马灯+聊天框播报</option>
				<option value="5">走马灯+中央公告</option>
				<option value="6">中央公告+聊天框播报</option>
				<option value="7">走马灯+中央公告+聊天框播报</option>
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">循环次数</label>
		<div class="layui-input-inline">
		  <input type="text" name="gg_times"  id="gg_times" value="1" placeholder="次数" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux"></div>
	  </div>
	<div class="layui-form-item">
		<label class="layui-form-label">公告间隔</label>
		<div class="layui-input-inline">
		  <input type="text" name="gg_Interval"  id="gg_Interval" value="0" placeholder="秒" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">(循环间隔N秒)</div>
	  </div>
	<div class="layui-form-item">
		<label class="layui-form-label">公告延时</label>
		<div class="layui-input-inline">
		  <input type="text" name="gg_Delay"  id="gg_Delay" value="0" placeholder="秒" autocomplete="off" class="layui-input">
		</div>
		<div class="layui-form-mid layui-word-aux">(N秒后发送)</div>
	  </div>
	  <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">公告内容</label>
          <div class="layui-input-block">
            <textarea id="gg_content" name="gg_content" placeholder="请输入内容" class="layui-textarea"></textarea>
          </div>
        </div>
<div class="layui-input-block">
<button class="layui-btn layui-btn-primary layui-btn-lg" id="gg" >提交</button>
</div>
</div>

	<script>  
	  $(function(){
		  
		  $('#gpay').click(function(){
			  var username=$('#gp_username').val();  
			  var sid=$('#gp_sid').val();
			  var item_id=$('#gp_item_id').val();
			  var Scode=$('#gp_Scode').val();
			  var gold=$('#gp_gold').val();
			  var beizhu=$('#gp_beizhu').val();
				if(username == ''){
					layer.alert("账号不能为空", {icon: 2});
					return;
				}else if(sid == ''){
					layer.alert("sid不能为空", {icon: 2});
					return;
				}else if(item_id == ''){
					layer.alert("物品不能为空", {icon: 2});
					return;
				}else if(Scode == ''){
					layer.alert("安全码不能为空", {icon: 2});
					return;
				}else if(gold == ''){
					layer.alert("元宝数量不能为空", {icon: 2});
					return;
				}else if(beizhu == ''){
					layer.alert("备注不能为空", {icon: 2});
					return;
				}

					  $.ajax({  
						type: "post",  
						url: "action.php?action=gpay",
												
						data: {action:"gpay",username:username,sid:sid,gold:gold,Scode:Scode,beizhu:beizhu},
						dataType: "json",//回调函数接收数据的数据格式  
								success: function(json){
									var status = json['status'];
									var info = json['info'];
									var msg = json['msg']
										if(msg == 1){
											layer.alert(info, {icon: status});
										}else if(msg == 2){
											layer.msg(info, {time: 3000, icon:status});
										}else if(msg == 3){
											layer.msg(info);
										}else if(msg == 4){
											layer.msg(info, {time: 3000, icon:status});
											//location.href='game.php?gid=<?php echo $gid ?>';
											setTimeout('parent.location.reload()',2000);
										}
										console.log(json);  
								},  
								error:function(json){  
									console.log(json);  
								}  
						});  
			}) 
		  
			$('#fh').click(function(){
			  var username=$('#fh_username').val();  
			  var sid=$('#fh_sid').val();
			  var type=$('#fh_type').val();
			  var Scode=$('#fh_Scode').val();
				if(username == ''){
					layer.alert("账号不能为空", {icon: 2});
					return;
				}else if(sid == ''){
					layer.alert("sid不能为空", {icon: 2});
					return;
				}else if(type == ''){
					layer.alert("类型不能为空", {icon: 2});
					return;
				}else if(Scode == ''){
					layer.alert("安全码不能为空", {icon: 2});
					return;
				}

					  $.ajax({  
						type: "post",  
						url: "action.php?action=fh",
												
						data: {action:"fh",username:username,sid:sid,type:type,Scode:Scode},
						dataType: "json",//回调函数接收数据的数据格式  
								success: function(json){
									var status = json['status'];
									var info = json['info'];
									var msg = json['msg']
										if(msg == 1){
											layer.alert(info, {icon: status});
										}else if(msg == 2){
											layer.msg(info, {time: 3000, icon:status});
										}else if(msg == 3){
											layer.msg(info);
										}else if(msg == 4){
											layer.msg(info, {time: 3000, icon:status});
											//location.href='game.php?gid=<?php echo $gid ?>';
											setTimeout('parent.location.reload()',2000);
										}
										console.log(json);  
								},  
								error:function(json){  
									console.log(json);  
								}  
						});  
			})  

			$('#go').click(function(){
			  var username=$('#username').val();  
			  var sid=$('#sid').val();
			  var item_id=$('#item_id').val();
			  var Scode=$('#Scode').val();
			  var item_num=$('#item_num').val();
			  var beizhu=$('#beizhu').val();
				if(username == ''){
					layer.alert("账号不能为空", {icon: 2});
					return;
				}else if(sid == ''){
					layer.alert("sid不能为空", {icon: 2});
					return;
				}else if(item_id == ''){
					layer.alert("物品不能为空", {icon: 2});
					return;
				}else if(Scode == ''){
					layer.alert("安全码不能为空", {icon: 2});
					return;
				}else if(item_num == ''){
					layer.alert("物品数量不能为空", {icon: 2});
					return;
				}else if(beizhu == ''){
					layer.alert("备注不能为空", {icon: 2});
					return;
				}

					  $.ajax({  
						type: "post",  
						url: "action.php?action=go",
												
						data: {action:"go",username:username,sid:sid,item_id:item_id,item_num:item_num,Scode:Scode,beizhu:beizhu},
						dataType: "json",//回调函数接收数据的数据格式  
								success: function(json){
									var status = json['status'];
									var info = json['info'];
									var msg = json['msg']
										if(msg == 1){
											layer.alert(info, {icon: status});
										}else if(msg == 2){
											layer.msg(info, {time: 3000, icon:status});
										}else if(msg == 3){
											layer.msg(info);
										}else if(msg == 4){
											layer.msg(info, {time: 3000, icon:status});
											//location.href='game.php?gid=<?php echo $gid ?>';
											setTimeout('parent.location.reload()',2000);
										}
										console.log(json);  
								},  
								error:function(json){  
									console.log(json);  
								}  
						});  
			})  
			
			$('#gg').click(function(){			  
			  var sid=$('#gg_sid').val();			 
			  var Scode=$('#gg_Scode').val();
			  var type=$('#gg_type').val();
			  var times=$('#gg_times').val();
			  var interval=$('#gg_Interval').val();
			  var delay=$('#gg_Delay').val();
			  var content=$('#gg_content').val();
				if(sid == ''){
					layer.alert("sid不能为空", {icon: 2});
					return;
				}else if(item_id == ''){
					layer.alert("物品不能为空", {icon: 2});
					return;
				}else if(Scode == ''){
					layer.alert("安全码不能为空", {icon: 2});
					return;
				}else if(type == ''){
					layer.alert("公告类型不能为空", {icon: 2});
					return;
				}else if(interval == ''){
					layer.alert("公告间隔不能为空", {icon: 2});
					return;
				}else if(delay == ''){
					layer.alert("公告延时不能为空", {icon: 2});
					return;
				}else if(times == ''||0+times<1){
					layer.alert("公告循环次数不能为空且不能小于1", {icon: 2});
					return;
				}else if(content == ''){
					layer.alert("公告内容不能为空", {icon: 2});
					return;
				}

					  $.ajax({  
						type: "post",  
						url: "action.php?action=gg",												
						data: {action:"gg",sid:sid,Scode:Scode,type:type,times:times,interval:interval,delay:delay,content:content},
						dataType: "json",//回调函数接收数据的数据格式  
								success: function(json){
									if(json){
									var status = json['status'];
									var info = json['info'];
									var msg = json['msg']
										if(msg == 1){
											layer.alert(info, {icon: status});
										}else if(msg == 2){
											layer.msg(info, {time: 3000, icon:status});
										}else if(msg == 3){
											layer.msg(info);
										}else if(msg == 4){
											layer.msg(info, {time: 3000, icon:status});											
											setTimeout('parent.location.reload()',2000);
										}
									}
									console.log(json);  
								},  
								error:function(json){  
									console.log(json);  
								}  
						});  
			}) 
	  })
	  
	</script>
<script>
layui.use(['form'], function(){
});
</script> 
</body>
</html>