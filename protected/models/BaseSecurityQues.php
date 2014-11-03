<?php

/**
 * This is the model class for table "tbl_security_ques".
 *
 * The followings are the available columns in table 'tbl_security_ques':
 * @property integer $id
 * @property string $ques
 * @property string $ques_en
 * @property integer $pos
 * @property integer $status
 */
class BaseSecurityQues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseSecurityQues the static model class
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
		return 'tbl_security_ques';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ques', 'required'),
			array('pos, status', 'numerical', 'integerOnly'=>true),
			array('ques', 'length', 'max'=>225),
			array('ques_en', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ques, ques_en, pos, status', 'safe', 'on'=>'search'),
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
			'ques' => 'Ques',
			'ques_en' => 'Ques En',
			'pos' => 'Pos',
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
		$criteria->compare('ques',$this->ques,true);
		$criteria->compare('ques_en',$this->ques_en,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}