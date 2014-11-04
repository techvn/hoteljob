<?php
/* @var $this FaqsCategoryController */
/* @var $model FaqsCategory */
/* @var $form CActiveForm */

$faqsCatArr = array();
foreach ($faqsCategory as $c) {
    if ($c->parent_id == 0 || empty($c->parent_id)) {
        $faqsCatArr[$c->id] = (Yii::app()->language == 'vi' ? $c->title : $c->title_en);
        foreach ($faqsCategory as $c_child) {
            if ($c_child->parent_id == $c->id) {
                $faqsCatArr[$c_child->id] = '---' . (Yii::app()->language == 'vi' ? $c_child->title : $c_child->title_en);
            }
        }
    }
}

?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'faqs-category-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class'=>'form-horizontal')
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
        <?php echo $form->labelEx($model, 'brief', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textArea($model, 'brief', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'brief'); ?>
        </div>
        <?php echo $form->labelEx($model, 'brief_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textArea($model, 'brief_en', array('size' => 60, 'maxlength' => 225)); ?>
            <?php echo $form->error($model, 'brief_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'pos', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'pos', array('size' => 5, 'maxlength' => 3)); ?>
            <?php echo $form->error($model, 'pos'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php
            echo $form->dropDownList($model, 'parent_id', $faqsCatArr, array('class' => 'form-control'),
                array('options' => array($model->parent_id => array('selected' => true))));
            ?>
            <?php echo $form->error($model, 'parent_id'); ?>
        </div>
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
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/plugins/ckfinder/ckfinder.js' ?>"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('FaqsCategory_brief', {toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
    ]});
    CKEDITOR.replace('FaqsCategory_brief_en', {toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
    ]});
</script>