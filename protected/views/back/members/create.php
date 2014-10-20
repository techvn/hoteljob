<?php
$_knowMe = array();
foreach($knowMe as $v) {
    $_knowMe[$v->id] = (Yii::app()->language == 'vi' ? $v->title : $v->title_en);
}
$_memberGroup = array();
foreach($memberGroup as $v) {
    $_memberGroup[$v->id] = $v->name;
}
?>
<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
</style>

<div class="row">
    <?php

    /* @var $this MembersController */
    /* @var $model Members */

    $this->breadcrumbs = array(
        Yii::t('backend_menu', 'Member') => array('index'),
        Yii::t('backend_menu', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs',
        array(
            'links' => $this->breadcrumbs
        )
    );
    ?>
</div>

<div class="well">
    <?php

    $this->menu = array(
        array('label' => Yii::t('backend_menu', 'List Member'), 'url' => array('index')),
        array('label' => Yii::t('backend_menu', 'Add Member'), 'url' => array('create'))
    );
    ?>

    <h1><?php echo Yii::t('backend_menu', 'Add Member') ?></h1>

    <?php $this->renderPartial('_form',
        array(
            'model' => $model,
            'memberGroup' => $_memberGroup,
            'knowMe' => $_knowMe,
            'locations' => $locations,
            'securityQues' => $securityQues
        )
    ); ?>
</div>