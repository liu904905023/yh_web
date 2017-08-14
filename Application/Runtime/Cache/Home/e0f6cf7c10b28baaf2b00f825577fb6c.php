<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>

      <div class="main-content">

        <div class="breadcrumbs" id="breadcrumbs">

          <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>

          <ul class="breadcrumb">

            <li>

              <i class="icon-home home-icon"></i>

              <a href="/index.php">首页</a>

            </li>


            <li>权限</li>

          </ul>

        </div>

        <div class="page-content">

          <div class="page-header">

            <h1>权限</h1>

          </div>

          <div class="row">

            <div class="col-xs-12 sx-search">

                <div class="col-md-6 col-xs-10">

                  <div class="form-group">

                    <label for="sx-8" class="control-label col-md-2 col-xs-2">搜索员工</label>

                    <div class="col-md-10 col-xs-10">

                      <input type="text" id="username" class="form-control" placeholder="登录名" value =""></div>

                  </div>

                </div>

                <div class="col-md-6 col-xs-2">

                  <div class="form-group">

                    <button href="#" class="btn btn-primary" id = "find">

                      <i class="icon-search"></i>

                      搜索

                    </button>

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

                            <th>登录名</th>

                            <th>真实姓名</th>

                            <th>电话</th>

                            <th>邮箱</th>

                            <th>权限</th>

                          </tr>

                        </thead>

                        <tbody id = "info">

                            <!-- <td>abidke</td>

                            <td>李某某</td>

                            <td>13568985544</td>

                            <td>54658551@qq.com</td>

                            <td>

                              <a href="#" id="tk-search" class="btn btn-danger btn-xs refund">权限分配</a>

                            </td>  -->

                          

                        </tbody>

                      </table>
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

          </div>

        </div>

      </div>

    </div>

    <div class="pricing-box2">

      <div class="widget-box">

        <div class="widget-header header-color-red3">

          <h5 class="bigger lighter">权限分配</h5>

        </div>

        <div class="widget-body">

          <div class="widget-main">

            <div class="per_ass">

              <div class="left">

                <h3>权限列表</h3>

                <div class="service_list">
				<input type = "hidden" id = "staffid" value= "">
				<input type = "hidden" id = "cc" value= "">
                  <ul class="datalist" id = "servicelist">

                    <!-- <li>

                      <input class="cy_a1" name="" type="checkbox" />

                      <label for="cy_a1">服务商1</label>

                    </li>

                    <li>

                      <input class="cy_a2" name="" type="checkbox" />

                      <label for="cy_a2">服务商2</label>

                    </li>

                    <li>

                      <input class="cy_a3" name="" type="checkbox" />

                      <label for="cy_a3">服务商3</label>

                    </li>

                    <li>

                      <input class="cy_a4" name="" type="checkbox" />

                      <label for="cy_a4">服务商4</label>

                    </li>

                    <li>

                      <input class="cy_a5" name="" type="checkbox" />

                      <label for="cy_a5">服务商5</label>

                    </li>

                    <li>

                      <input class="cy_a6" name="" type="checkbox" />

                      <label for="cy_a1">服务商6</label>

                    </li>

                    <li>

                      <input class="cy_a7" name="" type="checkbox" />

                      <label for="cy_a2">服务商7</label>

                    </li>

                    <li>

                      <input class="cy_a8" name="" type="checkbox" />

                      <label for="cy_a3">服务商8</label>

                    </li>

                    <li>

                      <input class="cy_a9" name="" type="checkbox" />

                      <label for="cy_a4">服务商9</label>

                    </li>

                    <li>

                      <input class="cy_a10" name="" type="checkbox" />

                      <label for="cy_a5">服务商10</label>

                    </li> -->

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

                <h3>员工权限列表</h3>

                <div class="staff_list">

                  <ul class="datalist" id = "stafflist">

                    <!-- <li>

                      <input class="cy_a1" name="" type="checkbox" />

                      <label for="cy_a1">服务商1</label>

                    </li>

                    <li>

                      <input class="cy_a2" name="" type="checkbox" />

                      <label for="cy_a1">服务商2</label>

                    </li> -->

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
  <input type="hidden" id = "customertype" value="<?php echo ($_SESSION['data']['CustomersType']); ?>">

  <!-- jquery库调用-start -->  <!-- <script src="/Public/assets/js/jquery-2.0.3.min.js"></script> -->  <script src="/Public/assets/js/jquery.js"></script>  <script src="/Public/assets/js/ace-extra.min.js"></script>  <script src="/Public/assets/js/jquery.mobile.custom.min.js"></script>  <script src="/Public/assets/js/bootstrap.min.js"></script>  <script src="/Public/assets/js/typeahead-bs2.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.min.js"></script>  <script src="/Public/assets/js/jquery.dataTables.bootstrap.js"></script>  <script src="/Public/assets/js/ace-elements.min.js"></script>  <script src="/Public/assets/js/ace.min.js"></script>  <script src="/Public/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>  <script src="/Public/assets/js/jquery.validate.min.js"></script>  <script src="/Public/assets/js/page.js"></script>  <!-- <script src="/Public/assets/js/pageGroup.js"></script> -->  <script src="/Public/assets/js/timestamp.js"></script> <script src="/Public/assets/js/common.js"></script> <script src="/Public/assets/js/My97DatePicker_v0.0.1/WdatePicker.js"></script> <script src="/Public/assets/js/OrderType.js"></script>  <!-- jquery库调用-end -->
  <script>
    var permissions = $("#customertype").val();
    $(function(){
      if(permissions == 0){
        
      }
    })
  </script>

  <script type="text/javascript">

        $(document).ready(function(){

            $(":checkbox").click(function(){

                ckbg();

            });

            // 添加  
           /*$("#add").click(function(){

                var serv = $(".service_list :checkbox:checked");
                // 模拟已经受权列表数据

				 var staf = $('#stafflist li').find(':checkbox'); 
				 //var serv = $('#servicelist li').find(':checkbox'); 
				var numArr = [];
				for (var i = 0; i < staf.length; i++) {
				numArr.push(staf.eq(i).val()); 
				}
				if(staf.length>0){
				for (var i = 0; i < serv.length; i++) {
				servvalue =  serv.eq(i).val();
					
						//alert($.inArray(servvalue, numArr));
						
						if($.inArray(servvalue, numArr)>=0){
						//alert("已存在");
						serv.not(servvalue).attr("checked", false);
						}else{
						
						alert(servvalue);
						}

						
					}
				}else{
						serv.attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));
					}

             

                    //不存在

                    //alert(1);

                   // sl.attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));

             

                    //存在

                    //alert(22222222);

                    //sl.not(temp_list).attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));

                
                ckbg();

            });*/
             $("#add").click(function(){
				var array  =  [];
				var staf = $('#stafflist li').find(':checkbox'); 
				for (var i = 0; i < staf.length; i++) {
				array.push("."+staf.eq(i).attr("class")); 
				}
				$("#cc").val(array);

                var sl = $(".service_list :checkbox:checked");
				
                var temp_list = $("#cc").val();
                if (temp_list.length==0) {
                    //不存在
                    //alert(1);
                    sl.attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));
                }else{
                    //存在
                    //alert(22222222);
                    sl.not(temp_list).attr("checked", false).parent().clone(true).appendTo($(".staff_list .datalist"));
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

        function ckbg(){

            $(":checkbox").parent().removeClass();

            $(":checkbox:checked").parent().addClass('activecolor');

        };

    </script>



  <script type="text/javascript">

        jQuery(function($) {

           $(".refund").click(function(){

                $(".pricing-box2").show(300);

                $(".bg_black").show();

            });

            $(".btn-refund").click(function(){

                $(".pricing-box2").hide(300);

                $(".bg_black").hide();

            })



            var oTable1 = $('#sample-table-2').dataTable( {

            "aoColumns": [

                { "bSortable": false },

                null, null,null, null, null,

              { "bSortable": false }

            ] } );

            

            

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
	function role_assign(id){
		$(".pricing-box2").show(300);
		$(".bg_black").show();
		 $.ajax({
            type: "post",
            url: "/index.php/Permission/staffrolelist",
            data: {
                username: $("#username").val(),
            },
            async: false,
            success: function(data) {
					var ll = "";
					$.each(data.model, function(k, v) {
					ll+="<li><input class=\"cy_a"+v.SysNo+"\" name=\"service[]\" type=\"checkbox\" value = \""+v.SysNo+"\"/><label for=\"cy_a1\">"+v.RoleName+"</label></li>";
					});
					$("#servicelist").html(ll);
					$("#staffid").val(id);
				   },
            error: function() {}

        })

		 $.ajax({
            type: "post",
            url: "/index.php/Permission/userrolelist",
            data: {
                SystemUserSysNo: id
            },
            async: false,
            success: function(info) {
					var ww = "";
					var cc = [];
					$.each(info, function(x, y) {
					ww+="<li><input class=\"cy_a"+y.SystemRoleSysNo+"\" name=\"service[]\" type=\"checkbox\" value = \""+y.SystemRoleSysNo+"\"/><label for=\"cy_a1\">"+y.RoleName+"</label></li>";
					//cc.push(".cy_a"+y.SystemRoleSysNo+"");
					});
					$("#stafflist").html(ww);
					//$("#cc").html(cc);
					
		   },
            error: function() {}

        })


	}
	$(".page_new").hide();
	var PageSize = $("#PageSize").val();
	$("#find").click(function(){
	infoview(0,PageSize);


	

	});

		function infoview(PageNumber,PageSize){
		
			var tt="";
			 if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
						return false;
			}

			this.ajaxRequest_ =$.post("/index.php/Permission/query_staff",{username:$("#username").val(),PageNumber:PageNumber,PageSize:PageSize},function(data){
				if(data.totalCount>0){
					var tt = "";
					$.each(data.model, function(k, v) {
					tt+="<tr><td>"+v.LoginName+"</td><td>"+v.DisplayName+"</td><td>"+v.PhoneNumber+"</td><td>"+v.Email+"</td><td><a href=\"javascript:void(0);\" onclick=\"role_assign("+v.SysNO+")\" id=\"tk-search\" class=\"btn btn-danger btn-xs\">权限分配</a></td></tr>";
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
				}else{
				$('#info').html("");
				$(".page_new").hide();
				}
					
			});
		}


	$(".set").click(function(){
		var staffid = $("#staffid").val();
		var numArr = []; // 定义一个空数组
        var txt = $('#stafflist li').find(':checkbox'); // 获取所有文本框
		for (var i = 0; i < txt.length; i++) {
            numArr.push(txt.eq(i).val());
		}
		/*if (this.ajaxRequest1_ != undefined && this.ajaxRequest1_.readyState < 4) {
                    return false;
        }
		
		this.ajaxRequest1_ = $.post("/index.php/Permission/roledelete",{SystemUserSysNo:staffid},function(data){
			if(txt.length==0){
				alert(data.Description);
				$(".pricing-box2").hide(300);
                $(".bg_black").hide();
			}
		
		
		});*/

		$.ajax({
                    type : "post",
                    url : "/index.php/Permission/roledelete",
                    data : {
                       SystemUserSysNo:staffid
                    
                      
                    },
                    async:false,
                    success : function ( data ){
					if(data.Code==0){
                        if(txt.length==0){
							alert(data.Description);
							$(".pricing-box2").hide(300);
							$(".bg_black").hide();
						}
						}
                    }

                })

        for (var i = 0; i < txt.length; i++) {
            //numArr.push(txt.eq(i).val()); // 将文本框的值添加到数组中
			rolevalue =  txt.eq(i).val(); // 将文本框的值添加到数组中

			}

			/*if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
                    return false;
			}
		
			this.ajaxRequest_ = $.post("/index.php/Permission/roleinsert",{SystemRoleSysNo:numArr,SystemUserSysNo:staffid},function(data){
			if(data.Code==0){
				alert(data.Description);
				$(".pricing-box2").hide(300);
                $(".bg_black").hide();
				}
		
			});*/
			if(txt.length>0){
			$.ajax({
                    type : "post",
                    url : "/index.php/Permission/roleinsert",
                    data : {
                       SystemRoleSysNo:numArr,
					   SystemUserSysNo:staffid
                    
                      
                    },
                    async:false,
                    success : function ( data ){
					if(data.Code==0){
							alert(data.Description);
							$(".pricing-box2").hide(300);
							$(".bg_black").hide();
						}
                    }

                })
			}
		//alert("111");
	
	})






</script>

</body></html>