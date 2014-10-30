<?php

/**
 * This is the model class for table "tbl_faqs_answer".
 *
 * The followings are the available columns in table 'tbl_faqs_answer':
 * @property integer $id
 * @property string $answer
 * @property integer $faqs_question_id
 * @property integer $member_id
 * @property string $ip_address
 * @property string $created_time
 * @property integer $status
 */
class BaseFaqsAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseFaqsAnswer the static model class
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
		return 'tbl_faqs_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('faqs_question_id, member_id, status', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>500),
			array('ip_address', 'length', 'max'=>45),
			array('created_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, answer, faqs_question_id, member_id, ip_address, created_time, status', 'safe', 'on'=>'search'),
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
			'answer' => 'Answer',
			'faqs_question_id' => 'Faqs Question',
			'member_id' => 'Member',
			'ip_address' => 'Ip Address',
			'created_time' => 'Created Time',
			'status' => 'Status',
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
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('faqs_question_id',$this->faqs_question_id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}