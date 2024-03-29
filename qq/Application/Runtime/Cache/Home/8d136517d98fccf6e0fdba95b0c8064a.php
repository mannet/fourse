<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>商品列表页</title>
	<link rel="stylesheet" href="/Public/css/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/header.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/list.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/common.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/css/footer.css" type="text/css">
	
	<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/js/header.js"></script>
	<script type="text/javascript" src="/Public/js/list.js"></script>
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>
						<?php  if(!$_SESSION['username']){ echo "[<a href='/Home/User/login'>登录</a>]"."[<a href='/Home/User/reg'>免费注册</a>]"; }else{ echo $_SESSION['username'].'欢迎来到京西！'; } ?>
					</li>
					<li class="line">|</li>
					<li><a href="/Home/Index/dingdanlist">我的订单</a></li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>

	<!-- 头部 start -->
	<div class="header w1210 bc mt15">
		<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
		<div class="logo w1210">
			<h1 class="fl"><a href="/Home/Index/index"><img src="/Public/images/logo.png" alt="京西商城"></a></h1>
			<!-- 头部搜索 start -->
			<div class="search fl">
				<div class="search_form">
					<div class="form_left fl"></div>
					<form action="" name="serarch" method="get" class="fl">
						<input type="text" class="txt" value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" />
					</form>
					<div class="form_right fl"></div>
				</div>
				
				<div style="clear:both;"></div>

				<div class="hot_search">
					<strong>热门搜索:</strong>
					<a href="">D-Link无线路由</a>
					<a href="">休闲男鞋</a>
					<a href="">TCL空调</a>
					<a href="">耐克篮球鞋</a>
				</div>
			</div>
			<!-- 头部搜索 end -->

			<!-- 用户中心 start-->
			<div class="user fl">
				<dl>
					<dt>
						<em></em>
						<a href="/Admin/Userhome/add">用户中心</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							<?php  if(!$_SESSION['username']){ echo "您好，请<a href='/Home/User/login'>登录</a>"; }else{ echo $_SESSION['username']; } ?>
						</div>
						<div class="uclist mt10">
						<?php  if(!$_SESSION['username']){ echo ''; }else{ echo "<ul class='list1 fl'>". "<li><a href='/Admin/Userhome/add'>用户信息></a></li>". "<li><a href='/Admin/Userhome/add'>我的订单></a></li>". "<li><a href='/Admin/Userhome/add'>收货地址></a></li>". "<li><a href='/Admin/Userhome/add'>我的收藏></a></li>". "</ul>". "<ul class='fl'>". "<li><a href='/Admin/Userhome/add'>我的留言></a></li>". "<li><a href='/Admin/Userhome/add'>我的红包></a></li>". "<li><a href='/Admin/Userhome/add'>我的评论></a></li>". "<li><a href='/Admin/Userhome/add'>资金管理></a></li>". "</ul>"; } ?>
							
						</div>
						<div style="clear:both;"></div>
						<div class="viewlist mt10">
							<h3>最近浏览的商品：</h3>
							<ul>
								<li><a href=""><img src="/Public/images/view_list1.jpg" alt="" /></a></li>
								<li><a href=""><img src="/Public/images/view_list2.jpg" alt="" /></a></li>
								<li><a href=""><img src="/Public/images/view_list3.jpg" alt="" /></a></li>
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			<!-- 用户中心 end-->

			<!-- 购物车 start -->
			<div class="cart fl">
				<dl>
					<dt>
						<a href="/Home/Index/flow1">去购物车结算</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							赶紧去购物车结算吧！
						</div>
					</dd>
				</dl>
			</div>
			<!-- 购物车 end -->
		</div>
		<!-- 头部上半部分 end -->
		
		<div style="clear:both;"></div>

		<!-- 导航条部分 start -->
		<div class="nav w1210 bc mt10"> 

			<div class="navitems fl">
				<ul class="fl">
					<li class="current"><a href="/Home/Index/index">首页</a></li>
					<li><a href="">电脑频道</a></li>
					<li><a href="">家用电器</a></li>
					<li><a href="">品牌大全</a></li>
					<li><a href="">团购</a></li>
					<li><a href="">积分商城</a></li>
					<li><a href="">夺宝奇兵</a></li>
				</ul>
				<div class="right_corner fl"></div>
			</div>
		</div>
		<!-- 导航条部分 end -->
	</div>
	<!-- 头部 end-->

	<div style="clear:both;"></div>

	<!-- 列表主体 start -->
	<table class="mycart w990 mt10 bc">
      <tr style="font-size:20px;font-weight:bold;">
        <th></th>
        <th width="120">订单ID</th>
        <th>订单号</th> 
		<th>用户</th>
        <th>订单时间</th>
		<th>总价</th>
		
        <th>操作</th>       
      </tr>      
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="font-size:15px;font-weight:bold;">
				<td><input type="checkbox" name="id[]" value="1" /></td>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["dingdan"]); ?></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["addtime"]); ?></td>
				<td><?php echo ($vo["zongjia"]); ?></td>
				
				
				<td>
					<div class="button-group">
						<a class="button border-blue" href="<?php echo U('/Home/Index/orderlist/orderid/'.$vo['id']);?>">订单详情</a> 
						<a href="<?php echo U('/Home/Jiang/jiang/id/'.$vo['id']);?>">转盘抽奖</a> 
					</div>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
          
        
      <tr>
		
        <td colspan="7"><div class="pagelist"><?php echo ($page); ?><!-- <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div>--></td>
      </tr>
    </table>
			

			

	<!-- 列表内容 end -->

	<!-- 列表主体 end-->

	<div style="clear:both;"></div>
	<!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt20">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="">购物流程</a></li>
				<li><a href="">会员介绍</a></li>
				<li><a href="">团购/机票/充值/点卡</a></li>
				<li><a href="">常见问题</a></li>
				<li><a href="">大家电</a></li>
				<li><a href="">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="">上门自提</a></li>
				<li><a href="">快速运输</a></li>
				<li><a href="">特快专递（EMS）</a></li>
				<li><a href="">如何送礼</a></li>
				<li><a href="">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="">货到付款</a></li>
				<li><a href="">在线支付</a></li>
				<li><a href="">分期付款</a></li>
				<li><a href="">邮局汇款</a></li>
				<li><a href="">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="">退换货政策</a></li>
				<li><a href="">退换货流程</a></li>
				<li><a href="">价格保护</a></li>
				<li><a href="">退款说明</a></li>
				<li><a href="">返修/退换货</a></li>
				<li><a href="">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="">夺宝岛</a></li>
				<li><a href="">DIY装机</a></li>
				<li><a href="">延保服务</a></li>
				<li><a href="">家电下乡</a></li>
				<li><a href="">京东礼品卡</a></li>
				<li><a href="">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="/Public/images/xin.png" alt="" /></a>
			<a href=""><img src="/Public/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="/Public/images/police.jpg" alt="" /></a>
			<a href=""><img src="/Public/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->


</body>
<script>
function pay_cancel(obj){
    var url =  $(obj).attr('data-url')+'/'+Math.random();
    layer.open({
        type: 2,
        title: '退款操作',
        shadeClose: true,
        shade: 0.8,
        area: ['45%', '50%'],
        content: url, 
    });
}
//取消付款
function pay_callback(s){
	if(s==1){
		layer.msg('操作成功', {icon: 1});
		layer.closeAll('iframe');
		location.href =	location.href;
	}else{
		layer.msg('操作失败', {icon: 3});
		layer.closeAll('iframe');
		location.href =	location.href;		
	}
}

// 弹出退换货商品
function selectGoods2(order_id){
	var url = "/index.php?m=Admin&c=Order&a=get_order_goods&order_id="+order_id;
	layer.open({
		type: 2,
		title: '选择商品',
		shadeClose: true,
		shade: 0.8,
		area: ['60%', '60%'],
		content: url, 
	});
}    
// 申请退换货
function call_back(order_id,goods_id)
{
	var url = "/index.php?m=Admin&c=Order&a=add_return_goods&order_id="+order_id+"&goods_id="+goods_id;	
	location.href = url;
}
</script>
</html>