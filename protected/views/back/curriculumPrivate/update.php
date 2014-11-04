<?php
/* @var $this CurriculumPrivateController */
/* @var $model CurriculumPrivate */

$this->breadcrumbs=array(
	'Curriculum Privates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CurriculumPrivate', 'url'=>array('index')),
	array('label'=>'Create CurriculumPrivate', 'url'=>array('create')),
	array('label'=>'View CurriculumPrivate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CurriculumPrivate', 'url'=>array('admin')),
);
?>

<h1>Update CurriculumPrivate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'member_fields' => $member_fields, 'curriculumVitae_fields' => $curriculumVitae_fields)); ?>