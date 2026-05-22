
//充值窗口
this.charge = function(url)
{
	if(flashvars["pf"] == "qqgame")
	{
		GameAPI.BuyBox.show(
				appid,
				url, //扣费openapi返回的url地址，获取方式见open官网api说明：
				0,  //是否沙箱环境(1:是，0:否)
				"购买道具", 
				function() {
					//close callback
				}, 
				function() {
					//buy callback!
				}
		);
	}
	else
	{
		fusion2.dialog.buy
		({	// 可选。仅当接入“道具寄售”模式的应用使用游戏币快捷支付功能时，必须传该参数。取值固定为“true”。 
			// 其他支付场景不需要传入该参数。 
			disturb : true, 
			 // 必须。 表示购买物品的url参数，url_params是调用Q点直购接口v3/pay/buy_goods或道具寄售接口v3/pay/exchange_goods接口返回的参数。 
			param : url, 
			 // 必须。表示是否使用沙箱测试环境。应用发布前，请务必注释掉该行。 
			// sandbox值为布尔型。true：使用； false或不指定：不使用。（沙箱必须传sandbox : true，现网传sandbox : false或者注释） 
			sandbox : false, 
			 //可选。前台使用的上下文变量，用于回调时识别来源。 
			context : "context", 
			 //可选。用户购买成功时的回调方法，其中opt.context为上述context参数。如果用户购买成功，则立即回调JS中的onSuccess，当用户关闭对话框时再回调onClose。 
			onSuccess : function (opt) {
				opt=opt;
			}, 
			 //可选。用户取消购买时的回调方法，其中opt.context为上述context参数。如果用户购买失败或没有购买，关闭对话框时将先回调onCancel再回调onClose。 
			onCancel : function (opt) {
				opt=opt;
			}, 
			 //可选。如果在实现Q点直购功能时调用了发货通知接口，即需要实现本方法，其中opt.context为上述context参数。如果发货超时，则立即回调onSend。 
			onSend : function(opt) {
				opt=opt;
			}, 
			 //可选。对话框关闭时的回调方法，主要用于对话框关闭后进行UI方面的调整，onSuccess和onCancel则用于应用逻辑的处理，避免过度耦合。 
			onClose : function (opt) {
				opt=opt;
			}
		});
	}
	
};

//开通蓝钻
 this.openBuleVip = function(duration)
 {
	GameAPI.NewOpenGameVIPService.show
	(
		appid,//appid分配给应用的id
		function() {},//close_cb 关闭对话框的回调函数(无参数)
		"VIP.APP"+appid+".PLATqqgamemini",//aid 统计信息，在接入时由qqgame侧分配
		3,//service_type 服务类型，取值如下：1: 普通蓝钻，开通界面将不显示豪华蓝钻   
		//									2: 豪华蓝钻，开通界面将不显示普通蓝钻  
		//									3  同时显示  不传入此参数:  开通界面将显示普通蓝钻和豪华蓝钻选项
		parseInt(duration) > 0 ? String(duration) : null
	);
}
//活动开通蓝钻
 this.openBuleVipAct = function(rettoken, service_type, duration)
{
	mp_id = "UM160614153224171";
	
	GameAPI.NewGameVIPAction.show(
		appid, //分配给应用的id，如29137、100630595等
		mp_id, //活动号(需事先在腾讯营销平台配置相应的活动)
		rettoken, //支付交易标识(在活动中进行支付时取得的token，详见支付类API：v3/pay/get_token )
		flashvars["serverid"], //游戏大区id
		flashvars["openid"], //开放平台用户的唯一标记
		"v3", //协议版本号，目前取值为v3
		function(opt) {}, //关闭对话框的回调函数(无参数)
		service_type, //服务类型，取值如下：
						//1: 普通蓝钻，开通界面将不显示豪华蓝钻
						//2: 豪华蓝钻，开通界面将不显示普通蓝钻
						//3: 同时显示不传入此参数: 开通界面将显示普通蓝钻和豪华蓝钻选项
		parseInt(duration) > 0 ? String(duration) : null //开通时长，取值范围为1 - 24，单位为月。
					//在设置了此参数后，开通界面将不能再手动更改开通时长，付费模式为“按月付费”，且不能手动更改。
					//不传入此参数，付费模式和开通时长均可手动修改。
		//,open_gamevip_mode //蓝钻开通类型，取值如下：
					//1 给自己开通
					//2 给好友开通
					//不传入此参数，则默认为给自己开通
		//,duration_type//付费模式，可设置为month或year，默认为按月开通。带前缀'!'的话则不允许用户变更付费模式，并隐藏付费模式字段。
	);
);
}
//应用回调
this.setApp = function(url)
{
	fusion2.dialog.addClientPanel
	({
		context : "add_Client_Panel_1",

		onSuccess : function (opt) 
		{  
			// opt.context：可选。opt.context为调用该接口时的context透传参数，以识别请求
			//alert("Succeeded: " + opt.context);  
			swf.setAppSucceeded();
		},

		onCancel : function (opt) 
		{  
			// opt.context：可选。opt.context为调用该接口时的context透传参数，以识别请求
			//alert("Cancelled: " + opt.context);  
		},

		onClose : function (opt) 
		{  
			//alert("Closed"); 
		}
	});
}

this.relogin = function(url)
{
	fusion2.dialog.relogin();
}