<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 张伟
 * Date: 2016-04-04
 * Time: 21:45
 */

require "../../admin/sql.php";

$sql="update entjobless set edit_time=NOW(),".
    "edit_man='".$_SESSION["id"]."',now_num='".$_POST["new_num"]."',pre_num='".$_POST["pre_num"]."'".
    " where id='".$_POST["id"]."'";
$result=mysql_query($sql);


echo 1;