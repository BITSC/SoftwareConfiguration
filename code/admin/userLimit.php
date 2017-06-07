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

    <script src="../js/userLimit.js"></script>
    <title>用户权限管理</title>
</head>
<body>
    <?php
    require "sql.php";

    $sql="SELECT * from user where id='".$_GET["id"]."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    ?>
    <!--页面导航栏-->
    <div id="header">
        <?php
        require "../pieces/adminheader.php";
        require "../inf/utils/convertor.php";
        ?>
    </div>

    <!--填写信息-->
    <div class="col-md-offset-2 col-md-8 add-wrapper">
        <span class="container-fluid ">
            <h3>用户权限</h3>
        </span>

        <!--分割线-->
        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

        <table class="table table-striped table-hover " id="detailTable">
            <thead>
            <tr>
                <div class="container">
                    <div class="row">
                        <th class="col-md-2">项目</th>
                        <th class="col-md-2">操作</th>
                    </div>
                </div>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    用户ID
                </td>
                <td>
                    <?php echo $row["id"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    用户名
                </td>
                <td>
                    <?php echo $row["name"] ?>
                </td>
            </tr>
            <tr>
                <td>
                    用户地区
                </td>
                <td>
<!--                    <select name="privilege"  id="privilege" onchange="changeMember(this)" class="form-control">-->
<!--                        <option value="0" disabled selected="">请选择</option>-->
<!--                    --><?php echo getArea($row["id"]);
//                    //市用户
//                    if($row["privilege"]==2){
//                        $sql="select * from city where user_id is NULL or user_id='".$row["id"]."'";
//                        $result=mysql_query($sql);
//                        while($arearow=mysql_fetch_array($result)){
//
//                            if($arearow["user_id"]==$row["id"]){
//                                echo '<option value="'.$arearow["id"].'" selected="">'.$arearow["name"].'</option>';
//                            }
//                            else{
//                                echo '<option value="'.$arearow["id"].'">'.$arearow["name"].'</option>';
//                            }
//                        }
//
//                    }
//                    //企业用户
//                    else if($row["privilege"]==1){
//                        $sql="select * from city";
//                        $result=mysql_query($sql);
//                        while($arearow=mysql_fetch_array($result)){
//                            echo '<option value="'.$arearow["id"].'">'.$arearow["name"].'</option>';
//
//                        }
//                    }
//                     ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary center-block">确认</button>
                </td>
                <td>
                    <a href="userManage.php">
                        <button class="btn btn-default center-block">返回</button>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>


    </div>


</body>
</html>