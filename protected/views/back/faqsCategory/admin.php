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

    $faqsCatArr = array();
    foreach($faqsCategory as $c) {
        if($c->parent_id == 0 || empty($c->parent_id)) {
            $faqsCatArr[$c->id] = (Yii::app()->language == 'vi' ? $c->title : $c->title_en);
            foreach($faqsCategory as $c_child) {
                if($c_child->parent_id == $c->id) {
                    $faqsCatArr[$c_child->id] = '---'. (Yii::app()->language == 'vi' ? $c_child->title : $c_child->title_en);
                }
            }
        }
    }

    $this->breadcrumbs = array(
        Yii::t('application', 'Faqs Categories') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqsCategory', 'Create FaqsCategory'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#faqs-category-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('faqsCategory', 'Manage Faqs Categories') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'faqs-category-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name' => 'title',
                'value' => function($data) {
                        return Yii::app()->language == 'vi' ? $data->title : $data->title_en;
                    }
            ),
            array(
                'name' => 'parent_id',
                'value' => function($data) use($faqsCategory) {
                        return isset($faqsCategory[$data->parent_id]) ?
                            (Yii::app()->language == 'vi' ? $faqsCategory[$data->parent_id]->title : $faqsCategory[$data->parent_id]->title_en) : "";
                    },
                'filter' => $faqsCatArr
            ),
            array(
                'name' => 'status',
                'value' => '$data->status ? Yii::t("application", "Published"):Yii::t("application", "UnPublished")',
                'filter' => array(1 => Yii::t("application", "Published"), 0 => Yii::t("application", "UnPublished"))
            ),
            'brief',
            /*
            'brief_en',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>