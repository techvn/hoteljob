<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/4/14
 * Time: 2:30 PM
 */
class JobLevel extends BaseJobLevel {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseJobLevel the static model class
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
            'status' => Yii::t('application', 'Status'),
        );
    }
}