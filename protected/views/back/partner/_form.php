<?php
/* @var $this PartnerController */
/* @var $model Partner */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'partner-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="col-sm-4 elm-relative">
            <?php
            if($model->logo)  {
                echo '<img src="' . Yii::app()->baseUrl . '/uploads/partner/' . $model->logo .'" class="thumb"/>';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'logo', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->fileField($model, 'logo'); ?>
            <?php echo $form->error($model, 'logo'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'link', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'link', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'link'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'pos', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->textField($model, 'pos', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'pos'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'status', array(
                '1' => Yii::t('application', 'Published'),
                '0' => Yii::t('application', 'UnPublished')
            ), array('class' => 'form-control')); ?>
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

<style type="text/css">
    .elm-relative {
        position: relative;
    }

    img.thumb {
        max-width: 200px;
        position: absolute;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        // Add current logo to hidden field
        $('#ytPartner_logo').val('<?php echo $model->logo ?>');
    });
</script>