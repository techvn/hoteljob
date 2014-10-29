<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/27/14
 * Time: 7:37 PM
 */
class NewsCategory extends BaseNewsCategory {

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => Yii::t('newsCategory', 'Name'),
            'name_en' => Yii::t('newsCategory', 'Name English'),
            'parent_id' => Yii::t('newsCategory', 'Parent'),
            'status' => Yii::t('newsCategory', 'Status'),
            'type' => Yii::t('newsCategory', 'Type'),
            'members_id' => Yii::t('newsCategory', 'Members'),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseNewsCategory the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}