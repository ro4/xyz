<?php
/**
 * @author silenceper
 */
class SiteController extends BaseController{
	/**
	 * 显示网站首页
	 */
	public function actionIndex(){
		$this->render('index');
	}

	
	/**
	 * 显示服务器信息
	 */
	public function actionInfo(){
		echo '系统信息！~';
	}

	public function actionSetServer($var){

		if(Server::model()->updateByPk('1',array('is_open'=>$var))){
			$this->success("修改成功");
		}else {
			$this->success("修改失败");
		}
	}

	public function getServer(){
		return Server::model()->findByPk(1);
	}
}

?>