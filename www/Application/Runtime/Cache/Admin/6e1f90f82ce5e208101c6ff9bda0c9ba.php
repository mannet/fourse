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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 图片列表</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
    <div class="form-group">
	<img src="" width="130" height="130" id="pic"/>
        <div class="label">
          <label for="sitename">商品图片：</label>
        </div>
		<div class="field">
			<?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imglist): $mod = ($i % 2 );++$i;?><img src="/Uploads/<?php echo ($imglist["img_url"]); ?>" width="50" height="50"/><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
    </form>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('img').hover(function(){
			var pl = $(this).attr('src');
			$('#pic').attr('src',pl);
		});
		
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
		var htmlstr = "";
		var inputstr = "";
		$('#file_upload').uploadify({
			'swf'      : '/Public/swf/uploadify.swf',
			'uploader' : '/Admin/upload/uploadify',
			'buttonText' : '商品图片',
			'onUploadSuccess' : function(file, data, response) {
				htmlstr+='<img src="/Uploads/'+data+'" width="130" height="130" border="0"/>';
				inputstr+='<input type="hidden" name="img_url[]" value="'+data+'"/>'
				$('#imglist').html(htmlstr);
				$('#getwww').html(inputstr);
			},
		});
	});
</script>
</body>
</html>