<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->__all__urls[0]['waybill'];?>--<?php echo $this->wap['sitename'];?></title>

<link href="/resource/wap/css/lists.css" rel="stylesheet" type="text/css" />

<script src="/resource/wap/js/jquery.min.js" type="text/javascript"></script>
<style>
label{font-size:12px;}
</style>
</head>

<body class="mode_webapp">

<?php include template("wap","header_min"); ?>



<link href="/resource/wap/css/news3_.css" rel="stylesheet" type="text/css" />

<div id="ui-header">
<div class="fixed">
<a class="ui-title" id="popmenu"><?php echo $this->__all__urls[0]['waybillinfo'];?></a>
<a class="ui-btn-left_pre" href="javascript:history.go(-1);"></a><a class="ui-btn-right_home" href="<?php echo WAP_SITEURL;?>"></a>
</div>
</div>

    
<?php if(!$__is__userinfo__full[value]) { ?>
 <form action="/index.php?m=wap&c=waybill&a=add" id="mainForm" name="mainForm" method="post"  enctype="multipart/form-data" onsubmit="return submitcheck();">

 <input type="hidden" name="forward" id="forward" value="<?php echo urlencode($_GET['forward']);?>" />
 
<input type="hidden" value="" name="waybill[sendname]"  id="sendname" />
<input type="hidden" value="" name="waybill[takename]"  id="takename" />
<input type="hidden" value="" name="waybill[shippingname]"  id="shippingname" />
<input type="hidden" value="" name="waybill[storagename]"  id="storagename" />
<input type="hidden" value="0" name="waybill[firstprice]"  id="firstprice" />
<input type="hidden" value="0" name="waybill[addprice]"  id="addprice" />
<input type="hidden" value="0" name="waybill[addweight]"  id="addweight" />
<input type="hidden" value="0" name="waybill[firstweight]"  id="firstweight" />
<input type="hidden" value="0" name="waybill[otherdiscount]"  id="otherdiscount" />


<div class="contact-info" style=" margin-top:10px;">
<ul>

<li>
<table style="padding: 0; margin: 0; width: 100%;">
<tbody>

<tr>

<td colspan=2>
<?php $all___warehouse__lists = $this->get_warehouse__lists();?>


<section class="container">
  <div class="dropdown" style="margin:0;">
    <select  id="storageid" name="waybill[storageid]"  class="dropdown-select" onchange="javascript:document.getElementById('storagename').value=document.getElementById('storageid').options[document.getElementById('storageid').selectedIndex].text;">
      <option value="0"> 请选择 入库仓库 </option>
      <?php $n=1;if(is_array($all___warehouse__lists)) foreach($all___warehouse__lists AS $row) { ?>
		<option value="<?php echo $row['aid'];?>" <?php if($an_info['storageid']==$row[aid]) { ?>selected<?php } ?>><?php echo $row['title'];?></option>
		<?php $n++;}unset($n); ?>
    </select>
  </div>
</section>


</td>
</tr>

<tr  style="display:none;">
<td width="80px"><label for="email" class="ui-input-text">发货地区：</label></td>
<td ><?php $allsendlist = $this->getsendlists();?>

<section class="container">
  <div class="dropdown" style="margin:0;">
    <select  name="waybill[sendid]" id="sendid"   class="dropdown-select" onchange="javascript:forminit();ajaxOpt(document.getElementById('sendid').options[document.getElementById('sendid').selectedIndex].value,1);" >
      <option value="0">请选择</option>
     <?php $n=1;if(is_array($allsendlist)) foreach($allsendlist AS $r) { ?>
					<option value="<?php echo $r['linkageid'];?>"><?php echo $r['name'];?></option>
					<?php $n++;}unset($n); ?>
    </select>
  </div>
</section>
     
   
</td>
</tr>
<tr  style="display:none;">
<td width="80px"><label for="email" class="ui-input-text">收货地区：</label></td>
<td >

<section class="container">
  <div class="dropdown" style="margin:0;">
    <select  name="waybill[takeid]" id="takeid"  class="dropdown-select" onchange="javascript:document.getElementById('takename').value=document.getElementById('takeid').options[document.getElementById('takeid').selectedIndex].text;ajaxOpt(document.getElementById('takeid').options[document.getElementById('takeid').selectedIndex].value,0);">
      <option value="0">请选择</option>
    </select>
  </div>
</section>
     
   
</td>
</tr>
<tr>

<td colspan=2>

<section class="container">
  <div class="dropdown" style="margin:0;">
    <select  name="waybill[shippingid]" id="shippingid"   class="dropdown-select" onchange="document.getElementById('shippingname').value=document.getElementById('shippingid').options[document.getElementById('shippingid').selectedIndex].text;">
      <option value="0"> 请选择 发货线路 </option>
	  <?php $n=1;if(is_array($allturnway)) foreach($allturnway AS $way) { ?>					
					<option value="<?php echo $way['aid'];?>" <?php if($an_info[shippingid]==$way[aid]) { ?>selected<?php } ?> org="<?php echo $way['origin'];?>" dst="<?php echo $way['destination'];?>" price="<?php echo $way['price'];?>"  addprice="<?php echo $way['addprice'];?>" addweight="<?php echo $way['addweight'];?>" firstweight="<?php echo $way['firstweight'];?>" otherdiscount="<?php echo $way['discount'];?>"><?php echo $way['title'];?></option>
					<?php $n++;}unset($n); ?>
    </select>
  </div>
</section>
     
   
</td>
</tr>
<tr>
<th colspan=2 style="background:#e9e9e9;height:28px;font-size:14px;">收货地址</th>
</tr>
<tr>

<td style="border-top:solid 1px #cdcdcd" colspan=2>
 <?php $k=0;?>
				<?php $n=1;if(is_array($addresslist)) foreach($addresslist AS $addr) { ?>
				<?php if($addr[addresstype]==0 || $addr[addresstype]==1) { ?>
				<?php $k++;?>
				<p>
					<input onclick="newaddress(<?php echo $addr['aid'];?>,1)" name="waybill[takeaddressid]"  value="<?php echo $addr['aid'];?>" type="radio" <?php if($addr[isdefault]==1 ) { ?>checked<?php } else { ?> <?php if($k==1) { ?>checked<?php } ?><?php } ?> style="margin-top:10px;">  <label for="address<?php echo $addr['aid'];?>" style="width: 700px; float: none;text-align:left;"><?php echo $addr['truename'];?> <?php echo $addr['mobile'];?> <?php echo $addr['country'];?> <?php echo $addr['province'];?> <?php echo $addr['city'];?> <?php echo $addr['address'];?> <?php echo $addr['postcode'];?><em class="color-red"></em></label> 																		 
					</p>
				<?php } ?>
				<?php $n++;}unset($n); ?>
</td>
</tr>




<tr>
<th colspan=2 style="background:#e9e9e9;height:28px;font-size:14px;">快件物品详情</th>
</tr>
<tr>
<th colspan=2 >

	<input id="expressname" name="waybill[expressname]" type="hidden">
	<div class="ui-input-text">
		&nbsp;&nbsp;<select name="waybill[expressid]"  id="expressid" class="dropdown-select" onchange="document.getElementById('expressname').value=document.getElementById('expressid').options[document.getElementById('expressid').selectedIndex].text;">
					<option value="0"> 请选择 发货商家 </option>
					<?php $n=1;if(is_array($allship)) foreach($allship AS $v) { ?>
					<option value="<?php echo $v['aid'];?>"><?php echo $v['title'];?></option>	
					<?php $n++;}unset($n); ?>
					</select>&nbsp;<input id="expressno" name="waybill[expressno]"   type="text" onblur="blurcheck(this)" onKeyUp="this.value=this.value.replace(/[^0-9a-z]/gi,'')" class="ui-input-text" placeholder="快递单号 如 102924323" style="border-top:solid 1px #e9e9e9;"></div>

</th>
</tr>
<tr>
<td colspan=2>

<?php $allship = $this->getallship();?>  
<?php $allgoodsservice=$this->getgoodsservice();?>
<?php $allmypackage = $this->getmypackage($package_array);?>



 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge" style="border:solid 1px #999;" id="tb__product"> 
 

 <tr id="trProduct" class="goods__row">
 <td align=center class="w58" class="index_number"  style="display:none">1</td>
 <td>
 <input id="number" name="waybill_goods[1][number]"  type="hidden"   value="1">
 <table border=0 width="100%">
	
	 <tr>
		<th onclick="delRow(this);" title="点击这里删除此包裹" style="cursor:pointer">品名</th>
		<td colspan=3><div class="ui-input-text"><input id="goodsname" name="waybill_goods[1][goodsname]" class="ui-input-text"  type="text"  onblur="blurcheck(this)" placeholder="物品名称 如 iPhone"></div> </td>
	  </tr>
	   <tr>
		<th onclick="delRow(this);" title="点击这里删除此包裹" style="cursor:pointer">数量</th>
		<td><div class="ui-input-text"><input id="amount" name="waybill_goods[1][amount]"  class="ui-input-text" type="text" onblur="blurcheck(this)"  onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"></div></td>
		<th>单价(JPY)</th>
		<td><div class="ui-input-text"><input id="price" name="waybill_goods[1][price]" class="ui-input-text" type="text" onblur="blurcheck(this)" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" value="0"></div></td>
	  </tr>

	  <tr style="display:none;">
		<th onclick="delRow(this);" title="点击这里删除此包裹" style="cursor:pointer">重量</th>
		<td><div class="ui-input-text"><input id="weight" name="waybill_goods[1][weight]" class="ui-input-text" type="text" onblur="blurcheck(this)"  onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"></div></td>
		<th>箱数</th>
		<td><div class="ui-input-text"><input id="boxcount" name="waybill_goods[1][boxcount]"  class="ui-input-text" type="text" onblur="blurcheck(this)" onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="<?php echo $goods['boxcount'];?>"></div></td>
	  </tr>
	  <tr style="display:none;">
		<th onclick="delRow(this);" title="点击这里删除此包裹" style="cursor:pointer">商品URL</th>
		<td><div class="ui-input-text"><input id="producturl" name="waybill_goods[1][producturl]" class="ui-input-text" type="text" onblur="blurcheck(this)"   value="<?php echo $goods['producturl'];?>"></div></td>
		<th>商家名称</th>
		<td><div class="ui-input-text"><input id="sellername" name="waybill_goods[1][sellername]"  class="ui-input-text" type="text" onblur="blurcheck(this)"  value="<?php echo $goods['sellername'];?>"></div></td>
	  </tr>

	  
  </table>
  </td></tr>  
  </table>

  

</td>
</tr>
<tr>
<td colspan=2 style="background:#e9e9e9;height:28px;font-size:14px;" align=right>
<table border=0 width="100%"><tr><td><font color=red style="margin-left:10px;font-size:14px;">注意点击包裹左侧删除</font></td><td>
<button type="button"  class="submit_b" onclick="javascript:addRow()">继续添加</button>
					 <input name='txtTRLastIndex' type='hidden' id='txtTRLastIndex' value="1" /></td></tr></table>
</td>
</tr>
<tr style="display:none;">
<td ><label for="email" class="ui-input-text">数量合计：</label></td>
<td >
<div class="ui-input-text"><input name="waybill[totalamount]" type="text" id="totalamount"   class="ui-input-text" onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"></div>
</td>
</tr>

<tr style="display:none;">
<td ><label for="email" class="ui-input-text">重量合计：</label></td>
<td >
<div class="ui-input-text"><input name="waybill[totalweight]" type="text" id="totalweight"   class="ui-input-text" onKeyUp="this.value=this.value.replace(/[^0-9]/gi,'')" value="0"></div>
</td>
</tr>

<tr style="display:none;">
<td ><label for="email" class="ui-input-text">价值合计：</label></td>
<td >
<div class="ui-input-text"><input  name="waybill[totalprice]" type="text" id="totalprice"  placeholder="" class="ui-input-text" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" value="0" ></div>
</td>
</tr>
<tr>
<th colspan=2 style="background:#e9e9e9;height:28px;font-size:14px;">转运方式</th>
</tr>
<tr>
<th colspan=2 >

<table border=0>
								<tr>
								<td style="padding-left:30px;">
								<p><input type="radio" name="waybill[srvtype]" value="0" checked onclick="serviceOpt(0)"/>
								<span>单票转运</span></p>
								<p>
								<input type="radio" name="waybill[srvtype]" value="1" onclick="serviceOpt(1)"/>
								<span>合箱转运</span></p>
								<p>
								<input type="radio" name="waybill[srvtype]" value="2" onclick="serviceOpt(2)"/>
								<span>分箱转运</span></p>
								</td>
								</tr>
								</table>

</th>
</tr>
</table>

<table id="span_addValues" width="100%">
<tr>
<th colspan=2 style="background:#e9e9e9;height:28px;font-size:14px;">增值服务</th>
</tr>

<tr>

<td style="font-size:12px;" colspan=2>


<?php $n=1;if(is_array($servicelist)) foreach($servicelist AS $srv) { ?>
						<p>
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

						<input name="service_value[<?php echo $srv['aid'];?>][title]" type="hidden"  value="<?php echo $srv['title'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][currencyname]" type="hidden"  value="<?php echo $currencyname;?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][unitname]" type="hidden"  value="<?php echo $unitname;?>"/>

						<input name="service_value[<?php echo $srv['aid'];?>][price]" type="hidden"  value="<?php echo $srv['price'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][currencyid]" type="hidden"  value="<?php echo $srv['currencyid'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][unitid]" type="hidden"  value="<?php echo $srv['unit'];?>"/>
						<input name="service_value[<?php echo $srv['aid'];?>][servicetype]" type="hidden"  value="<?php echo $srv['type'];?>"/>
						<input  name="service_value[<?php echo $srv['aid'];?>][servicetypeid]"  value="<?php echo $srv['aid'];?>" type="checkbox" > <label for="service<?php echo $srv['aid'];?>" style="float:none;width:auto;" title="<?php echo $srv['remark'];?>" alt="<?php echo $srv['remark'];?>"><?php echo $srv['title'];?><em class="color-red"></em></label>&nbsp;&nbsp;<font color="#FF953F"><?php  echo $this->getcurrencyname($srv['currencyid']); ?><?php echo $srv['price'];?></font>/<?php    echo $this->getunitname($srv['unit']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php } ?>
						</p>
					<?php $n++;}unset($n); ?>	  
                          <?php if($secuty) { ?>
						  <p style="border-top:solid 1px #ccc;padding-top:10px;margin-top:10px;">
						   
							<input name="service_value[<?php echo $temp_aid;?>][title]" type="hidden"  value="<?php echo $temp_title;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][currencyname]" type="hidden"  value="<?php echo $temp_currencyname;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][unitname]" type="hidden"  value="<?php echo $temp_unitname;?>"/>

							<input name="service_value[<?php echo $temp_aid;?>][currencyid]" type="hidden"  value="<?php echo $temp_currencyid;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][unitid]" type="hidden"  value="<?php echo $temp_unit;?>"/>
							<input name="service_value[<?php echo $temp_aid;?>][servicetype]" type="hidden"  value="<?php echo $temp_type;?>"/>
							<input  name="service_value[<?php echo $temp_aid;?>][servicetypeid]"  value="<?php echo $temp_aid;?>" type="checkbox" onclick="if(this.checked){$('#secuty_text').show();}else{$('#service_value_sprice').val(0);$('#secuty_text').hide();}"> <label for="service<?php echo $temp_aid;?>" style="float:none;width:auto;" ><?php echo $temp_title;?><em class="color-red"></em></label>&nbsp;&nbsp;<font  id="secuty_text" style="display:none"><?php  echo $this->getcurrencyname($temp_currencyid); ?><input name="service_value[<?php echo $temp_aid;?>][price]" type="text" id="service_value_sprice" value="0" size=5 class="inp" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'');securtychk();"/>&nbsp;<span id="money_show" style="color:#ff6600"></span>&nbsp;<?php echo $temp_remark;?></font>
						  </p>
						  <?php } ?>

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
			
