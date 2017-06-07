<?php
/**
 *
 * Created by PhpStorm.
 * User: 石钟浩
 * Date: 2016/3/17
 * Time: 14:40
 */

namespace Home\Controller;


use Think\Controller\RestController;

class UtilController extends RestController
{

    /**
     * 验证是否登录
     * @ignore
     */

    public function doAuth(){
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
        }
        else{
            $user_id = $_POST['user_id'];
        }
        $this -> initCache();
        if(S($user_id)){
            //$this->customer = S($user_id);
            return;
        } else{
            $data = array(
                'message' => 'Please login first',
            );
            $this -> response($data, 'json');
        }
    }

    /**
     * 缓存初始化
     * @ignore
     */

    public function initCache(){
        S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'prefix'=>'think',
                'expire'=>60 * 60 * 24)
        );
    }

}