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
    /* @var $this LocationsController */
    /* @var $model Locations */

    $this->breadcrumbs = array(
        Yii::t('location_attribute', 'Locations') => array('index'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('location_attribute', 'Manage Locations'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('location_attribute', 'Create Location') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model, 'locations' => $locations)); ?>
</div>