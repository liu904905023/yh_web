<?php

class IntelWxPayApis
{
	private $appid;
	public function __construct() {
        $this->appid  = 'wx261671a6d70c4db5';
    }
	public function  GetWxOpenId(){
        if (!isset($_GET['code'])){
            $URL['PHP_SELF'] = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);   //当前页面名称
            $URL['DOMAIN'] = $_SERVER['SERVER_NAME'];  //域名(主机名)
            $URL['QUERY_STRING'] = $_SERVER['QUERY_STRING'];   //URL 参数
            $URL['URI'] = $URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : "");
            $baseUrl = urlencode("http://".$URL['DOMAIN'].$URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : ""));
            $url = $this->__CreateOauthUrlForCode($baseUrl);
            Header("Location: $url");
            exit();
        }else {
            $code = $_GET['code'];
            $openid = $this->getOpenidFromMp($code);
            return $openid;

        }



    }
    public function __CreateOauthUrlForCode($redirectUrl)
    {
        $urlObj["appid"] = $this->appid;
//        $urlObj["appid"] = "wx261671a6d70c4db5";
        $urlObj["redirect_uri"] = "$redirectUrl";
        $urlObj["response_type"] = "code";
        $urlObj["scope"] = "snsapi_base";
        $urlObj["state"] = "STATE"."#wechat_redirect";
        $bizString = $this->ToUrlParams($urlObj);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
    }
    public function ToUrlParams($urlObj)
    {
        $buff = "";
        foreach ($urlObj as $k => $v)
        {
            $buff .= $k . "=" . $v . "&";
        }

        $buff = trim($buff, "&");
        return $buff;
    }
    public function __CreateOauthUrlForOpenid($code)
    {
        $urlObj["appid"] = "wx261671a6d70c4db5";
        $urlObj["secret"] = "0559d78cf2a556b1d7b46988f026114a";
        $urlObj["code"] = $code;
        $urlObj["grant_type"] = "authorization_code";
        $bizString = $this->ToUrlParams($urlObj);
        return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
    }
    public function getOpenidFromMp($code)
    {
        $url = $this->__CreateOauthUrlForOpenid($code);
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        //运行curl，结果以jason形式返回
        $res = curl_exec($ch);
        curl_close($ch);
        //取出openid
        $data = json_decode($res,true);
        $this->data = $data;
        $openid = $data['openid'];
        return $openid;
    }
    
	
}


class IntelAliPayApi{
	protected function _initialize(){
		require_once "../AliIsv/AopClient.php";
		require_once "../AliIsv/AlipayOpenAuthTokenAppRequest.php";
		require_once "../AliIsv/AlipaySystemOauthTokenRequest.php";

	}
	public function  GetWxOpenId(){

        if (!isset($_GET['auth_code'])){
            $URL['PHP_SELF'] = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);   //当前页面名称
            $URL['DOMAIN'] = $_SERVER['SERVER_NAME'];  //域名(主机名)
            $URL['QUERY_STRING'] = $_SERVER['QUERY_STRING'];   //URL 参数
            $URL['URI'] = $URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : "");
            $baseUrl = urlencode("http://".$URL['DOMAIN'].$URL['PHP_SELF'].($URL['QUERY_STRING'] ? "?".$URL['QUERY_STRING'] : ""));
            $url = $this->__CreateOauthUrlForCode($baseUrl);
            Header("Location: $url");
            exit();
        }else {
            $Auth_Code = $_GET['auth_code'];
			$aop = new AopClient();
			$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
			$aop->appId = '2015020700030831';
			$aop->rsaPrivateKeyFilePath ="-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB-----END PUBLIC KEY-----";
			$aop->alipayPublicKey="-----BEGIN RSA PRIVATE KEY----- MIICXQIBAAKBgQCcvoKccIU2qRdTYmDC/17S9wLMJDs5TfqiS7gWnlGU5t/idBby 6oPzGDTR6L8BiOScO+7DFmw2CKijIzaOvvw3UMr5wuF6NeHjIexh1NdIvv4nlMdb DrN9e2b18pP7GRQ0IxkUoDsYEdaQqV4VDiNhQj3gHJUu5ZyJjXjAtr0aLQIDAQAB AoGAS+5uT2Ki5evcBOTvgwc65HAMxt/2YLhJ5j1QHITteHivlIAwbdT1vtnHHLjn btLmDFlsPM2r9jEToJP6ZgRXIaLH/9OwfE+RpHHViOku/DWpQF+SwAMweUmIvxV+ 7+YxDquQ+xNMbuvjpz5F/EjhaFn5V2eb1o6pl5txyb1nE4ECQQDJxolNK7ufWiw6 TWVzWW8ffseXkY7WQYzMrB5CJ8Y6mNSNG8BrpFA3kD2pBJUBgPdmHwz9qR1UM/uf kvSwxX81AkEAxt34tAWrfkJmiDKfXuE+5TgLglyaRpGDU0X7NwjaWvFBOtezD+uO /Hm2OzxKKXz06W17KA5ekgUhGI71q3S2GQJBAIO980vFsB0dXR88BW9JB3sC5gKa cS6HYg0InEEJgy4jNzRi2EHv6Mg+j2PZsAhpUh8FSxAb6SBfSH0qEEWSzbkCQQDC j6ygw+NSdbhGi/BsLUcRj1GDSwINBJRNRmxPHbQzwVEmNp4Td0y/KnzlW0jbakta jSguulA/4BDPLB6ijl8RAkAJOL3VRmFlJ5OG3HFdTap1FkRws2rlNUEm2htCIj+L i0rKtsY7ysz5grtlRcc3kEITcylYxtzL9IOl7gmzXIm0 -----END RSA PRIVATE KEY-----";
			$aop->apiVersion = '1.0';
			$aop->postCharset='utf-8';
			$aop->format='json';
			$request = new AlipaySystemOauthTokenRequest ();
			$request->setGrantType("authorization_code");
			$request->setCode("$Auth_Code");
			$result = $aop->execute ($request);
//			var_dump($result);exit;
//			$ReturnList =$this-> object_to_array($result);
			echo $Auth_Code;exit;
            $openid = $this->getOpenidFromMp($code);
            return $openid;

        }



    }
    public function __CreateOauthUrlForCode($redirectUrl)
    {
        $urlObj["app_id"] = "2015020700030831";
		$urlObj["scope"] = "auth_base";
        $urlObj["redirect_uri"] = "$redirectUrl";
     
        $bizString = $this->ToUrlParams($urlObj);

        return "https://openauth.alipay.com/oauth2/publicAppAuthorize.htm?".$bizString;
    }
    public function ToUrlParams($urlObj)
    {
        $buff = "";
        foreach ($urlObj as $k => $v)
        {
            $buff .= $k . "=" . $v . "&";
        }

        $buff = trim($buff, "&");
        return $buff;
    }
  


}