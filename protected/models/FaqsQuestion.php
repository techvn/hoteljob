<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 10/30/14
 * Time: 1:43 PM
 */
class FaqsQuestion extends BaseFaqsQuestion {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseFaqsQuestion the static model class
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
            'member_id' => Yii::t('faqs', 'Member'),
            'question' => Yii::t('faqs', 'Question'),
            'faqs_category_id' => Yii::t('faqs', 'Faqs Category'),
            'brief' => Yii::t('application', 'Brief'),
            'ip_address' => Yii::t('faqs', 'Ip Address'),
            'job_id' => Yii::t('faqs', 'Job'),
            'viewed' => Yii::t('application', 'Viewed'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}