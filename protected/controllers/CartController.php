<?php 

class CartController extends Controller{
	public function actionIndex(){
		$cookie = Yii::app()->request->getCookies();
		echo $cookie['cart']->value;exit;
		$this->render('index');
	}

	public function actionTest(){
		$items =  array('id' => 1,
						'title' => "丝袜奶茶",
						'count' => 1,
						'price' => 8,
						'heat' => 0,
						'sugar' => 1);

		$cookie = new CHttpCookie('cart',json_encode($items));
		$cookie->expire = time()+60*60*24*30;   //有限期30天
		Yii::app()->request->cookies['mycookie']=$cookie;
	}

	public function actionAjaxAdd2Cart(){
		if(!$_POST){

			return false;
		}
		return 1;
	}
}