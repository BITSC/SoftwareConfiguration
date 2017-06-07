<!doctype html>
<?php session_start(); ?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 使用Bootstrap必须按照这样引用3个meta-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="shortcut icon" href="../img/s-logo.png">
    <script src="../js/plugins/jquery-2.0.0.min.js"></script>
    <script src="../js/basic.js"></script>
    <script src="../js/plugins/jquery-ui.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../css/add.css">
    <script src="../js/add.js"></script>
    <title>通知管理</title>
</head>
<body>

<?php
require "../admin/sql.php";

$sql="select notice.id,notice.title,notice.content,notice.time,user.name ".
    " from user,notice where user.id=notice.send_id and notice.receive_id='".$_SESSION["id"]."'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
<!--页面导航栏-->
<div id="header">
    <?php
    require "../pieces/header.php";
    ?>
</div>

<!--填写信息-->
<div class="col-md-offset-2 col-md-8 add-wrapper" style="min-height: 600px;;">
        <span class="container-fluid ">
            <h3>通知管理</h3>
        </span>

    <hr style="border: 1px solid #666666;border-left: none;border-right: none" />




    <!--表格-->
    <table class="table table-striped table-hover " id="magnageTable">
        <thead>
        <tr>
            <div class="container">
                <div class="row row-title">
                    <th class="col-md-2" style="font-size: 12px;">通知编号</th>
                    <th class="col-md-2" style="font-size: 12px;">通知标题</th>
                    <th class="col-md-2" style="font-size: 12px;">通知内容</th>
                    <th class="col-md-2" style="font-size: 12px;">通知时间</th>
                    <th class="col-md-2" style="font-size: 12px;">发布单位</th>
                </div>
            </div>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row=mysql_fetch_array($result)){
            echo '<tr>'.
                '<td>'.$row["id"].'</td>'.
                '<td>'.$row["title"].'</td>'.
                '<td>'.$row["content"].'</td>'.
                '<td>'.$row["time"].'</td>'.
                '<td>'.$row["name"].'</td>'.
                '</tr>';
        }

        if($count<=0){
            ?>
            <tr>
                <td colspan="5"><center>暂时没有通知</center></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>

<div id="footer">

</div>

</body>
</html>