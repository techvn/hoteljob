<?php

/**
 * This is the model class for table "tbl_curriculumvitae_experience_working".
 *
 * The followings are the available columns in table 'tbl_curriculumvitae_experience_working':
 * @property integer $id
 * @property integer $curriculum_id
 * @property string $position
 * @property integer $competence
 * @property integer $occupation
 * @property string $company_name
 * @property integer $country
 * @property integer $province
 * @property string $start
 * @property string $end
 * @property string $des
 */
class BaseCurriculumvitaeExperienceWorking extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculumvitae_experience_working';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curriculum_id, position, competence, occupation, country, province, des', 'required'),
			array('curriculum_id, competence, occupation, country, province', 'numerical', 'integerOnly'=>true),
			array('position, company_name', 'length', 'max'=>255),
			array('start, end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, curriculum_id, position, competence, occupation, company_name, country, province, start, end, des', 'safe', 'on'=>'search'),
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
			'position' => 'Position',
			'competence' => 'Competence',
			'occupation' => 'Occupation',
			'company_name' => 'Company Name',
			'country' => 'Country',
			'province' => 'Province',
			'start' => 'Start',
			'end' => 'End',
			'des' => 'Des',
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
		$criteria->compare('position',$this->position,true);
		$criteria->compare('competence',$this->competence);
		$criteria->compare('occupation',$this->occupation);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('province',$this->province);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('des',$this->des,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurriculumvitaeExperienceWorking the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
