<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->__all__urls[0]['userinfo'];?>--<?php echo $this->wap['sitename'];?></title>
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
<a class="ui-title" id="popmenu"><?php echo $this->__all__urls[0]['userinfo'];?></a>
<a class="ui-btn-left_pre" href="javascript:history.go(-1);"></a><a class="ui-btn-right_home" href="<?php echo WAP_SITEURL;?>"></a>
</div>
</div>

    


 <input type="hidden" name="forward" id="forward" value="<?php echo urlencode($_GET['forward']);?>" />
 

<div class="contact-info" style=" margin-top:10px;">
<ul>

<li>
<table style="padding: 0; margin: 0; width: 100%;">
<tbody>

<tr>
<td width="90px"><label for="email" class="ui-input-text">UID：</label></td>
<td >
<?php echo $memberinfo['userid'];?>
</td>
</tr>
<tr>
<td width="90px"><label for="email" class="ui-input-text">用户名：</label></td>
<td >
<?php echo $memberinfo['username'];?>
</td>
</tr>
<tr>
<td width="90px"><label for="email" class="ui-input-text">客服：</label></td>
<td >
<?php echo $memberinfo['nickname'];?>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">真实姓名<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="truename" name="info[truename]"   value="<?php echo $memberinfo['truename'];?>" value="" placeholder="请保持与身份证上姓名相同" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">性 别：</label></td>
<td >
<div class="ui-input-radio"><input type="radio" value="0" name="info[sex]" id="sex0" <?php if($memberinfo['sex']==0) { ?>checked="checked"<?php } ?> placeholder="" class="ui-input-radio">保密 <input type="radio" value="1" name="info[sex]" id="sex1" <?php if($memberinfo['sex']==1) { ?>checked="checked"<?php } ?>/>男 <input type="radio" value="2" name="info[sex]" id="sex2" <?php if($memberinfo['sex']==2) { ?>checked="checked"<?php } ?>/>女</div>
</td>
</tr>
<tr>
<td ><label for="email" class="ui-input-text">国 家<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text"  id="country" name="info[country]"   value="<?php echo $memberinfo['country'];?>" placeholder="请正确填写国家" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">省 州<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="province" name="info[province]"   value="<?php echo $memberinfo['province'];?>"  placeholder="请正确填写省/州" class="ui-input-text"></div>
</td>
</tr>
<tr>
<td ><label for="email" class="ui-input-text">城 市<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="city" name="info[city]"   value="<?php echo $memberinfo['city'];?>"  placeholder="请正确填写城市" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">地 址<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="address" name="info[address]"   value="<?php echo $memberinfo['address'];?>"  placeholder="请正确填写地址" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">邮 箱<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="email" name="info[email]"   value="<?php echo $memberinfo['email'];?>"  placeholder="请正确填写邮箱" class="ui-input-text"></div>
</td>
</tr>



<tr>
<td ><label for="email" class="ui-input-text">身份证号<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="idcard" name="info[idcard]"   value="<?php echo $memberinfo['idcard'];?>" placeholder="请输入身份证号码" class="ui-input-text"></div>
</td>
</tr>
<!--
<tr>
<td ><label for="email" class="ui-input-text">正面：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="idcard_fb" name="info[idcard_fb]"    value="<?php echo $memberinfo['idcard_fb'];?>"  placeholder="" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">反面：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="idcard_fe" name="info[idcard_fe]"  value="<?php echo $memberinfo['idcard_fe'];?>"  placeholder="" class="ui-input-text"></div>
</td>
</tr>
-->
<tr>
<td ><label for="email" class="ui-input-text">手 机<font color=red>*</font>：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="mobile" name="info[mobile]"   value="<?php echo $memberinfo['mobile'];?>"  placeholder="请输入手机号码" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">固定电话：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="telephone" name="info[telephone]"   value="<?php echo $memberinfo['telephone'];?>"  placeholder="" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">邮 编：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="postcode" name="info[postcode]"   value="<?php echo $memberinfo['postcode'];?>"  placeholder="" class="ui-input-text"></div>
</td>
</tr>

<tr>
<td ><label for="email" class="ui-input-text">QQ：</label></td>
<td >
<div class="ui-input-text"><input type="text" id="nowconnect" name="info[nowconnect]"   value="<?php echo $memberinfo['nowconnect'];?>" placeholder="" class="ui-input-text"></div>
</td>
</tr>

</tbody></table>					
</li>
</ul>
   
    </div>

    
    
    <div class="footReturn" style="margin-bottom:80px;">
	 <input type="submit" id="showcard"  class="submit_b"  value="保 存" style="width:100%"> 
	<div class="window" id="windowcenter">
		<div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
		<div class="content"><div id="txt"></div></div>
	</div>
</div>
    
   
     

    
    
<script type="text/javascript"> 


var oLay = document.getElementById("overlay");	
$(document).ready(function () { 


$("#showcard").click(function () { 
	
	//var pingyingname =  document.getElementById('pingyingname').value;
	var truename =  document.getElementById('truename').value;
	//var firstname =  document.getElementById('firstname').value;
	//var lastname =  document.getElementById('lastname').value;
	var email =  document.getElementById('email').value;

	var country =  document.getElementById('country').value;
	var province =  document.getElementById('province').value;

	var city =  document.getElementById('city').value;
	var address =  document.getElementById('address').value;
	//var placeid =  document.getElementById('placeid').value;  alert(3);
	var idcard =  document.getElementById('idcard').value;
	var mobile =  document.getElementById('mobile').value;
	var telephone =  document.getElementById('telephone').value;
	//var postcode =  document.getElementById('postcode').value;
	var nowconnect =  document.getElementById('nowconnect').value;
	//var remark =  document.getElementById('remark').value;



	var forward =  document.getElementById('forward').value;
	var sex=0;
	for(var n=0;n<3;n++){
		if(document.getElementById('sex'+n).checked==true){
			sex=document.getElementById('sex'+n).value;
		}
	}
//alert(3);
	var submitData = {
		//pingyingname: pingyingname,
		truename: truename,
		//firstname: firstname,
		//lastname: lastname,
		email: email,
		sex: sex,
		country: country,
		province: province,
		city: city,
		address: address,
		//placeid: placeid,
		idcard: idcard,
		mobile: mobile,
		telephone: telephone,
		//postcode: postcode,
		nowconnect: nowconnect,
		//msn: msn,
		//remark: remark,
		forward: forward,
		dosubmit: "info"
	};

	$.post('/index.php?m=member&c=ajax_index&a=account_manage_info&t='+Math.random(), submitData,
	function(data) {alert(data);
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

<?php include template("wap","footer"); ?>
</body>
</html>
