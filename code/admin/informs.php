<!doctype html>
<?php session_start();?>
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

    <title>通知管理</title>
</head>
<body>
    <?php
    require "sql.php";
    require "../inf/utils/getPrivilege.php";
    $privilege=getPrivilege();

    $sql="select notice.id,notice.title,notice.content,notice.time,user.name ".
        " from user,notice where user.id=notice.send_id and notice.receive_id='".$_SESSION["id"]."'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);

    $sql1="select notice.id,notice.title,notice.content,notice.time,user.name ".
        " from user,notice where user.id=notice.send_id and notice.send_id='".$_SESSION["id"]."'";
    $result1=mysql_query($sql1);
    $count1=mysql_num_rows($result1);
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
        <h3>通知管理</h3>
    </span>

    <!--分割线-->
    <hr style="border: 1px solid #666666;border-left: none;border-right: none" />


    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php
            //这是一个企业用户
            if($privilege==2){
                ?>
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">收到的通知</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">发布的通知</a>
                </li>
                <?php
            }
            else{
                ?>
                <li role="presentation" class="active">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">发布的通知</a>
                </li>
                <?php
            }
            ?>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php
            //这是一个企业用户
            if($privilege==2){
                //收到的通知?>
                <div role="tabpanel" class="tab-pane fade active in" id="home">

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
                                <td colspan="5"><center>暂时没有收到通知</center></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="profile">

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
                        while($row1=mysql_fetch_array($result1)){
                            echo '<tr>'.
                                '<td>'.$row1["id"].'</td>'.
                                '<td>'.$row1["title"].'</td>'.
                                '<td>'.$row1["content"].'</td>'.
                                '<td>'.$row1["time"].'</td>'.
                                '<td>'.$row1["name"].'</td>'.
                                '</tr>';
                        }

                        if($count1<=0){
                            ?>
                            <tr>
                                <td colspan="5"><center>暂时没有发出通知</center></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            //省用户
            else{
                ?>
                <div role="tabpanel" class="tab-pane active" id="profile">
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
                        while($row1=mysql_fetch_array($result1)){
                            echo '<tr>'.
                                '<td>'.$row1["id"].'</td>'.
                                '<td>'.$row1["title"].'</td>'.
                                '<td>'.$row1["content"].'</td>'.
                                '<td>'.$row1["time"].'</td>'.
                                '<td>'.$row1["name"].'</td>'.
                                '</tr>';
                        }

                        if($count1<=0){
                            ?>
                            <tr>
                                <td colspan="5"><center>暂时没有发出通知</center></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php

            }
            ?>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="button_new_notice" type="button" class="btn btn-primary btn-lg"  >
        发布通知
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">发布通知</h4>
                </div>
                <form method="post">
                <div class="modal-body">
                    <div class="container-fluid" style="padding: 5px;">
                    <input name="title" class="form-control form-inline" placeholder="通知标题" required="required" ></div>

                    <div class="container-fluid" style="padding: 5px;">
                    <select class="form-control form-inline" name="receive" required="required" >
                        echo "<option value="" disabled selected>选择接收消息的用户</option>";
                        <?php
                        //省用户
                        if($privilege=='3'){
                            $sql_get_receive="select `name`,`id` from `user` where `privilege`=2";
                        }
                        //企业用户
                        else{

                            //当前地区代码
                            $sql="select city.id as id from city where city.user_id='".$_SESSION["id"]."'";
                            $result=mysql_query($sql);
                            $myrow=mysql_fetch_array($result);

                            $sql_get_receive="select user.name,user.id from user,entinfo where ".
                                " entinfo.admin_id=user.id and user.privilege=1 ".
                            " and entinfo.area='".$myrow["id"]."'";
                        }
                        $receive=mysql_query($sql_get_receive);
                        while($row=mysql_fetch_array($receive)){
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                        ?>
                    </select></div>

                    <div class="container-fluid" style="padding: 5px;">
                        <textarea name="content" class="form-control" rows="6" required="required"  placeholder="通知内容"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="cancel" class="btn btn-default" data-dismiss="modal" value="取消"/>
                    <input type="submit" formaction="../inf/newnotice.php"  class="btn btn-primary" value="确认"/>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/informs.js"></script>
</div>

</body>
</html>