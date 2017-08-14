<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>

      <div class="main-content">

        <div class="breadcrumbs" id="breadcrumbs">

          <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>

          <ul class="breadcrumb">

            <li>

              <i class="icon-home home-icon"></i>

              <a href="/index.php">首页</a>

            </li>

            <li>商户查询</li>

          </ul>

        </div>

        <div class="page-content">

          <div class="page-header">

            <h1>商户查询</h1>

          </div>

          <div class="row">

            <div class="col-xs-12 sx-search">
              <form id="searchform" name="searchform" method="post">
              <div class="col-md-6 col-xs-12 mr_mab">

                        <div class="form-group">

                            <label for="dtp_input1" class="control-label col-sm-4" >开始时间</label>

                            <div class="col-sm-8 input-group">


                                <input type="text" id="Time_Start" name="Time_Start" value="<?php echo date('Y-m-d',time()).' 00:00:00'; ?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="form-control"/>
                                <span class="input-group-addon">

                                                <span class="glyphicon glyphicon-time"></span>

                                </span>


                            </div>


                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12 mr_mab">

                        <div class="form-group">

                            <label for="sx-8" class="control-label col-sm-4">结束时间</label>



                            <div class="col-sm-8 input-group">

                                <input type="text" id="Time_End" name="Time_End" value="<?php echo date('Y-m-d',time()).' 23:59:59'; ?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="form-control"/>
                                <span class="input-group-addon">

                                                <span class="glyphicon glyphicon-time"></span>

                                            </span>

                            </div>

                        </div>

                    </div>

                

                <div class="col-md-6 col-xs-12 mr_mab">
                  <div class="form-group">
                    <label for="sx-8" class="control-label col-sm-4">商户用户名</label>
                    <div class="col-sm-8">
                      <input type="text" id="CustomersName" name="customersname" class="form-control" placeholder="商户用户名">
                    </div>
                  </div>
                </div>
				<div class="col-md-6 col-xs-12 mr_mab">
                  <div class="form-group">
                    <label for="sx-8" class="control-label col-sm-4">商户名称</label>
                    <div class="col-sm-8">
                      <input type="text" id="CustomersTrueName" name="customerstruename" class="form-control" placeholder="商户名称">
                    </div>
                  </div>
                </div>
                
				<div class="clearfix"></div>

                <div class="col-md-12 col-xs-12">
                  <div class="form-group txrimar">
                      <a class="btn btn-primary search"><i class="icon-search"></i>查询</a>

                      &nbsp;
                      <a href="#" type="submit" class="btn btn-success" id="download" onclick="checkaction(0);" >

                        <i class="icon-download-alt" ></i>

                        下载报表

                      </a>

                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">

                  <div class="table-header">查询结果</div>

                  <div class="col-xs-12">

                    <div class="table-responsive">

                      <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>

                          <tr>

                            <th>商户号</th>

                            <th>商户用户名</th>

                            <th>商户名称</th>

                            <th>联系电话</th>

                            <th>地址</th>

                            <th>商户类型</th>

                            <th>注册时间</th>

                            <th>操作</th>

                            <th>更多操作</th>


                          </tr>

                        </thead>

                        <tbody id = "info">

                          

                        </tbody>

                      </table>

											<div class="page_new">
                                                <input type = "hidden" id = "totalCount" value= "">
                                                 <a id="prev">上一页</a>  <a id = "next">下一页</a> <a id = "first">最前页</a> <a id = "last">最末页</a>
                                                <select id = "SelectNo">
                                                    
                                                </select>
                                                <span>总 <label id = "TotalCount"></label> 条</span> <span>分为 <label id = "TotalPage"></label> 页</span> <span>当前第 <label id ="NowPage">1</label> 页</span><input type= "hidden" id= "PageSize" value=10>
                                              <input type = "hidden" id = "SystemUserSysNo" name = "systemusersysno" value= "<?php echo $_GET['id'] ?>">

                                            </div>

                    </div>

                  </div>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

	<div class="pricing-box2">
      <div class="widget-box">
        <div class="widget-header header-color-red3">
          <h5 class="bigger lighter">商户详情</h5>
        </div>
        <div class="widget-body">
          <div class="widget-main">
              <div class="col-md-12 form-group">
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>用户名</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="sx_name" id="sx_name" value ="" placeholder="用户名" value="13866447856" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>用户身份</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="identity" id="identity" value ="" placeholder="服务商" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>联系电话</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="sx_tel" id="sx_tel" value ="" placeholder="联系电话" value="13866447856" />        
                        </div>
                      </div>
                    </div>
                  </div>

                

                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>真实姓名</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="sx_zsxm" id="sx_zsxm" value ="" placeholder="真实姓名" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>邮件地址</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="email" id="email" value ="" placeholder="邮件地址" />        
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>联系地址</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="sx_address" id="sx_address" value ="" placeholder="联系地址" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  

                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>上级员工</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="email" id="TopStaffId" value ="" placeholder="上级员工ID" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>注册时间</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="time" id="time" value ="" placeholder="注册时间" />        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>上级费率</label>
                        <div class="over">
                          <input type="text" class="form-control" disabled name="" id="user_rate" value ="" placeholder="上级费率" />
                        </div>
                      </div>
                    </div>
                  </div>

				          <div class="clearfix"></div>
                  
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>翼惠-微信费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate102102" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>兴业-微信费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate104104" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>浦发-微信费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate106106" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>浦发口碑-微信费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate108106" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
          
                 
                  <div class="clearfix"></div>
                   <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>翼惠-支付宝费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate102103" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>兴业-支付宝费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate104105" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>浦发-支付宝费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate106107" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>浦发口碑-支付宝费率</label>
                        <div class="over">
                          <input type="text" class="form-control rate" disabled name="" id="rate108107" value ="" placeholder="费率" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </form>

          </div>
          <div class="refund_box">
            <a href="#" class="btn btn-grey btn-close">
              <span>关闭</span>
            </a>
          </div>
        </div>
      </div>
    </div>






