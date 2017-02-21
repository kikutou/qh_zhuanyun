//�����������˵��Լ��绰�����õ��ı�������
var body = $("body"),
    menu = $("#menuCont"),
    winH = $(window).height(),                //���ڸ߶�
    winW = $(window).width(),                 //���ڿ��
    //docH = $("#wx-page").height(),            //��ȡ��ҳ�ĸ߶�
    telArea = $("#js_telArea"),               //�绰�������
    telInner = $("#js_telInner"),             //�绰������Ƕ�׵ĺ���
    telBtn = $("#js_showTelNum"),             //��ʾ�绰���밴ť
    menuBtn = $("#js_showMenu");              //�˵���ʾ��ť

//setTimeout(function () { var docH = $(document).height()-70; menu.css("height", docH + "px") }, 2000);             //��һ��ʼ�ı䵯���˵��ĸ߶ȣ�ʹ������ĵ��ĸ߶�

//��ʾ�˵�����
function showMenu() {
    if (telBtn.attr("isShow") == "true") {
        telBtn.attr("isShow","false");
        hideTelNum();
    }
    menuBtn.attr("isShow", "true");
    $("#js_topHead").animate({
        left: "70%"
    }, 150);
    $("#mainCont").animate({
        left: "70%"
    }, 150);
    menu.animate({
        left: "0"
    }, 150);
}

//���ز˵�����
function hideMenu() {
    menuBtn.attr("isShow", "false");
    $("#js_topHead").animate({
        left: "0"
    }, 150);
    $("#mainCont").animate({
        left: "0"
    }, 150);
    menu.animate({
        left: "-70%"
    }, 150);
}

//��ʾ�绰����
function showTelNum() {
    body.css("overflow-y", "hidden");
    telArea.show(150);
    telInner.css("width",winW - 20 + "px");
}

//���ص绰����
function hideTelNum() {
    body.css("overflow-y", "visible");
    telArea.hide();
    telInner.css({ "width": "0" });
}

//�����¼������ϸı�˵����ĸ߶�
$(window).bind("scroll", function () {
    var scrTop = $(window).scrollTop(), docheight = $(document).height();
    //���������ʱ��������
    if (menuBtn.attr("isShow") == "false") {
        var floatBoxTop = parseInt(scrTop);
        menu.css("height", docheight + "px");
        $("#menuInner").css("top", floatBoxTop + "px");
    }
    else {
        menu.css("height", docheight + "px");
    }
});

//�˵���ʾ�����¼�
menuBtn.bind("click",function () {
    var that = $(this);
    if (that.attr("isShow") == "false") {
        showMenu();
    }
    else {
        hideMenu();
    }
});

//�绰�����б���ʾ�����¼�
telBtn.click(function () {
    var that = $(this);
    if (that.attr("isShow") == "false") {
        that.attr("isShow", "true");
        showTelNum();
    }
    else {
        that.attr("isShow", "false");
        hideTelNum();
    }
});
telArea.click(function () {
    telBtn.attr("isShow", "false");
    hideTelNum();
});

//ͷ��ͼƬ����
var pos = document.getElementById('position');
if (pos != null) {
    var bullets = pos.getElementsByTagName('span');
    var slider = new Swipe(document.getElementById('slider'), {
        startSlide: 0,
        speed: 500,
        auto: 4000,
        callback: function (event, pos) {
            var i = bullets.length;
            while (i--) {
                bullets[i].className = ' ';
            }
            bullets[pos].className = 'on';
        }
    });

}


