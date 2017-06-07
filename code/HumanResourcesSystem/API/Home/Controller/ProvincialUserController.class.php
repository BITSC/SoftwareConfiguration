<?php
/**
 *
 * Created by PhpStorm.
 * User: 石钟浩
 * Date: 2016/3/25
 * Time: 15:24

 */


namespace Home\Controller;


use Home\Model\CityModel;
use Home\Model\EntInfoModel;
use Home\Model\EntJoblessModel;
use Home\Model\ResearchModel;
use Home\Model\UserModel;
use Think\Exception;

class ProvincialUserController extends UtilController
{
    //报表管理
    public function reportManagement(){
        $action = $_POST['action'];
        $id = $_POST['id'];
        $message = "";

        try{
            $entJobless = new EntJoblessModel();
            if(!strcmp($action, "report")){
                $entJobless -> updateStatus($id, 1);
                $message = "上报成功！"; //其实这里是市用户上报给省用户
            }else if(!strcmp($action, "approval")){
                $entJobless -> updateStatus($id, 11);
                $message = "审核通过！";
            }

            $data = array(
                "status" => 1,
                "message" => $message,
            );

            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }catch(Exception $e){
            $data = array(
                "status" => 0,
                "message" => "请求失败！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }
    }

    //添加新用户
    public function addNewUser(){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $privilege = $_POST['privilege'];
        $area = $_POST['area'];
        $entname = $_POST['entname'];

        try{
            $user = new UserModel();
            $entInfo = new EntInfoModel();
            $cityInfo = new CityModel();
            $tempInfo = $user ->getUserbyName($name);
            if ($tempInfo == null)
            {
                $user->addRecord($name, $password, $privilege);
                if ((int)privilege == 1)
                {
                    $nowInfo = $user -> getUserbyName($name);
                    $entInfo -> addEntinfo($nowInfo['id'], $entname, $area);
                }
                else
                {
                    $nowInfo = $user -> getUserbyName($name);
                    $cityInfo -> updateCityinfo($area, $nowInfo['id']);
                }
                $data = array(
                    "status" => 1,
                    "message" => "添加用户成功！",
                );
                header("Access-Control-Allow-Origin: *");   //解决跨域！
                $this -> response($data, 'json');
            }
           else
           {
               $data = array(
                   "status" => -1,
                   "message" => "用户名重复！",
               );
               header("Access-Control-Allow-Origin: *");   //解决跨域！
               $this -> response($data, 'json');
           }
        }catch(Exception $e){
            $data = array(
                "status" => 0,
                "message" => "请求失败！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }
    }

    //增加调查期
    public function addResearch(){
        $name = $_POST['name'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        try{
            $research = new ResearchModel();
	        $research -> updateDisabled();
            $research->addRecord($name, $startTime, $endTime);
            $data = array(
                "status" => 1,
                "message" => "添加调查期成功！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }catch(Exception $e){
            $data = array(
                "status" => 0,
                "message" => "请求失败！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }
    }

    //修改调查期时间
    public function editResearch(){
        $id = $_POST['id'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        try{
            $research = new ResearchModel();
            $research -> updateRecord($id, $startTime, $endTime);
            $data = array(
                "status" => 1,
                "message" => "修改调查期成功！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }catch(Exception $e){
            $data = array(
                "status" => 0,
                "message" => "请求失败！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }
    }

    //修改用户权限
    public function editPrivilege(){
        $id = (int)$_POST['id'];
        $privilege = (int)$_POST['privilege'];

        try{
            $user = new UserModel();
            $user->updateRecord($id, $privilege);
            $data = array(
                "status" => 1,
                "message" => "修改用户权限成功！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }catch(Exception $e){
            $data = array(
                "status" => 0,
                "message" => "请求失败！",
            );
            header("Access-Control-Allow-Origin: *");   //解决跨域！
            $this -> response($data, 'json');
        }
    }


}


















