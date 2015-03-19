<?php
/**
 * 这个model主要用来处理管理员的数据
 */
class AdminManagerModel extends Model{
    public function __construct(){
         //如果子类中使用到构造函数. 必须调用父类的构造函数来初始化db对象..
        parent::__construct();
    }
    public function checkLogin($username,$password){
        $adminPsd=md5(md5(trim($password)).'天下无敌');
        $sql = "select * from yd_admin where admin_name='$username' and admin_password='$adminPsd'";
        $row = $this->db->fetchRow($sql);  //查询不出来就是false
        return $row;
    }

    public function checkLoginByCookie($id,$password){
        $sql = "select * from yd_admin where admin_id = $id";
        $row = $this->db->fetchRow($sql);
        if(md5(md5($row['password'].'天下无敌'))==$password){
             return $row;
        }else{
            return false;
        }
    }
}