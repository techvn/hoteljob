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
    /* @var $this JobTypeController */
    /* @var $model JobType */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Job Types') => array('admin'),
        Yii::t('jobs', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links'=>$this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Job Type'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Job Type') ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>