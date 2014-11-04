<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 3:09 PM
 */
class CurriculumPrivate extends BaseCurriculumPrivate {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseCurriculumPrivate the static model class
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
            'field' => Yii::t('application', 'Field'),
            'alias' => Yii::t('application', 'Alias'),
            'alias_en' => Yii::t('application', 'Alias English'),
            'published' => Yii::t('application', 'Published'),
        );
    }
}
