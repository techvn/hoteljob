<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/14/14
 * Time: 9:10 AM
 */
class Members extends BaseMembers {
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'uname' => Yii::t('member_attribute', 'UserName'),
            'pwd' => Yii::t('member_attribute', 'Password'),
            'gender' => Yii::t('member_attribute', 'Gender'),
            'birth' => Yii::t('member_attribute', 'Birth'),
            'address' => Yii::t('member_attribute', 'Address'),
            'phone' => Yii::t('member_attribute', 'Phone'),
            'mobile' => Yii::t('member_attribute', 'Mobile'),
            'email' => 'Email',
            'created_time' => Yii::t('member_attribute', 'Created Time'),
            'updated_time' => Yii::t('member_attribute', 'Updated Time'),
            'status' => Yii::t('member_attribute', 'Status'),
            'gullname' => Yii::t('member_attribute', 'Gull Name'),
            'members_group_id' => Yii::t('member_attribute', 'Members Group'),
            'security_ques_id' => Yii::t('member_attribute', 'Security Ques'),
            'security_ans' => Yii::t('member_attribute', 'Security Ans'),
            'recieve_mail' => Yii::t('member_attribute', 'Recieve Mail'),
            'province_id' => Yii::t('member_attribute', 'Province'),
            'district_id' => Yii::t('member_attribute', 'District'),
            'know_me_id' => Yii::t('member_attribute', 'Know Me'),
            'married' => Yii::t('member_attribute', 'Married'),
            'avatar' => Yii::t('member_attribute', 'Avatar'),
            'nationality' => Yii::t('member_attribute', 'Nationality')
        );
    }
}