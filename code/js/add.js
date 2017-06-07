/**
 * Created by 高凯辉 on 2017-05-26.
 */

var type=1;

$(document).ready(function(){

    //$("#header").load("../pieces/header.php");

    $("#footer").load("../pieces/footer.html");

    /**
     * 修改被退回的通知
     */
    $("#confirm-edit-up").click(function () {

        //该id调查期报告的被退回
        id=$("#back-edit-id").val();
        //出现错误，通知的id
        //提交修改之后，这个id的通知将被删除
        backedit_id=$("#back-edit-notice-id").val();

        //需要修改的调查期信息
        first_num=$("#first_num").val();
        now_num=$("#now_num").val();
        reduce_type=$("#reduce_type").val();
        reason1=$("#reason1").val();
        reason1info=$("#reason1info").val();
        reason2=$("#reason2").val();
        reason2info=$("#reason2info").val();
        reason3=$("#reason3").val();
        reason3info=$("#reason3").val();
        reason0=$("#reason0").val();

        if(first_num==null || first_num=="" ||
            now_num==null || now_num=="" ||
            reduce_type==null || reduce_type=="" ||
            reason1==null || reason1=="" ||
            reason1info==null || reason1info=="" ||
            reason2==null || reason2=="" ||
            reason2info==null || reason2info=="" ||
            reason3==null || reason3=="" ||
            reason3info==null || reason3info=="" ||
            reason0==null || reason0==""
        ){
            alert("不能有任何一项输入为空");
            return;
        }

        $.post("../inf/company/report_info_edit.php",{
            id:id,backedit_id:backedit_id,
            first_num:first_num,now_num:now_num,
            reduce_type:reduce_type,
            reason1:reason1,reason1info:reason1info,
            reason2:reason2,reason2info:reason2info,
            reason3:reason3,reason3info:reason3info,
            reason0:reason0
        }, function (data) {
            if(data==1){
                alert("修改上报成功");
                window.location.reload();
            }
        });
    });

    //添加调查期
    $("#confirm-plus").click(function () {

        research_id=type;

        //需要填写的调查期信息
        first_num=$("#first_num").val();
        now_num=$("#now_num").val();
        reduce_type=$("#reduce_type").val();
        reason1=$("#reason1").val();
        reason1info=$("#reason1info").val();
        reason2=$("#reason2").val();
        reason2info=$("#reason2info").val();
        reason3=$("#reason3").val();
        reason3info=$("#reason3").val();
        reason0=$("#reason0").val();

        if(first_num==null || first_num=="" ||
            now_num==null || now_num=="" ||
            reduce_type==null || reduce_type=="" ||
            reason1==null || reason1=="" ||
            reason1info==null || reason1info=="" ||
            reason2==null || reason2=="" ||
            reason2info==null || reason2info=="" ||
            reason3==null || reason3=="" ||
            reason3info==null || reason3info=="" ||
            reason0==null || reason0==""
        ){
            alert("不能有任何一项输入为空");
            return;
        }

        $.post("../inf/company/report_info_plus.php",{
            research_id:research_id,
            first_num:first_num,now_num:now_num,
            reduce_type:reduce_type,
            reason1:reason1,reason1info:reason1info,
            reason2:reason2,reason2info:reason2info,
            reason3:reason3,reason3info:reason3info,
            reason0:reason0
        }, function (data) {
            if(data==1){
                alert("上报成功");
                window.location.reload();
            }
        });
    })
});

function testNum(o) {

    first_num=$("#first_num").val();
    now_num=$("#now_num").val();

    if(parseInt(first_num) <= parseInt(now_num)){

        $(".addition").attr("disabled","true");
    }
    else{

        $(".addition").attr("disabled",false);
    }
}

function Disable(){

}
//
///**
// * 修改当前填写的调查期
// * @param obj
// */
//function change(obj){
//    type=$(obj).attr("name");
//}