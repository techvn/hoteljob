<?php
/* @var $this JobAppliesController */
/* @var $model JobApplies */

$this->breadcrumbs=array(
	'Job Applies'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JobApplies', 'url'=>array('index')),
	array('label'=>'Create JobApplies', 'url'=>array('create')),
	array('label'=>'View JobApplies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JobApplies', 'url'=>array('admin')),
);
?>

<h1>Update Recruitment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'members'=>$members, 'jobs'=>$jobs)); ?>