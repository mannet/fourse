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
<script type="text/javascript" src="/Public/js/jquery.uploadify.min.js"></script>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 个人信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
	
      <div class="form-group">
        <div class="label">
          <label>ID：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="id" value="<?php echo ($userid["id"]); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" id="name" value="<?php echo ($userid["name"]); ?>" disabled="disabled"/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>头像：</label>
        </div>
        <div class="field">
          <img id="image" src="/Uploads/<?php echo ($userid["img_url"]); ?>" width="130" height="130" border="0" />
        </div>
      </div>
	  <div class="form-group">
        <div class="label">
          <label>真实姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="sname" id="sname" value="<?php echo ($userid["sname"]); ?>" disabled="disabled"/>
        </div>
      </div>
	  <div class="form-group">
        <div class="label"> 
          <label>性别：</label>
        </div>
        <div class="field">
          <input type='text' class='input' name='sex' id='sex' disabled='disabled' value='<?php echo ($userid["sex"]); ?>' />
        </div>
      </div>
	  <div class="form-group">
        <div class="label">
          <label>生日：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="birthday" id="birthday" disabled="disabled" value="<?php echo ($userid["birthday"]); ?>" />
        </div>
      </div>
	  <div class="form-group">
        <div class="label">
          <label>居住地：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="zhuzhi" id="zhuzhi" disabled="disabled" value="<?php echo ($userid["zhuzhi"]); ?>" />
        </div>
      </div>
	  <div class="form-group">
        <div class="label">
          <label>家乡</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="jia" id="jia" disabled="disabled" value="<?php echo ($userid["jia"]); ?>" />
        </div>
      </div>
	 
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <a class="button bg-main icon-check-square-o" href="<?php echo U('/Admin/Userhome/myselfadd');?>"> 修改</a>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#name').blur(function(){
			var name = $(this).val();
			var reqdata = {name:name};
			$.post("/Admin/Mui/checkname",reqdata,function(jsonobj){
				$('#name').after('<div class="input-help" id="aa" style="display:block;"><ul><li style="color:#e33;">'+jsonobj.msg+'</li></ul></div>');
			},'json');
		});
		$('#name').focus(function(){
			$('#aa').css('display','none');
		});
		$('#file_upload').uploadify({
			'swf'      : '/Public/swf/uploadify.swf',
			'uploader' : '/Admin/upload/uploadify',
			'buttonText' : '商品图片',
			'onUploadSuccess' : function(file, data, response) {
				$('#image').attr('src','/Uploads/'+data);
				$('#img_url').val(data);
			},
		});
	});
</script>
</body>
</html>