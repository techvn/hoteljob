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
    /* @var $this NewsCategoryController */
    /* @var $model NewsCategory */

    $this->breadcrumbs = array(
        Yii::t('newsCategory', 'News Categories') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('newsCategory', 'Manage NewsCategory'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('newsCategory', 'Create NewsCategory') ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model, 'members' => $members, 'categories' => $categories)); ?>
</div>