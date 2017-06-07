/**
 * Created by 高凯辉 on 2017-05-26.
 */
$(document).ready(function(){

    //$("#header").load("../pieces/adminheader.php");

    $("#footer").load("../pieces/footer.html");

    var trs=$("#ents");

    $("#search").click(function(){
        key=$("#key").val();
        startDate=$("#dtp_input1").val();
        endDate=$("#dtp_input2").val();
        window.location.href="manage.php?key="+key+"&startDate="+startDate+"&endDate="+endDate;
    });

    $("#key").keydown(function(e){
        var curKey = e.which;
        if(curKey == 13){
            $("#search").click();
            return false;
        }
    });

    //初始化显示
    //$('#searchTable').DataTable({
    //    info: false,
    //    lengthChange: false,
    //    pageLength:10
    //});

    //onClick ="$('#magnageTable').tableExport({type:'pdf',escape:'true'});"
    //$("#magnageTable").tableExport({type:'xls',escape:'false'});
});

function viewDetail(obj){

    var input=$(obj).children("td").eq(0).children("input").val();

    window.location.href="detail.php?id="+input;
}