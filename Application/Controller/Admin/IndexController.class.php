<?php
/**
 * 加载后台框架代码必须使用单入口
 */
class IndexController extends PlatformController{
    
    public function indexAction(){
        $this->display('index.html');
    }
    
    public function headAction(){
        $this->display('head.html');
    }
    
    public function leftAction(){
        $this->display('left.html');
    }
    
    public function rightAction(){
        $this->display('right.html');
    }
    
}