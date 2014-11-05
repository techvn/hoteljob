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
            'name' => 'Name',
            'name_en' => 'Name En',
            'members_id' => 'Members',
            'website' => 'Website',
            'brand' => 'Brand',
            'fax' => 'Fax',
            'tax' => 'Tax',
            'email' => 'Email',
            'logo' => 'Logo',
            'contact' => 'Contact',
            'company_scope_id' => 'Company Scope',
            'description' => 'Description',
            'description_en' => 'Description En',
        );
    }
}