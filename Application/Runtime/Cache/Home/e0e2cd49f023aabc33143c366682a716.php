<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
	<script src="/Public/js/jquery-1.10.2.min.js"></script>
    <title></title>
    <script type="text/javascript">
	//调用微信JS api 支付
                callpay();
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo ($jsApiParameters); ?>,
			function(res){
				  if ( res.err_msg == "get_brand_wcpay_request:ok" ) {
//                        alert( '交易完成！' );
						//$("#gg").show();
						//$(".close").click(function(){
                        //location.href ="/index.php/Ad/MinSheng";
                       window.location.href ="<?php echo C('AD_HOST1').'?appid='.$Ad_Info['AppId'].'&amount='.$Ad_Info['Fee'].'&product='.$Ad_Info['CustomerName'].'&userid='.$Ad_Info['UserId']; ?>";

						//});
                    } else {
//                        alert( '交易未完成！' );
                        WeixinJSBridge.call( 'closeWindow' );
                    }
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<style>
            html,body {
                height:100%;
                margin:0;
                padding:0;
                overflow: hidden;
            }
            .close {
                position: fixed;
                right: 10px;
                top: 10px;
            }
            #gg {
                display: none;
                width: 100%;
                height: 100%;
            }
            .top1 {
                width: 100%;
                height: 67.34%;
                display: block;
                overflow: hidden;
            }
            .top2 {
                width: 100%;
                height: 5.89%;
                display: block;
                overflow: hidden;
            }
            .top3 {
                width: 100%;
                height: 7.04%;
                display: block;
                overflow: hidden;
            }
            .top4 {
                width: 100%;
                height: 19.8%;
                display: block;
            }
        </style>
</head>

	<body>
        <div id="gg">
            <div class="close"><img src="/Public/assets/img/icon_close_alt2.png" alt="关闭"></div>
            <div class="top1">
                <img src="/Public/assets/img/top1.jpg" height="100%" width="100%" alt="">
            </div>
            <div class="top2">
                <a href="tel:043181060393">
                    <img src="/Public/assets/img/tel1.jpg" height="100%" width="100%" alt="">
                </a>
            </div>
            <div class="top3">
                <a href="tel:4000600436">
                    <img src="/Public/assets/img/tel2.jpg" height="100%" width="100%" alt="">
                </a>
            </div>
            <div class="top4">
                <img src="/Public/assets/img/bottom.jpg" height="100%" width="100%" alt="">
            </div>
        </div>
    </body>
</html>