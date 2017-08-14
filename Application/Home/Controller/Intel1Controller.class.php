<?php
namespace Home\Controller;
use Think\Controller;
class Intel1Controller extends Controller {
	protected function _initialize(){
		//全局引入微信支付类

    	Vendor('IntelPay.IntelPay');
    	Vendor('WxpayV3.WxPayOut');
		Vendor('AliIsv.AopClient');
		Vendor('AliIsv.AlipayOpenAuthTokenAppRequest');
		Vendor('AliIsv.AlipaySystemOauthTokenRequest');
		
	}
    public function index(){
		echo I('username',0);exit;
		$this->display();	
				
    }
	public function newpay(){
		$systemUserSysNo=I('systemUserSysNo');//2--zijian 2406--zijian123--104 3402--xujiang123--106
		$data['systemUserSysNo'] = $systemUserSysNo;
		$data = json_encode($data);
		$url  = "http://pos.yunlaohu.cn/IPP3Customers/GetPayConfig"; 
		$head = array(
            "Content-Type:application/json;charset=UTF-8",
            "Content-length:" . strlen( $data )
//            "X-Ywkj-Authentication:" . strlen( $data )
        );
		$list = http_request( $url, $data, $head );
		$list = json_decode( $list ,true);
		$CustomerSysNO=$list['CustomerSystemUserBase']['CustomerSysNO']; 
		$CustomerName=$list['CustomerSystemUserBase']['CustomerName']; 
		$Customer_field_one=$list['CustomerSystemUserBase']['Customer_field_one']; 
		$DisplayName=$list['CustomerSystemUserBase']['DisplayName']; 

		/*
			ali config
				$AppID=$list['AliPayConfig']['AppID']; 
				$Merchant_private_key=$list['AliPayConfig']['Merchant_private_key']; 
				$Alipay_public_key=$list['AliPayConfig']['Alipay_public_key']; 
				$AppID=$list['AliPayConfig']['AppID']; 
		*/
		/*
			wx config
				$APPID=$list['WXConfig']['APPID']; 
				$NCHIDs=$list['WXConfig']['NCHID']; 
				$KEY=$list['WXConfig']['KEY']; 
				$APPSECRET=$list['WXConfig']['APPSECRET']; 
				$APPID=$list['WXConfig']['APPID']; 

		*/
//		dump($list);exit;
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			$coco = new \IntelWxPayApi($list['WXConfig']['APPID'],$list['WXConfig']['APPSECRET']);
			$userid = $coco->GetWxOpenId();
		}
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false ) {
			$tools = new \IntelAliPayApi($list['AliPayConfig']['AppID']);
			$Auth_Code =  $tools->GetAuthCode();
			$aop = new \AopClient ();
			$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
			$aop->appId = $list['AliPayConfig']['AppID'];
			$aop->rsaPrivateKeyFilePath =$list['AliPayConfig']['Merchant_private_key'];
			$aop->alipayPublicKey=$list['AliPayConfig']['Alipay_public_key'];
			$aop->apiVersion = '1.0';
			$aop->postCharset='utf-8';
			$aop->format='json';
			$request = new \AlipaySystemOauthTokenRequest ();
			$request->setGrantType("authorization_code");
			$request->setCode("$Auth_Code");
			$result = $aop->execute ($request);
//			$ReturnList =json_decode($result,true);
			$ReturnList = $tools->object_to_array($result);
			$userid=$ReturnList['alipay_system_oauth_token_response']['user_id'];
		}
		
		$this->assign('userid',$userid);
		$this->assign('CustomerName',$CustomerName);
		$this->assign('CustomerSysNO',$CustomerSysNO);
		$this->assign('DisplayName',$DisplayName);
		$this->assign('PayType',$Customer_field_one);
		$this->assign('systemUserSysNo',$systemUserSysNo);
		$this->display();	
		
    }

	public function jsapi(){
	
		$fee = yuan2fee(I('amount'));
		$userid = I('userid');
		$PayType = I('PayType');
		$systemUserSysNo=I('systemUserSysNo');
		$CustomerSysNO=I('CustomerSysNO');
		$CustomerName=I('CustomerName');
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			if($PayType==104||$PayType==106){
				$data['systemUserSysNo']=$_POST['systemUserSysNo'];
				$data['body']=$_POST['Customer'];
				$data['sub_openid']=$_POST['openid'];
				$data['total_fee']=yuan2fee($_POST['amount']);
				$data['callback_url']="web.yunlaohu.cn/index.php/Wft/jsapi";
				$url  = C('SERVER_HOST')."IPP3Swiftpass/WeiXinJsPayApi";
				$data = json_encode( $data );
				$head = array(
					"Content-Type:application/json;charset=UTF-8",
					"Content-length:".strlen( $data ),
					//"X-Ywkj-Authentication:" . strlen( $data ),
				);
				$list = http_request( $url, $data, $head );
				$list = json_decode($list,true);
//				dump($list);exit;
			}else{
				$data['systemUserSysNo'] = $systemUserSysNo;
				$data['total_fee'] = $fee;
				$data['openId'] = $userid;
				$data = json_encode($data);
				$url  = "https://pos.yunlaohu.cn/Payment/Payments/GetUnifiedOrderResult"; 
				$head = array(
					"Content-Type:application/json;charset=UTF-8",
					"Content-length:" . strlen( $data )
		//            "X-Ywkj-Authentication:" . strlen( $data )
				);
				$list = http_request( $url, $data, $head );
				$list = json_decode( $list ,true);
				$jsApiParameters  = json_encode($list['Data']['WxPayData']['m_values']);
				$this->assign('jsApiParameters',$jsApiParameters);

			}
		}
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false ) {
			if($PayType==104||$PayType==106){
				$data = array(
				"buyer_id"=>$userid,
				"total_fee"=>$fee,
				"systemUserSysNo"=>$systemUserSysNo,
				"body"=>$CustomerName,
				"buyer_logon_id"=>""
				);
				$data = json_encode($data);
				$url  = C('SERVER_HOST')."IPP3Swiftpass/AliPayJsPayApi"; 
				$head = array(
					"Content-Type:application/json;charset=UTF-8",
					"Content-length:" . strlen( $data )
		//            "X-Ywkj-Authentication:" . strlen( $data )
				);
				$list = http_request( $url, $data, $head );
				$list = json_decode($list,true);
				$this->assign('out_trade_no',$list['Data']['PayData']['tradeNO']);
			}else{
				$data = array(
				"buyer_id"=>$userid,
				"Total_amount"=>$fee,
				"CustomerSysNo"=>$CustomerSysNO,
				"Old_SysNo"=>$systemUserSysNo
				);
				$data = json_encode($data);
				$url  = C('SERVER_HOST')."IPP3AliPay/TradeCreate"; 
				$head = array(
					"Content-Type:application/json;charset=UTF-8",
					"Content-length:" . strlen( $data )
		//            "X-Ywkj-Authentication:" . strlen( $data )
				);
				$list = http_request( $url, $data, $head );
				$list = json_decode($list,true);
				$data = json_decode($list['Data'],true);
				$this->assign('out_trade_no',$data['alipay_trade_create_response']['trade_no']);
			}
		}

		$this->display();	

	
	
	
	}

    
}