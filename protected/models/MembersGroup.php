<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 10/15/14
 * Time: 3:20 PM
 */
class MembersGroup extends BaseMembersGroup {
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => Yii::t('membersGroup', 'Name'),
            'alias' => Yii::t('membersGroup', 'Alias'),
            'en_name' => Yii::t('membersGroup', 'En Name'),
        );
    }
}