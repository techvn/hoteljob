<?php
/* @var $this FaqsCategoryController */
/* @var $model FaqsCategory */

$this->breadcrumbs=array(
	'Faqs Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List FaqsCategory', 'url'=>array('index')),
	array('label'=>'Create FaqsCategory', 'url'=>array('create')),
	array('label'=>'Update FaqsCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FaqsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FaqsCategory', 'url'=>array('admin')),
);
?>

<h1>View FaqsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'title_en',
		'parent_id',
		'status',
		'brief',
		'brief_en',
	),
)); ?>
