<?php 

class ItemController extends Controller{
	public function actionIndex(){
		if($_GET){
			$cate = htmlspecialchars($_GET['cate']);
			$criteria=new CDbCriteria();
			$criteria->condition="type=? and state!=?";
			$criteria->select='id,title,price,detail,sale_count,state';
			$criteria->params=array($cate,'0');
			$models = Item::model()->findAll($criteria);
		} else {
			$criteria=new CDbCriteria();
			$criteria->condition="state!=?";
			$criteria->select='id,title,price,detail,sale_count,state';
			$criteria->params=array('0');
			$models = Item::model()->findAll($criteria);
		}
		$this->render('index',array('models'=>$models));
	}

	public function actionWechat(){
		$this->render('wechat');
	}
}