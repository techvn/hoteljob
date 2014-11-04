<?php
/* @var $this CurriculumPrivateController */
/* @var $model CurriculumPrivate */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'curriculum-private-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));

    $field_member_reject = array(
        'id' => '',
        'status' => ''
    );
    $field_curriculum_reject = array(
        'id' => '',
        'published' => '',
        'members_id' => '');
    $memberObj = new Members();
    $member_attributes = $memberObj->attributeLabels();
    $curriculumVitaeObj = new CurriculumVitae();
    $curriculum_attributes = $curriculumVitaeObj->attributeLabels();

    $fields = array(
        Yii::t('member_attribute', 'Member fields') => array(),
        Yii::t('curriculum', 'Curriculum vitae fields') => array()
    );
    foreach($member_fields as $k=>$v) {
        if(array_key_exists($v, $field_member_reject)) {
            continue;
        }
        $fields[Yii::t('member_attribute', 'Member fields')][$v] = $member_attributes[$v];
    }
    foreach($curriculumVitae_fields as $k=>$v) {
        if(array_key_exists($v, $field_curriculum_reject)) {
            continue;
        }
        $fields[Yii::t('curriculum', 'Curriculum vitae fields')][$v] = $curriculum_attributes[$v];
    }
    ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'field', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'field', $fields, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'field'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'alias', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'alias', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'alias'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'alias_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'alias_en', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'alias_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'published', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'published', array(
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
            ), array('class' => 'form-control'), array('options' => array($model->published => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'published'); ?>
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