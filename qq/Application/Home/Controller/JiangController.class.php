<?php
namespace Home\Controller;
use Think\Controller;
class JiangController extends Controller {
	public function jiang(){
		$order_id = I('id');
		$uid = session('userid');
		$map = [
			'id' => $order_id,
			'user_id' => $uid
		];
		$orderdata = M('goods_dingdan')->where($map)->find();
		if(count($orderdata)==0){
			$this->redirect('/Home/Index/index',[],3,'您的订单没有数据……');
		}else{
			$userprizedata = M('userprize')->where($map)->find();
			if(count($userprizedata)>0){
				$this->redirect('/Home/Index/index',[],3,'您的订单已抽奖……');
			}else{
				$this->assign('order_id',$order_id);
				$this->display();
			}
		}
		
		
		
		
		//$prize = M('userprize');//实例化表
        //$data= $prize->select();
        //$this->assign('data',$data);// assign 方法对模板变量赋值
        //$this->display();
	}
	//public function prize(){
		
		//$this->assign('order_id',I('get.id'));
        //$this->display();
	//}
}