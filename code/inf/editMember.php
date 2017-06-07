<?php
/**
 * Created by 高凯辉 on 2017-05-26.
 */
require "../admin/sql.php";

$sql="Update member set description='".$_POST["memberName"]."',excelAbility='".$_POST["excel"]."',".
    "viewAbility='".$_POST["view"]."',analyzeAbility='".$_POST["analyze"]."',".
    "noticeAbility='".$_POST["notice"]."',systemAbility='".$_POST["system"]."',userAbility='".$_POST["user"]."' ".
    " where id='".$_POST["id"]."'";
$result=mysql_query($sql);

echo 1;