<?php

class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detail', 'length', 'max'=>255),
			array('add_time, update_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('oid, uid, platform, pay_style, add_time, update_time,amount, state', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oid' => 'ID',
			'uid' => 'uid',
			'amount' => 'amount',
			'detail' => 'Detail',
			'name' => 'name',
			'mark' => 'mark',
			'address' => 'Address',
			'add_time' => 'Add Time',
			'update_time' => 'Update Time',
			'platform' => 'Platform',
			'pay_style' => 'Pay Style',
			'state' => 'State',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('oid',$this->oid);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mark',$this->mark,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('platform',$this->platform,true);
		$criteria->compare('pay_style',$this->pay_style,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStateOptions()
    {
        return array(
            0 => '待付款',
            1 => '已付款',
            2 => '已经确认',
            3 => '已发货',
            4 => '取消'
        );
    }
}