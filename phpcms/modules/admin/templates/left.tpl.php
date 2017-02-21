<?php
defined('IN_ADMIN') or exit('No permission resources.');
$checkhash = $_SESSION['checkhash'];
foreach($datas as $_value) {


	//TODO 过滤掉多余的左边栏
	//TODO fixed by kiku 2016/06/07
	/*
	$blackList = array('会员模型管理');
	if(in_array(L($_value['name']), $blackList)){
		continue;
	}
	*/


	echo '<h3 class="f14"><span class="switchs cu on" title="'.L('expand_or_contract').'"></span>'.L($_value['name']).'</h3>';
	echo '<ul>';
	$sub_array = admin::admin_menu($_value['id']);
	foreach($sub_array as $_key=>$_m) {

		//TODO 过滤掉多余的左边栏
		//TODO fixed by kiku 2016/06/07
		/*
		$blackList = array('手机版设置','站点管理','基本设置','安全配置','APP配置','connect','字典管理','支付方式管理');
		if(in_array(L(L($_m['name'])), $blackList)){
			continue;
		}
		*/


		//附加参数
		$data = $_m['data'] ? '&'.$_m['data'] : '';
		if($menuid == 5) { //左侧菜单不显示选中状态
			$classname = 'class="sub_menu"';
		} else {
			$classname = 'class="sub_menu"';
		}
		echo '<li id="_MP'.$_m['id'].'" '.$classname.'><a href="javascript:_MP('.$_m['id'].',\'?m='.$_m['m'].'&c='.$_m['c'].'&a='.$_m['a'].$data.'\');" hidefocus="true" style="outline:none;">'.L($_m['name']).'</a></li>';
	}
	echo '</ul>';
}
?>
<script type="text/javascript">
$(".switchs").each(function(i){
	var ul = $(this).parent().next();
	$(this).click(
	function(){
		if(ul.is(':visible')){
			ul.hide();
			$(this).removeClass('on');
				}else{
			ul.show();
			$(this).addClass('on');
		}
	})
});
</script>