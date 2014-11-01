<?php
/* @var $this JobMajorController */
/* @var $model JobMajor */
/* @var $form CActiveForm */
$jobsMajor_arr = array('0' => '');
foreach ($jobsMajor as $j) {
    if (($j->pid == 0 || empty($j->pid)) & $model->id != $j->id) {
        $jobsMajor_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
        foreach ($jobsMajor as $j_child) {
            if ($j_child->pid == $j->id  & $model->id != $j_child->id) {
                $jobsMajor_arr[$j_child->id] = '--- ' . (Yii::app()->language == 'vi' ? $j_child->title : $j_child->title_en);
            }
        }
    }
}
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'job-major-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
        <?php echo $form->labelEx($model, 'title_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'pid', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'pid', $jobsMajor_arr, array('class' => 'form-control'), array('options' => array($model->pid => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'pid'); ?>
        </div>
        <?php echo $form->labelEx($model, 'pos', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-1">
            <?php echo $form->textField($model, 'pos', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'pos'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'status', array(
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
            ), array('class'=>'form-control'), array('options' => array($model->status => array('selected' => true)))); ?>
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