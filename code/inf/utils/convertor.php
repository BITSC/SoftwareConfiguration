<?php
/**
 * Created by PhpStorm.
 * User: 张伟
 * Date: 2016-03-25
 * Time: 17:56
 */

function getCity($id){

    $sql="select * from city where id='".$id."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    return $row["name"];
}


function getAbility($type){

    $str="无";

    if($type=="0"){
        $str="无";
    }
    else{
        $str="有";
    }

    return $str;
}

function getStatus($type){

    $str="";

    switch($type){
        case 0:$str="等待市审核中...";break;
        case 1:$str="市审核通过，等待省审核";break;
        case 2:$str="已被退回，请修改";break;
        case 11:$str="省审核通过";break;
    }

    return $str;
}

function getArea($id){


    $sql="select privilege from user where id='".$id."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    $type=$row["privilege"];
    //如果是企业用户
    if($type==1){

        $sql="select city.name as ctname from entinfo,city  where  ".
            " entinfo.area=city.id and entinfo.admin_id='".$id."'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);

        return $row["ctname"];
    }
    else{
        $sql="select city.name from city where user_id='".$id."'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);

        return $row["name"];
    }

}

function getNum($id){
    if($id=="" || $id==null){
        return "无";
    }
    else{
        return $id;
    }
}

function getMan($id){

    $sql="select * from user where id='".$id."'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);

    if($row["name"]!=null)
        return $row["name"];
    else
        return "无";
}

function getEditDate($date){

    if($date==""||$date==null){
        return "无";
    }
    else{
        return $date;
    }
}