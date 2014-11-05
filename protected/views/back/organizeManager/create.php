<?php
/* @var $this OrganizeManagerController */
/* @var $model OrganizeData */

$this->breadcrumbs=array(
	'Organize Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrganizeData', 'url'=>array('index')),
	array('label'=>'Manage OrganizeData', 'url'=>array('admin')),
);
?>

<h1>Create OrganizeData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>