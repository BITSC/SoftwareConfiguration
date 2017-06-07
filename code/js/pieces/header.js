/**
 * Created by 张伟 on 2016-03-15.
 */

function logout(){
    $.ajax({
        type:"POST",  //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。
        url:"../inf/logout_submit.php",  //当前页地址。发送请求的地址。
        data:"",
        //发送到服务器的数据。将自动转换为请求字符串格式。
        success:function(data){//请求成功后的回调函
            window.location.href="../login.php";
        },

        async:true,   //true为异步请求，false为同步请求
        error:function(){
            alert("请求失败");
        }
    });
}