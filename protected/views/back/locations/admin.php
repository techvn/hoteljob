<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #locations-grid_c0 { width: 5%; }
    #locations-grid_c4 { width: 8%;}
</style>

<div class="row">
    <?php
    /* @var $this LocationsController */
    /* @var $model Locations */
    $locations_arr = Helpers::locationTrees($locations);
    $locations_name = array();
    foreach ($locations_arr as $l) {
        $locations_name[$l] = $l;
    }

    $this->breadcrumbs = array(
        Yii::t('location_attribute', 'Locations') => array('index'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('location_attribute', 'Create Locations'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('location_attribute', 'Manage Locations') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.')?>
    </p>

    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'locations-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name' => 'name',
                'value' => '$data->name',
                //'filter' => $locations_name,
                'header' => Yii::t("location_attribute", "Locations Title")
            ),
            'code',
            array(
                'name' => 'parent_id',
                'value' => function ($d) use ($locations) {
                        return isset($locations[$d->parent_id]) ? $locations[$d->parent_id]->name : '---';
                    },
                'filter' => $locations_arr,
                'header' => Yii::t("location_attribute", "Parent Locations")
            ),
            'pos',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
