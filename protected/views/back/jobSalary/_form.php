<?php
/* @var $this JobSalaryController */
/* @var $model JobSalary */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'job-salary-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));

    $currencies_arr = array();
    foreach ($currencies as $c) {
        $currencies_arr[$c->id] = $c->title . "({$c->symbol})";
    }

    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'from', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'from', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'from'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'to', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'to', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'to'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'type', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'type', $currencies_arr, array('class' => 'form-control'), array('options' => array($model->type => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'type'); ?>
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