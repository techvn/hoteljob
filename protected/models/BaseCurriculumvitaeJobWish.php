<?php

/**
 * This is the model class for table "tbl_curriculumvitae_job_wish".
 *
 * The followings are the available columns in table 'tbl_curriculumvitae_job_wish':
 * @property integer $id
 * @property integer $curriculum_id
 * @property integer $job_major
 * @property integer $job_level
 * @property integer $job_type
 * @property integer $job_salary
 * @property integer $work_far
 * @property integer $company_scope
 * @property integer $location
 */
class BaseCurriculumvitaeJobWish extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculumvitae_job_wish';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curriculum_id, job_major, job_level, job_type, job_salary, work_far, company_scope, location', 'required'),
			array('curriculum_id, job_major, job_level, job_type, job_salary, work_far, company_scope, location', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, curriculum_id, job_major, job_level, job_type, job_salary, work_far, company_scope, location', 'safe', 'on'=>'search'),
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
			'curriculum_id' => 'Curriculum',
			'job_major' => 'Job Major',
			'job_level' => 'Job Level',
			'job_type' => 'Job Type',
			'job_salary' => 'Job Salary',
			'work_far' => 'Đi làm xa',
			'company_scope' => 'Company Scope',
			'location' => 'Nơi làm việc mong muốn',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('curriculum_id',$this->curriculum_id);
		$criteria->compare('job_major',$this->job_major);
		$criteria->compare('job_level',$this->job_level);
		$criteria->compare('job_type',$this->job_type);
		$criteria->compare('job_salary',$this->job_salary);
		$criteria->compare('work_far',$this->work_far);
		$criteria->compare('company_scope',$this->company_scope);
		$criteria->compare('location',$this->location);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurriculumvitaeJobWish the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
