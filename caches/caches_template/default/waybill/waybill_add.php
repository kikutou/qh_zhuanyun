<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <?php include template('member', 'header'); ?>
 <style>
 .tdrow{line-height:23px;}
 </style>

        <!--E 导航-->   
  <?php $allship = $this->getallship();?>  
  <?php $allsendlist = $this->getsendlists();?>
  <?php $allturnway=$this->getturnway();?>
  <?php $_all___warehouse__lists = $this->get_warehouse__lists();?>
						
        <!--S 内容-->
			<div id="ht-main" class="clearfixed">	
        <article class="content">
        	
         	<!--S 内容-->
        	<div class="layout pro-mod" style="border-top:none;"> 
			 <?php include template('member', 'top'); ?>
            	<div class="layout grid-s12m0">
			       <div class="col-main">
			       	 <div class="main-wrap">
						<div class="pcont-mod">
                        	<div class="pcont-mod-hd">
                            	<h3>包裹预报<span style="color:red;font-size:16px;font-weight:bold;padding-left:20px;">(填写您有什么包裹将到达仓库，以便快速入库)</span></h3>
                                <div class="plink-mod">
                                </div><!--E .plink-mod-->
                            </div><!--E .pcont-mod-hd-->

				  <form action="/index.php?m=waybill&c=index&a=add" id="mainForm" name="mainForm" method="post"  enctype="multipart/form-data" onsubmit="return submitcheck();">

					<div class="pcont-mod-bd pro-info" >
                               <div class="balance-info">第一步：选择入库仓库、发货线路</div>
                                <span class="blank"></span>
                 <input type="hidden" value="" name="waybill[sendname]"  id="sendname" />
				<input type="hidden" value="" name="waybill[takename]"  id="takename" />
				<input type="hidden" value="" name="waybill[shippingname]"  id="shippingname" />
				<input type="hidden" value="" name="waybill[storagename]"  id="storagename" />
				<input type="hidden" value="<?php echo $an_info['firstprice'];?>" name="waybill[firstprice]"  id="firstprice" />
				<input type="hidden" value="<?php echo $an_info['addprice'];?>" name="waybill[addprice]"  id="addprice" />
				<input type="hidden" value="<?php echo $an_info['addweight'];?>" name="waybill[addweight]"  id="addweight" />
				<input type="hidden" value="<?php echo $an_info['firstweight'];?>" name="waybill[firstweight]"  id="firstweight" />
				<input type="hidden" value="<?php echo $an_info['otherdiscount'];?>" name="waybill[otherdiscount]"  id="otherdiscount" />
				
		<div class="pro-info-v02">
                  <ul class="pform-list tip-pform-list">
                <li>
				 <label for="storageid">入库仓库<em class="color-red">*</em></label>
                    <select  name="storageidd" id="storageid"  class="inp inp-select" onchange="document.getElementById('storagename').value=document.getElementById('storageid').options[document.getElementById('storageid').selectedIndex].text;"  >
					
					<?php $n=1;if(is_array($_all___warehouse__lists)) foreach($_all___warehouse__lists AS $vrow) { ?>
					<?php if($vrow[aid]==15) { ?>
					<option value="<?php echo $vrow['aid'];?>"><?php echo $vrow['title'];?></option>
					<?php } ?>
					<?php $n++;}unset($n); ?>
					</select>
				<span style="display:none;">
                    <label for="sendid">发货地 (国家和地区)<em class="color-red">*</em></label>
                    <select  name="waybill[sendid]" id="sendid"  class="inp inp-select" onchange="javascript:forminit();ajaxOpt(document.getElementById('sendid').options[document.getElementById('sendid').selectedIndex].value,1);"  >
					<option value="0"> 请选择 </option>
					<?php $n=1;if(is_array($allsendlist)) foreach($allsendlist AS $r) { ?>
					<option value="<?php echo $r['linkageid'];?>"><?php echo $r['name'];?></option>
					<?php $n++;}unset($n); ?>
					</select> &nbsp;<label style="float:none;width:auto;">收货地 (国家和地区)</label><select  name="waybill[takeid]" id="takeid"   class="inp inp-select"  onchange="javascript:document.getElementById('takename').value=document.getElementById('takeid').options[document.getElementById('takeid').selectedIndex].text;ajaxOpt(document.getElementById('takeid').options[document.getElementById('takeid').selectedIndex].value,0);">  
					<option value="0"> 请选择 </option>
					<?php $n=1;if(is_array($allsendlist)) foreach($allsendlist AS $r) { ?>
					<option value="<?php echo $r['linkageid'];?>"><?php echo $r['name'];?></option>
					<?php $n++;}unset($n); ?>
					</select>
					</span>

					<label style="float:none;width:auto;padding-left:10px;">发货线路<em class="color-red">*</em></label>
				
					<select  name="waybill[shippingid]" id="shippingid"   class="inp inp-select"  onchange="changeShipping()">  
					<option value="0"> 请选择 </option>
					<?php $n=1;if(is_array($allturnway)) foreach($allturnway AS $way) { ?>					
					<option value="<?php echo $way['aid'];?>" <?php if($an_info[shippingid]==$way[aid]) { ?>selected<?php } ?> org="<?php echo $way['origin'];?>" dst="<?php echo $way['destination'];?>" price="<?php echo $way['price'];?>"  addprice="<?php echo $way['addprice'];?>" addweight="<?php echo $way['addweight'];?>" firstweight="<?php echo $way['firstweight'];?>" otherdiscount="<?php echo $way['discount'];?>"><?php echo $way['title'];?></option>
					<?php $n++;}unset($n); ?>
					</select> 
					<label style="float:none;width:auto;color:#888;font-size: 12px;padding-left:10px;">(包裹付款前可更换发货线路)</label>
                </li>  
				 </ul>
		</div>
			</div>

			<div class="pcont-mod-bd pro-info" >
                                <div class="balance-info">第二步：填写商家发货的邮单号、添加物品信息
                                <span style="color:#888;font-size: 12px;padding-left:10px;font-weight: normal;">(准确预报包裹信息,能加快仓库对您包裹的处理速度)</span>
			</div>
		<!--E .balance-info-->
			<div class="pro-info-v02">
                  <ul class="pform-list tip-pform-list">
                  <li>
	 <div style="clear:both;margin-bottom:10px;margin-right:10px;">
			<table width="98%" border="0" cellpadding="0" cellspacing="1" align="center">
             <tr>
            <td height="50" align="left" colspan="5">发货商家:<em class="color-red">*</em>
			<input id="expressname" name="waybill[expressname]" type="hidden">
			<select name="waybill[expressid]"  id="expressid" class="inp inp-select" onchange="document.getElementById('expressname').value=document.getElementById('expressid').options[document.getElementById('expressid').selectedIndex].text;">
							<option value="0">请选择</option>
							<?php $n=1;if(is_array($allship)) foreach($allship AS $v) { ?>
							<option value="<?php echo $v['aid'];?>"><?php echo $v['title'];?></option>	
							<?php $n++;}unset($n); ?>
							</select>
							<span style="padding-left: 10px;">快递单号:<em class="color-red">*</em></span>
							<input id="expressno" name="waybill[expressno]"  class="inp w168" type="text" onKeyUp="this.value=this.value.replace(/[^0-9a-z]/gi,'')" onblur="blurcheck(this)" placeholder=""> 
							<span style="color:#888;font-size: 12px;padding-left:10px;color:blue;">此处为商家发货后的快递单号(通常为12位数字) <font style="color:red;font-weight:bold;"></font></span>
							<span style="padding-left: 10px;display:none;">数量合计:</span>
			<input style="display:none;" name="waybill[totalamount]" type="text" id="totalamount" class="inp"  size="5" onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"/ readonly style=" border: none;padding: 0; text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 2px;"> 
			<input style="display:none" name="waybill[totalweight]" type="text" id="totalweight" class="inp"  size="5" onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"/>
			<span style="padding-left: 10px;display:none;">价值合计(日元):</span>
			<input style="display:none;" name="waybill[totalprice]" type="text" id="totalprice" class="inp"  size="8" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" value="0"/ readonly style=" border: none;padding: 0; text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 2px;">
			</td>
            </tr>

			</table>
		</div>

					<span class="blank"></span>
                    <table width="100%" id="tb__product" class="goods_form" style=" border: 1px solid #ddd;">
					<tr>
				<th style="display:none">序号</td>
					<th height="35px" style="width: 45%; padding-left: 95px; text-align:left">物品名称</th>
					<th style="width: 24%; text-align:left; ">物品数量</th>
					<!---<th style="display:none">重量(G)</td>--->
					<th style="width: 20%; text-align:left; ">物品单价(日元)</th>
					<th>操作</th>
					</tr>					
					
					<tr id="trProduct" class="goods__row">
					<td align=center class="w58" class="index_number"  style="display:none">1</td>
					<td colspan="3" style="padding-bottom: 8px;">
					<input id="number" name="waybill_goods[1][number]" type="hidden" value="1">
						<table border=0 width="100%" style="margin-top: 10px;">
						<tr>
						<td style="padding-left: 15px;width: 45%;border: none;">
						<input id="goodsname" name="waybill_goods[1][goodsname]"  class="inp w248" type="text"  onblur="blurcheck(this)" placeholder=""> </td>
						<td width="25%" style="border: none;">
						<input id="amount" name="waybill_goods[1][amount]"  class="inp w58" type="text" onblur="blurcheck(this)"  onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value=""></td>
						<!---<td style="display:none" align=left width="10%">
						<input id="weight" name="waybill_goods[1][weight]" class="inp w58" type="text" onblur="blurcheck(this)"  onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"></td>--->
						<td width="20%" style="border: none;">
						<input id="price" name="waybill_goods[1][price]"  class="inp w58" type="text" onblur="blurcheck(this)" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" value="">
						</td>
						</tr>
						<tr>
						<td colspan="5" class="tdrow" style=" border: none;">
						<?php $s=0;?>
						<?php $n=1;if(is_array($allgoodsservice)) foreach($allgoodsservice AS $val) { ?>
						<?php
						$currencyname = $this->getcurrencyname($val['currencyid']);
						$unitname = $this->getunitname($val['unit']);
						?>
							  <input name="waybill_goods[1][addvalues][<?php echo $s;?>]" type="checkbox"  value="<?php echo $val['aid'];?>|<?php echo $val['title'];?>|<?php echo $val['type'];?>|<?php echo $val['unit'];?>|<?php echo $unitname;?>|<?php echo $val['currencyid'];?>|<?php echo $val['price'];?>|<?php echo $currencyname;?>"/> 
							 <span title="<?php echo $val['remark'];?>" alt="<?php echo $val['remark'];?>"><?php echo $val['title'];?></span><font color="#FF953F"><?php echo $currencyname;?><?php echo $val['price'];?></font>/<?php echo $unitname;?>
							 <?php $s++;?>
						<?php $n++;}unset($n); ?>
						</td>
						</tr>
						</table>
					</td>
					<td width="40" align="center"><a href="javascript:void(0);" onclick="delRow(this);" style="font-size:14px;  color:blue;">删除</a></td>
					</tr>
					</table>
					
					<div style="clear:both;margin-top:10px;">
					<button style="float:left;margin-left:15px;" type="button"  class="btn-login radius-three fl add_row" onclick="javascript:addRow()">继续添加</button>
					 <input name='txtTRLastIndex' type='hidden' id='txtTRLastIndex' value="1" />
					 <span style="padding-left:20px;color: red;font-size: 14px;font-weight: bold;line-height: 32px;">提示:预报物品名挑选1-4种即可。物品名、数量、价值会作为申报参考。</span>
					</div>
					<span class="blank"></span>
					
                                                         
                </li>
					 </ul>
				 </div>
			</div>
			<span class="blank"></span>
			<div class="pcont-mod-bd pro-info" >
                                <div class="balance-info">第三步：选择转运方式、增值服务
								<span style="color:#888;font-size: 12px;padding-left:10px;font-weight: normal;">(分/合箱转运的增值服务，在您包裹全部入库后合箱时选择)</span>
								</div>
                                <span class="blank"></span>
                 <div class="pro-info-v02">
						<div class="service-mothed" style="padding: 20px 0;">
								<div class="label-name" style="color:red; font-size:14px; font-weight:bold;">转运方式：</div>
								<div class="label-content" style="line-height:25px;">
								<table border=0>
								<tr>
								<td style="padding-left:30px;">
								<input type="radio" name="waybill[srvtype]" value="0" checked onclick="serviceOpt(0)"/>
								<span>单票转运</span>
								<input type="radio" name="waybill[srvtype]" value="1" onclick="serviceOpt(1)"/>
								<span>合箱转运</span>
								<input type="radio" name="waybill[srvtype]" value="2" onclick="serviceOpt(2)"/>
								<span>分箱转运</span>
								</td>
								</tr>
								</table>
								</div>
						</div>
							
				<span id="span_addValues">
								
								 <table width="100%" id="tableAddService" cellspacing="0" class="manage_form">
                                        <tbody>
                                            <tr>
                                                <th height="32" width="5">&nbsp;</th>
                                                <th width="120">增值服务类型</th>
                                                <th width="150" style="text-align: left;">增值服务费用</th>
                                                <th style="text-align: left;">增值服务描述</th>
                                            </tr>
								</table>
                     <ul class="pform-list tip-pform-list" style="padding-top:0;border: 1px solid #ddd;">
			
					
					<?php $n=1;if(is_array($servicelist)) foreach($servicelist AS $srv) { ?>
						
						<?php $currencyname = $this->getcurrencyname($srv['currencyid']);?>
						<?php $unitname = $this->getunitname($srv['unit']);?>

						<?php if($srv[title]=='保险') { ?>
						<?php $secuty=1;?>
						
						<?php $temp_aid=$srv[aid];?>
						<?php $temp_title=$srv[title];?>
						<?php $temp_price=$srv['price'];?>
						<?php $temp_currencyid=$srv['currencyid'];?>
						<?php $temp_unit=$srv['unit'];?>
						<?php $temp_type=$srv[type];?>
						<?php $temp_remark=$srv['remark'];?>
						<?php $temp_currencyname=$currencyname;?>
						<?php $temp_unitname=$unitname;?>
						

						<?php } else { ?>
						<li style=" margin-bottom: 0;padding: 0 10px;">
						<input name="service_value[<?php echo $srv['aid'];?>][title]" type="hidden"  value="<?php echo $srv['title'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][currencyname]" type="hidden"  value="<?php echo $currencyname;?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][unitname]" type="hidden"  value="<?php echo $unitname;?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][price]" type="hidden"  value="<?php echo $srv['price'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][currencyid]" type="hidden"  value="<?php echo $srv['currencyid'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][unitid]" type="hidden"  value="<?php echo $srv['unit'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][servicetype]" type="hidden"  value="<?php echo $srv['type'];?>"/>
						
				<table width="100%" id="tableAddService" cellspacing="0" class="manage_form">
                    <tbody>
                      <tr>
						<td width="110" height="28" vertical-align="top";>
						<input  name="service_value[<?php echo $srv['aid'];?>][servicetypeid]"  value="<?php echo $srv['aid'];?>" type="checkbox" style=" margin-right: 10px;" >
						<label for="service<?php echo $srv['aid'];?>" style="float:none;width:auto;"><?php echo $srv['title'];?><em class="color-red"></em></label>
						</td>
						<td width="150">
						<font color="#FF953F"><?php echo $this->getcurrencyname($srv['currencyid']); ?><?php echo $srv['price'];?></font>/<?php echo $this->getunitname($srv['unit']);?>
						</td>
						<td width="610"><?php echo $srv['remark'];?></td>
					</tr>
					</tbody>
				</table>
						<?php } ?>
						
					<?php $n++;}unset($n); ?>	  
					
                         <?php if($secuty) { ?>
						  <p style="margin-top:10px;" id="values_baox">
						   
							<input name="service_value[<?php echo $temp_aid;?>][title]" type="hidden"  value="<?php echo $temp_title;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][currencyname]" type="hidden"  value="<?php echo $temp_currencyname;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][unitname]" type="hidden"  value="<?php echo $temp_unitname;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][currencyid]" type="hidden"  value="<?php echo $temp_currencyid;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][unitid]" type="hidden"  value="<?php echo $temp_unit;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][servicetype]" type="hidden"  value="<?php echo $temp_type;?>"/>
							
							<input style="margin-right:10px;" id="_secutychk"  name="service_value[<?php echo $temp_aid;?>][servicetypeid]"  value="<?php echo $temp_aid;?>" type="checkbox" onclick="if(this.checked){$('#secuty_text').show();}else{$('#service_value_sprice').val(0);$('#secuty_text').hide();}"> 
							<label for="service<?php echo $temp_aid;?>" style="float:none;width:auto; color:red" ><?php echo $temp_title;?><em class="color-red"></em>
							</label>
							<font id="secuty_text" style="display:none"><?php echo $this->getcurrencyname($temp_currencyid);?>
							<input name="service_value[<?php echo $temp_aid;?>][price]" type="text" id="service_value_sprice" value="0" size=5 class="inp" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'');securtychk();"/>
							<span id="money_show" style="color:#ff6600"></span>		
							<?php echo $temp_remark;?>
							</font>
						  </p>
						  <?php } ?>
					</li>

				
				</ul>
				</span>
				 </div>
			</div>
			<input id="txtSecuty" name="waybill[otherfee]" type="hidden"  value="0"/>
			<script>
			function securtychk(){
				var mval=$("#service_value_sprice").val();
				if(mval==""){mval=0;}
				mval=parseFloat(mval);

				var result=0;
				var shippingid = document.getElementById('shippingid').options[document.getElementById('shippingid').selectedIndex].value;
				
				if(shippingid=='0'){
					alert("请选择发货线路！");
					return false;
				}else{
					
				
					
					$.ajax({ 
					  type: 'POST', 
					  url: "/api.php?op=public_api&a=get_securefee&shippingid="+shippingid+"&securevalue="+mval+"&t="+Math.random(),  
					  dataType: 'text', 
					  async:false,
					  success: function(data){
						result = data;
					  }
					}); 
					
					if(mval<=0){
						$("#_secutychk").attr("checked",false);
					}

					var val = parseFloat(result);	

					$("#txtSecuty").val(val.toFixed(2));
					$("#_secutychk").attr('rel',val.toFixed(2));
					$("#money_show").html(val.toFixed(2)+"円");
				}

			}
			</script>

			<div class="pcont-mod-bd pro-info" style="display:none;">
                <div class="balance-info">第四步：选择/填写收货人信息
				<span style="color:#888;font-size: 12px;padding-left:10px;font-weight: normal;">(收货人信息在包裹付款前可更换)</span>
				</div>
                <span class="blank"></span>                 
				<div class="pro-info-v02">           
				<ul class="pform-list tip-pform-list">
				<?php $k=0;?>
				<?php $n=1;if(is_array($addresslist)) foreach($addresslist AS $addr) { ?>
				<?php if($addr[addresstype]==0 || $addr[addresstype]==2) { ?>
				<?php $k++;?>
				<li style="padding-left: 10px;margin:0;"><div style="float:left;">
					<input onclick="newaddress(<?php echo $addr['aid'];?>,0)" name="waybill[sendaddressid]"  value="<?php echo $addr['aid'];?>" type="radio" <?php if($k==1) { ?>checked<?php } ?> style="margin-top:10px;"> </div><div style="margin-left:25px;"><label for="address<?php echo $addr['aid'];?>" style="width:700px;float: none;text-align:left;"><?php echo $addr['truename'];?> <?php echo $addr['mobile'];?> <?php echo $addr['country'];?> <?php echo $addr['province'];?> <?php echo $addr['city'];?> <?php echo $addr['address'];?> <?php echo $addr['postcode'];?><em class="color-red"></em></label>  </div>
																		 
					</li>
				<?php } ?>
				<?php $n++;}unset($n); ?>
				<li style="padding-left: 10px;margin:0;">
					<input   name="waybill[sendaddressid]"  value="0" type="radio" onclick="newaddress(0,0)" <?php if(!$addresslist) { ?>checked<?php } ?>> 
					<label for="sendaddress" style="float:none;width:auto;padding: 0 10px;">填写新发货地址<em class="color-red"></em></label>  
																		 
				</li>
				</ul>
				 </div>

					<!-- 新发货地址 -->
					<input type="hidden" value="2" name="send_address[addresstype]"  id="addresstype"  />
					<div class="pro-info-v02" id="new_waybill_sendaddress" <?php if($addresslist) { ?>style="display:none"<?php } ?>>
                                  
                 <ul class="pform-list tip-pform-list">
               
                 <li>
                    <label for="send_truename">寄件人<em class="color-red">*</em></label>
                    <input id="send_truename" name="send_address[truename]" value="<?php echo $this->_username;?>" maxlength="20" class="inp w268" type="text" tabindex="1">     
                                                              
                </li> 
				 <li>
                    <label for="send_country">国家<em class="color-red">*</em></label>
                    <input id="send_country" name="send_address[country]" value="<?php echo $areaname;?>" maxlength="20" class="inp w268" type="text" tabindex="1">     
                                                              
                </li> 
                 <li class="li_receiver">
                    <label for="send_province">所在地区<em class="color-red">*</em></label>
                    <input id="send_province" name="send_address[province]" value="<?php echo $storage_row['province'];?>"  maxlength="20" class="inp w88" type="text" tabindex="1"> &nbsp;<label style="float:none;width:36px;">省/州</label>&nbsp; 
 					<input id="send_city" name="send_address[city]" value="<?php echo $storage_row['city'];?>"  maxlength="20" class="inp w88" type="text" tabindex="1">&nbsp;<label style="float:none;width:20px;">市</label>
                   
                                                                   
                </li>
				

                <li>
                    <label for="send_address">详细地址<em class="color-red">*</em></label>
                    <input id="send_address" name="send_address[address]"  value="<?php echo $m_address;?>"  maxlength="250" class="inp w268" type="text" tabindex="4">                                          
                </li>
			
                <li>
                    <label for="send_postcode">邮政编码<em class="color-red"></em></label>
                    <input id="send_postcode" name="send_address[postcode]"  style="ime-mode:disabled;"  value="<?php echo $storage_row['zipcode'];?>" maxlength="10" class="inp w268" type="text" tabindex="5">     
                                                                  
                </li>
                <li>
                    <label for="send_mobile">电话<em class="color-red">*</em></label>
                    <input id="send_mobile" name="send_address[mobile]"  value="<?php echo $storage_row['phone'];?>"  style="ime-mode:disabled;" maxlength="30"  class="inp w268" type="text" tabindex="6">     
                                                                  
                </li>

                  <li>
                    <label for="send_email">邮箱地址</label>
                    <input id="send_email" name="send_address[email]"  style="ime-mode:disabled;" value="<?php echo $email;?>" maxlength="30" class="inp w268" type="text" tabindex="10">     
                                                         
                </li>
				
            
                
                </ul>
                                </div><!--E .pro-info-v01-->

