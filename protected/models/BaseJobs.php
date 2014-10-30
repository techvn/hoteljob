<?php

/**
 * This is the model class for table "tbl_jobs".
 *
 * The followings are the available columns in table 'tbl_jobs':
 * @property integer $id
 * @property string $title
 * @property string $tile_en
 * @property string $code
 * @property integer $job_level_id
 * @property double $salary_from
 * @property double $salary_to
 * @property integer $job_time_id
 * @property integer $require
 * @property integer $job_major_id
 * @property string $created_time
 * @property string $end_time
 * @property integer $published
 * @property string $description
 * @property string $description_en
 * @property integer $language
 * @property string $tags
 * @property integer $status
 */
class BaseJobs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseJobs the static model class
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
		return 'tbl_jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_level_id, job_time_id, job_major_id, language', 'required'),
			array('job_level_id, job_time_id, require, job_major_id, published, language, status', 'numerical', 'integerOnly'=>true),
			array('salary_from, salary_to', 'numerical'),
			array('title, tile_en, code', 'length', 'max'=>45),
			array('tags', 'length', 'max'=>100),
			array('created_time, end_time, description, description_en', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, tile_en, code, job_level_id, salary_from, salary_to, job_time_id, require, job_major_id, created_time, end_time, published, description, description_en, language, tags, status', 'safe', 'on'=>'search'),
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
			'tile_en' => 'Tile En',
			'code' => 'Code',
			'job_level_id' => 'Job Level',
			'salary_from' => 'Salary From',
			'salary_to' => 'Salary To',
			'job_time_id' => 'Job Time',
			'require' => 'Require',
			'job_major_id' => 'Job Major',
			'created_time' => 'Created Time',
			'end_time' => 'End Time',
			'published' => 'Published',
			'description' => 'Description',
			'description_en' => 'Description En',
			'language' => 'Language',
			'tags' => 'Tags',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('tile_en',$this->tile_en,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('job_level_id',$this->job_level_id);
		$criteria->compare('salary_from',$this->salary_from);
		$criteria->compare('salary_to',$this->salary_to);
		$criteria->compare('job_time_id',$this->job_time_id);
		$criteria->compare('require',$this->require);
		$criteria->compare('job_major_id',$this->job_major_id);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('description_en',$this->description_en,true);
		$criteria->compare('language',$this->language);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}