//如果是flash注册页面，而且用户登录状态，则直接跳进游戏||20150525 hhb修改




function checkuser(){ 

  var username  = $('#username').val(); 

  if (username==''){

	$("#userinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">用户名不能为空。</font>");   

   return false; 

  }

    $("#userinfo").html("<img src=\"img/reg_ico_done.jpg\">");   

return true; 

}

function checkpwd(){

  var pwdzz=/\w{6,20}$/;

  var rpwd  = $("#rpwd").val();

    var pwd  = $('#pwd').val();

	if (rpwd==''){

	 if (pwd==''){

      $("#pwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码不能为空。</font>");  

      return false;  

	}else if(!pwdzz.test(pwd)){

      $("#pwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码只能是6-20个字母、数字及下划线。</font>");

      return false; 

      }	

	  else{

      $("#pwdinfo").html("<img src=\"img/reg_ico_done.jpg\">");}}else if(pwd==rpwd){

		  $("#pwdinfo").html("<img src=\"img/reg_ico_done.jpg\">"); 

		  $("#rpwdinfo").html("<img src=\"img/reg_ico_done.jpg\">"); 

			 }else{$("#pwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码不一致。</font>"); }

	  return true;  

  

}



function checkrpwd(){

	var rpwdzz=/\w{6,20}$/;

 	var pwd  = $("#pwd").val();

    var rpwd  = $('#rpwd').val();

	if (rpwd!==''){

	 if (pwd!==rpwd){

      $("#rpwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码不一致。</font>");

      return false;    

	}else if(!rpwdzz.test(rpwd)){

      $("#rpwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码只能是6-20个字母、数字及下划线。</font>");

      return false; 

      }	

	   else{

      $("#rpwdinfo").html("<img src=\"img/reg_ico_done.jpg\">");}

	  return true;  }else{

		   $("#rpwdinfo").html("<img src=\"img/reg_ico_error.jpg\"><font color=\"red\">密码不能为空。</font>");

		  }



}









function checksub(){  

if( checkuser() && checkpwd() && checkrpwd()){

_interval=setInterval(timepp,1000);

return true;

}else{
alert('填写完整注册信息');

return false;

}

}





function loginout(){
	window.location.href='do.php?do=logout';
}



function duihuanyuanb(){
	var gameId=$('#gameId').val();
	var gameName=$("#gameId option:selected").text();
	if(gameId=='0'){
		alert("请选择需要提取元宝到哪个区!");
		return false;
	}
	if(window.confirm("你确定提取元宝到"+gameName+"吗？")){
		window.location.href='do.php?do=dj&gameId='+gameId+"&gameName="+gameName;
        return true;
    }else{
        return false;
    }
}



function chklogin(username,password,idname){
  var userid=$('#txtUsername').val();

  var pwd=$('#txtPassword').val();

  pwd=encodeURIComponent(pwd);

  if(userid==''){

  alert('用户名不能为空');

  return false;

  }

  if(pwd==''){

  alert('密码不能为空');

  return false;

  }
  $("#loginform").submit();
  return true;
}
function openGame(gameName,gameServerId,userName){
	if(gameName==''){
		alert("你还未登录，请登录后在进游戏！");
		return false;
	}
	if(gameServerId==''){
		alert("你还未登录，请登录后在进游戏！");
		return false;
	}
	if(userName==''){
		alert("你还未登录，请登录后在进游戏！");
		return false;
	}
	window.open("game1.php?serverId="+gameServerId+"&is_client=false");  
	
}