</div>
<div class="pcont-mod-bd pro-info" >
               <div class="balance-info">第四步：选择/填写收货人信息
				<span style="color:#888;font-size: 12px;padding-left:10px;font-weight: normal;">(收货人信息在包裹付款前可更改)</span>
				</div>
                <span class="blank"></span>                

		<div class="pro-info-v02" style=" background: #eee;line-height: 32px; padding-left: 10px;">
		选择收货人地址
		</div>
		<div class="pro-info-v02" style="overflow: auto;  overflow-x: hidden;  max-height: 180px;">           
			<ul class="pform-list tip-pform-list">
               <?php $k=0;?>
				<?php $n=1;if(is_array($addresslist)) foreach($addresslist AS $addr) { ?>
				<?php if($addr[addresstype]==0 || $addr[addresstype]==1) { ?>
				<?php $k++;?>
				<li style="padding-left: 10px;">
					<div style="float:left;">
						<input onclick="newaddress(<?php echo $addr['aid'];?>,1)" name="waybill[takeaddressid]"  value="<?php echo $addr['aid'];?>" type="radio" <?php if($addr[isdefault]==1 ) { ?>checked<?php } else { ?> <?php if($k==1) { ?>checked<?php } ?><?php } ?> style="margin-top:1px;"> 
					</div>
					<div style="margin-left:25px; margin-top:-10px;">
						<label for="address<?php echo $addr['aid'];?>" style="width: 790px; float: none;text-align:left;  "><?php echo $addr['truename'];?> <?php echo $addr['mobile'];?> <?php echo $addr['country'];?> <?php echo $addr['province'];?> <?php echo $addr['city'];?> <?php echo $addr['address'];?> <?php echo $addr['postcode'];?>
						</label> 
					</div> 
				</li>
				<?php } ?>
				<?php $n++;}unset($n); ?>
			</ul>

		</div>				
