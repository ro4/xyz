        <div class="slider-container full-bottom">
            <div class="homepage-slider" data-snap-ignore="true">                
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-left-caption">
                        <h3>Swipe me!</h3>
                        <p>Hope you enjoy our latest item!</p>
                    </div>
                    <img src="http://ww3.sinaimg.cn/large/6af4b991gw1efvkygninvj20dt0dymy6.jpg" class="responsive-image" alt="img">
                </div>
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-center-caption">
                        <h3>Slider</h3>
                        <p>Our slider is awesome!</p>
                    </div>
                    <img src="http://ww3.sinaimg.cn/large/6af4b991gw1efvkygninvj20dt0dymy6.jpg" class="responsive-image" alt="img">
                </div>
                <div>
                    <div class="overlay"></div>
                    <div class="homepage-slider-caption homepage-right-caption">
                        <h3>Responsive</h3>
                        <p>And it's fully responsive!</p>
                    </div>
                    <img src="http://ww3.sinaimg.cn/large/6af4b991gw1efvkygninvj20dt0dymy6.jpg" class="responsive-image" alt="img">
                </div>
            </div>
        </div>
        <div class="content">            
            <div class="container no-bottom">
                <h3>欢迎来到下一站奶茶店!</h3>
                <p>
                    我们提供各种奶茶及饮品。
                </p>

            </div>
            <div class="decoration"></div>
    
            <div class="content-heading full-bottom">
                <h2>热门&店长推荐</h2>
                <em>描述性语句在这列</em>
                <i class="fa fa-star"></i>
            </div>
            <div class="decoration"></div>
            <div class="container no-bottom">
                <!-- 热门推荐-->
                <?php foreach($models as $model):?>
            	<div class="one-half-responsive">
                    <p class="thumb-left no-bottom">
                        <img src="http://ww3.sinaimg.cn/large/6af4b991gw1efvkygninvj20dt0dymy6.jpg" alt="img">
                        <strong><?php echo $model['title']?></strong>
                        <em><br><?php echo $model['detail']?></em>
                    </p>
                    <div class="thumb-clear"></div>
                </div>
                <div class="decoration hide-if-responsive"></div>
            <?php endforeach;?>
             </div>



            <div class="decoration"></div>
            
            <div class="content-heading full-bottom">
                <h2>Meet the Staff</h2>
                <em>some awesome services we provide</em>
                <i class="fa fa-user"></i>
            </div>
            
            <div class="decoration"></div>
            <div class="container">
                <a href="#" class="next-staff"></a>
                <a href="#" class="prev-staff"></a>
                <div class="staff-slider" data-snap-ignore="true">
                <?php foreach($models as $model):?>
                    <div>
                        <div class="staff-item">
                            <img src="http://ww3.sinaimg.cn/large/6af4b991gw1efvkygninvj20dt0dymy6.jpg" alt="img">
                            <h4><?php echo $model['title']?></h4>
                            <em><?php echo $model['price']?>元</em>
                            <strong><?php echo $model['detail']?></strong>
                            <a href="#" class="button button-red center-button">加入购物车</a>
                        </div>
                    </div>
                 <?php endforeach;?>
                </div>
            </div>  
            <div class="decoration"></div>
            <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费模板</a></div>
            
        	<div class="decoration"></div>
            <div class="container">
                <div class="one-half-responsive">
                    <img src="images/mobile1.png" alt="img" class="responsive-image">
                </div>
                <div class="one-half-responsive last-column">
                    <h3 class="center-if-mobile no-bottom">Awesome project title</h3>
                    <em class="center-if-mobile small-text half-bottom">Awesome project subtitle</em>
                    <p class="center-if-mobile no-bottom">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in quam mauris. 
                        Nam condimentum convallis lectus, ac tempus massa eleifend sit amet. Ut nec orci 
                        ut urna mollis elementum a et diam. Donec varius orci a convallis convallis. 
                    </p>
                </div>
            </div>
            <div class="decoration"></div>

            <div class="content-heading full-bottom">
                <h2>Customer Reviews</h2>
                <em>some awesome services we provide</em>
                <i class="fa fa-quote-right"></i>
            </div>
            
            <div class="decoration"></div>       
            <div class="quote-slider full-bottom" data-snap-ignore="true">
                <div>
                    <h4>
                        Great all around product, with some of the best documentation I have ever seen. Really thorough and easy to follow! 
                        Also the support responsiveness is really fantastic. Extremely happy with everything. Thanks again!
                    </h4>
                    <a href="#">ChrisPizzoDesign - ThemeForest</a>
                </div>
                <div>
                    <h4>
                        Exceptional theme. Completely customisable, the best customer service I've ever had from a theme/plugin. Not only are 
                        they fast but polite and don't make you feel like a doofus even when you are probably being one.                        
                    </h4>
                    <a href="#">larzick27 - ThemeForest</a>
                </div>
                <div>
                    <h4>
                        One of the best themes I've used so far and is very well documented, coded and very clean. Got it intergrated with 
                        wordpress in less than an hour! But this is an amazing template built with a load of features!
                    </h4>
                    <a href="#">ramseycosay18 - ThemeForest</a>
                </div>
            </div>
            <div class="decoration"></div> 
            
            <div class="content-heading full-bottom">
                <h2>More Works</h2>
                <em>some awesome services we provide</em>
                <i class="fa fa-camera"></i>
            </div>
            
            <div class="decoration"></div> 
            <ul class="gallery square-thumb">
                <li><a class="swipebox" href="images/pictures/1.jpg" title="An awesome gallery!"><img src="images/pictures/1s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/2.jpg" title="An awesome gallery!"><img src="images/pictures/2s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/3.jpg" title="An awesome gallery!"><img src="images/pictures/3s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/4.jpg" title="An awesome gallery!"><img src="images/pictures/4s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/5.jpg" title="An awesome gallery!"><img src="images/pictures/5s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/6.jpg" title="An awesome gallery!"><img src="images/pictures/6s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/7.jpg" title="An awesome gallery!"><img src="images/pictures/7s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/8.jpg" title="An awesome gallery!"><img src="images/pictures/8s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/1.jpg" title="An awesome gallery!"><img src="images/pictures/1s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/2.jpg" title="An awesome gallery!"><img src="images/pictures/2s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/3.jpg" title="An awesome gallery!"><img src="images/pictures/3s.jpg" alt="img" /></a></li>
                <li><a class="swipebox" href="images/pictures/4.jpg" title="An awesome gallery!"><img src="images/pictures/4s.jpg" alt="img" /></a></li>
            </ul>
            
            <div class="decoration"></div>
            
        </div>