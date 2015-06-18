<?php 
	$this->pageTitle="更新";	
	$form=$this->beginWidget('CActiveForm',array(
				'action'=>$this->createUrl('item/checkupdate'),
				'id'=>'update-form',
			));
?>
<div class="content">
	<table class="table table-striped table-bordered" id="update">
		<tr>
			<th class="text-right">标题：</th>
			<td>
				<input type="text" name="title" value="<?php echo $model['title'] ?>" />
				<?php if($model['state']): ?>
					<?php if($model['state'] == 0):?>
						<span class="label label-important">已下架</span>
					<?php elseif($model['state'] == 1): ?>
						正常
					<?php elseif($model['state'] == 2): ?>
						<span class="label label-important">售光</span>
					<?php endif;?>
				<?php endif; ?>
			</td>		
		</tr>
		<tr>
			<th class="text-right">描述：</th>
			<td><textarea name="detail"><?php echo  $model['detail'] ;?></textarea></td>	
		</tr>
		<tr>
			<th class="text-right">价格：</th>
			<td><input type="text" name="price" value="<?php echo $model['price'] ?>" /></td>		
		</tr>
		<tr>
			<th>状态</th>
			<td>
				<select name='state'>
					<option value="1" <?php if($model['state']==1)echo 'selected' ?> >正常</option>
					<option value="0" <?php if($model['state']==0)echo 'selected' ?> >下架</option>
					<option value="2" <?php if($model['state']==2)echo 'selected' ?> >售完</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>访问量:</th>
			<td id="status">
				<span class="label label-info"><?php echo $model['view_count'] ?>人查看</span>
				<span class="label label-info"><?php echo $model['focus_count'] ?>人关注</span>
				<span class="label label-info"><?php echo $model['sale_count'] ?>次售出</span>
				<span class="label label-info"><?php echo $model['comment_count'] ?>人评论</span>
			</td>
		</tr>
		<tr>
			<th>时间:</th>
			<td>
				<p>发布时间:<?php echo date('Y-m-d H:i:s',$model['add_time']); ?></p>
				<p>最后更新时间:<?php echo date('Y-m-d H:i:s',$model['update_time']); ?></p>	
			</td>
		</tr>
		<tr>	
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $model['id'] ?>">
				<input type="submit" value="保存" class="btn btn-primary">
				<a href="javascript:window.history.back(-1)" class="btn">返回</a>
			</td>
		</tr>
	</table>
	<?php 
		$this->endWidget();
	 ?>
</div>	