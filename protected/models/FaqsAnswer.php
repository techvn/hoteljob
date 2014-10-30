<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 10/30/14
 * Time: 2:42 PM
 */
class FaqsAnswer extends BaseFaqsAnswer
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseFaqsAnswer the static model class
     */
    public static function model($className = __CLASS__)
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
            'answer' => Yii::t('faqs', 'Answer'),
            'faqs_question_id' => Yii::t('faqs', 'Faqs Question'),
            'member_id' => Yii::t('faqs', 'Member'),
            'ip_address' => Yii::t('faqs', 'Ip Address'),
            'created_time' => Yii::t('application', 'Created Time'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}