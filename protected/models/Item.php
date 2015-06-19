<?php

class Item extends CActiveRecord
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
		return '{{item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, detail, state, price', 'required'),
			array('detail', 'length', 'max'=>255),
			array('add_time, update_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, detail, add_time, update_time, state', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Title',
			'price' => 'Price',
			'detail' => 'Detail',
			'type' => 'Type',
			'type_name' => 'Type Name',
			'add_time' => 'Add Time',
			'update_time' => 'Update Time',
			'view_count' => 'View Count',
			'focus_count' => 'Focus Count',
			'comment_count' => 'Comment Count',
			'sale_count'=> 'sale Count',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('type_name',$this->type_name,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('view_count',$this->view_count,true);
		$criteria->compare('focus_count',$this->focus_count,true);
		$criteria->compare('comment_count',$this->comment_count,true);
		$criteria->compare('sale_count',$this->download_count,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStateOptions()
    {
        return array(
            0 => '下架',
            1 => '正常',
            2 => '售光'
        );
    }
}