<?php
/**
 * 专门用来处理商品的模型
 */
class GoodsModel extends Model {
    
    /**
     * 查询出表中的所有数据
     */
    public function getAllCategory(){
        $rows=$this->db->fetchAll('select * from yd_category');
        return $this->getTree($rows,0);
    }

    /**
     * 获取商品的分类
     */
    public function  getTree(&$rows,$parent_id =0,$deep = 0){
        static $tree = array();
        foreach($rows as $row){
            if($row['parent_id']==$parent_id){  //递归出口
                $row['deep'] = $deep;
                $row['name_text'] = str_repeat('&nbsp;',$deep*3).$row['category_name'];
                $tree[] = $row;
                $this->getTree($rows,$row['category_id'],$deep+1); //递归入口
            }
        }
        return $tree;
    }
    
    /**
     * 处理管理员添加商品功能
     * 此处可以接收到控制器传过来的$_POST和$_FILES
     */
    public function insert(){
        echo '你好';
    }
}
