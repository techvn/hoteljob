<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/15/14
 * Time: 9:27 AM
 */
class Locations extends BaseLocations {
    const LOCATION_VN = 1;

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseLocations the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => Yii::t('location_attribute', 'Name'),
            'code' => Yii::t('location_attribute', 'Code'),
            'parent_id' => Yii::t('location_attribute', 'Parent'),
            'pos' => Yii::t('location_attribute', 'Position')
        );
    }
}