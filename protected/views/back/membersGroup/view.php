<?php
/* @var $this MembersGroupController */
/* @var $model MembersGroup */

$this->breadcrumbs=array(
	'Members Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MembersGroup', 'url'=>array('index')),
	array('label'=>'Create MembersGroup', 'url'=>array('create')),
	array('label'=>'Update MembersGroup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MembersGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MembersGroup', 'url'=>array('admin')),
);
?>

<h1>View MembersGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'en_name',
	),
)); ?>
