<?php 

class ItemController extends Controller{
	public function actionIndex(){
		if($_GET){
			$cate = htmlspecialchars($_GET['cate']);
			$criteria=new CDbCriteria();
			$criteria->condition="type=?";
			$criteria->select='id,title,price,detail,sale_count,state';
			$criteria->params=array($cate);
			$models = Item::model()->findAll($criteria);
		} else {
			$models = Item::model()->findAll();
		}
		$this->render('index',array('models'=>$models));
	}

	public function actionWechat(){
		$this->render('wechat');
	}
}