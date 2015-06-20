<?php 
    $this->pageTitle='所有产品';
?>
    <div class="content">

                <div class="widget container">
                    <h4>分类</h4>
                    <div class="one-half">
                        <ul class="blog-category">
                            <li><a href="/item?cate=1"><i class="fa fa-angle-right"></i>下一站超人气</a></li>
                            <li><a href="/item?cate=2"><i class="fa fa-angle-right"></i>下一站醇香奶茶</a></li>
                            <li><a href="/item?cate=3"><i class="fa fa-angle-right"></i>下一站柠檬系列</a></li>
                            <li><a href="/item?cate=4"><i class="fa fa-angle-right"></i>下一站鲜奶系列</a></li>
                            <li><a href="/item?cate=5"><i class="fa fa-angle-right"></i>下一站手工调制</a></li>
                        </ul>
                    </div>
                    <div class="one-half last-column">
                        <ul class="blog-category">
                            <li><a href="/item?cate=6"><i class="fa fa-angle-right"></i>下一站如意茶</a></li>
                            <li><a href="/item?cate=7"><i class="fa fa-angle-right"></i>下一站紫米精选</a></li>
                            <li><a href="/item?cate=8"><i class="fa fa-angle-right"></i>下一站伴手礼</a></li>
                            <li><a href="/item?cate=9"><i class="fa fa-angle-right"></i>下一站奶昔精选</a></li>
                            <li><a href="/item"><i class="fa fa-angle-right"></i>全部</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            <div class="one-third-responsive">
            <?php foreach($models as $model):?>
            	<div class="decoration"></div> 
                <p class="user-list-follow">
                    <img src="http://ww1.sinaimg.cn/large/6af4b991gw1etamnsszfuj208h07ht99.jpg" alt="img">
                    <strong><?php echo $model['title']?>   <?php echo $model['price']?>元<br><em><?php echo $model['detail']?></em></strong>
                    <?php if('1' == $model['state']):?>
                    <a class="follow show-share-bottom" onclick="sendId(<?php echo $model['id']?>)">加入购物车</a>
                    <?php elseif('2' == $model['state']):?>
                    <a class="follow">售光</a>
                    <?php elseif('0' == $model['state']):?>
                    <a class="follow">下架</a>
                	<?php endif;?>
                </p>
            <?php endforeach;?>
            </div>  
       </div>