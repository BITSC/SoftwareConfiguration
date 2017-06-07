<?php
/**
 * Created by PhpStorm.
 * User: 49255
 * Date: 2016/3/31
 * Time: 22:50
 */

namespace Home\Model;


use Think\Model;

class CityModel extends Model
{
    protected $tableName = 'city';
    public  function updateCityinfo($cityid, $user_id)
    {
        $condition['id'] = $cityid;
        $map['user_id'] = $user_id;
        try{
            $this -> where($condition) -> save($map);
        }catch(Exception $e){

        }
    }
}