<!-- 2016/10/12 14:35:37 -->
<div class="pricing-box2_rate">
      <div class="widget-box">
        <div class="widget-header header-color-red3">
          <h5 class="bigger lighter">修改费率</h5>
        </div>
        <div class="widget-body">
          <div class="widget-main">
              <div class="col-md-12 form-group">
                  <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>费率</label>
                        <div class="over">
                          <input type="text" class="form-control" name="rate" id="rates" value=""  placeholder="0.999" value="" />
						  <div class="help-block rate_err">费率格式不正确</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  

                </div>
          </div>
          <div class="refund_box">
			<a href="#" class="btn btn-danger update">
              <span>修改</span>
            </a>
            <a href="#" class="btn btn-grey btn-close">
              <span>关闭</span>
            </a>
          </div>
        </div>
      </div>
    </div>
<!-- 2016/10/12 14:35:41 -->


<div class="pricing-box3" style="width: 800px; margin-left: -400px;">

      <div class="widget-box">

        <div class="widget-header header-color-red3">

          <h5 class="bigger lighter">商户调拨</h5>

        </div>

        <div class="widget-body">

          <div class="widget-main">

            <div class="per_ass">

              <div class="left">

                <h3>员工列表</h3>

                <div class="service_list">
				<input type = "hidden" id = "customerid" value= "">
				<input type = "hidden" id = "cc" value= "">
        		<input type = "hidden" id = "SelectCustomer" value= "">

                  <ul class="datalist" id = "servicelist">


                  </ul>

                </div>

                <div class="select_all_s">

                  <a id="ckall" class="btn btn-default btn-xs" href="javascript:void(0);">全选</a>

                </div>

              </div>

              <div class="btns_box">

                <p>

                  <span id="add" class="btn btn-success">

                    添加

                    <i class="glyphicon glyphicon-chevron-right"></i>

                  </span>

                </p>

                <p>

                  <span id="del" class="btn btn-danger">

                    <i class="glyphicon glyphicon-chevron-left"></i>

                    移除

                  </span>

                </p>

              </div>

              <div class="right">

                <h3>调拨员工</h3>

                <div class="staff_list">

                  <ul class="datalist" id = "stafflist">
                  </ul>

                </div>

                <div class="select_all_t">

                  <a id="ckall2" class="btn btn-default btn-xs" href="javascript:void(0);">全选</a>

                </div>

              </div>

            </div>



          </div>

          <div class="refund_box">

            <a href="#" class="btn btn-primary set">

              <i class="icon-cog bigger-110"></i>

              <span>保存设置</span>

            </a>

            <a href="#" class="btn btn-grey btn-refund">

              <span>取消</span>

            </a>

          </div>

        </div>

      </div>

    </div>

    <div class="bg_black"></div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">

      <i class="icon-double-angle-up icon-only bigger-110"></i>

    </a>

  </div>

  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->

  <script type="text/javascript">

        jQuery(function($) {

            var oTable1 = $('#sample-table-2').dataTable( {

            "aoColumns": [

                { "bSortable": false },

                null, null,null, null, null,

              { "bSortable": false }

            ]

        });

        

        $('table th input:checkbox').on('click' , function(){

          var that = this;

          $(this).closest('table').find('tr > td:first-child input:checkbox')

          .each(function(){

            this.checked = that.checked;

            $(this).closest('tr').toggleClass('selected');

          });

        });

      

        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        function tooltip_placement(context, source) {

          var $source = $(source);

          var $parent = $source.closest('table')

          var off1 = $parent.offset();

          var w1 = $parent.width();

          var off2 = $source.offset();

          var w2 = $source.width();

          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';

          return 'left';

        }

        })

    </script>

  <script>

    var reg_phone = /^0?1[3|4|5|8][0-9]\d{8}$/;

    var reg_email = /.+@.+\.[a-zA-Z]{2,4}$/;

    $("#sx-2").blur(function(){

      if(reg_email.test($("#sx-2").val()) || $("#sx-2").val()==""){

        $("#email").hide();

      }

      else{

        $("#email").show();

      }

    }).focus(function(){

      $(this).triggerHandler("blur");

    }).keyup(function(){

      $(this).triggerHandler("blur");

    });

    $("#sx-3").blur(function(){

      if(reg_phone.test($("#sx-3").val()) || $("#sx-3").val()==""){

        $("#phone").hide();

      }

      else{

        $("#phone").show();

      }

    }).focus(function(){

      $(this).triggerHandler("blur");

    }).keyup(function(){

      $(this).triggerHandler("blur");

    });    

    </script>

  <script type="text/javascript">

    $('.form_datetime').datetimepicker({

        //language:  'fr',

        weekStart: 1,

        todayBtn:  1,

        autoclose: 1,

        todayHighlight: 1,

        startView: 2,

        forceParse: 0,

        showMeridian: 1

    });

    $('.form_date').datetimepicker({

        language:  'fr',

        weekStart: 1,

        todayBtn:  1,

        autoclose: 1,

        todayHighlight: 1,

        startView: 2,

        minView: 2,

        forceParse: 0

    });



