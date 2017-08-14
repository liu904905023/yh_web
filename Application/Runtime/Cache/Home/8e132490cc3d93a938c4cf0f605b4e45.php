<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<title>微信安全支付</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
</head>
<body>

<script type="text/javascript">
(function(){
var onApiSuccess = function(){};
var onBridgeReady = function(){
WeixinJSBridge.call('hideOptionMenu');
WeixinJSBridge.call('hideToolbar');
onApiSuccess();
};
if (typeof WeixinJSBridge == "undefined"){
if( document.addEventListener ){
document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
}else {
document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
}
}else{
onBridgeReady();
}
var process = false;
var btn = document.getElementById('action');
onApiSuccess = function(){
if(typeof WeixinJSBridge == "undefined") return;
if(process) return;
process = true;
var options = {
"appId" : '<?php echo ($appId); ?>', //公众号名称，由商户传入
"timeStamp" : '<?php echo ($timeStamp); ?>', //时间戳
"nonceStr" : '<?php echo ($nonceStr); ?>', //随机串
"package" : '<?php echo ($package); ?>',//扩展包
"signType" : '<?php echo ($signType); ?>', //微信签名方式:1.sha1
"paySign" : '<?php echo ($paySign); ?>' //微信签名
};
WeixinJSBridge.invoke('getBrandWCPayRequest', options ,function(res){
process = false;
if(res.err_msg == "get_brand_wcpay_request:ok" ) {
					<?php if($Ad_Info['CustomerName']==urlencode('朝阳区鲜果时间饮品店1')){ ?>
					window.location.href ="http://web.yunlaohu.cn/index.php/Ad/adother<?php echo'?appid='.$Ad_Info['AppId'].'&amount='.$Ad_Info['Fee'].'&product='.$Ad_Info['CustomerName'].'&userid='.$Ad_Info['UserId']; ?>";
					<?php }else{ ?>
					window.location.href ="<?php echo C('AD_HOST1').'?appid='.$Ad_Info['AppId'].'&amount='.$Ad_Info['Fee'].'&product='.$Ad_Info['CustomerName'].'&userid='.$Ad_Info['UserId']; ?>";
					<?php } ?>
}else{
WeixinJSBridge.call('closeWindow');
}
//使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
//因此微信团队建议，当收到ok返回时，向商户后台询问是否收到交易成功的通知，
//若收到通知，前端展示交易成功的界面；
//若此时未收到通知，商户后台主动调用查询订单接口，查询订单的当前状态，并反馈给前端展示相应的界面。
});
}
if( document.addEventListener ){
btn.addEventListener('click', onApiSuccess, false);
}else {
btn.attachEvent('onclick', onApiSuccess);
}
onApiSuccess();
})();
pushHistory(); 
    window.addEventListener("popstate", function(e) { 
        alert("我监听到了浏览器的返回按钮事件啦");//根据自己的需求实现自己的功能 
    }, false); 
    function pushHistory() { 
        var state = { 
            title: "title", 
            url: "#"
        }; 
        window.history.pushState(state, "title", "#"); 
    }


</script>
</body>
</html>