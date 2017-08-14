<?php if (!defined('THINK_PATH')) exit();?><html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>向商户付款</title>
    <link rel="stylesheet" href="/Public/newpay20170811/css/v3/default.css">
    <link rel="stylesheet" href="/Public/newpay20170811/css/v3/spay_scan.css?v=2.0">
</head>
<body>

    <div class="layout-flex">
        <!-- content start -->
        <div class="content">
            <p class="sico_pay_p"><span class="sico_pay"></span></p>
            <div class="amount_title"><span><?php echo ($CustomerName); ?></span></div>
            <div class="set_amount">
                <div class="amount_hd">消费总额</div>
                <div class="amount_bd">
                    <i class="i_money">¥</i>
                    <span class="input_simu" id="amount"></span>
                    <!-- 模拟input -->
                    <em class="line_simu" id="line"></em>
                    <!-- 模拟闪烁的光标 -->
                    <div class="clearBtn none" id="clearBtn" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><b class="btn_clear"></b></div>
                    <!-- 清除按钮 -->
                </div>
            </div>
            <p class="remark"><span id="remarkBtn" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">门店:<?php echo ($DisplayName); ?></span></p>
        </div>
        <!-- content end -->
		<div class="yh_copyright">由<span class="copyright__brand"></span>提供服务支持</div>
        <!-- 键盘 -->
        <div class="keyboard">
            <table class="key_table" id="keyboard" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <tbody><tr>
                    <td class="key border b_rgt_btm" data-value="1">1</td>
                    <td class="key border b_rgt_btm" data-value="2">2</td>
                    <td class="key border b_rgt_btm" data-value="3">3</td>
                    <td class="key border b_btm clear" data-value="delete"></td>
                </tr>
                <tr>
                    <td class="key border b_rgt_btm" data-value="4">4</td>
                    <td class="key border b_rgt_btm" data-value="5">5</td>
                    <td class="key border b_rgt_btm" data-value="6">6</td>
                    <td class="pay_btn disable" rowspan="3" id="payBtn" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><em>付</em>款</td>
                </tr>
                <tr>
                    <td class="key border b_rgt_btm" data-value="7">7</td>
                    <td class="key border b_rgt_btm" data-value="8">8</td>
                    <td class="key border b_rgt_btm" data-value="9">9</td>
                </tr>
                <tr>
                    <td colspan="2" class="key border b_rgt" data-value="0">0</td>
                    <td class="key border b_rgt" data-value="dot">.</td>
                </tr>
            </tbody></table>
        </div>

        <!-- 添加备注弹窗 -->
       
    </div>
    
    <div class="none">
        

						<input type="hidden" id="userid" value="<?php echo ($userid); ?>">
						<input type="hidden" id="systemUserSysNo" value="<?php echo ($systemUserSysNo); ?>">
						<input type="hidden" id="CustomerSysNO" value="<?php echo ($CustomerSysNO); ?>">
						<input type="hidden" id="CustomerName" value="<?php echo ($CustomerName); ?>">
						<input type="hidden" id="PayType" value="<?php echo ($PayType); ?>">
						<input type="hidden" id="AppId" value="<?php echo ($AppId); ?>">
						<input type="hidden" id="DisplayName" value="<?php echo ($DisplayName); ?>">
    </div>
    
    <div class="circle-box none"><div class="circle_animate"><div class="circle"></div><p></p></div></div><div class="pop_wrapper none"><div class="pop_outer"><div class="pop_cont"><div class="pop_tip"></div><p class="border b_top"><span class="pop_wbtn">我知道了</span></p></div></div></div><script src="/Public/newpay20170811/js/v3/hammer.js"></script>
    <script src="/Public/newpay20170811/js/v3/common.js?v=1"></script>
    <script>
    //insert
    function keypress(e){
        e.preventDefault();
        var target = e.target;
        var value = target.getAttribute('data-value');
        var dot = valueCur.match(/\.\d{2,}$/);
        if(!value || (value !== 'delete' && dot)){
            return;
        }
        switch(value){
            case '0' :
                valueCur = valueCur === '0' ? valueCur : valueCur + value;
                break;
            case 'dot' : 
                valueCur = valueCur === '' ? valueCur : valueCur.indexOf('.') > -1 ? valueCur : valueCur + '.'; 
                break;
            case 'delete' : 
                valueCur = valueCur.slice(0,valueCur.length-1);
                break;
            default : 
                valueCur = valueCur === '0' ? value : valueCur + value;
        }
        format();
    }

    //format
    function format(){
        var arr = valueCur.split('.');
        var right = arr.length === 2 ? '.'+arr[1] : '';
        var num = arr[0];
        var left = '';
        while(num.length > 3){
            left = ',' + num.slice(-3) + left;
            num = num.slice(0,num.length - 3);
        }
        left = num + left;
        valueFormat = left+right;
        valueFinal = valueCur === '' ? 0 : parseFloat(valueCur);
        check();
    }

    //check
    function check(){
        amount.innerHTML = valueFormat;
        if(valueFormat.length > 0){
            clearBtn.classList.remove('none');
        }else{
            clearBtn.classList.add('none');
        }
        if(valueFinal === 0 || valueCur.match(/\.$/)){
            payBtn.classList.add('disable');
        }else{
            payBtn.classList.remove('disable');
        }
    }

    //clear
    function clearFun(){
        valueCur = '';
        valueFormat = '';
        valueFinal = 0;
        amount.innerHTML = '';
        clearBtn.classList.add('none');
        payBtn.classList.add('disable');
    }

   
    //submit
    function submitFun(){
        if(!submitAble || payBtn.classList.contains('disable')){
            return;
        }
        if(valueFinal === 0){
            tips.show('请输入金额！');
            return;
        }

        if(valueFinal > 50000){
            tips.show('支付金额不能大于5万');
            return;
        }

        submitAble = false;
        loading.show();

        data.amount = valueFinal;

        new Post({
            url : '/index.php/Intels/newpay',
            data : data,
            error : function(){
                loading.hide();
                submitAble = true;
                tips.show('网络异常，请稍后重试！');
            },
            success : function(response){
                if(response){
                    var payInfo = response['PayInfo'];
					<?php if( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ){ ?>
                    WeixinJSBridge.invoke('getBrandWCPayRequest',{
                        "appId": payInfo.appId, //公众号名称，由商户传入
                        "timeStamp": payInfo.timeStamp, //时间戳，自1970 年以来的秒数
                        "nonceStr": payInfo.nonceStr, //随机串
                        "package": payInfo.package,
                        "signType": payInfo.signType, //微信签名方式:
                        "paySign": payInfo.paySign//微信签名,
                    },function(res){
                        if (res.err_msg == "get_brand_wcpay_request:ok") {
                            // 此处可以使用此方式判断前端返回,微信团队郑重提示：res.err_msg 将在用户支付成功后返回ok，但并不保证它绝对可靠。
					location.href ="<?php echo C('AD_HOST1'); ?>"+'?appid='+response['Ad_Info']['AppId']+'&amount='+response['Ad_Info']['Fee']+'&product='+response['Ad_Info']['CustomerName']+'&userid='+response['Ad_Info']['UserId'];
                        }else{

						}
                    });
					<?php } ?>
					<?php if ( strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false ){ ?>
						var trade_no = response['PayInfo'];
						AlipayJSBridge.call("tradePay", {
							tradeNO: trade_no
						}, function (result) {
							if ( result.resultCode=="9000") {
								location.href ="<?php echo C('AD_HOST1'); ?>"+'?appid='+response['Ad_Info']['AppId']+'&amount='+response['Ad_Info']['Fee']+'&product='+response['Ad_Info']['CustomerName']+'&userid='+response['Ad_Info']['UserId'];
							}else{
								AlipayJSBridge.call('closeWebview');
							}
						});
					<?php } ?>
                }
//else if(response.status == 201){
//                    location.href = "/spay/jumpToReduce?map="
//                    + JSON.stringify(response.message);
//                }else{
//                    tips.show(response.message);
//                }
                loading.hide();
                submitAble = true;
            }
        });

    }

    var keyboard = getId('keyboard');
    var amount = getId('amount');
    var clearBtn = getId('clearBtn');
    var payBtn = getId('payBtn');
    var valueCur = '';
    var valueFormat = '';
    var valueFinal = 0;
    var submitAble = true;
    var data = {

        PayType : getId('PayType').value,
        userid : getId('userid').value,
        systemUserSysNo : getId('systemUserSysNo').value,
        CustomerSysNO : getId('CustomerSysNO').value,
        CustomerName : getId('CustomerName').value,
        CustomerName : getId('CustomerName').value,
        PayType : getId('PayType').value,
        AppId : getId('AppId').value,
        DisplayName : getId('DisplayName').value,
    };

    new Hammer(keyboard).on('tap',keypress);
    new Hammer(payBtn).on('tap',submitFun);
    new Hammer(clearBtn).on('tap',clearFun);


    </script>

</body></html>