<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function reg(){
		$this->display();
	}
	public function addreg(){
		$name = I('post.name');
		$model = M('user')->where("name='{$name}'")->find();
		$password = md5(I('password'));
		$password1 = md5(I('password1'));
		if(empty($name) || empty($password) || empty($password1)){
			echo json_encode(['code' => 101,'msg' => '数据为空']);
			exit();
		}else{
			if(count($model)>0){
				echo json_encode(['code' => 102,'msg' => '用户名存在']);
				exit();
			}else{
				$modelt = M('user');
				$modelt->name = $name;
				$modelt->password = $password;
				$modelt->addtime = date('Y-m-d H:i:s');
				$re = $modelt->add();
				if($re){
					echo json_encode(['code' => 110,'msg' => '注册成功']);
					exit();
				}else{
					echo json_encode(['code' => 103,'msg' => '注册失败']);
					exit();
				}
			}
		}
	}
	public function login(){
		$this->display();
	}
	public function addlogin(){
		$name = I('post.name');
		$password = md5(I('post.password'));
		if(empty($name) || empty($password)){
			echo json_encode(['code' => 101,'msg' => '用户名或密码为空']);
			exit();
		}else{
			$map=[
				'name' => $name,
				'password' => $password
			];
			$data = M('user')->where($map)->find();
			if(count($data)>0){
				session('userid',$data['id']);
				session('username',$data['name']);
				echo json_encode(['code' => 110,'msg' => '登陆成功']);
				exit();
			}else{
				echo json_encode(['code' => 102,'msg' => '用户名或密码错误']);
				exit();
			}
		}
	}
	
	
	
	/*
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		$tableobj = M('goods_brand');
		if(I('name')){
			$wap['name'] = I('name');
			$whereArr['name'] = ['LIKE','%'.I('name').'%'];
			$wap['id'] = I('id');
			$whereArr['id'] = ['GT',I('id')];
		}
		$countnum = $tableobj->where($whereArr)->count();
		$page = new \Think\Page($countnum,5);
		foreach($wap as $key => $val){
			$page->parameter[$key] = urlencode($val);
		}
		$show = $page->show();
		$list = $tableobj->where($whereArr)->order('id')->limit($page->firstRow.','.$page->listRows)->select();
		$this -> assign('tref',$list);
		$this -> assign('page',$show);
		$this -> display();
	}*/
}