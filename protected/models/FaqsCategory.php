<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 10/30/14
 * Time: 8:20 AM
 */
class FaqsCategory extends BaseFaqsCategory {
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('application', 'Title'),
            'title_en' => Yii::t('faqCategory', 'Title English'),
            'parent_id' => Yii::t('faqCategory', 'Parent'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
            'brief' => Yii::t('application', 'Brief'),
            'brief_en' => Yii::t('faqCategory', 'Brief English'),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseFaqsCategory the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}