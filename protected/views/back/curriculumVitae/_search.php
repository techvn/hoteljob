<?php
/* @var $this CurriculumVitaeController */
/* @var $model CurriculumVitae */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'members_id'); ?>
		<?php echo $form->textField($model,'members_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_file'); ?>
		<?php echo $form->textField($model,'cv_file',array('size'=>60,'maxlength'=>225)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'experience_year'); ?>
		<?php echo $form->textField($model,'experience_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'private_data'); ?>
		<?php echo $form->textField($model,'private_data',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salary_desired_from'); ?>
		<?php echo $form->textField($model,'salary_desired_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salary_desired_to'); ?>
		<?php echo $form->textField($model,'salary_desired_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_id'); ?>
		<?php echo $form->textField($model,'currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_from_away'); ?>
		<?php echo $form->textField($model,'work_from_away'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_major_id'); ?>
		<?php echo $form->textField($model,'job_major_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_type_id'); ?>
		<?php echo $form->textField($model,'job_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_level_id'); ?>
		<?php echo $form->textField($model,'job_level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_scope_id'); ?>
		<?php echo $form->textField($model,'company_scope_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->