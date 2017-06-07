<!doctype html>
<html lang="zh-CN">
<?php session_start();?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 使用Bootstrap必须按照这样引用3个meta-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="shortcut icon" href="../img/s-logo.png">
    <script src="../js/plugins/jquery-2.0.0.min.js"></script>
    <script src="../js/basic.js"></script>
    <script src="../js/plugins/bootstrap.min.js"></script>

    <script src="../js/plugins/bootstrap-datetimepicker.js"></script>
    <script src="../js/plugins/bootstrap-datetimepicker.zh-CN.js"></script>

    <script src="../js/plugins/jquery.dataTables.min.js"></script>
    <script src="../js/plugins/dataTables.bootstrap.js"></script>

    <script src="../js/toXLS/excellentexport.js"></script>

    <!--[if IE]>
    <script src="../js/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../css/manage.css">
    <script src="../js/manage.js"></script>
    <title>企业管理</title>
</head>
<body>
    <?php

    require "sql.php";
    require "../inf/utils/convertor.php";

    ?>
    <!--页面导航栏-->
    <div id="header">
        <?php
        require "../pieces/adminheader.php";
        ?>
    </div>

    <div class="col-md-offset-2 col-md-8 add-wrapper" style="min-height: 600px">
            <span class="container-fluid ">
                <h3>企业管理</h3>
            </span>

        <!--搜索框-->
        <div class="input-group col-md-4 col-md-offset-4">
            <input type="text" id="key" value="<?php
            echo $_GET["key"]; ?>" class="form-control" style="border-radius: 0px" placeholder="输入查询条件">
              <span class="input-group-btn">
                <button class="btn btn-primary" id="search" style="border-radius: 0px" type="button">搜索</button>
              </span>
        </div><!-- /input-group -->


        <div class="container-fluid" style="margin-top: 30px">
            <span class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group date form_date" data-date=""
                             data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                            <input class="form-control time" size="16" placeholder="开始日期"
                                   type="text" value="" style="cursor:pointer" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" /><br/>
                    </div>
                </div>
            </span>
            <span class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group date form_date" data-date=""
                             data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control time" size="16" placeholder="结束日期"
                                   type="text" value="" style="cursor:pointer" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" /><br/>
                    </div>
                </div>
            </span>
        </div>

        <!--分割线-->
        <hr style="border: 1px solid #666666;border-left: none;border-right: none" />

        <a download="企业管理列表.xls" href="#" style="border-radius: 0px" class="btn btn-primary"
           onclick="return ExcellentExport.excel(this, 'magnageTable', '列表');">导出为Excel</a>


        <!--表格-->
        <table class="table table-striped table-hover " id="magnageTable" style="cursor:pointer;">
            <thead>
            <tr>
                <div class="container">
                    <div class="row row-title">
                        <th class="col-md-2" style="font-size: 12px;">企业名称</th>
                        <th class="col-md-2" style="font-size: 12px;">组织结构代码</th>
                        <th class="col-md-1" style="font-size: 12px;">所属地区</th>
                        <th class="col-md-2" style="font-size: 12px;">联系电话</th>
                        <th class="col-md-1" style="font-size: 12px;">所属行业</th>
                        <th class="col-md-2" style="font-size: 12px;">邮政编码</th>
                    </div>
                </div>
            </tr>
            </thead>
            <tbody id="ents">

            <?php
            require "../inf/utils/getPrivilege.php";

            $key=$_GET["key"];
            $startDate=$_GET["startDate"];
            $endDate=$_GET["endDate"];

            $sql="SELECT * from entinfo where 1=1 ";

            $privilege=getPrivilege();

            //根据市用户的地区，进行过滤
            if($privilege==2){
                $sql=$sql." and area='".getAdminCity()."'";
            }

            if($key!=null){
                $sql=$sql." and namech like '%".$key."%' ";
            }

            $result=mysql_query($sql);
            while($row=mysql_fetch_array($result)){

                $flag=true;
                $datetime=new DateTime($row["time"]);
                $dateStamp=$datetime->getTimestamp();

                if($startDate!=null){

                    $startTime=new DateTime($startDate);
                    $startStamp=$startTime->getTimestamp();
                    if($dateStamp > $startStamp){
                        $flag=true;
                    }
                    else{
                        $flag=false;
                    }
                }
                if($endDate!=null){
                    $endTime=new DateTime($endDate);
                    $endStamp=$endTime->getTimestamp();

                    if( $dateStamp < $endStamp){
                        $flag=true;
                    }
                    else{
                        $flag=false;
                    }
                }

                if($flag)
                echo  '<tr onclick="viewDetail(this)">'.
                        '<td><input type="hidden" value="'.$row["id"].'">'.$row["namech"].'</td>'.
                        '<td>'.$row["code"].'</td>'.
                        '<td>'.getCity($row["area"]).'</td>'.
                        '<td>'.$row["tel"].'</td>'.
                        '<td>'.$row["industrial"].'</td>'.
                        '<td>'.$row["zipcode"].'</td>'.
                    '</tr>';
            }

            ?>

            </tbody>


        </table>


    </div>

    <!--加载页脚-->
    <div id="footer">

    </div>

</body>
<script>
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 0,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
</html>