/**
 * Created by 张伟 on 2016-03-15.
 */

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