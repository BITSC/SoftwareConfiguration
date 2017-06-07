/**
 * Created by 高凯辉 on 2017-05-26.
 */
var targetId=0;

var editing=false;
var pre=0;

$(document).ready(function(){

    //$("#header").load("../pieces/adminheader.php");
    //
    //$("#footer").load("../pieces/footer.html");

    $("#change").click(function () {
        $('#home').toggle('clip')
    });

    //$("#listTable").DataTable({
    //        //info: false,
    //        //lengthChange: false,
    //        pageLength:3
    //});

    //确认返回修改
    $("#confirmBackEdit").click(function(){
        content=$("#edit-content").val();

        if(content.length<=0){
            alert(targetId+"请填写修改内容");
            return;
        }

        $.post("../inf/list/cityBackEdit.php",{report_id:targetId,content:content},function(data){

            if(data==1){
                window.location.reload();
            }


        })

    });
})

function editTrigger(obj){

    var myDate = new Date();
    $("#entName").text($(obj).children("input.name").val());
    $("#editDate").text(myDate.toLocaleDateString());
    targetId=$(obj).children("input.ids").val()

    $('#edit').modal('toggle');
}

function editInfo(obj){

    if(editing){
        RaiseInform("请先完成当前修改",2);
        return;
    }

    editing=true;

    pre=$(obj).siblings("input").eq(0).val();

    targetObj=$(obj).parent("td").parent("tr").parent("tbody").siblings("tbody").eq(0).children("tr")
        .children("td").eq(1);

    $(targetObj).replaceWith('<td><input class="form-control" type="text" value="'+pre+'"></td>');

    $(obj).replaceWith('<button onclick="commitInfoEdit(this)" class="btn btn-primary center-block"'+
    'style="border-radius: 0px">完成</button>');

}

function commitInfoEdit(obj){

    targetObj=$(obj).parent("td").parent("tr").parent("tbody").siblings("tbody").eq(0).children("tr")
        .children("td").eq(1).children("input");

    targetValue=$(targetObj).val();

    targetValue=parseInt(targetValue);

    if(pre<=0 || targetValue<=0){
        RaiseInform("请输入合理的数字",2);
        return;
    }

    editing=false;

    $(targetObj).replaceWith(targetValue);

    id=$(obj).siblings("input").eq(1).val();

    $.post("../inf/list/editJoblessInfo.php",{new_num:targetValue,pre_num:pre,id:id}, function (data) {

        if(data==1){
            RaiseInform("修改成功",2);
            $(obj).replaceWith('<button onclick="editInfo(this)" class="btn btn-primary center-block"'+
                'style="border-radius: 0px">修改</button>');
            return;
        }
    })

}

//上报
function upload(obj){

    var r=confirm("确定上报？");
    if(!r) return;

    //RaiseInform("上报成功",2);
    action="report";

    $.post(URL + "reportManagement",{id:parseInt(obj),action:action}, function (data) {
        obj=data;

        if(obj.status==1){
            RaiseInform("上报成功",2);
            delayReload();

        }
    })
}

//审核通过
function pass(obj){
    var r=confirm("确认通过？");
    if(!r) return;

    $.post(URL+"reportManagement",{id:parseInt(obj),action:"approval"},function(data){
        obj=data;

        if(obj.status==1){
            RaiseInform("审核通过",2);
            delayReload();
        }
        //

    })
}

function delayReload(){
    setTimeout('window.location.reload()',1000);
}