<?php 
$this->pageTitle="首页";
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl .'/js/tag.js', CClientScript::POS_END);
?>
<!-- =====================左侧内容区 start-->
<div class="span9" id="ask_list">
	<ul class="nav nav-tabs">
        <li class="pull-right <?php if(isset($_GET['order']) && $_GET['order']=='hot')echo 'active';?>">
        	<a href="?order=hot">热门</a>
        </li>
        <li class="pull-right <?php if((isset($_GET['order']) && $_GET['order']!='hot' && $_GET['order']!='unresponsive'))echo 'active';?>">
        	<a href="?order=new">最新</a>
        </li>
        <li class="pull-right <?php if(!isset($_GET['order']))echo 'active';?>">
            <a href="/">首页</a>
        </li>
    </ul>
    <?php if(isset($_GET['order'])):?>
    <div class="ask_content">
    	<ul>
    		<?php 
    			//循环输出
    			foreach ($models as $model):
    		?>
        	<li>
            	<!-- 回复次数 -->
            	<div class="replay_count pull-left text-center <?php if($model['comment_count']!='0')echo 'active'?>">
                	<span><?php echo $model['comment_count'];?></span>
                    <p>回复</p>
                </div>
                <!-- share内容主体 -->
                <div class="ask_main pull-left span7">
                	<h5 id="ask_title">
                    	<a href="<?php echo $this->createUrl('data/index',array('id'=>$model['data_id']));?>">
                        	<?php echo $model['data_title'];?> 
                        </a>
                     </h5>
                    <div id="ask_info">
                        <p class="span4 pull-left" style="margin-left:0">
                        <?php 
                        	if($topics=$this->getTopicByDataId($model['data_id'])):
                        ?>
                            <i class="icon-tags"></i>
                            <?php foreach ($topics as $topic):?>
                                <a href="<?php echo $this->createUrl('Topic/index',array('id'=>$topic['topic_id']))?>"><span class="label label-info"><?php echo $topic['topic_title']?></span></a>
                    		<?php endforeach;?>
                    	<?php endif;?>
                    	 </p>
                         <p class="pull-right" style="margin-right:10px;">
                         	浏览人次: <?php echo $model['view_count']?> 次，下载次数：<?php echo $model['download_count']?>次
                         </p>
                    </div >
                </div>
                <!--  -->
                <div>
                	<a href="<?php echo $this->createUrl('user/index',array('uid'=>$model['uid']));?>">
                    	<img class="img-rounded" src="<?php echo $model['avatar_file'];?>" width="50px">
                    </a>
                </div>
                <div class="clearfix"></div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="pages pull-right">
    	<?php 
          //分页
           $this->widget('CLinkPager', array(
					 'header'=>'',
					 'pages' => $pages,
			));
  		 ?>
    </div>
    <?php else:?>

     <div class="ask_content">
        <ul>
        <?php foreach ($models as $uid):?>
        <?php $datas = $this->getDataByUid($uid['uid']);?>
        <?php $user = $this->getUserInfoByUid($uid['uid'])?>
            <li>
                <!-- 回复次数 -->
                <div class="replay_count pull-right text-center active">
                    <span><?php echo $this->getDataCount($uid['uid']);?></span>
                    <p>分享</p>
                </div>
                <div class="ask_main pull-right span7">
                 <?php foreach($datas as $data):?>
                    <h5 id="ask_title">
                        <a href="<?php echo $this->createUrl('data/index',array('id'=>$data['id']));?>">
                            <?php echo $data['data_title'];?> 
                            (<?php  echo $data['view_count'];?>次查看)
                        </a>
                     </h5>
                <?php endforeach;?>
                </div>
                <div>
                    <a href="<?php echo $this->createUrl('user/index',array('uid'=>$user['uid']));?>">
                        <img class="img-rounded" src="<?php echo $user['avatar_file'];?>" width="50px">
                    </a>
                </div>
                <div class="clearfix"></div>
            </li>
        <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>

</div>

<!-- =====================左侧内容区 end|| 右侧内容区start-->
<div class="span3" id="sidebar">
	<div class="text-center">
    	<div class="sidebar_1 text-center">
        <?php if(Yii::app()->user->isGuest):?>
        	<a href="#loginModal" data-toggle="modal" class="btn btn-success">分享资料</a>
        <?php else:?>
        	<a href="<?php echo $this->createUrl('publish/create')?>" class="btn btn-success">分享资料</a>
        <?php endif;?>
        </div>
        <div class="sidebar_2">
        	<h5 class="text-left">热门tags</h5>
            <div id="tagsList">
                <?php foreach($topic_models as $topic_model): ?>
                <span>
                    <a href="<?php echo $this->createUrl('topic/index',array('id'=>$topic_model->id)) ?>">
                    <?php echo $topic_model->topic_title; ?>                    
                    </a>
                </span>
               <?php endforeach; ?>
            </div>
            <style type="text/css">
                #tagsList {position:relative; width:220px; height:300px; margin: -50px auto; }
                #tagsList a {position:absolute; top:0px; left:0px; font-family: Microsoft YaHei; color:#08c; font-weight:bold; text-decoration:none; padding: 3px 6px; }
                #tagsList a:hover { color:#FF0000; letter-spacing:2px;}     
            </style>
        </div>
    </div>
</div>
<!-- =====================右侧内容区结束-->
