<?php
/* @var $this LanguageSkillController */
/* @var $model LanguageSkill */

$this->breadcrumbs=array(
	'Language Skills'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LanguageSkill', 'url'=>array('index')),
	array('label'=>'Create LanguageSkill', 'url'=>array('create')),
	array('label'=>'View LanguageSkill', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LanguageSkill', 'url'=>array('admin')),
);
?>

<h1>Update LanguageSkill <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>