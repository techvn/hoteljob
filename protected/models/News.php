<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/28/14
 * Time: 12:44 PM
 */
class News extends BaseNews {
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('application', 'Title'),
            'brief' => Yii::t('news', 'Brief'),
            'thumb' => Yii::t('news', 'Thumb'),
            'organize_id' => Yii::t('news', 'Organize'),
            'content' => Yii::t('application', 'Content'),
            'status' => Yii::t('application', 'Status'),
            'created_time' => Yii::t('application', 'Created Time'),
            'public_time' => Yii::t('application', 'Public Time'),
            'unpublic_time' => Yii::t('news', 'UnPublic Time'),
            'tag' => Yii::t('application', 'Tag'),
            'viewed' => Yii::t('news', 'Viewed'),
            'file' => Yii::t('news', 'File'),
            'title_en' => Yii::t('news', 'Title English'),
            'brief_en' => Yii::t('news', 'Brief English'),
            'content_en' => Yii::t('news', 'Content English'),
            'tag_en' => Yii::t('news', 'Tag English'),
            'news_category_id' => Yii::t('news', 'News Category'),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseNews the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}