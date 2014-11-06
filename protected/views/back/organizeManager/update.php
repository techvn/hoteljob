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
    /* @var $this OrganizeManagerController */
    /* @var $model OrganizeData */

    $this->breadcrumbs = array(
        Yii::t('organize', 'Manage Organize') => array('admin'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('organize', 'Create Organize'), 'url' => array('create')),
        array('label' => Yii::t('organize', 'Manage Organize'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('organize', 'Update Organize'); ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model, 'members'=>$members, 'scopes'=>$scopes, 'locations' => $locations)); ?>
</div>