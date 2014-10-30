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
            'title' => 'Title',
            'tile_en' => 'Tile En',
            'code' => 'Code',
            'job_level_id' => 'Job Level',
            'salary_from' => 'Salary From',
            'salary_to' => 'Salary To',
            'job_time_id' => 'Job Time',
            'require' => 'Require',
            'job_major_id' => 'Job Major',
            'created_time' => 'Created Time',
            'end_time' => 'End Time',
            'published' => 'Published',
            'description' => 'Description',
            'description_en' => 'Description En',
            'language' => 'Language',
            'tags' => 'Tags',
            'status' => 'Status',
        );
    }
}