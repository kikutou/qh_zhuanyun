<?php 
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-10">
<form method="post" action="?m=waybill&c=admin_waybill&a=confirm_handle_waybill&oid=<?php echo $oid;?>" name="myform" id="myform"  onsubmit="comput();">
<table class="table_form" width="100%" cellspacing="0">
<tbody>
<tr style="display:none">
		<th ><strong><?php echo L('selected_recoeds')?>：</strong></th>
		<td><?php echo $ids;?></td>
	</tr>
	
	<tr>
	<th><strong><?php echo L('use_formulas');?>：</strong></th>
	<td><div id="gongshi"></div></td>
	</tr>
	<tr>
		<th><strong><?php echo L('waybill_lwh')?>(CM)：</strong></th>
		<td><input name="data[bill_long]" id="bill_long"  type="text"  size=10 value="<?php echo $bill_long;?>" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" onblur="comput();">X<input name="data[bill_width]" id="bill_width"  type="text"  size=10 value="<?php echo $bill_width;?>" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" onblur="comput();">X<input name="data[bill_height]" id="bill_height"  type="text" size=10  value="<?php echo $bill_height;?>" onKeyUp="this.value=this.value.replace(/[^0-9.]/gi,'')" onblur="comput();"></td>
	</tr>
	<tr>
		<th><strong><?php echo L('volumeweight')?>：</strong></th>
		<td><input name="data[volumeweight]" id="volumeweight" class="input-text" type="text" size="10" value="0.00" readonly> L * W * H / <?php echo WB_VOL.' / '.WB_VOL_CM;?>&nbsp;&nbsp;<!--体积费：--><input name="data[volumefee]" id="volumefee" class="input-text" type="hidden" size="10" value="0.00" readonly></td>
	</tr>


	<tr>
		<th><strong><?php echo L('actual_weight_p')?>：</strong></th>
		<td><input name="data[totalweight]" id="totalweight" class="input-text" type="text" size="10" value="<?php echo $totalweight;?>" onblur="comput();">&nbsp;&nbsp;<?php echo L('shipping_line');?>：<input name="showlinefee" id="showlinefee" class="input-text" type="text" size="10" value="0" readonly><!--额外收费重量（磅）
：--><input name="data[factweight]" id="factweight" class="input-text" type="hidden" size="10" value="0.00" ></td>
	</tr>
	
	<tr>
		<th><strong><?php echo L('pay_total')?>：</strong></th>
		<td><input name="data[totalship]" id="totalship" class="input-text" type="text" size="10" value="0" onblur="comput();">&nbsp;&nbsp;<?php echo L('total_value_added_costs');?>：<input name="data[allvaluedfee]" id="allvaluedfee" class="input-text" type="text" size="10" value="<?php echo $allvaluedfee;?>" onblur="comput();"></td>
	</tr>
	<tr>
		<th><strong><?php echo L('member_discount');?>：</strong></th>
		<td><input name="data[memberdiscount]" id="memberdiscount" class="input-text" type="text" size="10" value="<?php echo $memberdiscount;?>" onblur="comput();">%&nbsp;&nbsp;<?php echo L('additional_discount');?>：<input name="data[otherdiscount]" id="otherdiscount" class="input-text" type="text" size="10" value="<?php echo $otherdiscount;?>" onblur="comput();">%</td>
	</tr>
	<tr>
		<th><strong><?php echo L('other_fee');?>：</strong></th>
		<td><input name="data[otherfee]" id="otherfee"  type="text"  size=10 value="<?php echo $otherfee;?>" onblur="comput();">&nbsp;&nbsp;<?php echo L('tax_fee');?>：<input name="data[taxfee]" id="taxfee" class="input-text" type="text" size="10" value="0" onblur="comput();">&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<th><strong><?php echo L('package_overday');?>：</strong></th>
		<td><input name="wbill[overdayscount]" id="overdayscount"  type="text"  size=10 value="<?php echo $overdayscount;?>" onblur="comput();">&nbsp;&nbsp;<?php echo L('package_overdayfee');?>：<input name="wbill[overdaysfee]" id="overdaysfee" class="input-text" type="text" size="10" value="<?php echo $overdaysfee;?>" onblur="comput();">&nbsp;&nbsp;</td>
	</tr>

	<tr>
		<th><strong><?php echo L('paid_in_fee');?>(USD)：</strong></th>
		<td><input name="data[payfeeusd]" id="payfeeusd"  type="text"  size=10 value="<?php echo $payfeeusd;?>">&nbsp;&nbsp;RMB <?php echo L('wayrate');?>：<input name="data[wayrate]" id="wayrate" class="input-text" type="text" size="15" value="<?php echo $wayrate;?>" ></td>
	</tr>
	<tr>
		<th><strong><?php echo L('paid_in_fee');?>(RMB)：</strong></th>
		<td><input name="data[payedfee]" id="payedfee"  type="text"  size=10 value="<?php echo $payedfee;?>"></td>
	</tr>
	<tr>
		<th><strong><?php echo L('goodsname')?>：</strong></th>
		<td><input name="data[goodsname]" id="goodsname"  type="text"  size=30 value="<?php echo $goodsname;?>"></td>
	</tr>
		<tr>
		<th><strong><?php echo L('common_send_email_notify');?>：</strong></th>
		<td><input name="send_email_nofity" id="send_email_nofity1"  type="radio"  value="1" checked><?php echo L('Yes');?>&nbsp;&nbsp;<input name="send_email_nofity" id="send_email_nofity0"  type="radio"  value="0" ><?php echo L('No');?>&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<th><strong><?php echo L('operator')?>：</strong></th>
		<td><?php echo $this->username;?></td>
	</tr>

	<tr>
  		<th><strong><?php echo L('remark')?>：</strong></th>
        <td>
		<textarea name="history[remark]" id="remark" cols="40" rows=4></textarea>
		</td>
	</tr>
	</tbody>
