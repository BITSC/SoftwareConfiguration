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
    <script src="../js/uploadTimeEdit.js"></script>
    <title>上报时限修改</title>
</head>
<body>
<?php
require "sql.php";

$sql="SELECT * from research where id='".$_GET["id"]."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
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
        <h3>上报时限修改</h3>
    </span>

    <span class="container-fluid ">
        <h4><?php echo $row["name"]; ?></h4>
    </span>

    <!--分割线-->
    <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

    <div class="container-fluid" style="height: 300px;">

        <div class="col-md-6" id="date-wrapper">
        <div class="input-group date form_date" data-date=""
             data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" placeholder="开始日期" type="text" value="" style="cursor:pointer" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input1" value="" />
        </div>

        <div class="col-md-6" id="date-wrapper">
        <div class="input-group date form_date" data-date=""
             data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" size="16" placeholder="结束日期" type="text" value="" style="cursor:pointer" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" />
        </div>

        <div class="col-md-12" style="display: table;margin-top: 20px">
        <span style="display: table-cell;">
            <button class="btn btn-primary center-block" id="editTimeLimit">确认</button>
            </span>
        <span style="display: table-cell;">
        <a href="uploadTimeLimit.php">
            <button class="btn btn-default center-block">返回</button>
        </a>
            </span>
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
    #date-wrapper div{
        margin: 10px;
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
</script>
</html>