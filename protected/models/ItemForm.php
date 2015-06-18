<?php

class ItemForm extends CFormModel
{
	public $mark;
	public $sugar;
	public $heat;
	public $count;


	public function rules()
	{
		return array(
			array('sugar', 'required'),
			array('heat', 'required'),
			array('count', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'sugar'=>'标题',
			'mark'=>'资料',
			'heat'=>'问题描述',
		);
	}
	
}
