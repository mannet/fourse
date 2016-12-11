<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="/Public/css/demo.css" type="text/css" />

<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/awardRotate.js"></script>
<script type="text/javascript">
    var item=0;//默认值 0  避免出现BUG
    // var item = rnd(0,7);
    $(function (){
            var rotateTimeOut = function (){
                $('#rotate').rotate({
                    angle:0,//角度
                    animateTo:2160,//动画效果
                    duration:8000,//持续时间
                    callback:function (){
                        alert('网络超时，请检查您的网络设置！');
                    }
                });
            };
            var bRotate = false;
            var rotateFn = function (awards, angles, txt){
                bRotate = !bRotate;
                $('#rotate').stopRotate();
                $('#rotate').rotate({
                    angle:0,
                    animateTo:angles+1800,
                    duration:8000,
                    callback:function (){
                        alert(txt);
                        bRotate = !bRotate;
                        // location.href = "<?php echo U('Home/User/prize');?>";
                    }
                })
            };

    $('.pointer').click(function (){
                
                if(bRotate)return;

                var order_id = $(this).data('orderid');
                var reqdata = {orderid:order_id};
                
                var url = "<?php echo U('/home/user/jiangpin');?>";
                
                $.post(url,reqdata,function(jsonobj){

                    if(jsonobj.code == '110'){
                        item = parseInt(jsonobj.item);
                        switch (item) {
                            case 0:
                                //var angle = [26, 88, 137, 185, 235, 287, 337];
                                rotateFn(0, 337, '未中奖');
                                break;
                            case 1:
                                //var angle = [88, 137, 185, 235, 287];
                                rotateFn(1, 26, '免单4999元');
                                break;
                            case 2:
                                //var angle = [137, 185, 235, 287];
                                rotateFn(2, 88, '免单50元');
                                break;
                            case 3:
                                //var angle = [137, 185, 235, 287];
                                rotateFn(3, 137, '免单10元');
                                break;
                            case 4:
                                //var angle = [185, 235, 287];
                                rotateFn(4, 185, '免单5元');
                                break;
                            case 5:
                                //var angle = [185, 235, 287];
                                rotateFn(5, 185, '免单5元');
                                break;
                            case 6:
                                //var angle = [235, 287];
                                rotateFn(6, 235, '免分期服务费');
                                break;
                            case 7:
                                //var angle = [287];
                                rotateFn(7, 287, '提高白条额度');
                                break;
                        }


                    }else{
                        alert(jsonobj.msg);
                    }
                    

                },'json');

        // if(bRotate)return;
        // var item = rnd(0,7);

       

        console.log(item);

    });
});
function rnd(n, m){
    return Math.floor(Math.random()*(m-n+1)+n)
}
</script>

</head>
<body>

    <div class="turntable-bg">
        <!--<div class="mask"><img src="images/award_01.png"/></div>-->
        <div data-orderid="<?php echo ($order_id); ?>" class="pointer"><img src="/Public/images/pointer.png" alt="pointer"/></div>
        <div class="rotate" ><img id="rotate" src="/Public/images/turntable.png" alt="turntable"/></div>
    </div>
    
</body>
</html>