<!-- 新收货地址 -->
	<div class="pro-info-v02" style="background: #eee;line-height: 32px; padding-left: 10px;" >             
			<input name="waybill[takeaddressid]"  value="0" type="radio" onclick="newaddress(0,1)">
			<span for="takeaddress">新增收货人地址</span>
	</div>			
		
	<input type="hidden" value="1" name="take_address[addresstype]"  id="addresstype" />
	<div class="pro-info-v02" id="new_waybill_takeaddress" style="display:none">
                 <ul class="pform-list tip-pform-list">
                 <li>
                    <label for="take_truename">收件人<em class="color-red">*</em></label>
                    <input id="take_truename" name="take_address[truename]" value=""  maxlength="20" class="inp w268" type="text" tabindex="1" placeholder="">     
                                                              
                </li> 
				<li>
                    <label for="take_country">国家<em class="color-red">*</em></label>
					<select  id="take_country" name="take_address[country]" style="height: 26px;border-radius: 2px;width: 278px;">
					<?php
					$countrydatas = $this->getline();
					foreach($countrydatas as $v){
						echo '<option value="'.trim($v['name']).'">'.$v['name'].'</option>';
					}
					?>	
					</select>
					<!--
                    <input id="take_country" name="take_address[country]" value="" maxlength="20" class="inp w268" type="text" tabindex="1"> -->
                </li> 
                <li>
                    <label for="take_province">省/州<em class="color-red">*</em></label>
                    <input id="take_province" name="take_address[province]" value=""  maxlength="20" class="inp w268" type="text" tabindex="1" placeholder=""> 
                </li>
				<li>
					<label for="take_city">市<em class="color-red">*</em></label>
					<input id="take_city" name="take_address[city]" value=""  maxlength="20" class="inp w268" type="text" tabindex="1" placeholder="">
				</li>
                <li>
                    <label for="take_address">详细地址<em class="color-red">*</em></label>
                    <input id="take_address" name="take_address[address]"  value=""  maxlength="250" class="inp w468" type="text" tabindex="4" placeholder="">     
                </li>
				 <li style="display:none">
                    <label for="take_company">公司名称<em class="color-red"></em></label>
                    <input id="take_company" name="take_address[company]"  value="" maxlength="100" class="inp w268" type="text" tabindex="4">     
                </li>
                <li>
                    <label for="take_postcode">邮政编码<em class="color-red">*</em></label>
                    <input id="take_postcode" name="take_address[postcode]"  style="ime-mode:disabled;"  value="" maxlength="10" class="inp w268" type="text" tabindex="5" placeholder="">     
                </li>
                <li>
                    <label for="take_mobile">联系电话<em class="color-red">*</em></label>
                    <input id="take_mobile" name="take_address[mobile]"  value="" style="ime-mode:disabled;" maxlength="30"  class="inp w268" type="text" tabindex="6" placeholder="">     
                </li>

                <li style="display:none">
                    <label for="take_email">邮箱地址<em class="color-red"></em></label>
                    <input id="take_email" name="take_address[email]"  style="ime-mode:disabled;" value="" maxlength="30" class="inp w268" type="text" tabindex="10">     
                </li>
                </ul>
    </div>
