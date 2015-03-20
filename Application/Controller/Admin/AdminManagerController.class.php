<?php
/**
 * 这个控制器主要用来处理管理员的数据请求
 */
class AdminManagerController extends PlatformController{
    /**
     * 显示登录展示页面
     */
    public function loginAction(){
       $username = isset($_COOKIE['username'])?$_COOKIE['username']:'';
       $this->assign('username',$username);
       $this->display('login.html');
    }

    /**
     * 处理登录验证
     */
    public function checkLoginAction(){
        new SessionDBTool();
        //接受用户输入的验证码和session中的验证码进行比对
        if(!CaptchaTool::check($_POST['captcha'])){
                $this->redirect('index.php?p=Admin&c=AdminManager&a=login','验证输入错误',2);
        }
        //>>1.接收请求参数
        $username = $_POST['username'];
        $password = $_POST['password'];

        $adminManagerModel = new AdminManagerModel();
        $result = $adminManagerModel->checkLogin($username,$password);
        //>>3.根据验证的结果选择视图
        if($result){
            //保持登录信息
            $_SESSION['isLogin'] = 'yes';
           // setcookie('isLogin','yes');
            setcookie('username',$username,time()+60*60*24*30,'/','.yongda.com');
            //判断用户是否选择了  保持登录信息(自动登录的信息)
            if(isset($_POST['remember'])){
                setcookie('id',$result['id'],time()+60*60*24*30,'/','.yongda.com');
                setcookie('password',md5($result['password'] . '天下无敌'),time()+60*60*24*30,'/','.yongda.com');
            }
            //记录当前登录的时间
            setcookie('prelogintime',isset($_COOKIE['lastlogintime'])?$_COOKIE['lastlogintime']:time(),time()+60*60*24*30,'/','.yongda.com');
            setcookie('lastlogintime',time(),time()+60*60*24*30,'/','.yongda.com');
//            $ip=$this->getIPaddress();
//            $this->assign('ip',$ip);
            //登录成功之后直接跳转到后台
            $this->redirect('index.php?p=Admin&c=Index&a=index');
        }else{
            //跳转到登录页面
            $this->redirect('index.php?p=Admin&c=AdminManager&a=login','用户名或者密码出错!',2);
        }
    }
    
    /**
     * 退出系统的功能
     */
    public function exitSystemAction(){
           $_SESSION['isLogin']=null;
           $this->redirect('index.php?p=Admin&c=AdminManager&a=login','退出成功,系统将在2秒后自动退出!',2);
    }
    
    /**
     * 展示修改密码页面
     */
    public function showModifyAction(){
        $this->display('modify.html');
    }
    
    /**
     * 修改密码功能
     */
    public function modifyAction(){
        $adminManagerModel = new AdminManagerModel();
        $result= $adminManagerModel->modifyPass($_POST);
        if($result){
            $this->redirect('index.php?p=Admin&c=Index&a=right','修改密码成功了!',2);
        }else{
            $this->redirect('index.php?p=Admin&c=AdminManager&a=showModify','密码修改失败!',2);
        }
    }
    
    
}