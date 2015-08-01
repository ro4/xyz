<?php

class CartController extends Controller{
	public function actionIndex(){
		$cookie = Yii::app()->request->getCookies();
		if($cookie['cart'] == null){
			$this->error("购物车为空,去买点奶茶把","/item");
		}
		$models = json_decode($cookie['cart']->value);

		$this->render('index',array('models'=>$models));
	}

	public function actionPay(){

//		$total = 0;
//		$cookie = Yii::app()->request->getCookies();
//		$models = json_decode($cookie['cart']->value);
		$this->render('pay');

	}

	public function actionCheckPay(){
		$sm = Server::model()->findByPk(1);
		if($sm['is_open'] == '0'){
			$this->error("本店已经打烊，暂时不接受订单，客官明日再来!",'/');
		}
		if($_POST['tel'] == '' or $_POST['address'] == ''){
			$this->error("请输入联系方式和地址");
		}
		$total = 0;
		$cookies = Yii::app()->request->getCookies();
		if($cookies['cart'] == null){
			$this->error("购物车为空,去买点奶茶把","/item");
		}
		$cartModel = json_decode($cookies['cart']);
		foreach ($cartModel as $model) {
			$itemModel = $this->getItemInfo($model->id);
			if($itemModel['state'] != '1'){
				$this->error($itemModel['title']."已售光或者下架",'/cart');
			}
			$this->incSaleCount($itemModel['id'],$model->count);
			$total = $model->count * $itemModel['price'] + $total;
		}
		$order = new Order();
		$order->address = htmlspecialchars($_POST['address']);
		$order->add_time = time();
		$order->uid = htmlspecialchars($_POST['tel']);
		$order->name = htmlspecialchars($_POST['name']);
		$order->mark = htmlspecialchars($_POST['mark']);
		$order->pay_style = $_POST['pay_style'];
		$order->platform = Yii::app()->request->getUserAgent();
		if($_POST['pay_style'] == 0){
			$order->state = 0;
		} else {
			$order->state = -1;
		}
		$order->detail = $cookies['cart'];

		$order->amount = $total;
		if(!$order->save()){
			$this->error("提交订单失败，联系店家！","/show/about");
		} else {
			$criteria=new CDbCriteria();
			$criteria->condition="uid=? and add_time=?";
			$criteria->select='uid,address,pay_style,amount,detail,state,mark,name';
			$criteria->params=array($order->uid,$order->add_time);
			$orderModel = Order::model()->find($criteria);
			unset($cookies['cart']);
			$this->render("success",array('model'=>$orderModel));
		}
	}
	public function getItemInfo($id){
		return Item::model()->findByPk($id);
	}


	private function incSaleCount($id,$num){
		if(!Item::model()->updateByPk($id, array('sale_count'=>new CDbExpression('sale_count+'.$num)))){
			throw new ErrorException('计数失败');
		}
	}
}
