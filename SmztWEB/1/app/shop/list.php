<!DOCTYPE html>
<html lang="zh-cn">
<?php
include_once "../../core/config.php";
$name=$_SESSION['accountName'];
$FQ=$_SESSION['FQ'];
$sql2="select * from account where name='".$name."'";
$result2=mysql_query($sql2); 
$row2=mysql_fetch_array($result2);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="/WebRes/Css/pintuer.css">
<link rel="stylesheet" href="/WebRes/Css/my.css">
<script src="/WebRes/Js/jquery.js"></script>
<script src="/WebRes/Js/pintuer.js"></script>
<!--[if lt IE 9]><script src="/WebRes/Js/html5.js"></script><![endif]-->
<!--[if IE 6]><script src="/WebRes/Js/DD_belatedPNG.js"></script><![endif]-->
<script src="/WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/WebRes/Js/layer.min.js"></script>
<script src="/WebRes/Js/core.js"></script>
<script src="/webres/js/cookie.js"></script>
<script src="/WebRes/Js/respond.js"></script></head>
	<body>
		<br><br>
<div class="container padding-big-left padding-big-right">
 	<strong class="text-yellow margin-top"><?php echo $WebTitle?>--在线商城</strong> 
 	<strong class="text-yellow margin float-right">嗨,<?=$name?>  你当前的钻石余额为:<?=$row2['dj']?></strong> 
	<hr class="bg-main" />
    <!--筛选列表-->
    <br>
    <div class="line-big margin-bottom border-bottom border-dotted">
          <dl class="margin clearfix">
            	<dd>
	            	<form method="GET">
	            	<ul class=" input-group ">
		            	   <div class="addbtn">
			          		<div class="button-group">
					            <button type="button" class="button bg-main dropdown-toggle">商品分类<span class="downward"></span></button>
					            <ul class="drop-menu">
						           <li><a href="?LB=0">默认</a></li>
								   <li><a href="?LB=1">常用</a></li>
								   <li><a href="?LB=2">宝石</a></li>
								   <li><a href="?LB=3">材料</a></li>
								   <li><a href="?LB=4">丹药</a></li>
								   <li><a href="?LB=5">时装</a></li>
								   <li><a href="?LB=6">坐骑</a></li>
								   <li><a href="?LB=7">宠物</a></li>
								   <li><a href="?LB=8">特卖</a></li>
								   <li><a href="?LB=9">礼包</a></li>					            
								</ul>
			          		</div>
				        </div> 
				        <div class="addbtn">
			          		<div class="button-group">
					            <button type="button" class="button bg-yellow dropdown-toggle">热门商品<span class="downward"></span></button>
					            <ul class="drop-menu">
						           <li><a href="?SP_Name=商品测试1">商品测试1</a></li><li><a href="?SP_Name=商品测试2">商品测试2</a></li><li><a href="?SP_Name=商品测试3">商品测试3</a></li>					            </ul>
			          		</div>
				        </div>    	
		            	<input type="text" class="input" name="SP_Name" value="" size="10" placeholder="关键词" />
		          		<span class="addbtn"><button type="submit" href="" class="button bg-dot"><span class="icon-search margin-right"></span>商品搜索</button></span>
	            	</ul>
	            	</form>
	            </dd>
          </dl>
          
    </div>
<div class="table">
	<table class="table table-bordered table-hover">
	  <tbody>
		  <tr><th>商品名称</th><th>商品说明</th><th>消耗钻石</th><th>商品操作</th></tr>
		  <?php  
				//include_once "../../core/config.php";
					$sql="select * from shop order by id desc limit 0,20000";
					$result=mysql_query($sql,$conn); 
					while($row=mysql_fetch_array($result))
				{
				?>
		  <tr>
		  <td width="14%"><?=$row['name']?></td>
		  <td width="46%" class="tips" data-toggle="hover" data-place="top" data-image=""><?php echo $row['bz']?></td>
		  <td width="10%"><?=$row['price']?></td>
		  <td width="15%"><button class="button bg-red" onclick= "Buy_Item(<?=$row['id']?>)" >立即购买</button></td></tr><?php }?>
		  		</tbody>
	</table>
	<br><br>
	<div class='container text-center'>
		<ul class='pagination border-main pagination-big'>
			<li class='margin-left disabled'><a href='#' class='next'>上一条</a></li>
			<li class='margin-left disabled'><a href='#' class='first'>首页</a></li>
			<li class='active margin-left'><a href='#'>1</a></li>
			<li class='margin-left'><a href='?LB=999&page=2'>2</a></li>
			<li class='margin-left'><a href='?LB=999&page=3'>3</a></li>
			<li class='margin-left'><a href='?LB=999&page=4'>4</a></li>
			<li class='margin-left'><a href='?LB=999&page=5'>5</a></li>
			<li class='margin-left'><a href='?LB=999&page=6'>6</a></li>
			<li class='margin-left'><a href='?LB=999&page=7'>7</a></li>
			<li class='margin-left'><a href='?LB=999&page=8'>8</a></li>
			<li class='margin-left'><a href='?LB=999&page=9'>9</a></li>
			<li class='margin-left'><a href='?LB=999&page=14' class='last'>尾页</a></li>
			<li class='margin-left'><a href='?LB=999&page=2' class='next'>下一条</a></li>
		</ul>
	</div>	
	<br><br><br>
	
</div>
  

</div>
<script type="text/javascript">
	function Buy_Item(GID) {//ajax 提交整个表单
		layer.confirm('确定要购买该商品吗?', function(){
			var loadi = layer.load(0); 
			Tjdata={GID:GID};//序列化表单选项
			$("#S_GameUser").empty(); 
			DoAjax("ajax.php?Action=ShopBuy&FQ=<?=$FQ?>",Tjdata,function (data) {
				if(data.status == 'y'){
					layer.alert(data.info, 1, function(){
					   window.location.reload();
					});	
				}else{
					layer.alert(data.info, 5, '温馨提示!');
				}
				layer.close(loadi);
			});
		});
	}
</script>
</body>
</html>