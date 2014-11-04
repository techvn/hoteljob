<?php
/* @var $this FaqsAnswerController */
/* @var $model FaqsAnswer */
/* @var $form CActiveForm */

$faqsQues_arr = array();
foreach ($faqsQues as $f) {
    $faqsQues_arr[$f->id] = $f->title;
}
$members_arr = array();
foreach ($members as $m) {
    $members_arr[$m->id] = $m->uname;
}

?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'faqs-answer-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class'=>'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'faqs_question_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'faqs_question_id', $faqsQues_arr, array('class' => 'form-control'),
                array('options' => array($model->faqs_question_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'faqs_question_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'answer', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'answer'); ?>
            <?php echo $form->error($model, 'answer'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'member_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'member_id', $members_arr, array('class' => 'form-control'), array('options' => array($model->member_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'member_id'); ?>
        </div>
    </div>

    <!--<div class="row">
        <?php /*echo $form->labelEx($model, 'ip_address'); */?>
        <?php /*echo $form->textField($model, 'ip_address', array('size' => 45, 'maxlength' => 45)); */?>
        <?php /*echo $form->error($model, 'ip_address'); */?>
    </div>-->

    <!--<div class="row">
        <?php /*echo $form->labelEx($model, 'created_time'); */?>
        <?php /*echo $form->textField($model, 'created_time'); */?>
        <?php /*echo $form->error($model, 'created_time'); */?>
    </div>-->

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'status', array(
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
            ), array('options' => array($model->status => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'status'); ?>
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
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/plugins/ckfinder/ckfinder.js' ?>"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('FaqsAnswer_answer', {toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
    ]});
</script>