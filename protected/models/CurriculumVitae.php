<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 4:11 PM
 */
class CurriculumVitae extends BaseCurriculumVitae {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseCurriculumVitae the static model class
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
            'members_id' => Yii::t('member_attribute', 'Member'),
            'cv_file' => Yii::t('member_attribute', 'Your CV'),
            'description' => Yii::t('application', 'Description'),
            'experience_year' => Yii::t('application', 'Experience Year'),
            'private_data' => Yii::t('application', 'Private Data'),
            'salary_desired_from' => Yii::t('application', 'Salary Desired From'),
            'salary_desired_to' => Yii::t('application', 'Salary Desired To'),
            'currency_id' => Yii::t('jobs', 'Currency Type'),
            'work_from_away' => Yii::t('jobs', 'Work From Away'),
            'job_major_id' => Yii::t('jobs', 'Job Major'),
            'job_type_id' => Yii::t('jobs', 'Job Type'),
            'job_level_id' => Yii::t('jobs', 'Job Level'),
            'company_scope_id' => Yii::t('application', 'Company Scope'),
            'published' => Yii::t('application', 'Published'),
            'title' => Yii::t('application', 'Title'),
        );
    }
}