<?php
session_start();
/**
 * Created by 高凯辉 on 2017-05-26.
 */


function Init(){
    require "../admin/sql.php";

    $sql="select * from user where id='".$_SESSION["id"]."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    $sql="select * from member where id='".$row["privilege"]."'";
    $result=mysql_query($sql);
    return mysql_fetch_array($result);
}

function getExcel(){
    $row=Init();

    return intval($row["excelAbility"]);
}

function getView(){
    $row=Init();

    if($row["viewAbility"]>0) return 1;
    else return 0;
}

function getAnalyze(){
    $row=Init();

    if($row["analyzeAbility"]>0) return 1;
    else return 0;
}

function getNotice(){
    $row=Init();

    if($row["noticeAbility"]>0) return 1;
    else return 0;
}

function getSystem(){
    $row=Init();

    if($row["systemAbility"]>0) return 1;
    else return 0;
}

function getUser(){
    $row=Init();

    if($row["userAbility"]>0) return 1;
    else return 0;
}