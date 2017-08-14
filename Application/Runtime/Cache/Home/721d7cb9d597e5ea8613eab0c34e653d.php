<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>
		<div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="/index.php">首页</a>
                        </li>
                        <li>退款</li>
                    </ul>
                </div>
                <div class="page-content">
                    <div class="page-header">
                        <h1>退款</h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 sx-search">
<form id="searchform" name="searchform"  method="post" >
                                <div class="col-md-6 col-xs-12 mr_mab">
                                    <div class="form-group">
                                        <label for="dtp_input1" class="control-label col-sm-4" >交易时间从</label>
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
                                        <label for="sx-2" class="control-label col-sm-4">交易时间到</label>
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
                                        <label for="sx-8" class="control-label col-sm-4">订单号</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="ordernum" name="ordernum" class="form-control" placeholder="订单号"></div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-xs-12 mr_mab">
                                    <div class="form-group">
                                        <label for="sx-8" class="control-label col-sm-4">商户名称</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="storename" class="form-control" placeholder="商户名称"></div>
                                    </div>
                                </div> -->
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group txrimar">
                                        <a href="#" class="btn btn-primary" id ="search">
                                            <i class="icon-search"></i>
                                            查询
                                        </a>
                                        &nbsp;
                            
                                        <a href="#" type="submit" class="btn btn-success" id="download" onclick="checkaction(0);">
                                            <i class="icon-download-alt"></i>
                                            下载报表
                                        </a>
                                    </div>
                                </div>
                            </form>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="table-header">查询结果</div>
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                     <tr>
                                                        <th>序号</th>
                                                        <th>订单号</th>
                                                        <th>交易类型</th>
                                                        <th>交易币种</th>
                                                        <th>交易时间</th>
                                                        <th>订单金额</th>
                                                        <th>已退总金额</th>
                                                        <th>可退金额</th>
                                                        <th>退款笔数</th>
                                                        <th>退款操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody id = "info">
                                                    
                                                </tbody>
                                            </table>
											<input type = "hidden" id = "totalCount" value= "">
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
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box">
            <div class="widget-header header-color-red3">
                <h5 class="bigger lighter">退款</h5>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-12 mr_mab">
                            <div class="form-group">
								<input type = "hidden" value ="" id = "SOSysNo">
								<input type = "hidden" value ="" id = "total_fee">
								<input type = "hidden" value ="" id = "leftfee">
								<input type = "hidden" value ="" id = "paytype">
								<input type = "hidden" value ="" id = "casfee">
								<input type = "hidden" value ="" id = "timestart">
                                <label for="" class="control-label col-md-3 col-xs-12">退款订单号</label>
                                <div class="col-md-9 col-xs-12">
                                    <input type="text" id="refundnum" value ="" class="form-control" disabled="" placeholder="退款订单号"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mr_mab">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3 col-xs-12">退款金额</label>
                                <div class="col-md-9 col-xs-12">
                                    <input type="text" id="fee" value ="" class="form-control" placeholder="退款金额（元）"></div>
                            </div>
                            <div class="form-group refund_fee" style="display:none">
                                <label for="" class="control-label col-md-3 col-xs-12"></label>
                                <div class="col-md-9 col-xs-12 mt15 error">
                                退款金额不符
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3 col-xs-12">密码</label>
                                <div class="col-md-9 col-xs-12">
                                    <input type="password" id="password" class="form-control" placeholder="密码" value = ></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="refund_box">
                    <a href="#" class="btn btn-danger  confirm_refund" >
                        <i class="icon-exclamation-sign bigger-110"></i>
                        <span>确认退款</span>
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
    $(function(){
        var f = $("#fee").val();
        var reg = /^[0-9]+([.]{1}[0-9]{1,2})?$/;
        $("#fee").blur(function(){
            if($("#fee").val() == 0 || !reg.test($("#fee").val())){
                $("#fee").val("");
                $('.refund_fee').show();
                setTimeout(function(){$("#fee").focus();},0);
                return false;
            }
                $('.refund_fee').hide();
        })
    })

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

	function confirmAct(m,n,p,f,t,casfee,type,timestart,total_fee){
	if(confirm('确定要执行此操作吗?'))
	{	
		$.ajax( {
                    type : "post",
                    url : "/index.php/Refund/refundinsert",
                    data : {
                        out_trade_no:m,
						SOSysNo:n,
						refund_fee:f,
						paytype:type,
						total_fee:total_fee,
						timestart:timestart
                    
                      
                    },
                    async:false,
                    success : function ( data ){

                        alert(data.Description);
						 $(".pricing-box").hide(300);
						 location.reload();
						 $(".bg_black").hide();
						 $("#fee,#password").val("");
                    },
                    error : function (){
                        //alert( 'ajax error!' );
                    }

                })

		
		return true;
	}else{
	
		return false; 

	}
			

	}

    
		function wxrefund(m,n,t,totalfee,casfee,type,timestart){//m:订单号,n:主键ID,t:可退金额,p:密码,totalfee:总计
            $(".pricing-box").show(300);
            $(".bg_black").show();
			$("#refundnum").val(m);
			$("#SOSysNo").val(n);
			$("#total_fee").val(totalfee);
			$("#leftfee").val(t);
			$("#casfee").val(casfee);
			$("#paytype").val(type);
			$("#timestart").val(timestart);

        };

			$(".confirm_refund").click(function(){
			var p = $("#password").val();
			var f = parseFloat($("#fee").val());
			console.log(f);
			var m = $("#refundnum").val();
			var n = $("#SOSysNo").val();
			var t = parseFloat( $("#leftfee").val());
			var paytype =$("#paytype").val();
			var casfee =$("#casfee").val();
			var timestart =$("#timestart").val();
			var total_fee =$("#total_fee").val();
			console.log(total_fee);
            var reg = /^[0-9]+([.]{1}[0-9]{1,2})?$/;
			
			if(f>t){$('.refund_fee').show();return false;}else{$('.refund_fee').hide();}
			   $.ajax( {
                    type : "post",
                    url : "/index.php/Refund/checkuserpass",
                    data : {
                       password:p
                    
                      
                    },
                    async:false,
                    success : function ( data ){
						if(data	==0){
                        alert("密码错误请重新输入");
						return false;
						}else if(data ==1){
						confirmAct(m,n,p,f,t,casfee,paytype,timestart,total_fee);
						}
                    },
                    error : function (){
                        alert( 'ajax error!' );
                    }

                    })

			});
        $(".btn-refund").click(function(){
            $(".pricing-box").hide(300);
            $(".bg_black").hide();
        })
	
	var total,totalPage,pageStr; //总记录数，每页显示数，总页数
	



	function infoview(PageNumber,PageSize){
		var Time_Start = $("#Time_Start").val();
		var Time_End = $("#Time_End").val();
		var out_trade_no = $("#ordernum").val();
		//var Customer = $("#storename").val();
		var tt="";
		 if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
                    return false;
        }

			this.ajaxRequest_ =
			$.post("/index.php/Refund/refundlist",{Time_Start:Time_Start,Time_End:Time_End,out_trade_no:out_trade_no,PageNumber:PageNumber,PageSize:PageSize},function(data){
			if(data.totalCount>0){
			$.each(data.model, function(k, v) {
			
			if(v.fee>0){
				if(v.Pay_Types==103){
					var renfundbutton = "<a  href=\"#\" onclick=\"wxrefund('"+v.Out_trade_no+"',"+v.SysNo+","+v.fee+","+v.Total_fee+","+v.Cash_fee+","+v.Pay_Types+",'"+v.Time_Start+"')\" class=\"btn btn-danger btn-xs  \">"+v.Pay_Type+"退款</a>";
			
				}else{
					var renfundbutton = "<a href=\"#\" onclick=\"wxrefund('"+v.Out_trade_no+"',"+v.SysNo+","+v.fee+","+v.Total_fee+","+v.Cash_fee+","+v.Pay_Types+",'"+v.Time_Start+"')\"  class=\"btn btn-danger btn-xs  \">"+v.Pay_Type+"退款</a>";
				}

			}else{
			var renfundbutton = "<a  class=\"btn btn-info btn-xs  \">完成</a>";
			}
			
			tt += "<tr><td>"+v.SysNo+"</td><td>"+v.Out_trade_no+"</td><td>"+v.Pay_Type+"</td><td>人民币</td><td>"+v.Time_Start+"</td><td>"+v.Cash_fee+"</td><td>"+v.refund_fee+"</td><td>"+v.fee+"</td><td>"+v.refundCount+"</td><td>   "+renfundbutton+"</td></tr>";
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
			$('#info').html("");
			$(".page_new").hide();
			}
            $('#download').attr("disabled",false);
           }); 
	}

	var total,totalPage,pageStr; //总记录数，每页显示数，总页数
	var PageSize = $("#PageSize").val();
	infoview(0,PageSize);
    $("#download").click(function(){
    $.post("/index.php/Download/downloadrefund",{PageNumber:0,PageSize:2000},function(data){ 
    });
    });

    function check(){
        infoview(0,PageSize);
        return false;
    }

	$("#search").click(function(){
					infoview(0,PageSize);
		
	});
/*	$("#first").click(function(){
		NowPage = parseInt($("#NowPage").text());
		if(NowPage>1){
			Page = 0;
		infoview(Page,PageSize);
		}else{
		$(this).addClass("disabled");
		}
		
		
	})
	$("#last").click(function(){
	
		LastPage = parseInt($("#TotalPage").text());
		NowPage = parseInt($("#NowPage").text());
		if(LastPage==NowPage){
		
		}else{
		Page = LastPage-1;
		infoview(Page,PageSize);
		}
	})
	$("#prev").click(function(){
		
		NowPage = parseInt($("#NowPage").text());
		Total = parseInt($("#TotalPage").text());
		Page = NowPage-2;
		if(Page<0){
			$(this).addClass("disabled");
		}else{
		$(this).removeClass();
		infoview(Page,PageSize);
		}
	
	})
	$("#next").click(function(){
	
		NowPage = parseInt($("#NowPage").text());

		Total = parseInt($("#TotalPage").text());
		Page = NowPage;
		if(Page>=Total){
			$(this).addClass("disabled");
		}else{
			$(this).removeClass();
			infoview(Page,PageSize);
		}
		
		
	})
	$('#SelectNo').change(function(){
	var Page = parseInt($(this).children('option:selected').val())-1;
	infoview(Page,PageSize);
	
	})*/
function checkaction(v){ 
    if(v==0){ 
        document.searchform.action="/index.php/Download/downloadrefund"; 
    }
    searchform.submit(); 
} 							




</script>
</body></html>