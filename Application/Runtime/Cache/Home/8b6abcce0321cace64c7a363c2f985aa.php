<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

    <script>
     document.addEventListener('AlipayJSBridgeReady',function(){

  var trade_no = '<?php echo ($out_trade_no); ?>';
        AlipayJSBridge.call("tradePay", {
            tradeNO: trade_no
        }, function (result) {
		if ( result.resultCode=="9000") {
					<?php if($Ad_Info['CustomerName']==urlencode('朝阳区鲜果时间饮品店1')){ ?>
					window.location.href ="http://web.yunlaohu.cn/index.php/Ad/adother<?php echo'?appid='.$Ad_Info['AppId'].'&amount='.$Ad_Info['Fee'].'&product='.$Ad_Info['CustomerName'].'&userid='.$Ad_Info['UserId']; ?>";
					<?php }else{ ?>
					window.location.href ="<?php echo C('AD_HOST1').'?appid='.$Ad_Info['AppId'].'&amount='.$Ad_Info['Fee'].'&product='.$Ad_Info['CustomerName'].'&userid='.$Ad_Info['UserId']; ?>";
					<?php } ?>
		}else{
			AlipayJSBridge.call('closeWebview');
		}
	
			//alert(JSON.stringify(result));
           //$("#gg").show();
        });
},false);

	</script>
</html>