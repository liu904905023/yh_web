<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

            <div class="main-content">

                <div class="breadcrumbs" id="breadcrumbs">

                    <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>

                    <ul class="breadcrumb">

                        <li>

                            <i class="icon-home home-icon"></i>

                            <a href="/index.php">首页</a>

                        </li>

                        <li>订单详情</li>

                    </ul>

                </div>

                <div class="page-content">

                    <div class="page-header">

                        <h1>订单详情</h1>

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
                                        <input type="hidden" id="dtp_input1" name="dtp_input1" value="<?php echo date('Y-m-d',time()); ?>" />
                                        <input type="hidden" id="type" value="<?php echo ($_SESSION['data']['CustomersType']); ?>" />
                                        <input type="hidden" id="serstafftype" value="<?php echo (session('servicestoretype')); ?>" />
                                        <input type= "hidden" value = "" id ="SystemUserSysNo" name = "SystemUserSysNo">
										<input type="hidden" id="flag" value="<?php echo (session('flag')); ?>" />
                                        <input type= "hidden" value = "" id ="Customer" name = "Customer">
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12 mr_mab">
                                    <div class="form-group">
                                        <label for="sx-2" class="control-label col-sm-4">结束时间</label>
                                        <div class="col-sm-8 input-group">

                                            <input type="text" id="Time_End" name="Time_End" value="<?php echo date('Y-m-d',time()).' 23:59:59'; ?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="form-control"/>
                                            <span class="input-group-addon">

                                                <span class="glyphicon glyphicon-time"></span>

                                            </span>

                                        </div>
                                        <input type="hidden" id="dtp_input2" name="dtp_input2" value="<?php echo date('Y-m-d',time()); ?>" />
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-xs-12 mr_mab StoreName"  id = "StoreName" >
                                    <div class="form-group" >
                                        <label for="sx-8" class="control-label col-sm-4">员工登录名</label>
                                        <div class="col-sm-8">
                                            <input type="text"  id="staffloginname" name = "staffloginname" class="form-control" placeholder="员工登录名" >
                                        </div>
                                    </div>
                                </div>

								<div class="col-md-6 col-xs-12 mr_mab StoreName"  id = "StoreName" >
                                    <div class="form-group" >
                                        <label for="sx-8" class="control-label col-sm-4">真实姓名</label>
                                        <div class="col-sm-8">
                                            <input type="text"  id="realname" name = "realname" class="form-control" placeholder="真实姓名" required="required" ></div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-xs-12 mr_mab StoreName"  id = "StoreName" >
                                    <div class="form-group" >
                                        <label for="sx-8" class="control-label col-sm-4">订单号</label>
                                        <div class="col-sm-8">
                                            <input type="text"  id="ordernum" name = "ordernum" class="form-control" placeholder="订单号" required="required" ></div>
                                    </div>
                                </div>


								 <div class="col-md-6 col-xs-12 mr_mab">
                                    <div class="form-group">
                                        <label for="sx-2" class="control-label col-sm-4">交易类型</label>
                                        <div class="col-sm-8 input-group posi" >
                                            <input type="text" id="" name="" class="form-control list" placeholder="请选择类型">
                                            <span class="input-group-addon bor">
                                                <span class="glyphicon glyphicon-chevron-down"></span>
                                            </span>
                                            <ul class="l-list">
                                        </div>
                                        
                                    </div>
                                    
                                </div>
								
								
								
                                <div class="clearfix"></div>

                                <div class="col-md-12 col-xs-12">
								<input type ="hidden" id = "buttontype" name="buttontype" value =0>
                                    <div class="form-group txrimar">

                                        <a href="#" class="btn btn-primary" id ="search">

                                            <i class="icon-search"></i>

                                            查询

                                        </a>
										&nbsp;

										<!--<a href="#" class="btn btn-primary" id ="allcount">-->

                                            <!--<i class="icon-search"></i>-->

                                            <!--汇总-->

                                        <!--</a>-->
                                        &nbsp;
                                        <a href="#" type="submit" class="btn btn-success" id="download" onclick="checkaction(0);">

                                            <i class="icon-download-alt" ></i>

                                            下载报表

                                        </a>
                                        <input type="hidden" value="" id="input_hidden" name="input_hidden">

                                    </div>

                                </div>
