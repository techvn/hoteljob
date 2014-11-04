<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 10:59 AM
 */
class Currency extends BaseCurrency {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseCurrency the static model class
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
            'symbol' => Yii::t('application', 'Symbol'),
            'status' => Yii::t('application', 'Status')
        );
    }
}