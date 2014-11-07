<?php
/* @var $this LanguageSkillController */
/* @var $model LanguageSkill */

$this->breadcrumbs=array(
	'Language Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LanguageSkill', 'url'=>array('index')),
	array('label'=>'Manage LanguageSkill', 'url'=>array('admin')),
);
?>

<h1>Create LanguageSkill</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>