<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends Controller {
    public function uploadify(){
		if (!empty($_FILES)) {
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize = 1024000 ;// 设置附件上传大小字节
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录
			$upload->savePath = ''; // 设置附件上传（子）目录
			// 上传文件
			$info = $upload->upload();
			if(!$info) {// 上传错误提示错误信息
				echo 'fail';
			}else{// 上传成功
				foreach($info as $key => $value){
					//echo $data[$key]['path'] = './Uploads/'.$value['savename'];//这里以获取在本地的保存路径为例
					echo $info['Filedata']['savepath'].$info['Filedata']['savename'];
				}
				
			}	
			//import('ORG.Net.UploadFile');
			//$upload = new \Think\Upload();// 实例化上传类
			//$upload->maxSize = 3145728 ;// 设置附件上传大小
			//$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			//$upload->rootPath = './Uploads/'; // 设置附件上传根目录
			//$upload->savePath = ''; // 设置附件上传（子）目录
			//if(!$upload->upload()){
				//$this->error($upload->getErrorMsg());die;//输出错误提示
			//}else{
				//$info = $upload->getUploadFileInfo(); //取得成功上传的文件信息
				//foreach($info as $key => $value){
					//$data[$key]['path'] = './Uploads/'.$value['savename'];//这里以获取在本地的保存路径为例
				//}
			//}			
		}
	}
}
