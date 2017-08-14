<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html>    <head>        <meta charset="utf-8" />        <title>翼惠支付平台</title>		<meta name="keywords" content="翼慧,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />		<meta name="description" content="翼惠,翼惠支付平台,翼惠商户平台,长春微信支付,长春支付,长春支付宝" />        <meta name="viewport" content="width=device-width, initial-scale=1.0" />		<link rel="icon" href="/icon.ico">        <link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />        <link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />        <link rel="stylesheet" href="/Public/assets/css/ace.min.css" />        <link rel="stylesheet" href="/Public/assets/css/shanghu.css" />        <link rel="stylesheet" href="/Public/assets/css/pageGroup.css" />        <link rel="stylesheet" href="/Public/assets/css/bootstrap-datetimepicker.min.css" />        <!--[if IE 7]>        <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />        <![endif]-->        <!--[if lte IE 8]>        <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />        <![endif]-->        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->        <!--[if lt IE 9]>        <script src="/Public/assets/js/html5shiv.js"></script>        <script src="/Public/assets/js/respond.min.js"></script>        <![endif]-->    </head>    <body>        <div class="navbar navbar-default" id="navbar">            <script type="text/javascript">                try {                    ace.settings.check( 'navbar','fixed' )                } catch ( e ) {                }            </script>            <!--head_start-->            <div class="navbar-container" id="navbar-container">                <div class="navbar-header pull-left">                    <a href="/index.php" class="navbar-brand">                       <small><img src="/Public/assets/images/logo.png" alt=""> 翼惠支付平台</small>                    </a>                </div>                <div class="pull-left tenant_info">                   用户名：                    <?php if(session('flag') == 1 & session('servicestoretype')==1){ ?>                    <a href="/index.php/Conff/infoDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else if( session('data')['CustomersType']==1){ ?>                    <a href="/index.php/Conff/MerchantDetail"><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php }else{ ?>                    <a><?php if(!empty($_SESSION['data']['Customer'])): echo ($_SESSION['data']['Customer']); else: echo ($_SESSION['data']['LoginName']); endif; ?></a>                    <?php } ?>                </div>                <div class="pull-left tenant_info2">名称：<?php if(!empty($_SESSION['data']['DisplayName'])): echo ($_SESSION['data']['DisplayName']); else: echo ($_SESSION['data']['CustomerName']); endif; ?></div>                <div class="navbar-header pull-right" role="navigation">                    <a href="/index.php/Conff/password"> <i class="icon-key"></i>                        修改密码                    </a>                    <a href="/index.php/Login/logout">                        <i class="icon-off"></i>                        退出                    </a>                </div>            </div>        </div>        <!--head_end-->        <!--left_start-->        <div class="main-container" id="main-container">            <script type="text/javascript">                try {                    ace.settings.check( 'main-container','fixed' )                } catch ( e ) {                }            </script>            <div class="main-container-inner">                <a class="menu-toggler" id="menu-toggler" href="index.html">                    <span class="menu-text"></span>                </a>                <div class="sidebar" id="sidebar">                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'fixed' )                        } catch ( e ) {                        }                    </script>                                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">                            <span class="btn btn-success"></span>                            <span class="btn btn-info"></span>                            <span class="btn btn-warning"></span>                            <span class="btn btn-danger"></span>                        </div>                    </div>                    <ul class="nav nav-list">                    <?php if(is_array($list3)): $k1 = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if(in_array("CONTROLLER_NAME", $list3)){ ?>										 <li class="active"><?php }else{ ?>					<li>					<?php } ?>                        <!-- <?php if(CONTROLLER_NAME == 'Conff'): ?><li class="active">                                <?php else: ?>                            <li><?php endif; ?> -->                        <a href="#" class="dropdown-toggle">                         <img src="/Public/assets/images/ico_cloud.png" alt="">                                <span class="menu-text"><?php echo ($vo1); ?></span> <b class="arrow icon-angle-down"></b>                        </a>                        <ul class="submenu">                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['Description'] == $vo1 ): if(in_array("ACTION_NAME", $newarr)){ ?>												<li class="active"><?php }else{ ?>							<li>							<?php } ?>                             <!-- <?php if(ACTION_NAME == $newarr): ?><li class="active">                                    <?php else: ?>                                <li><?php endif; ?> -->                                <a href="/index.php<?php echo ($vo['URL']); ?>">                                    <i class="icon-double-angle-right"></i><?php echo ($vo['RoleName']); ?><br/>                                </a>                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>                         </ul><?php endforeach; endif; else: echo "" ;endif; ?> 										<input type="hidden" value ="<?php echo ($_SERVER['REQUEST_URI']); ?>" id = "URL">                    <div class="sidebar-collapse" id="sidebar-collapse">                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>                    </div>                    <script type="text/javascript">                        try {                            ace.settings.check(                                'sidebar'                                ,'collapsed' )                        } catch ( e ) {                        }												var menu = document.querySelectorAll("a");						var href = document.getElementById("URL").value;						for(var i = 0; i < menu.length; i++){							if(menu[i].getAttribute("href")==href&&menu[i].getAttribute("href")!='/index.php'&&menu[i].getAttribute("href")!='/index.php/Conff/infoDetail'&&menu[i].getAttribute("href")!='/index.php/Conff/MerchantDetail'){								menu[i].style.color = '#ed6639';								menu[i].parentNode.parentNode.style.display='block';							}						}                    </script>                </div>

    <div class="main-content"> 

     <div class="breadcrumbs" id="breadcrumbs"> 

      <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script> 

      <ul class="breadcrumb"> 

       <li> <i class="icon-home home-icon"></i> <a href="/index.php">首页</a> </li> 

       <li>微信扫码支付</li> 

      </ul> 

     </div> 

     <div class="page-content"> 

      <div class="page-header"> 

       <h1>微信扫码支付</h1> 

      </div> 

      <div class="row"> 

       <div class="col-xs-12 sx-search"> 

        <form action="aaa.php" id="validation-form" method="post" role="form"> 

         <div class="col-md-6 col-xs-12 mr_mab"> 

          <div class="form-group"> 

           <label for="sx-8" class="control-label col-sm-4">金额</label> 

           <div class="over">

           <div class="col-sm-8 input-group"> 

            <input type="text" id="fee" class="form-control" name="sx_bh" placeholder="金额" />
			<span class="input-group-addon">元</span>

           </div> 
		   <label class="control-label col-sm-4"></label>
           <div id="yz_1" class="yz text-danger col-sm-8"></div>

           </div> 

          </div> 

         </div> 

         <div class="clearfix"></div> 

         <div class="col-md-6 col-xs-12"> 

          <div class="form-group"> 

           <label for="sx-9" class="control-label col-sm-4">收款码</label><div class="over"> 

               <div class="col-sm-8"> 

                <input type="text" id="code" class="form-control" name="code" placeholder="收款码" value = ""/>
				<div id="yz_2" class="yz">收款码不能为空</div><div class= "yz" id ="TimeDown" disabled="disabled">支付倒计时<span id="num"></span>秒</div>

               </div> 

           </div>

          </div> 

         </div> 

         <div class="col-md-6 col-xs-12"> 

          <div class="form-group"> 

           <div class="col-sm-12"> 

            <button type="button" id = "pay" class="btn btn-primary"> <i class="icon-search bigger-110"></i> 确认 </button> 

           </div> 

          </div> 

         </div> 

        </form> 

       </div> 

      </div> 

     </div> 

    </div> 

   </div> 

   <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> 

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

  <script type="text/javascript">

      jQuery(function($) {    

      

        $('#validation-form').validate({

          errorElement: 'div',

          errorClass: 'help-block',

          focusInvalid: false,

          rules: {

            sx_bh: {

              // required: true

            },

            sx_shfwbh: {

              // required: true

            }

          },

      

          messages: {

            sx_bh: {

              // required: "金额不能为空."

            },

            sx_shfwbh: {

              // required: "收款码不能为空."

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

          },

          invalidHandler: function (form) {

            console.log("error");

          }

        });



      })

    </script> 
	<script>
	$(function(){
	money = $("#fee");
	var reg = /^[0-9]+([.]{1}[0-9]{1,2})?$/;
	$(".yz").hide();
	money.blur(function(){
	if(money.val()==0 || !reg.test(money.val())){
			money.val("");
			$("#yz_1").css({"margin-top":"15px","color":"#d68273"});
			$("#yz_1").html("请正确填写金额且不能为0");
			$("#yz_1").show();
			setTimeout(function(){money.focus();},0);
			return false;
		}
			$("#yz_1").hide();
	})
	
	$(document).keydown(function(e){
    if(!e) var e = window.event; 
    if(e.keyCode==49){
		clearTimeout(TimeOne);
		payact();
		jump(30); 

	}
	});


	$("#pay").click(function(){
		clearTimeout(TimeOne);
		payact();
		jump(30); 

	
	});
var TimeOne;
	function jump(count) {

                TimeOne =setTimeout(function(){
                    count--;
                    if(count > 0) {
                        $('#num').text(count);
                        jump(count);
                    } else {
                       $("#TimeDown").hide();
                    }
                }, 1000);
            }


	function payact(){
	
			
		TimeTwo = setTimeout(function () { 
		var code = $("#code").val();
		var fee = $("#fee").val();

		if(fee==0){
		$("#yz_1").show();
		$("#yz_1").css({"margin-top":"15px","color":"#d68273"});
		$("#yz_1").html("请输入正确金额!");
		return false;
		
		}
		if(code.length>18){
		$("#yz_2").show();
		$("#yz_2").css({"margin-top":"15px","color":"#d68273"});
		$("#yz_2").html("请勿重复扫码!");
		$("#code").val("")
		return false;
		}else if(code.length==0){
		$("#yz_2").show();		
		$("#yz_2").css({"margin-top":"15px","color":"#d68273"});
		$("#yz_2").html("请重新扫码或输入收款码!");
		$("#code").focus();
		return false;
		
		}
		$("#yz_2").hide();
		$("#code").attr('disabled',true);
		$("#TimeDown").show();
		if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
                    return false;
        }
		this.ajaxRequest_ = $.post("/index.php/Pay/pay1",{auth_code:code,fee:fee},function(data){ 
			if(data){
			$("#code").attr('disabled',false);
			$("#code").val("");
			$("#code").focus();
			$("#yz_2").html(data.Description);
			$("#yz_2").show();
			$('#TimeDown').hide();
			$('#num').text("");
		
			}

	
        });

			},1000);
	
	}



	})
	</script>

</body></html>