</script>
<script>


	


</script>

<script>

		function Business_Detail(SysNo){
            $(".pricing-box2").show(300);
            $(".bg_black").show();
			$.ajax({
                    type : "post",
                    url : "/index.php/Business/business_detail",
                    data : {
                        SysNo : SysNo,
                    },
                    async:false,
                    success : function (data){
						$('#sx_name').val(data.customer);
						$('#identity').val("商户");
						$('#sx_tel').val(data.phone);
						$('#sx_zsxm').val(data.CustomerName);
						$('#TopStaffId').val(data.TopStaffId);
						$('#sx_Fax').val(data.Fax);
						$('#sx_address').val(data.DwellAddress);

						$('#email').val(data.Email);
						$('#time').val(data.RegisterTime);
						$('#user_rate').val(data.user_rate);
                        $(".rate").val('');
                        $.each(data.typerate, function(i, item){
                            $.each(data.typerate[i], function(k, v){
                                $('#rate'+i+k).val(v);
                            });
                        });


                    },
                    error : function (){
                        alert( 'ajax error!' );
                    }

                    })

        }
	
//		2016/10/12 14:51:06
		function UpdateRate(SysNo){
			$(".rate_err").hide();
			$(".pricing-box2_rate").show(300);
            $(".bg_black").show();
			$(".update").click(function(){
//			var small_num = /^[0]+([.]{1}[0]{1}[0][0-8]{0,1})?$/;
			var small_num = /^[0](\.\d{1,3})?$/;
			var rates = $("#rates").val();
			if(small_num.test(rates)&rates!=0){
				$(".rate_err").hide();
			}else{
				$(".rate_err").show();
				return false;
			}
			$.ajax({
                    type : "post",
                    url : "/index.php/Business/customerrateupdate",
                    data : {
                        Rate :rates,
                        SysNo :SysNo


                    },
                    async:false,
                    success : function ( data ){
						if(data){
							alert("费率修改成功！");

						}else{
							alert("费率修改失败！");
						}
						location.reload();
                      
                    },
                    error : function (){
                        alert( '请检查网络!' );
                    }

            })


			
			})
		
		}


