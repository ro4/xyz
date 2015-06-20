<?php 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/public/plugin/calendar/calendar.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/public/plugin/calendar/calendar-blue.css');
?>
<div class="content">
<?php 
	$this->beginWidget('CActiveForm',array(
				'action'=>$this->createUrl('checkadd'),
				'id'=>'add-form',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),  
			));
 ?>
	<table class="table table-bordered" id="update">
		<tbody>
			<tr>
				<th>商品名称</th>
				<td>
					<input type="text"  name="title"> 				
				</td>			
			</tr>
			<tr>
				<th>商品描述</th>
				<td>
					<textarea name="detail"></textarea>		
				</td>			
			</tr>
			<tr>
				<th>状态</th>
				<td>
					<select name="state">
						<option value="1" >正常</option>
						<option value="0" >下架</option>		
						<option value="2" >售完</option>							
					</select>		
				</td>			
			</tr>
			<tr>
				<th>价格</th>
				<td>
                    	<input type="text" name="price">
				</td>			
			</tr>
			<tr>
				<th>类别</th>
				<td>
					<input type="text"  name="type"> 				
				</td>			
			</tr>
			<tr>
				<th>类别名称</th>
				<td>
					<input type="text"  name="type_name"> 				
				</td>			
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" value="添加" class="btn btn-primary">
					<input onclick="javascript:window.history.back(-1)" type="button" value="返回" class="btn">
				</td>
			</tr>
		</tbody>
	</table>
	<?php 
		$this->endWidget();
	 ?>
</div>