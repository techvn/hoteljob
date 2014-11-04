<?php
/* @var $this MembersGroupController */
/* @var $model MembersGroup */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'members-group-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class'=>'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="col-sm-6"></div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'alias', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'alias', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'alias'); ?>
        </div>
        <div class="col-sm-6"></div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'en_name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'en_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'en_name'); ?>
        </div>
        <div class="col-sm-6"></div>
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