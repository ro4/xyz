<?php

class OrderForm extends CFormModel
{
	public $uid;
	public $pay_style;
	public $address;


	public function rules()
	{
		return array(
			array('uid', 'required'),
			array('pay_style', 'required'),
			array('address', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'uid'=>'标题',
			'pay_style'=>'资料',
			'address'=>'问题描述',
		);
	}
	
}
