<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 label-form')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'brief', array('class' => 'col-sm-2 label-form')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'brief', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'brief'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'thumb', array('class' => 'col-sm-2 label-form')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'thumb', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'thumb'); ?>
        </div
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'organize_id', array('class' => 'col-sm-2 label-form')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'organize_id', array(),
                array('class' => 'form-control'), array('options' => array($model->organize_id => array('selected' => true))));
            ?>
            <?php echo $form->error($model, 'organize_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'content', array('class' => 'col-sm-2 label-form')); ?>
        <?php
        $this->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'content', # Attribute in the Data-Model
            "defaultValue" => "Test Text", # Optional

            # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
            "config" => array(
                "height" => "400px",
                "width" => "100%",
                "toolbar" => "Basic",
            ),

            #Optional address settings if you did not copy ckeditor on application root
            "ckEditor" => Yii::getPathOfAlias('webroot') . "/assets/js/ckeditor/ckeditor.php",
            # Path to ckeditor.php
            "ckBasePath" => Yii::app()->baseUrl . "/ckeditor/",
            # Realtive Path to the Editor (from Web-Root)
        ));
        ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status'); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created_time'); ?>
        <?php echo $form->textField($model, 'created_time'); ?>
        <?php echo $form->error($model, 'created_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'public_time'); ?>
        <?php echo $form->textField($model, 'public_time'); ?>
        <?php echo $form->error($model, 'public_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'unpublic_time'); ?>
        <?php echo $form->textField($model, 'unpublic_time'); ?>
        <?php echo $form->error($model, 'unpublic_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tag'); ?>
        <?php echo $form->textField($model, 'tag', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'tag'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'viewed'); ?>
        <?php echo $form->textField($model, 'viewed'); ?>
        <?php echo $form->error($model, 'viewed'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>
        <?php echo $form->textField($model, 'file', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'brief_en'); ?>
        <?php echo $form->textField($model, 'brief_en', array('size' => 60, 'maxlength' => 225)); ?>
        <?php echo $form->error($model, 'brief_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content_en'); ?>
        <?php echo $form->textArea($model, 'content_en', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'content_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tag_en'); ?>
        <?php echo $form->textField($model, 'tag_en', array('size' => 60, 'maxlength' => 225)); ?>
        <?php echo $form->error($model, 'tag_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'news_category_id'); ?>
        <?php echo $form->textField($model, 'news_category_id'); ?>
        <?php echo $form->error($model, 'news_category_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->