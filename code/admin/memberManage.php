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

    <link rel="stylesheet" href="../css/detail.css">
    <script src="../js/detail.js"></script>
    <link rel="stylesheet" href="../css/system.css">
    <script src="../js/memberManage.js"></script>
    <title>角色管理</title>
</head>
<body>
<?php
require "sql.php";
require "../inf/utils/convertor.php";

$sql="SELECT * from member";
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
        <h3>角色管理</h3>
    </span>


    <table class="table table-striped table-hover " id="detailTable">
        <thead>
        <tr>
            <div class="container">
                <div class="row">
                    <th class="col-md-1">角色</th>
                    <th class="col-md-2">excel导出权限</th>
                    <th class="col-md-2">数据分析权限</th>
                    <th class="col-md-2">查看其它企业信息权限</th>
                    <th class="col-md-2">通知权限</th>
                    <th class="col-md-2">用户管理权限</th>
                    <th class="col-md-2">系统管理权限</th>
                    <th class="col-md-2">修改操作</th>
                    <th class="col-md-2">删除操作</th>
                </div>
            </div>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row=mysql_fetch_array($result)){

            echo '<tr>'.
                '<td><input type="hidden" value="'.$row["id"].'">'.$row["description"].'</td>'.
                '<td>'.getAbility($row["excelAbility"]).'</td>'.
                '<td>'.getAbility($row["analyzeAbility"]).'</td>'.
                '<td>'.getAbility($row["viewAbility"]).'</td>'.
                '<td>'.getAbility($row["noticeAbility"]).'</td>'.
                '<td>'.getAbility($row["userAbility"]).'</td>'.
                '<td>'.getAbility($row["systemAbility"]).'</td>'.
                '<td><a href="memberEdit.php?id='.$row["id"].'">'.
                '<button class="btn btn-primary">修改</button></a></td>'.
                '<td><button class="btn btn-primary" onclick="deleteMember(this)">删除</button></td>'.
                '</tr>';
        }
        ?>
        </tbody>
    </table>

    <button class="btn btn-primary" data-toggle="modal" data-target="#plus">
        <span class="glyphicon glyphicon-plus"></span>新增角色</button>

</div>


<!--添加角色模态框-->
<div class="modal fade" id="plus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">添加角色</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover ">
                    <tr>
                        <td>角色名</td>
                        <td>
                            <input type="text" class="form-control"  id="memberName">
                        </td>
                    </tr>
                    <tr>
                        <td>报表管理权限</td>
                        <td>
                            <select name="excel" class="form-control"  id="excel">
                                <option value="-1" disabled>请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>企业管理权限</td>
                        <td>
                            <select name="excel" class="form-control"  id="view">
                                <option value="-1" disabled>请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>数据分析权限</td>
                        <td>
                            <select name="excel" class="form-control"  id="analyze">
                                <option value="-1" disabled>请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>通知权限</td>
                        <td>
                            <select name="excel" class="form-control"  id="notice">
                                <option value="-1" disabled>请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>系统管理权限</td>
                        <td>
                            <select name="excel" class="form-control" id="system">
                                <option value="-1" disabled >请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>用户管理权限</td>
                        <td>
                            <select name="excel" class="form-control" id="user">
                                <option value="-1" disabled >请选择</option>
                                <option value="0" selected="">无</option>
                                <option value="1">有</option>
                            </select>
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