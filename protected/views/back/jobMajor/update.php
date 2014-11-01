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
        Yii::t('jobs', 'Update'),
    );

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create JobMajor'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage JobMajor'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Update Job Major'); ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'jobsMajor' => $jobsMajor)); ?>
</div>