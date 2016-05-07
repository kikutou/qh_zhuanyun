<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><link rel="stylesheet" type="text/css" href="/resource/wap/css/font-awesome.css" />
<style>
.top_bar{
    position:fixed;
    width:100%;
    left:0;
    top:0;
    z-index:100;
}
.top_bar+*{
    padding-top:35px;
}
.top_menu{
    display:-webkit-box;
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#89C5DB), to(#6276A0));
}

.top_bar .top_menu>li{
    -webkit-box-flex:1;
    height:35px;
    background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(255,255,255,0.1)),color-stop(50%,rgba(255,255,255,0.8)), to(rgba(255,255,255,0.1)));
    -webkit-background-size:1px 80%;
    background-size:1px 80%;
    background-position: right center;
    background-repeat: no-repeat;
    position:relative;
    text-align:center;
}
.top_menu>li:last-of-type{background:none;}
.top_menu>li span{
    display:inline-block;
    height:100%;
    width:25px;
    margin:auto;
    font-size:24px;
    color:#fff;
    line-height:35px;
   
}
.top_menu>li span.i_back{
    background-position:0 5px;
}
.top_menu>li span.i_home{
    background-position:-33px 5px;
}
.top_menu>li span.i_tel{
    background-position:-65px 5px;
}
.top_menu>li span.i_menu{
    background-position:-95px 5px;
}

.menu_font{
    text-align:left;
    position:absolute;
    top:35px;
    right:10px;
    z-index:500;
}
.menu_font.hidden{
    display:none;
}
</style>
<link rel="stylesheet" type="text/css" href="/resource/wap/css/home-menu.css" />

	<div class="top_bar footer_bar" style="-webkit-transform:translate3d(0,0,0);">
			<nav>
				<ul class="top_menu" style="font-family:none;">
					<li><a href="<?php echo WAP_SITEURL;?>"><span class="icon-home"></span><label class="homemenu_text">首页</label></a></li>
					<li>
					<?php $sinfo=siteinfo(1);?>

					<?php $allqq=explode(',',trim($sinfo[qqno]));?>
					<?php $k=1;?>
					<?php $n=1;if(is_array($allqq)) foreach($allqq AS $q) { ?>
					<?php if($k=1) { ?>
					<?php $arrq=explode('|',$q);?>
					<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $arrq['0'];?>&amp;site=qq&amp;menu=yes" ><span style=" display:inline-block;width:1px;margin:auto;font-size:24px;line-height:35px;height:25px;"></span><label class="homemenu_text">QQ客服</label></a>
					<?php $k++;?>
					
					<?php $n++;}unset($n); ?><?php } ?>
					</li>
					<li><a ><span style=" display:inline-block;width:1px;margin:auto;font-size:24px;line-height:35px;height:25px;"></span><label class="homemenu_text"><?php if(param::get_cookie('_userid')) { ?><?php echo param::get_cookie('_username');?>(<?php echo param::get_cookie('_userid');?>) <a href="<?php echo APP_PATH;?>index.php?m=member&c=ajax_index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" style="color:#fff">[退出]</a><?php } else { ?><label onclick="window.location.href='<?php echo $this->__all__urls[1]['login'];?>';" style="cursor:pointer">登录</label> | <label onclick="window.location.href='<?php echo $this->__all__urls[1]['register'];?>';" style="cursor:pointer">注册</label><?php } ?></label></a></li>
				</ul>
			</nav>
		</div>
	
		<footer style="display:none;">
				<div class="weimob-copyright" style="padding-bottom:35px;" align=center>
						<?php echo date("Y");?>	版权所有 (C) 	<?php echo $WAP['sitename'];?>		
				</div>
		</footer>	