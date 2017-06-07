<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 张伟
 * Date: 2016-03-28
 * Time: 14:36
 */

require "../../admin/sql.php";

//寻找当前管理员对应的公司
$sql="select * from entinfo where admin_id='".$_SESSION["id"]."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

//需要使用的是row["id"],对应entjobless里面的ent_id
$sql="insert into entjobless(ent_id,research_id,time,first_num,now_num,".
    "reduce_type,reason1,reason1info,reason2,reason2info,reason3,reason3info,".
    "reason0,status) values('".$row["id"]."','".$_POST["research_id"]."',".
    "NOW(),'".$_POST["first_num"]."','".$_POST["now_num"]."',"."'".$_POST["reduce_type"]."',".
    "'".$_POST["reason1"]."','".$_POST["reason1info"]."',".
    "'".$_POST["reason2"]."','".$_POST["reason2info"]."',".
    "'".$_POST["reason3"]."','".$_POST["reason3info"]."',".
    "'".$_POST["reason0"]."','0')";
$result=mysql_query($sql);

echo 1;