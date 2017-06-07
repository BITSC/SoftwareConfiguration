<!doctype html>
<?php session_start(); ?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 使用Bootstrap必须按照这样引用3个meta-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="shortcut icon" href="../img/s-logo.png">
    <script src="../js/plugins/jquery-2.0.0.min.js"></script>
    <script src="../js/basic.js"></script>
    <script src="../js/plugins/jquery-ui.js" type="text/javascript"></script>
    <script src="../js/plugins/bootstrap.min.js"></script>
    <script src="../js/plugins/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/dataTables.bootstrap.js"></script>


    <link rel="stylesheet" href="../css/search.css">
    <script src="../js/search.js"></script>
    <title>数据查询</title>
</head>
<body>
<?php
require "../admin/sql.php";
require "../inf/utils/convertor.php";

$sql="select * from entinfo where admin_id='".$_SESSION["id"]."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if($_GET["key"]!=null){
    $sql="select * from entjobless,research where entjobless.research_id=research.id".
        " and entjobless.ent_id='".$row["id"]."' and".
        "(research.name like '%".$_GET["key"]."%' or entjobless.reduce_type  like '%".$_GET["key"]."%')";
}
else{
    $sql="select * from entjobless where ent_id='".$row["id"]."'";
}

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
    <div class="col-md-offset-2 col-md-8 add-wrapper" style="min-height: 600px;">
            <span class="container-fluid ">
                <h3>企业数据查询</h3>
            </span>

        <!--搜索框-->
        <div class="input-group col-md-6">
            <input type="text" class="form-control" id="key" value="<?php
            echo $_GET["key"];
            ?>" style="border-radius: 0px" placeholder="请输入调查期名称...">
              <span class="input-group-btn">
                <button class="btn btn-primary" id="search" style="border-radius: 0px" type="button">搜索</button>
              </span>
        </div><!-- /input-group -->

        <!--分割线-->
        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />


        <!--表格-->
        <table class="table table-striped table-hover " id="searchTable">
            <thead>
            <tr>
                <div class="container">
                    <div class="row row-title">
                        <th class="col-md-2" style="font-size: 12px;">调查期名称</th>
                        <th class="col-md-2" style="font-size: 12px;">建档期就业人数</th>
                        <th class="col-md-1" style="font-size: 12px;">调查期就业人数</th>
                        <th class="col-md-2" style="font-size: 12px;">就业人数减少类型</th>
                        <th class="col-md-2" style="font-size: 12px;">建档时间</th>
                        <th class="col-md-2" style="font-size: 12px;">修改时间</th>
                        <th class="col-md-2" style="font-size: 12px;">状态</th>
                    </div>
                </div>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row=mysql_fetch_array($result)){

                $researchsql="select * from research where id='".$row["research_id"]."'";
                $researchresult=mysql_query($researchsql);
                $researchrow=mysql_fetch_array($researchresult);

                echo '<tr>'.
                    '<td>'.$researchrow["name"].'</td>'.
                    '<td>'.$row["first_num"].'</td>'.
                    '<td>'.$row["now_num"].'</td>'.
                    '<td>'.$row["reduce_type"].'</td>'.
                    '<td>'.$row["time"].'</td>'.
                    '<td>'.$row["edit_time"].'</td>'.
                    '<td>'.getStatus($row["status"]).'</td>'.
                    '</tr>';

            }

            if($count<=0){
                ?>
                <tr>
                    <td colspan="7"><center>暂时没有提交过调查期</center></td>
                </tr>
                <?php
            }
            ?>
            </tbody>


        </table>

    </div>
    <!--加载页脚-->
    <div id="footer">

    </div>
</body>
</html>