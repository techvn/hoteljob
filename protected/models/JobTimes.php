<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/4/14
 * Time: 2:07 PM
 */
class JobTimes extends BaseJobTime {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseJobTime the static model class
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
            'title' => 'Title',
            'title_en' => 'Title En',
            'pos' => 'Pos',
            'status' => 'Status',
        );
    }
}