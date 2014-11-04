<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/4/14
 * Time: 11:37 AM
 */
class JobApplies extends BaseJobsApply {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseJobsApply the static model class
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
            'members_id' => Yii::t('jobs', 'Candidate'),
            'jobs_id' => Yii::t('jobs', 'Job'),
            'applied_time' => Yii::t('jobs', 'Applied Time'),
            'title' => Yii::t('application', 'Title'),
            'candidate_name' => Yii::t('jobs', 'Candidate Name'),
            'email' => Yii::t('application', 'Email'),
            'brief' => Yii::t('application', 'Brief'),
            'fitness' => Yii::t('application', 'Fitness'),
            'cv_link' => Yii::t('application', 'Cv Link'),
        );
    }/**
 * Add new rule
 * @return array
 */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array(
                'cv_link', 'file',
                'allowEmpty'=>true,
                'types' => 'doc, xls, xlsx, pdf',
                'maxSize'=> 1024 * 1024 * 2, // 2M
                'tooLarge'=> Yii::t('application', 'File has to be smaller than {num}MB', array('{num}' => 2))
            ),
            array('avatar', 'ext.validators.fileUploadErrorValidator'),
            array('avatar', 'unsafe')
        ));
    }
}