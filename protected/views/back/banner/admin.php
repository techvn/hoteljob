<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }

    #banner-grid_c0 {
        width: 5%;
    }

    #banner-grid_c4 {
        width: 15%;
    }

    #banner-grid_c4 {
        width: 20%;
    }

    #banner-grid_c5 {
        width: 10%;
    }
</style>

<div class="row">
    <?php
    /* @var $this BannerController */
    /* @var $model Banner */
    $banner_type = array('STORE' => Yii::t('backend', 'STORE'), 'CANDIDATE' => Yii::t('backend', 'CANDIDATE'), 'STORE_DETAIL' => Yii::t('backend', 'STORE_DETAIL'));
    $members_arr = array();
    foreach($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }

    $this->breadcrumbs = array(
        Yii::t('application', 'Banners') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('application', 'Create Banner'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('application', 'Manage Banners') ?></h1>

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
        'id' => 'banner-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            Yii::app()->language == 'vi' ? 'title' : 'title_en',
            array(
                'name' => 'type',
                'value' => function ($d) use ($banner_type) {
                        return isset($banner_type[$d->type]) ? Yii::t('backend', $banner_type[$d->type]) : '';
                    },
                'filter' => $banner_type
            ),
            array(
                'name'=>'member_id',
                'value'=>function($data) use($members) {
                        return isset($members[$data->member_id]) ? $members[$data->member_id]->uname : '';
                    },
                'filter' => $members_arr
            ),
            array(
                'name' => 'banner',
                'value' => function ($d) {
                        return !empty($d->banner) ? "<a href='" . ($d->link ? $d->link : '#') . "' target='blank'><img src='$d->banner' class='banner' title='" . (Yii::app()->language == 'vi' ? $d->title : $d->title_en) . "'></a>" : '';
                    },
                'sortable' => false,
                'filter' => false,
                'type' => 'html'
            ),
            'pos',
            /*
            'status',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div>
<style type="text/css">
    .items img.banner {
        width: 100%;
        max-height: 200px;
    }
</style>