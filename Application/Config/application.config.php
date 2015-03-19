<?php
/**
 * 该文件是一个配置文件.
 *  通常来存放 数据库的信息和网站的一些默认信息
 */
return array(
    'DB'=>array(  //DB对应数据库的相关配置
        'host'=>'localhost',
        'user'=>'root',
        'password'=>'123456',
        'port'=>'3306',
         'dbname'=>'yongda',
        'prefix'=>'yd_'   //配置前缀
    ),
    'app'=>array( //配置默认的数据
        'default_platform'=>'Home',
        'default_controller'=>'Index',
        'default_action'=>'index',
    ),
    //前后台的配置信息
    'Admin'=>array(),
    'Home'=>array()
);