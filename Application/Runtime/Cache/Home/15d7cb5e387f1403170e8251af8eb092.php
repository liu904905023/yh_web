<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check(
                    'breadcrumbs'
                    ,'fixed' )
            } catch ( e ) {
            }
        </script>
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="/index.php">首页</a>
            </li>
            <li>支付宝-商户服务商配置表</li>
        </ul>
    </div>

        <div class="page-content">
          <div class="page-header">
            <h1>支付宝-商户服务商配置表</h1>
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
                      <div class="widget-main">
                        <div class="step-content row-fluid position-relative" id="step-container">
                          <div class="step-pane active" id="step1">
                            <form class="form-horizontal" id="validation-form" method="post" action="/index.php/Conff/zfbConfig">
                              <div class="row">
                                <div class="col-md-12 form-group">
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>APPID</label>
                                        <div class="over">
                                          <input type="text" class="form-control" name="sx_appid" id="sx_appid" placeholder=" " value="<?php echo ($data["AppID"]); ?>" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>商户ID</label>
                                        <div class="over">
                                          <input type="text" class="form-control" name="sx_shid" id="sx_shid" placeholder="商户ID" value="<?php echo ($data["PID"]); ?>" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>子商户ID</label>
                                        <div class="over">
                                          <input type="text" class="form-control" name="sx_zshid" id="sx_zshid" placeholder="子商户ID" value="<?php echo ($data["sub_PID"]); ?>" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>阿里公钥</label>
                                        <div class="over">
											<textarea id="sx_algy" name="sx_algy" class="form-control" cols="10" rows="6" placeholder="阿里公钥"><?php echo ($data["Alipay_public_key"]); ?></textarea>
                                          <!--<input type="text" class="form-control" name="sx_algy" id="sx_algy" placeholder="阿里公钥" value="<?php echo ($data["Alipay_public_key"]); ?>"/>-->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>商户公钥</label>
                                        <div class="over">
										<textarea id="sx_shgy" name="sx_shgy" class="form-control" cols="10" rows="6" placeholder="商户公钥"><?php echo ($data["Merchant_private_key"]); ?></textarea>
                                          <!--<input type="text" class="form-control" name="sx_shgysx_shgysx_shgy" id="sx_shgy" placeholder="商户公钥" value="<?php echo ($data["Merchant_public_key"]); ?>"/>-->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12">
                                        <label>商户私钥</label>
                                        <div class="over">
										<textarea id="sx_shsy" name="sx_shsy" class="form-control" cols="10" rows="6" placeholder="商户私钥"><?php echo ($data["Merchant_private_key"]); ?></textarea>
                                          <!--<input type="text" class="form-control" name="sx_shsy" id="sx_shsy" placeholder="商户私钥" value="<?php echo ($data["Merchant_private_key"]); ?>"/>-->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
								<div class="clearfix"></div>
                                  <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                      <div class="col-xs-12 row">
                                        <div class="over">
                                          <div class="radio">
                                            <label>
                                              <input name="sh_type" id = "sh_type" value = 0 type="radio" class="ace"<?php if($data['Type']==0){echo "checked =true";} ?>>           
                                              <span class="lbl"> ISV</span>
                                            </label>
                                            &emsp;
                                            <label>
                                              <input name="sh_type" id = "sh_type" value = 1 type="radio" class="ace"<?php if($data['Type']==1){echo "checked =true";} ?>>        
                                              <span class="lbl"> 商户</span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>


                                </div>
                              </div>

								


                              <div class="form-group">
                                <div class="col-xs-12">
                                  <button type="submit" class="btn btn-primary">
                                    <i class="icon-ok bigger-110"></i>
                                    确认
                                  </button>
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
    </div>
  </div>
  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->
<script type="text/javascript">
      jQuery(function($) {    
      
        $('#validation-form').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            sx_appid: {
              required: true,
              username:true
            },
            sx_shid: {
              required: true,
              username:true
            },
            sx_zshid: {
              username:true
            },
            sx_algy: {
              required: true
              //config:true
            },
            sx_shgy: {
              //required: true,
             // config:true
            },
            sx_shsy: {
              required: true
             // config:true
            },
          },
      
          messages: {
            sx_appid: {
              required: "APPID不能为空."
            },
            sx_shid: {
              required: "商户ID不能为空."
            },
            sx_zshid: {
              required: "子商户ID不能为空."
            },
            sx_algy: {
              required: "阿里公钥不能为空."
            },
            sx_shgy: {
              required: "商户公钥不能为空."
            },
            sx_shsy: {
              required: "商户私钥不能为空."
            },
            subscription: "Please choose at least one option",
            gender: "Please choose gender",
            agree: "Please accept our policy"
          },
      
          invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('.login-form')).show();
          },
      
          highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
          },
      
          success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
          },
      
          errorPlacement: function (error, element) {
            if(element.is(':checkbox') || element.is(':radio')) {
              var controls = element.closest('div[class*="col-"]');
              if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
              else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
              error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
              error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
          },
      
          submitHandler: function (form) {
            console.log("ok");
          $.ajax( {
            type : "post",
            url : "/index.php/Conff/zfbConfig",
            data : {
                sx_appid: $( "#sx_appid" ).val( ),
                sx_shid: $( "#sx_shid" ).val( ),
                sx_zshid: $( "#sx_zshid" ).val( ),
                sx_shsy: $( "#sx_shsy" ).val( ),//商户私钥
                sx_shgy : $( "#sx_shgy" ).val( ),//商户公钥
                sx_algy : $( "#sx_algy" ).val( ),//阿里公钥
                sh_type : $('input[name="sh_type"]:checked').val(),//阿里公钥
            },
          async:false,
        success : function ( data ){
            console.log( data );
            alert("配置成功!");
            },
        error : function (){
          alert( 'ajax error!' );
          }

} )
          },
          invalidHandler: function (form) {
            console.log("ok1");
          }
        });

      })
    </script>
    <script language="Javascript"> 
      $(function(){
        $(".click_pass").click(function(){
               var x = 1000000;
               var y = 1;
               var random = String.fromCharCode(Math.floor( Math.random() * 26) + "a".charCodeAt(0)).toUpperCase()+parseInt(Math.random() * (x - y + 1) + y)+String.fromCharCode(Math.floor( Math.random() * 26) + "a".charCodeAt(0));
               $(".random_pass").val(random);
          });
       })
    </script>
    </body></html>