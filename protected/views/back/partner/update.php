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
    /* @var $this PartnerController */
    /* @var $model Partner */

    $this->breadcrumbs = array(
        'Partners' => array('index'),
        $model->name => array('view', 'id' => $model->id),
        'Update',
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('partner_attr', 'Create Partner'), 'url' => array('create')),
        array('label' => Yii::t('partner_attr', 'Manage Partner'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('partner_attr', 'Update Partner'); ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>