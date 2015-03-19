<?php
/**
 * 这个控制器主要用来处理生成验证码
 */
class CaptchaController extends Controller{
    public function indexAction(){
        CaptchaTool::generate(); 
    }
}