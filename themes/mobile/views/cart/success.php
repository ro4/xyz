<div class="content">

你好，<?php echo $model['name']?>,订单提交成功，
<?php if($model['pay_style'] == '0'):?>

请尽快支付<?php echo $model['amount'];?>元,
<?php else:?>

请准备好<?php echo $model['amount'];?>元,

<?php endif;?>
我们会用最快速度把外卖送到<?php echo $model['address']?>,你的电话:<?php echo $model['uid']?>.
<br/>

点击右上角的电话图标可以直接联系我们，进行取消订单等操作.

</div>