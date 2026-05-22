<!DOCTYPE html>
<?php
require 'action.php';
@session_start();
error_reporting(0); //去除报错
$sid = $_GET['sid'];
$plat = $_GET['plat'];
$time = $_GET['time'];
$ktime = $_GET['ktime'];
//echo $time;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="后台管理系统">
  <meta name="keywords" content="后台管理系统" />
  <title>充值查询系统</title>
  <link href="css/root.css" rel="stylesheet">

  </head>
  <body>
<div class="content1">
  <div class="page-header">
    <h1 class="title">充值查询</h1>
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="javascript:location.reload();" class="btn btn-light"><i class="fa fa-refresh"></i>刷新</a>
      </div>
    </div>
  </div>
     <div class="col-md-12" id="guolvlb">
      <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-inline" method="get" action="danding.php">
			  
                <div class="form-group">
				<label for="example1" class="form-label">过滤设置：  </label>
                  <label for="example1" class="form-label">所属平台</label>
                  <select class="selectpicker" name="plat" id="plat">
				  <option value ="">全部平台</option>
				  <?php 
							$query="select * from $database.hunfu ";
                            $gamelist = mysql_query($query,$conn);
							while($row = mysql_fetch_array($gamelist)){ ?>    
                            	<option value ="<?php echo $row['plat'] ?>" <?php if($row['plat']==$plat) echo "selected" ?>><?php echo $row['name'] ?></option>
							<?php } ?>	
                      </select>    
                </div>          
                <div class="form-group">
                  <label for="example1" class="form-label">所属分区</label>
                  <select class="selectpicker" name="sid" id="sid">
				  <option value ="">全部分区</option>
				  <?php 
							$query="select * from $database.server ";
                            $gamelist = mysql_query($query,$conn);							
							while($row = mysql_fetch_array($gamelist)){ ?>    
                            	<option value ="<?php echo $row['sid'] ?>" <?php if($row['sid']==$sid) echo "selected" ?>><?php echo $row['name'].'-'.$row['time'] ?> </option>
							<?php } ?>	
                      </select>
                </div>
                <div class="form-group">                 
				  <div class="input-prepend input-group">
				  <span class="add-on input-group-addon">开始日期</i></span>
                  <input type="text"  class="form-control" value="<?php if($time){echo $time;}else{echo date('Y-m-01 00:00:00');} ?>" name="time" id="dateinfo" />
                </div> </div> 
                <div class="form-group">                 
				  <div class="input-prepend input-group">
				  <span class="add-on input-group-addon">结束日期</span>
                  <input type="text"  class="form-control" value="<?php if($ktime){echo $ktime;}else{echo date('Y-m-01 23:59:5');} ?>" name="ktime" id="dateinfo1" />
                </div> </div> 				
                <button type="submit" class="btn btn-default">过滤</button>
              </form>
            </div>
      </div>
    </div>
<div class="container-padding">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>plat</th>
                        <th>订单号</th>
                        <th>用户账号</th>
						<th>区服</th>
                        <th>充值金额</th>
                        <th>充值元宝</th>
                        <th>充值时间</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>plat</th>
                        <th>订单号</th>
                        <th>用户账号</th>
						<th>区服</th>
                        <th>充值金额</th>
                        <th>充值元宝</th>
                        <th>充值时间</th>
                    </tr>
                </tfoot>
             
                <tbody>
				
				<?php

				$query="SELECT * FROM $database.jk_shop_log where itemtype='兑换充值' ";
				/*if(!$pid&&!$gid&&!$zt){
					echo "没有选择";
				}else{
					$query=$query." where ";
				}*/
				$allrmb=0;
				if($sid){$query=$query." and sid=".$sid;}
				if($plat){$query=$query." and plat= '".$plat."'" ;}
				if($time){$query=$query." and itemtime> '".$time."'" ;}
				if($ktime){$query=$query." and itemtime< '".$ktime."'" ;}
                $query=$query." ORDER BY id DESC";
				//echo $query;
                $result = mysql_query($query,$conn);
                while($row = mysql_fetch_array($result)){	
				$id=$row['id'];
				$allrmb = $allrmb+$row['itemmoney'];
                 ?> 
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['plat'] ?></td>
                        <td><?php echo $row['dingdan'] ?></td>
                        <td><?php echo $row['account'] ?></td>
                        <td><?php echo $row['sid'] ?></td>
                        <td><?php echo $row['itemmoney'] ?></td>
                        <td><?php echo $row['itemnum'] ?></td>
                        <td><?php echo $row['itemtime'] ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>


        </div>

      </div>
    </div>
  </div>
  
<?php 
                echo "当前平台：".$plat;
				echo "开始时间：".$time;
				echo "结束时间：".$ktime;

?>  
<?php echo "充值总金额：" .$allrmb; ?>
<!--?php echo $allrmb; ?-->

</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script src="js/datatables/datatables.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select/bootstrap-select.js"></script>
<script type="text/javascript" src="js/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="js/jeDate/jedate.js"></script>
<script type="text/javascript">

    jeDate({
		dateCell:"#dateinfo",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){}
	});

</script>
<script type="text/javascript">

    jeDate({
		dateCell:"#dateinfo1",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){}
	});

</script>
<script>
$(document).ready(function() {
    $('#example0').DataTable({
                "order": [[ 0, "desc" ]]
              });
} );
</script>

<script>$(function () {
  $('#guolv').on('click', function () {
      $("#guolvlb").toggle(1000);
  });
});</script>
</body>
</html>