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
    /* @var $this CurrencyController */
    /* @var $model Currency */

    $this->breadcrumbs = array(
        'Currencies' => array('index'),
        $model->title => array('view', 'id' => $model->id),
        'Update',
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Currency'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Currency'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Update Currency') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>