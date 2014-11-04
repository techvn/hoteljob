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
            'members_id' => 'Members',
            'cv_file' => 'Cv File',
            'description' => 'Description',
            'experience_year' => 'Experience Year',
            'private_data' => 'Private Data',
            'salary_desired_from' => 'Salary Desired From',
            'salary_desired_to' => 'Salary Desired To',
            'currency_id' => 'Currency',
            'work_from_away' => 'Work From Away',
            'job_major_id' => 'Job Major',
            'job_type_id' => 'Job Type',
            'job_level_id' => 'Job Level',
            'company_scope_id' => 'Company Scope',
            'published' => 'Published',
            'title' => 'Title',
        );
    }
}