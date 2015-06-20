<div class="navbar navbar-static-top navbar-inverse">
        	<div class="navbar-inner">
            	<div style="padding:0 30px;">
                	<a class="brand" style="margin-right:20px;">下一站后台管理</a>
                	<div class="nav-collapse collapse navbar-inverse-collapse">
                        <!--  用户名头像下拉 -->
                        <ul class="nav pull-right">
                        <?php 
                        	//用户已经登入
                        	if(!Yii::app()->user->isGuest):
                        ?>	
                        	<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span style="color:white;"><?php echo Yii::app()->user->getState('userInfo')->username; ?></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                    <li>
                                        <a href="<?php echo $this->createUrl('public/logout')?>"><i class="icon-off"></i>退出</a>
                                    </li>
                                </ul>
                            </li>
                            <?php 
                            	endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="row" >
	<div class="span3" style="min-height:600px;background-color: #e9e9e9;border-right: 1px solid #c4c8cb;">
	<div class="sidebar-menu">
	<?php $Smodel = $this->getServer();?>
	<?php if($Smodel['is_open'] == '1'):?>
		<a href="<?php echo $this->createUrl('site/setserver',array('var'=>0));?>">关店</a>
	<?php else:?>
		<a href="<?php echo $this->createUrl('site/setserver',array('var'=>1));?>">开店</a>
	<?php endif;?>
		<a href="#questionMenu" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-book icon-large"></i> 订单管理</a>
		<ul id="questionMenu" class="nav nav-list collapse menu-second">
			<li><a href="<?php echo $this->createUrl('order/wait4pay');?>" target="main"><i class="icon-list-alt"></i>待付款订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/wait4confirm');?>" target="main"><i class="icon-list-alt"></i>待确认订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/wait4send');?>" target="main"><i class="icon-list-alt"></i>待发货订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/index',array('state'=>3));?>" target="main"><i class="icon-list-alt"></i>已完成订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/index',array('state'=>4));?>" target="main"><i class="icon-list-alt"></i>待退款订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/index',array('state'=>5));?>" target="main"><i class="icon-list-alt"></i>已取消订单</a></li>
			<li><a href="<?php echo $this->createUrl('order/index');?>" target="main"><i class="icon-list-alt"></i>所有订单</a></li>
		</ul>
		
		<!-- <a href="#topicMeun" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-tag icon-large"></i> 话题管理</a>
		<ul id="topicMeun" class="nav nav-list collapse menu-second">
			<li><a href="#" target="main"><i class="icon-list-alt"></i> 所有话题</a></li>
		</ul>
		 -->

		<a href="#userMeun" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-user icon-large"></i>商品管理</a>
		<ul id="userMeun" class="nav nav-list collapse menu-second">
            <li><a href="<?php echo $this->createUrl('item/index'); ?>" target="main"><i class="icon-list"></i>商品列表</a></li>
			<li><a href="<?php echo $this->createUrl('item/add'); ?>" target="main"><i class="icon-user"></i>增加商品</a></li>
		</ul>
		<a href="#userMeun" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-user icon-large"></i> 用户管理(开发中)</a>
		<ul id="userMeun" class="nav nav-list collapse menu-second">
		</ul>

		<a href="#topicMeun" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-tag icon-large"></i>首页管理(开发中)</a>
		<ul id="topicMeun" class="nav nav-list collapse menu-second">
		</ul>
		
	</div>
</div>

<!-- iframe -->
<div class="right_main"  style="position:relative; overflow:hidden;">
	  <iframe name="main" id="rightMain" src="<?php echo $this->createUrl('site/info')?>"  frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none;" width="100%" allowtransparency="true" height:200></iframe>
	</div>
</div>
<script type="text/javascript">function windowW(){
	if($(window).width()<980){

			$('#header').css('width',980+'px');

			$('#content').css('width',980+'px');

			$('body').attr('scroll','');

			$('body').css('overflow','');
	}

}

windowW();

$(window).resize(function(){

	if($(window).width()<980){

		windowW();

	}else{

		$('#header').css('width','auto');

		$('#content').css('width','auto');

		$('body').attr('scroll','no');

		$('body').css('overflow','hidden');

	}

});

window.onresize = function(){

	var heights = document.documentElement.clientHeight;

	document.getElementById('rightMain').height = heights;

	var openClose = $("#rightMain").height()+9;

	$('#center_frame').height(openClose+9);

	$("#openClose").height(openClose+30);

}

window.onresize();
</script>