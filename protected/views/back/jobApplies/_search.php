<?php
/* @var $this JobAppliesController */
/* @var $model JobApplies */
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
		<?php echo $form->label($model,'jobs_id'); ?>
		<?php echo $form->textField($model,'jobs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applied_time'); ?>
		<?php echo $form->textField($model,'applied_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'candidate_name'); ?>
		<?php echo $form->textField($model,'candidate_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brief'); ?>
		<?php echo $form->textField($model,'brief',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fitness'); ?>
		<?php echo $form->textField($model,'fitness'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv_link'); ?>
		<?php echo $form->textField($model,'cv_link',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->