<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/15/14
 * Time: 9:27 AM
 */
class Locations extends BaseLocations {
    const LOCATION_VN = 1;

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