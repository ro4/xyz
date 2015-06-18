<?php 

class ShowController extends Controller{
	public function actionAbout(){
		$this->render('about');
	}

	public function actionWechat(){
		$this->render('wechat');
	}
}