<style type="text/css">
    .preloader { display: none; }
    #ajax-content { display: block; }
</style>

<div class="row">
    <?php

    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => array(
            Yii::t('backend_menu', 'Member Manage') => array()
        )
    ));

    ?>
</div>

<div class="well">
    <?php
    /* @var $this MembersController */
    /* @var $dataProvider CActiveDataProvider */

    $this->menu = array(
        array('label' => Yii::t('backend_menu', 'Member Manage'), 'url' => array('admin')),
        array('label' => Yii::t('backend_menu', 'Add Member'), 'url' => array('create'))
    );
    ?>

    <h1><?php echo Yii::t('backend_menu', 'List Member') ?></h1>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    )); ?>
</div>