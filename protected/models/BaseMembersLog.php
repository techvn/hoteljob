<?php

/**
 * This is the model class for table "tbl_members_log".
 *
 * The followings are the available columns in table 'tbl_members_log':
 * @property integer $id
 * @property string $action_name
 * @property string $datetime
 * @property string $ip_address
 * @property string $member_name
 * @property integer $members_id
 */
class BaseMembersLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_members_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('members_id', 'numerical', 'integerOnly'=>true),
			array('action_name', 'length', 'max'=>100),
			array('ip_address, member_name', 'length', 'max'=>45),
			array('datetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, action_name, datetime, ip_address, member_name, members_id', 'safe', 'on'=>'search'),
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
			'action_name' => 'Action Name',
			'datetime' => 'Datetime',
			'ip_address' => 'Ip Address',
			'member_name' => 'Member Name',
			'members_id' => 'Members',
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
		$criteria->compare('action_name',$this->action_name,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('member_name',$this->member_name,true);
		$criteria->compare('members_id',$this->members_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseMembersLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
