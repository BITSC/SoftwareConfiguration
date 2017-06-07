/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function () {

    $("#confirmResearchPlus").click(function () {

        name=$("#name").val();
        startTime=$("#dtp_input1").val();
        endTime=$("#dtp_input2").val();


        if(name==null || name==""){
            alert("请输入调查期名称");
            return;
        }
        if(startTime==null || startTime==undefined || startTime=="" ||
            endTime==null || endTime==undefined || endTime==""){
            alert('请输入起始和结束时间');
            return;
        }

        $.post(URL+"addResearch",{name:name,startTime:startTime,endTime:endTime}, function (data) {

            if(data.status==1){
                window.location.reload();
            }

        })
    })
})