<?php
/* @var $this AcademicController */
/* @var $model Academic */

$this->breadcrumbs=array(
	'Academics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Academic', 'url'=>array('index')),
	array('label'=>'Manage Academic', 'url'=>array('admin')),
);
?>

<h1>Create Academic</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>