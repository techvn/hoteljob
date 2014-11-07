<?php
/* @var $this AcademicController */
/* @var $model Academic */

$this->breadcrumbs=array(
	'Academics'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Academic', 'url'=>array('index')),
	array('label'=>'Create Academic', 'url'=>array('create')),
	array('label'=>'View Academic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Academic', 'url'=>array('admin')),
);
?>

<h1>Update Academic <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>