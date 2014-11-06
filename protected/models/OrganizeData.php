<?php
/**
 * Created by PhpStorm.
 * User: binhnt1
 * Date: 11/5/14
 * Time: 3:20 PM
 */
class OrganizeData extends BaseOrganizeData {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BaseOrganizeData the static model class
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
            'name' => Yii::t('application', 'Name'),
            'name_en' => Yii::t('organize', 'Name English'),
            'members_id' => Yii::t('application', 'Member'),
            'website' => Yii::t('application', 'Website'),
            'brand' => Yii::t('application', 'Brand'),
            'tel' => Yii::t('application', 'Telephone'),
            'phone' => Yii::t('application', 'Phone'),
            'fax' => Yii::t('application', 'Fax'),
            'tax' => Yii::t('application', 'Tax'),
            'email' => Yii::t('application', 'Email'),
            'logo' => Yii::t('application', 'Logo'),
            'contact' => Yii::t('application', 'Contact'),
            'company_scope_id' => Yii::t('application', 'Company Scope'),
            'description' => Yii::t('application', 'Description'),
            'description_en' => Yii::t('organize', 'Description English'),
            'created_time' => 'Created Time',
            'ended_time' => Yii::t('application', 'Ended Time'),
            'status' => Yii::t('application', 'Status')
        );
    }
}