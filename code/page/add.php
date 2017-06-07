

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
    <title>数据填报</title>
</head>
<body>
<?php
//先判断是否有被退回的调查期
//并约定，最多只能同时有一个调查期被退回
require "../admin/sql.php";
require "../inf/utils/convertor.php";

$sql="select * from entinfo,entjobless where entinfo.id=entjobless.ent_id ".
    "and entinfo.admin_id='".$_SESSION["id"]."' and status='2'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$row=mysql_fetch_array($result);

if($count>0){

    $backsql="select * from backedit where report_id='".$row["id"]."'";
    $backresult=mysql_query($backsql);
    $countback=mysql_num_rows($backresult);
    $backrow=mysql_fetch_array($backresult);

    if($countback>0){
        $backman="select * from user where id='".$backrow["user_id"]."'";
        $backmanresult=mysql_query($backman);
        $backmanrow=mysql_fetch_array($backmanresult);
    }
}

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
            <h3>填报企业就业人数</h3>
        </span>

        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

        <?php
        //判断当前企业用户有无正在提交中的调查期
        $loadingsql="select * from entjobless,user,entinfo where entinfo.id=entjobless.ent_id ".
            " and entinfo.admin_id=user.id and entjobless.status!=11 and entjobless.status!=2 and user.id='".$_SESSION["id"]."'";
        $loadingresult=mysql_query($loadingsql);
        $loadingcount=mysql_num_rows($loadingresult);

        //没有被退回的，也没有完成的，那么应该只显示不能操作
        if($loadingcount>0){
            echo '<div style="min-height: 500px;"><span class="center-block"><h2>本次调查期报告已经提交</h2>' .
                '</div>';
        }
        //有退回的
        else {

            if ($count > 0) {
                ?>
                <input type="hidden" id="back-edit-id" value="<?php echo $row["id"] ?>">
                <input type="hidden" id="back-edit-notice-id" value="<?php echo $backrow["id"] ?>">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>警告!</strong> 您有被退回的调查期，请修改后重新上传
                </div>

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">此调查期被退回</h3>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-hover ">
                            <thead>
                            <tr>
                                <th>退回人</th>
                                <th>退回原因</th>
                                <th>退回时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="danger">
                                <td><?php echo $backmanrow["name"]; ?></td>
                                <td><?php echo $backrow["reason"]; ?></td>
                                <td><?php echo $backrow["time"]; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            } //没有提交中的，也没有要退回的
            else {

                //展示有效调查期
                $sql = "select * from research where disabled=0";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);

                echo '<div>' . '<h2>您正在填写的是：' . $row["name"] . '</h2>' .
                    '</div>';
                echo '<hr style="border: 1px solid #666666;border-left: none;border-right: none" />';
            }
            ?>


            <table class="table table-striped order-table table-hover ">
                <thead>
                <tr>
                    <div class="container">
                        <div class="row">
                            <th class="col-md-2">填写项目</th>
                            <th class="col-md-2">填写内容</th>
                        </div>
                    </div>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        建档期就业人数
                    </td>
                    <td>
                        <input  type="text" onkeyup="testNum(this)" class="form-control" id="first_num"
                               value="<?php echo $row["first_num"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        调查期就业人数
                    </td>
                    <td>
                        <input  type="text" onkeyup="testNum(this)" class="form-control" id="now_num" value="<?php echo $row["now_num"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        就业人数减少类型
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reduce_type"
                               value="<?php echo getNum($row["reduce_type"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        主要原因
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason1" value="<?php
                        echo getNum($row["reason1"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        主要原因说明
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason1info"
                               value="<?php echo getNum($row["reason1info"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        次要原因
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason2" value="<?php
                        echo getNum($row["reason2"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        次要原因说明
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason2info"
                               value="<?php echo getNum($row["reason2info"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        第三原因
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason3" value="<?php
                        echo getNum($row["reason3"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        第三原因说明
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason3info"
                               value="<?php
                               echo getNum($row["reason3info"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        其他原因
                    </td>
                    <td>
                        <input type="text" class="form-control addition" id="reason0" value="<?php echo
                        getNum($row["reason0"]) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        //表示有被退回的
                        if ($count > 0) {
                            ?>
                            <button class="btn btn-primary center-block" id="confirm-edit-up"
                                    style="border-radius: 0px">确认修改
                            </button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-primary center-block" id="confirm-plus"
                                    style="border-radius: 0px">确认上报
                            </button>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-primary center-block" style="border-radius: 0px">返回</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>

    </div>

    <!--加载页脚-->
    <div id="footer">

    </div>
</body>
</html>