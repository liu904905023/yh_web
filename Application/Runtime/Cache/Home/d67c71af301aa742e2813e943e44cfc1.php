<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <title>支付成功</title>
	    <link rel="stylesheet" href="/Public/assets/images/Ad/css/spay_scan.css">
		<script type="text/javascript">
		function closeWindow(){  
			var ua = window.navigator.userAgent.toLowerCase();
			if(ua.match(/MicroMessenger/i) == 'micromessenger'){
				WeixinJSBridge.call("closeWindow");
			}
			if(ua.match(/AlipayClient/i) == 'alipayclient'){
				AlipayJSBridge.call('closeWebview');
			}
		}
		document.addEventListener('back', function (e) {
			AlipayJSBridge.call('popTo', {

			index: -2,
			}, function (result) {

			});
		}, false);
		getHistory();
		window.addEventListener('popstate',function(e){
		window.history.go(-2);
		},false);      
		function getHistory(){
			var state={
			title:'',
			url:''  
			};
		window.history.pushState(state,'title');
		}
		</script>
	</head>
	<body>
	    <div class="layout-flex">
			<div class="content" id="box">
				<div class="bg_wt">
					<p class="pay_stop">
						<b class='bigimg'></b>
						<b class='smallimg'></b>
						<span class="ico_success"><img src="/Public/assets/images/Ad/images/ico_success.png" alt=""></span>
						<b class='bigimg'></b>
						<b class='smallimg'></b>
					</p>
					<p class="pay_suc1">支付成功</p>
					<p class="pay_suc2"><span id="money"><?php echo ($Ad_Info['amount']); ?></span></p>
					<p class="btn_p"><a id="finish" class="btn btn_wt border b_all" href="<?php echo ($Ad_Info['url']); ?>">优惠详情</a></p>
				</div>
				<div class="adv">
					<a href="<?php echo ($Ad_Info['url']); ?>"><img id="adimg" src="<?php echo ($Ad_Info['imgPath']); ?>"></a>

				</div>	
				<div class="yh_copyright">由<span class="copyright__brand"></span>提供服务支持</div>
			</div>   
		</div>
	</body>
</html>