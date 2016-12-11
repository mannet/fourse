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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 商品添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/Admin/Mui/info">
      <div class="form-group">
        <div class="label">
          <label>ID：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="id" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>商品名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" id="name" value="" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>品牌ID：</label>
        </div>
        <div class="field">
			<select name="brand_id" id="brand_id" class="input" style="width:200px;line-height:17px;">
				<option value="">请选择品牌</option>
				<?php if(is_array($brandlist)): foreach($brandlist as $k=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; ?>
			</select>
          <!--<input type="text" class="input" name="sentitle" value="" />-->
          <div class="tips"></div>
        </div>
      </div>
	 
    <!--   <div class="form-group">
       <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="skeywords" style="height:80px"></textarea>
          <div class="tips"></div>
        </div>
      </div>-->
      <div class="form-group">
        <div class="label">
          <label>商品描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="miaoshu"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类ID：</label>
        </div>
        <div class="field">
          <select name="cat_id" id="cat_id" class="input" style="width:200px;line-height:17px;">
				<option value="">请选择分类</option>
				<?php if(is_array($catlist)): foreach($catlist as $k=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; ?>
			</select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>商品价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="price" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>属性ID：</label>
        </div>
        <div class="field">
          <select name="attr_id" id="attr_id" class="input" style="width:200px;line-height:17px;">
				<option value="">请选择品牌</option>
				<?php if(is_array($attrlist)): foreach($attrlist as $k=>$row): ?><option value="<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></option><?php endforeach; endif; ?>
			</select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none;">
        <div class="label">
          <label>录入时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="addtime" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>库存：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="kucun" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>是否上架：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="status" value="" />
          <div class="tips"></div>
        </div>
      </div>
	  <div class="form-group">
        <div class="label">
          <label for="sitename">商品图片：</label>
        </div>
        <div class="field">
			<div class="avatar_box"> 
				<img id="image" src="" width="130" height="130" border="0" />
				<div class="upload_avatar"><input id="file_upload" name="file_upload" type="file" multiple="true" value="" /></div>
				<input type="hidden" name="img_url" id="img_url" />
			</div>
        </div>
      </div> 
	  <div class="form-group">
        <div class="label">
          <label for="sitename">提示信息：</label>
        </div>
        <div class="field">
          <label id="msg" style="line-height:33px;">
          
          </label>
        </div>
    </div>
      <!--<div class="form-group" style="display:none">
        <div class="label">
          <label>QQ群：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qqu" value="" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>Email：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_email" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_address" value="" />
          <div class="tips"></div>
        </div>
      </div>  
              
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea name="scopyright" class="input" style="height:120px;"></textarea>
          <div class="tips"></div>
        </div>
      </div>-->
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