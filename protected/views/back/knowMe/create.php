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
    /* @var $this KnowMeController */
    /* @var $model KnowMe */

    $this->breadcrumbs = array(
        Yii::t('member_attribute', 'Survey') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links'=>$this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('member_attribute', 'Manage Survey'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('member_attribute', 'Create Survey') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>