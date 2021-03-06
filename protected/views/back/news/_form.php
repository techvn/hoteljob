<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */

$members_arr = array();
foreach ($members as $m) {
    $members_arr[$m->id] = $m->uname;
}
$newsCategory_arr = array();
foreach ($newsCategory as $c) {
    $newsCategory_arr[$c->id] = $c->name;
}

?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
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
            <?php echo $form->textArea($model, 'brief', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'brief'); ?>
        </div>
        <?php echo $form->labelEx($model, 'brief_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textArea($model, 'brief_en', array('size' => 60, 'maxlength' => 225)); ?>
            <?php echo $form->error($model, 'brief_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'organize_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'organize_id', array(),
                array('class' => 'form-control'), array('options' => array($model->organize_id => array('selected' => true))));
            ?>
            <?php echo $form->error($model, 'organize_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'content', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'content'); ?>
            <?php echo $form->error($model, 'content'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'content_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'content_en', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'content_en'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'status',
                array('1' => Yii::t('application', 'Published'), '0' => Yii::t('application', 'UnPublished')), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
        <?php echo $form->labelEx($model, 'thumb', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4 elm-relative">
            <?php echo $form->fileField($model, 'thumb'); ?>
            <?php echo $form->error($model, 'thumb'); ?>
            <img src="<?php echo Yii::app()->baseUrl . '/uploads/avatar.jpg' ?>" class="thumb"/>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'public_time', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'public_time', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'public_time'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'unpublic_time', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'unpublic_time', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'unpublic_time'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'news_category_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'news_category_id', $newsCategory_arr, array('class' => 'form-control'), array('options' => array($model->news_category_id => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'news_category_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'tag', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'tag', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'tag'); ?>
        </div>
        <?php echo $form->labelEx($model, 'tag_en', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'tag_en', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'tag_en'); ?>
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
<script type="text/javascript">
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    var editor = CKEDITOR.replace('News_content');
    CKFinder.setupCKEditor(editor,
        {
            basePath: '<?php echo Yii::app()->baseUrl ?>/assets/js/ckeditor/plugins/ckfinder/',
            baseUrl: "<?php echo Yii::app()->baseUrl ?>/uploads/",
            baseDir: "<?php echo Yii::getPathOfAlias('webroot') ?>/uploads/"
        }
    );
    var editor_en = CKEDITOR.replace('News_content_en');
    CKFinder.setupCKEditor(editor_en,
        {
            basePath: '<?php echo Yii::app()->baseUrl ?>/assets/js/ckeditor/plugins/ckfinder/',
            baseUrl: "<?php echo Yii::app()->baseUrl ?>/uploads/",
            baseDir: "<?php echo Yii::getPathOfAlias('webroot') ?>/uploads/"
        }
    );
    // Brief
    CKEDITOR.replace('News_brief', {
            toolbar: [
                [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
            ]
        }
    )
    ;
    CKEDITOR.replace('News_brief_en', {
            toolbar: [
                [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
            ]
        }
    )
    ;
</script>
<style type="text/css">
    .elm-relative {
        position: relative;
    }

    img.thumb {
        height: 120px;
        position: absolute;
    }
</style>