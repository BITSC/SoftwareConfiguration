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

    <script src="../js/toXLS/excellentexport.js"></script>


    <!--[if IE]>
    <script src="../js/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../css/detail.css">
    <script src="../js/detail.js"></script>
    <title>企业详细信息</title>
</head>
<body>
<?php
    require "sql.php";

    $sql="SELECT * from entinfo where id='".$_GET["id"]."'";
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
            <h3><?php
            echo $row["namech"];
                ?></h3>
        </span>

        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

        <table class="table table-striped table-hover " id="detailTable">
            <thead>
            <tr>
                <div class="container">
                    <div class="row">
                        <th class="col-md-2">项目</th>
                        <th class="col-md-2">内容</th>
                    </div>
                </div>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    所属地区
                </td>
                <td><?php echo $row["area"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    机构代码
                </td>
                <td><?php echo $row["code"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    企业名称
                </td>
                <td><?php echo $row["namech"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    企业性质
                </td>
                <td><?php echo $row["area"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    所属行业
                </td>
                <td><?php echo $row["industrial"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    主要经营业务
                </td>
                <td><?php echo $row["bus"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    联系人
                </td>
                <td><?php echo $row["contactch"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    联系地址
                </td>
                <td><?php echo $row["contact_addr"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    邮政编码
                </td>
                <td><?php echo $row["zipcode"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    联系电话
                </td>
                <td><?php echo $row["tel"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    传真
                </td>
                <td><?php echo $row["fax"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    EMAIL
                </td>
                <td><?php echo $row["email"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    建档日期
                </td>
                <td><?php echo $row["time"]; ?>
                </td>
            </tr>
            </tbody>

        </table>

        <span class="col-md-6">
            <a download="企业信息.xls" href="#"
               onclick="return ExcellentExport.excel(this, 'detailTable', '列表');">
                <button class="btn btn-primary center-block" style="border-radius: 0px">
                    导出企业信息</button></a>
        </span>
        <span class="col-md-6">
            <a href="manage.php">
                <button class="btn btn-primary center-block" style="border-radius: 0px">返回</button>
            </a>
        </span>




    </div>

    <!--加载页脚-->
    <div id="footer">

    </div>

</body>
</html>