<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php
	$__is__userinfo__full=array('value'=>'','url'=>'');
	

	if($_GET['a']!='account_manage_info'){
		$currus = $this->get_current_userinfo();

		if($currus['mobile']=="" || $currus['truename']=="" || $currus['country']=="" || $currus['province']=="" || $currus['city']=="" || $currus['address']==""  || $currus['email']=="" || $currus['postcode']=="" ){
			$__is__userinfo__full['value']="您的资料尚未完善，请完善后再操作!";
			$__is__userinfo__full['url']="/index.php?m=member&c=ajax_index&a=account_manage_info";
		}
	}

?>

<div class="window" id="windowcenter2">
		<div id="title2" class="wtitle">操作提示<span class="close" id="alertclose2"></span></div>
		<div class="content"><div id="txt2"></div></div>
	</div>
<script type="text/javascript"> 

$("#windowclosebutton2").click(function () { 
$("#windowcenter2").slideUp(500);
oLay.style.display = "none";

}); 
$("#alertclose2").click(function () { 
$("#windowcenter2").slideUp(500);
oLay.style.display = "none";

}); 

function alertdialog(title,url){ 

$("#windowcenter2").slideToggle("slow"); 
$("#txt2").html(title);
setTimeout('$("#windowcenter2").slideUp(500,function(){window.location.href="'+url+'";})',4000);
}

<?php if($__is__userinfo__full[value]) { ?>
	alertdialog("<?php echo $__is__userinfo__full['value'];?>","<?php echo $__is__userinfo__full['url'];?>");
	
<?php } ?>

</script>