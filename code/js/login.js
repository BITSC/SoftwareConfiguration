// JavaScript Document
/**
 * Created by 高凯辉 on 2017-05-26.
 */
var type=1;

$(document).ready(function(){

	$("#account").keydown(function(e){
		var curKey = e.which;
		if(curKey == 13){
			loginIt();
			return false;
		}
	});

	$("#password").keydown(function(e){
		var curKey = e.which;
		if(curKey == 13){
			loginIt();
			return false;
		}
	});
})

function change(obj){
	type=$(obj).attr("name");
}

function loginIt(){
	account=$("#account").val();
	password=$("#password").val();

	$.ajax({
		type:"POST",  //默认值: "GET")。请求方式 ("POST" 或 "GET")， 默认为 "GET"。
		url:"inf/login_submit.php",  //当前页地址。发送请求的地址。
		data:"account="+account+"&password="+password+"&type="+type,
		//发送到服务器的数据。将自动转换为请求字符串格式。
		success:function(data){//请求成功后的回调函数
			if(data>0){
				if(data>1){
					$("#wrong").text("密码错误")
				}
				else{
					$("#wrong").text("用户名不存在")
				}
				$("#wrong").slideDown(200);
				setTimeout('$("#wrong").slideUp(200)',1000);
			}
			else{
				$("#wrong").text("登陆成功");
				$("#wrong").attr("class","btn btn-success btn-block");
				$("#wrong").slideDown(200);
				if(type==1) setTimeout('window.location.href="page/edit.php"',250);
				if(type==3  || type==2) setTimeout('window.location.href="admin/list.php?type="+type',250);
			}
		},
		async:true,   //true为异步请求，false为同步请求
		error:function(){
			alert("请求失败");
		}
	});
}