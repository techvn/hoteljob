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
    /* @var $this BannerController */
    /* @var $model Banner */

    $this->breadcrumbs = array(
        Yii::t('application', 'Banners') => array('admin'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('application', 'Manage Banners'), 'url' => array('admin')),
        array('label' => Yii::t('application', 'Create Banner'), 'url' => array('create')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('application', 'Update Banner'); ?></h1>
    <?php $this->renderPartial('_form', array('model' => $model, 'members' => $members)); ?>
</div>