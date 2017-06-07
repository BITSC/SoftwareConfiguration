<?php
session_start();
/**
 * Created by 高凯辉 on 2017-05-26.
 */

require "../admin/sql.php";

$sql="delete from member where id='".$_POST["id"]."'";
$result=mysql_query($sql);

echo 1;