//		2016/10/12 14:51:06

        $(".btn-close").click(function(){
            $(".pricing-box2").hide(300);
            $(".pricing-box2_rate").hide(300);
            $(".bg_black").hide();
            $(".sel").val(0);
        })
	function infoview(PageNumber,PageSize){
      var Time_Start = $("#Time_Start").val();
      var Time_End = $("#Time_End").val();
			var CustomersName = $("#CustomersName").val();
			var CustomersTrueName = $.trim($("#CustomersTrueName").val());
			if(StaffSysNo!=0){
				var SystemUserSysNo = StaffSysNo;

			}
			var tt="";
			 if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
						return false;
			}

			this.ajaxRequest_ =$.post("/index.php/Staff/servicequerycustomer",{Time_Start:Time_Start,Time_End:Time_End,CustomersName:CustomersName,CustomersTrueName:CustomersTrueName,SystemUserSysNo:SystemUserSysNo,PageNumber:PageNumber,PageSize:PageSize},function(data){
			if(data.totalCount>0){
			$.each(data.model, function(k, v) {
			
			if(v.CustomersType==0){
			CustomersType="服务商";
			}
			if(v.CustomersType==1){
			CustomersType="商户";
			}
			if(v.CustomersType==2){
			CustomersType="散户";
			}
			if(v.RegisterTime!=null){
			var timestamp3 = v.RegisterTime.substr(6,13);
			var newDate = new Date();
			newDate.setTime(timestamp3);
		var regtime = newDate.format('yyyy-MM-dd hh:mm:ss')}

		else{
		regtime =" ";
		}
			<?php if( session('data')['CustomersType']==0&session('flag')==0){ ?>
			if(StaffSysNo){
        	var cz = "<a href=\"#\" onclick=\"OrderView('"+v.Customer+"')\" class=\"btn btn-danger btn-xs\">查看订单</a>&emsp;<a href=\"#\" class=\"btn btn-danger btn-xs detail\" onclick = \"Business_Detail("+v.SysNo+")\">商户详情</a>";

        	var list="<select id=\"MySelect\" class=\"sel\"><option value=\"0\" selected=\"selected\">请选择</option><option value=\"1\">查看订单</option><option value=\"2\">商户详情</option><option value=\"7\">上级费率订单</option><option value=\"4\">商户费率订单</option><option value=\"6\">调拨</option></select>";

			tt += "<tr><td>"+v.SysNo+"</td><td>"+v.Customer+"</td><td>"+v.CustomerName+"</td><td>"+v.Phone+"</td><td>"+v.DwellAddress+"</td><td>"+CustomersType+"</td><td>"+regtime+"</td><td>"+cz+"</td><td>"+list+"</td></tr>";
			}else{

        	var cz = "<a href=\"#\" onclick=\"OrderView('"+v.Customer+"')\" class=\"btn btn-danger btn-xs\">查看订单</a>&emsp;<a href=\"#\" class=\"btn btn-danger btn-xs detail\" onclick = \"Business_Detail("+v.SysNo+")\">商户详情</a>"

          var list="<select id=\"MySelect\" class=\"sel\"><option value=\"0\" selected=\"selected\">请选择</option><option value=\"1\">查看订单</option><option value=\"2\">商户详情</option><option value=\"4\">商户费率订单</option><option value=\"6\">调拨</option></select>";

			tt += "<tr><td>"+v.SysNo+"</td><td>"+v.Customer+"</td><td>"+v.CustomerName+"</td><td>"+v.Phone+"</td><td>"+v.DwellAddress+"</td><td>"+CustomersType+"</td><td>"+regtime+"</td><td>"+cz+"</td><td>"+list+"</td></tr>";

			}
			<?php }else if(session('servicestoretype')==0&session('flag')==1){ ?>
      		var cz="<a href=\"#\" onclick=\"OrderView('"+v.Customer+"')\" class=\"btn btn-danger btn-xs\">查看订单</a>&emsp;<a href=\"#\" class=\"btn btn-danger btn-xs detail\" onclick = \"Business_Detail("+v.SysNo+")\">商户详情</a>";

      		var list="<select id=\"MySelect\" class=\"sel\"><option value=\"0\" selected=\"selected\">请选择</option><option value=\"1\">查看订单</option><option value=\"2\">商户详情</option><option value=\"3\">上级费率订单</option><option value=\"4\">商户费率订单</option> <option value=\"5\">修改上级费率</option></select>";

			tt += "<tr><td>"+v.SysNo+"</td><td>"+v.Customer+"</td><td>"+v.CustomerName+"</td><td>"+v.Phone+"</td><td>"+v.DwellAddress+"</td><td>"+CustomersType+"</td><td>"+regtime+"</td><td>"+cz+"</td><td>"+list+"</td></tr>";
			<?php } ?>

			});


			$('#info').html(tt);
			$('#TotalCount').html(data.totalCount);
			TotalPage = Math.ceil(data.totalCount/PageSize);
			var ff ="";
			for (i=1;i<=TotalPage ;i++ )
			{
				ff+="<option value = \""+i+"\">"+i+"</option>";
			}
			$('#SelectNo').html(ff);
			$('#TotalPage').html(TotalPage);
			$('#PageNumber').html(PageNumber);
			$('#SelectNo').val(PageNumber+1);
			$('#NowPage').text(PageNumber+1);
			$(".page_new").show();
			}else{
			$('#info').html('');
			$(".page_new").hide();
			}

           }); 
	
	}

	var total,totalPage,pageStr; //总记录数，每页显示数，总页数
	$(".page_new").hide();
	var PageSize = $("#PageSize").val();
	var StaffSysNo = GetQueryString ("id");
  $("#SystemUserSysNo").val(StaffSysNo);
	var Customer = GetQueryString ("Customer");
	if(StaffSysNo){

	infoview(0,PageSize);

	}
	
	infoview(0,PageSize);
	$(".search").click(function(){

	infoview(0,PageSize);


	})
	function check(){

		infoview(0,PageSize);
    return false;


	}

	function role_assign(id){
		$(".pricing-box3").show(300);
		$(".bg_black").show();
		$.ajax({
            type: "post",
            url: "/index.php/Staff/stafflist",
            data: {
				id:id,
				PageSize:100
            },
            async: false,
            success: function(data) {
					var ll = "",tt='';
					$.each(data.model, function(k, v) {
					ll+="<li><input class=\"cy_a"+v.SysNO+"\" name=\"service[]\" type=\"checkbox\" value = \""+v.SysNO+"\"/><label for=\"cy_a1\">"+v.DisplayName+"</label></li>";
					});

					tt+="<li><input class=\"cy_a"+data.info.topid+"\" name=\"service[]\" type=\"checkbox\" value = \""+data.info.topid+"\"/><label for=\"cy_a1\">"+data.info.topname+"</label></li>";
					$("#servicelist").html(ll);
					$("#stafflist").html(tt);
					$("#customerid").val(id);
				   },
            error: function() {}

        })


	}
	
	$(".btn-refund").click(function(){

                $(".pricing-box3").hide(300);

                $(".bg_black").hide();

                $(".sel").val(0);


    })

	function ckbg(){

            $(":checkbox").parent().removeClass();

            $(":checkbox:checked").parent().addClass('activecolor');

    };
	 $(document).ready(function(){

            $(":checkbox").click(function(){

                ckbg();

            });

            $("#add").click(function(){
				var array  =  [];
				var staf = $('#stafflist li').find(':checkbox'); 
				

                var sl = $(".service_list :checkbox:checked");
				if(sl.length>1){return false;}
				for (var i = 0; i < staf.length; i++) {
				array.push("."+staf.eq(i).attr("class")); 
				}
				$("#cc").val(array);
                var temp_list = $("#cc").val();
                if (temp_list.length==0) {
                    sl.attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));
                }else{
                }
                ckbg();
            });
            // 移除

            $("#del").click(function(){

                var tl = $(".staff_list :checkbox:checked");

                tl.attr("checked", false).parent().remove();

                ckbg(); 

            });

            // 全选

            $("#ckall").click(function(){

                $(".service_list :checkbox").each(function(){

                    this.checked = !this.checked;

                });

                ckbg();

            });

            $("#ckall2").click(function(){

                $(".staff_list :checkbox").each(function(){

                    this.checked = !this.checked;

                });

                ckbg();

            });

        })

	$(".set").click(function(){
		var customerid = $('#customerid').val();
		var staffid = $('#stafflist li').find(':checkbox').val();
		if(staffid==null){
		   alert('调拔员工不能为空,请核对后提交!');
            return false;
        }
		$.ajax({
            type: "post",
            url: "/index.php/Business/customeruserupdate",
            data: {
				customerid:customerid,
				staffid:staffid
            },
            async: false,
            success: function(data) {
				if(data){
				alert('调拨成功');
				$(".pricing-box3").hide(300);
                $(".bg_black").hide();

                $(".sel").val(0);
				}else{
				alert('调拨失败');
				$(".pricing-box3").hide(300);
                $(".bg_black").hide();
				}
					
			},
            error: function() {}

        })
	
	
	})


	function OrderView(Customer){
	window.location.href="/index.php/Order/order_search?Customer="+Customer;
	
	}
	function RateView(Customer){
    	window.location.href="/index.php/OrderFund/orderfund?Customer="+Customer;
    }
	function TopRate(Customer,TopSysNo){
    	window.location.href="/index.php/OrderFund/orderfund?Customer="+Customer+"&TopSysNo="+TopSysNo;
    }
	function ServieRateView(SysNo){
    	window.location.href="/index.php/OrderFund/orderfund?SysNo="+SysNo;
    }
	function businessregister(SysNo){
        window.location.href="/index.php/Business/business_register?SystemUserSysNo="+SysNo;
    }


$(".sel").live('change',function(){
    var selectvalue = $(this).val();
    // alert(selectvalue);
    // return false;
    var StaffSysNo = GetQueryString ("id");

    var SysNo	 =$($(this).parent().parent()).children().eq(0).text();

    var Customer =$($(this).parent().parent()).children().eq(1).text();

    if (selectvalue == 1) {
		  OrderView(Customer);//查看订单
  	}
  	if (selectvalue == 2) {
  		Business_Detail(SysNo);//商户详情
  	}
  	if (selectvalue == 3) {
  		RateView(Customer);//上级费率订单
  	}
  	if (selectvalue == 4) {
  		ServieRateView(SysNo);//商户费率订单
  	}
  	if (selectvalue == 5) {
  		UpdateRate(SysNo);//修改上级费率
  	}
  	if (selectvalue == 6) {
  		role_assign(SysNo);//调拨
  	}
    if (selectvalue == 7) {
      TopRate(Customer,StaffSysNo);//上级汇率
    }
});




    function checkaction(v){
        if(v==0){
            document.searchform.action="/index.php/DownloadBusiness/downloadbusiness";
        }
        searchform.submit();
    }

</script>



</body></html>