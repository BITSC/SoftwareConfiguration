/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function () {

    $("#confirmUserPlus").click(function () {

        memberName=$("#memberName").val();
        excel=$("#excel").val();
        view=$("#view").val();
        analyze=$("#analyze").val();
        notice=$("#notice").val();
        system=$("#system").val();
        user=$("#user").val();

        if(memberName==null ||memberName==""){
            alert("请输入角色名称");
            return;
        }

        $.post("../inf/createMember.php",{memberName:memberName,excel:excel,view:view,
            analyze:analyze,notice:notice,system:system,user:user}, function (data) {
            if(data==1){
                alert("添加角色成功");
                window.location.reload();
            }
        })

    })

})

function deleteMember(obj){
    id=$(obj).parent("td").siblings().eq(0).children("input").val();

    var r=confirm("确认删除角色？");
    if(!r) return;

    $.post("../inf/deleteMember.php",{id:id}, function (data) {

        if(data==1){
            window.location.reload();
        }
    })
}