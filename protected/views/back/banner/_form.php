<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */

$members_arr = array( 0 => ' - ' .Yii::t('application', 'Select member'));
foreach($members as $m) {
    $members_arr[$m->id] = $m->uname;
}
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'banner-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>


    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
        <div class="col-sm-4 relative">
            <?php
            if($model->banner) {
                echo "<img src='$model->banner' style='width:100%' class='absolute'/>";
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'type', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php
            echo ExtCHtml::enumDropDownList($model, 'type', array('class' => 'form-control'));
            //echo $form->textField($model, 'type', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control'));
            ?>
            <?php echo $form->error($model, 'type'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'member_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'member_id', $members_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'member_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'link', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'link', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'link'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'banner', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-3">
            <?php echo $form->textField($model, 'banner', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'banner'); ?>
        </div>
        <div class="col-sm-1">
            <button class="btn btn-default btn-lg" type="button" onclick="BrowseServer($('#Banner_banner'))">Get link</button>
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
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
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
    div.relative { position: relative; }
    img.absolute { position: absolute; }
</style>
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/plugins/ckfinder/ckfinder.js' ?>"></script>
<script type="text/javascript">
    function BrowseServer(obj) {
        // It can also be done in a single line, calling the "static"
        CKFinder.popup('../../', null, null, function (url) {
            SetFileField(obj, url)
        });
    }

    function SetFileField(field, fileUrl) {
        $(field).val(fileUrl);
    }
</script>