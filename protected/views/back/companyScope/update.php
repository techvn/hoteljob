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
    /* @var $this CompanyScopeController */
    /* @var $model CompanyScope */

    $this->breadcrumbs = array(
        Yii::t('organize', 'Company Scopes') => array('admin'),
        Yii::t('application', 'Update'),
    );

    $this->menu = array(
        array('label' => Yii::t('organize', 'Create Company Scope'), 'url' => array('create')),
        array('label' => Yii::t('organize', 'Manage Company Scopes'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('organize', 'Update Company Scope'); ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>