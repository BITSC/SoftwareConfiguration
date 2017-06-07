<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 张伟
 * Date: 2016-03-27
 * Time: 16:19
 */

require "../../admin/sql.php";

$report_id=$_POST["report_id"];
$content=$_POST["content"];

$sql1="update entjobless set status=2 where id='".$report_id."' ";
$result1=mysql_query($sql1);

$sql="insert into backedit(report_id,user_id,reason,time) values('".
    $report_id."','".$_SESSION["id"]."','".$content."',NOW())";
$result=mysql_query($sql);

echo 1;

