/**
 * Created by 高凯辉 on 2017-05-26.
 */

var IP = "";//"http://10.4.20.25:8081"
var URL = "http://139.129.27.123:8001/HumanResourcesSystem/index.php/";

//param to represent interface 
var inf;
//param to store the percentage of loaded file

//Replace $.post with an encapsulation of $.ajax
$.post = function (a, b, c) {
    $.ajax({
        url: a,
        type: 'POST',
        data: typeof (b) == 'object' ? b : {},
        cache: false,
        traditional: true,
        dataType:"json",
        success: typeof (b) == 'function' ? b :
				typeof (c) == 'function' ? c : function () { },
        error:function(){
        	alert("请求失败");
        }
    });
};


/**
 * 显示提示信息
 * @param str 要输出的串
 * @param type 输出面板的长宽
 */

function RaiseInform(str,type,length){
    if(length==undefined) length=1000;
    else length=2000;
    $(".inform-box").css("width", SetToastWidth(type));
    $(".inform-txt").text(str);
    $(".inform-box" ).toggle("puff");
    setTimeout(function() {
        $(".inform-box" ).toggle( "puff");
    }, length);
}

//设置Toast宽度
function SetToastWidth(type){
    //type会对应长度
    //默认1
    if(type==1) return "120px";
    else if(type==2) return "240px";
    else if(type==3) return "360px";
}

//模仿PHP中的get函数
$_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();