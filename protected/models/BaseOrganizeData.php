<?php

/**
 * This is the model class for table "tbl_organize_data".
 *
 * The followings are the available columns in table 'tbl_organize_data':
 * @property integer $id
 * @property string $website
 * @property string $contact
 * @property string $brand
 * @property string $name
 * @property string $name_en
 * @property string $description
 * @property string $fax
 * @property string $tax
 * @property string $email
 * @property string $logo
 * @property integer $company_scope_id
 * @property integer $members_id
 */
class BaseOrganizeData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_organize_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_scope_id, members_id', 'required'),
			array('company_scope_id, members_id', 'numerical', 'integerOnly'=>true),
			array('website, contact', 'length', 'max'=>255),
			array('brand, email', 'length', 'max'=>45),
			array('name, name_en, logo', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			array('fax', 'length', 'max'=>15),
			array('tax', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, website, contact, brand, name, name_en, description, fax, tax, email, logo, company_scope_id, members_id', 'safe', 'on'=>'search'),
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
			'website' => 'Website',
			'contact' => 'Contact',
			'brand' => 'Brand',
			'name' => 'Name',
			'name_en' => 'Name En',
			'description' => 'Description',
			'fax' => 'Fax',
			'tax' => 'Tax',
			'email' => 'Email',
			'logo' => 'Logo',
			'company_scope_id' => 'Company Scope',
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
		$criteria->compare('website',$this->website,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('company_scope_id',$this->company_scope_id);
		$criteria->compare('members_id',$this->members_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseOrganizeData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
