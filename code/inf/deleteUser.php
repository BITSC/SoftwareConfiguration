<?php
session_start();
/**
 * Created by 高凯辉 on 2017-05-26.
 */

require "../admin/sql.php";

$checkSQL="select * from entjobless where ent_id='".$_POST["id"]."'";
$checkResult=mysql_query($checkSQL);
$count=mysql_num_rows($checkResult);

if($count>0){
    echo 0;
}

$sql="delete from user where id='".$_POST["id"]."'";
$result=mysql_query($sql);

echo 1;

