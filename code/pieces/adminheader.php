


<!--定义了省用户页面所有的页头信息-->
<!--引用adminheader.html即可完成初始化-->
<?php session_start();
require "../inf/limitHelper.php";
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 使用Bootstrap必须按照这样引用3个meta-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/plugins/bootstrap.min.js"></script>
    <link href="../css/pieces/header.css" rel="stylesheet" type="text/css">
    <script src="../js/pieces/header.js" type="text/javascript"></script>

    <!--[if IE]>
    <script src="../js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body style="padding: 0px">
<?php
require "../admin/sql.php";
if(!isset($_SESSION["id"])){
    echo "<script language='javascript'>";
    echo "window.location.href='../login.php'";
    echo "</script>";
} ?>
<div class="" style="position:fixed;display: table;top: 0px;width:100%;height: 60px;
background-color: #eeeeee;z-index: 999">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="container-fluid li-wrapper" style="display: table-cell;vertical-align: middle">
            <?php
            $offset=0;
            if(getExcel()>0){
                ?><a href="../admin/list.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1 col-md-offset-2">报表管理</span></a><?php
            }

            if(getView()>0){
                ?>
                <a href="../admin/manage.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1">企业管理</span></a>
                <?php
            }

            if(getAnalyze()>0){
                ?>
                <a href="../admin/analyze.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1">数据分析</span></a>
                <?php
            }

            if(getNotice()>0){
                ?>
                <a href="../admin/informs.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1">通知管理</span></a>
                <?php
            }

            if(getUser()>0){
                ?>
                <a href="../admin/userManage.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1">用户管理</span></a>
                <?php
            }
            else{
                $offset++;
            }

            if(getSystem()>0){
                ?>
                <a href="../admin/system.php" style="color:#333333;text-decoration: none">
                    <span class="col-md-1">系统管理</span></a>
                <?php
            }
            else{
                $offset++;
            }
            ?>
            <span class="col-md-2 col-md-offset-<?php echo $offset; ?>">
                <?php echo $_SESSION["name"]; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
                <span onclick="logout()">注销</span></span>
        </div>
</div>
<div class="container-fluid bg-wrapper" style="width: 100%;
    height: 150px;
    margin-top: 60px;
    background-image: url(../img/bg.png);
    background-size: 100% 150px">

    <div class="col-md-offset-2">

        <span class="col-md-1" style="margin-top: 30px">
            <img src="../img/logo.png" alt="logo">
        </span>
        <span class="col-md-6" style="margin-top: 10px;margin-left: 10px">
            <h1>山东省人力资源市场</h1>
            <span style="font-size: 16px">数据采集系统</span>
        </span>
    </div>

</div>
</body>
</html>
