<?php

namespace Home\Controller;

//use Think\Controller;

use Common\Compose\Base;

class ConffController extends Base{

//class ConffController extends Controller{

    public function index(){
        
        $this->display();
    }

    /**
     * 服务商配置
     */
    public function wxConfig(){
		// var_dump(SESSION('data'));
    R("Base/getMenu");
        if( IS_POST ){

            $url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerConfigEdit";
            $arr  = array(
//                "CustomerServiceSysNO" => 1,
                "CustomerServiceSysNO" => session( 'data' )['SysNo'],
                "APPID"                => I( 'sx_appid', '', 'htmlspecialchars' ),
                "NCHID"                => I( 'sx_fwsbh', '', 'htmlspecialchars' ),
                "KEY"                  => I( 'sx_shkey', '', 'htmlspecialchars' ),
                "APPSECRET"            => I( 'sx_appsecret', '','htmlspecialchars' ),
                "sub_mch_id"           => (int) I( 'sx_zshid', '','htmlspecialchars' ),
                "SSLCERT_PATH"         => I( 'safe', '','htmlspecialchars' ),
                "Status"               => 0,
                "SSLCERT_PASSWORD"     => (int) I( 'sx_pass', '','htmlspecialchars' ),
            );

            $data = json_encode( $arr );
            $head = array(
                "Content-Type:application/json;charset=UTF-8",
                "Content-length:" . strlen( $data )
            );
            $res  = http_request( $url, $data, $head );

            $arrData = json_decode( $res, TRUE );
            $this->ajaxReturn( $arrData );
            exit();

        }else{
            $url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerConfig";
            $arr  = array(
                'CustomerServiceSysNo' => session( 'data' )['SysNo'],
            );
            $data = json_encode( $arr );
            $head = array(
                "Content-Type:application/json;charset=UTF-8",
                "Content-length:" . strlen( $data )
            );
            $res  = http_request( $url, $data, $head );

            $arrData = json_decode( $res, TRUE );

            $this->assign( 'data', $arrData );
        }
        $this->display( 'commercial_tenant_config' );
    }

//查询页
    public function infoDetail(){
        R("Base/getMenu");
        if( IS_AJAX ){

            $url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserUpdate";
            $arr = array(
                "SysNo"            => session('data')['SysNO'],
                "PhoneNumber"         => I('Phone'),
                "DisplayName"         => I('displayname'),
                "Alipay_store_id"         => I('store_id'),
                "Email"         => I('Email'),
                "Rate"         => (double)I('user_rate'),
				"DwellAddress"     => I( "address" ),
				"DwellAddressID"     => I( "AddressNum" ),
				"EditUser" =>session('servicestoreno')
               
            );
            $data  = http($url, $arr);
            if ($data['Code']==0) {
                    $select_url_get_ali_url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserExtendList";
                    $insert_url_get_ali_url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserExtendInsert";
                    $update_url_get_ali_url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserExtendUpdate";
                    $arr_get_ali_url["SystemUserSysNo"]  = session('data')['SysNO'];
                    $data_ali  = http($select_url_get_ali_url, $arr_get_ali_url);
                    if ($data_ali) {
                        $arr_get_ali_url["Ali_url"]  = I('Ali_Url')?I('Ali_Url'):0;
                        $data = http($update_url_get_ali_url, $arr_get_ali_url);
                        $ali_url_code = ($data['Code']);
                    }else{
                        $arr_get_ali_url["Ali_url"]  = I('Ali_Url')?I('Ali_Url'):0;
                        $data = http($insert_url_get_ali_url, $arr_get_ali_url);
                        $ali_url_code = ($data['Code']);

                    }
                    if ($ali_url_code==0) {
                        $Return_Info['Description']='员工修改成功!';

                    }else{
                        $Return_Info['Description']='员工修改成功,浦发口碑修改失败!';
                    }
               


            }else{

                $Return_Info['Description']='员工修改失败!';
            }

            $this->ajaxReturn( $Return_Info, 'json' );
            exit();
        }else{

            $url_staff_register  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserList";
            $arr_staff_register  = array(
                "SysNo" => session('data')['SysNO'],
            );
            $data  = http($url_staff_register, $arr_staff_register);
            $url_get_ali_url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserExtendList";
            $arr_get_ali_url  = array(
                "systemUserSysNo" => session('data')['SysNO'],
            );
            $data_ali  = http($url_get_ali_url, $arr_get_ali_url);
            $DetailAddress = explode("-",$data['model'][0]['DwellAddress']);
			$Province=$this->GetAddress(0);
			$City=$this->GetAddress($data['model'][0]['Province']);
			$Country=$this->GetAddress($data['model'][0]['City']);
			$this->assign( 'data', $data['model'][0] );
			$this->assign( 'Ali_Url',$data_ali['Ali_url'] );
			if($data['model'][0]['DwellAddressID']){
				$this->assign( 'Province', $Province);
				$this->assign( 'Country', $Country );
				$this->assign( 'City', $City );
			}else{
				$this->assign( 'Province', $Province);
				$this->assign( 'Country', array(0=>array("region_id"=>'','region_name'=>"请选择区")) );
				$this->assign( 'City',array(0=>array("region_id"=>'','region_name'=>"请选择市")) );
			}
			$this->assign( 'DetailAddress', $DetailAddress[1] );
		}
        $this->display();
    }

