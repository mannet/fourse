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
        <th>用户名</th>       
        <th>商品名称</th>       
        <th>商品价格</th>      
        <th>商品数量</th>      
        <th>商品图片</th>    
        <th>库存</th>    
      </tr> 
		<?php if(is_array($www)): $i = 0; $__LIST__ = $www;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ptt): $mod = ($i % 2 );++$i;?><tr align="center" valign="middle">
				<td><?php echo ($ptt["id"]); ?></td>
				<td><?php echo ($ptt["name"]); ?></td>
				<td><?php echo ($ptt["goodsname"]); ?></td>
				<td><?php echo ($ptt["price"]); ?></td>
				<td><?php echo ($ptt["num"]); ?></td>
				<td><img src="/Uploads/<?php echo ($ptt["goods_img"]); ?>" width="50px" height="50px"/></td>
				<td><?php echo ($ptt["kucun"]); ?></td>
				
			</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
	
	
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo ($pagestr); ?></div></td>
      </tr>
    </table>
  </div>
</form>

<script type="text/javascript">

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