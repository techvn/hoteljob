<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 2:03 PM
 */
class SecurityQuestion extends BaseSecurityQues {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseSecurityQues the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ques' => Yii::t('application', 'Question'),
            'ques_en' => Yii::t('member_attribute', 'Question English'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}