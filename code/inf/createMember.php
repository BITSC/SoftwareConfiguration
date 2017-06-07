<?php

/**
 * Created by 高凯辉 on 2017-05-26.
 */
require "../admin/sql.php";

$sql="insert into member(description,excelAbility,viewAbility,analyzeAbility,noticeAbility,systemAbility,userAbility) ".
    " VALUES ('".$_POST["memberName"]."','".$_POST["excel"]."',".
    "'".$_POST["view"]."','".$_POST["analyze"]."','".$_POST["notice"]."','".$_POST["system"]."','".$_POST["user"]."')";
$result=mysql_query($sql);

echo 1;