</table>
<input type="submit"  name="dosubmit" id="dosubmit" value=" <?php echo L('ok')?> " class="dialog">&nbsp;<input type="reset" class="dialog" value=" <?php echo L('clear')?> ">
<input type="hidden" id="tweightfee" value="<?php echo $tweightfee;?>"/>
<input type="hidden" id="vweightfee" value="<?php echo $vweightfee;?>"/>
<input type="hidden" id="user_amount" value="<?php echo $useramount;?>"/>
</form>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'220',height:'70'}, function(){this.close();$(obj).focus();})}});
	
});


function comput(){
	var bill_long=parseFloat($("#bill_long").val()).toFixed(2);
	var bill_width=parseFloat($("#bill_width").val()).toFixed(2);
	var bill_height=parseFloat($("#bill_height").val()).toFixed(2);
	var totalweight=parseFloat($("#totalweight").val()).toFixed(2);//实际重量
	var pay_feeweight=0;//收费重量
	var tweightfee=parseFloat($("#tweightfee").val()).toFixed(2);//航线运费
	var vweightfee=parseFloat($("#vweightfee").val()).toFixed(2);//体积重运费
	var totalship=0;//总运费
	var allvaluedfee=parseFloat($("#allvaluedfee").val()).toFixed(2);//增值费用

	var otherfee=parseFloat($("#otherfee").val());//其它费用

	var fee="<?php echo $package_overdayfee;?>";
	$("#overdaysfee").val(($("#overdayscount").val()*fee));

	var overdaysfee=parseFloat($("#overdaysfee").val());
 
	var volumeweight=bill_long*bill_width*bill_height/<?php echo WB_VOL;?>/<?php echo WB_VOL_CM;?>;//体积重
	var memberdiscount=parseFloat($("#memberdiscount").val()) * 0.01;//会员折扣
	var otherdiscount=parseFloat($("#otherdiscount").val())* 0.01;//额外折扣
	var discount = parseFloat(memberdiscount)+parseFloat(otherdiscount);//需要打多少折
	var wayrate = $("#wayrate").val();

	var volumefee=0;//体积费

	if(discount==0)
		discount=1;//不打折


	volumeweight = parseFloat(volumeweight).toFixed(2);
	$("#volumeweight").val(volumeweight);
 
	if(parseFloat(volumeweight)>parseFloat(totalweight)){//体积重>实际重
		//运费是=实际重量*实际重量运费 +（体积重-实际重量）*体积重运费
			
		totalship = volumeweight*tweightfee;
	
		$("#showlinefee").val(tweightfee);
		$("#gongshi").html("<font color=red>总运费=体积重量*航线运费</font>");
		

	}else{
		
		$("#gongshi").html("<font color=red>总运费=实际重量*航线运费</font>");
		$("#showlinefee").val(tweightfee);
		totalship=totalweight*tweightfee;
		pay_feeweight=0;
		volumefee=0;
	}
	
	pay_feeweight=parseFloat(pay_feeweight).toFixed(2);
	totalship=parseFloat(totalship).toFixed(2);
	payedfee=parseFloat(totalship)*discount+parseFloat(allvaluedfee)+otherfee + overdaysfee + parseFloat($("#taxfee").val());//打折
	//payedfee=parseFloat(totalship)+parseFloat(allvaluedfee);
	payedfee=parseFloat(payedfee).toFixed(2);
 
	$("#factweight").val(pay_feeweight);//收费重量
	$("#totalship").val(totalship);//总运费
	
	$("#payfeeusd").val(payedfee);//实扣费用USD

	$("#payedfee").val(parseFloat(payedfee*wayrate).toFixed(2));//实扣费用RMB
	$("#volumefee").val(parseFloat(volumefee).toFixed(2));//体积费用
 
}

comput();
</script>