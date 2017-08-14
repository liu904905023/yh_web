<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">try {
                ace.settings.check( 'breadcrumbs','fixed' )
            } catch ( e ) {
            }</script>
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="/index.php">首页</a>
            </li>
            <li>员工列表</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>员工列表</h1>
        </div>
        <div class="row">
            <!-- <form class="form-horizontal" id="validation-form" method="post" action="/index.php/Staff/staff_list"> -->
            <div class="col-xs-12 sx-search">
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
                                            <th>地址</th>
											<th>门店ID</th>
                                            <th>注册时间</th>
											<th>操作</th>
                                            <th>更多操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "info">
                                        <!--<tr >
                                             <td><?php echo ($i); ?></td>
                                            <td><?php echo ($vo["LoginName"]); ?></td>
                                            <td><?php echo ($vo["DisplayName"]); ?></td>
                                            <td><?php echo ($vo["PhoneNumber"]); ?></td>
                                            <td><?php echo ($vo["Email"]); ?></td>
                                            <td>
                                                <script>
                                                    function str2date1( str ){
                                                        var newDate = new Date();
                                                        newDate.setTime(
                                                            str.substring( 6,
                                                                19 ) );
                                                        return newDate.toLocaleString();
													//return str;
													//doucment.write('1465888735650' );
                                                    }
                                                    var str = "<?php echo ($vo["InDate"]); ?>";

                                                    document.write(str2date1(str));
												</script>
											</td>
											<td><a href="business_list.html" class="btn btn-danger btn-xs">查看</a></td> 
                                        </tr>-->
                                    </tbody>

                                </table>
                                <!--
								<ul class="pagination pull-right">
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
								</ul>-->

                                            <div class="page_new">
                                                <input type = "hidden" id = "totalCount" value= "">
                                                 <a id="prev">上一页</a>  <a id = "next">下一页</a> <a id = "first">最前页</a> <a id = "last">最末页</a>
                                                <select id = "SelectNo">
                                                    
                                                </select>
                                                <span>总 <label id = "TotalCount"></label> 条</span> <span>分为 <label id = "TotalPage"></label> 页</span> <span>当前第 <label id ="NowPage">1</label> 页</span><input type= "hidden" id= "PageSize" value=10>
                                            </div>

                            </div>
                        </div>
                    </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div>
  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->
<script type="text/javascript">

    jQuery( function ( $ ){

        $( '#validation-form' ).validate( {
            errorElement : 'div',
            errorClass : 'help-block',
            focusInvalid : false,
            rules : {
                username : {
                    username:true

                },
                phone : {
                    mobile:true

                }

            },
            messages : {
                username : {
                    required : "登录名不能为空.",
                    username:"输入正确的登录名"

                },
                sx_pass : {
                    required : "密码不能为空."

                },
                subscription : "Please choose at least one option",
                gender : "Please choose gender",
                agree : "Please accept our policy"

            },
            invalidHandler : function ( event,
                validator ){ //display error alert on form submit   

                $( '.alert-danger',$( '.login-form' ) ).
                    show();

            },
            highlight : function ( e ){

                $( e ).closest( '.form-group' ).
                    removeClass( 'has-info' ).addClass(
                    'has-error' );

            },
            success : function ( e ){

                $( e ).closest( '.form-group' ).
                    removeClass( 'has-error' ).addClass(
                    'has-info' );

                $( e ).remove();

            },
            errorPlacement : function ( error,element ){

                if ( element.is( ':checkbox' ) ||
                    element.is( ':radio' ) ) {

                    var controls = element.closest(
                        'div[class*="col-"]' );

                    if ( controls.find(
                        ':checkbox,:radio' ).length > 1 )
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

                    error.insertAfter( element.siblings(
                        '[class*="select2-container"]:eq(0)' ) );

                }

                else if ( element.is(
                    '.chosen-select' ) ) {

                    error.insertAfter( element.siblings(
                        '[class*="chosen-container"]:eq(0)' ) );

                }

                else
                    error.insertAfter(
                        element.parent() );

            },
            submitHandler : function ( form ){
              /*  $.ajax( {
                    type : "POST",
                    url : "/index.php/Staff/staff_list",
                    data : {
                        sx_dlm : $( "#sx_dlm" ).val(),
                        sx_pass : $(
                            "#sx_pass" ).
                            val(),
                        sx_name : $( "#sx_name" ).val(),
                        mobile : $( "#mobile" ).val(),
                        email : $( "#email" ).
                            val(),
                        inuser : $( "#inuser" ).val(),
                        edituser : $( "#edituser" ).val(),
                    },
                    async:false,
                    success : function ( data ){
                        if ( data.Description ) {
                            alert( data.Description );
                        } else {
                            console.log( data );
                        }
                        if ( data.Code == 0 ) {
                            $( "#sx_dlm" ).val( '' );
                            $( "#sx_pass" ).val( '' );
                            $( "#sx_name" ).val( '' );
                            $( "#mobile" ).val( '' );
                            $( "#email" ).val( '' );
                            $( "#inuser" ).val( '' );
                            $( "#edituser" ).val( '' );
                        }

                    },
                    error : function ( ){
                        console.log( "error" );
                    }

                } )*/
            },
            invalidHandler: function ( form ){

                console.log( "ajax失败！" );

            }

        } );
    } )

