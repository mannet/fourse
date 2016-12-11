<?php
namespace Admin\Controller;
use Think\Controller;
class MuiController extends Controller {
    public function index(){
		$this -> display();
	}
	public function aa(){
		$keyarr = [];
		foreach($person as $myarr){
			$keyarr[] = $myarr['id'];
		}
		array_multisort($keyarr,SORT_ASC,SORT_STRING,$person);
		var_dump($person);
	}
	public function book1(){
		/*$model=M('goods_brand');
        $recordcount=$model->count();   //总记录数
        $page=new \Think\Page($recordcount,5);
		$page->lastSuffix=false;    //最后一页是否显示总页数
        $page->rollPage=4;          //分页栏每页显示的页数
        $page->setConfig('prev', '下一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('first', '【首页】');
        $page->setConfig('last', '【末页】');        
        $page->setConfig('theme', '共 %TOTAL_ROW% 条记录,当前是 %NOW_PAGE%/%TOTAL_PAGE% %FIRST% %UP_PAGE%  %DOWN_PAGE% %END%');
        $startno=$page->firstRow;   //起始行数
        $pagesize=$page->listRows;  //页面大小
        $list=$model->limit("$startno,$pagesize")->select();
        $pagestr=$page->show(); //组装分页字符串
        $this->assign('tref',$list);
        $this->assign('pagestr',$pagestr);
        $this->display();*/

		$model = M('goods_brand');
		$recordcount=$model->count();
		$page = new \Think\Page($recordcount,5);
		$page->lastSuffix=false;
		$page->rollPage=4;
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		//$page->setConfig('theme', '共 %TOTAL_ROW% 条记录,当前是 %NOW_PAGE%/%TOTAL_PAGE% %FIRST% %UP_PAGE%  %DOWN_PAGE% %END%');
		$startno=$page->firstRow;
		$pagesize=$page->listRows;
		$list=$model->limit("$startno,$pagesize")->select();
		//$list = $model->order('id')->limit($page->firstRow.','.$page->listRows)->select();
		$pagestr=$page->show();
		$this -> assign('tref',$list);
		$this -> assign('pagestr',$pagestr);
		//$this -> assign('page',$pagestr);
		$this->display();
		
		
		/*
		$tableobj = M('goods_brand');
		$countnum = $tableobj->count();
		$page = new \Think\Page($countnum,5);
		$show = $page->show();
		$list = $tableobj->order('id')->limit($page->firstRow.','.$page->listRows)->select();
		$this -> assign('tref',$list);
		$this -> assign('page',$show);
		$this -> display();*/
	}
	//商品添加
	public function info(){
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
	public function pass(){
		if(empty($_POST)){
			$this->display();
		}else{
			$name = I('name');
			$logo = I('pic');
			$tableobj = M('goods_brand');
			$tableobj->name = $name;
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
	 public function pass1(){
		if(empty($_POST)){
			$this->display();
		}else{
			$name = I('name');
			$tableobj = M('goods_cat');
			$tableobj->name = $name;
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
	 public function pass2(){
		if(empty($_POST)){
			$this->display();
		}else{
			$name = I('name');
			$tableobj = M('goods_attr');
			$tableobj->name = $name;
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
	//商品分类
	public function checkname(){
		$name = I('post.name','');
		if(empty($name)){
			echo json_encode(['code' => 103,'msg' => '为空']);
			exit();
		}else{
			$result = M('goods')->where("name='{$name}'")->find();
			if($result){
				echo json_encode(['code' => 104,'msg' => '数据存在']);
				exit();
			}else{
				echo json_encode(['code' => 110,'msg' => '可以添加']);
				exit();
			}
		}
	}
	public $str;
	public function get_str($id = 0) { 
		$result = M('goods_class')->where("pid=$id")->select();
		if(count($result)>0){//如果有子类 
			$this->str .= '<ul>'; 
			foreach($result as $key => $row) { //循环记录集 
				$this->str .= "<li>" . $row['id'] . "--" . $row['name'] . "</li>"; //构建字符串 
				$this->get_str($row['id']); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 
			} 
			$this->str .= '</ul>'; 
		} 
		return $this->str; 
	} 
	public function info1(){
		$aa = $this->get_str(0);
		echo $aa;
		//$this->display();
	}
	//留言管理
	public function book(){
		$alist = M('goods_brand')->select();
		$this->assign('brandlist',$alist);
		$this->display();
	}
	//相册  图片信息列表
	public function info2(){
		$imgid = I('imgid');
		$this->assign('uuo',$imgid);
		$model = M('goods_img')->where('del=0')->select();
		$this->assign('imglist',$model);
		$this->display();
	}
	public function addinfo(){
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
	//商品列表
	public function price1(){
		$model = M('goods')->select();
		$this->assign('tref',$model);
		$model = M('goods');
		$recordcount=$model->count();
		$page = new \Think\Page($recordcount,5);
		$page->lastSuffix=false;
		$page->rollPage=4;
		$startno=$page->firstRow;
		$pagesize=$page->listRows;
		$list=$model->limit("$startno,$pagesize")->select();
		$pagestr=$page->show();
		$this -> assign('tref',$list);
		$this -> assign('pagestr',$pagestr);
		$this->display();
	}
	public function addcart(){
		$uid = session('userid');
		$uname = session('username');
		$gid = I('gid');
		$gnum = I('gnum');
		$map = [
			'userid' => $uid,
			'goodsid' => $gid
		];
		$data = M('goods_cart')->where($map)->find();
		if(count($data)>0){
			//修改数据
			$id = $data['id'];
			$map=[
				'num' => (int)$data['num']+1,
				'price' => (int)$data['price']*(int)$data['num']+(int)$data['price']
			];
			$data1 = M('goods_cart')->where("id=$id")->save($map);
			echo json_encode(['code' => 105,'msg' => '宝贝已经在购物车中']);
			exit();
		}else{
			$data3 = M('goods')->where("id=$gid")->find();
			$data2 = M('goods_cart');
			$data2->userid = $uid;
			$data2->goodsid = $gid;
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
	//图片列表
	public function plist(){
		$imagee = M('goods_img')->select();
		$this->assign('plist',$imagee);
		$this->display();
	}
	//购物车
	public function shopping(){
		$model = M('goods_cart')->select();
		$this->assign('www',$model);
		$this->display();
	}
	
}
