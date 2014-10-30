<?php

/**
 * This is the model class for table "tbl_faqs_question".
 *
 * The followings are the available columns in table 'tbl_faqs_question':
 * @property integer $id
 * @property integer $member_id
 * @property string $question
 * @property integer $faqs_category_id
 * @property string $brief
 * @property string $ip_address
 * @property integer $job_id
 * @property integer $viewed
 * @property integer $status
 */
class BaseFaqsQuestion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseFaqsQuestion the static model class
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
		return 'tbl_faqs_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id', 'required'),
			array('member_id, faqs_category_id, job_id, viewed, status', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>100),
			array('brief', 'length', 'max'=>225),
			array('ip_address', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, member_id, question, faqs_category_id, brief, ip_address, job_id, viewed, status', 'safe', 'on'=>'search'),
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
			'member_id' => 'Member',
			'question' => 'Question',
			'faqs_category_id' => 'Faqs Category',
			'brief' => 'Brief',
			'ip_address' => 'Ip Address',
			'job_id' => 'Job',
			'viewed' => 'Viewed',
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
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('faqs_category_id',$this->faqs_category_id);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}