<?php

/**
 * This is the model class for table "tbl_organize_data".
 *
 * The followings are the available columns in table 'tbl_organize_data':
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property integer $members_id
 * @property string $website
 * @property string $brand
 * @property string $fax
 * @property string $tax
 * @property string $email
 * @property string $logo
 * @property string $contact
 * @property integer $company_scope_id
 * @property string $description
 * @property string $description_en
 */
class BaseOrganizeData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseOrganizeData the static model class
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
			array('members_id, company_scope_id, description_en', 'required'),
			array('members_id, company_scope_id', 'numerical', 'integerOnly'=>true),
			array('name, name_en, logo', 'length', 'max'=>100),
			array('website, contact', 'length', 'max'=>255),
			array('brand, email', 'length', 'max'=>45),
			array('fax', 'length', 'max'=>15),
			array('tax', 'length', 'max'=>25),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, name_en, members_id, website, brand, fax, tax, email, logo, contact, company_scope_id, description, description_en', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'name_en' => 'Name En',
			'members_id' => 'Members',
			'website' => 'Website',
			'brand' => 'Brand',
			'fax' => 'Fax',
			'tax' => 'Tax',
			'email' => 'Email',
			'logo' => 'Logo',
			'contact' => 'Contact',
			'company_scope_id' => 'Company Scope',
			'description' => 'Description',
			'description_en' => 'Description En',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('members_id',$this->members_id);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('company_scope_id',$this->company_scope_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('description_en',$this->description_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}