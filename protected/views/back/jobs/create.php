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
    /* @var $this JobsController */
    /* @var $model Jobs */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Manage Jobs') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Jobs'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Job') ?></h1>
    <?php echo $this->renderPartial('_form', array(
        'model' => $model,
        'jobTypes' => $jobTypes,
        'jobTimes' => $jobTimes,
        'jobMajors' => $jobMajors,
        'jobSalaries' => $jobSalaries,
        'currencies' => $currencies,
        'jobLevels' => $jobLevels,
        'countries' => $countries
    )); ?>
</div>