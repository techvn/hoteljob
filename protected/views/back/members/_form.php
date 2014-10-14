<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'members-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'uname', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField(
                $model, 'uname',
                array(
                    'size' => 45,
                    'maxlength' => 45,
                    'class' => 'form-control',
                    'data-toggle' => 'tooltip',
                    'placeholder' => Yii::t('member_attribute', 'UserName'),
                    'data-original-title' => Yii::t('backend', 'Enter username here'),
                )
            ); ?>
            <?php echo $form->error($model, 'uname'); ?>
        </div>
        <?php echo $form->labelEx($model, 'pwd', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'pwd', array(
                'size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Password')
            )); ?>
            <?php echo $form->error($model, 'pwd'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'gender', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'gender', array(
                    '1' => Yii::t('application', 'Male'),
                    '0' => Yii::t('application', 'Female')
                ), array('class' => 'form-control')
            ); ?>
            <?php echo $form->error($model, 'gender'); ?>
        </div>
        <div class="col-sm-2"></div>
        <?php echo $form->labelEx($model, 'birth', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2 has-feedback">
            <?php echo $form->textField($model, 'birth', array('class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Birth'))); ?>
            <span class="fa fa-calendar txt-danger form-control-feedback"></span>
            <?php echo $form->error($model, 'birth'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'phone',
                array('size' => 15, 'maxlength' => 15, 'class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Phone'))
            ); ?>
            <?php echo $form->error($model, 'phone'); ?>
        </div>
        <?php echo $form->labelEx($model, 'mobile', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'mobile',
                array('size' => 15, 'maxlength' => 15, 'class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Mobile'))
            ); ?>
            <?php echo $form->error($model, 'mobile'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'gullname', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'gullname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gullname'); ?>
        </div>
        <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'email', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'security_ques_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'security_ques_id', array(
                '1' => 'Người yêu bạn là ai?'
            ), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'security_ques_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'security_ans', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'security_ans', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'security_ans'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'province_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'province_id', array('0' => Yii::t('application', 'Select province')), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'province_id'); ?>
        </div>
        <?php /*echo $form->labelEx($model, 'district_id', array('class' => 'col-sm-2 control-label')); */ ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'district_id', array('0' => Yii::t('application', 'Select district')), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'district_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'know_me_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'know_me_id', array('0' => 'Hãy chọn')); ?>
            <?php echo $form->error($model, 'know_me_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'recieve_mail', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4 left">
            <?php echo $form->checkBox($model, 'recieve_mail', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'recieve_mail'); ?>
        </div>
    </div>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'married', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'married', array(
                '0' => Yii::t('application', 'Single'),
                '1' => Yii::t('application', 'Married')
            )); ?>
            <?php echo $form->error($model, 'married'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'members_group_id', array('class' => 'col-sm-2 control-label')); ?>
        <?php echo $form->dropDownList($model, 'members_group_id', array(
            '0' => Yii::t('application', 'Select group')
        ), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'members_group_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nationality'); ?>
        <?php echo $form->textField($model, 'nationality'); ?>
        <?php echo $form->error($model, 'nationality'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'avatar'); ?>
        <?php echo $form->textField($model, 'avatar', array('size' => 60, 'maxlength' => 225)); ?>
        <?php echo $form->error($model, 'avatar'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->

<script type="text/javascript">
    $(document).ready(function () {
        LoadTimePickerScript(function () {
            $('#Members_birth').datepicker({setDate: new Date()});
        })

    });
</script>