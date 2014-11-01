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
    /* @var $this JobMajorController */
    /* @var $model JobMajor */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Job Majors') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => 'Manage Jobs Major', 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create JobMajor') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model, 'jobsMajor' => $jobsMajor)); ?>
</div>