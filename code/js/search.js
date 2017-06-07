/**
 * Created by 高凯辉 on 2017-05-26.
 */

$(document).ready(function(){

    //$("#header").load("../pieces/header.php");

    $("#footer").load("../pieces/footer.html");


    $("#search").click(function(){
        key=$("#key").val();
        window.location.href="search.php?key="+key;
    });

    $("#key").keydown(function(e){
        var curKey = e.which;
        if(curKey == 13){
            $("#search").click();
            return false;
        }
    });
    ////初始化显示
    //$('#searchTable').DataTable({
    //    info: false,
    //    lengthChange: false,
    //    pageLength:10
    //});

    //$("#searchTable_filter label").html("<label>搜索结果过滤:"+'<input type="search" class="form-control input-sm"' +
    //    ' placeholder="" aria-controls="searchTable"></label>');
})