</script>
<script type="text/javascript">
    jQuery( function ( $ ){
        var oTable1 = $( '#sample-table-2' ).dataTable( {
            "aoColumns" : [
                { "bSortable" : false },
                null,null,null,null,null,
                { "bSortable" : false }
            ]
        } );

        $( 'table th input:checkbox' ).on( 'click',function (){
            var that = this;
            $( this ).closest( 'table' ).find(
                'tr > td:first-child input:checkbox' )
                .each( function (){
                    this.checked = that.checked;
                    $( this ).closest( 'tr' ).toggleClass( 'selected' );
                } );
        } );

        $( '[data-rel="tooltip"]' ).tooltip( {
            placement : tooltip_placement
        } );
        function tooltip_placement( context,source ){
            var $source = $( source );
            var $parent = $source.closest( 'table' )
            var off1 = $parent.offset();
            var w1 = $parent.width();
            var off2 = $source.offset();
            var w2 = $source.width();
            if ( parseInt( off2.left ) < parseInt( off1.left ) + parseInt(
                w1 / 2 ) )
                return 'right';
            return 'left';
        }
    } )
</script>
<script>
    var reg_phone = /^0?1[3|4|5|8][0-9]\d{8}$/;
    var reg_email = /.+@.+\.[a-zA-Z]{2,4}$/;
    $( "#sx-2" ).blur( function (){
        if ( reg_email.test( $( "#sx-2" ).val() ) || $( "#sx-2" ).val() ==
            "" ) {
            $( "#email" ).hide();
        }
        else {
            $( "#email" ).show();
        }
    } ).focus( function (){
        $( this ).triggerHandler( "blur" );
    } ).keyup( function (){
        $( this ).triggerHandler( "blur" );
    } );
    $( "#sx-3" ).blur( function (){
        if ( reg_phone.test( $( "#sx-3" ).val() ) || $( "#sx-3" ).val() ==
            "" ) {
            $( "#phone" ).hide();
        }
        else {
            $( "#phone" ).show();
        }
    } ).focus( function (){
        $( this ).triggerHandler( "blur" );
    } ).keyup( function (){
        $( this ).triggerHandler( "blur" );
    } );
</script>
<script type="text/javascript">
    $( '.form_datetime' ).datetimepicker( {
        //language:  'fr',
        weekStart : 1,
        todayBtn : 1,
        autoclose : 1,
        todayHighlight : 1,
        startView : 2,
        forceParse : 0,
        showMeridian : 1
    } );
    $( '.form_date' ).datetimepicker( {
        language : 'fr',
        weekStart : 1,
        todayBtn : 1,
        autoclose : 1,
        todayHighlight : 1,
        startView : 2,
        minView : 2,
        forceParse : 0
    } );

