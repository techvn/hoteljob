<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 11:39 AM
 */
class JobSalary extends BaseJobSalary {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseJobSalary the static model class
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
            'from' => Yii::t('application', 'From'),
            'to' => Yii::t('application', 'To'),
            'type' => Yii::t('jobs', 'Currency Type'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}