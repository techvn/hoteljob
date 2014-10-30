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
    /* @var $this FaqsCategoryController */
    /* @var $model FaqsCategory */

    $this->breadcrumbs = array(
        Yii::t('faqsCategory', 'Faqs Categories') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqsCategory', 'Manage FaqsCategory'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('faqsCategory', 'Create FaqsCategory') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model, 'faqsCategory' => $faqsCategory)); ?>
</div>