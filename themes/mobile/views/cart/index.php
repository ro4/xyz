<?php 
    $this->pageTitle='购物车';
?>
<div class="content"> 
<div class="decoration hide-if-responsive"></div> 
		<?php $total = 0;
        $count = 0;
        $flag = 0;?>
        <?php foreach($models as $model):?>
        <p class="notification-page-item">
        <?php //var_dump($model->heat == '0')?>
                    <i class="fa fa-check green-notification"></i>
                    <em>
                        <?php 
                        $itemModel = $this->getItemInfo($model->id);
                        if($model->heat == '0'){
                        	$heat = "冷";
                        } elseif($model->heat == '1') {
                        	$heat = "常温";
                        } else {
                            $heat = "热";
                        }
                        switch ($model->sugar) {
                        	case '10':
                        		$sugar = "正常(10分)";
                        		break;
                        	case '8':
                        		$sugar = "少糖(8分)";
                        		break;
                        	case '5':
                        		$sugar = "半糖(5分)";
                        		break;
                        	case '3':
                        		$sugar = "微糖(3分)";
                        		break;
                        	case '0':
                        		$sugar = "无糖(0分)";
                        		break;
                        	default:
                        		$sugar = "无信息";
                        		break;
                        }
                        echo $itemModel['title']."<br/>".$itemModel['price']."元*".$model->count."杯 "
                        .$sugar."  ".$heat;
                        $total = $model->count * $itemModel['price'] + $total;
                        $count = $model->count + $count;?>
                    </em>
                    <a class="show-share-bottom" onclick="updateCart(<?php echo $flag;?>)">修改</a>
                    <a onclick="mdel(<?php echo $flag;?>,1)">删除</a>
        </p>  
<div class="decoration"></div> 
        <?php $flag++;endforeach;?>
        <?php if($count < 3):?>
        <a>
        <div class="static-notification-green">
            <p class="center-text uppercase">还差<?php echo 3 - $count;?>杯满足送货条件，再去选点奶茶吧</p>
        </div>
        <?php else:?>
		<a href="/cart/pay">
        <div class="static-notification-green">
            <p class="center-text uppercase">共<?php echo $total?>元，去付款</p>
        </div>
        </a>
        <?php endif;?>
        <div class="static-notification-red" onclick="delCookie('cart');location.reload();">
                        <p class="center-text uppercase">清空购物车</p>
        </div>
        </div>