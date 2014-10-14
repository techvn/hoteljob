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

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>