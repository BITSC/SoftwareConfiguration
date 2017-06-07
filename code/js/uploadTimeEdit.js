/**
 * Created by 高凯辉 on 2017-05-26.
 */
$(document).ready(function () {

    id=$_GET["id"];

    $("#editTimeLimit").click(function () {

        startTime=$("#dtp_input1").val();
        endTime=$("#dtp_input2").val();

        if(startTime==null || startTime==undefined || startTime=="" ||
            endTime==null || endTime==undefined || endTime==""){
            alert('请输入起始和结束时间');
            return;
        }

        $.post(URL+"editResearch",{id:id,startTime:startTime,endTime:endTime},function(data){

            if(data.status==1){
                window.location.href="uploadTimeLimit.php";
            }
        })
    })
})