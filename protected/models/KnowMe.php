<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/15/14
 * Time: 3:20 PM
 */
class KnowMe extends BaseKnowMe {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseKnowMe the static model class
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
            'title_en' => Yii::t('jobs', 'Title English'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}