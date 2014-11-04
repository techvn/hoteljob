<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */
/* @var $form CActiveForm */

$lang = Yii::app()->language;

$members_arr = array('' => ''); //Yii::t('newsCategory', 'Select employers')
foreach($members as $m) {
    $members_arr[$m->id] = $m->uname;
}

$categories_arr = array('' => '');
foreach($categories as $c) {
    if(empty($c->parent_id) || $c->parent_id == 0) {
        $categories_arr[$c->id] = $lang == 'vi' ? $c->name : $c->name_en;
        foreach($categories as $c2) {
            if($c2->parent_id == $c->id) {
                $categories_arr[$c2->id] = '---' . ($lang == 'vi' ? $c2->name : $c2->name_en);
            }
        }
    }
}

?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-category-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class'=>'form-horizontal')
    )); ?>

    <p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="col-sm-6"></div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name_en', array('class' => 'col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'name_en', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name_en'); ?>
        </div>
        <div class="col-sm-6"></div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'parent_id',
                $categories_arr,
                array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'parent_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'status',
                array('1' => Yii::t('application', 'Published'), '0' => Yii::t('application', 'UnPublished')),
                array('selected' => $model->status)); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>

    <input type="hidden" name="NewsCategory[type]" value="1"/>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'members_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'members_id', $members_arr, array('selected' => $model->members_id)); ?>
            <?php echo $form->error($model, 'members_id'); ?>
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