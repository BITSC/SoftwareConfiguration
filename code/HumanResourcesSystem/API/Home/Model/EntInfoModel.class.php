<?php
namespace Home\Model;
use Think\Model;
/**
 * Created by PhpStorm.
 * User: 石钟浩
 * Date: 2016/3/25
 * Time: 14:18
 */
class EntInfoModel extends Model
{
    protected $tableName = 'entinfo';

    public function getInfo(){
        $condition['id'] = 2;
        $info = $this -> where($condition) -> find();
        return $info;
    }
    public function addEntinfo($admin_id, $namech, $area){
        $map['admin_id'] = $admin_id;
        $map['namech'] = $namech;
        $map['area'] = $area;
        try{
            $this->add($map);
        }catch(Exception $e){

        }
    }
}












