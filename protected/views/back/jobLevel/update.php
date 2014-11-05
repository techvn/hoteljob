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
    /* @var $this JobLevelController */
    /* @var $model JobLevel */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Job Positions') => array('admin'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Job Position'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Job Positions'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1>Update JobLevel <?php echo $model->id; ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>