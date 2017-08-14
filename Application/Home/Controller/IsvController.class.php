<?php
namespace Home\Controller;
use Think\Controller;
class IsvController extends Controller {
	protected function _initialize(){
		//全局引入微信支付类

    	Vendor('AliIsv.AopClient');
    	Vendor('AliIsv.AlipayOpenAuthTokenAppRequest');
    	Vendor('AliIsv.AlipaySystemOauthTokenRequest');
	}
    public function index(){
        $Code  = $_GET['app_auth_code'];
		$Auth_Code  = $_GET['auth_code'];
        $SysNO =I('systemUserSysNo');
		$data['systemUserSysNo'] = $SysNO;
		$url  = C('SERVER_HOST')."IPP3Customers/GetPayConfig";
		$list = http( $url, $data);
		$public_key = $list['AliPayConfig']['Alipay_public_key'];
		$private_key = $list['AliPayConfig']['Merchant_private_key'];
        $Appid = $list['AliPayConfig']['AppID'];
        $CustomerSysNO=$list['CustomerSystemUserBase']['CustomerSysNO'];
        $CustomerName=$list['CustomerSystemUserBase']['CustomerName'];
        $Customer_field_one=$list['CustomerSystemUserBase']['Customer_field_one'];
        $DisplayName=$list['CustomerSystemUserBase']['DisplayName'];

        if($Code){
		
//////////////////////////////支付宝//////////////////////////////////////////
		$aop = new \AopClient ();
		$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
		$aop->appId = $Appid;
		$aop->rsaPrivateKeyFilePath =$private_key;
		$aop->alipayPublicKey=$public_key;
		$aop->apiVersion = '1.0';
		$aop->postCharset='utf-8';
		$aop->format='json';
		$aop->signType='RSA';
		$request = new \AlipayOpenAuthTokenAppRequest();
		$request->setBizContent("{" .
		"    \"grant_type\":\"authorization_code\"," .
		"    \"code\":\"$Code\"" .
		"  }");
	

		$result = $aop->execute ( $request);
    	$ReturnList =$this-> object_to_array($result);
		$Post_List['AccessToken'] = $ReturnList['alipay_open_auth_token_app_response']['app_auth_token'];
		$Post_List['CustomerServiceSysNo'] = staffquerystore($SysNO);
		if($Post_List['AccessToken']){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		echo "<div style=' position: fixed; top: 50%; margin-top: -50px; width: 100%; text-align: center; height: 100px;font-size:100px; color:#00aaee;'>授权成功</div>";
		}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		echo "<div style=' position: fixed; top: 50%; margin-top: -50px; width: 100%; text-align: center; height: 100px;font-size:100px; color:#ee2200;'>授权失败</div>";
		exit;
		};

		$Post_List = json_encode($Post_List);
		$head = array(
            "Content-Type:application/json;charset=UTF-8",
            "Content-length:" . strlen( $Post_List )
//            "X-Ywkj-Authentication:" . strlen( $Post_List )
        );
//		var_dump($data);exit;
		$Post_Url = "http://payapi.yunlaohu.cn/IPP3Customers/IPP3AliPayInsert";
		$Get_List = http_request( $Post_Url, $Post_List, $head );
		$Get_List = json_decode($Get_List,true);
		
		}
		if($Auth_Code){
            if($Customer_field_one!='102'){
                 header( 'Location:https://openauth.alipay.com/oauth2/publicAppAuthorize.htm?app_id='.$Appid.'&scope=auth_base&redirect_uri=http://'.$_SERVER['HTTP_HOST'].'/index.php/WftAli/index?systemUserSysNo='.$SysNO);
            }else{
            }
			$aop = new \AopClient ();
			$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
			$aop->appId = $Appid;
			$aop->rsaPrivateKeyFilePath =$private_key;
			$aop->alipayPublicKey=$public_key;
			$aop->apiVersion = '1.0';
			$aop->postCharset='utf-8';
			$aop->format='json';
			$request = new \AlipaySystemOauthTokenRequest ();
			$request->setGrantType("authorization_code");
			$request->setCode("$Auth_Code");
			$result = $aop->execute ($request);
			$ReturnList =$this-> object_to_array($result);
			$this -> assign('userid',$ReturnList['alipay_system_oauth_token_response']['user_id']);
			$this -> assign('systemUserSysNo',$SysNO);
			$this -> assign('UserName',$DisplayName);
			$this -> assign('CustomerName',$CustomerName);
			$this -> assign('CustomerSysNO',$CustomerSysNO);
			$this -> assign('AppID',$list['AppID']);
			$this->display('Isv:index'); 
				

		}
		
    }

	public function jsapi(){
	
	
		$money = I('amount');
		$userid = I('userid');
		$systemUserSysNo = I('systemUserSysNo');
		$CustomId =  I('CustomerSysNO');
		$data = array(
			
		"buyer_id"=>$userid,
		"Total_amount"=>yuan2fee($money),
		"CustomerSysNo"=>$CustomId,
		"Old_SysNo"=>$systemUserSysNo
		);
//		var_dump($data);exit;
		$url  = C('SERVER_HOST')."IPP3AliPay/TradeCreate"; 

		$list = http( $url, $data );
		$data = json_decode($list['Data'],true);
//		echo $data['alipay_trade_create_response']['trade_no'];exit;
		$Ad_Info['UserId'] = $userid;
		$Ad_Info['Fee'] = I('amount');
		$Ad_Info['CustomerName'] = urlencode(I('CustomerName'));
		$Ad_Info['AppId'] = I('AppID');
		$Ad_Info['systemUserSysNo'] = $systemUserSysNo;
		$this->assign('Ad_Info',$Ad_Info);
		$this->assign('out_trade_no',$data['alipay_trade_create_response']['trade_no']);
		$this->display();
	
	
	
	
	
	}
public function jsapi1(){
	
	
		$money =I('fee');
		$userid = '2088802694206667';
		$systemUserSysNo = '2';
		$CustomId =  staffquerystore($systemUserSysNo);

		$data = array(
			
		"buyer_id"=>$userid,
		"Total_amount"=>yuan2fee($money),
		"CustomerSysNo"=>$CustomId,
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
//		echo $data['alipay_trade_create_response']['trade_no'];exit;
		$this->assign('out_trade_no',$data['alipay_trade_create_response']['trade_no']);
		$this->display();
	
	
	
	
	
	}










		private function object_to_array($obj) 
		{ 
			$_arr= is_object($obj) ? get_object_vars($obj) : $obj; 
			foreach($_arr as $key=> $val) 
			{ 
				$val= (is_array($val) || is_object($val))?$this->object_to_array($val) : $val; 
				$arr[$key] = $val; 
			} 
			return $arr; 
		}

    
}