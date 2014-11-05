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
        Yii::t('jobs', 'Manager Jobs') => array('admin'),
        Yii::t('application', 'Update'),
    );

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Job'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Job'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Update Job') ?></h1>

    <?php echo $this->renderPartial('_form', array(
        'model' => $model,
        'jobTypes' => $jobTypes,
        'jobTimes' => $jobTimes,
        'jobMajors' => $jobMajors,
        'jobSalaries' => $jobSalaries,
        'currencies' => $currencies,
        'jobLevels' => $jobLevels,
        'countries' => $countries,
        'jobLocations' => $jobLocations
    )); ?>
</div>