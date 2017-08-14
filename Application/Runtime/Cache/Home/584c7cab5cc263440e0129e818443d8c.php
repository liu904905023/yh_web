<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">try {
            ace.settings.check(
                'breadcrumbs'
                , 'fixed')
        } catch (e) {
        }</script>
        <ul class="breadcrumb">

            <li>

                <i class="icon-home home-icon"></i>

                <a href="/index.php">首页</a>

            </li>

            <li>商户资料</li>

        </ul>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>商户资料</h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter">填写详细资料</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main bigBox">
                                    <div class="step-content row-fluid position-relative" id="step-container">
                                        <div class="step-pane active" id="step1">
                                            <form class="form-horizontal" id="validation-form" method="post" action="/index.php/Conff/MerchantDetail">
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>用户名</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" disabled="" name="sx_name" id="sx_name" placeholder="用户名" value="<?php echo ($data["Customer"]); ?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>用户身份</label>
                                                                    <div class="over">
                                                                        <?php switch($_SESSION['data']['CustomersType']): case "0": ?><input type="text" class="form-control" name="CustomersType" id="CustomersType" disabled="" placeholder="服务商"/><?php break;?>
                                                                            <?php case "1": ?><input type="text" class="form-control" name="CustomersType" id="CustomersType" disabled="" placeholder="商户"/><?php break; endswitch;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>联系电话</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" id="sx_tel" name="sx_tel" disabled="" value="<?php echo ($data["Phone"]); ?>" placeholder="联系电话"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <!--<div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>密码</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="sx_pass" class="form-control random_pass" placeholder="密码" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success click_pass" type="button">
                                                                                <i class="icon-key"></i>
                                                                                生成密码
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>真实姓名</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="sx_zsxm" id="sx_zsxm" value="<?php echo ($data["CustomerName"]); ?>" placeholder="真实姓名"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>邮件地址</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo ($data["Email"]); ?>" placeholder="邮件地址"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  <div class="col-xs-12 col-md-4">
                                                          <div class="form-group">
                                                           <div class="col-xs-12">
                                                            <label>手机</label>
                                                            <div class="over">
                                                             <input type="text" class="form-control" name="sx_phone" id="sx_phone" value="<?php echo ($data["CellPhone"]); ?>" placeholder="手机" />
                                                            </div>
                                                           </div>
                                                          </div>
                                                         </div>  -->

                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>传真</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="sx_Fax" id="sx_Fax" value="<?php echo ($data["Fax"]); ?>" placeholder="传真"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>


                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <div class="col-xs-12 mr_mab">

                                                                    <label>第一级类目</label>

                                                                    <div class="over">

                                                                        <select class="form-control" id="firstclass" name="firstclass">
																			<option value="">请选择第一级类目</option>
                                                                            <?php if(is_array($firstclass)): $i = 0; $__LIST__ = $firstclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["sysno"]); ?>"><?php echo ($vo["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <div class="col-xs-12 mr_mab">

                                                                    <label>第二级类目</label>

                                                                    <div class="over">

                                                                        <select class="form-control" id="secondclass" name="secondclass">

                                                                            <?php if(is_array($secondclass)): $i = 0; $__LIST__ = $secondclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["sysno"]); ?>"><?php echo ($vo["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">

                                                                <div class="col-xs-12 mr_mab">

                                                                    <label>第三级类目</label>

                                                                    <div class="over">

                                                                        <select class="form-control" id="thirdclass" name="thirdclass">
                                                                            <?php if(is_array($thirdclass)): $i = 0; $__LIST__ = $thirdclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["sysno"]); ?>"><?php echo ($vo["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 mr_mab">
                                                                    <label>省份</label>
                                                                    <div class="over">
                                                                        <select class="form-control" id="provinces" name="provinces">
																			<option value="">请选择省</option>

                                                                            <?php if(is_array($Province)): $i = 0; $__LIST__ = $Province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["region_id"]); ?>"><?php echo ($vo["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 mr_mab">
                                                                    <label>市</label>
                                                                    <div class="over">
                                                                        <select class="form-control" id="citys" name="citys">
                                                                            <?php if(is_array($City)): $i = 0; $__LIST__ = $City;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["region_id"]); ?>"><?php echo ($vo["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 mr_mab">
                                                                    <label>区</label>
                                                                    <div class="over">
                                                                        <select class="form-control" id="countys" name="countys">
                                                                            <?php if(is_array($Country)): $i = 0; $__LIST__ = $Country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["region_id"]); ?>"><?php echo ($vo["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>联系地址</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="sx_address" id="sx_address" value="<?php echo ($DetailAddress); ?>" placeholder="联系地址"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 mr_mab">
                                                                    <label>商户费率</label>
                                                                <div class="over input-group posi wh" >
                                                                    <input type="text" id="" name="" class="form-control rate-sel1" placeholder="请点击查看费率">
                                                                        <img class='sel-btn' src="/Public/assets/images/sel-btns.png" alt="">
                                                                    <ul class="l-list1 sel_boxs line_Height" style="display: none;">
                                                                      <li>
                                                                       
                                                                          <span class="lbl "> 翼惠-微信费率</span>
                                                                          <b ><?php if(empty($data["typerate"]["102"]["102"])): ?>0<?php else: echo ($data['typerate']['102']['102']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                       
                                                                          <span class="lbl"> 翼惠-支付宝费率</span>
                                                                          <b><?php if(empty($data["typerate"]["102"]["103"])): ?>0<?php else: echo ($data['typerate']['102']['103']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                       
                                                                      </li>
                                                                      <li>
                                                                        
                                                                          <span class="lbl"> 兴业-微信费率</span>
                                                                          <b ><?php if(empty($data["typerate"]["104"]["104"])): ?>0<?php else: echo ($data['typerate']['104']['104']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                        
                                                                          <span class="lbl"> 兴业-支付宝费率</span>
                                                                          <b><?php if(empty($data["typerate"]["104"]["105"])): ?>0<?php else: echo ($data['typerate']['104']['105']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                       
                                                                          <span class="lbl"> 浦发-微信费率</span>
                                                                          <b><?php if(empty($data["typerate"]["106"]["106"])): ?>0<?php else: echo ($data['typerate']['106']['106']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                        
                                                                          <span class="lbl"> 浦发-支付宝费率</span>
                                                                          <b><?php if(empty($data["typerate"]["106"]["107"])): ?>0<?php else: echo ($data['typerate']['106']['107']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                        
                                                                          <span class="lbl"> 浦发口碑-微信费率</span>
                                                                          <b><?php if(empty($data["typerate"]["108"]["106"])): ?>0<?php else: echo ($data['typerate']['108']['106']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                      <li>
                                                                        
                                                                          <span class="lbl"> 浦发口碑-支付宝费率</span>
                                                                          <b><?php if(empty($data["typerate"]["108"]["107"])): ?>0<?php else: echo ($data['typerate']['108']['107']); endif; ?></b>
                                                                          &emsp;&emsp;
                                                                        
                                                                      </li>
                                                                     
                                                                    </ul>
                                                                </div>

                                                             </div>
                                                        </div>
                                                            
                                                        </div>
														<div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>支付通道</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="" id="" value="<?php echo ($CustomerTypeName); ?>" placeholder="支付通道"
                                                                               readonly="readonly"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="col-xs-12 col-md-4">
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label>商户简称</label>
                                                                    <div class="over">
                                                                        <input type="text" class="form-control" name="sx_shjc" id="sx_shjc" value="<?php echo ($data["NickName"]); ?>" placeholder="商户简称"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>



                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button type="submit" class="btn btn-primary"><i class="icon-ok bigger-110"></i> 确认</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->
<script type="text/javascript">
    jQuery( function ( $ ){


        $( '#validation-form' ).validate( {
            errorElement : 'div',
            errorClass : 'help-block',
            focusInvalid : false,
            rules : {
                sx_name : {
                    required : true
                },
                sx_pass : {
                    required : true
                },
                sx_zsxm : {
                    required : true,
                    chinese:true
                },
                sx_phone : {
                    required : true
                },
                sx_tel : {
                    required : true
                },
                // sx_Fax : {
                //     fax : true
                // },
                sx_address : {
                    required:true
                },
                provinces:{
                    required:true
                },
                citys:{
                    required:true
                },
                countys:{
                    required:true
                },
                firstclass:{
                    required:true
                },
                secondclass:{
                    required:true
                },
                thirdclass:{
                    required:true
                },
                dwellzip: {
                    zipcode : true
                },
                email : {
                    required : true,
                    email : true
                },
                sx_rate : {
                    ratenum : true
                },
                sx_shjc:{
                    rangelength:[1,6],
                    required: true,
                    chinese:true
                }
            },
            messages : {
                sx_name : {
                    required : "用户名不能为空."
                },
                sx_pass : {
                    required : "密码不能为空."
                },
                sx_zsxm : {
                    required : "真实姓名不能为空.",
                    chinese:"输入正确的姓名"
                },
                sx_phone : {
                    required : "手机不能为空."
                },
                sx_tel : {
                    required : "联系电话不能为空."
                },
                // sx_Fax : {
                //     required : "传真不能为空."
                // },
                sx_address : {
                    required : "联系地址不能为空."
                },
                provinces:{
                    required: "省级地址不能为空.",
                },
                citys:{
                    required: "市级地址不能为空.",
                },
                countys:{
                    required: "区级地址不能为空.",
                },
                firstclass:{
                    required: "第一级类目不能为空.",
                },
                secondclass:{
                    required: "第二级类目不能为空.",
                },
                thirdclass:{
                    required: "第三级类目不能为空.",
                },
                email : {
                    required : "邮编不能为空.",
                    email : "请输入正确的邮箱地址."
                },
                sx_rate : {
                    ratenum :  "费率格式不正确."
                },
                sx_shjc: {
                    rangelength:"商户简称最多六个汉字.",
                    required: "商户简称不能为空.",
                    chinese:"商户简称为中文"
                },
                subscription : "Please choose at least one option",
                gender : "Please choose gender",
                agree : "Please accept our policy"
            },
            invalidHandler : function ( event,
                                        validator ){ //display error alert on form submit
                $( '.alert-danger',$(
                    '.login-form' ) ).show( );
            },
            highlight : function ( e ){
                $( e ).closest( '.form-group' ).
                removeClass( 'has-info' ).addClass(
                    'has-error' );
            },
            success : function ( e ){
                $( e ).closest( '.form-group' ).
                removeClass( 'has-error' ).
                addClass( 'has-info' );
                $( e ).remove( );
            },
            errorPlacement : function ( error,
                                        element ){
                if ( element.is( ':checkbox' ) ||
                    element.is( ':radio' ) ) {
                    var controls = element.closest(
                        'div[class*="col-"]' );
                    if ( controls.find(
                            ':checkbox,:radio' ).length >
                        1 )
                        controls.append(
                            error );
                    else
                        error.insertAfter(
                            element.nextAll(
                                '.lbl:eq(0)' ).
                            eq(
                                0 ) );
                }
                else if ( element.is( '.select2' ) ) {
                    error.insertAfter(
                        element.siblings(
                            '[class*="select2-container"]:eq(0)' ) );
                }
                else if ( element.is(
                        '.chosen-select' ) ) {
                    error.insertAfter(
                        element.siblings(
                            '[class*="chosen-container"]:eq(0)' ) );
                }
                else
                    error.insertAfter(
                        element.parent( ) );
            },
            submitHandler : function ( form ){
//                                console.log( "ok" );
                if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
                    return false;
                }
                this.ajaxRequest_ =$.ajax( {
                    type : "post",
                    url : "/index.php/Conff/MerchantDetail",
                    data : {
                        Customer : $( '#sx_name' ).val( ),
                        CustomerName : $( '#sx_zsxm' ). val( ),
                        Email : $( '#email' ).val( ),
                        Phone : $( '#sx_tel' ).val( ),
                        Fax : $( '#sx_Fax' ).val( ),
                        Rate : $( '#sx_rate' ).val( ),
                        AddressNum : $("#provinces").val()+'|'+$("#citys").val()+'|'+$("#countys").val(),
                        DwellAddress : $("#provinces  option:selected").text()+$("#citys  option:selected").text()+$("#countys  option:selected").text()+'-'+$("#sx_address").val(),
                        ClassId : $("#firstclass").val()+'|'+$("#secondclass").val()+'|'+$("#thirdclass").val(),
                        ClassName : $("#firstclass  option:selected").text()+'-'+$("#secondclass  option:selected").text()+'-'+$("#thirdclass  option:selected").text(),
                        nickname : $( '#sx_shjc' ).val( )


                    },
                    success : function ( data ){
//                                            console.log( data );
                        alert( data.Description );
                    },
                    error : function (){
                        alert( 'ajax error!' );
                    }

                } )

            },
            invalidHandler: function ( form ){
//                console.log( "ok1" );
            }
        } );
    } )
</script>
<script language="Javascript">
    $( function ( ){
        $( ".click_pass" ).click( function ( ){
            var x = 1000000;
            var y = 1;
            var random = String.fromCharCode( Math.floor(
                        Math.random( ) * 26 ) + "a".charCodeAt( 0 ) ).
                toUpperCase( ) + parseInt( Math.random( ) * ( x - y +
                    1 ) + y ) + String.fromCharCode( Math.floor(
                        Math.random( ) * 26 ) + "a".charCodeAt( 0 ) );
            $( ".random_pass" ).val( random );
        } );
    } )
</script>

<script type="text/javascript">

    $(document).ready(function() {

        $("#provinces").val(<?php echo ($data["Province"]); ?>);
        $("#citys").val(<?php echo ($data["City"]); ?>);
        $("#countys").val(<?php echo ($data["County"]); ?>);


        $("#provinces").change(function() {

            $.ajax({
                type : "post",
                url: "/index.php/Lian/GetAddress", // type =2表示查询市
                data: {"parent_id": $(this).val(), "type": "2"},
                success: function(data) {
                    $("#citys").empty();
                    $("#citys").html("<option value=''>请选择市</option>");
                    $("#countys").html("<option value=''>请选择区</option>");
                    $.each(data, function(i, item) {
                        $("#citys").append("<option value='" + item.region_id + "'>" + item.region_name + "</option>");
                    });
                }
            });
        });

        $("#citys").change(function() {
            $.ajax({
                type : "post",
                url: "/index.php/Lian/GetAddress", // type =2表示查询市
                data: {"parent_id": $(this).val(), "type": "3"},
                success: function(data) {
                    $("#countys").html("<option value=''>请选择区</option>");
                    $.each(data, function(i, item) {
                        $("#countys").append("<option value='" + item.region_id + "'>" + item.region_name + "</option>");
                    });
                }
            });


        });
        $("#firstclass").val(<?php echo ($data["ClassOne"]); ?>);

        $("#secondclass").val(<?php echo ($data["ClassTwo"]); ?>);

        $("#thirdclass").val(<?php echo ($data["ClassThree"]); ?>);



        $("#firstclass").change(function() {



            $.ajax({

                type : "post",

                url: "/index.php/Lian/GetClass", // type =2表示查询市

                data: {"sysno": $(this).val(), "class_id": "1"},

                success: function(data) {

                    $("#secondclass").html("<option value=''>请选择第二级类目</option>");

                    $("#thirdclass").html("<option value=''>请选择第三级类目</option>");

                    $.each(data, function(i, item) {

                        $("#secondclass").append("<option value='" + item.sysno + "'>" + item.class_name + "</option>");

                    });

                }

            });

        });



        $("#secondclass").change(function() {

            $.ajax({

                type : "post",

                url: "/index.php/Lian/GetClass", // type =2表示查询市

                data: {"sysno": $(this).val(), "class_id": "2"},

                success: function(data) {

                    $("#thirdclass").html("<option value=''>请选择第三级类目</option>");

                    $.each(data, function(i, item) {

                        $("#thirdclass").append("<option value='" + item.sysno + "'>" + item.class_name + "</option>");

                    });

                }

            });
        });


        $(".rate-sel1").click(function(){
            $(".l-list1").show();
        })
        $(".l-list1").click(function(){
            $(this).hide();
        })
        $(document).bind("click",function(e){
                           // id为menu的是菜单，id为open的是打开菜单的按钮           
            if($(e.target).closest(".l-list1").length == 0 && $(e.target).closest(".rate-sel1").length == 0){
                           //点击id为menu之外且id不是不是open，则触发
                 $(".l-list1").hide();
            }
           
        })

    });
</script>

</body></html>
</body>
</html>