</div>



			<div class="pcont-mod-bd pro-info" style="padding: 0;">
					<div class="pro-info-v02">
                     <ul class="pform-list tip-pform-list">
			

                

				<li style="display:none;">
                    <label for="remark" style="width:auto;margin-left:20px;">备注信息：</label>
                    <textarea id="remark" name="waybill[remark]"  class="inp w468" style="height:60px;"></textarea> 
					<br>
					<span style="padding-left: 90px; color: red;">如对包裹详情、包裹处理、申报名称/价值有特殊说明或者要求请备注</span>
                                                                  
                </li>
 
                 <li>
					<center>
					 <input type="hidden" name="dosubmit" id="dosubmit" value="1"/>
					 <input type="hidden" name="lastindex" id="lastindex" value="1"/>
                    
					<button style="float:none;" type="submit" class="btn-login radius-three fl" tabindex="17" title="提交预报">提交预报</button>
					</center>
				</li>
                </ul>
                                </div>
                              
 <span class="blank22"></span>
                          </div>
					 </form>
		




                        </div>
                     </div>
			       </div>
			     
				  
				 <?php include template('member', 'left'); ?>



                </div>
            </div>
              
        </article>
				<script>
								function serviceOpt(flag){
									if(flag==0){
										$("#values_baox").show();
										$("#span_addValues").show();
									}else{
										
									
										$("#values_baox").hide();
										$("#span_addValues").hide();
										//$('#service_value_sprice').val(0);
										//securtychk();
										
									}
								}

								serviceOpt(0);
			</script>
	
		
  <script  type="text/javascript">

  function changeShipping(){
		document.getElementById('shippingname').value=document.getElementById('shippingid').options[document.getElementById('shippingid').selectedIndex].text;
		var sendid = $("#shippingid").find("option:selected").attr('org'); 
		var takeid = $("#shippingid").find("option:selected").attr('dst'); 
		$("#sendid").val(sendid);
		$("#takeid").val(takeid);

		$("#sendname").val($("#sendid").find("option:selected").text());
		$("#takename").val($("#takeid").find("option:selected").text());

		$("#firstprice").val($("#shippingid").find("option:selected").attr('price'));
		$("#addprice").val($("#shippingid").find("option:selected").attr('addprice'));
		$("#addweight").val($("#shippingid").find("option:selected").attr('addweight'));
		$("#firstweight").val($("#shippingid").find("option:selected").attr('firstweight'));

		$("#otherdiscount").val($("#shippingid").find("option:selected").attr('otherdiscount'));

		

		var mval=$("#service_value_sprice").val();
		if(mval==""){mval=0;}
		if(mval>0){securtychk();}

  }


  function forminit(){
	document.getElementById('sendname').value=document.getElementById('sendid').options[document.getElementById('sendid').selectedIndex].text;
  }
	
  forminit();


  function submitcheck(){
  


	/*if($("#sendid").val()=='0'){
		alert("请选择发货地 (国家和地区)！");
		return false;
	}

	if($("#takeid").val()=='0'){
		alert("请选择收货地 (国家和地区)！");
		return false;
	}*/

	if($("#storageid").val()=='0'){
		alert("请选择入库仓库！");
		return false;
	}

	if($("#shippingid").val()=='0'){
		alert("请选择发货线路！");
		return false;
	}

	if($("#expressid").val()=='0'){
		alert("请选择发货商家！(不知道可选择其他)");
		return false;
	}

	if($("#expressno").val()==''){
		alert("请填写快递单号!(如不知道，可填写为商家的订单号,到货后无法直接入库，需拆箱查箱内订单号入库！)");
		return false;
	}

		var mval=$("#service_value_sprice").val();
		if(mval==""){mval=0;}
		var shippingid=$("#shippingid").val();
		if(shippingid==4 && mval<20000 && $("#_secutychk").attr("checked")==true){//EMS
						alert("EMS自带2万日元保额，无须购买保险");
						mval=0;
						return false;
					}

					if(shippingid==4 && mval>2000000 && $("#_secutychk").attr("checked")==true){//EMS
						alert("EMS最大保险金额为200万日元");
						mval=0;
						return false;
					}
					
					if(shippingid==2 && mval>120000 && $("#_secutychk").attr("checked")==true){//SAL
						alert("SAL最大保险金额为12万日元");
						mval=0;
						return false;
					}
					if(shippingid==3 && mval>120000 && $("#_secutychk").attr("checked")==true){//航空
						alert("航空最大保险金额为12万日元");
						mval=0;
						return false;
					}
					if(shippingid==8 && mval>120000 && $("#_secutychk").attr("checked")==true){//海运
						alert("海运最大保险金额为12万日元");
						mval=0;
						return false;
					}

	var gotoflag=0;
	var current_expressno="";
	$(".goods__row").each(function(){
		
		if($(this).find("select[id^='expressid']").val()=="0")
		{
			gotoflag=1;
			$(this).find("select[id^='expressid']").attr("style","border:solid 1px #f8cccc");
		}

		$(this).find("input[id^='expressname']").val($(this).find("select[id^='expressid']").find("option:selected").text());

		if($(this).find("input[id^='expressno']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='expressno']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='goodsname']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='goodsname']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='amount']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='amount']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='weight']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='weight']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='price']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='price']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='boxcount']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='boxcount']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='producturl']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='producturl']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='sellername']").val()=="")
		{
			gotoflag=1;
			$(this).find("input[id^='sellername']").attr("style","background:#ffe7e7");
		}

		if($(this).find("input[id^='expressno']").val()!="")
		{
			if(current_expressno==""){
				current_expressno = $(this).find("input[id^='expressno']").val();
			}else{
				current_expressno = current_expressno +"_"+ $(this).find("input[id^='expressno']").val();
			}
		}
	});

	var result="";
	current_expressno = $("#expressno").val();

	$.ajax({ 
	  type: 'POST', 
	  url: "/api.php?op=public_api&a=expno_exists", 
	  data: {data : current_expressno}, 
	  dataType: 'text', 
	  async:false,
	  success: function(data){
		result = data;
	  }
	}); 
	
	if(result!=""){
		alert(result);
		return false;
	}

	if(gotoflag==1)
	{
		alert("包裹内物品信息不能为空！");
		return false;
	}

	if($("#totalamount").val()=='' || $("#totalprice").val()==''){
		alert("包裹内物品信息不能为空！");
		return false;
	}


	
	

	//判断收货地址
	
	
	if($('input:radio[name="waybill[takeaddressid]"]:checked').val()==null){
		alert("请填写收货地址！");
		return false;
	}


	if($('input:radio[name="waybill[takeaddressid]"]:checked').val()==0){
		//判断新收货地址
		if($("#take_truename").val()==''){
			alert("请填写收件人姓名！");
			return false;
		}
		if($("#take_country").val()==''){
			alert("请选择收件人国家！");
			return false;
		}
		if($("#take_province").val()==''){
			alert("请填写收件人 省/州！");
			return false;
		}
		
		if($("#take_city").val()==''){
			alert("请填写收件人 城市！");
			return false;
		}

		if($("#take_address").val()==''){
			alert("请填写收件人详细地址！");
			return false;
		}

		if($("#take_postcode").val()==''){
			alert("请填写邮政编码！");
			return false;
		}
	
		if($("#take_mobile").val()==''){
			alert("请填写收件人联系号码！");
			return false;
		}
		
		/*if($("#take_email").val()==''){
			alert("请填写收货邮箱地址！");
			return false;
		}*/
	}

	//shippingid

  }	


  function newaddress(id,flag){
	if(flag==0){
		if(id==0)
		{
			document.getElementById('new_waybill_sendaddress').style.display="block"
		}else{
			document.getElementById('new_waybill_sendaddress').style.display="none"
		}
	}else if(flag==1){
		if(id==0)
		{
			document.getElementById('new_waybill_takeaddress').style.display="block"
		}else{
			document.getElementById('new_waybill_takeaddress').style.display="none"
		}
	}
  }

  function ajaxOpt(areaid,flag){
	if(flag==1){
	if(document.getElementById('sendid').options[document.getElementById('sendid').selectedIndex].value==0){
			document.getElementById('takeid').length=1;
		}else{
		$.post("/api.php?op=public_api&a=gettakelists&areaid="+areaid,function(data){
		
			var datas = eval(data);
			var takeobj = document.getElementById('takeid');
			takeobj.length=1;
			for(var i=0;i<datas.length;i++){
				var obj = datas[i];
				takeobj.options[i+1] = new Option(obj.name,obj.linkageid);
			}

		});}
	}else{

	
	if(document.getElementById('takeid').options[document.getElementById('takeid').selectedIndex].value==0){
		
			document.getElementById('shippingid').length=1;
			
		}else{
		var sendid = document.getElementById('sendid').options[document.getElementById('sendid').selectedIndex].value;

		$.post("/api.php?op=public_api&a=getshippingmethod&sendid="+sendid+"&idd="+areaid,function(data){
		
			var datas = eval(data);
			var takeobj = document.getElementById('shippingid');
			takeobj.length=1;
			for(var i=0;i<datas.length;i++){
				var obj = datas[i];
				takeobj.options[i+1] = new Option(obj.title,obj.aid);
				
			}
			$("#shippingid").val('<?php echo $an_info['shippingid'];?>');

		});
		}
	}
}


	function addRow(){ 
		var n = $("#lastindex").val();
		
		if(n>8)
		{
			return false;
		}
		
		var num = $(".goods__row").size()+1;
		var mClone = $("#trProduct").clone(true);

		mClone[0].id="trProduct"+num;
		mClone.find("input[id^='packageid']").val(0);
		//mClone.find("input[id^='expressid']").val(0);
		//mClone.find("input[id^='expressname']").val("");

		//mClone.find("input[id^='expressno']").val("");
		mClone.find("input[id^='goodsname']").val("");
		mClone.find("input[id^='amount']").val("");
		mClone.find("input[id^='weight']").val(0);
		mClone.find("input[id^='price']").val("");

		//mClone.find("input[id^='boxcount']").val(0);
		//mClone.find("input[id^='producturl']").val("");
		//mClone.find("input[id^='sellername']").val("");
		//mClone.find("input[id^='remark']").val("");


		mClone.appendTo($("#tb__product"));
		orderRow();
	}
	
	function blurcheck(obj){
		if(obj.value!=""){
			obj.style.background="#ffffff";
		}else{
			obj.style.background="#ffe7e7";
		}

		if(obj.name.indexOf('[amount]')!=-1 || obj.name.indexOf('[weight]')!=-1 || obj.name.indexOf('[price]')!=-1){
			computtotal();//运算价格与数量
		}
	}


	function delRow(obj){
		var delid = $(obj).parent().parent().attr("id");
		if(delid!='trProduct'){
			$("#"+delid).remove();
			orderRow();
		}
computtotal();
		
	}

	function orderRow(){
		$("#lastindex").val(1);
		$(".goods__row").each(function(i){
			$(this).find("td:first").html($("#lastindex").val());
			var num = $("#lastindex").val();
			$(this).find("input[id^='number']").val(num);

			//$(this).find("select[id^='expressid']").attr("id","expressid"+num);
			//$(this).find("input[id^='expressname']").attr("id","expressname"+num);

			//$(this).find("input[id^='expressno']").attr("id","expressno"+num);
			$(this).find("input[id^='goodsname']").attr("id","goodsname"+num);
			$(this).find("input[id^='amount']").attr("id","amount"+num);
			$(this).find("input[id^='weight']").attr("id","weight"+num);

			$(this).find("input[id^='price']").attr("id","price"+num);
			$(this).find("input[id^='number']").attr("id","number"+num);

			$(this).find("input[id^='packageid']").attr("id","packageid"+num);

			//$(this).find("input[id^='boxcount']").attr("id","boxcount"+num);
			//$(this).find("input[id^='producturl']").attr("id","producturl"+num);
			//$(this).find("input[id^='sellername']").attr("id","sellername"+num);
			//$(this).find("input[id^='remark']").attr("id","remark"+num);

			$(this).find("input[id^='number']").attr("name","waybill_goods["+num+"][number]");
			//$(this).find("select[id^='expressid']").attr("name","waybill_goods["+num+"][expressid]");
			//$(this).find("input[id^='expressname']").attr("name","waybill_goods["+num+"][expressname]");

			//$(this).find("input[id^='expressno']").attr("name","waybill_goods["+num+"][expressno]");
			$(this).find("input[id^='goodsname']").attr("name","waybill_goods["+num+"][goodsname]");
			$(this).find("input[id^='amount']").attr("name","waybill_goods["+num+"][amount]");
			$(this).find("input[id^='weight']").attr("name","waybill_goods["+num+"][weight]");
			$(this).find("input[id^='price']").attr("name","waybill_goods["+num+"][price]");
			$(this).find("input[id^='packageid']").attr("name","waybill_goods["+num+"][packageid]");

			//$(this).find("input[id^='boxcount']").attr("name","waybill_goods["+num+"][boxcount]");
			//$(this).find("input[id^='producturl']").attr("name","waybill_goods["+num+"][producturl]");
			//$(this).find("input[id^='sellername']").attr("name","waybill_goods["+num+"][sellername]");
			//$(this).find("input[id^='remark']").attr("name","waybill_goods["+num+"][remark]");

			

			var obj = $(this);
			//重新排序物品增值服务
			var srv=0;
			obj.find(".tdrow").find("input").each(function(){
			
				var $this = $(this);
				var onename = $this.attr("name").replace("service_order","");
				var arrname = onename.split('_');
				//alert("service_order["+num+"_"+arrname[arrname.length-1]);
				//$this.attr("name","service_order["+num+"_"+arrname[arrname.length-1]);
				
				$this.attr("name","waybill_goods["+num+"][addvalues]["+srv+"]");
				srv++;
			});


			num = parseInt(num)+1;
			$("#lastindex").val(num);
		});
	}
	//计算
	function computtotal(){
		
		var totalamount=0,totalweight=0,totalprice=0;
		$(".goods__row").each(function(){
			
			totalamount += parseInt($(this).find("input[id^='amount']").val());
			totalweight += parseInt($(this).find("input[id^='weight']").val());
			totalprice +=parseFloat($(this).find("input[id^='price']").val())*parseInt($(this).find("input[id^='amount']").val());
		});

		$("#totalamount").val(totalamount);
		$("#totalweight").val(totalweight);
		$("#totalprice").val(totalprice);
	}
	
	computtotal();
</script>
		</div><!--id="main"结束->
 </div><!--  id="ht_index" 结束--->
  <?php include template('member', 'footer'); ?>