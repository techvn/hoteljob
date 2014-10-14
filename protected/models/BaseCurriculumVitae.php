<?php

/**
 * This is the model class for table "tbl_curriculum_vitae".
 *
 * The followings are the available columns in table 'tbl_curriculum_vitae':
 * @property integer $id
 * @property integer $members_id
 * @property string $cv_file
 * @property string $description
 * @property integer $experience_year
 * @property string $private_data
 * @property double $salary_desired_from
 * @property double $salary_desired_to
 * @property integer $currency_id
 * @property integer $work_from_away
 * @property integer $job_major_id
 * @property integer $job_type_id
 * @property integer $job_level_id
 * @property integer $company_scope_id
 * @property integer $published
 * @property string $title
 */
class BaseCurriculumVitae extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculum_vitae';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('members_id, currency_id, job_major_id, job_type_id, job_level_id, company_scope_id', 'required'),
			array('members_id, experience_year, currency_id, work_from_away, job_major_id, job_type_id, job_level_id, company_scope_id, published', 'numerical', 'integerOnly'=>true),
			array('salary_desired_from, salary_desired_to', 'numerical'),
			array('cv_file', 'length', 'max'=>225),
			array('description', 'length', 'max'=>500),
			array('private_data', 'length', 'max'=>255),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, members_id, cv_file, description, experience_year, private_data, salary_desired_from, salary_desired_to, currency_id, work_from_away, job_major_id, job_type_id, job_level_id, company_scope_id, published, title', 'safe', 'on'=>'search'),
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
			'cv_file' => 'Cv File',
			'description' => 'Description',
			'experience_year' => 'Experience Year',
			'private_data' => 'Private Data',
			'salary_desired_from' => 'Salary Desired From',
			'salary_desired_to' => 'Salary Desired To',
			'currency_id' => 'Currency',
			'work_from_away' => 'Work From Away',
			'job_major_id' => 'Job Major',
			'job_type_id' => 'Job Type',
			'job_level_id' => 'Job Level',
			'company_scope_id' => 'Company Scope',
			'published' => 'Published',
			'title' => 'Title',
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
		$criteria->compare('members_id',$this->members_id);
		$criteria->compare('cv_file',$this->cv_file,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('experience_year',$this->experience_year);
		$criteria->compare('private_data',$this->private_data,true);
		$criteria->compare('salary_desired_from',$this->salary_desired_from);
		$criteria->compare('salary_desired_to',$this->salary_desired_to);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('work_from_away',$this->work_from_away);
		$criteria->compare('job_major_id',$this->job_major_id);
		$criteria->compare('job_type_id',$this->job_type_id);
		$criteria->compare('job_level_id',$this->job_level_id);
		$criteria->compare('company_scope_id',$this->company_scope_id);
		$criteria->compare('published',$this->published);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurriculumVitae the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
