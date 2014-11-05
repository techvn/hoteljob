<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */

$country = array('0' => Yii::t('application', 'Select country'));
$province = array('0' => Yii::t('application', 'Select province'));
$province_option = array();
$district = array('0' => Yii::t('application', 'Select district'));
$district_option = array();
foreach ($locations as $k => $v) {
    if ($v->parent_id == 0) {
        $country[$v->id] = $v->name;
        foreach ($locations as $k_p => $v_p) {
            if ($v_p->parent_id == $v->id) {
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
echo Yii::app()->params['avatar_dir'];
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'members-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-horizontal', 'onsubmit' => 'return validateForm()', 'enctype' => 'multipart/form-data')
)); ?>

<p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

<?php
/*echo $form->errorSummary($model);
$hasError = strlen($form->errorSummary($model)) > 0 ? true : false;*/
if (!isset($update)) {
    $update = 0;
}
?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'uname', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4 <?php echo strlen($form->error($model, 'uname')) > 0 ? 'has-error' : '' ?>">
        <?php echo $update ? '<label class="control-label"><b>' . $model->uname . '</b></label>' : $form->textField(
            $model, 'uname',
            array(
                'size' => 45,
                'maxlength' => 45,
                'class' => 'form-control',
                'data-toggle' => 'tooltip',
                'placeholder' => Yii::t('member_attribute', 'UserName'),
                'data-original-title' => Yii::t('backend', 'Enter username here'),
            )
        ); ?>
        <?php echo $form->error($model, 'uname'); ?>
    </div>
    <?php echo $form->labelEx($model, 'pwd', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4 <?php echo strlen($form->error($model, 'pwd')) > 0 ? 'has-error' : '' ?>">
        <?php echo $form->passwordField($model, 'pwd', array(
            'size' => 45, 'maxlength' => 45, 'class' => 'form-control',
            'placeholder' => Yii::t('member_attribute', 'Password'),
            'autocomplate' => 'off'
        )); ?>
        <?php echo $form->error($model, 'pwd'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'gender', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo $form->dropDownList($model, 'gender', array(
                '1' => Yii::t('application', 'Male'),
                '0' => Yii::t('application', 'Female')
            ), array('class' => 'form-control')
        ); ?>
        <?php echo $form->error($model, 'gender'); ?>
    </div>
    <div class="col-sm-2"></div>
    <?php echo $form->labelEx($model, 'birth', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2 has-feedback">
        <?php echo $form->textField($model, 'birth', array('class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Birth'))); ?>
        <span class="fa fa-calendar txt-danger form-control-feedback"></span>
        <?php echo $form->error($model, 'birth'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'phone',
            array('size' => 15, 'maxlength' => 15, 'class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Phone'))
        ); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>
    <?php echo $form->labelEx($model, 'mobile', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'mobile',
            array('size' => 15, 'maxlength' => 15, 'class' => 'form-control', 'placeholder' => Yii::t('member_attribute', 'Mobile'))
        ); ?>
        <?php echo $form->error($model, 'mobile'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'gullname', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'gullname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'gullname'); ?>
    </div>
    <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'email', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'security_ques_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php
        $_securityQues = array('0' => Yii::t('application', 'Select security question'));
        foreach ($securityQues as $v) {
            $_securityQues[$v->id] = (Yii::app()->language == 'vi' ? $v->ques : $v->ques_en);
        }
        echo $form->dropDownList($model, 'security_ques_id', $_securityQues, array('class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'security_ques_id'); ?>
    </div>
    <?php echo $form->labelEx($model, 'security_ans', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'security_ans', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'security_ans'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'nationality', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php
        $nationality = $country; //array_merge(array('0' => Yii::t('application', 'Select country')), $country);
        /*if ($locations) {
            foreach ($locations as $k => $v) {
                if ($v->parent_id == 0) {
                    $nationality[$v->id] = $v->name;
                }
            }
        }*/
        echo $form->dropDownList($model, 'nationality', $nationality, array('class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'nationality'); ?>
    </div>
    <?php echo $form->labelEx($model, 'members_group_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php
        echo $form->dropDownList($model, 'members_group_id', array_merge(
            array(
                '0' => Yii::t('application', 'Select group')
            ), $memberGroup), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'members_group_id'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'province_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php
        echo $form->dropDownList($model, 'province_id',
            //array_merge(array('0' => Yii::t('application', 'Select province')), $province),
            $province,
            array('class' => 'form-control', 'options' => $province_option)
        ); ?>
        <?php echo $form->error($model, 'province_id'); ?>
    </div>
    <?php /*echo $form->labelEx($model, 'district_id', array('class' => 'col-sm-2 control-label')); */ ?>
    <div class="col-sm-2">
        <?php
        echo $form->dropDownList($model, 'district_id',
            //array_merge(array('0' => Yii::t('application', 'Select district')), $district),
            $district,
            array('class' => 'form-control', 'options' => $district_option)
        );?>
        <?php echo $form->error($model, 'district_id'); ?>
    </div>
    <?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'know_me_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->dropDownList($model, 'know_me_id',
            array_merge(array('0' => 'Hãy chọn'), $knowMe), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'know_me_id'); ?>
    </div>
    <?php echo $form->labelEx($model, 'recieve_mail', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->checkBox($model, 'recieve_mail', array('class' => 'form-control', 'style' => 'width:auto')); ?>
        <?php echo $form->error($model, 'recieve_mail'); ?>
    </div>
</div>


<div class="form-group">
    <?php echo $form->labelEx($model, 'married', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo $form->dropDownList($model, 'married', array(
            '0' => Yii::t('application', 'Single'),
            '1' => Yii::t('application', 'Married')
        ), array('class' => 'form-control'), array('options' => array($model->married => array('selected' => true)))); ?>
        <?php echo $form->error($model, 'married'); ?>
    </div>
    <div class="col-sm-2"></div>
    <?php echo $form->labelEx($model, 'level', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-2">
        <?php echo ExtCHtml::enumDropDownList($model, 'level', array('class' => 'form-control')); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->dropDownList($model, 'status', array(
            '1' => Yii::t('application', 'Published'),
            '0' => Yii::t('application', 'UnPublished')
        ), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <?php echo $form->labelEx($model, 'avatar', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
        <?php echo $form->fileField($model, 'avatar'); ?>
        <?php echo $form->error($model, 'avatar'); ?>
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
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
        <?php
        $avatar = Yii::app()->request->baseUrl . ($model->avatar ? Yii::app()->params['avatarDir'] . $model->avatar : '/uploads/avatar.jpg');
        ?>
        <img id="avatar-img" src="<?php echo $avatar ?>" style="width: 200px"/>
    </div>
</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->

<style type="text/css">
    .hide {
        display: none;
    }
</style>
<script type="text/javascript">

    function validateForm() {
        var message = [];
        // Username
        if ($('#Members_uname').val().replace(/\s/g, '') == '') {
            message.push('<?php echo Yii::t('member_attribute','Username not null') ?>');
            $('#Members_uname').blur();
        }
        if ($('#Members_uname').val().match(/[^a-zA-Z0-9]/g) != null) {
            message.push('<?php echo Yii::t('member_attribute','Name is only character and number') ?>');
            $('#Members_uname').blur();
        }
        if ($('#Members_uname').val().length < <?php echo Members::UserNameMin ?>
            || $('#Members_uname').val() > $('#Members_uname').val().length) {
            message.push('<?php echo Yii::t('member_attribute', 'Username must greater than {min} character and lesser than {max}', array('{min}' => Members::UserNameMin, '{max}' => Members::UserNameMax)); ?>');
            $('#Members_uname').blur();
        }
        // Pwd
        if ($('#Members_pwd').val().replace(/\s/g, '') == '') {
            message.push('<?php echo Yii::t('member_attribute', 'Password not null'); ?>');
            $('#Members_pwd').blur();
        }
        if ($('#Members_pwd').val().replace(/\s/g, '').length < parseInt(<?php echo Members::PasswordMin ?>) ||
            $('#Members_pwd').val().replace(/\s/g, '').length > <?php echo Members::PasswordMax ?>) {
            message.push('<?php echo Yii::t('member_attribute', 'Password must greater than {min} character and lesser than {max}', array('{min}' => Members::PasswordMin, '{max}' => Members::PasswordMax)); ?>');
            $('#Members_pwd').blur();
        }

        // Birth
        if ($('#Members_birth').val().split(/\//).length != 3 & $('#Members_birth').val() != '') {
            message.push('<?php echo Yii::t('member_attribute', 'Birthday invalid'); ?>');
            $('#Members_birth').change();
        }
        var msg = '';
        if (message.length > 0) {
            for (var o in message) {
                msg += '- ' + message[o] + "\n";
            }
            alert(msg);
        }

        return message.length > 0 ? false : true;
    }

    $(document).ready(function () {

        var avatarName = '<?php echo $model->avatar ?>';
        $('#ytMembers_avatar').val(avatarName);

        LoadTimePickerScript(function () {
            var dateConfig = {setDate: new Date()};
            <?php if(Yii::app()->language == 'vi') {
            ?>
            dateConfig.dateFormat = 'dd/mm/yy'
            <?php
            } ?>
            $('#Members_birth').datepicker(dateConfig);
        });
        $('#Members_birth').change(function () {
            $(this).parent().removeClass('has-error');
            $(this).parent().find('.errorMessage').remove();
            if ($(this).val().split(/\//).length != 3) {
                $(this).parent().addClass('has-error');
                $(this).parent().append('<div class="errorMessage"><?php echo Yii::t('member_attribute', 'Birthday invalid'); ?></div>');
            }
        });
        // Show province if country has selected
        $('#Members_province_id option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hide') & $(this).attr('pid') == $('#Members_nationality').val()) {
                $(this).removeClass('hide');
            } else {
                $(this).addClass('hide');
            }
        });
        // Show district with province selected
        $('#Members_district_id option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hide') & $(this).attr('pid') == $('#Members_province_id').val()) {
                $(this).removeClass('hide');
            } else {
                $(this).addClass('hide');
            }
        });

        $('#Members_nationality').change(function () {
            $('#Members_province_id').val(0);
            $('#Members_district_id').val(0);
            // Display all province of current country
            var country_id = $(this).val();
            $('#Members_province_id option').each(function (index) {
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
            $('#Members_district_id option').each(function (index) {
                if ($(this).val() == 0) {
                    return;
                }
                if (!$(this).hasClass('hide')) {
                    $(this).addClass('hide');
                }
            });
        });
        $('#Members_province_id').change(function () {
            var province_id = $(this).val();
            $('#Members_district_id').val(0);
            $('#Members_district_id option').each(function (index) {
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

        // Validate form
        $('#Members_uname').blur(function () {
            $(this).parent().find('.errorMessage').remove();
            if ($(this).val().replace(/\s/g, '') == '') {
                !$(this).parent().hasClass('has-error') ? $(this).parent().addClass('has-error') : '';
                $(this).parent().find('.errorMessage').remove();
                $(this).parent().append('<div class="errorMessage"><?php echo Yii::t('member_attribute', 'Username not null'); ?></div>');
                return;
            } else {
                $(this).parent().removeClass('has-error');
            }
            // Validate character not allow. Valid width [A-Za-z0-9]
            if ($(this).val().match(/[^a-zA-Z0-9]/g) != null) {
                $(this).parent().find('.errorMessage').remove();
                $(this).parent().append('<div class="errorMessage"><?php
                    echo Yii::t('member_attribute', 'Name is only character and number');
                ?></div>');
                return;
            }

            // Validate length
            if ($(this).val().replace(/\s/g, '').length <= parseInt(<?php echo Members::UserNameMin ?>) ||
                $(this).val().replace(/\s/g, '').length >= <?php echo Members::UserNameMax ?>) {
                $(this).parent().find('.errorMessage').remove();
                $(this).parent().append('<div class="errorMessage"><?php
                    echo Yii::t('member_attribute', 'Username must greater than {min} character and lesser than {max}', array('{min}' => Members::UserNameMin, '{max}' => Members::UserNameMax));
                ?></div>');
            }
        });

        $('#Members_pwd').blur(function () {
            $(this).parent().find('.errorMessage').remove();
            if ($(this).val().replace(/\s/g, '') == '' & $('input[name=update]').length == 0) {
                !$(this).parent().hasClass('has-error') ? $(this).parent().addClass('has-error') : '';
                $(this).parent().find('.errorMessage').remove();
                $(this).parent().append('<div class="errorMessage"><?php echo Yii::t('member_attribute', 'Password not null'); ?></div>');
                return;
            } else {
                $(this).parent().removeClass('has-error');
            }
            // Validate length
            if (($(this).val().replace(/\s/g, '').length <= parseInt(<?php echo Members::PasswordMin ?>) ||
                $(this).val().replace(/\s/g, '').length >= <?php echo Members::PasswordMax ?>) & $(this).val().length > 0) {
                $(this).parent().find('.errorMessage').remove();
                $(this).parent().append('<div class="errorMessage"><?php
                    echo Yii::t('member_attribute', 'Password must greater than {min} character and lesser than {max}', array('{min}' => Members::PasswordMin, '{max}' => Members::PasswordMax));
                ?></div>');
            }
        }).val('');
    });

</script>