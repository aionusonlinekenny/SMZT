<!DOCTYPE html>
<html lang="zh-cn">
<?php 
include_once "../../core/config.php";
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
<body >
<div class="container margin-top">
	<form class="form" id="DHYB">
        <div class="form-group">
            <div class="label text-main"><label for="FQ">请选择选择游戏分区</label></div>
            <div class="field padding-left">
            	<div class="button-group border-main radio">
				<?php  
				//include_once "../../core/config.php";
					$sql="select * from server";
					$result=mysql_query($sql,$conn); 
					while($row=mysql_fetch_array($result))
				{
				?>
	            	<label class="button margin-top" ><input name="FQ" onclick="Ajax_Get_GameUser('<?php echo $row['fqid']?>');" value="<?php echo $row['fqid']?>"  type="radio" data-validate="radio:请选择游戏分区"> <?php echo $row['name']?></label><?php }?>
					
									</div>
            </div>
        </div>
        <div class="form-group">
            <div class="label text-main"><label for="Rid">请选择对应分区游戏角色</label></div>
            <div class="field padding-left">
            	<div class="button-group border-main radio" id="S_GameUser">
	            	
            	</div>
            </div>
        </div>              
        <button class="button bg-main margin-bottom button-block" disabled="disabled" type="button" ID="THTj" onclick="Go_Shop('#DHYB')">【进入网页商城】</button>
		</form>
</div>
<script type="text/javascript">
	function Go_Shop(FormID) {//ajax 兑换元宝
		if (FormYz(FormID)){
			Tjdata=$(FormID).serialize();//序列化表单选项
			DoAjax("ajax.php?Action=GoShop",Tjdata,function (data) {
				if(data.status == 'y'){
					window.location.href = data.Url;
				}else{
					layer.alert(data.info, 5, '温馨提示!');
				}
			});
		}
	}
	function Ajax_Get_GameUser(FQ) {//ajax 提取分区内角色
		Tjdata={FQ:FQ};//序列化表单选项
		var loadi = layer.load(0); 
		$("#S_GameUser").empty(); 
		DoAjax("ajax.php?Action=Get_GameUser",Tjdata,function (data) {
			
			if(data.status == 'y'){
				$("#S_GameUser").html(data.html);
				$("#THTj").attr("disabled",false); 
				$.getScript("/webres/js/pintuer.js");
			}else{
				$("#S_GameUser").html(data.html);
				$("#THTj").attr("disabled",true);  
			}
			layer.close(loadi);
		});
		
	}
</script>
</body>
</html>