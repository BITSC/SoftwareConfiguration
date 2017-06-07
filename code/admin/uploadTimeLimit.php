<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 使用Bootstrap必须按照这样引用3个meta-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="shortcut icon" href="../img/s-logo.png">
    <script src="../js/plugins/jquery-2.0.0.min.js"></script>
    <script src="../js/basic.js"></script>

    <script src="../js/plugins/bootstrap-datetimepicker.js"></script>
    <script src="../js/plugins/bootstrap-datetimepicker.zh-CN.js"></script>

    <link rel="stylesheet" href="../css/detail.css">
    <script src="../js/detail.js"></script>
    <script src="../js/uploadTimeLimit.js"></script>
    <title>上报时限管理</title>
</head>
<body>
<?php
require "sql.php";

$sql="SELECT * from research";
$result=mysql_query($sql);
?>
<!--页面导航栏-->
<div id="header">
    <?php
    require "../pieces/adminheader.php";
    ?>
</div>

<!--填写信息-->
<div class="col-md-offset-2 col-md-8 add-wrapper">
    <span class="container-fluid ">
        <h3>上报时限</h3>
    </span>

    <!--分割线-->
    <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

    <table class="table table-striped table-hover " id="detailTable">
        <thead>
        <tr>
            <div class="container">
                <div class="row">
                    <th class="col-md-2">调查名称</th>
                    <th class="col-md-2">调查开始日期</th>
                    <th class="col-md-2">调查结束日期</th>
                    <th class="col-md-2">操作</th>
                </div>
            </div>
        </tr>
        </thead>
        <?php
        while($row=mysql_fetch_array($result)){

            echo '<tr>'.
                '<td>'.$row["name"].'</td>'.
                '<td>'.$row["startTime"].'</td>'.
                '<td>'.$row["endTime"].'</td>';

            if($row["disabled"]=="0") {
                echo
                    '<td><a href="uploadTimeEdit.php?id=' . $row["id"] . '"><button class="btn btn-primary">操作</button></a></td>' .
                    '</tr>';
            }
            else {
                echo
                "<td></td></tr>";
            }
        }
        ?>
        <tbody>
        </tbody>
    </table>

    <button class="btn btn-primary" onclick="showAdd()" data-toggle="modal" data-target="#plus">
        <span class="glyphicon glyphicon-plus" ></span>新增调查期</button>



    <!--添加用户模态框-->
    <div class="modal fade" id="plus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">添加调查期</h4>
                </div>
                <div class="modal-body">

                    <div style="margin-top: 10px;" id="add-table">

                        <div>
                            <input type="text" class="form-control" id="name" placeholder="调查期名称">
                        </div>

                        <div class="input-group date form_date" data-date=""
                             data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="16" placeholder="开始日期" type="text" value="" style="cursor:pointer" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" />

                        <div class="input-group date form_date" data-date=""
                             data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="16" placeholder="结束日期" type="text" value="" style="cursor:pointer" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirmResearchPlus">确认</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--加载页脚-->
<div id="footer">
    <?php
    require "../pieces/footer.html";
    ?>
</div>


</body>
<style>
    #add-table div{
        margin: 5px;
    }
</style>
<script>
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 0,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
    function showAdd(){
        $("#add-table").css("opacity","1");
    }
</script>
</html>