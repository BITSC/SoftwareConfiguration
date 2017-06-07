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
    <script src="../js/plugins/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../css/edit.css">
    <script src="../js/edit.js"></script>
    <title>企业信息修改</title>
</head>
<body>


    <!-- 提示框 -->
    <div class="inform-box">
        <span class="inform-txt center-block"></span>
    </div>

    <?php
    require "../admin/sql.php";

    $sql="select * from entinfo where admin_id='".$_SESSION["id"]."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    ?>
    <!--页面导航栏-->
    <div id="header">
        <?php
        require "../pieces/header.php";
        ?>
    </div>

    <!--填写信息-->
    <div class="col-md-offset-2 col-md-8 add-wrapper">
        <span class="container-fluid ">
            <h3>企业信息修改</h3>
        </span>

        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

        <table class="table table-striped order-table table-hover ">
            <thead>
            <tr>
                <div class="container">
                    <div class="row">
                        <th class="col-md-2">填写项目</th>
                        <th class="col-md-2">填写内容</th>
                        <th class="col-md-2"></th>
                    </div>
                </div>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    所属地区
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="area" value="<?php

                    $citysql="select * from city where id='".$row["area"]."'";
                    $cityresult=mysql_query($citysql);
                    $cityrow=mysql_fetch_array($cityresult);

                    echo $cityrow["name"] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    组织机构代码
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="code" value="<?php echo $row["code"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    企业名称
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="namech" value="<?php echo $row["namech"] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    企业性质
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="nature" value="<?php echo $row["nature"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    所属行业
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="industrial" value="<?php echo $row["industrial"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    主要经营业务
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="bus" value="<?php echo $row["bus"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    联系人
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="contactch" value="<?php echo $row["contactch"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    联系地址
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="contact_addr" value="<?php echo $row["contact_addr"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    邮政编码
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" onkeyup="validateInt(this)" id="zipcode" value="<?php echo $row["zipcode"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    联系电话
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="tel" value="<?php echo $row["tel"] ?>" placeholder="请输入11位手机号...">
                </td>
            </tr>
            <tr>
                <td>
                    传真
                </td>
                <td colspan="2">
                    <input type="text" class="form-control" id="fax" value="<?php echo $row["fax"] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    EMAIL
                </td>
                <td colspan="2">
                    <input type="email" class="form-control" onkeyup="validateEmail(this)" id="email" value="<?php echo $row["email"] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="btn btn-primary center-block"  id="confirm-edit-info" style="border-radius: 0px">确认修改</button>
                </td>
            </tr>

            </tbody>


        </table>

    </div>

    <!--加载页脚-->
    <div id="footer">

    </div>
</body>
</html>