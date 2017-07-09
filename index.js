var siteUrl = "http://127.0.0.1/";
var myApp = new Framework7({
	modalTitle: 'QQIP探测',
	material: true,
	swipePanel: 'left',
});
var clipboard = new Clipboard('#copy');
clipboard.on('success', function(e) {
	myApp.addNotification({
		message: '复制成功',
		hold: 1500
	});
	e.clearSelection()
});
var $$ = Dom7;
var mainView = myApp.addView('.view-main', {});
$$(document).on('ajaxStart', function(e) {
	myApp.showIndicator()
});
$$(document).on('ajaxComplete', function(e) {
	myApp.hideIndicator()
});
$$('#token').on("focusout", function(e) {
	var ts = new Date().getTime().toString();
	$$('#get-submit').attr('href', './data.php?token=' + $$('#token').val() + '&_ts=' + ts)
});
$$('.panel-left').on('open', function() {
	$$('.statusbar-overlay').addClass('with-panel-left')
});
$$('.panel-left').on('close', function() {
	$$('.statusbar-overlay').removeClass('with-panel-left')
});
$$('#collect-submit').on('click', function(e) {
	if ($$("#url").val() == "") {
		myApp.addNotification({
			message: '请填写跳转链接。',
			hold: 1500
		});
		return
	}
	if ($$("#shareid").val() == "") {
		myApp.addNotification({
			message: '警告：你没填Shareid！',
			hold: 1500
		});
		return
	}
	var ts = new Date().getTime().toString();
	var token = CryptoJS.MD5(ts);
	var url = "mqqapi://share/to_fri?file_type=news&src_type=web&version=1&generalpastboard=1";
	url = url + "&file_type=news&share_id=";
	url = url + $$("#shareid").val();
	url = url + "&url=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#url").val())));
	url = url + "&image_url=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(siteUrl+"share.php?_U=" + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#cover").val()))) + "&_T=" + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(token))))));
	url = url + "&title=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#title").val())));
	url = url + "&description=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#summary").val())));
	if ($$("#music").val() != "") {
		url = url + "&req_type=";
		url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(2)));
		url = url + "&audioUrl=";
		url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#music").val())))
	}
	url = url + "&callback_type=scheme&thirdAppDisplayName=UVE=&app_name=UVE=&cflag=0&shareType=0";
	console.log(url);
	window.open(url);
	myApp.alert('你的token是：<br/><a id="copy" data-clipboard-text="' + token + '">' + token + '</a><br/>你可以用这个Token来取回数据。')
});

function ipip(ip) {
	myApp.showIndicator();
	$.ajax({
		url: "https://ip.nowtool.cn/tance/ip.php?ip=" + ip,
		success: function(data) {
			myApp.alert(data, '归属地');
			myApp.hideIndicator()
		}
	})
}
myApp.addNotification({
	message: '本站源码来自GitHub：https://github.com/PrintNow/QQipTance',
	hold: 30000
});
myApp.addNotification({
	message: '为了保证能够正常使用，请使用手机浏览器访问并且安装了QQ或其他版本的QQ，切勿使用 手机QQ/微博/微信/QQ浏览器 等内置浏览器或等X5内核的浏览器，否则会没用（X5内核渲染页面有问题）！',
	hold: 15000
});
myApp.addNotification({
	message: '如果出现404，请将跳转链接改为腾讯的链接后再试。',
	hold: 1500
});
