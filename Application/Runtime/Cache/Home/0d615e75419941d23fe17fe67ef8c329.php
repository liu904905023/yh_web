<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>
      <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
          <ul class="breadcrumb">
            <li>
              <i class="icon-home home-icon"></i>
              <a href="/index.php">首页</a>
            </li>
            <li>员工二维码生成</li>
          </ul>
        </div>
        <div class="page-content">
          <div class="page-header">
            <h1>员工搜索</h1>
          </div>
          <div class="row">
            <div class="col-xs-12 sx-search">
                <div class="clearfix"></div>
               <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-xs-12 mr_mab">
                                <label>登录名</label>
                                <div class="over">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="登录名" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-xs-12 mr_mab">
                                <label>电话</label>
                                <div class="over">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="电话" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-xs-12 mr_mab">
                                <label>&nbsp;</label>
                                <div class="over">
                                    <button class="btn btn-primary" id = "search">
                                        <i class="icon-search"></i>
                                        查询
                                    </button>
                                </div>
                            </div>
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
								<th>编号</th>
								<th>登录名</th>
								<th>显示名</th>
								<th>电话</th>
								<th>邮箱</th>
								<th>注册时间</th>
								<th>生成二维码</th>
                            </tr>
                        </thead>
                        <tbody id = "info">
                          <!-- <tr>
                            <td>张三</td>
                            <td>13145678978</td>
                            <td>微信</td>
                            <td>58.00</td>
                            <td>人民币</td>
                            <td>2016-05-26</td>
                            <td><a href="#" class="btn btn-danger btn-xs refund">生成码</a></td>
                          </tr> -->
                        </tbody>
                      </table>
                                            <div class="page_new">
                                                <input type = "hidden" id = "totalCount" value= "">
                                                 <a id="prev">上一页</a>  <a id = "next">下一页</a> <a id = "first">最前页</a> <a id = "last">最末页</a>
                                                <select id = "SelectNo">
                                                    
                                                </select>
                                                <span>总 <label id = "TotalCount"></label> 条</span> <span>分为 <label id = "TotalPage"></label> 页</span> <span>当前第 <label id ="NowPage">1</label> 页</span><input type= "hidden" id= "PageSize" value=10>
                                            </div>


                      <!-- <ul class="pagination pull-right">
                        <li>
                          <a href="#">«</a>
                        </li>
                        <li class="active">
                          <a href="#">1</a>
                        </li>
                        <li>
                          <a href="#">2</a>
                        </li>
                        <li>
                          <a href="#">3</a>
                        </li>
                        <li>
                          <a href="#">4</a>
                        </li>
                        <li>
                          <a href="#">5</a>
                        </li>
                        <li>
                          <a href="#">»</a>
                        </li>
                      </ul> -->


                    </div>
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
  </div>
  <div class="col-xs-6 col-sm-3 pricing-box6 ClearQrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-12 col-xs-12">商户名称</h5>
                <div class="col-md-12 col-xs-12">
                  <p class="qrcode_text" id = "displayname">
                    <?php echo ($_SESSION['data']['CustomerName']); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mr_mab">
                <div class="form-group">
                  <h5 class="col-md-12">消息通知二维码</h5>
                  
                  <div class="col-md-12">
                    <p class="qrcode_text">
                      <img src="" id="ClearQrcode" width="200" alt="">  
                      <span >
                        <?php echo ($_SESSION['data']['CustomerName']); ?></span>
                      </p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <div class="col-xs-6 col-sm-3 pricing-box6 Qrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-12 col-xs-12">商户名称</h5>
                <div class="col-md-12 col-xs-12">
                  <p class="qrcode_text" id = "displayname">
                    <?php echo ($_SESSION['data']['CustomerName']); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mr_mab">
                <div class="form-group">
                  <h5 class="col-md-12">付款二维码</h5>

                  <div class="col-md-12">
                    <p class="qrcode_text">
                      <img src="" id="paycode" width="200" alt="">  
                      <span >
                        <?php echo ($_SESSION['data']['CustomerName']); ?></span>
                      </p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="refund_box">
              <a href="#" class="btn btn-default btn-refund">
                <span>关闭</span>
              </a>
            </div> -->
          </div>
        </div>
      </div>

  <div class="col-xs-6 col-sm-3 pricing-box6 DeleteClearQrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-12 col-xs-12">商户名称</h5>
                <div class="col-md-12 col-xs-12">
                  <p class="qrcode_text"><?php echo ($_SESSION['data']['CustomerName']); ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-6">删除核销员二维码</h5>
                <div class="col-md-12">
                  <p class="qrcode_text">
                    <img id = "DeletClear1" src="" width="200" alt="">
					<span class = "qrcodename"></span>
					</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-xs-6 col-sm-3 pricing-box6 ISVQrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-6">ISV授权二维码</h5>
                <div class="col-md-12">
                  <p class="qrcode_text">
                    <img id = "ISVGO" src="" width="200" alt="">
					<span class = "qrcodename"></span>
					</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xs-6 col-sm-3 pricing-box6 AliQrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成支付宝二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-6">支付宝二维码</h5>
                <div class="col-md-12">
                  <p class="qrcode_text">
                    <img id = "aliqcode" src="" width="200" alt="">
					<span class = "qrcodename"></span>
					</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
   <div class="col-xs-6 col-sm-3 pricing-box6 IntelQrcode">
    <div class="widget-box">
      <div class="widget-header header-color-red3">
        <h5 class="bigger lighter">生成智能二维码</h5>
        <span class="glyphicon glyphicon-remove close_box btn-refund"></span>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            
            <div class="col-md-12 mr_mab">
              <div class="form-group">
                <h5 class="col-md-6">智能二维码</h5>
                <div class="col-md-12">
                  <p class="qrcode_text">
                    <img id = "intelqcode" src="" width="200" alt="">
					<span class = "qrcodename"></span>
				  </p>
					
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

  <div class="bg_black"></div>

  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->

  <!-- 退款弹出 -->
  <script>
   /* $(".refund").click(function(){
        
    });*/

	function qrcode(sysno,name){
//			if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
//						return false;
//			}
//
//			this.ajaxRequest_ =
//			$.post("/index.php/Test/index2",{SysNo:sysno},function(data){
//		
//			$(".Qrcode").show(300);
//			$(".bg_black").show();
//			//$("#displayname").text(name);
//			var path ="http://web.yunlaohu.cn/index.php/Qrcode/qrcode/qrcode?url=http://web.yunlaohu.cn/index.php/Wxpay/newpay/?systemUserSysNo="+sysno;
//			var path1 ="http://web.yunlaohu.cn/index.php/Qrcode/qrcode/qrcode?url="+data;
//			$("#paycode").attr('src',path); 
//			$("#clearcode").attr('src',path1); 
//			$(".qrcodename").html(name.replace("(","<br\>("));
//		});
		var path ="http://web.yunlaohu.cn/index.php/Qrcode/qrcode/qrcode?url=http://web.yunlaohu.cn/index.php/Wxpay/newpay/?systemUserSysNo="+sysno;
		console.log(path);
		$("#paycode").attr('src',path);
		$(".Qrcode").show(300);
		$(".bg_black").show();

	}

	function clearqrcode(sysno,name){
			if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
						return false;
			}

			this.ajaxRequest_ =
			$.post("/index.php/Test/index2",{SysNo:sysno},function(data){
		
			$(".ClearQrcode").show(300);
			$(".bg_black").show();
			//$("#displayname").text(name);
			var path1 ="http://web.yunlaohu.cn/index.php/Qrcode/qrcode/qrcode?url="+data;
			$("#ClearQrcode").attr('src',path1); 
			$(".qrcodename").html(name.replace("(","<br\>("));
		});
		

	}

	function DeletClear(sysno,name){
		if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
						return false;
			}

			this.ajaxRequest_ =
			$.post("/index.php/Test/index2",{SysNo:sysno,DeletClear:1},function(data){
					var path ="http://web.yunlaohu.cn/index.php/Qrcode/qrcode/qrcode?url="+data;
					$("#DeletClear1").attr('src',path); 
					$(".DeleteClearQrcode").show(300);
					
			
			})
			$(".qrcodename").html(name.replace("(","<br\>("));
			$(".DeleteClearQrcode").show();
			$(".bg_black").show();

	
	
	}

	function isvmobile(sysno,name){

		$(".ISVQrcode").show(300);
		$(".bg_black").show();
		
		var paths = "http://web.yunlaohu.cn/index.php/Qrcode/qrcode1?url="+sysno;
						console.log(paths);

		$("#ISVGO").attr('src',paths); 
		$(".qrcodename").html(name.replace("(","<br\>("));
	
	}
	
	function isali(sysno,name){

		$(".AliQrcode").show(300);
		$(".bg_black").show();
		
		var paths = "http://web.yunlaohu.cn/index.php/Qrcode/aliqrcode?url="+sysno;

		$("#aliqcode").attr('src',paths); 
		$(".qrcodename").html(name.replace("(","<br\>("));
	
	}
	function intel(sysno,name){

		$(".IntelQrcode").show(300);
		$(".bg_black").show();
		
		var paths = "http://web.yunlaohu.cn/index.php/Qrcode/intelqrcode?url="+sysno;

		$("#intelqcode").attr('src',paths); 
		$(".qrcodename").html(name.replace("(","<br\>("));
	
	}



    $(".btn-refund").click(function(){
        $(".pricing-box,.pricing-box3,.pricing-box4,.pricing-box5,.pricing-box6").hide(300);
        $(".bg_black").hide();
    })

  var total,totalPage,pageStr; //总记录数，每页显示数，总页数
  $(".page_new").hide();
  var PageSize = $("#PageSize").val();
	$("#search").click(function(){
        infoview(0,PageSize);
  });
  function infoview(PageNumber,PageSize){
		var username = $("#username").val();
		var phone = $("#phone").val();
		var tt = "";
			if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
						return false;
			}

			this.ajaxRequest_ =
			$.post("/index.php/Staff/stafflist",{username:username,phone:phone,PageNumber:PageNumber,
      PageSize:PageSize},function(data){ 
			if(data){
				$.each(data.model, function(k, v) {

				var timestamp3 = v.InDate.substr(6,13);
				var newDate = new Date();
				newDate.setTime(timestamp3);
				var regetime =newDate.format('yyyy-MM-dd hh:mm:ss');
				var logintype = "<a \"javascript:void(0);\" onclick=\"qrcode("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund\">付款二维码</a>";
				var logintypes = "<a \"javascript:void(0);\" onclick=\"clearqrcode("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund\">通知二维码</a>";
				var logintype1 = "<a \"javascript:void(0);\" onclick=\"DeletClear("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund2\">删除核销员</a>";
				var logintype2 = "<a href = \"https://openauth.alipay.com/oauth2/appToAppAuth.htm?app_id="+data.AliAppId+"&redirect_uri=http://web.yunlaohu.cn/index.php/Isv/index?systemUserSysNo="+v.SysNO+"\" class=\"btn btn-danger btn-xs refund2\" target=\"_blank\" >ISV网页授权</a>";
                        var logintype3 = "<a \"javascript:void(0);\" onclick=\"isvmobile("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund2\">ISV手机授权</a>";
				var logintype4 = "<a \"javascript:void(0);\" onclick=\"isali("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund2\">支付宝付款</a>";
				var logintype5 = "<a \"javascript:void(0);\" onclick=\"intel("+v.SysNO+",'"+v.DisplayName+"')\" class=\"btn btn-danger btn-xs refund2\">智能码付款</a>";
				
				
//				if(data.AccessFlag==0){
				tt+="<tr><td>"+v.SysNO+"</td><td>"+v.LoginName+"</td><td>"+v.DisplayName+"</td><td>"+v.PhoneNumber+"</td><td>"+v.Email+"</td><td>"+regetime+"</td><td>"+logintype+" "+logintypes+" "+logintype1+" "+logintype2+" "+logintype3+" "+logintype4+" "+logintype5+"</td></tr>";
//				}else if(data.AccessFlag==1){
//				tt+="<tr><td>"+v.SysNO+"</td><td>"+v.LoginName+"</td><td>"+v.DisplayName+"</td><td>"+v.PhoneNumber+"</td><td>"+v.Email+"</td><td>"+regetime+"</td><td>"+logintype+" "+logintypes+" "+logintype1+" "+logintype4+" "+logintype5+"</td></tr>";
//				}
				
				
				});
			$("#info").html(tt);


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







			}
        }); 
  }



  </script>
</body></html>