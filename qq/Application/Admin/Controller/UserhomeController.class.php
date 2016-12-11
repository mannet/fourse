<?php
namespace Admin\Controller;
use Think\Controller;
class UserhomeController extends Controller {
    public function add(){
		$this -> display();
	}
	//商品添加
	public function goodsadd(){
		if(empty($_POST)){
			$brandlist = M('goods_brand')->select();
			$this->assign('brandlist',$brandlist);
			$catlist = M('goods_cat')->select();
			$this->assign('catlist',$catlist);
			$attrlist = M('goods_attr')->select();
			$this->assign('attrlist',$attrlist);
			$this->display();
		}else{
			$tableobj = M('goods');
			$tableobj->addtime = date('Y-m-d H:i:s');
			$tableobj->create();
			/*$id = I('stitle');
			$imgurl = I('pic');
			$brandid = I('sentitle');
			$name = I('surl');
			$brandid = I('sentitle');
			$miaoshu = I('sdescription');
			$catid = I('s_name');
			$price = I('s_phone');
			$attrid = I('s_tel');
			$addtime = date('y-m-d h:i:s');
			$kucun = I('s_fax');
			$status = I('s_qq');
			$tableobj->name = $name;
			$tableobj->img_url = $imgurl;
			$tableobj->brand_id = $brandid;
			$tableobj->miaoshu = $miaoshu;
			$tableobj->cat_id = $catid;
			$tableobj->price = $price;
			$tableobj->attr_id = $attrid;
			$tableobj->addtime = $addtime;
			$tableobj->kucun = $kucun;
			$tableobj->status = $status;*/
			$re = $tableobj->add();
			if(!$re){
				echo json_encode(['code' => 101,'msg' => '添加失败']);
				exit();
			}else{
				echo json_encode(['code' => 110,'msg' => '添加成功']);
				exit();
			}
		}
	}
	//品牌添加
	public function brandadd(){
		if(empty($_POST)){
			$this->display();
		}else{
			$name = I('name');
			$logo = I('pic');
			$tableobj = M('goods_brand');
			$tableobj->brand_name = $name;
			$tableobj->logo = $logo;
			$re = $tableobj->add();
			if(!$re){
				echo json_encode(['code' => 101,'msg' => '添加失败']);
				exit();
			}else{
				echo json_encode(['code' => 110,'msg' => '添加成功']);
				exit();
			}
		}
	}
	//分类添加
	public function catadd(){
		if(empty($_POST)){
			$catlist = M('goods_cat')->select();
			$this->assign('catlist',$catlist);
			$this->display();
		}else{
			$name = I('name');
			$pid = I('cat_id');
			$tableobj = M('goods_cat');
			$tableobj->cat_name = $name;
			$tableobj->pid = $pid;
			$re = $tableobj->add();
			if(!$re){
				echo json_encode(['code' => 101,'msg' => '添加失败']);
				exit();
			}else{
				echo json_encode(['code' => 110,'msg' => '添加成功']);
				exit();
			}
		}
	}
	//属性添加
	public function attradd(){
		if(empty($_POST)){
			$this->display();
		}else{
			$name = I('name');
			$tableobj = M('goods_attr');
			$tableobj->attr_name = $name;
			$re = $tableobj->add();
			if(!$re){
				echo json_encode(['code' => 101,'msg' => '添加失败']);
				exit();
			}else{
				echo json_encode(['code' => 110,'msg' => '添加成功']);
				exit();
			}
		}
	}
	//商品多表输出
	public function goodslist(){
		$model = M('goods');
		$recordcount=$model->count();
		$page = new \Think\Page($recordcount,5);
		$page->lastSuffix=false;
		$page->rollPage=4;
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		$startno=$page->firstRow;
		$pagesize=$page->listRows;
		$list=$model->join('my_goods_brand on my_goods.brand_id=my_goods_brand.id')->join('my_goods_cat on my_goods.cat_id=my_goods_cat.id')->join('my_goods_attr on my_goods.attr_id=my_goods_attr.id')->field("my_goods.*,my_goods_brand.brand_name,my_goods_cat.cat_name,my_goods_attr.attr_name")->limit("$startno,$pagesize")->select();
		$pagestr=$page->show();
		$this -> assign('tref',$list);
		$this -> assign('pagestr',$pagestr);
		$this->display();
	}
	//添加相册
	public function imgadd(){
		$imgid = I('imgid');
		$model = M('goods_img')->where("goodsid=$imgid and del=0")->select();
		$this->assign('uuo',$imgid);
		$this->assign('imglist',$model);
		$this->display();
	}
	public function addimg(){
		if(IS_POST){
			$model = M('goods_img');
			$imgurl = I('imgid');
			$imgwww = I('img_url');
			if($imgwww!='' && count($imgwww)>0){
				$num=0;
				foreach($imgwww as $key => $value){
					$model->img_url = $value;
					$model->goodsid = $imgurl;
					$re = $model->add();
					if($re){
						$num++;
					}
				}
				if($num!=count($imgwww)){
					echo json_encode(['code' => 101,'msg' => '添加失败']);
					exit();
				}else{
					echo json_encode(['code' => 110,'msg' => '添加成功']);
					exit();
				}
			}
			$imge = I('imge');
			if($imge!='' && count($imge)>0){
				$getsum = 0;
				foreach($imge as $key => $value){
					$re1 = $model->where("id=$value")->save(['del' => 1]);
					if($re1){
						$getsum++;
					}
				}
				if($getsum != count($imge)){
					echo json_encode(['code' => 101,'msg' => '删除失败']);
					exit();
				}else{
					echo json_encode(['code' => 110,'msg' => '删除成功']);
					exit();
				}
			}
		}
		
	}
	//个人信息
	public function myself(){
		$uid = session('userid');
		$model = M('user')->where($uid)->find();
		$this->assign('userid',$model);
		$this -> display();
	}
	//个人信息修改
	public function myselfadd(){
		$uid = session('userid');
		$model = M('user')->where($uid)->find();
		$this->assign('userid',$model);
		$this -> display();
	}
	public function saveself(){
		$uid = session('userid');
		$name = I('name');
		$sname = I('sname');
		$zhuzhi = I('zhuzhi');
		$jia = I('jia');
		$arr = [
			'name' => $name,
			'sname' => $sname,
			'zhuzhi' => $zhuzhi,
			'jia' => $jia
		];
		$model = M('user')->where("id=$uid")->save($arr);
		if($model){
			$this->redirect('/Admin/Userhome/add',[],1,'');
		}else{
			alert('修改失败');
		}
	}
	//订单详情
	public function dingdan(){
		$model = M('goods_dingdan')->join('my_goods on my_goods_dingdan.goods_id=my_goods.id')->field('my_goods_dingdan.*,my_goods.*')->select();
		$this->assign('tt',$model);
		$this->display();
	}
}