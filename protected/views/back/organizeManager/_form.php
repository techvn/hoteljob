<?php
/* @var $this OrganizeManagerController */
/* @var $model OrganizeData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'organize-data-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
));

$members_arr = array();
foreach ($members as $m) {
    $members_arr[$m->id] = $m->uname;
}
$scopes_arr = array();
foreach ($scopes as $s) {
    $scopes_arr[$s->id] = ($s->from ? $s->from : '') . (($s->to & $s->from) ? ' - ' . $s->to : '');
}

$country = array('0' => Yii::t('application', 'Select country'));
$province = array('0' => Yii::t('application', 'Select province'));
$province_option = array();
$district = array('0' => Yii::t('application', 'Select district'));
$district_option = array();
$country_selected = 0;
foreach ($locations as $k => $v) {
    if ($v->parent_id == 0) {
        $country[$v->id] = $v->name;
        foreach ($locations as $k_p => $v_p) {
            if ($v_p->parent_id == $v->id) {
                // Check current province selected
                if ($model->province == $v_p->id) {
                    $country_selected = $v_p->parent_id;
                } // --------
                $province[$v_p->id] = $v_p->name;
                $province_option[$v_p->id] = array('pid' => $v->id, 'class' => 'hide');
                foreach ($locations as $k_d => $v_d) {
                    if ($v_d->parent_id == $v_p->id) {
                        $district[$v_d->id] = $v_d->name;
                        $district_option[$v_d->id] = array('pid' => $v_p->id, 'class' => 'hide');
                    }
                }
            }
        }
    }
}

?>

<p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <?php echo $form->labelEx($model, 'name_en', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'name_en', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'name_en'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'members_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->dropDownList($model, 'members_id', $members_arr, array('class' => 'form-control', 'options' => array($model->members_id => array('selected' => true)))); ?>
        <?php echo $form->error($model, 'members_id'); ?>
    </div>
    <?php echo $form->labelEx($model, 'website', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'website'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'brand', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'brand', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'brand'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'tel', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'tel', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'tel'); ?>
    </div>
    <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'phone', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'fax', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'fax', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'fax'); ?>
    </div>
    <?php echo $form->labelEx($model, 'tax', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'tax', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'tax'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'logo', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->fileField($model, 'logo'); ?>
        <?php
        echo $form->error($model, 'logo');
        ?>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
        <?php
        if ($model->logo) {
            echo "<img src='" . Yii::app()->baseUrl . "/uploads/logo/{$model->logo}' alt='{$model->name}' title='{$model->name}'/>";
        }
        ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'contact', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'contact', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'contact'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'company_scope_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo $form->dropDownList($model, 'company_scope_id', $scopes_arr, array('class' => 'form-control'), array('options' => array($model->company_scope_id => array('selected' => true)))); ?>
        <?php echo $form->error($model, 'company_scope_id'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo CHtml::label(Yii::t('application', 'Select province/district'), '', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10 ddl_address">
        <?php
        echo CHtml::dropDownList('ddl_country', $country_selected, $country,
            array('class' => 'form-control', 'style' => 'width: 25%'));
        echo $form->dropDownList($model, 'province', $province,
            array('class' => 'form-control', 'style' => 'width: 25%;', 'options' => $province_option));
        echo $form->dropDownList($model, 'district', $district,
            array('class' => 'form-control', 'style' => 'width: 25%;', 'options' => $district_option));
        ?>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10">
        <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 500)); ?>
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
    <?php echo $form->labelEx($model, 'ended_time', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4 has-feedback">
        <?php echo $form->textField($model, 'ended_time', array('class' => 'form-control')); ?>
        <span class="fa fa-calendar form-control-feedback"></span>
        <?php echo $form->error($model, 'ended_time'); ?>
    </div>
    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
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
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript">
    // Brief
    CKEDITOR.replace('OrganizeData_description', {
            toolbar: [
                [ 'Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
                [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
                [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ]
            ]
        }
    );
    CKEDITOR.replace('OrganizeData_description_en', {
            toolbar: [
                [ 'Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
                [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
                [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ]
            ]
        }
    );
    $(document).ready(function () {
        $('#ytOrganizeManager_logo').val('<?php echo $model->logo ?>');

        LoadTimePickerScript(function () {
            var dateConfig = {setDate: new Date()};
            <?php if(Yii::app()->language == 'vi') {
            ?>
            dateConfig.dateFormat = 'dd/mm/yy'
            <?php
            } ?>
            $('#OrganizeData_ended_time').datepicker(dateConfig);
        });

        $('#OrganizeData_email').blur(function () {
            $(this).parent().find('.errorMessage').remove();
            if (!validateEmail($(this).val())) {
                $(this).parent().append('<div class="errorMessage"><?php echo Yii::t('application', 'Invalid email') ?></div>');
            }
        });

        // Show province if country has selected
        $('#OrganizeData_province option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hide') & $(this).attr('pid') == $('#ddl_country').val()) {
                $(this).removeClass('hide');
            } else {
                $(this).addClass('hide');
            }
        });
        // Show district with province selected
        $('#OrganizeData_district option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hide') & $(this).attr('pid') == $('#OrganizeData_province').val()) {
                $(this).removeClass('hide');
            } else {
                $(this).addClass('hide');
            }
        });

        $('#ddl_country').change(function () {
            $('#OrganizeData_province').val(0);
            $('#OrganizeData_district').val(0);
            // Display all province of current country
            var country_id = $(this).val();
            $('#OrganizeData_province option').each(function (index) {
                if ($(this).val() == 0) {
                    return;
                }
                if ($(this).hasClass('hide') & $(this).attr('pid') == country_id) {
                    $(this).removeClass('hide');
                } else {
                    $(this).addClass('hide');
                }
            });
            // Hide all district
            $('#OrganizeData_district option').each(function (index) {
                if ($(this).val() == 0) {
                    return;
                }
                if (!$(this).hasClass('hide')) {
                    $(this).addClass('hide');
                }
            });
        });
        $('#OrganizeData_province').change(function () {
            var province_id = $(this).val();
            $('#OrganizeData_district').val(0);
            $('#OrganizeData_district option').each(function (index) {
                if ($(this).val() == 0) {
                    return;
                }
                if ($(this).hasClass('hide') & $(this).attr('pid') == province_id) {
                    $(this).removeClass('hide');
                } else {
                    $(this).addClass('hide');
                }
            });
        });

    });
</script>
<style type="text/css">
    .ddl_address select {
        display: inline;
        margin-right: 2%;
    }
    .form-group { position: relative; }
    .form-group img { height: 100px; position: absolute; z-index: 10; }
</style>