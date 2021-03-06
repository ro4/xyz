<?php 
	Yii::app()->clientScript->registerCoreScript('jquery');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/style.css');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/swipebox.css');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/owl.theme.css');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/animate.css');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/framework.css');
	Yii::app()->clientScript->registerCssFile(yii::app()->theme->baseUrl.'/styles/font-awesome.css');

	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/scripts/custom.js');
	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/scripts/framework.plugins.js');
	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/scripts/jquery.js');
	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/scripts/jqueryui.js');
	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/scripts/myjs.js');
?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container wrap">
 	<div class="row" id="container_row">
 	<?php $sm = Server::model()->findByPk(1)?>
 	<?php if($sm['is_open'] == '0'):?>
 	<div class="static-notification-red">
    <p class="center-text uppercase">本店已经打烊，暂时不接受订单!</p>
    </div>
	<?php endif;?>
		<?php echo $content; ?>
	</div>
</div><!-- content -->
<?php $this->endContent(); ?>