<?php
session_start();
/**
 * Created by PhpStorm.
 * 获取
 * User: 张伟
 * Date: 2016-03-29
 * Time: 19:45
 */

/**
 * 必须在require "sql.php"之后调用
 */
function getPrivilege(){

    //获取privilege,区分是市用户还是省用户
    $sql="select * from user where id='".$_SESSION["id"]."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    return $row["privilege"];
}

/**
 * 必须在require "sql.php"之后调用
 */
function getAdminCity(){

    $sql="select * from city where user_id='".$_SESSION["id"]."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    return $row["id"];
}