<?php
/* @var $this MembersGroupController */
/* @var $model MembersGroup */

$this->breadcrumbs=array(
	'Members Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MembersGroup', 'url'=>array('index')),
	array('label'=>'Create MembersGroup', 'url'=>array('create')),
	array('label'=>'View MembersGroup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MembersGroup', 'url'=>array('admin')),
);
?>

<h1>Update MembersGroup <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>