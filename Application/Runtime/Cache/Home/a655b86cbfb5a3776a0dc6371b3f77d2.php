<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>

      <div class="main-content">

        <div class="breadcrumbs" id="breadcrumbs">

          <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>

          <ul class="breadcrumb">

            <li>

              <i class="icon-home home-icon"></i>

              <a href="#">首页</a>

            </li>

            <li>商户注册</li>

          </ul>

        </div>

        <div class="page-content">

          <div class="page-header">

             <h1>商户注册</h1>

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

                      <form class="form-horizontal" id="validation-form" method="post" action="">

                        <div class="row">

                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>用户名</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="sx_dlm" id="username" placeholder="用户名" />

                                </div>

                              </div>

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>密码</label>

                                <div class="over">

                                  <input type="password" class="form-control" name="sx_pass" id="passwd" placeholder="密码"></div>

                              </div>

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>重复密码</label>

                                <div class="over">

                                  <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="重复密码"></div>

                              </div>

                            </div>

                          </div>



                          <div class="clearfix"></div>



                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>门店名称</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="sx_name" id="realname" placeholder="门店名称" />

                                </div>

                              </div>

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>邮箱</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="email" id="email" placeholder="邮箱" />

                                </div>

                              </div>

                            </div>

                          </div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>联系电话</label>

                                <div class="over">

                                  <input type="text" class="form-control" disabled="" name="phone" id="phone" placeholder="联系电话" />

                                </div>

                              </div>

                            </div>

                          </div>



                          <div class="clearfix"></div>



                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>员工ID</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="staff_id" id="staff_id" disabled="disabled" placeholder="员工ID" />

                                </div>

                              </div>

                            </div>

                          </div>

                         <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>传真</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="fax" id="fax" placeholder="传真" />

                                </div>

                              </div>

                            </div>

                          </div>



                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>邮政编码</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="邮政编码" />

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

                                    <option value="">请选择第二级类目</option>

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

                                    <option value="">请选择第三级类目</option>

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

                                    <option value="">请选择省份</option>

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

                                    <option value="">请选择市</option>

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

                                    <option value="">请选择区</option>

                                  </select>

                                </div>

                              </div>

                            </div>

                          </div>



                          <div class="clearfix"></div>



                          <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>详细地址</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="detailaddress" id="detailaddress" placeholder="详细地址" />

                                </div>

                              </div>

                            </div>

                          </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <div class="col-xs-12 mr_mab">
                                <!-- <label for="WftID">兴业银行</label> -->
                                <label>支付通道</label>
                                <div style="padding-left: 0; margin-top:-5px;" class="checkbox">
                                  <!-- <label>
                                    <input name="WftID" type="checkbox" id="WftID" value=104 class="ace">
                                    <span class="lbl"></span>
                                  </label> -->
                                  <label>
                                  <input  type="radio" name= "WftID" checked="checked" value= "102" class="ace">
                                  <span class="lbl"> 翼惠通道</span>
                                  </label>
                                  &emsp;&emsp;
                                  <label>
                                  <input  type="radio" name= "WftID" value= "104" class="ace">
                                  <span class="lbl"> 兴业通道</span>
                                  </label>
                                  &emsp;&emsp;
                                  <label>
                                  <input  type="radio" name= "WftID" value= "106" class="ace">
                                  <span class="lbl"> 浦发通道</span>
                                  </label> &emsp;&emsp;
                                  <label>
                                  <input  type="radio" name= "WftID" value= "108" class="ace">
                                  <span class="lbl"> 浦发口碑</span>
                                  </label>

                                </div>

                              </div>

                            </div>

                        </div>
                        <!-- 费率 -->
                        <div class="col-md-4">

                            <div class="form-group col-xs-6">
                              <div class="col-xs-12 mr_mab wx-rate0">
                                <label>翼惠-微信费率</label>
                                <div class="over">
                                  <input type="text" class="form-control" name="wx_rate" id="wx_rate" placeholder="费率" />
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-xs-6 wx-rate1" >
                              <div class="col-xs-12 mr_mab" style='padding:0px;'>
                                <label>翼惠-支付宝费率</label>
                                <div class="over">
                                  <input type="text" class="form-control" name="zfb_rate" id="zfb_rate" placeholder="费率" />
                                </div>
                              </div>
                            </div>
                        </div>
						<div class="clearfix"></div>
                        <div class="col-md-4">

                            <div class="form-group">

                              <div class="col-xs-12 mr_mab">

                                <label>商户简称</label>

                                <div class="over">

                                  <input type="text" class="form-control" name="sx_shjc" id="nickname" placeholder="商户简称" />

                                </div>

                              </div>

                            </div>

                          </div>





                          <div class="col-xs-12">

                            <button type="submit" class="btn btn-primary" id="register"> <i class="icon-ok bigger-110"></i>

                              确认创建

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

                sx_dlm: {

                    required: true,

                    mobile: true

                },

                sx_pass: {

                    required: true,

                    username: true

                },

                confirmpass: {

                    required: true,

                    equalTo: "#passwd",

                    username: true

                },

                sx_name: {

                    required: true,

                    chinese: true

                },

                mobile: {

                    required: true,

                    mobile: true

                },

                email: {

                    required: true,

                    email: true

                },

                wx_rate: {

                    required: true,

                    ratenum: true

                },
                zfb_rate: {

                    required: true,

                    ratenum: true

                },

                state: {

                    required: true

                },

                address: {

                    required: true

                },
                firstclass: {

                    required: true

                },

                secondclass: {

                    required: true

                },

                thirdclass: {

                    required: true

                },

                provinces: {

                    required: true

                },

                citys: {

                    required: true

                },

                countys: {

                    required: true

                },

                detailaddress: {

                    required: true

                },

                sx_shjc: {

                    rangelength: [1, 6],

                    required: true,

                    chinese: true

                }


            },


            messages: {

                sx_dlm: {

                    required: "登录名不能为空.",

                    mobile: "登陆名必须为手机号，请输入正确的手机号！"

                },

                sx_pass: {

                    required: "密码不能为空.",

                    username: "密码格式不正确！"

                },

                confirmpass: {

                    required: "密码不能为空.",

                    equalTo: "请输入相同密码",

                    username: "重复密码格式不正确！"

                },

                sx_name: {

                    required: "门店名称不能为空.",

                    chinese: "门店名称为中文"

                },

                mobile: {

                    required: "手机号不能为空.",

                },

                state: {

                    required: "部门不能为空.",

                },

                address: {

                    required: "联系地址不能为空.",

                },

                firstclass: {

                    required: "第一类目不能为空.",

                },

                secondclass: {

                    required: "第二类目不能为空.",

                },

                thirdclass: {

                    required: "第三类目不能为空.",

                },

                provinces: {

                    required: "省级地址不能为空.",

                },

                citys: {

                    required: "市级地址不能为空.",

                },

                countys: {

                    required: "区级地址不能为空.",

                },

                detailaddress: {

                    required: "详细地址不能为空.",

                },

                email: {

                    required: "邮箱不能为空.",

                    email: "请输入正确的邮箱"

                },

                username: {

                    required: "邮箱不能为空.",

                    email: "请输入正确的邮箱"

                },

                wx_rate: {

                    required: "费率不能为空.",

                    ratenum: "请输入正确的费率格式"

                },
                zfb_rate: {

                    required: "费率不能为空.",

                    ratenum: "请输入正确的费率格式"

                },
                sx_shjc: {

                    rangelength: "商户简称最多六个汉字.",

                    required: "商户简称不能为空.",

                    chinese: "商户简称为中文"
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

                if (element.is(':checkbox') || element.is(':radio')) {

                    var controls = element.closest('div[class*="col-"]');

                    if (controls.find(':checkbox,:radio').length > 1) controls.append(error);

                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));

                }

                else if (element.is('.select2')) {

                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));

                }

                else if (element.is('.chosen-select')) {

                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));

                }

                else error.insertAfter(element.parent());

            },

            submitHandler: function (form) {

                $.ajax({

                    type: "post",

                    url: "/index.php/Business/businessregister",

                    data: {

                        username: $("#username").val(),

                        passwd: $("#passwd").val(),

                        confirmpass: $("#confirmpass").val(),

                        realname: $("#realname").val(),

                        email: $("#email").val(),

                        phone: $("#phone").val(),

                        fax: $("#fax").val(),

                        address: $("#address").val(),

                        zipcode: $("#zipcode").val(),

                        wx_rate: $("#wx_rate").val(),

                        zfb_rate: $("#zfb_rate").val(),

                        Customer_Wft: $("input[type='radio']:checked").val(),

                        SystemUserSysNo: $("#staff_id").val(),

                        systemclassid: $("#firstclass").val() + '|' + $("#secondclass").val() + '|' + $("#thirdclass").val(),

                        systemclassname: $("#firstclass  option:selected").text() + '-' + $("#secondclass  option:selected").text() + '-' + $("#thirdclass  option:selected").text(),

                        AddressNum: $("#provinces").val() + '|' + $("#citys").val() + '|' + $("#countys").val(),

                        address: $("#provinces  option:selected").text() + $("#citys  option:selected").text() + $("#countys  option:selected").text() + '-' + $("#detailaddress").val(),

                        nickname: $("#nickname").val()

                    },

                    async: false,

                    success: function (data) {

                        if (data.Code == 0) {

                            alert(data.Description);
                            $('#validation-form').reset();



                        } else {

                            alert(data.Description);

                        }

                    }

                })

            },

            invalidHandler: function (form) {

                console.log("ajax失败！");

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

                            $( "#username" ).keyup( function ( ){

                                var text1_val = $( this ).val( );

                                $( "#phone" ).val( text1_val );

                            } );

    });

  var SystemUserSysNo = GetQueryString ("SystemUserSysNo");

  var Sn = parseInt(SystemUserSysNo);

  $("#staff_id").val(Sn);

    $("#register").click(function(){

    })

  </script>

	<script type="text/javascript">

		$(document).ready(function() {


      $.ajax({

        type : "post",

        url: "/index.php/Lian/GetClass", 

        data: {"class_id": "0"},

        success: function(data) {

          $("#firstclass").html("<option value=''>请选择第一级类目</option>");

          $.each(data, function(i, item) {

            $("#firstclass").append("<option value='" + item.sysno + "'>" + item.class_name + "</option>");

          });

          $("#firstclass option").each(function() {

            var val = $(this).val();

            if ( $("#firstclass option[value='" + val + "']").length > 1 )

              $("#firstclass option[value='" + val + "']:gt(0)").remove();

          });

        }

      });

      $("#firstclass").change(function() {

        $.ajax({

          type : "post",

          url: "/index.php/Lian/GetClass",

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

          url: "/index.php/Lian/GetClass",

          data: {"sysno": $(this).val(), "class_id": "2"},

          success: function(data) {

            $("#thirdclass").html("<option value=''>请选择第三级类目</option>");

            $.each(data, function(i, item) {

              $("#thirdclass").append("<option value='" + item.sysno + "'>" + item.class_name + "</option>");

            });

          }

        });

      });


			$.ajax({

				type : "post",

				url: "/index.php/Lian/GetAddress", 

				data: {"type": "1"},

				success: function(data) {

					$("#provinces").html("<option value=''>请选择省份</option>");

					$.each(data, function(i, item) {

						$("#provinces").append("<option value='" + item.region_id + "'>" + item.region_name + "</option>");

					});

					$("#provinces option").each(function() {

						var val = $(this).val();

						if ( $("#provinces option[value='" + val + "']").length > 1 )

							$("#provinces option[value='" + val + "']:gt(0)").remove();

					});

				}

			});

			$("#provinces").change(function() {

				$.ajax({

					type : "post",

					url: "/index.php/Lian/GetAddress",

					data: {"parent_id": $(this).val(), "type": "2"},

					success: function(data) {

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

					url: "/index.php/Lian/GetAddress", 

					data: {"parent_id": $(this).val(), "type": "3"},

					success: function(data) {

						$("#countys").html("<option value=''>请选择区</option>");

						$.each(data, function(i, item) {

							$("#countys").append("<option value='" + item.region_id + "'>" + item.region_name + "</option>");

						});

					}

				});

			});

		});

	</script>
  <script>
      $(function(){
        $(".mr_mab label .lbl,.mr_mab label .ace").click(function(){
          var index=$(this).parents("label").index();
          
           if(index==0){
               $(".wx-rate0 label").html("翼惠-微信费率");
               $(".wx-rate1 label").html("翼惠-支付宝费率");
           }else if(index==1){
               $(".wx-rate0 label").html("兴业-微信费率");
               $(".wx-rate1 label").html("兴业-支付宝费率");
           }else if(index==2){
               $(".wx-rate0 label").html("浦发-微信费率");
               $(".wx-rate1 label").html("浦发-支付宝费率");
           }else if(index==3){
               $(".wx-rate0 label").html("浦发口碑-微信费率");
               $(".wx-rate1 label").html("浦发口碑-支付宝费率");
           }
           
        })
      })
  </script>
</body>

</html>