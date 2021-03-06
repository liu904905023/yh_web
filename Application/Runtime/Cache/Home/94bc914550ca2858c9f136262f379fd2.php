<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head><title>向商户付款</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=1.0">
    <meta name="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <link rel="icon" href="/Public/newwxpay/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/Public/newwxpay/css/ywpay.css"/>
    <script>(function (a, b) {
        a[b] = a[b] || function () {
                (a[b].q = a[b].q || []).push(Array.prototype.slice.call(arguments))
            }, a[b].l = 1 * new Date();
    })(window, 'wa');
    window.document.addEventListener('DOMContentLoaded', function () {
        var domLoading = window.performance && window.performance.timing.domLoading || Date.now();
        wa('send', 'timing', 'domLoading', domLoading);
    });</script>
    <script>wa('set', 'page', 'pay Page');
    wa('send', 'page', 1);</script>
    <script>(function (doc, win, undefined) {
        var dpr, rem, scale;
        var docEl = doc.documentElement;
        var fontEl = doc.createElement('style');
        var metaEl = doc.querySelector('meta[name="viewport"]');

        dpr = win.devicePixelRatio || 1;
        rem = docEl.clientWidth / 10;
        scale = 1 / dpr;

        docEl.firstElementChild.appendChild(fontEl);
        fontEl.innerHTML = 'html{font-size: ' + rem + 'px !important;}';

        win.rem2px = function (v) {
            v = parseFloat(v);
            return v * 75
        };
        win.px2rem = function (v) {
            v = parseFloat(v);
            return v / 75;
        };
        win.px2px = function (v) {
            v = parseFloat(v);
            return v * dpr / 2;
        };
        win.dpr = dpr;
        win.rem = rem;
    })(document, window);</script>
</head>
<body>
<form name="searchform" method="post">
    <div class="page">
        <div id="storeInfo">
            <div class="store-info">
                <div class="store-info__avatar"></div>
                <div class="store-info__name-container"><p><?php echo ($CustomerName); ?></p>
                    <!-- <p class="store-info__score js-store-score"></p> --></div>
            </div>
        </div>
        <div id="main">
            <div class="main js-main">
                <div class="main__amount">
                    <div class="main__amount__label">金额</div>
                    <div class="main__amount__number">
                        <span class="currency">&yen;</span><span class="amount js-amount-view"></span><span class="cursor js-cursor"></span><input placeholder="" name="amount" id="amount" type="hidden" readonly>
                    </div>
                </div>
                <div class="main__activity-notify js-main__activity-notify">门店：<?php echo ($UserName); ?></div>
				<input type="hidden" name="userid" value="<?php echo ($userid); ?>">
				<input type="hidden" name="systemUserSysNo" value="<?php echo ($systemUserSysNo); ?>">
				<input type="hidden" name="CustomerName" value="<?php echo ($CustomerName); ?>">
				<input type="hidden" name="AppID" value="<?php echo ($AppID); ?>">
            </div>
        </div>
		<div class="yh_copyright">由<span class="copyright__brand"></span>提供服务支持</div>
        <div id="keyboard">
            <div class="keyboard">
                <div class="keyboard__number-keys">
                    <div class="row">
                        <div data-key="1" class="keyboard__key">1</div>
                        <div data-key="2" class="keyboard__key">2</div>
                        <div data-key="3" class="keyboard__key">3</div>
                    </div>
                    <div class="row">
                        <div data-key="4" class="keyboard__key">4</div>
                        <div data-key="5" class="keyboard__key">5</div>
                        <div data-key="6" class="keyboard__key">6</div>
                    </div>
                    <div class="row">
                        <div data-key="7" class="keyboard__key">7</div>
                        <div data-key="8" class="keyboard__key">8</div>
                        <div data-key="9" class="keyboard__key">9</div>
                    </div>
                    <div class="row">
                        <div data-key="0" class="keyboard__key keyboard__zero">0</div>
                        <div data-key="0" class="keyboard__key"></div>
                        <div data-key="." class="keyboard__key keyboard__point">.</div>
                    </div>
                </div>
                <div class="keyboard__function-keys">
                    <div data-key="del" class="keyboard__key keyboard__del"></div>
                    <div id="submit" data-key="enter" data-disabled="true" class="keyboard__key keyboard__enter keyboard__enter--disabled">
                        <div class="normal normal-2 pay js-pay"><span>确认</span><span>支付</span></div>
                        <!--<button class="normal normal-2 pay js-pay" type="submit"><span>确认1</span><span>支付</span></button>-->
                        <div class="normal normal-3 limit js-limit"><span>单笔金额</span><span>不得超过</span><span class="line js-limit-num"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--<script type="text/javascript" src="/Public/newwxpay/js/wsReporter-cd974708.min.js" defer="true" async="true" crossorigin></script>-->
<!--<script type="text/javascript" src="/Public/newwxpay/js/qqapi.js?_bid=152"></script>-->
<!--<script type="text/javascript" src="/Public/js/jquery-1.7.2.js"></script>-->
<script type="text/javascript" src="/Public/wftali/js/qq-b4a55416.min.js" defer="true" async="true" crossorigin></script>

</body>
</html>