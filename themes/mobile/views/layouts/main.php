<!DOCTYPE HTML><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/splash/splash-icon.png">
<link rel="apple-touch-icon-precomposed" sizes="180x180" href="images/splash/splash-icon-big.png">
<link rel="apple-touch-startup-image" href="images/splash/splash-screen.png" 	media="screen and (max-device-width: 320px)" />  
<link rel="apple-touch-startup-image" href="images/splash/splash-screen@2x.png" media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" /> 
<link rel="apple-touch-startup-image" href="images/splash/splash-screen-six.png" media="(device-width: 375px)">
<link rel="apple-touch-startup-image" href="images/splash/splash-screen-six-plus.png" media="(device-width: 414px)">
<link rel="apple-touch-startup-image" sizes="640x1096" href="images/splash/splash-screen@3x.png" />
<link rel="apple-touch-startup-image" sizes="1024x748" href="images/splash/splash-screen-ipad-landscape" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)" />
<link rel="apple-touch-startup-image" sizes="768x1004" href="images/splash/splash-screen-ipad-portrait.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)" />
<link rel="apple-touch-startup-image" sizes="1536x2008" href="images/splash/splash-screen-ipad-portrait-retina.png"   media="(device-width: 768px)	and (orientation: portrait)	and (-webkit-device-pixel-ratio: 2)"/>
<link rel="apple-touch-startup-image" sizes="1496x2048" href="images/splash/splash-screen-ipad-landscape-retina.png"   media="(device-width: 768px)	and (orientation: landscape)	and (-webkit-device-pixel-ratio: 2)"/>

<title>Epsilon Mobile Framework - Version 2.0</title>

</head>
<body> 

<div id="preloader">
	<div id="status">
    	<p class="center-text">
			Loading...
            <em>小小光头骑着摩的!</em>
        </p>
    </div>
</div>
       
<div class="all-elements">
    <div class="snap-drawers">
        <!-- Left Sidebar -->
        <div class="snap-drawer snap-drawer-left">
            <a href="/" class="selected-item"><i class="fa fa-home"></i>首页</a>
            <a href="/item"><i class="fa fa-cog"></i>所有产品</a>
            <a href="/cart"><i class="fa fa-picture-o"></i>购物车</a>
            <a href="/show/about"><i class="fa fa-envelope-o"></i>联系我们</a>
            <a href="/show/wechat"><i class="fa fa-wechat"></i>微信</a>
            <a href="#" class="sidebar-close"><i class="fa fa-times"></i>Close</a>
        </div>
    </div>
    
    <div class="header">
        <a href="/" class="main-logo"></a>
        <a href="#" class="open-menu"><i class="fa fa-navicon"></i></a>
        <a href="/show/about" class="open-mail"><i class="fa fa-envelope-o"></i></a>
        <a href="tel:" class="open-call"><i class="fa fa-phone"></i></a>
    </div> 
    
    <a href="#" class="footer-ball"><i class="fa fa-navicon"></i></a>
    
    <!-- Page Content-->
    <div id="content" class="snap-content">        
        <?php echo $content;?>
        <!-- Page Footer-->
        <div class="footer">
            <p class="center-text">Code By <a href="http://thefrp.sinaapp.com/" target="_blank" title="Fan Lab">Fan Lab</a> - Powered By Yii
</p>
            <div class="footer-socials half-bottom">
                <a href="#" class="footer-facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="footer-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="footer-transparent"></a>
                <a href="#" class="footer-share show-share-bottom"><i class="fa fa-share-alt"></i></a>
                <a href="#" class="footer-up"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>     
        
    </div>

    <div class="share-bottom">
        <h3>选择规格</h3>
        <div class="share-socials-bottom">

            <div class="input">
        <?php 
            $model=new ItemForm();
            $form=$this->beginWidget('CActiveForm',array(
                'id'=>'cart-form',
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                )));
            ?>
            选择甜度:
            <?php echo $form->dropDownList($model,'sugar',array('10'=>'正常','8'=>'少糖'));?>
            选择温度:
            <?php echo $form->dropDownList($model,'heat',array('0'=>'冷','1'=>'热'));?>
            <h6>数目</h6>
            <input type="number" name="count" value=""/>
            <h6>备注:</h6>
            <?php echo $form->textField($model,'mark');?>
            <div class="formSubmitButtonErrorsWrap">
            <input type="submit" class="buttonWrap button button-green contactSubmitButton" id="contactSubmitButton" value="SUBMIT" data-formId="contactForm"/>
            </div>
        <?php 
            $this->endWidget();
        ?>
    </div>
        </div>
        <a href="#" class="close-share-bottom">Close</a>
    </div>
    
</div>

</body>

<script type="text/javascript">

</script>