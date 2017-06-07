<?php
/**
 * Created by PhpStorm.
 * User: 石钟浩
 * Date: 2016/3/25
 * Time: 15:11
 */

namespace Home\Model;


use Think\Exception;
use Think\Model;

class EntJoblessModel extends Model
{
    protected $tableName = 'entjobless';

    public function updateStatus($id,$status){
        try{
            $condition['id'] = (int)$id;
            $map['status'] = $status;
            $this -> where($condition) -> save($map);
        }catch(Exception $e){

        }

    }

    public function getInfo($id){
        $condition['id'] = (int)$id;
        $result = $this -> where($condition) -> find();
        return $result;
    }
}