    public function password(){
       R("Base/getMenu");
        if( IS_POST ){
			if(session('flag')==0){
			$url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerUpdPwd"; 
			$arr  = array(
                "SysNo"       => session( 'SysNO' ),
                "OldPassWord" => I( 'oldpass' ),
                "NewPassWord" => I( 'newpass' )
            );
			}else if (session('flag')==1){
			$url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3SystemUserUpdatePwd";
			 $arr  = array(
                "SysNo"       => session( 'SysNO' ),
                "OldPassWord" => I( 'oldpass' ),
                "Password" => I( 'newpass' )
            );
			}
            $data = json_encode( $arr );
            $head = array(
                "Content-Type:application/json;charset=UTF-8",
                "Content-length:" . strlen( $data )
            );
            $res  = http_request( $url, $data, $head );
            $data = json_decode( $res, TRUE );
            $this->ajaxReturn( $data );
            exit();
        }else{
			if(session('flag')==0){
            $data = array(
                'username' => session( 'data' )['Customer'],
            );
			}else if (session('flag')==1){
			$data = array(
			'username' => session( 'data' )['LoginName'],
			);
			}
            $this->assign( 'data', $data );
        }
        $this->display( 'password' );
    }

 

    /**
     * 支付宝服务商配置
     */
    public function zfbConfig(){
		R("Base/getMenu");
        if( IS_POST ){
            $url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerAliPayConfigEdit";
            $arr  = array(
                "CustomerServiceSysNO"  => session( 'data' )['SysNo'],              //商户服务商编号
                "APPID"                 => I( 'sx_appid', '', 'htmlspecialchars' ), //APIID
                "PID"                   => I( 'sx_shid', '', 'htmlspecialchars' ),  //商户ID
                "sub_PID"               => I( 'sx_zshid', '', 'htmlspecialchars' ), //子商户ID
                "Merchant_private_key"  => $_POST['sx_shsy'], //商户私钥
                "Merchant_public_key"   => $_POST['sx_shgy'], //商户公钥
                "Alipay_public_key"     => $_POST['sx_algy'], //阿里公钥
                "Type"					=> $_POST['sh_type'], //阿里公钥
            );
            $data = json_encode( $arr );
            $head = array(
                "Content-Type:application/json;charset=UTF-8",
                "Content-length:" . strlen( $data )
            );
            $res  = http_request( $url, $data, $head );
            $arrData = json_decode( $res, TRUE );
            $this->ajaxReturn( $arrData );
            exit();
        }else{
            $url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerAliPayConfig";
            $arr  = array(
                'CustomerServiceSysNo' => session( 'data' )['SysNo'],
            );
            $data = json_encode( $arr );
            $head = array(
                "Content-Type:application/json;charset=UTF-8",
                "Content-length:" . strlen( $data )
            );
            $res  = http_request( $url, $data, $head );
            $arrData = json_decode( $res, TRUE );
            $this->assign( 'data', $arrData );
        }

        $this->display( 'commercial_tenant_alipay' );
    }



// 商户资料读取修改
    public function MerchantDetail(){
            R("Base/getMenu");
            if( IS_AJAX ){
                $url = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerUpd";
                $data = array(
                    "SysNo"         => session('SysNO'),
                    "CustomerName"  => I('CustomerName'),
                    "Phone"         => I('Phone'),
                    "CellPhone"     => I('CellPhone'),
                    "Email"         => I('Email'),
                    "Rate"          => I('Rate'),
                    "DwellAddress"  => I('DwellAddress'),
					"DwellAddressID"     => I( "AddressNum" ),
					"SystemClassID"     => I( "ClassId" ),
					"SystemClassName"     => I( "ClassName" ),
                    "NickName"     => I( "nickname" )

                );

                $data  = http( $url, $data);
                $this->ajaxReturn( $data, 'json' );
                exit();
            }else{

                $SysNo = session( 'SysNO');
                $url  = C( 'SERVER_HOST' ) . "IPP3Customers/IPP3CustomerList";
                $data  = array(
                    "SysNo" => $SysNo
                );
                $data  = http( $url, $data);
                $Province=$this->GetAddress(0);
                $City=$this->GetAddress($data['model'][0]['Province']);
				$Country=$this->GetAddress($data['model'][0]['City']);
                $firstclass=$this->GetClass(0,0);
                $secondclass=$this->GetClass($data['model'][0]['ClassOne'],1);
                $thirdclass=$this->GetClass($data['model'][0]['ClassTwo'],2);
                /*
                 * 商户费率(翼惠,兴业,浦发)
                 * */

                $post_rate_data['CustomerSysNo'] = $SysNo;
                $post_rate_url = C('SERVER_HOST') . 'IPP3Customers/CustomerServiceRateList';
                $post_rate_list = http($post_rate_url, $post_rate_data);
                if($post_rate_list){
                    foreach ($post_rate_list as $row=>$val){
                        $data['model'][0]['typerate'][$val['PassageWay']][$val['Type']]=$val['Rate'];
                    }
                }

                $this->assign( 'data', $data['model'][0] );
				$this->assign('CustomerTypeName',$this->CustomerType($data['model'][0]['Customer_field_one']));
                if($data['model'][0]['DwellAddressID']){
				$DetailAddress = explode("-",$data['model'][0]['DwellAddress']);
				$this->assign( 'DetailAddress', $DetailAddress[1] );
				$this->assign( 'Province', $Province );
				$this->assign( 'Country', $Country );
				$this->assign( 'City', $City );
				$this->assign( 'firstclass', $firstclass );
				$this->assign( 'secondclass', $secondclass );
				$this->assign( 'thirdclass', $thirdclass );
				}else{
				$DetailAddress = $data['model'][0]['DwellAddress'];
				$this->assign( 'DetailAddress', $DetailAddress );
				$this->assign( 'Province', $Province );
				$this->assign( 'Country', array(0=>array("region_id"=>'','region_name'=>"请选择区")) );
				$this->assign( 'City',array(0=>array("region_id"=>'','region_name'=>"请选择市")) );
                $this->assign( 'firstclass', $firstclass );
                $this->assign( 'secondclass', array(0=>array("sysno"=>'','class_name'=>"请选择第二级类目")) );
                $this->assign( 'thirdclass',array(0=>array("sysno"=>'','class_name'=>"请选择第三级类目")) );
				}
               
            }

            $this->display();
        }