</td>
</tr>

</table>
				
</li>
</ul>
   
    </div>

    
    
    <div class="footReturn" style="margin-bottom:80px;">
	 <input type="hidden" name="dosubmit" id="dosubmit" value="1"/>
	 <input type="hidden" name="lastindex" id="lastindex" value="1"/>
	 <input type="submit" id="showcard"  class="submit_b"  value="保 存" style="width:100%"> 
	 
<div class="window" id="windowcenter">
<div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div>
    </form>
<script type="text/javascript"> 


var oLay = document.getElementById("overlay");	
$(document).ready(function () { 


$("#showcard").click(function () { 
	
	

	$.post($("#mainForm").attr('action')+'&t='+Math.random()+'&t='+Math.random(), 
	function(data) {
		if (data.status) {
		   alert(data.msg,data.url);
		} else{
			$('#parssword').addClass('err');
			alert(data.msg,'');
		}
	},
	"json");

 
oLay.style.display = "block";
}); 
}); 

$("#windowclosebutton").click(function () { 
$("#windowcenter").slideUp(500);
oLay.style.display = "none";

}); 
$("#alertclose").click(function () { 
$("#windowcenter").slideUp(500);
oLay.style.display = "none";

}); 

function alert(title,url){ 

$("#windowcenter").slideToggle("slow"); 
$("#txt").html(title);
if(url!=''){setTimeout('$("#windowcenter").slideUp(500,function(){window.location.href ="'+url+'";})',4000);}else{
	setTimeout('$("#windowcenter").slideUp(500)',4000);
}
} 

