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

    <link rel="stylesheet" href="../css/detail.css">
    <script src="../js/detail.js"></script>
    <script src="../js/userManage.js"></script>
    <title>用户管理</title>
</head>
<body>

    <?php
    require "sql.php";
    require "../inf/utils/convertor.php";

    $sql="SELECT * from user where id!='".$_SESSION["id"]."'";

    if($_GET["key"]!=null){
        $sql=$sql." and name like '%".$_GET["key"]."%'";
    }
    $result=mysql_query($sql);
    ?>

    <!-- 提示框 -->
    <div class="inform-box">
        <span class="inform-txt center-block"></span>
    </div>

    <!--页面导航栏-->
    <div id="header">
        <?php
        require "../pieces/adminheader.php";
        ?>
    </div>

<!--填写信息-->
<div class="col-md-offset-2 col-md-8 add-wrapper" style="min-height: 600px">
        <span class="container-fluid ">
            <h3>用户管理</h3>
        </span>


    <!--搜索框-->
    <div class="input-group col-md-4 col-md-offset-4" style="margin-bottom: 20px">
        <input type="text" id="key" value="<?php
        echo $_GET["key"]; ?>" class="form-control" style="border-radius: 0px" placeholder="请输入用户名进行查询...">
              <span class="input-group-btn">
                <button class="btn btn-primary" id="search" style="border-radius: 0px" type="button">搜索</button>
              </span>
    </div><!-- /input-group -->


    <table class="table table-striped table-hover " id="detailTable">
        <thead>
        <tr>
            <div class="container">
                <div class="row">
                    <th class="col-md-2">用户ID</th>
                    <th class="col-md-2">用户名</th>
                    <th class="col-md-2">用户权限</th>
                    <th class="col-md-2">地区</th>
<!--                    <th class="col-md-2">修改操作</th>-->
                    <th class="col-md-2">删除</th>
                </div>
            </div>
        </tr>
        </thead>
        <tbody>
        <?php

        while($row=mysql_fetch_array($result)){
            $membersql="select description from member where id='".$row["privilege"]."'";
            $memberresult=mysql_query($membersql);
            $memberrow=mysql_fetch_array($memberresult);

            echo '<tr>'.
                '<td>'.$row["id"].'</td>'.
                '<td>'.$row["name"].'</td>'.
                '<td>'.$memberrow["description"].'</td>'.
                '<td>'.getArea($row["id"]).'</td>';
//
//            echo '<td><a href="userLimit.php?id='.$row["id"].'"><button class="btn btn-primary">查看</button></a></td>';
            echo '<td><button class="btn btn-primary" onclick="deleteUser(this)">删除</button></td>';

            echo '</tr>';


        }

        ?>
        </tbody>
    </table>

    <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#plus">
        <span class="glyphicon glyphicon-plus"></span>新增用户</button>
</div>

<!--加载页脚-->
<div id="footer">
    <?php
    require "../pieces/footer.html";
    ?>
</div>


<!--添加用户模态框-->
<div class="modal fade" id="plus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">添加用户</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover ">
                    <tr>
                        <td>用户名</td>
                        <td>
                            <input type="text" required="required" class="form-control"  id="userName">
                        </td>
                    </tr>
                    <tr>
                        <td>密码</td>
                        <td>
                            <input type="text" required="required" class="form-control"  id="password">
                        </td>
                    </tr>
                    <tr>
                        <td>权限</td>
                        <td>
                            <select name="privilege" required="required" id="privilege" class="form-control">
                                <option value="0" disabled selected="">请选择</option>
                                <?php
                                $sql="select * from member";
                                $result=mysql_query($sql);
                                $i=0;
                                while($row=mysql_fetch_array($result)){
                                    $i++;
                                    if($i!=3)
                                    echo '<option value="'.$row["id"].'">'.$row["description"].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>区域</td>
                        <td>
                            <select name="area"  id="area" required="required" class="form-control">
                                <option value="0" disabled selected="">请选择</option>
                                <?php
                                $sql="select * from city";
                                $result=mysql_query($sql);
                                while($row=mysql_fetch_array($result)){
                                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>公司名称</td>
                        <td>
                            <input type="text" class="form-control"  id="ent_name" placeholder="如果是企业用户请填写企业名称">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirmUserPlus">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>