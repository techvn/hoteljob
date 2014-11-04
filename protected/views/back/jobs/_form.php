<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'jobs-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));

    $jobTypes_arr = array();
    foreach ($jobTypes as $j) {
        $jobTypes_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }
    $jobMajors_arr = array();
    foreach ($jobMajors as $j) {
        if ($j->pid == 0 || empty($j->pid)) {
            $jobMajors_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
            foreach($jobMajors as $j_child) {
                if($j->id == $j_child->pid) {
                    $jobMajors_arr[$j_child->id] = '--- ' . (Yii::app()->language == 'vi' ? $j_child->title : $j_child->title_en);
                }
            }
        }
    }
    $jobTimes_arr = array();
    foreach ($jobTimes as $j) {
        $jobTimes_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }

    $salarySelected = 0; // Value will selected in dropdown list of salary
    $jobSalaries_arr = array();
    foreach ($jobSalaries as $j) {
        $symbol = isset($currencies[$j->type]) ? $currencies[$j->type]->symbol : '';
        $jobSalaries_arr[$j->id] = $j->from . ' - ' . $j->to . "($symbol)";
        if ($model->salary_from == $j->from & $model->salary_to == $j->to) {
            $salarySelected = $j->id;
        }
    }
    $jobLevels_arr = array();
    foreach ($jobLevels as $j) {
        $jobTypes_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }
    $countries_arr = array();
    $ddl_location = array();
    foreach ($countries as $c) {
        if($c->parent_id == 0 || empty($c->parent_id)) {
            $countries_arr[$c->id] = $c->name;
            $ddl_location[$c->name] = array();
            foreach($countries as $c_child) {
                if($c_child->parent_id == $c->id) {
                    $ddl_location[$c->name][$c_child->id] = $c_child->name;
                }
            }
        }
    }
    print_r($ddl_location);
    ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
        <?php echo $form->labelEx($model, 'code', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->textField($model, 'code', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'code'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title_en', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_level_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_level_id', $jobLevels_arr, array('class' => 'form-control'), array('options' => array($model->job_level_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'job_level_id'); ?>
        </div>
        <label class="col-sm-2 control-label" for="tb_salary">
            <?php echo Yii::t('jobs', 'Salary') ?>
        </label>

        <div class="col-sm-4">
            <?php
            echo CHtml::dropDownList('tb_salary', '', $jobSalaries_arr, array('class' => 'form-control'), array('options' => array($salarySelected => array('selected' => true))));
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_time_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_time_id', $jobTimes_arr, array('class' => 'form-control'), array($model->job_time_id => array('selected' => true))); ?>
            <?php echo $form->error($model, 'job_time_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'require', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'require', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'require'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_major_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_major_id', $jobMajors_arr, array('class' => 'form-control'), array($model->job_time_id => array('selected' => true))); ?>
            <?php echo $form->error($model, 'job_major_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'job_type_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_type_id', $jobTypes_arr, array('class' => 'form-control'), array($model->job_time_id => array('selected' => true))); ?>
            <?php echo $form->error($model, 'job_type_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'end_time', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->textField($model, 'end_time', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'end_time'); ?>
        </div>
        <div class="col-sm-2"></div>
        <?php echo $form->labelEx($model, 'published', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'published',
                array(
                    1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
                ), array('class' => 'form-control'),
                array('options' => array($model->published => array('selected' => true))));
            ?>
            <?php echo $form->error($model, 'published'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'description_en', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'description_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'language', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'language', $countries_arr, array('class' => 'form-control'), array('options' => array($model->language => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'language'); ?>
        </div>
        <div class="col-sm-2"></div>
        <?php echo CHtml::label(Yii::t('application', 'Places'), 'ddl_location', array('class' => 'col-sm-2 control-label')) ?>
        <div class="col-sm-3 relative">
            <?php echo CHtml::dropDownList('ddl_location', '', $ddl_location, array('class'=>'form-control', 'multiple' => true, 'size' => 8)) ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'tags', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'tags'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'status', array(
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
            ), array('class' => 'form-control'), array('options' => array($model->status => array('selected' => true)))); ?>
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
<script type="text/javascript">
    // Brief
    CKEDITOR.replace('Jobs_description');
    CKEDITOR.replace('Jobs_description_en');

    $(document).ready(function () {
        LoadTimePickerScript(function () {
            var dateConfig = {setDate: new Date()};
            <?php if(Yii::app()->language == 'vi') {
            ?>
            dateConfig.dateFormat = 'dd/mm/yy'
            <?php
            } ?>
            $('#Jobs_end_time').datepicker(dateConfig);
        });
    });
</script>
<style type="text/css">
    .relative { position: relative; }
    .relative select { position: absolute; }
</style>