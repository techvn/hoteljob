<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/15/14
 * Time: 9:02 PM
 */
class SecurityQues extends BaseSecurityQues {
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ques' => Yii::t('application', 'Question'),
            'ques_en' => Yii::t('application', 'Question English'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}