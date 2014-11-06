<?php

/**
 * This is the model class for table "tbl_jobs_apply".
 *
 * The followings are the available columns in table 'tbl_jobs_apply':
 * @property integer $id
 * @property integer $members_id
 * @property integer $jobs_id
 * @property string $applied_time
 * @property string $title
 * @property string $candidate_name
 * @property string $email
 * @property string $brief
 * @property string $fitness
 * @property string $cv_link
 */
class BaseJobsApply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseJobsApply the static model class
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
		return 'tbl_jobs_apply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('members_id, jobs_id, title, email', 'required'),
			array('members_id, jobs_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('candidate_name, email', 'length', 'max'=>45),
			array('brief', 'length', 'max'=>500),
			array('cv_link', 'length', 'max'=>255),
			array('applied_time, fitness', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, members_id, jobs_id, applied_time, title, candidate_name, email, brief, fitness, cv_link', 'safe', 'on'=>'search'),
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
			'members_id' => 'Members',
			'jobs_id' => 'Jobs',
			'applied_time' => 'Applied Time',
			'title' => 'Title',
			'candidate_name' => 'Candidate Name',
			'email' => 'Email',
			'brief' => 'Brief',
			'fitness' => 'Fitness',
			'cv_link' => 'Cv Link',
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
		$criteria->compare('members_id',$this->members_id);
		$criteria->compare('jobs_id',$this->jobs_id);
		$criteria->compare('applied_time',$this->applied_time,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('candidate_name',$this->candidate_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('fitness',$this->fitness,true);
		$criteria->compare('cv_link',$this->cv_link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}