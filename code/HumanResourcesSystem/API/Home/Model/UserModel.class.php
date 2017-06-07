<?php
/**
 * Created by PhpStorm.
 * User: 49255
 * Date: 2016/3/26
 * Time: 21:14
 */

namespace Home\Model;


use Think\Exception;
use Think\Model;

class UserModel extends Model
{
    protected $tableName = 'user';

    public function addRecord($name, $password, $privilege){
        $map['name'] = $name;
        $map['password'] = $password;
        $map['privilege'] = $privilege;

        try{
            $this->add($map);
        }catch(Exception $e){

        }
    }

    public function updateRecord($id, $privilege){
        $condition['id'] = $id;
        $map['privilege'] = $privilege;

        try{
            $this -> where($condition) -> save($map);
        }catch(Exception $e){

        }
    }
    public function getUserbyName($name)
    {
        $condition['name'] = $name;
        $info = $this -> where($condition) -> find();
        return $info;
    }
}





















