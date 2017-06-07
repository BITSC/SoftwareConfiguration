<?php
return array(
    //'配置项'=>'配置值'

    //mysql全局定义
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '139.129.27.123',
    'DB_USER' => 'root',
    'DB_PWD' => '123456',
    'DB_NAME' => 'humanresource',
    'DB_PORT' => 3306,
    'DB_PREFIX' => '',

    //页面调试工具
    //'SHOW_PAGE_TRACE' => true,

    //启用路由
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        array('test', 'Index/test', array('method' => 'post')),
        array('reportManagement', 'ProvincialUser/reportManagement', array('method' => 'post')),
        array('addNewUser', 'ProvincialUser/addNewUser', array('method' => 'post')),
        array('addResearch', 'ProvincialUser/addResearch', array('method' => 'post')),
        array('editResearch', 'ProvincialUser/editResearch', array('method' => 'post')),
        array('editPrivilege', 'ProvincialUser/editPrivilege', array('method' => 'post')),
    ),

    //从数据表读取字段信息时区分字段名的大小写
    'DB_PARAMS' => array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),


);








