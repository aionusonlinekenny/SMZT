var AjaxUrl = "/core/Cx_Ajax.php";

function Ajax_Action(a, b, c) {
	"" == a ? (Tjdata = c, DoAjax(AjaxUrl + "?Action\x3d" + b, Tjdata, function(a) {
		"y" == a.status ? layer.alert(a.info, 1, function() {
			a.url ? 0 <= a.url.indexOf("/") ? parent.location.href = a.url : window.location.href = a.url : window.location.reload()
		}) : layer.alert(a.info, 5, function() {
			window.location.reload()
		})
	})) : FormYz("#" + a) && (Tjdata = $("#" + a).serialize(), DoAjax(AjaxUrl + "?Action\x3d" + a, Tjdata, function(a) {
		"y" == a.status ? layer.alert(a.info, 1, function() {
			a.url ? 0 <= a.url.indexOf("/") ? parent.location.href = a.url : window.location.href = a.url : window.location.reload()
		}) : layer.alert(a.info, 5, function() {
			window.location.reload()
		})
	}))
}
function DoAjax(a, b, c) {
	$.ajax({
		url: a,
		type: "POST",
		data: b,
		dataType: "json",
		cache: !1,
		error: function() {
			layer.alert("网络繁忙,请稍后再试", 8,
			function() {
				window.location.reload()
			})
		},
		success: c
	})
}

function FormYz(a) {
	$(a).find("input[data-validate],textarea[data-validate],select[data-validate]").trigger("blur");
	return $(a).find(".check-error").length ? ($(a).find(".check-error").first().find("input[data-validate],textarea[data-validate],select[data-validate]").first().focus().select(), !1) : !0
}
function OpenApp(a) {
	a = decodeURIComponent(a);
	a = JSON.parse(a);
	if ("1" == a.Is_Max) var b = 0.99 * $(window).height(),
		c = 0.99 * $(window).width();
	else c = a.W_w, b = a.W_h;
	var d = a.fn;
	$.layer({
		type: 2,
		title: [a.title, "background:#0ae;"],
		shade: [0],
		border: [3, 1, "#0ae"],
		end: function() {
			"" != d && eval(d)
		},
		maxmin: !1,
		fix: !0,
		moveOut: !0,
		area: [c, b],
		iframe: {
			src: a.Url,
			scrolling: "auto"
		}
	})
}
function changeVcode(){
$("#imgVcode").attr("src","/core/VCode.php?v="+(new Date).getTime())
};