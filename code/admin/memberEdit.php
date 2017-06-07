<!doctype html>
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
    <script src="../js/plugins/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/detail.css">
    <script src="../js/detail.js"></script>
    <script src="../js/memberEdit.js"></script>
    <title>角色修改</title>
</head>
<body>
<?php
require "sql.php";

$sql="SELECT * from member where id='".$_GET["id"]."'";
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
        <h3>角色修改</h3>
    </span>

    <!--分割线-->
    <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

    <table class="table table-striped table-hover " id="detailTable">
        <thead>
        <tr>
            <div class="container">
                <div class="row">
                    <th class="col-md-2">项目</th>
                    <th class="col-md-2">权限</th>
                </div>
            </div>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                角色名称
            </td>
            <td>
                <input type="text" class="form-control" id="memberName" value="<?php echo $row["description"]; ?>">
            </td>
        </tr>
        <tr>
            <td>
                报表管理权限
            </td>
            <td>
                <select class="form-control" name="name" id="excel">
                    <?php
                    if($row["excelAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                企业管理权限
            </td>
            <td>
                <select class="form-control" name="name" id="view">
                    <?php
                    if($row["viewAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                数据分析权限
            </td>
            <td>
                <select class="form-control" name="name" id="analyze">
                    <?php
                    if($row["analyzeAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                通知权限
            </td>
            <td>
                <select class="form-control" name="name" id="notice">
                    <?php
                    if($row["noticeAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                用户管理权限
            </td>
            <td>
                <select class="form-control" name="name" id="user">
                    <?php
                    if($row["userAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                系统管理权限
            </td>
            <td>
                <select class="form-control" name="name" id="system">
                    <?php
                    if($row["systemAbility"]==0){
                        echo '<option value="0" selected="">无</option>';
                        echo '<option value="1">有</option>';
                    }
                    else{
                        echo '<option value="0">无</option>';
                        echo '<option value="1"  selected="">有</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-primary center-block" id="confirmEdit">确认修改</button>
            </td>
            <td>
                <a href="memberManage.php">
                    <button class="btn btn-default center-block">返回</button>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>