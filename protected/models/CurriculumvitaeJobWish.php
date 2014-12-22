<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/3/14
 * Time: 2:49 PM
 */
class CurriculumvitaeJobWish extends BaseCurriculumvitaeJobWish {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BaseCompanyScope the static model class
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
            'curriculum_id' => 'Curriculum',
            'job_major' => 'Job Major',
            'job_level' => 'Job Level',
            'job_type' => 'Job Type',
            'job_salary' => 'Job Salary',
            'work_far' => 'Work far',
            'company_scope' => 'Company Scope',
            'location' => 'Location',
        );
    }
}