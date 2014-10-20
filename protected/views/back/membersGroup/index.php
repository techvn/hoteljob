<?php
/* @var $this MembersGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Members Groups',
);

$this->menu=array(
	array('label'=>'Create MembersGroup', 'url'=>array('create')),
	array('label'=>'Manage MembersGroup', 'url'=>array('admin')),
);
?>

<h1>Members Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
