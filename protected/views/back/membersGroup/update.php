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
    /* @var $this MembersGroupController */
    /* @var $model MembersGroup */

    $this->breadcrumbs = array(
        Yii::t('membersGroup', 'Members Groups') => array('admin'),
        //$model->name => array('view', 'id' => $model->id),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('membersGroup', 'List MembersGroup'), 'url' => array('admin')),
    );

    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('membersGroup', 'Update MembersGroup'); ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>