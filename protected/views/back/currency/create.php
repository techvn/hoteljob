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
        Yii::t('jobs', 'Currencies') => array('index'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Currency'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Create Currency') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>