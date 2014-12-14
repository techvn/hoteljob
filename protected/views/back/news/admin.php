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

    $lang = Yii::app()->language;

    $members_arr = array('' => ''); //Yii::t('newsCategory', 'Select employers')
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }

    $categories_arr = array('' => '');
    foreach ($categories as $c) {
        if (empty($c->parent_id) || $c->parent_id == 0) {
            $categories_arr[$c->id] = $lang == 'vi' ? $c->name : $c->name_en;
            foreach ($categories as $c2) {
                if ($c2->parent_id == $c->id) {
                    $categories_arr[$c2->id] = '---' . ($lang == 'vi' ? $c2->name : $c2->name_en);
                }
            }
        }
    }
    $newStatus = array(
        '0' => Yii::t('application', 'Pending'), '1' => Yii::t('application', 'Approved'),
        '2' => Yii::t('application', 'Denied'), '3' => Yii::t('application', 'Deleted')
    );

    $this->breadcrumbs = array(
        Yii::t('news', 'List News') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('news', 'Create News'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('news', 'Manage News') ?></h1>

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
        'id' => 'news-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'title',
            //'brief',
            //'thumb',
            array(
                'name' => 'organize_id',
                'value' => function ($data) use ($members) {
                        return (isset($members[$data->organize_id])) ? $members[$data->organize_id]->uname : '---';
                    },
                'filter' => $members_arr
            ),
            'content',
            array(
                'name' => 'news_category_id',
                'value' => function ($data) use ($categories_arr) {
                        return (isset($categories_arr[$data->news_category_id])) ?
                            (Yii::app()->language == 'vi' ?
                                $categories_arr[$data->news_category_id]->name : $categories_arr[$data->news_category_id]->name_en
                            ) : '---';
                    },
                'filter' => $categories_arr
            ),
            'created_time',
            array(
                'name' => 'status',
                'value' => function($d) use($newStatus) {
                        return isset($newStatus[$d->status]) ? $newStatus[$d->status] : Yii::t('application', 'Pending');
                    },
                'filter' => array(
                    '0' => Yii::t('application', 'Pending'), '1' => Yii::t('application', 'Approved'),
                    '2' => Yii::t('application', 'Denied'), '3' => Yii::t('application', 'Deleted')
                )
            ),
            /*
            'public_time',
            'unpublic_time',
            'tag',
            'viewed',
            'file',
            'title_en',
            'brief_en',
            'content_en',
            'tag_en',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>