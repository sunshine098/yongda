<?php
/**
 * 这个model主要用来处理管理员的数据
 */
class AdminManagerModel extends Model{
    
    public function __construct(){
         //如果子类中使用到构造函数. 必须调用父类的构造函数来初始化db对象..
        parent::__construct();
    }
    /**
     * 校验登录
     */
    public function checkLogin($username,$password){
        $adminPsd=md5(md5(trim($password)).'天下无敌');
        $sql = "select * from yd_admin where admin_name='$username' and admin_password='$adminPsd'";
        $row = $this->db->fetchRow($sql);  //查询不出来就是false
        return $row;
    }
    /**
     * 检查是否登录
     */
    public function checkLoginByCookie($id,$password){
        $sql = "select * from yd_admin where admin_id = $id";
        $row = $this->db->fetchRow($sql);
        if(md5(md5($row['password'].'天下无敌'))==$password){
             return $row;
        }else{
            return false;
        }
    }
    /**
     * 修改密码功能
     */
    public function modifyPass($_POST){
        $prePwd=md5(md5(trim($_POST['prePwd'])).'天下无敌');
        $newPwd=md5(md5(trim($_POST['newPwd'])).'天下无敌');
        $confirmPwd=md5(md5(trim($_POST['confirmPwd'])).'天下无敌');
        $sql="select * from yd_admin where `admin_name`='{$_COOKIE['username']}'";
        $row=$this->db->fetchRow($sql);
        if($prePwd===$row['admin_password'] && trim($_POST['newPwd'])===trim($_POST['confirmPwd'])){
            $sql="update yd_admin set  `admin_password`='$newPwd'  where `admin_id`={$row['admin_id']}";
            return $this->db->query($sql);
        }
        return false;
    }
}