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
        'Faqs Categories' => array('index'),
        $model->title => array('view', 'id' => $model->id),
        'Update',
    );

    $this->menu = array(
        array('label' => Yii::t('faqsCategory', 'Manage FaqsCategory'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('faqsCategory', 'Update FaqsCategory'); ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>