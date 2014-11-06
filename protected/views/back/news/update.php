<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }

    /*.items #news-category-grid_c4 { width: 10%; }
    #news-category-grid_c5 { width: 5%; }
    #news-category-grid_c3 { width: 12%; }*/
</style>

<div class="row">
    <?php
    /* @var $this NewsController */
    /* @var $model News */

    $this->breadcrumbs = array(
        Yii::t('news', 'News') => array('admin'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('news', 'Create News'), 'url' => array('create')),
        array('label' => Yii::t('news', 'Manage News'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('news', 'Update News'); ?></h1>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>