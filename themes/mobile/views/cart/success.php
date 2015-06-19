<div class="content">
<?php if($model['pay_style'] == '0'):?>

订单提交成功，请尽快支付<?php echo $model['amount'];?>元,我们会尽快把外卖送到<?php echo $model['address']?>,联系电话:<?php echo $model['uid']?>.
<?php else:?>

订单提交成功，请准备好<?php echo $model['amount'];?>元,我们会尽快把外卖送到<?php echo $model['address']?>,联系电话:<?php echo $model['uid']?>.

<?php endif;?>

</div>