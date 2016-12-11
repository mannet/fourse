<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>��վ��Ϣ</title>  
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <link rel="stylesheet" href="/Public/css/admin.css">
    <script src="/Public/js/jquery-1.8.2.min.js"></script>
    <script src="/Public/js/pintuer.js"></script>  
</head>
<link rel="stylesheet" href="/Public/css/uploadify.css">
<script type="text/javascript" src="/Public/js/jquery.uploadify.min.js"></script><body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 品牌添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/Admin/Mui/pass">
	<div class="form-group">
        <div class="label">
          <label for="sitename">提示信息：</label>
        </div>
        <div class="field">
          <label id="msg" style="line-height:33px;">
          
          </label>
        </div>
    </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">品牌添加：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="name" name="name" size="50" placeholder="请输入品牌名称" data-validate="required:请输入品牌名称" />       
        </div>
      </div>  
	   <div class="form-group">
        <div class="label">
          <label for="sitename">品牌图标：</label>
        </div>
        <div class="field">
			<div class="avatar_box"> <img id="image" src="" width="130" height="130" border="0" />
				<div class="upload_avatar"><input id="file_upload" name="file_upload" type="file" multiple="true" value="" /></div>
				<input type="hidden" name="pic" id="pic" />
			</div>
        </div>
      </div>  
		<!--
      <div class="form-group">
        <div class="label">
          <label for="sitename">新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="renewpass" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致" />          
        </div>
      </div>
      -->
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#file_upload').uploadify({
			'swf'      : '/Public/swf/uploadify.swf',
			'uploader' : '/Admin/upload/uploadify',
			'buttonText' : '品牌图标',
			'onUploadSuccess' : function(file, data, response) {
				$('#image').attr('src','/Uploads/'+data);
				$('#pic').val(data);
			},
		});
	});
</script>
</body>
</html>