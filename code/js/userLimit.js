/**
 * Created by 高凯辉 on 2017-05-26.
 */

var last;
$(document).ready(function () {

    last=$("#privilege").val();

})


function changeMember(obj){

    id=$_GET["id"];

    var r=confirm("确认修改用户权限？");
    if(!r){
        window.location.reload();
        return;
    }

    $.post(URL+"editPrivilege",{id:id,privilege:$(obj).val()},function(data){

        if(data.status==1){
            window.location.href="userManage.php";
        }
    })
}