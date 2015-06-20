<div class="content">
<?php if($model['pay_style'] == '0'):?>

订单提交成功，请尽快支付<?php echo $model['amount'];?>元,我们会用最快速度把外卖送到<?php echo $model['address']?>,你的电话:<?php echo $model['uid']?>.
<?php else:?>

订单提交成功，请准备好<?php echo $model['amount'];?>元,我们会尽快把外卖送到<?php echo $model['address']?>,你的电话:<?php echo $model['uid']?>.

<?php endif;?>
<br/>

点击右上角的电话图标可以直接联系我们，进行取消订单等操作.

</div>