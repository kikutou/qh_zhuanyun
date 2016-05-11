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
</style>
</head>

<body class="mode_webapp">

<?php include template("wap","header_min"); ?>



<link href="/resource/wap/css/news3_.css" rel="stylesheet" type="text/css" />

<div id="ui-header">
<div class="fixed">
<a class="ui-title" id="popmenu"><?php echo $this->__all__urls[0]['waybill'];?></a>
<a class="ui-btn-left_pre" href="javascript:history.go(-1);"></a><a class="ui-btn-right_home" href="<?php echo WAP_SITEURL;?>"></a>
</div>
</div>

    
<?php if(!$__is__userinfo__full[value]) { ?>

 <form action="" method="post" name="mainForm" id="mainForm">
 <input type="hidden" name="forward" id="forward" value="<?php echo urlencode($_GET['forward']);?>" />

<?php
							$curruser=$this->current_user;
							$result=$this->db->query("select sum(payedfee) as nopay from t_waybill where status=8 and userid='".$curruser[userid]."' and storageid='".$this->hid."'");
							$dataarray=$this->db->fetch_array($result);
							$nopayamount=0;
							foreach($dataarray as $r){
								$nopayamount+=$r[nopay];
							}

							?>
<div class="contact-info" style=" margin-top:10px;">

<ul>
<li><table border=0 width="100%"><tr><td><p>账户余额: <font color=red><?php echo $this->current_user['amount'];?>元</font></p><p>待付余额: <font color=red><?php echo $nopayamount;?>元</font></p></td><td>
<input type="button" id="address_add"  class="submit_b"  value="充值" style="width:100%" onclick="window.location.href='<?php echo $this->__all__urls[1]['addmoney'];?>';"></td><td><input type="button" id="orderbill"  class="submit_b"  value="下单" style="width:100%" onclick="window.location.href='<?php echo $this->__all__urls[1]['waybillinfo'];?>';"></td></tr></table> 
</li>
</ul>
<ul>
<li>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge" >
 <tr>
    <th  class="cc" style="<?php if($status!=0) { ?>background:#fff;<?php } ?>cursor:pointer" onclick="window.location.href='index.php?m=wap&c=waybill&a=init&status=0'">全部</th>
    <th  class="cc" style="<?php if($status!=1) { ?>background:#fff;<?php } ?>border-left:solid 1px #ededed;cursor:pointer" onclick="window.location.href='index.php?m=wap&c=waybill&a=init&status=1'">未入库</th>
	<th  class="cc" style="<?php if($status!=3) { ?>background:#fff;<?php } ?>border-left:solid 1px #ededed;cursor:pointer" onclick="window.location.href='index.php?m=wap&c=waybill&a=init&status=3'">已入库</th>
	<th  class="cc" style="<?php if($status!=8) { ?>background:#fff;<?php } ?>border-left:solid 1px #ededed;cursor:pointer" onclick="window.location.href='index.php?m=wap&c=waybill&a=init&status=8'">待付款</th>
	<th  class="cc" style="<?php if($status!=16) { ?>background:#fff;<?php } ?>border-left:solid 1px #ededed;cursor:pointer" onclick="window.location.href='index.php?m=wap&c=waybill&a=init&status=16'">已签收</th>
  </tr>
  </table>

 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge" style="border-top:none;"> 
  
  <tr>
    <th scope="col" ><input type="checkbox" name="chk_all"  onclick="allchk(this)"></th>
	<th>运单号</th>
    <th  class="cc">快递单号</th>
    <th  class="cc">状态</th>
  </tr>
 <?php
													$pdb = pc_base::load_model('package_model');
													?>
			                                        <?php $n=1;if(is_array($datas)) foreach($datas AS $waybill) { ?>
													<?php $takeperson="";?>
													<?php $takecity="";?>

													<?php $addr = explode('|',$waybill['takeaddressname']);?>
													<?php $takeperson=$addr[0];?>
													<?php $takecity=$addr[4];?>
   <tr>
	<td scope="col">
																
																	<input type="checkbox" name="aid[]" value="<?php echo $waybill['aid'];?>" relweight="<?php echo $waybill['totalweight'];?>">
																	</td>
    <td><a href="?m=wap&c=waybill&a=waybill_detail&bid=<?php echo $waybill['aid'];?>" title="点开查看"><?php echo $waybill['waybillid'];?></a> <p><?php if($waybill[status]==1) { ?><a href="?m=wap&c=waybill&a=edit&aid=<?php echo $waybill['aid'];?>">修改</a><?php } ?>  <?php if(trim($waybill[expressnumber])!="") { ?> <a href="<?php echo str_replace("#",trim($waybill[expressnumber]),trim($waybill[expressurl]));?>" target=_blank>快递跟踪</a>
																	<?php } ?></p></td>
	<td>
	
																
																	

																	<?php 
																	$shipp = $this->getallship($waybill[expressid]);

																	$curpna=$waybill[goodsname];
																	
																	$exurl=str_replace('#',$waybill[expressno],$shipp[remark]);
																	?>
																		<a href="<?php echo $exurl;?>" target=_blank style="color:<?php echo $this->getpackage_color($wbg['expressno']);?>" title="<?php echo $curpna;?>"><?php echo $waybill['expressno'];?></a><br>
																	
	</td>
	<td <?php if($waybill[status]==6) { ?> style="color:red"<?php } ?>><?php echo $this->getonestatus($waybill[status],$waybill[placeid])?></td>
   
  </tr>
  <tr>
  <td colspan=3 style="border-top:none"><?php if($waybill[status]==1) { ?><input type="checkbox" name="aid[]" value="<?php echo $waybill['aid'];?>"><?php } ?> <?php echo $takeperson;?> <?php echo $takecity;?> <?php echo $waybill['storagename'];?> <?php echo date('y-m-d',$waybill[addtime]);?></td>
  <td align=left>
  <?php if($waybill[status]==3) { ?>
  <button type="button" style="float:left;padding:5px;"  class="submit_b"  
																onclick="
																<?php if($waybill[totalweight]>30000) { ?>alert('超出最大发货重量，请分箱发货');
																return false;
																<?php } else { ?>window.location.href='?m=wap&c=waybill&a=editline&aid=<?php echo $waybill['aid'];?>';
																<?php } ?>">
																单发
																</button>
																<?php } ?>&nbsp;
  </td>
  </tr>
  <?php $n++;}unset($n); ?>

  

  
  </table>
<?php if($status==3) { ?>
<hr>

  <table border=0 align=center ><tr><td colspan=2>
 分
<select id='split_number' name="split_number" size='1' >
  <option value='0' selected >请选择分箱数量</option>
  <option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>

</select> 
箱 </td></tr><tr><td>
<button type="button" class="btn-login btn-cancel radius-three fl submit_b" tabindex="18" onclick="split_box()">分箱发货</button></td><td><button type="button" class="btn-login btn-cancel radius-three fl submit_b" tabindex="18" onclick="union_box()">合箱发货</button></td></tr>
</table>
<?php } ?>
</li>
</ul>
<ul>

<li>
		<div class="pages"><?php echo $pages;?></div>			
</li>
</ul>
   
    </div>

	

    
    
    <div class="footReturn" style="margin-bottom:80px;">
	<?php if($status==1) { ?>
	<input type="submit" id="showcard"  class="submit"  value="删除所选" style="width:100%" onclick="document.mainForm.action='?m=wap&c=waybill&a=delete';return confirm('确定要删除所选记录？')" > 
	<?php } ?>
<div class="window" id="windowcenter">
<div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
<div class="content">
<div id="txt"></div>
</div>
</div>
</div></form>


<script type="text/javascript">
  

	function split_box(){
	
		if($("#split_number").val()==0){
			alert("请选择分箱数量",'');
			return false;
		}
		var str="";
		var num=0;
		$("input[name='aid[]']:checked").each(function(data){
			if(str==""){str=$(this).val();}else{
				str+=","+$(this).val();
			}
			num++;
		});

		if(str=="" || num!=1){
			alert("请选择需要分箱包裹 或 只限选单个订单分箱!",'');
			return false;
		}else{
		
		
			$("#mainForm").attr("action","/index.php?m=wap&c=waybill&a=splitbox_pre&hid=<?php echo $this->hid;?>");
			$("#mainForm").submit();
		
		}

	}

	function union_box(){
		
		var str="";
		var number=0;
		var totalweight=0;
		$("input[name='aid[]']:checked").each(function(data){
			if(str==""){str=$(this).val();totalweight=parseFloat($(this).attr('relweight'));}else{
				str+=","+$(this).val();
				totalweight+=parseFloat($(this).attr('relweight'));
			}
			number++;
		});
		if(totalweight>30000){
			alert("大于30KG无法合箱，超出最大发货重量，请重新选择包裹进行合箱",'');
			return false;
		}
		if(str=="" || number>17 || number==1){
			if(number==1){alert("单个包裹无法合箱，请直接点发货",'');}else{
			if(number>17){alert("最多支持17箱合箱发货",'');}else{
			alert("请选择需要合箱包裹",'');}
			}
			return false;
		}else{
		
		
			$("#mainForm").attr("action","/index.php?m=wap&c=waybill&a=unionbox_pre&hid=<?php echo $this->hid;?>");
			$("#mainForm").submit();
		
		}
	}

   </script>

     <script type="text/javascript">
   function allchk(obj){
     $("input[name='aid[]']").attr("checked",obj.checked);
   }
   </script>
<script type="text/javascript"> 


var oLay = document.getElementById("overlay");	


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
<?php } ?>
<?php include template("wap","footer"); ?>
</body>
</html>
