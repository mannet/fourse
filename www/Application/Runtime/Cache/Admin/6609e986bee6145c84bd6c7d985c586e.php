<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>ÍøÕ¾ÐÅÏ¢</title>  
    <link rel="stylesheet" href="/Public/css/pintuer.css">
    <link rel="stylesheet" href="/Public/css/admin.css">
    <script src="/Public/js/jquery-1.8.2.min.js"></script>
    <script src="/Public/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> åååè¡¨</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> å¨é</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> æ¹éå é¤</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>åååç§°</th>       
        <th>ååå¾ç</th>    
      </tr> 
		<?php if(is_array($tref)): $i = 0; $__LIST__ = $tref;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ptt): $mod = ($i % 2 );++$i;?><tr align="center" valign="middle">
				<td><?php echo ($ptt["id"]); ?></td>
				<td><?php echo ($ptt["name"]); ?></td>
				<td><img src="/Uploads/<?php echo ($ptt["logo"]); ?>" width="50px" height="50px"/></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
	
		<!--	
		<tr>
		  <td><input type="checkbox" name="id[]" value="1" />
			1</td>
		  <td>ç¥å¤</td>
		  <td>13420925611</td>
		  <td>564379992@qq.com</td>  
		   <td>æ·±å³å¸æ°æ²»è¡é</td>         
		  <td>è¿æ¯ä¸å¥åå°UIï¼åæ¬¢çæåè¯·å¤å¤æ¯æè°¢è°¢ã</td>
		  <td>2016-07-01</td>
		  <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> å é¤</a> </div></td>
		</tr>
        <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>ç¥å¤</td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>æ·±å³å¸æ°æ²»è¡é</td>         
          <td>è¿æ¯ä¸å¥åå°UIï¼åæ¬¢çæåè¯·å¤å¤æ¯æè°¢è°¢ã</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> å é¤</a> </div></td>
        </tr>
          <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>ç¥å¤</td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>æ·±å³å¸æ°æ²»è¡é</td>         
          <td>è¿æ¯ä¸å¥åå°UIï¼åæ¬¢çæåè¯·å¤å¤æ¯æè°¢è°¢ã</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> å é¤</a> </div></td>
        </tr>
          <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>ç¥å¤</td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>æ·±å³å¸æ°æ²»è¡é</td>         
          <td>è¿æ¯ä¸å¥åå°UIï¼åæ¬¢çæåè¯·å¤å¤æ¯æè°¢è°¢ã</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> å é¤</a> </div></td>
        </tr>
          <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>ç¥å¤</td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>æ·±å³å¸æ°æ²»è¡é</td>         
          <td>è¿æ¯ä¸å¥åå°UIï¼åæ¬¢çæåè¯·å¤å¤æ¯æè°¢è°¢ã</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> å é¤</a> </div></td>
        </tr>-->
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
	if(confirm("æ¨ç¡®å®è¦å é¤å?")){
		
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
		var t=confirm("æ¨ç¡®è®¤è¦å é¤éä¸­çåå®¹åï¼");
		if (t==false) return false; 		
	}
	else{
		alert("è¯·éæ©æ¨è¦å é¤çåå®¹!");
		return false;
	}
}

</script>
</body></html>