		private function GetAddress($parent_id,$type=0){
		
			if($type==1){
			}
			else{
				$data['Parent_id']=$parent_id;
			}
			
		
			$data = json_encode( $data );
			$url  = C('SERVER_HOST')."IPP3Customers/IPP3GetAddress"; 
			$head = array(
				"Content-Type:application/json;charset=UTF-8",
				"Content-length:" . strlen( $data ),
				"X-Ywkj-Authentication:" . strlen( $data )
			);
			
			$list = http_request($url,$data,$head);
			$list = json_decode($list,true);
			foreach ($list as $row=>$val){
				$info[$row]['region_id'] = $val['SysNo'];
				$info[$row]['region_name']   = $val['AddressName'];
			}

			return $info;
	
	
		}
    private function GetClass($sysno,$class_id){
        if($class_id==0){
            $data['ClassID']=0;
        }else{
            $data['TopSysNO']=$sysno;
            $data['ClassID']=$class_id;
        }
        $data = json_encode( $data );
        $url  = C('SERVER_HOST')."IPP3Customers/SystemClassList";
        $head = array(
            "Content-Type:application/json;charset=UTF-8",
            "Content-length:" . strlen( $data ),
            "X-Ywkj-Authentication:" . strlen( $data )
        );
        $list = http_request($url,$data,$head);
        $list = json_decode($list,true);
        foreach ($list as $row=>$val){
            $info[$row]['sysno'] = $val['SysNo'];
            $info[$row]['class_id'] = $val['ClassID'];
            $info[$row]['class_name']   = $val['ClassName'];
        }
        return $info ;
    }
	private function CustomerType($type){
        switch ($type){
            case "104":
                $TypeName = '兴业银行通道';
                break;
            case "106":
                $TypeName = '浦发银行通道';
                break;

            case '108':
                $TypeName = "浦发口碑通道";
                break;
            case '102' :
                $TypeName = '翼惠通道';
                break;

        }
        return $TypeName;
    }



}