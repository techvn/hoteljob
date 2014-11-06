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
 * @property string $tel
 * @property string $phone
 * @property string $fax
 * @property string $tax
 * @property string $email
 * @property string $logo
 * @property string $contact
 * @property integer $company_scope_id
 * @property string $address
 * @property integer $province
 * @property integer $district
 * @property string $description
 * @property string $description_en
 * @property string $created_time
 * @property string $ended_time
 * @property integer $status
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
			array('name, members_id, email, company_scope_id', 'required'),
			array('members_id, company_scope_id, province, district, status', 'numerical', 'integerOnly'=>true),
			array('name, name_en, logo', 'length', 'max'=>100),
			array('website, contact, address', 'length', 'max'=>255),
			array('brand, email', 'length', 'max'=>45),
			array('tel, phone', 'length', 'max'=>50),
			array('fax', 'length', 'max'=>15),
			array('tax', 'length', 'max'=>25),
			array('description', 'length', 'max'=>500),
			array('description_en, created_time, ended_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, name_en, members_id, website, brand, tel, phone, fax, tax, email, logo, contact, company_scope_id, address, province, district, description, description_en, created_time, ended_time, status', 'safe', 'on'=>'search'),
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
			'tel' => 'Tel',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'tax' => 'Tax',
			'email' => 'Email',
			'logo' => 'Logo',
			'contact' => 'Contact',
			'company_scope_id' => 'Company Scope',
			'address' => 'Address',
			'province' => 'Province',
			'district' => 'District',
			'description' => 'Description',
			'description_en' => 'Description En',
			'created_time' => 'Created Time',
			'ended_time' => 'Ended Time',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('members_id',$this->members_id);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('company_scope_id',$this->company_scope_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('province',$this->province);
		$criteria->compare('district',$this->district);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('description_en',$this->description_en,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('ended_time',$this->ended_time,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}