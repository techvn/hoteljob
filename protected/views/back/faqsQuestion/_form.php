<?php
/* @var $this FaqsQuestionController */
/* @var $model FaqsQuestion */
/* @var $form CActiveForm */

$members_arr = array();
foreach ($members as $m) {
    $members_arr[$m->id] = $m->uname;
}

$cats_arr = array();
foreach ($cats as $c) {
    if ($c->parent_id == 0 || empty($c->parent_id)) {
        $cats_arr[$c->id] = Yii::app()->language == 'vi' ? $c->title : $c->title_en;
        foreach ($cats as $c_child) {
            if ($c_child->parent_id == $c->id) {
                $cats_arr[$c_child->id] = Yii::app()->language == 'vi' ? $c_child->title : $c_child->title_en;
            }
        }
    }
}
$jobs_arr = array();
foreach ($jobs as $j) {
    $jobs_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
}

?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'faqs-question-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class'=>'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'question', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'question', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'question'); ?>
        </div>
        <?php echo $form->labelEx($model, 'member_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'member_id', $members_arr,
                array('class' => 'form-control'), array('options' => array($model->member_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'member_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'faqs_category_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'faqs_category_id', $cats_arr, array('class' => 'form-control'),
                array('options' => array($model->member_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'faqs_category_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'brief', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'brief'); ?>
            <?php echo $form->error($model, 'brief'); ?>
        </div>
    </div>

    <!--<div class="row">
		<?php /*echo $form->labelEx($model,'ip_address'); */?>
		<?php /*echo $form->textField($model,'ip_address',array('size'=>45,'maxlength'=>45)); */?>
		<?php /*echo $form->error($model,'ip_address'); */?>
	</div>-->

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_id', $jobs_arr, array('class' => 'form-control'),
                array('options' => array($model->job_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'job_id'); ?>
        </div>
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
    CKEDITOR.replace('FaqsQuestion_brief', {toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
    ]});
</script>