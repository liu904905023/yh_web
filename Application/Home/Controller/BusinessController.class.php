<?php


namespace Home\Controller;


//use Think\Controller;


use Common\Compose\Base;


class BusinessController extends Base {




    public function Business() {

        R("Base/getMenu");


        $this->display();

    }


    public function business_register() {

        R("Base/getMenu");

        //var_dump(session(data));

        $this->display();

    }


    public function business_detail() {


        $SysNO = I('SysNo', '');

        $data['sysno'] = $SysNO;

        $data['CustomersTopSysNo'] = session('SysNO');

        $url = C('SERVER_HOST') . "IPP3Customers/IPP3CustomerShopList";

        $list = http($url, $data);

        $info['customer'] = $list['model'][0]['Customer'];

        $info['phone'] = $list['model'][0]['Phone'];

        $info['CustomerName'] = $list['model'][0]['CustomerName'];

        $info['Email'] = $list['model'][0]['Email'];

        $info['Fax'] = $list['model'][0]['Fax'];

        $info['DwellAddress'] = $list['model'][0]['DwellAddress'];

        $info['DwellZip'] = $list['model'][0]['DwellZip'];

        $info['user_rate'] = $list['model'][0]['UserRate'];

        $info['rate'] = $list['model'][0]['Rate'];

        $info['RegisterTime'] = date("Y-m-d H:i:s", substr($list['model'][0]['RegisterTime'], 6, 10));

        $StaffSysNo = $this->QueryStaff($SysNO);

        $info['TopStaffId'] = $this->QueryStaffInfo($StaffSysNo);

        $post_rate_data['CustomerSysNo'] = $SysNO;

		$post_rate_url = C('SERVER_HOST') . 'IPP3Customers/CustomerServiceRateList';

		$post_rate_list = http($post_rate_url, $post_rate_data);

        if ($post_rate_list) {
            foreach ($post_rate_list as $row=>$val){
                $info['typerate'][$val['PassageWay']][$val['Type']]=$val['Rate'];
            }

        }


		$this->ajaxreturn($info);

	

	}


    public function QueryStaff($id) {

        $data['CustomerServiceSysNo'] = $id;

        $list = http(C('SERVER_HOST') . "IPP3Customers/IPP3CustomerUsersList", $data);

        return $list['model'][0]['SystemUserSysNo'];

    }


    public function QueryStaffInfo($id) {

        $data['SysNo'] = $id;



        $list = http(C('SERVER_HOST') . "IPP3Customers/IPP3SystemUserList", $data);


        return $list['model'][0]['DisplayName'];


    }

    public function customerrateupdate() {

        $data['SysNo'] = I('SysNo');

        $data['UserRate'] = I('Rate');

        $list = http(C('SERVER_HOST') . "IPP3Customers/IPP3CustomerUserRateUpdate", $data);


        $this->ajaxreturn($list);


    }

    public function businessregister (){

        $PassageWay = I("Customer_Wft")?I("Customer_Wft"):102;
        $Zfb_Rate   = I("zfb_rate");    //支付宝费率
        $Wx_Rate    = I("wx_rate");     //微信费率

        $url  = C('SERVER_HOST')."IPP3Customers/IPP3CustomerShopInsert";

        $arr  = array(

            "Customer"         => I( "username" ),
            "Pwd"              => I( "passwd" ),
            "CustomerName"     => I( "realname" ),
            "Email"            => I( "email" ),
            "Phone"            => I( "username" ),
            "Fax"              => I( "fax" ),
            "SystemClassID"    => I( "systemclassid" ),
            "SystemClassName"  => I( "systemclassname" ),
            "DwellAddress"     => I( "address" ),
            "DwellAddressID"     => I( "AddressNum" ),
            "DwellZip"         => I( "zipcode" ),
            "Rate"         => (double)I( "sx_rate" ),
            "CustomersType"    => "1",
            //"Status"           => 0,
            "Vip_CustomerType" => "1",
            "Customer_field_one" => I("Customer_Wft"),
            "Customer_field_two"=>$_SERVER['HTTP_HOST'],
            "SystemUserSysNo" => I("SystemUserSysNo"),
            "NickName" => I("nickname")

        );

        $data  = http($url, $arr);

        if($data['Code']==0){

            $CustomerSysno = $data['Data']['CustomerServiceSysNo'];
            $this -> CustomerUserRoleInsert($CustomerSysno);
            $Rate_Insert_Url  = C( 'SERVER_HOST' ) . "IPP3Customers/CustomerServiceRateADD";
            $Zfb_Rate_Insert_Data  = array(
                "CustomerSysNo"   => $CustomerSysno,
                "Rate"            => $Zfb_Rate,
                "PassageWay"     => $PassageWay
            );
            $Wx_Rate_Insert_Data  = array(
                "CustomerSysNo"   => $CustomerSysno,
                "Rate"            => $Wx_Rate,
                "PassageWay"      => $PassageWay
            );
            if ($PassageWay == 102){//翼惠通道
                $Zfb_Rate_Insert_Data['Type']=103;
                $Wx_Rate_Insert_Data['Type']=102;
            }elseif ($PassageWay == 104){//兴业通道
                $Zfb_Rate_Insert_Data['Type']=105;
                $Wx_Rate_Insert_Data['Type']=104;
            }elseif ($PassageWay == 106){//浦发通道
                $Zfb_Rate_Insert_Data['Type']=107;
                $Wx_Rate_Insert_Data['Type']=106;
            }elseif ($PassageWay == 108){//浦发口碑
                $Zfb_Rate_Insert_Data['Type']=107;
                $Wx_Rate_Insert_Data['Type']=106;
            }
            $Rate_Insert_Data =array($Zfb_Rate_Insert_Data,$Wx_Rate_Insert_Data);
            $ratedata = http($Rate_Insert_Url, $Rate_Insert_Data);
            if ($data['Code']==0){
                $data['Description']="商户注册成功";
            }else{
                $data['Description']="商户注册成功".$ratedata['Description'];
            }
        }
        $this->ajaxReturn( $data );
    }


////调拨

    public function customeruserupdate() {

        $data = array(

            "CustomerServiceSysNo" => I("customerid"),

            "SystemUserSysNo" => I("staffid")

        );



        $url = C('SERVER_HOST') . "IPP3Customers/IPP3CustomerUserUpdate";

        $res = http($url, $data);


        $this->ajaxReturn($res);


    }

    private function servicequerycustomer($Customers) {


        if (session(flag) == 0) {

            $data['CustomersTopSysNo'] = session(data)['SysNo'];

        }


        $data['Customer'] = $Customers;

        $data['PagingInfo']['PageSize'] = 1;

        $data['PagingInfo']['PageNumber'] = 0;

        $url = C('SERVER_HOST') . "IPP3Customers/IPP3CustomerList";



        $list = http($url, $data);


        return $list['model'][0]['SysNo'];


    }


    private function CustomerUserRoleInsert($CustomerServiceSysNo) {

        $RoleList = array(0 => 12, 1 => 13, 2 => 14, 3 => 22, 4 => 23, 5 => 24, 6 => 25, 7 => 27);

        foreach ($RoleList as $row) {

            $data[] = array(

                "SystemRoleSysNo" => $row,

                "CustomerServiceSysNo" => $CustomerServiceSysNo,

                "InUser" => $CustomerServiceSysNo,

                "EditUser" => $CustomerServiceSysNo

            );

        }




        $list = http(C('SERVER_HOST') . "IPP3Customers/IPP3CustomerRoleInsert", $data);



    }


}

