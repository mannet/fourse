<?php
header("Access-Control-Allow-Origin:*");
header("Content-type:text/html;charset=uft-8");
class Api_Jiang extends PhalApi_Api{
	public function jiang(){
		$order_id = $_POST['order_id'];
		$user_id = $_POST['user_id'];
		$userprize = DI()->notorm->userprize;
		$row = $userprize->where('order_id',$order_id)->fetch();
		$rs = array();
		if(is_array($row)){
			$rs['code'] = 1;
			$rs['content'] = '已经抽过';
		}else{
			$row = DI()->notorm->prize->where("num>0")->fetchAll();
			$jkey = array_rand($row,1);
			
			$array = $row[$jkey];
			$item = (int)$array['item'];
			$newarr = [$item,4,0];
			$dkey = array_rand($newarr,1);
			$item = (int)$newarr[$dkey];
			if($item==4 || $item==0){
				$prizename = '未中奖，谢谢参与';
				$jian = false;
			}else{
				$prizename = $array['name'];
				$jian = true;
			}
			$data = [
				'user_id' => $user_id,
				'order_id' => $order_id,
				'prizename' => $prizename,
				'addtime' => date('Y-m-d H:i:s')
			];
			$userprize->insert($data);
			$id = $userprize->insert_id();
			if($id<=0){
				$rs['code'] = 1;
				$rs['content'] = '服务器异常';
			}else{
				$rs['code'] = 0;
				if($jian){
					$newnum = (int)$array['num']-1;
					$updata = ['num'=>$newnum];
					DI()->notorm->prize->where('id',$array['id'])->update($updata);
				}
				$rs['item'] = $item;
			}
		}
		return $rs;
		
	}
}