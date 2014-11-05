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
    /* @var $this JobTimeController */
    /* @var $model JobTime */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Template Times') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Template Times'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Template Time') ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>