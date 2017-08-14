<?php
namespace Home\Controller;
use Think\Controller;
class AdController extends Controller{

    public function ad()
	{
        $this->display();
    }
    public function adother()
	{
		$url = C('SERVER_HOST').'IPP3Customers/IPP3GetAdBody';
        $data ["sex"]           ="0";
        $data ["province"]      ="吉林省";
        $data ["city"]          ="长春市" ;
        $data ["request_type"]  ="0";
        $data ["appid"]         = I('appid');
        $data ["openid"]        = I('userid');
        $data ["advert_type"]   ="0";
        $data ["out_trade_no"]  ="";
        $data ["mch_name"]      = urldecode(I('product'));
        $data ["body"]          = urldecode(I('product'));
        $data ["pay_type"]      ="0";
        $data ["amount"]        =I('amount');
        $data ["trade_time"]    = "";
        $data ["first_trade"]   ="";
        $data ["second_trade"]  ="";
        $data ["photo_size"]    ="0";
        $data ["distributionid"]    ="1501656130607";
//		$aaa = json_encode($data);
//		\Think\Log::record($aaa);
        $list = http($url,$data);
        $Ad_Info['imgPath'] = $list['Data']['imgPath'];
        $Ad_Info['url'] = $list['Data']['url'];
		$Ad_Info['amount'] =I('amount') ;
		header( 'Location:'.$Ad_Info['url']);


//        $this->display();
    }
	public function adothers()
	{
		$url = C('SERVER_HOST').'IPP3Customers/IPP3GetAdBody';
        $data ["sex"]           ="0";
        $data ["province"]      ="吉林省";
        $data ["city"]          ="长春市" ;
        $data ["request_type"]  ="0";
        $data ["appid"]         = I('appid');
        $data ["openid"]        = I('userid');
        $data ["advert_type"]   ="0";
        $data ["out_trade_no"]  ="";
        $data ["mch_name"]      = urldecode(I('product'));
        $data ["body"]          = urldecode(I('product'));
        $data ["pay_type"]      ="0";
        $data ["amount"]        =I('amount');
        $data ["trade_time"]    = "";
        $data ["first_trade"]   ="";
        $data ["second_trade"]  ="";
        $data ["photo_size"]    ="0";
        $data ["distributionid"]    ="1501656130607";
//		$aaa = json_encode($data);
//		\Think\Log::record($aaa);
        $list = http($url,$data);
		dump($list);exit;
        $Ad_Info['imgPath'] = $list['Data']['imgPath'];
        $Ad_Info['url'] = $list['Data']['url'];
		$Ad_Info['amount'] =I('amount') ;
//		header( 'Location:'.$Ad_Info['url']);

$this->assign(Ad_Info,$Ad_Info);

//        $this->display();
    }
    public function adv()
	{
		$url = C('SERVER_HOST').'IPP3Customers/IPP3GetAdBody';
        $data ["sex"]           ="0";
        $data ["province"]      ="吉林省";
        $data ["city"]          ="长春市" ;
        $data ["request_type"]  ="0";
        $data ["appid"]         = I('appid');
        $data ["openid"]        = I('userid');
        $data ["advert_type"]   ="0";
        $data ["out_trade_no"]  ="";
        $data ["mch_name"]      = urldecode(I('product'));
        $data ["body"]          = urldecode(I('product'));
        $data ["pay_type"]      ="0";
        $data ["amount"]        =I('amount');
        $data ["trade_time"]    = "";
        $data ["first_trade"]   ="";
        $data ["second_trade"]  ="";
        $data ["photo_size"]    ="0";
        $data ["distributionid"]    ="1501656130607";
//		$aaa = json_encode($data);
//		\Think\Log::record($aaa);
        $list = http($url,$data);
        $Ad_Info['imgPath'] = $list['Data']['imgPath'];
        $Ad_Info['url'] = $list['Data']['url'];
		$Ad_Info['amount'] =I('amount') ;

        $this->assign(Ad_Info,$Ad_Info);

        $this->display();
    }
	public function ads()
	{

        $url = C('SERVER_HOST').'IPP3Customers/IPP3GetAdBody';
        $data ["sex"]           ="0";
        $data ["province"]      ="吉林省";
        $data ["city"]          ="长春市" ;
        $data ["request_type"]  ="0";
        $data ["appid"]         = I('appid');
        $data ["openid"]        = I('userid');
        $data ["advert_type"]   ="0";
        $data ["out_trade_no"]  ="";
        $data ["mch_name"]      = urldecode(I('product'));
        $data ["body"]          = urldecode(I('product'));
        $data ["pay_type"]      ="0";
        $data ["amount"]        =I('amount');
        $data ["trade_time"]    = "";
        $data ["first_trade"]   ="";
        $data ["second_trade"]  ="";
        $data ["photo_size"]    ="0";
//		$aaa = json_encode($data);
//		\Think\Log::record($aaa);
        $list = http($url,$data);
        $Ad_Info['imgPath'] = $list['Data']['imgPath'];
        $Ad_Info['url'] = $list['Data']['url'];
		$Ad_Info['amount'] =I('amount') ;

        $this->assign(Ad_Info,$Ad_Info);
        $this->display();



    }

}