</script>
<script>
	var total,totalPage,pageStr; //总记录数，每页显示数，总页数
    $(".page_new").hide();
    var PageSize = $("#PageSize").val();
    infoview(0,PageSize);
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
				if(data.type==1){//商户
				var logintype = "<a \"javascript:void(0);\" onclick=\"orderview("+v.SysNO+")\" class=\"btn btn-danger btn-xs\">查看订单</a>";

                var list="<select class=\"sel\"><option>请选择</option><option value=\"2\">查看订单</option><option value=\"3\">员工费率订单</option>";
				}else{//服务商
				var logintype = "<a \"javascript:void(0);\" onclick=\"businessview("+v.SysNO+")\" class=\"btn btn-danger btn-xs\">查看商户</a>&emsp;<a \"javascript:void(0);\" onclick=\"businessregister("+v.SysNO+")\" class=\"btn btn-danger btn-xs\">商户注册</a>";

                var list="<select name=\"sel\" id=\"rtl\"><option selected=\"selected\">请选择</option><option onclick=\"businessview("+v.SysNO+")\">查看商户</option><option onclick=\"businessregister("+v.SysNO+")\">商户注册</option><option onclick=\"rateview("+v.SysNO+")\">上级费率订单</option><option onclick=\"customerrateview("+v.SysNO+")\">商户费率订单</option><option onclick=\"codelist("+v.SysNO+")\">批量生成二维码</option></select>";

                var list="<select class=\"sel\"><option>请选择</option><option value=\"1\">查看商户</option><option value=\"5\">商户注册</option><option value=\"3\">上级费率订单</option><option value=\"4\">商户费率订单</option> <option value=\"6\">批量生成二维码</option></select>";
				}

				tt+="<tr><td>"+v.SysNO+"</td><td>"+v.LoginName+"</td><td>"+v.DisplayName+"</td><td>"+v.PhoneNumber+"</td><td>"+v.Email+"</td><td>"+v.DwellAddress+"</td><td>"+v.Alipay_store_id+"</td><td>"+regetime+"</td><td>"+logintype+"</td><td>"+list+"</td></tr>";
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
    

    function businessview(SysNo){
    	window.location.href="/index.php/Business/business?id="+SysNo;
    }

    function orderview(SysNo){
    	window.location.href="/index.php/Order/order_search?SystemUserSysNo="+SysNo;
    }

    function rateview(TopSysNo){
    	window.location.href="/index.php/OrderFund/orderfund?TopSysNo="+TopSysNo;
    }
    function customerrateview(CustomerSysNo){
    	window.location.href="/index.php/OrderFund/orderfund?CustomerSysNo="+CustomerSysNo;
    }

    function businessregister(SysNo){
        window.location.href="/index.php/Business/business_register?SystemUserSysNo="+SysNo;
    }
    function codelist(SysNo){
        window.location.href="/index.php/QRCodeList/codelist/?topid="+SysNo;
    }




//start add by qiwei 20161205
    $(".sel").live('change',function(){
    var selectvalue = $(this).val();
    // alert(selectvalue);
    // return false;
    var SysNo = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().prev().text();
    // alert(SysNo);
    // return false;
    var Customer =$(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
    // alert(Customer);
    // return false;

    if (selectvalue == 1) {
        businessview(SysNo);//查看商户
    }
    if (selectvalue == 2) {
        orderview(SysNo);//订单查询
    }
    if (selectvalue == 3) {
        rateview(SysNo);//上级费率订单
    }
    if (selectvalue == 4) {
        customerrateview(SysNo);//商户费率订单
    }
    if (selectvalue == 5) {
        businessregister(SysNo);//商户注册
    }
    if (selectvalue == 6) {
        codelist(SysNo);//批量生成二维码
    }

});
//end add by qiwei 20161205

</script>
</body></html>