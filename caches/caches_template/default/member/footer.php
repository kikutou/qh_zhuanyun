<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>  <style>
.t_kind{font-family:微软雅黑,宋体,Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; color:#cbda69;}
#footerListLi{float:left; margin-left:57px;}
#txt1{text-align:left; line-height:25px; }
.txt22 a{color:#fafafa; font:12px/1.5 Tahoma, Arial, sans-serif, microsoft yahei;}
.txt22 a:hover{color:#0080C6;}
td,th{border:0px; padding:0px;}
 </style> 
 
 
        <footer class="footer">
		<div class="layout footer-mod">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" >
	<table width="1002" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">
		<table width="1002" border="0" cellpadding="5" cellspacing="0" style="margin-bottom:20px">
        <tr>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=119dc8d1d86963acd716fc929bebfb09&sql=select+%2A+from+t_category+where+catid%3E11&num=9&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from t_category where catid>11 LIMIT 9");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
				<?php $n=1;if(is_array($data2)) foreach($data2 AS $r) { ?>
				<?php if($r[catid]==18 || $r[catid]==20 || $r[catid]==21) { ?>
          <td width="152" align="center" valign="top" bgcolor="#1a7599"><label class="t_kind"><?php echo $r['catname'];?></label></td>
				<?php } ?>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=76e85b2bb59cfc040086712be8dfc402&sql=select+%2A+from+t_category+where+catid%3E11&num=9&return=data3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from t_category where catid>11 LIMIT 9");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data3 = $a;unset($a);?>
				<?php $n=1;if(is_array($data3)) foreach($data3 AS $rr) { ?>
				<?php if($rr[catid]==12 || $rr[catid]==22 || $rr[catid]==23) { ?>
          <td width="152" align="center" valign="top" bgcolor="#1a7599"><label class="t_kind"><?php echo $rr['catname'];?></label></td>
				<?php } ?>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		
        </tr>
        <tr>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=085f0d1471fe708c665ba918ba226e3f&sql=select+%2A+from+t_category+where+catid%3E11&num=9&return=data0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from t_category where catid>11 LIMIT 9");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data0 = $a;unset($a);?>
			<?php $n=1;if(is_array($data0)) foreach($data0 AS $r0) { ?>
			<?php if($r0[catid]==18 || $r0[catid]==20 || $r0[catid]==21) { ?>
          <td align="left" valign="top" style="padding-top:5px;">
		  <div id="footerListLi">
              <ul id="txt1">
			  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d405f14119056565dc2abf719a0b248d&action=lists&catid=%24r0%5Bcatid%5D&num=5&siteid=%24siteid&return=data1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data1 = $content_tag->lists(array('catid'=>$r0[catid],'siteid'=>$siteid,'limit'=>'5',));}?>
				<?php $n=1;if(is_array($data1)) foreach($data1 AS $r1) { ?>
                     <li class="txt22"><a href="<?php echo $r1['url'];?>"><?php echo $r1['title'];?></a></li>
				<?php $n++;}unset($n); ?>
			  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>	  
			</ul>
          </div>
		  </td>
		  <?php } ?>
		  <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=119dc8d1d86963acd716fc929bebfb09&sql=select+%2A+from+t_category+where+catid%3E11&num=9&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from t_category where catid>11 LIMIT 9");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
			<?php $n=1;if(is_array($data2)) foreach($data2 AS $r2) { ?>
			<?php if($r2[catid]==12 || $r2[catid]==22 || $r2[catid]==23) { ?>
          <td align="left" valign="top" style="padding-top:5px;">
		  <div id="footerListLi">
              <ul id="txt1">
			  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=02126356e0df1ee9760aa732a1ef2261&action=lists&catid=%24r2%5Bcatid%5D&num=5&siteid=%24siteid&return=data11\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data11 = $content_tag->lists(array('catid'=>$r2[catid],'siteid'=>$siteid,'limit'=>'5',));}?>
				<?php $n=1;if(is_array($data11)) foreach($data11 AS $r11) { ?>
                     <li class="txt22"><a href="<?php echo $r11['url'];?>"><?php echo $r11['title'];?></a></li>
				<?php $n++;}unset($n); ?>
			  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>	  
			</ul>
          </div>
		  </td>
		  <?php } ?>
		  <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
         
          </tr>
    </table>
	</div>
        	<div class="layout footer-mod">
        	<center> 
	            <div class="footer-link tc">
	               
	            </div>
			</center> 
			<?php $_sinfo=siteinfo(1);?>
	            <p class="tc" style="font:12px/1.5 Tahoma, Arial, sans-serif, microsoft yahei; color:#333;"><?php echo $_sinfo['copyright'];?> </p>
				
            </div>
         </footer>   
       
		
 
 
<link rel="stylesheet" href="<?php echo CSS_PATH;?>core.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo JS_PATH;?>XYTipsWindow-3.0.js"></script>
<script type="text/javascript"> 
 
 
function dialog_iframe(boxId,title,url){
 		Util.Dialog({
 		boxID: boxId,
 		fixed: true,
		title : title,
		content : "iframe:"+url,
		showbg: true,
		border: {opacity: "0", radius: "3"}
	});
}
function dialog_confirm(title,content,url){
    Util.Dialog({
		fixed: true,showbg: true,title : title,
		content: "text:<center style='line-height:25px;padding:15px 60px 15px 60px'>"+content+"</center>",
		button: ["确定","取消"],
		callback: function(){
		   f.action=url;
		   f.submit();
		}
	});
 
}
function dialog_alert(content){
  Util.Dialog({
        boxID: "dialog-callback-value",
		title: "对话框",
		fixed: true,
		content: "text:<center style='line-height:25px;padding:15px 60px 15px 60px'>"+content+"</center>",
		button: ["确定"],
		callback: function(){
			closeDialog = true; //是否关闭窗口
		}
		
	});
  
}
function loading(){
  Util.Dialog({
			title : "无标题，3秒后关闭",
			boxID : "notitle",
			fixed : true,
			height: 30,
			content : "text:<div style='padding:8px 15px'>载入中……</div>",
			showtitle : "remove",
			time : 10000,
			border : {opacity:"0"},
			bordercolor : "#666"
		});
}
function success(msg){
 	Util.Dialog({
			title : "无标题，3秒后关闭",
			boxID : "notitle",
			fixed: true,
			content : "text:<div style=\"background:url(<?php echo IMG_PATH;?>tick_48.png) #c3e4fd no-repeat 20px 50%;height:60px;line-height:51px;padding-left:80px;padding-right:60px; \"><b>"+msg+"</b></d",
			showtitle : "remove",
			time : 2000,
			border : {opacity:"-2"}
		});
		
}
 
</script>
 
  
 
        <!--E 底部-->        
    </div><!--E .wrap-->  
    <!--S 快捷菜单-->
    
<div class="quick-mod" style="display:none">
      <div class="quick-cont clearfix">
        <h3 class="fl">快捷菜单：</h3>
        <ul class="fl">
          <li><a href="packs" title="我的包裹">我的包裹</a></li>
          <li><a href="order_packs" title="提交订单">提交订单</a></li>
          <li><a href="support_packs" title="提交增值服务">提交增值服务</a></li>
          <li><a href="/index.php?m=pay&c=deposit&a=pay" title="充值">充值</a></li>
          <li><a href="/index.php?m=address&c=index&a=init" title="地址簿">地址簿</a></li>
          <li><a href="/index.php?m=yuyue&c=index&a=add" title="预约取件">预约取件</a></li>
		  <li><a href="/index.php?m=yuyue&c=index&a=init" title="我的预约记录">我的预约记录</a></li>
        </ul>
      </div>
    </div>
    <!--E 快捷菜单-->
</body>
</html>
<script> 
   function show_tips(id) {
		Util.Dialog({
			type: "tips",
			boxID: "Tip_tips_t",
			referID: id,
			width: 250,
			height: 135,
			border: { opacity: "0", radius: "3"},
			closestyle: "orange",
			arrow: "bottom",
			fixed: false,
			arrowset: {val: "10px"},
			content: "text:<p style='color:#C72015;line-height:22px'>&nbsp;&nbsp;&nbsp;&nbsp;地址后面出现的#A38850是客户识别码的一种，当您没有正确填写5位英文字母识别码时，我们同样可以根据地址上的#A38850进行入库（该识别码是每个客户唯一的），如果在网站下单的时候会因为填写#A38850导致地址错误，那么请把#A38850去掉。</p>",
			position: { 
				left: "0", 
				bottom: "0",
				lin: true,
				bin: false
			}
		});
	};
</script>
