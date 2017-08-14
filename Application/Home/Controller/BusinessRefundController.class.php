<?php
namespace Home\Controller;
//use Think\Controller;
use Common\Compose\Base;

class BusinessRefundController extends Base {

    public function refund(){

        R("Base/getMenu");
        $this->display();

    }

    public function refundlist(){

        $Time_Start 	= $_POST['Time_Start'];
        $Time_end   	= $_POST['Time_end'];
        $staffloginname = I('staffloginname',"");
        $realname 		= I('realname',"");
        $ordernum 	    = I('ordernum',"");
        $PageNumber 	= I('PageNumber',"");
        $PageSize 		= I('PageSize',"");
        $Ordertype 		= I('Ordertype',"");
        $serviceno 		= session('SysNO');

        $data = array(

            "CustomerSysNo"	    => $serviceno,
            "LoginName"			=> $staffloginname,
            "DisplayName"		=> $realname,
            "out_trade_no"		=> $ordernum,
            "PhoneNumber"		=> $phone,
            "Pay_Type"			=> $Ordertype,
            "Time_Start"		=> $Time_Start,
            "Time_end"			=> $Time_end

        );

        $data['PagingInfo']['PageSize'] = $PageSize;
        $data['PagingInfo']['PageNumber'] = $PageNumber;


        $url = C('SERVER_HOST')."IPP3Order/IPP3OrderFundList_Shop_SP";
        $list = http($url,$data);
//         var_dump($list);exit();

        foreach ($list['model'] as $row=>$val){

            $info['model'][$row]['oldsysno']=$val['Old_SysNo'];                 //员工主键
            $info['model'][$row]['sysno']=$val['SysNo'];                        //订单主键
            $info['model'][$row]['loginname']=$val['LoginName'];                //员工登录名
            $info['model'][$row]['displayname']=$val['DisplayName'];            //员工真实姓名
            $info['model'][$row]['outtradeno']=$val['Out_trade_no'];            //订单号
            $info['model'][$row]['paytype']=CheckOrderType($val['Pay_Type']);   //交易类型
            $info['model'][$row]['totalfee']=fee2yuan($val['Total_fee']);       //总金额
            $info['model'][$row]['cashfee']=fee2yuan($val['Cash_fee']);         //折后金额
            $info['model'][$row]['refundfee']=fee2yuan($val['refund_fee']);     //已退金额
            $info['model'][$row]['fee']=fee2yuan($val['fee']);                  //可退金额
            $info['model'][$row]['refundcount']=$val['refundCount'];            //退款笔数
            $info['model'][$row]['timestart']=$val['Time_Start'];               //交易时间
            $info['model'][$row]['Pay_Types']=$val['Pay_Type'];
            $info['model'][$row]['Pay_Type']=CheckOrderType($val['Pay_Type']);

        }

        $info['totalCount'] =$list['totalCount'];
        $this->ajaxReturn($info);

    }
    public function refundinsert(){//退款新增
        $Out_trade_no = $_POST['out_trade_no'];
        $Total_Fee = yuan2fee($_POST['total_fee']);
        $Refund_Fee = yuan2fee($_POST['refund_fee']);
        $SOSysNo = $_POST['SOSysNo'];
        $OldSysNo = $_POST['OldSysNo'];
        $PayType = $_POST['paytype'];
        $TimeStart = $_POST['timestart'];
        $Time=explode(" ",$TimeStart);
        $Ymd = $Time[0];
        $NowDay = date("Y-m-d",time());
        if(strtotime($Ymd)==strtotime($NowDay)){
            $data = array(
                "refund_fee"=>$Refund_Fee,
                "total_fee"=>$Total_Fee,
                "SOSysNo"=>$SOSysNo

            );
            if($PayType==104||$PayType==105||$PayType==106||$PayType==107){
                $data["Transaction_id"]=$Out_trade_no;

            }else{
                $data["out_trade_no"]=$Out_trade_no;

            }

                $data['YwMch_id2']=$OldSysNo;

            if($PayType=='102'){
                $url = C('SERVER_HOST')."POS/POSRefundInsert";
            }
            if($PayType=='103'){
                $url = C('SERVER_HOST')."IPP3AliPay/AliPayRefundUnion";
            }
            if($PayType=='104'||$PayType=='105'||$PayType==106||$PayType==107){
                $url = C('SERVER_HOST')."IPP3Swiftpass/RefundApiUnion";
            }

            $list = http( $url,$data);

        }else{
            $list['Description']="非当天交易不允许退款";
        }

        $this->ajaxReturn( $list ,json);
    }


}