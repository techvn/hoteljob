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
    /* @var $this JobAppliesController */
    /* @var $model JobApplies */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Manage Recruitment') => array('admin'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Recruitment'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Recruitment'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Update Recruitment'); ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'members' => $members, 'jobs' => $jobs)); ?>
</div>