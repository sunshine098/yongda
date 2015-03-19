<?php
/**
 * 这个控制器主要是用来处理前台的数据请求
 */
class IndexController extends Controller{
//当用户输入www.yongda.com的时候,让入口文件index.php来分配控制器,并调用相关方法!!
    public function indexAction(){
        $this->display('index.html');
    }
}