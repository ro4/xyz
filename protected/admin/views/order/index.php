<div class="condition alert alert-info">
	<?php $form = $this->beginWidget('CActiveForm', array(
	    'id'=>'condition-form',
	    'enableAjaxValidation'=>true,
	    'enableClientValidation'=>true,
	    'htmlOptions'=>array('class'=>'form-horizontal'),
	)); ?>
	搜索关键字:<input type="text" name="content"/>	
	<input type="submit" value="查询" class="btn btn-info">
	<span class="text-error">共有 <?php echo $count; ?>个订单</span>
	<?php $this->endWidget(); ?>

</div>
<div class="content">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>uid(电话号码)</th>
				<th>联系人</th>
				<th>时间</th>
				<th>价格</th>				
				<th>更新时间</th>	
				<th>平台</th>
				<th>支付方式</th>
				<th>详情</th>
				<th>地址</th>
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
					<?php echo $model['oid'] ?>
				</td>
				<td>
					<?php echo $model['uid'] ?>
				</td>		
								<td>
					<?php echo $model['name'] ?>
				</td>	
				<td>
					<?php echo date('Y-m-d H:i:s',$model['add_time']); ?>
				</td>	
				<td>
					<?php echo $model['amount'] ?>
				</td>
				<td>
					<?php echo date('Y-m-d H:i:s',$model['update_time']); ?>
				</td>
				<td>
					<abbr title="<?php echo $model['platform'] ?>"><?php echo substr($model['platform'],0,20)?></abbr>
				</td>	
				<td>
					<?php if($model['pay_style'] == 0){
							echo '在线支付';
						}else {
							echo '货到付款';
							}?>
				</td>
				<td>
					<?php $details = json_decode($model['detail']);
					if(count($details)>1){
						foreach ($details as $detail) {
							$itemModel = $this->getItemInfo($detail->id);
							if($detail->heat = '0'){
                        	$heat = "冷";
                        		} elseif ($detail->heat = '1'){
                        		$heat = "常温";
                        	}else{
                        		$heat = "热";
                        	}
                        	switch ($detail->sugar) {
                        		case '10':
                        			$sugar = "正常(10分)";
                        			break;
                        		case '8':
                        			$sugar = "少糖(8分)";
                        			break;
                        		case '5':
                        			$sugar = "半糖(5分)";
                        			break;
                        		case '3':
                        			$sugar = "微糖(3分)";
                        			break;
                        		case '0':
                        			$sugar = "无糖(0分)";
                        			break;
                        		default:
                        			$sugar = "无信息";
                        			break;
                        	}
                        	echo $itemModel['title'].$detail->count."杯  糖分:".$sugar.$heat."<br/>";
						}
					} else {
						//var_dump($details[0]);
						$itemModel = $this->getItemInfo($details[0]->id);
							if($details[0]->heat = '0'){
                        	$heat = "冷";
                        		} elseif ($details[0]->heat = '1'){
                        		$heat = "常温";
                        	}else{
                        		$heat = "热";
                        	}
                        	switch ($details[0]->sugar) {
                        		case '10':
                        			$sugar = "正常(10分)";
                        			break;
                        		case '8':
                        			$sugar = "少糖(8分)";
                        			break;
                        		case '5':
                        			$sugar = "半糖(5分)";
                        			break;
                        		case '3':
                        			$sugar = "微糖(3分)";
                        			break;
                        		case '0':
                        			$sugar = "无糖(0分)";
                        			break;
                        		default:
                        			$sugar = "无信息";
                        			break;
                        	}
                        	echo $itemModel['title'].$details[0]->count."杯  糖分:".$sugar.$heat."<br/>";
					}
					
					?>
					<?php echo "<br/>备注：".$model['mark'];?>
				</td>
				<td>
					<?php echo $model['address'] ?>
				</td>
				<td>
					<?php if($model['state'] == 0):?>
						待付款
					<?php elseif($model['state'] == '-1'): ?>
						待确认
					<?php elseif($model['state'] == 1): ?>
						已付款
					<?php elseif($model['state'] == 2): ?>
						已确认
					<?php elseif($model['state'] == 3): ?>
						已送货
					<?php elseif($model['state'] == 4): ?>
						待退款
					<?php elseif($model['state'] == 5): ?>
						已取消
					<?php endif;?>
				</td>
				<td>
				<?php if($model['state'] == 0 and $model['pay_style'] == 0):?>
					<a class="text-error" onclick="return confirm('您确认要确认付款吗? ');" href="<?php echo $this->createUrl('setstate',array('oid'=>$model['oid'],'state'=>1)) ?>">确认付款</a>
						&nbsp;/&nbsp;
				<?php endif;?>
				<?php if($model['state'] == '-1' and $model['pay_style'] == 1):?>
					<a class="text-error" onclick="return confirm('您确认要确认订单吗? ');" href="<?php echo $this->createUrl('setstate',array('oid'=>$model['oid'],'state'=>2)) ?>">确认订单</a>
						&nbsp;/&nbsp;
				<?php endif;?>
				<?php if($model['state'] == 4):?>
				<a class="text-error" onclick="return confirm('退款成功了吗？');" href="<?php echo $this->createUrl('setstate',array('oid'=>$model['oid'],'state'=>5)) ?>">退款成功</a>
						&nbsp;/&nbsp;
				<?php else :?>
				<a class="text-error" onclick="return confirm('您确认要完成吗?');" href="<?php echo $this->createUrl('setstate',array('oid'=>$model['oid'],'state'=>3))  ?>">完成</a>
				&nbsp;/&nbsp;
				<a class="text-error" onclick="return confirm('确认取消？');" href="<?php echo $this->createUrl('cancel',array('id'=>$model['oid'])) ?>">取消</a>
						&nbsp;/&nbsp;
				<?php endif;?>
					<a class="text-error" onclick="return confirm('您确认要删除吗? 删除之后将无法恢复！');" href="<?php echo $this->createUrl('delete',array('id'=>$model['oid'])) ?>">删除</a>
				</td>			
			</tr>
		<?php endforeach; ?>
		</tbody>
					<tr>
			<td colspan="10" style="text-align:center;">
				<?php 
                  //分页
                  $this->widget('CLinkPager', array(
						 'header'=>'',
						 'pages' => $pages,
					));
		 		 ?>
		 	</td>
			</tr>
	</table>
</div>