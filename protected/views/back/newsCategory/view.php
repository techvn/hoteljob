<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */

$this->breadcrumbs=array(
	'News Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NewsCategory', 'url'=>array('index')),
	array('label'=>'Create NewsCategory', 'url'=>array('create')),
	array('label'=>'Update NewsCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsCategory', 'url'=>array('admin')),
);
?>

<h1>View NewsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'name_en',
		'parent_id',
		'status',
		'type',
		'members_id',
	),
)); ?>
