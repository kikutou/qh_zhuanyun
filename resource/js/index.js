 //��ҳJS
  
function tabb(a,b)
{
	$("#tab"+b+"").css("display","none");  //���ص�ID
	$("#tab1_"+b+"").removeClass("title2_tabon");
	
 	$("#tab1_"+b+"").css("background","");
 	$("#tab"+a+"").css("display","block"); //��ʾ��
 	$("#tab1_" + a + "").css("background", "url(http://img.zto.cn/images/tb_on.png) repeat-x"); //�任CSS
	$("#tab1_"+a+"").addClass("title2_tabon");
}
