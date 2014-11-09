<?php

/**
 * This is the model class for table "tbl_curriculumvitae_degree".
 *
 * The followings are the available columns in table 'tbl_curriculumvitae_degree':
 * @property integer $id
 * @property integer $curriculum_id
 * @property integer $diploma
 * @property string $school_name
 * @property string $major
 * @property integer $country
 * @property integer $province
 * @property string $start
 * @property string $end
 */
class BaseCurriculumvitaeDegree extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculumvitae_degree';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curriculum_id, diploma, country', 'required'),
			array('curriculum_id, diploma, country, province', 'numerical', 'integerOnly'=>true),
			array('school_name, major', 'length', 'max'=>255),
			array('start, end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, curriculum_id, diploma, school_name, major, country, province, start, end', 'safe', 'on'=>'search'),
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
			'diploma' => 'Diploma',
			'school_name' => 'School Name',
			'major' => 'Major',
			'country' => 'Country',
			'province' => 'Province',
			'start' => 'Start',
			'end' => 'End',
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
		$criteria->compare('diploma',$this->diploma);
		$criteria->compare('school_name',$this->school_name,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('province',$this->province);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurriculumvitaeDegree the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
