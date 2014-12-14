<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 12/14/14
 * Time: 11:24 AM
 */
class Partner extends BasePartner {
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BasePartner the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    /**
     * Add new rule
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array(
                'logo', 'file',
                'allowEmpty'=>true,
                'types' => 'jpg, gif, png, jpeg',
                'maxSize'=> 2 * 1024 * 1024, // 2M
                'tooLarge'=> Yii::t('application', 'File has to be smaller than {num}MB', array('{num}' => 2))
            ),
            array('logo', 'ext.validators.fileUploadErrorValidator'),
            array('logo', 'unsafe')
        ));
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'logo' => Yii::t('partner_attr', 'Logo'),
            'name' => Yii::t('partner_attr', 'Name'),
            'link' => Yii::t('partner_attr', 'Link'),
            'pos' => Yii::t('application', 'Position'),
            'status' => Yii::t('application', 'Status'),
        );
    }
}