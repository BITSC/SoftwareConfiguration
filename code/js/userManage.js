/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function(){


    $("#search").click(function(){
        key=$("#key").val();
        window.location.href="userManage.php?key="+key;
    });

    $("#key").keydown(function(e){
        var curKey = e.which;
        if(curKey == 13){
            $("#search").click();
            return false;
        }
    });

    //确认提交增加用户
    $("#confirmUserPlus").click(function () {
        userName=$("#userName").val();
        password=$("#password").val();
        privilege=$("#privilege").val();
        area=$("#area").val();
        entName=$("#ent_name").val();

        if(userName==null || userName==""){
            alert("请输入用户名");
            return;
        }

        if(password==null || password==""){
            alert("请输入密码");
            return;
        }
        if(privilege==null || privilege<=0){
            alert("请输入用户类型");
            return;
        }

        if(area==null || area<=0){
            alert("请输入用户所在地区");
            return;
        }

        if(privilege==1 && ((entName==null || entName<=0))){
            alert("请输入企业用户的企业名称");
            return;
        }

        $.post(URL+"addNewUser",{name:userName,password:password,privilege:privilege,
            area:area,entname:entName},function(data){

            if(data.status==1){
                alert("添加成功");
                window.location.reload();
            }
            else if(data.status==-1){
                alert("用户名已存在");
            }
            else if(data.status==2){
                alert("该市已经存在管理员，不能重复添加");
            }
        })
    });

});

//删除用户
function deleteUser(obj){
    id=$(obj).parent("td").siblings().eq(0).text();

    var r=confirm("确认删除用户？");
    if(!r) return ;

    $.post("../inf/deleteUser.php",{id:id},function(data){

        if(data==0){
            alert("该用户尚有调查期");
        }
        else if(data==1){
            alert("删除成功");
            window.location.reload();
        }

    })
}