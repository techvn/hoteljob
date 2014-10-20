<?php
/* @var $this MembersGroupController */
/* @var $model MembersGroup */

$this->breadcrumbs=array(
	'Members Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MembersGroup', 'url'=>array('index')),
	array('label'=>'Manage MembersGroup', 'url'=>array('admin')),
);
?>

<h1>Create MembersGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>