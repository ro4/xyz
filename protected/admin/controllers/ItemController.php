<?php
/**
 *  商品管理
 * @author Fan
 *
 */

class ItemController extends BaseController {
	/*
	 * 显示商品
	 */
	public function actionIndex(){
		$sql="select `{{item}}`.`id`,`{{item}}`.`title`,`{{item}}`.`price`,`{{item}}`.`detail`,`{{item}}`.`add_time`,`{{item}}`.`update_time`,`{{item}}`.`view_count`,`{{item}}`.`focus_count`,`{{item}}`.`comment_count`,`{{item}}`.`sale_count`,`{{item}}`.`state` from `{{item}}`";

		//查找商品
		if(isset($_POST['content'])){
			$sql.=" where `{{item}}`.`title` like '%{$_POST['content']}%'";
		}

		$connection=Yii::app()->db;
		$criteria = new CDbCriteria;
		$models=$connection->createCommand($sql)->queryAll();
		$count=count($models);
		$pages = new CPagination($count);
		$pages->pageSize = 14;
		$pages->applylimit($criteria);
		$models=$connection->createCommand($sql." LIMIT :offset,:limit");
		$models->bindValue(':offset', $pages->currentPage*$pages->pageSize);
		$models->bindValue(':limit', $pages->pageSize);
		$models=$models->queryAll();
		$this->render('index',array(
				'models'=>$models,
				'pages'=>$pages,
				'count'=>$count,
		));
	}	

	/**
	 * 
	 * update
	 */
	public function actionUpdate($id){
		$model=Item::model()->findByPk($id);		
		if(!$model){
			$this->error('商品不存在');
		}

		$this->render('update',array(
				'model'=>$model,
			));
	}

	/**
	 * 
	 * update
	 */
	public function actionDelete($id){
		$model=Item::model()->findByPk($id);		
		if(!$model){
			$this->error('商品不存在');
		}
		if(Item::model()->deleteByPk($id)){
			$this->success('删除成功',$this->createUrl('index'));
		} else {
			$this->error('删除失败，稍后再试',$this->createUrl('index'));
		}
	}

	/**
	 * 
	 * 检查update
	 *
	 */
	public function actionCheckUpdate(){
		if(!Yii::app()->request->isPostRequest){
			$this->error('一定是您的访问方式不对','/');
		}
		$data=array();
		$data['title']=$_POST['title'];
		$data['detail']=$_POST['detail'];
		$data['price']=$_POST['price'];
		$data['state']=$_POST['state'];
		$data['update_time']=time();

		if(false !== Item::model()->updateByPk($_POST['id'],$data)){
			$this->success('更新成功',$this->createUrl('index'));
		} else {
			$this->error('更新失败，稍后再试');
		}
	}

	/**
	 * 添加商品
	 */
	public function actionAdd(){
		$this->render('add');
	}

	/**
	 * 处理添加商品
	 */
	public function actionCheckAdd()
	{	
		if(!Yii::app()->request->isPostRequest){
			$this->error('一定是您的访问方式不对');
		}
		$item=new Item;
		$item->title=$_POST['title'];
		$item->detail=$_POST['detail'];
		$item->price=$_POST['price'];
		$item->state=$_POST['state'];
		$item->add_time=time();
		if($item->save()){
			$this->success('添加成功!',$this->createUrl('index'));
		}else{
			$this->error(var_dump($item->errors));
		}

	}

}

?>