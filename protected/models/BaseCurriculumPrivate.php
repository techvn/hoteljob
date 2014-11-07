<?php

/**
 * This is the model class for table "tbl_curriculum_private".
 *
 * The followings are the available columns in table 'tbl_curriculum_private':
 * @property integer $id
 * @property string $field
 * @property string $alias
 * @property string $alias_en
 * @property integer $published
 */
class BaseCurriculumPrivate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_curriculum_private';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('field', 'required'),
			array('published', 'numerical', 'integerOnly'=>true),
			array('field', 'length', 'max'=>45),
			array('alias, alias_en', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, field, alias, alias_en, published', 'safe', 'on'=>'search'),
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
			'field' => 'Field',
			'alias' => 'Alias',
			'alias_en' => 'Alias En',
			'published' => 'Published',
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
		$criteria->compare('field',$this->field,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('alias_en',$this->alias_en,true);
		$criteria->compare('published',$this->published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurriculumPrivate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
