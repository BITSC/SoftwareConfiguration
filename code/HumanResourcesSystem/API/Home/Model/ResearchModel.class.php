<?php
/**
 * Created by PhpStorm.
 * User: 49255
 * Date: 2016/3/26
 * Time: 21:59
 */

namespace Home\Model;


use Think\Exception;
use Think\Model;

class ResearchModel extends Model
{
    protected $tableName = 'research';

    public function addRecord($name, $startTime, $endTime){
        $map['name'] = $name;
        $map['startTime'] = date("y-m-d H:i:s", strtotime($startTime));
        $map['endTime'] = date("y-m-d H:i:s", strtotime($endTime));

        try{
            $this -> add($map);
        }catch(Exception $e){

        }
    }

    public function updateRecord($id, $startTime, $endTime){
        $condition['id'] = $id;
        $map['startTime'] = date("y-m-d H:i:s", strtotime($startTime));
        $map['endTime'] = date("y-m-d H:i:s", strtotime($endTime));

        try{
            $this -> where($condition) ->save($map);
        }catch(Exception $e){

        }
    }

    public function updateDisabled(){
        $condition['disabled'] = 0;
        $map['disabled'] = 1;
        try{
            $this -> where($condition) -> save($map);
        }catch(Exception $e){

        }
    }
}




















