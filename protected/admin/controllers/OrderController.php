<?php
/**
 *  商品管理
 * @author Fan
 *
 */

class OrderController extends BaseController {
	/*
	 * 显示商品
	 */
	public function actionIndex(){
		$sql="select `{{order}}`.`oid`,`{{order}}`.`uid`,`{{order}}`.`address`,`{{order}}`.`add_time`,`{{order}}`.`update_time`,`{{order}}`.`platform`,`{{order}}`.`pay_style`,`{{order}}`.`detail`,`{{order}}`.`amount`,`{{order}}`.`state`
		from `{{order}}`";

		if(isset($_GET['state'])){
			$sql.=" where `{{order}}`.`state` = '{$_GET['state']}'";
		}
		//查找商品
		if(isset($_POST['content'])){
			$sql.=" and `{{order}}`.`uid` like '%{$_POST['content']}%'";
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

	public function actionWait4Pay(){
		$sql="select `{{order}}`.`oid`,`{{order}}`.`uid`,`{{order}}`.`address`,`{{order}}`.`add_time`,`{{order}}`.`update_time`,`{{order}}`.`platform`,`{{order}}`.`pay_style`,`{{order}}`.`detail`,`{{order}}`.`amount`,`{{order}}`.`state`
		from `{{order}}`
		where `{{order}}`.`pay_style` = 0 and `{{order}}`.`state` = 0";

		//查找商品
		if(isset($_POST['content'])){
			$sql.=" and `{{order}}`.`uid` like '%{$_POST['content']}%'";
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

	public function actionWait4Send(){
		$sql="select `{{order}}`.`oid`,`{{order}}`.`uid`,`{{order}}`.`address`,`{{order}}`.`add_time`,`{{order}}`.`update_time`,`{{order}}`.`platform`,`{{order}}`.`pay_style`,`{{order}}`.`detail`,`{{order}}`.`amount`,`{{order}}`.`state`
		from `{{order}}`
		where (`{{order}}`.`pay_style` = 0 and `{{order}}`.`state` = 1) or (`{{order}}`.`pay_style` = 1 and `{{order}}`.`state` = 2)";

		//查找商品
		if(isset($_POST['content'])){
			$sql.=" and `{{order}}`.`uid` like '%{$_POST['content']}%'";
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

	public function actionWait4Confirm(){
		$sql="select `{{order}}`.`oid`,`{{order}}`.`uid`,`{{order}}`.`address`,`{{order}}`.`add_time`,`{{order}}`.`update_time`,`{{order}}`.`platform`,`{{order}}`.`pay_style`,`{{order}}`.`detail`,`{{order}}`.`amount`,`{{order}}`.`state`
		from `{{order}}`
		where `{{order}}`.`pay_style` = 1 and `{{order}}`.`state` = -1";

		//查找商品
		if(isset($_POST['content'])){
			$sql.=" and `{{order}}`.`uid` like '%{$_POST['content']}%'";
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

	public function actionCancel(){
		if(!isset($_GET)){
			$this->error('参数错误');
		}
		$cmodel = Order::model()->findByPk($_GET['id']);
		if(!$cmodel){
			$this->error('订单不存在');
		}
		if(1 == $cmodel['state']){
			$data['state'] = 4;
		} else {
			$data['state'] = 5;
		}

		$data['update_time']=time();
	
		if(false !== Order::model()->updateByPk($_GET['id'],$data)){
			$this->success('更新成功',$this->createUrl('index'));
		} else {
			$this->error('更新失败，稍后再试');
		}
	}

	public function actionSetState(){

		if(!isset($_GET)){
			$this->error('一定是您的访问方式不对');
		}
		$data['state']=$_GET['state'];
		$data['update_time']=time();

		if(false !== Order::model()->updateByPk($_GET['oid'],$data)){
			$this->success('更新成功',$this->createUrl('index'));
		} else {
			$this->error('更新失败，稍后再试');
		}
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

	public function getItemInfo($id){
		return Item::model()->findByPk($id);
	}

}

?>