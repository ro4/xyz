        <!--
        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-left-caption">
                        <h3>Swipe me!</h3>
                        <p>Hope you enjoy our latest item!</p>
                    </div>
                    <img src="http://ww1.sinaimg.cn/large/6af4b991gw1etamnsszfuj208h07ht99.jpg" class="responsive-image" alt="img">
                </div>
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-center-caption">
                        <h3>Slider</h3>
                        <p>Our slider is awesome!</p>
                    </div>
                    <img src="http://ww1.sinaimg.cn/large/6af4b991gw1etamnsszfuj208h07ht99.jpg" class="responsive-image" alt="img">
                </div>
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-right-caption">
                        <h3>Responsive</h3>
                        <p>And it's fully responsive!</p>
                    </div>
                    <img src="http://ww1.sinaimg.cn/large/6af4b991gw1etamnsszfuj208h07ht99.jpg" class="responsive-image" alt="img">
                </div>
            </div>
        </div>!-->

        <?php 
    $this->pageTitle='曲靖下一站奶茶店';
?>
        <div class="content">            
            <div class="container no-bottom">
                <h3>欢迎来到下一站奶茶店!</h3>
                <p>
                    我们提供各种奶茶及饮品，奶茶可以更具您的口味选择糖分，外卖三杯起送。
                </p>

            </div>
            <div class="decoration"></div>
            <div class="content-heading full-bottom">
                <h2>热门&店长推荐</h2>
                <em> 销量最高 </em>
                <i class="fa fa-star"></i>
            </div>
            
            <div class="decoration"></div>
            <div class="container">
                <a href="#" class="next-staff"></a>
                <a href="#" class="prev-staff"></a>
                <div class="staff-slider" data-snap-ignore="true">
                <?php foreach($models as $model):?>
                    <div>
                        <div class="staff-item">
                            <img src="http://ww1.sinaimg.cn/large/6af4b991gw1etamnsszfuj208h07ht99.jpg" alt="img">
                            <h4><?php echo $model['title']?></h4>
                            <em><?php echo $model['price']?>元</em>
                            <strong><?php echo $model['detail']?></strong>
                            <a href="#" class="button button-red center-button show-share-bottom" onclick="sendId(<?php echo $model['id']?>)">加入购物车</a>
                        </div>
                    </div>
                 <?php endforeach;?>
                </div>
            </div>

            <div class="decoration"></div>
            <div class="content-heading full-bottom">
                <h2>联系方式</h2>
                <em>欢迎到店品尝</em>
                <i class="fa fa-star"></i>
            </div>
            <div class="decoration"></div>
            <div class="one-half-responsive last-column">
                <div class="container no-bottom">
                    <h4>地址</h4>
                    <p>
                        <strong>麒麟巷店</strong><br>
                        麒麟区麒麟巷72号<br>
                        (国税局斜对面)
                    </p>
                    <p>
                        <strong>联系方式:</strong><br>
                        <a href="#" class="contact-call"><i class="fa fa-phone"></i>电话: 15187900109</a>
                        <a href="#" class="contact-text"><i class="fa fa-comments"></i>短信: 15187900109</a>
                        <a href="/show/wechat" class="contact-facebook"><i class="fa fa-wechat"></i>曲靖下一站奶茶</a>
                    </p>
                </div>            
            </div>
        </div>