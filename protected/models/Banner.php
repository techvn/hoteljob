<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 11/10/14
 * Time: 9:57 AM
 */
class Banner extends BaseBanner {

    const TYPE_CANDIDATE = 'CANDIDATE';
    const TYPE_STORE = 'STORE';
    const TYPE_STORE_DETAIL = 'STORE_DETAIL';

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseBanner the static model class
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
            'title' => Yii::t('application', 'Title'),
            'title_en' => Yii::t('application', 'Title English'),
            'type' => Yii::t('application', 'Type'),
            'link' => Yii::t('application', 'Link'),
            'banner' => Yii::t('application', 'Banner'),
            'member_id' => Yii::t('application', 'Member'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}