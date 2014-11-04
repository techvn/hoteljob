<?php
/* @var $this CompanyScopeController */
/* @var $model CompanyScope */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-scope-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

	<p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'from', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
		<?php echo $form->textField($model,'from', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'from'); ?>
        </div>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'to', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->textField($model,'to', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'to'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <button class="btn btn-primary btn-label-left" type="submit">
                <span>
                    <i class="fa fa-clock-o"></i>
                </span>
                <?php
                echo Yii::t('application', $model->isNewRecord ? 'Create' : 'Save');
                ?>
            </button>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->