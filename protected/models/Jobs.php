<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 10/30/14
 * Time: 2:34 PM
 */
class Jobs extends BaseJobs {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseJobs the static model class
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
            'code' => Yii::t('jobs', 'Code'),
            'job_level_id' => Yii::t('application', 'Require Level'),
            'salary_from' => Yii::t('application', 'Salary From'),
            'salary_to' => Yii::t('application', 'Salary To'),
            'job_time_id' => Yii::t('application', 'Work Time'),
            'require' => Yii::t('application', 'Workers'),
            'job_major_id' => Yii::t('application', 'Job Major'),
            'job_type_id' => Yii::t('application', 'Job Type'),
            'created_time' => Yii::t('jobs', 'Created Time'),
            'end_time' => Yii::t('jobs', 'End Time'),
            'published' => Yii::t('application', 'Published'),
            'description' => Yii::t('application', 'Description'),
            'description_en' => Yii::t('jobs', 'Description English'),
            'language' => Yii::t('application', 'Language'),
            'tags' => Yii::t('application', 'Tags'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}