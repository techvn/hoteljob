<?php

/**
 * This is the model class for table "tbl_members".
 *
 * The followings are the available columns in table 'tbl_members':
 * @property integer $id
 * @property string $uname
 * @property string $pwd
 * @property integer $gender
 * @property string $birth
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $created_time
 * @property string $updated_time
 * @property integer $status
 * @property string $gullname
 * @property integer $members_group_id
 * @property integer $security_ques_id
 * @property string $security_ans
 * @property integer $recieve_mail
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $know_me_id
 * @property integer $married
 * @property string $avatar
 * @property integer $nationality
 */
class BaseMembers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname, pwd', 'required'),
			array('gender, status, members_group_id, security_ques_id, recieve_mail, province_id, district_id, know_me_id, married, nationality', 'numerical', 'integerOnly'=>true),
			array('uname, pwd, gullname', 'length', 'max'=>45),
			array('address', 'length', 'max'=>255),
			array('phone, mobile', 'length', 'max'=>15),
			array('email', 'length', 'max'=>30),
			array('security_ans', 'length', 'max'=>100),
			array('avatar', 'length', 'max'=>225),
			array('birth, created_time, updated_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uname, pwd, gender, birth, address, phone, mobile, email, created_time, updated_time, status, gullname, members_group_id, security_ques_id, security_ans, recieve_mail, province_id, district_id, know_me_id, married, avatar, nationality', 'safe', 'on'=>'search'),
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
			'uname' => 'Uname',
			'pwd' => 'Pwd',
			'gender' => 'Gender',
			'birth' => 'Birth',
			'address' => 'Address',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'created_time' => 'Created Time',
			'updated_time' => 'Updated Time',
			'status' => 'Status',
			'gullname' => 'Gullname',
			'members_group_id' => 'Members Group',
			'security_ques_id' => 'Security Ques',
			'security_ans' => 'Security Ans',
			'recieve_mail' => 'Recieve Mail',
			'province_id' => 'Province',
			'district_id' => 'District',
			'know_me_id' => 'Know Me',
			'married' => 'Married',
			'avatar' => 'Avatar',
			'nationality' => 'Nationality',
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
		$criteria->compare('uname',$this->uname,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('gullname',$this->gullname,true);
		$criteria->compare('members_group_id',$this->members_group_id);
		$criteria->compare('security_ques_id',$this->security_ques_id);
		$criteria->compare('security_ans',$this->security_ans,true);
		$criteria->compare('recieve_mail',$this->recieve_mail);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('know_me_id',$this->know_me_id);
		$criteria->compare('married',$this->married);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('nationality',$this->nationality);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseMembers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
