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
    /* @var $this AcademicController */
    /* @var $model Academic */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Academics') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Academics'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Academic') ?></h1>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>