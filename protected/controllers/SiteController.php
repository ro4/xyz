<?php
/**
 * 显示首页控制器
 * @author silenceper
 *
 */
class SiteController extends Controller{
	/**
	 * 显示主页
	 * @param String $order
	 */
	
	public function actionIndex(){
		$criteria=new CDbCriteria();
		$criteria->condition="type=? and state=?";
		$criteria->select='id,title,price,detail,sale_count,state';
		$criteria->params=array("1","1");
		$models = Item::model()->findAll($criteria);
		$this->render('index',array('models'=>$models));
	}
	
	/**
	 * 验证登入
	 */
	public function actionCheckLogin()
	{
		$model=new LoginForm;
	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->request->urlReferrer);
			}else{
				$this->error("用户名或密码错误");
			}
		}else{
			$this->error('错误的提交方式');
		}
	}

	/**
	 * 用户注册
	 * 
	 */
	public function actionRegister(){
		//已经登入的用户不再现实
		if(!Yii::app()->user->isGuest){
			Yii::app()->request->redirect(Yii::app()->homeUrl);
		}
		$this->render('register');
	}
	
	/**
	 * 用户登入
	 * 
	 */
	public function actionCheckRegister(){
		//已经登入的用户不再现实
		if(!Yii::app()->user->isGuest){
			Yii::app()->request->redirect(Yii::app()->homeUrl);
		}
		
		$model=new RegisterForm();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		//获取信息
		if(isset($_POST['RegisterForm'])){
			$model->attributes=$_POST['RegisterForm'];
			//验证并是实现注册登入
			if($model->validate() && $model->register()){
				$this->success('注册成功，',Yii::app()->homeUrl);
			}else{
				//var_dump($model->errors);
				//exit();
				$this->error("注册失败",$this->createUrl('site/register'));
			}
		}else{
			$this->error('请求错误',$this->createUrl('site/register'));
		}
		
	}
	
	/**
	 * 退出
	 */
	public function actionLogout(){
		//未登入的用户跳转至登入页面
		if(Yii::app()->user->isGuest){
			Yii::app()->request->redirect($this->createUrl('/'));
		}
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * 通过uid得到分享的资料
	 */
	
	public function getDataByUid($uid){
		$criteria=new CDbCriteria();
		$criteria->condition="published_uid=? and state=?";
		$criteria->limit=5;
		$criteria->order="view_count desc";
		$criteria->params=array($uid,1);
		$models=Data::model()->findAll($criteria);
		return $models;
	}

	/**
	 * 通过uid得到用户资料
	 */
	public function getUserInfoByUid($uid ){
		$model = Users::model()->findByPk($uid);
		return $model;
	}

	/**
	 * 获取分享数目
	 */
	public function getDataCount($uid){
		return Data::model()->count('published_uid=:uid and state=:state',array(':uid'=>$uid,':state'=>1));
	}

}