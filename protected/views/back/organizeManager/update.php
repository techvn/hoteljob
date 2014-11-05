<?php
/* @var $this OrganizeManagerController */
/* @var $model OrganizeData */

$this->breadcrumbs=array(
	'Organize Datas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrganizeData', 'url'=>array('index')),
	array('label'=>'Create OrganizeData', 'url'=>array('create')),
	array('label'=>'View OrganizeData', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrganizeData', 'url'=>array('admin')),
);
?>

<h1>Update OrganizeData <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>