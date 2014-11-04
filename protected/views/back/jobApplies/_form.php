<?php
/* @var $this JobAppliesController */
/* @var $model JobApplies */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'job-applies-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
    ));
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }
    $jobs_arr = array();
    foreach ($jobs as $j) {
        $jobs_arr[$j->id] = (Yii::app()->language == 'vi' ? $j->title : $j->title_en);
    }
    ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'members_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->dropDownList($model, 'members_id', $members_arr, array('class' => 'form-control'), array('options' => array(($model->members_id) => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'members_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'jobs_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->dropDownList($model, 'jobs_id', $jobs_arr, array('class' => 'form-control'), array('options' => array($model->jobs_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'jobs_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'applied_time', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->textField($model, 'applied_time', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'applied_time'); ?>
        </div>
    </div>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'candidate_name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->textField($model, 'candidate_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'candidate_name'); ?>
        </div>
        <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'brief', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textArea($model, 'brief', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'brief'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'fitness', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textArea($model, 'fitness', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fitness'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'cv_link', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->fileField($model, 'cv_link'); ?>
            <p id="cv_file"></p>
            <?php echo $form->error($model, 'cv_link'); ?>
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
<script type="text/javascript">
    // Brief
    CKEDITOR.replace('JobApplies_fitness', {
            toolbar: [
                [ 'Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
                [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
                [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ]
            ]
        }
    )
    ;
    $(document).ready(function () {

        var $cv = '<?php echo $model->cv_link ?>';
        $('#cv_file').val($cv);
    });
</script>