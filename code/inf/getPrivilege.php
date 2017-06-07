<?php
/**
 * Created by 高凯辉 on 2017-05-26.
 */
session_start();
require "../admin/sql.php";
function getPrivilege(){
    $sql="select `privilege` from `user` where `id`='".$_SESSION["id"]."'";
    return mysql_fetch_array(mysql_query($sql))["privilege"];
}


