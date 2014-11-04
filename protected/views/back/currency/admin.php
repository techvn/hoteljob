<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #currency-grid_c0, #currency-grid_c2, #currency-grid_c3 { width: 10%; }
</style>

<div class="row">
    <?php
    /* @var $this CurrencyController */
    /* @var $model Currency */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Currencies') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links'=>$this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Currency'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#currency-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Manage Currencies') ?></h1>

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
        'id' => 'currency-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'title',
            'symbol',
            array(
                'name' => 'status',
                'value' => '$data->status ? Yii::t("application","Published") : Yii::t("application","UnPublished")',
                'filter' => array(1 => Yii::t("application", "Published"), 0 => Yii::t("application", "UnPublished"))
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
