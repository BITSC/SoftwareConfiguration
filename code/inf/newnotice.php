<?php
session_start();
/**
 * Created by 高凯辉 on 2017-05-26.
 */
require "../admin/sql.php";

$title = $_POST['title'];
$receive = $_POST['receive'];
$content = $_POST['content'];

$sql = "INSERT INTO `notice`(`title`, `content`, `time`, `send_id`, `receive_id`)".
    " VALUES ('" . $title . "','" . $content . "','" . date('y-m-d h:i:s',time()) .
    "','" . $_SESSION["id"] . "','" . $receive . "')";
mysql_query($sql);
header("Location:../admin/informs.php");