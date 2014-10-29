<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    .items #news-category-grid_c4 { width: 10%; }
    #news-category-grid_c5 { width: 5%; }
    #news-category-grid_c3 { width: 12%; }
</style>

<div class="row">
    <?php
    /* @var $this NewsCategoryController */
    /* @var $model NewsCategory */
    $lang = Yii::app()->language;

    $members_arr = array();
    foreach($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }
    $categories_arr = array();
    foreach($categories as $c) {
        if(empty($c->parent_id) || $c->parent_id == 0) {
            $categories_arr[$c->id] = $lang == 'vi' ? $c->name : $c->name_en;
            foreach($categories as $c2) {
                if($c2->parent_id == $c->id) {
                    $categories_arr[$c2->id] = '---' . ($lang == 'vi' ? $c2->name : $c2->name_en);
                }
            }
        }
    }

    $this->breadcrumbs = array(
        Yii::t('newsCategory', 'News Categories') => array('index'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('newsCategory', 'Create NewsCategory'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('newsCategory', 'Manage News Categories') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
    </p>
    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'news-category-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            //'id',
            'name',
            'name_en',
            //'parent_id',
            array(
                'name' => 'parent_id',
                'value' => function ($data, $row) use ($categories) {
                        return (isset($categories[$data->parent_id]) ? (Yii::app()->language == 'vi'
                            ? $categories[$data->parent_id]->name : $categories[$data->parent_id]->name_en) : '---');
                    },
                'filter' => $categories_arr
            ),
            array(
                'name' => 'members_id',
                'value' => function($data, $row) use ($members) {
                        return (isset($members[$data->members_id])) ? $members[$data->members_id]->uname : '---';
                    },
                'filter' => $members_arr
            ),
            //'status',
            array(
                'name' => 'status',
                'value' => '$data->status? Yii::t("application", "Published"):Yii::t("application", "UnPublished")',
                'filter' => array(
                    '1' => Yii::t('application', 'Published'), '0' => Yii::t('application', 'UnPublished')
                )
            ),
            //'type',
            /*
            'members_id',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>