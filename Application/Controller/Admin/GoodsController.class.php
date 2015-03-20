<?php
/**
 * 专门用来处理商品
 */
class GoodsController extends PlatformController {
    /**
     * 显示商品展示页面
     */
    public function showGoodsAction(){
        $this->display('showGoods.html');
    }
    
    /**
     * 显示添加商品页面
     */
    public function showAddGoodsAction(){
        $goodsModel=new GoodsModel();
        $rows=$goodsModel->getAllCategory();
        $this->assign('rows', $rows);
        $this->display('addGoods.html');
    }
    /**
     * 将管理员的添加商品额求情给此控制器的addGoods方法来处理
     */
    public function addGoodsAction(){
        $goodsModel=new GoodsModel();
        $goodsModel->insert();
    }
    
}
