<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 11/8/14
 * Time: 9:16 AM
 */
class SkillLevel extends BaseSkillLevel {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseSkill the static model class
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
        );
    }
}
