<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $model = M('goods')->select();
        $modele = M('goods_cat')->where("pid=0")->select();
		$this->assign('goods',$model);
		$this->assign('alist',$modele);
		$this -> display();
	}
	public function goods(){
		$id = I('id');
		$model = M('goods')->where("id=$id")->find();
		$this->assign('goods',$model);
		$model1 = M('goods_img')->where("goodsid=$id")->select();
		$this->assign('goosd_img',$model1);
		$this->assign('uuo',$id);
		$this->display();
	}
	public function addcart(){
		$uid = session('userid');
		$uname = session('username');
		$gid = I('gid');
		$gnum = I('gnum');
		$map = [
			'userid' => $uid,
			'goods_id' => $gid
		];
		$data = M('goods_cart')->where($map)->find();
		if(count($data)>0){
			//修改数据
			$id = $data['id'];
			$map=[
				'num' => (int)$data['num']+1,
				//'price' => (int)$data['price']*(int)$data['num']+(int)$data['price']
			];
			$data1 = M('goods_cart')->where("id=$id")->save($map);
			echo json_encode(['code' => 105,'msg' => '加入购物车成功']);
			exit();
		}else{
			$data3 = M('goods')->where("id=$gid")->find();
			$data2 = M('goods_cart');
			$data2->userid = $uid;
			$data2->goods_id = $gid;
			$data2->name = $uname;
			$data2->goodsname = $data3['name'];
			$data2->goods_img = $data3['img_url'];
			$data2->price = $data3['price'];
			$data2->kucun = $data3['kucun'];
			$data2->num = $gnum;
			$result = $data2->add();
			if($result){
				echo json_encode(['code' => 110,'msg' => '亲，已加入购物车!']);
				exit();
			}else{
				echo json_encode(['code' => 106,'msg' => '加入购物车失败!']);
				exit();
			}
		}
	}
	public function flow1(){
		$uid = session('userid');
		$model = M('goods_cart')->join("my_goods on my_goods_cart.goods_id = my_goods.id","left")->join("my_goods_attr on my_goods_cart.attr_id = my_goods_attr.id","left")->field("my_goods_cart.*,my_goods.miaoshu,my_goods_attr.attr_name")->where("my_goods_cart.del=0 and my_goods_cart.userid=$uid")->select();
		$this->assign('cartlist',$model);
		$this->display();
	}
	public function delcart(){
		if(IS_POST){
			$id=I('id');
			$model=M('goods_cart')->where("id=$id")->save(['del' => 1]);
		}
	}
	public function updatecart(){
		$id=I('id');
		$num=I('getnum');
		$model=M('goods_cart')->where("id='$id'")->save(['num' => $num]);
	}
	public function flow2(){
		$userid=session('userid');
		if(empty($userid)){
			$this->redirect('/Home/User/login',array(),2,'请先登录');
		}
		$model=M('goods_cart')->join("my_goods on my_goods_cart.goods_id = my_goods.id","left")->join("my_goods_attr on my_goods_cart.attr_id = my_goods_attr.id","left")->field("my_goods_cart.*,my_goods.miaoshu,my_goods_attr.attr_name")->where("my_goods_cart.status=1 and my_goods_cart.userid=$userid and my_goods_cart.del=0")->select();
		$qian=0;
		$goods_id='';
		foreach($model as $key=>$value){
			$qian+=(float)$value['price']*(int)$value['num'];
		}
		if($qian>=50){
			$yunfei = 0;
		}else{
			$yunfei = 10;
		}
		$this->assign('flow2',$model);
		$this->assign('goodsprice',$qian);
		$qian+=$yunfei;
		$this->assign('qian',$qian);
		$this->assign('yunfei',$yunfei);
		$this->assign('result',$result);
		$suijishu = date("YmdHis").rand(100,999);
		session('suijishu',$suijishu);
		session('wqian',$qian);
		$this->display();
	}
	public function upstatus(){
		$id = I('id');
		$data = M('goods_cart')->where("id=$id")->find();
		if(empty($data)){
			echo json_encode(['code' => 104,'msg' => '无记录!']);
			exit();
		}else{
			$status = $data["status"]==1 ? 0 : 1;
			$model = M('goods_cart')->where("id=$id")->save(['status' => $status]);
		}
	}
	public function flow3(){
		//$dingdan = session('suijishu');
		//$uid = session('userid');
		//$tableobj = M('goods_cart')->where("userid=$uid")->find();
		//$model = M('goods_dingdan');
		//$model->goods_id = $tableobj['goods_id'];
		//$model->dingdan = $dingdan;
		//$model->user_id = $uid;
		//$model->add();
		//$order = M('goods_dingdan')->where("dingdan=$dingdan")->find();
		//$this->assign('order',$order);
		//$this->assign('dingdan',$dingdan);
		//$this->display();
		$uid=session("userid");
		if(empty($uid)){
			$this->redirect('User/login',[],1,'页面跳转中....');
		}else{
			$dingdan = session('suijishu');
			$qian =session("wqian");
			$moble=M("goods_dingdan");
			$moble->dingdan=$dingdan;
			$moble->user_id=$uid;
			$moble->zongjia=$qian;
			$moble->addtime=date("Y-m-d H:i:s");
			$sqq=$moble->add();
			session("sqq",$sqq);
			$result=M('goods_cart')->join("my_goods on my_goods.id=my_goods_cart.goods_id")->field("my_goods.*,my_goods_cart.num")->where("my_goods_cart.userid=$uid and my_goods_cart.status=1")->select();
			$moblie=M("goods_order");
			foreach($result as $key => $value){
				$qq=$moblie->order_id=session("sqq");
				
				$moblie->order_sn=$dingdan;
				$moblie->goods_id=$value['id'];
				$moblie->goods_price=$value['price'];
				$moblie->goods_num=$value['num'];
				$moblie->goods_ord=(float)($value['num']*$value['price']);
				$sqqq=$moblie->add();
			}
			//foreach($ee as $val){
			//$order_id=$sqq;
			//$moble->order_sn=$re;
			//$moble->good_id=$val;
			//$moble->goods_num=$;
			//$moble->addtime=date("Y-m-d H:i:s");
			//
			
			$dele = M('goods_cart')->where("status=1")->save(['del' => 1]);
			$order = M('goods_dingdan')->where("dingdan=$dingdan")->find();
			$this->assign('order',$order);
			$this->assign('dingdan',$dingdan);
			$this->display();
		}
	}
	public function dingdanlist(){
		$User = M('goods_dingdan'); // 实例化User对象
		
		$count= $User->where('del=0')->count();// 查询满足要求的总记录数	
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		foreach($map as $key=>$val) {
			$Page->parameter[$key] = urlencode($val);
		}

		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->join("my_user on my_user.id=my_goods_dingdan.user_id")->field("my_goods_dingdan.*,my_user.name")->where('del=0')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	public function orderlist(){
		$order_id=I("orderid");
		$model=M("goods_dingdan")->join("my_user on my_user.id=my_goods_dingdan.user_id")->field("my_goods_dingdan.*,my_user.name")->where("my_goods_dingdan.id=$order_id")->select();
		$modeil=M("goods_order")->join("my_goods on my_goods.id=my_goods_order.goods_id")->field("my_goods.name,my_goods_order.*")->where("my_goods_order.order_id=$order_id")->select();
		foreach($modeil as $key => $value){
			$qian +=(float)$value['goods_price']*(int)$value['goods_num'];
			$qian=(float)$qian;
		}
		if($qian>=50){
			$yunfei=0;
		}else{
			$yunfei=10;
		}
		$this->assign('goodsprice',$qian);
		$qian +=$yunfei;
		//session('wqian',$qian);
		$this->assign('qian',$qian);
		$this->assign('yunfei',$yunfei);
		$this->assign('list',$model);
		$this->assign("modeil",$modeil);
		$this->display();
	}
}



















