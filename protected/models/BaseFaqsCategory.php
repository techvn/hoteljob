<?php

/**
 * This is the model class for table "tbl_faqs_category".
 *
 * The followings are the available columns in table 'tbl_faqs_category':
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property integer $parent_id
 * @property integer $pos
 * @property string $brief
 * @property string $brief_en
 * @property integer $status
 */
class BaseFaqsCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseFaqsCategory the static model class
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
		return 'tbl_faqs_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pos', 'required'),
			array('parent_id, pos, status', 'numerical', 'integerOnly'=>true),
			array('title, title_en', 'length', 'max'=>100),
			array('brief', 'length', 'max'=>255),
			array('brief_en', 'length', 'max'=>225),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, title_en, parent_id, pos, brief, brief_en, status', 'safe', 'on'=>'search'),
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
			'title_en' => 'Title En',
			'parent_id' => 'Parent',
			'pos' => 'Pos',
			'brief' => 'Brief',
			'brief_en' => 'Brief En',
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
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('brief_en',$this->brief_en,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}