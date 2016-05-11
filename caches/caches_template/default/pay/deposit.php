<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <?php include template('member', 'header'); ?>
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link charset="utf-8" rel="stylesheet" href="<?php echo CSS_PATH;?>cashier.main-2.22.css" media="all" />
<style>
.cur{display:none;}
.bank-name{display:none;}
.ui-list-icons .healthy, .ui-list-icons .healthy-normal {
  display: block !important;
  right: auto;
  top: -18px;
  left: -1px;
  margin: 0;
  width: auto;
  color: #fff;
  padding: 1px 2px 0;
  line-height: 14px;
}
.ui-list-icons .healthy-normal {
  position: absolute;
  background: #46b900;
  width: 28px;
  height: 18px;
  color: #fff;
  text-align: center;
}
.ui-list-icons .healthy .icon,
.ui-list-icons .healthy-normal .icon {
  display: none;
}
.ui-list-icons .busy {
  background: #ff9900;
}
.ui-list-icons .repair2 {
  background: #ff3333;
}
.ui-list-icons .repair2 {
  background: #999999;
}
.ui-list-icons .healthy-ok {
  background: #46b900;
}

.long-logo .ui-list-icons .icon-gray {
    filter: none;
}
.long-logo .ui-list-icons .icon-gray  span.icon {
    filter: url("https://cashier.alipay.com:443/filters.svg#grayscale");
    filter:gray\9;
}
</style>
        <!--E 导航-->   
  
        <!--S 内容-->
        <article class="content">
        	<!--S 面包屑-->
            <div class="layout crumbs">
                <em>当前位置：</em>
                <a href="/index.php?m=member&siteid=1" title="我的快运">我的快运</a>
				
                <span>&gt;</span>
                <span class="curmbs-active">账户充值</span>
            </div>
            <!--E 面包屑-->
         	<!--S 内容-->
        	<div class="layout pro-mod">  
			<?php include template('member', 'top'); ?>
            	<div class="layout grid-s12m0">
			       <div class="col-main">
			       	 <div class="main-wrap">
                        <!--update 2013-3-21-->
						<div class="pcont-mod cash-mod">
                        	<div class="pcont-mod-hd">
                              <span class="balance-info">当前账户可用余额：<em><?php echo $memberinfo['amount'];?></em>元</span>
                               <h3 >使用充值方式：</h3>
                               <ul class="cash-list clearfix">
							   <?php $pid=0;?>
							   <?php $plogo="";?>

							   <?php $n=1; if(is_array($pay_types)) foreach($pay_types AS $k => $pay) { ?>
							   <?php if($k==0) { ?>
							   <?php $pid=$pay[pay_id];?>
							   <?php $plogo=$pay[pay_code];?>
							   <?php } ?>
                                 <li id="pay_<?php echo $pay['pay_code'];?>" <?php if($k==0) { ?> class="current"<?php } ?> onclick="selectpay(this,'<?php echo $pay['pay_id'];?>','<?php echo $pay['pay_code'];?>')" style="cursor:pointer;"><a  title="<?php echo $pay['name'];?>" ><?php echo $pay['name'];?>充值</a></li>
							   <?php $n++;}unset($n); ?>
                                 </ul>
                            </div><!--E .pcont-mod-hd--> 
                            <div class="pcont-mod-bd" id="cash-cont">
							<?php if($pay_types) { ?>			
								

                              <!--S <?php echo $pay['name'];?>充值-->
                              <form action="/index.php?m=pay&c=deposit&a=pay_recharge"  name="mainForm" id="mainForm" method="post" >
                           <div id="cash-cont-1" class="goto_pay_money " >
                           		<div class="pcont-date-mod">
                                 
                                    
                                 	<div class="line-box">
                                    	<h4>已选择支付方式：</h4>
                                        <div class="pform-list pl-w45 clearfix">
									
											<label class="img-label">
                                            	<input type="hidden" value="<?php echo $pid;?>" id="paymentid" name="pay_type" >
                                                <img src="<?php echo IMG_PATH;?>logo-<?php echo $plogo;?>.gif" alt="zhifubao" id="paymentlogo">
                                            </label>
						
                                        </div><!--E .pform-list-->
                                       <span class="Validform_checktip" style="padding-left: 50px;">注意：支付完成后，请等待界面自动跳转以确认充值成功，不要急于手动关闭界面避免充值不成功没有转成金币的现象。 </span>

										<span class="blank5"></span>
									   <div class="line-box">
                                    	<h4>请填入预付金额：</h4>
                                        <div class="pform-list">
                                            <label for="price">充值金额</label>
                                            <input id="price" name="info[price]" class="inp w128" maxlength="8"  value="<?php if(is_numeric($_GET['price'])) { ?><?php echo $_GET['price'];?><?php } ?>" style="ime-mode:disabled;" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')"  type="text" tabindex="1">&nbsp;元 
                                            <span class="Validform_checktip"  id="msgid">充值成功后，充值金额将自动显示在您的账户中。</span>                                                                                    
                                        </div><!--E .pform-list--
                                        <div class="pform-list">
                                            <label for="money">&nbsp;</label>
                                            <span class="color-blue">注意：每成功支付 <em class="color-red">1</em> 元，将可获得 <em class="color-red">1</em> 个金币，当前美元汇率为：<em class="color-red">6.5</em></span>                                                                                         
                                        </div><!--E .pform-list-->
                                    </div><!--E .line-box-->
									<span class="blank5"></span>
									<div class="line-box">
									
										<!-- 网银开始 -->
							<div  class="xbox ui-form" style="clear:both;display:none" align="center">
     
   	 
<ul class="ui-list-icons ui-four-icons fn-clear cashier-bank" id="J-chooseBankList" style="padding-top:10px;">
        
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-icbc105-1" value="ICBC" >
        <label class="icon-box limited-coupon  current" for="J-b2c_ebank-icbc105-1" data-channel="biz-channelType(B2C_EBANK)-ICBC-中国工商银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon ICBC" title="中国工商银行"></span>
						<span class="bank-name">中国工商银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-ccb103-2" value="CCB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-ccb103-2" data-channel="biz-channelType(B2C_EBANK)-CCB-中国建设银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CCB" title="中国建设银行"></span>
						<span class="bank-name">中国建设银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-abc101-3" value="ABC">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-abc101-3" data-channel="biz-channelType(B2C_EBANK)-ABC-中国农业银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon ABC" title="中国农业银行"></span>
						<span class="bank-name">中国农业银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-psbc102-4" value="PSBC">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-psbc102-4" data-channel="biz-channelType(B2C_EBANK)-PSBC-中国邮政储蓄银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon PSBC" title="中国邮政储蓄银行"></span>
						<span class="bank-name">中国邮政储蓄银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-comm102-5" value="BCOM">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-comm102-5" data-channel="biz-channelType(B2C_EBANK)-COMM-交通银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon COMM" title="交通银行"></span>
						<span class="bank-name">交通银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-cmb103-6" value="CMB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-cmb103-6" data-channel="biz-channelType(B2C_EBANK)-CMB-招商银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CMB" title="招商银行"></span>
						<span class="bank-name">招商银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-boc102-7" value="BOC">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-boc102-7" data-channel="biz-channelType(B2C_EBANK)-BOC-中国银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon BOC" title="中国银行"></span>
						<span class="bank-name">中国银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-ceb102-8" value="CEBB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-ceb102-8" data-channel="biz-channelType(B2C_EBANK)-CEB-中国光大银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CEB" title="中国光大银行"></span>
						<span class="bank-name">中国光大银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-citic104-9" value="ECITIC">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-citic104-9" data-channel="biz-channelType(B2C_EBANK)-CITIC-中信银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CITIC" title="中信银行"></span>
						<span class="bank-name">中信银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-sdb102-10" value="SDB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-sdb102-10" data-channel="biz-channelType(B2C_EBANK)-SDB-深圳发展银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon SDB" title="深圳发展银行"></span>
						<span class="bank-name">深圳发展银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-spdb103-11" value="SPDB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-spdb103-11" data-channel="biz-channelType(B2C_EBANK)-SPDB-浦发银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon SPDB" title="浦发银行"></span>
						<span class="bank-name">浦发银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-cmbc101-12" value="CMBC">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-cmbc101-12" data-channel="biz-channelType(B2C_EBANK)-CMBC-中国民生银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CMBC" title="中国民生银行"></span>
						<span class="bank-name">中国民生银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-cib102-13" value="CIB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-cib102-13" data-channel="biz-channelType(B2C_EBANK)-CIB-兴业银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon CIB" title="兴业银行"></span>
						<span class="bank-name">兴业银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-spabank101-14" value="SPABANK">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-spabank101-14" data-channel="biz-channelType(B2C_EBANK)-SPABANK-平安银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon SPABANK" title="平安银行"></span>
						<span class="bank-name">平安银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	<li class="cashier-bank ">
		<input type="radio" name="channelToken" id="J-b2c_ebank-gdb102-15" value="GDB">
        <label class="icon-box limited-coupon " for="J-b2c_ebank-gdb102-15" data-channel="biz-channelType(B2C_EBANK)-GDB-广发银行-type(unsave)">
                        <span class="icon-box-sparkling" bbd="false">

                                


            	
                            	            </span>


            <span class="false icon GDB" title="广发银行"></span>
						<span class="bank-name">广发银行</span>
												<!-- CMS:统一收银台/帮助/渠道健康度提示文案开始:cashier/help/healthyText.vm -->
  <!-- CMS:统一收银台/帮助/渠道健康度提示文案结束:cashier/help/healthyText.vm -->        </label>
    </li>
                                                                    
	                                                           
	
                                                              
	
</ul>
    	
        
    </div>
							<!-- 网银结束 -->
									
									</div>
									<span class="blank5"></span>	

                                 	<div class="line-box" style="margin:16px 0 0 160px;">
                                        <div class="pform-list">
                                            <label for="money">&nbsp;</label>
                                            <button type="submit" class="btn-login radius-three" tabindex="4" title="下一步">下一步</button>
                                        </div><!--E .pform-list-->
                                    </div><!--E .line-box-->
                                    </div><!--E .line-box-->
                                </div><!--E .pcont-date-mod-->                              
                              </div>
							  <input type="hidden" name="dosubmit" value="1"/>
							  <input name="info[email]" type="hidden" id="email"  value="<?php echo $memberinfo['email'];?>"  />
							  <input name="info[name]" type="hidden" id="contactname"  value="<?php echo $memberinfo['username'];?>"  />
							  <input name="info[telephone]" type="hidden" id="telephone"  value="<?php echo $memberinfo['mobile'];?>" />
                              </form>
                              <!--E <?php echo $pay['name'];?>充值-->
							  
                             <?php } else { ?>本站暂未开启在线支付功能，如需帮助请联系管理员。<?php } ?>
							




                            </div><!--E .pcont-mod-bd-->                       
                        </div><!--E .pcont-mod-->
                        <!--update 2013-3-21-->
                     </div><!--E .main-wrap-->
			       </div><!--E .col-main-->
			      <?php include template('member', 'left'); ?>
                </div><!--E .grid-s12m0-->
            </div>
            <!--E 内容-->                 
        </article>
        <!--E 内容-->
        <!--S 底部-->
        <script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"mainForm",onerror:function(msg){}});
	$("#price").formValidator({onshow:"请输入要充值的金额",onfocus:"充值金额不能为空"}).inputValidator({min:1,max:999,onerror:"充值金额不能为空"}).regexValidator({regexp:"^(([1-9]{1}\\d*)|([0]{1}))(\\.(\\d){1,2})?$",onerror:"充值金额必须为整数或小数(保留两位小数)"});

	
})

function selectpay(obj,pid,logo){
	$(".cash-list").find("li").removeClass("current");
	$(obj).addClass("current");
	
	$("#paymentid").val(pid);
	$("#paymentlogo").attr("src","<?php echo IMG_PATH;?>logo-"+logo+".gif");
	//$(".goto_pay_money").addClass("cur");
	$.post("/index.php?m=pay&c=deposit&a=pay&t="+Math.random(),function(){});
	//$("#cash-cont-"+obj.id.replace('pay_','')).removeClass("cur");
}
$.post("/index.php?m=pay&c=deposit&a=pay&t="+Math.random(),function(){});

//-->
</script>

  <?php include template('member', 'footer'); ?>