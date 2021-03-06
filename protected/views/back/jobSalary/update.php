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
    /* @var $this JobSalaryController */
    /* @var $model JobSalary */

    $this->breadcrumbs = array(
        'Job Salaries' => array('index'),
        $model->id => array('view', 'id' => $model->id),
        'Update',
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Template Salary'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Template Salaries'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Update Template Salary'); ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'currencies'=>$currencies)); ?>
</div>