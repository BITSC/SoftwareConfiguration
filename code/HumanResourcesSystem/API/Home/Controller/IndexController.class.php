<?php
namespace Home\Controller;
use Home\Model\EntInfoModel;
use Think\Controller;
class IndexController extends UtilController {

    public function test(){
        $entiInfo = new EntInfoModel();
        $info = $entiInfo -> getInfo();
        if($info){
            $data = array(
                'status' => 1,
                'message' => $info['namech'],
            );
        }
        $this -> response($data, 'json');
    }

}