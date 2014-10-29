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
    /* @var $this MembersGroupController */
    /* @var $model MembersGroup */

    $this->breadcrumbs = array(
        Yii::t('membersGroup', 'Members Groups') => array('index'),
        Yii::t('membersGroup', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs',
        array(
            'links' => $this->breadcrumbs
        )
    );
    ?>
</div>

<div class="well">
    <?php
    $this->menu = array(
        array('label' => Yii::t('membersGroup', 'List MembersGroup'), 'url' => array('index')),
        array('label' => Yii::t('membersGroup', 'Create MembersGroup'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#members-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>

    <h1><?php echo Yii::t('membersGroup', 'Manage Members Groups'); ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
    </p>

    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'members-group-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            //'id',
            'name',
            //'alias',
            'en_name',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
