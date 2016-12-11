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
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商品列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>商品名称</th>       
        <th>商品品牌</th>       
        <th>商品分类</th>       
        <th>商品属性</th>      
        <th>商品图片</th>    
        <th>商品描述</th>    
        <th>库存</th>    
        <th>是否上架</th>    
        <th>是否推荐</th>    
        <th>操作</th>    
      </tr> 
		<?php if(is_array($tref)): $i = 0; $__LIST__ = $tref;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ptt): $mod = ($i % 2 );++$i;?><tr align="center" valign="middle">
				<td name="ptti" id="ptti"><?php echo ($ptt["id"]); ?></td>
				<td><?php echo ($ptt["name"]); ?></td>
				<td><?php echo ($ptt["brand_name"]); ?></td>
				<td><?php echo ($ptt["cat_name"]); ?></td>
				<td><?php echo ($ptt["attr_name"]); ?></td>
				<td><?php echo ($ptt["price"]); ?></td>
				<td><img src="/Uploads/<?php echo ($ptt["img_url"]); ?>" width="50px" height="50px"/></td>
				<td><?php echo ($ptt["kucun"]); ?></td>
				<td><?php echo ($ptt["status"]); ?></td>
				<td><?php echo ($ptt["hot"]); ?></td>
				<td>
					<a class="button border-blue" href="<?php echo U('/Admin/Userhome/imgadd/imgid/'.$ptt['id']);?>" target="right"><span class="icon-trash-o"></span>添加相册</a> 
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
	<div class="form-group">
        <div class="label">
          <label for="sitename">提示信息：</label>
        </div>
        <div class="field">
          <label id="msg" style="line-height:33px;">
          
          </label>
        </div>
    </div>
	
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo ($pagestr); ?></div></td>
      </tr>
    </table>
  </div>
</form>

<script type="text/javascript">
$('.cart').click(function(){
	var reqdata = {gid:$(this).data("gid"),gnum:1};
	$.post("<?php echo U('/Admin/Mui/addcart');?>",reqdata,function(jsonobj){
		$('#msg').text(jsonobj.msg);
	},'json');
});
function formSubmit(){
	var url = "/Admin/Mui/index/name"+document.getElementById('ge').value;
	document.form1.action = url;
	document.form1.submit();
}
	
function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>