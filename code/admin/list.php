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


    <link rel="stylesheet" href="../css/list.css">
    <script src="../js/list.js"></script>
    <title>报表管理</title>
</head>
<body>


    <!-- 提示框 -->
    <div class="inform-box">
        <span class="inform-txt center-block"></span>
    </div>

    <?php
        require "sql.php";
        require "../inf/utils/getPrivilege.php";

        $privilege=getPrivilege();

        //如果是省用户,获取全部报表
        $sql="SELECT * from entjobless";
        //如果是市用户，需要加地域限制,并且这些报表的status>10
        if($privilege==2){
            $sql="select * from getentlist where area='".getAdminCity()."' and status<10 order by researchTime DESC";
        }
        else{
            //企业报表>10 或者 =1
            $sql=$sql." where status>10 or status=1 order by time DESC";
        }
        $result=mysql_query($sql);
        $count=mysql_num_rows($result);
    ?>

    <input type="hidden" id="user_id" value="<?php echo $_SESSION["id"]; ?>">

    <!--页面导航栏-->
    <div id="header">
        <?php
            require "../pieces/adminheader.php";
            require "../inf/utils/convertor.php";
        ?>
    </div>

    <!--报表信息-->
    <div class="col-md-offset-2 col-md-8 add-wrapper" style="min-height: 600px;">
        <span class="container-fluid ">
            <h3>最近报表</h3>
        </span>

        <div class="container-fluid">

            <?php
                //对于每一条报表的信息
                while($row=mysql_fetch_array($result)){

                    $usersql="select * from entinfo where id='".$row["ent_id"]."'";
                    $userresult=mysql_query($usersql);
                    $userrow=mysql_fetch_array($userresult);

                    //报表时间
                    if(strpos($row["researchTime"],".")>0){
                        $row["researchTime"]=substr($row["researchTime"],0,strpos($row["researchTime"],"."));
                    }


                    echo '<table class="table table-striped table-hover " id="listTable">';

                    echo '<span class="container-fluid info-header">'.
                        '<h5 class="pull-left">'.$userrow["namech"].'</h5>'.
                        '<h5 class="pull-right">'.$row["researchTime"].'</h5></span>'.
                        '<hr style="margin-top: -20px;border: 1px solid '.
                        '#666666;border-left: none;border-right: none" />';

                    echo '<thead>'.
                                '<tr><div class="container">'.
                                '<div class="row">'.
                                    '<th class="col-md-2">建档期就业人数</th>'.
                                    '<th class="col-md-2">调查期就业人数</th>'.
                                    '<th class="col-md-2">就业人数减少类型</th>'.
                                    '<th class="col-md-2"></th>'.
                        '</div></div></tr></thead>';


                    echo '<tbody id="nums"><tr>'.
                        '<td id="build">'.$row["first_num"].'</td>'.
                    '<td id="research_num">'.$row["now_num"].'</td>'.
                    '<td colspan="2">'.$row["reduce_type"].'</td></tr></tbody>';


                    echo '<thead>'.
                        '<tr><div class="container">'.
                        '<div class="row">'.
                        '<th class="col-md-2">原始数据</th>'.
                        '<th class="col-md-2">修改人</th>'.
                        '<th class="col-md-2">修改日期</th>'.
                        '<th class="col-md-2"></th>'.
                        '</div></div></tr></thead>';

                    echo '<tbody><tr>'.
                        '<td>'.getNum($row["pre_num"]).'</td>'.
                        '<td>'.getMan($row["edit_man"]).'</td>'.
                        '<td>'.getEditDate($row["edit_time"]).'</td>'.
                        '</tr><tbody>';

                    echo '<tbody><tr>'.
                        '<td colspan="2">主要原因</td>'.
                        '<td colspan="2">'.$row["reason1"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">主要原因说明</td>'.
                        '<td colspan="2">'.$row["reason1info"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">次要原因</td>'.
                        '<td colspan="2">'.$row["reason2"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">次要原因说明</td>'.
                        '<td colspan="2">'.$row["reason2info"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">第三原因</td>'.
                        '<td colspan="2">'.$row["reason3"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">第三原因说明</td>'.
                        '<td colspan="2">'.$row["reason3info"].'</td></tr>';

                    echo '<tr>'.
                        '<td colspan="2">其他原因</td>'.
                        '<td colspan="2">'.$row["reason0"].'</td></tr>';

                    //等待市审核
                    if($row["status"]==0 && $privilege==2){
                        echo
//                            '<tr><td>'.
//                        '<button onclick="pass('.$row["id"].')" class="btn btn-primary center-block"'.
//                                'style="border-radius: 0px">审核通过</button>'.
                        '<tr><td colspan="2">'.
                        '<button onclick="editTrigger(this)" class="btn btn-primary center-block"'.
                                'style="border-radius: 0px"'.
                                '>返回修改<input type="hidden" class="name" value="'.$userrow["namech"].'">'.
                            '<input type="hidden" class="ids" value="'.$row["id"].'">'.'</button>'.
                        '</td><td >'.
                        '<button onclick="upload('.$row["id"].')" class="btn btn-primary center-block"'.
                                'style="border-radius: 0px">上报</button>'.
                    '</td>'.
                        '<td><button onclick="editInfo(this)" class="btn btn-primary center-block"'.
                        'style="border-radius: 0px">修改</button>'.
                        '<input type="hidden" value="'.$row["now_num"].'">'.
                        '<input type="hidden" value="'.$row["id"].'">'.'</td></tr>'
                        ;
                    }
                    //市已上报 省 待审核
                    else if($row["status"]==1){

                        //判断Privilege，确认是省还是市
                        if($privilege==2)
                        echo '<tr><td colspan="3"></td><td>'.
                            '<button class="btn btn-primary center-block"'.
                            'style="border-radius: 0px">已上报给山东省</button>'.
                            '</td></tr>';
                        else{
                            //省未审核状态
                            echo
                            '<tr><td colspan="2">'.
                            '<button onclick="pass('.$row["id"].')" class="btn btn-primary center-block"'.
                                'style="border-radius: 0px">通过该报表</button>'.
                                '</td><td>'.
                                '<button onclick="editTrigger(this)" class="btn btn-primary center-block"'.
                                'style="border-radius: 0px"'.
                                '>退回企业修改<input type="hidden" class="name" value="'.$userrow["namech"].'">'.
                                '<input type="hidden" class="ids" value="'.$row["id"].'">'.'</button>'.
                                '</td>'.
                            '<td><button onclick="editInfo(this)" class="btn btn-primary center-block"'.
                                'style="border-radius: 0px">修改</button>'.
                            '<input type="hidden" value="'.$row["now_num"].'">'.
                            '<input type="hidden" value="'.$row["id"].'">'.'</td>'.
                            '</tr>'
                            ;
                        }
                    }
                    //市已退回
                    else if($row["status"]==2){

                        echo '<tr><td colspan="3"></td><td>'.
                            '<button class="btn btn-primary center-block"'.
                            'style="border-radius: 0px">已退回要求企业修改</button>'.
                            '</td></tr>';
                    }
                    //省审核通过
                    else if($row["status"]==11 && $privilege==3){
                        echo '<tr><td colspan="3"></td><td>'.
                            '<button class="btn btn-primary center-block"'.
                            'style="border-radius: 0px">已通过</button>'.
                            '</td></tr>';
                    }
                    //省已上报==>没有上报
//                    else if($row["status"]==12 && $privilege==3){
//
//                        echo '<tr><td colspan="3"></td><td>'.
//                            '<button class="btn btn-primary center-block"'.
//                            'style="border-radius: 0px">已上报</button>'.
//                            '</td></tr>';
//                    }
                    //省已退回==>和企业退回合并，将status改为2
//                    else if($row["status"]==13 && $privilege==3){
//                        echo '<tr><td colspan="3"></td><td>'.
//                            '<button class="btn btn-primary center-block"'.
//                            'style="border-radius: 0px">已退回给市修改</button>'.
//                            '</td></tr>';
//                    }

                    echo "</tbody></table>";

                }
                if($count==0){
                    echo '<div><h2>没有需要处理的报表</h2></div>';
                }

            ?>




        </div>


    </div>


    <!--加载页脚-->
    <div id="footer">
        <?php
        require "../pieces/footer.html";
        ?>
    </div>

    <!--返回修改模态框-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">填写修改意见</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover ">
                        <tr>
                            <td>企业名称</td>
                            <td id="entName"></td>
                        </tr>
                        <tr>
                            <td>日期</td>
                            <td id="editDate"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <textarea name="edit-content" id="edit-content" cols="30" rows="10"
                                      class="form-control"></textarea></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirmBackEdit">确认</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>