</form>
                                <div class="clearfix"></div>

                                <div class="row">

                                    <div class="table-header">查询结果 

									</div>

                                    <div class="col-xs-12">

                                        <div class="table-responsive">

                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                                                <thead>

                                                    <tr id = "info_name">

														<th>员工登录名</th>

                                                        <th>员工真实姓名</th>

                                                        <th>订单号</th>

                                                        <th>交易类型</th>

                                                        <th>总金额</th>

                                                        <th>折后金额</th>

                                                        <th>已退金额</th>

                                                        <th>可退金额</th>

                                                        <th>退款笔数</th>

                                                        <th>交易时间</th>

                                                    </tr>

                                                </thead>

                                                <tbody id = "info">

                                                    <!-- <tr>

                                                        <td>01</td>

                                                        <td>021355123541</td>

                                                        <td>微信</td>

                                                        <td>58.00</td>

                                                        <td>人民币</td>

                                                        <td>2016-05-26</td>

                                                    </tr> -->

                                                </tbody>

                                            </table>
                                        <input type="hidden" id="aa" value=1 >

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

            </div>

        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">

            <i class="icon-double-angle-up icon-only bigger-110"></i>

        </a>

    </div>

  <!-- jquery库调用-start -->

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
    // $("#Time_Start").blur(function(){
    //     if($(this).val()==""){
    //         $("#dtp_input1").val("");
    //     }
    // })
    // $("#Time_End").blur(function(){
    //     if($(this).val()==""){
    //         $("#dtp_input2").val("");
    //     }
    // })

    </script>
	<script>
	function infoview(PageNumber,PageSize){
			var Time_Start     = $("#Time_Start").val();
			var Time_end       = $("#Time_End").val();
            var staffloginname = $("#staffloginname").val();
            var realname       = $("#realname").val();
            var ordernum       = $("#ordernum").val();
			var Ordertype      = $("input[type='radio']:checked").val();

			var tt="";
			 if (this.ajaxRequest_ != undefined && this.ajaxRequest_.readyState < 4) {
				return false;
			}

			this.ajaxRequest_ =
			$.post("/index.php/OrderStatistics/orderstatistics",{Time_Start:Time_Start,Time_end:Time_end,PageNumber:PageNumber,PageSize:PageSize,staffloginname:staffloginname,realname:realname,Ordertype:Ordertype,ordernum:ordernum},function(data){
					if(data.totalCount>0){
					$(".page_new").show();
					$.each(data.model, function(k, v) {

					tt += "<tr><td>"+v.loginname+"</td><td>"+v.displayname+"</td><td>"+v.outtradeno+"</td><td>"+v.paytype+"</td><td>"+v.totalfee+"</td><td>"+v.cashfee+"</td><td>"+v.refundfee+"</td><td>"+v.fee+"</td><td>"+v.refundcount+"</td><td>"+v.timestart+"</td><tr>";

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

           });
	}
	var total,totalPage,pageStr; //总记录数，每页显示数，总页数
	var PageSize = $("#PageSize").val();
	$(".page_new").hide();
	$('#allcount').click(function(){
		$('#total_name').show();
		$('#info').html("");
		infoview(0,PageSize);
	});
    $('#search').click(function(){
        $('#total_name').show();
        $('#info').html("");
        infoview(0,PageSize);
    });
function checkaction(v){
    if(v==0){ 
        document.searchform.action="/index.php/DownloadOrderStatistics/downloadorderstatistics";
    }
    searchform.submit(); 
} 


</script>
</body>