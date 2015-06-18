<div class="condition alert alert-info">
	<?php $form = $this->beginWidget('CActiveForm', array(
	    'id'=>'condition-form',
	    'enableAjaxValidation'=>true,
	    'enableClientValidation'=>true,
	    'htmlOptions'=>array('class'=>'form-horizontal'),
	)); ?>
	搜索关键字:<input type="text" name="content"/>	
	<input type="submit" value="查询" class="btn btn-info">
	<span class="text-error">共有 <?php echo $count; ?>个商品</span>
	<?php $this->endWidget(); ?>

</div>
<div class="content">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>商品名</th>
				<th>商品描述</th>
				<th>价格</th>
				<th>添加时间</th>				
				<th>更新时间</th>	
				<th>浏览数</th>
				<th>收藏数</th>
				<th>评论数</th>
				<th>销售数</th>
				<th>状态</th>
				<th>操作</th>				
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($models as $model):
			 ?>
			<tr>
				<td>
					<?php echo $model['id'] ?>
				</td>
				<td>
					<?php echo $model['title'] ?>
				</td>	
				<td>
					<abbr title="详情:<?php echo $model['detail'] ?>"><?php echo substr($model['detail'],0,40)?></abbr>
				</td>	
				<td>
					<?php echo $model['price'] ?>
				</td>	
				<td>
					<?php echo date('Y-m-d H:i:s',$model['add_time']); ?>
				</td>	
				<td>
					<?php echo date('Y-m-d H:i:s',$model['update_time']); ?>
				</td>
				<td>
					<?php echo $model['view_count']; ?>
				</td>	
				<td>
					<?php echo $model['focus_count']; ?>
				</td>
				<td>
					<?php echo $model['comment_count']; ?>
				</td>
				<td>
					<?php echo $model['sale_count']; ?>
				</td>
				<td>
					<?php if($model['state'] == 0):?>
						<span class="label label-important">已下架</span>
					<?php elseif($model['state'] == 1): ?>
						正常
					<?php elseif($model['state'] == 2): ?>
						<span class="label label-important">售光</span>
					<?php endif;?>
				</td>
				<td>
					<a href="<?php echo $this->createUrl('update',array('id'=>$model['id'])) ?>">编辑</a> 
						&nbsp;/&nbsp;
					<a class="text-error" onclick="return confirm('您确认要删除吗? 删除之后将无法恢复！');" href="<?php echo $this->createUrl('delete',array('id'=>$model['id'])) ?>">删除</a>
				</td>			
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>