</script>


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
  
	if($("#storageid").val()=='0'){
		alert("请选择发货仓库！",'');
		return false;
	}



	if($("#shippingid").val()=='0'){
		alert("请选择发货线路！",'');
		return false;
	}

	if($("#expressid").val()=='0'){
		alert("请选择发货商家！(不知道可选择其他)",'');
		return false;
	}

	if($("#expressno").val()==''){
		alert("请填写快递单号!(如不知道，可填写为商家的订单号,到货后无法直接入库，需拆箱查箱内订单号入库！)",'');
		return false;
	}


	var mval=$("#service_value_sprice").val();
		if(mval==""){mval=0;}
		var shippingid=$("#shippingid").val();
		if(shippingid==4 && mval<20000 && $("#_secutychk").attr("checked")==true){//EMS
						alert("EMS自带2万日元保额，无须购买保险",'');
						mval=0;
						return false;
					}

					if(shippingid==4 && mval>2000000 && $("#_secutychk").attr("checked")==true){//EMS
						alert("EMS最大保险金额为200万日元",'');
						mval=0;
						return false;
					}
					
					if(shippingid==2 && mval>120000 && $("#_secutychk").attr("checked")==true){//SAL
						alert("SAL最大保险金额为12万日元",'');
						mval=0;
						return false;
					}
					if(shippingid==3 && mval>120000 && $("#_secutychk").attr("checked")==true){//航空
						alert("航空最大保险金额为12万日元",'');
						mval=0;
						return false;
					}
					if(shippingid==8 && mval>120000 && $("#_secutychk").attr("checked")==true){//海运
						alert("海运最大保险金额为12万日元",'');
						mval=0;
						return false;
					}

	var gotoflag=0;
	var current_expressno="";
	$(".goods__row").each(function(){
		
		

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
		dialog_alert(result);
		return false;
	}


	if(gotoflag==1)
	{
		alert("请在运单里填写包裹！",'');
		return false;
	}

	if($("#totalamount").val()=='' || $("#totalprice").val()==''){
		alert("请在运单里填写包裹！",'');
		return false;
	}


	
	


	//判断收货地址
	
	
	if($('input:radio[name="waybill[takeaddressid]"]:checked').val()==null){
		alert("请填写收货地址！",'');
		return false;
	}


	if($('input:radio[name="waybill[takeaddressid]"]:checked').val()==0){
		//判断新收货地址
		if($("#take_truename").val()==''){
			alert("请填写收货寄件人！",'');
			return false;
		}
		if($("#take_country").val()==''){
			alert("请填写收货国家！",'');
			return false;
		}
		if($("#take_province").val()==''){
			alert("请填写收货省/州！",'');
			return false;
		}
		if($("#take_city").val()==''){
			alert("请填写收货市！",'');
			return false;
		}
		if($("#take_address").val()==''){
			alert("请填写收货详细地址！",'');
			return false;
		}
	
		if($("#take_mobile").val()==''){
			alert("请填写收货手机号码！",'');
			return false;
		}
		if($("#take_email").val()==''){
			alert("请填写收货邮箱地址！",'');
			return false;
		}
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
		$.post("/index.php?m=wap&c=waybill&a=gettakelists&areaid="+areaid,function(data){
		
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
		$.post("/index.php?m=wap&c=waybill&a=getshippingmethod&sendid="+sendid+"&idd="+areaid,function(data){
		
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
		mClone.find("input[id^='expressid']").val(0);
		mClone.find("input[id^='expressname']").val("");

		mClone.find("input[id^='expressno']").val("");
		mClone.find("input[id^='goodsname']").val("");
		mClone.find("input[id^='amount']").val(0);
		mClone.find("input[id^='weight']").val(0);
		mClone.find("input[id^='price']").val(0);

		mClone.find("input[id^='boxcount']").val(0);
		mClone.find("input[id^='producturl']").val("");
		mClone.find("input[id^='sellername']").val("");


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
		var delid = $(obj).parent().parent().parent().parent().parent().attr("id");
		if(delid!='trProduct'){
			$("#"+delid).remove();
			orderRow();
		}
		
	}

	function orderRow(){
		$("#lastindex").val(1);
		$(".goods__row").each(function(i){
			$(this).find("td:first").html($("#lastindex").val());
			var num = $("#lastindex").val();
			$(this).find("input[id^='number']").val(num);

			$(this).find("select[id^='expressid']").attr("id","expressid"+num);
			$(this).find("input[id^='expressname']").attr("id","expressname"+num);

			$(this).find("input[id^='expressno']").attr("id","expressno"+num);
			$(this).find("input[id^='goodsname']").attr("id","goodsname"+num);
			$(this).find("input[id^='amount']").attr("id","amount"+num);
			$(this).find("input[id^='weight']").attr("id","weight"+num);
			$(this).find("input[id^='price']").attr("id","price"+num);
			$(this).find("input[id^='number']").attr("id","number"+num);

			$(this).find("input[id^='packageid']").attr("id","packageid"+num);
			$(this).find("input[id^='boxcount']").attr("id","boxcount"+num);
			$(this).find("input[id^='producturl']").attr("id","producturl"+num);
			$(this).find("input[id^='sellername']").attr("id","sellername"+num);

			$(this).find("input[id^='number']").attr("name","waybill_goods["+num+"][number]");
			$(this).find("select[id^='expressid']").attr("name","waybill_goods["+num+"][expressid]");
			$(this).find("input[id^='expressname']").attr("name","waybill_goods["+num+"][expressname]");

			$(this).find("input[id^='expressno']").attr("name","waybill_goods["+num+"][expressno]");
			$(this).find("input[id^='goodsname']").attr("name","waybill_goods["+num+"][goodsname]");
			$(this).find("input[id^='amount']").attr("name","waybill_goods["+num+"][amount]");
			$(this).find("input[id^='weight']").attr("name","waybill_goods["+num+"][weight]");
			$(this).find("input[id^='price']").attr("name","waybill_goods["+num+"][price]");
			$(this).find("input[id^='packageid']").attr("name","waybill_goods["+num+"][packageid]");

			$(this).find("input[id^='boxcount']").attr("name","waybill_goods["+num+"][boxcount]");
			$(this).find("input[id^='producturl']").attr("name","waybill_goods["+num+"][producturl]");
			$(this).find("input[id^='sellername']").attr("name","waybill_goods["+num+"][sellername]");

			var obj = $(this);
			//重新排序物品增值服务
			var srv=0;
			obj.find(".tdrow").find("input").each(function(){
			
				var $this = $(this);
				var onename = $this.attr("name").replace("service_order","");
				var arrname = onename.split('_');
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
			totalprice +=parseFloat($(this).find("input[id^='price']").val());
		});

		$("#totalamount").val(totalamount);
		$("#totalweight").val(totalweight);
		$("#totalprice").val(totalprice);
	}
	
	computtotal();
</script>
<?php } ?>
<?php include template("wap","footer"); ?>
</body>
</html>
