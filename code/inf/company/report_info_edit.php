<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 张伟
 * Date: 2016-03-28
 * Time: 14:12
 */
require "../../admin/sql.php";

$sql="update entjobless set first_num='".$_POST["first_num"]."',".
    "now_num='".$_POST["now_num"]."',reduce_type='".$_POST["reduce_type"]."',".
    "reason1='".$_POST["reason1"]."',reason1info='".$_POST["reason1info"]."',".
    "reason2='".$_POST["reason2"]."',reason2info='".$_POST["reason2info"]."',".
    "reason3='".$_POST["reason3"]."',reason3info='".$_POST["reason3info"]."',".
    "reason0='".$_POST["reason0"]."',edit_time=NOW(),status=0".
    " where id='".$_POST["id"]."'";
$result=mysql_query($sql);

$sql="delete from backedit where id='".$_POST["backedit_id"]."'";
$result=mysql_query($sql);

echo 1;