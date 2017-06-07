/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function () {

    id=$_GET["id"];

    $("#confirmEdit").click(function () {

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

        $.post("../inf/editMember.php",{id:id,memberName:memberName,excel:excel,view:view,
            analyze:analyze,notice:notice,system:system,user:user}, function (data) {
            if(data==1){
                alert("修改角色成功");
                window.location.href="memberManage.php";
            }
        })

    })

})