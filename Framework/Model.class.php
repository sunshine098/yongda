<?php

abstract class Model {
    protected $db; //不能够是private. 否则子类无法访问该db

    public  function __construct(){
        //构造函数在创建对象时就执行
        $this->initDB();
    }
    public function initDB(){
//        require FRAMEWORK_PATH.'DB.class.php';
//        $GLOBALS 中存放都是全局变量
        $this->db = DB::getInstance($GLOBALS['config']['DB']);
    }
}