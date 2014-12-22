<?php
/* @var $this CurriculumVitaeController */
/* @var $model CurriculumVitae */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'curriculum-vitae-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-horizontal')
));
$members_arr = array(0 => '');
foreach ($members as $m) {
    $members_arr[$m->id] = $m->uname;
}
$curriculumPrivate_arr = array(0 => '');
foreach ($curriculumPrivate as $c) {
    $curriculumPrivate_arr[$c->field] = $c->alias;
}
$current_private = preg_split('/\//', $model->private_data);
$current_private_arr = array();
foreach ($current_private as $c) {
    $current_private_arr[$c] = array('selected' => true);
}
$currency_arr = array();
foreach ($currency as $c) {
    $currency_arr[$c->id] = $c->title . " ({$c->symbol})";
}
$jobMajors_arr = array();
foreach ($jobMajors as $j) {
    $jobMajors_arr[$j->id] = (Yii::app()->language == 'vi' ? $j->title : $j->title_en);
}
$jobTypes_arr = array();
foreach ($jobTypes as $jt) {
    $jobTypes_arr[$jt->id] = (Yii::app()->language == 'vi' ? $jt->title : $jt->title_en);
}
$jobLevels_arr = array();
foreach ($jobLevels as $l) {
    $jobLevels_arr[$l->id] = (Yii::app()->language == 'vi' ? $l->title : $l->title_en);
}
$companyScopes_arr = array();
foreach ($companyScopes as $c) {
    $companyScopes_arr[$c->id] = $c->from . ($c->to ? ' - ' . $c->to : '');
}
$country = array();
$province = array(0 => Yii::t('application', 'Select province'));
$province_option = array();
foreach ($locations as $l) {
    if ($l->parent_id == 0 || empty($l->parent_id)) {
        $country[$l->id] = $l->name;
        foreach ($locations as $p) {
            if ($l->id == $p->parent_id) {
                $province[$p->id] = $p->name;
                $province_option[$p->id] = array('pid' => $p->parent_id, 'class' => 'hidden');
            }
        }
    }
}
$month = array(0 => Yii::t('application', 'Select month'));
$year = array(0 => Yii::t('application', 'Select year'));
for ($i = 1; $i <= 31; $i++) {
    $month[$i] = $i;
}
for ($y = date('Y'); $y > date('Y') - 50; $y--) {
    $year[$y] = $y;
}
$academic_arr = array(0 => Yii::t('application', 'Select academic'));
foreach ($academic as $a) {
    $academic_arr[$a->id] = (Yii::app()->language == 'vi' ? $a->title : $a->title_en);
}
$skillLevel_arr = array('0' => Yii::t('application', 'Select skill level'));
foreach ($skillLevel as $s) {
    $skillLevel_arr[$s->id] = Yii::app()->language == 'vi' ? $s->title : $v->title_en;
}
$languageSkill_arr = array(0 => Yii::t('application', 'Select Language'));
foreach ($languageSkill as $s) {
    $languageSkill_arr[$s->id] = Yii::app()->language == 'vi' ? $s->title : $v->title_en;
}

// Salary option
$salary_option = [];
$salaries = JobSalary::model()->findAll();
if (!empty($salaries)) {
    foreach ($salaries as $s) {
        $salary_option[$s->id] = $s->from . ' - ' . $s->to;
    }
}

// Location to array
$locations_arr = [];
if (!empty($locations)) {
    foreach ($locations as $l) {
        if($l->parent_id == 1)
            $locations_arr[$l->id] = $l->name;
    }
}

?>

<p class="note"><?php echo Yii::t('backend', 'Fields with <span class="required">*</span> are required.') ?></p>

<div id="tabs">
<ul>
    <li><a href="#tabs-1"><?php echo Yii::t('application', 'Profile') ?></a></li>
    <li>
        <a href="#tabs-2"><?php echo Yii::t('application', 'Experience') . ' & ' . Yii::t('jobs', 'Academics') ?></a>
    </li>
    <li><a href="#tabs-3"><?php echo Yii::t('application', 'Skills') . ' & ' . Yii::t('jobs', 'Job Enjoy') ?></a>
    </li>
</ul>
<button class="btn btn-primary btn-label-left btn-top" type="submit">
                <span>
                    <i class="fa fa-clock-o"></i>
                </span>
    <?php
    echo Yii::t('application', $model->isNewRecord ? 'Create' : 'Save');
    ?>
</button>
<div id="tabs-1">

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'members_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'members_id', $members_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'members_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'cv_file', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->fileField($model, 'cv_file'); ?>
            <?php echo $form->error($model, 'cv_file'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo CHtml::label(Yii::t('jobs', 'Salary Desire'), '', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo CHtml::dropDownList('ddl_salary', '', array(0 => Yii::t('jobs', 'Concurrent'), 1 => Yii::t('jobs', 'Fix')), array('class' => 'form-control')); ?>
            <div class="custom_salary <?php echo !$salary_option ? 'hidden' : '' ?>">
                <?php
                echo CHtml::textField('txt_salary_from', $model->salary_desired_from ? $model->salary_desired_from : '0', array('class' => 'form-control', 'style' => 'width: 30%;'));
                echo CHtml::textField('txt_salary_to', $model->salary_desired_to ? $model->salary_desired_to : '0', array('class' => 'form-control', 'style' => 'width: 30%;'));
                echo CHtml::dropDownList('ddl_currency', $model->currency_id, $currency_arr, array('class' => 'form-control', 'style' => 'width: 35%; float: right'))
                ?>
            </div>
        </div>
        <?php echo $form->labelEx($model, 'private_data', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model,
                'private_data', $curriculumPrivate_arr,
                array('class' => 'form-control', 'multiple' => true, 'size' => 4),
                array('options' => $current_private_arr));
            ?>
            <?php echo $form->error($model, 'private_data'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'experience_year', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'experience_year', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'experience_year'); ?>
        </div>
        <?php echo $form->labelEx($model, 'work_from_away', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->checkBox($model, 'work_from_away'); ?>
            <?php echo $form->error($model, 'work_from_away'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_major_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_major_id', $jobMajors_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'job_major_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'job_type_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_type_id', $jobTypes_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'job_type_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_level_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'job_level_id', $jobLevels_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'job_level_id'); ?>
        </div>
        <?php echo $form->labelEx($model, 'company_scope_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'company_scope_id', $companyScopes_arr, array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'company_scope_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'description'); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'published', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->dropDownList($model, 'published', array(
                1 => Yii::t('application', 'Published'), 0 => Yii::t('application', 'UnPublished')
            ), array('class' => 'form-control'), array('options' => array($model->published => array('selected' => true)))); ?>
            <?php echo $form->error($model, 'published'); ?>
        </div>
    </div>
</div>
<div id="tabs-2">
    <div class="col-sm-12">
        <h4><?php echo Yii::t('curriculum', 'Experience working') ?></h4>
        <!--Experience working data-->
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'position', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model_experience, 'position', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_experience, 'position'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'competence', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_experience, 'competence', $jobLevels_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_experience, 'competence'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'occupation', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_experience, 'occupation', $jobMajors_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_experience, 'occupation'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'company_name', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model_experience, 'company_name', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_experience, 'company_name'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'country', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_experience, 'country', $country, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_experience, 'country'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model_experience, 'province', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_experience, 'province', $province, array('class' => 'form-control', 'options' => $province_option)); ?>
                    <?php echo $form->error($model_experience, 'province'); ?>
                </div>
            </div>
            <div class="form-group time">
                <?php echo $form->labelEx($model_experience, 'start', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $start = strtotime(($model_experience->start == '0000-00-00 00:00:00') || empty($model_experience->start) ? date('Y-m-d H:i:s') : $model_experience->start);
                    echo CHtml::dropDownList('start_month', date('m', $start), $month, array('class' => 'form-control', 'style' => 'width: 35%;'));
                    echo CHtml::dropDownList('start_year', date('Y', $start), $year, array('class' => 'form-control', 'style' => 'width: 45%; margin-left: 2%'));
                    ?>
                </div>
            </div>
            <div class="form-group time">
                <?php echo $form->labelEx($model_experience, 'end', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $end = strtotime(($model_experience->end == '0000-00-00 00:00:00') || empty($model_experience->end) ? date('Y-m-d H:i:s') : $model_experience->end);
                    echo CHtml::dropDownList('start_month', date('m', $end), $month, array('class' => 'form-control', 'style' => 'width: 35%;'));
                    echo CHtml::dropDownList('start_year', date('Y', $end), $year, array('class' => 'form-control', 'style' => 'width: 45%; margin-left: 2%'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <a href="#" class="add-experience">[<?php echo Yii::t('backend', 'Add to list') ?>]</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 list-experience">

        </div>
    </div>

    <div class="col-sm-12">
        <h4><?php echo Yii::t('jobs', 'Academics') ?></h4>

        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model_degree, 'diploma', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_degree, 'diploma', $academic_arr, array('class' => 'form-control', 'options' => $province_option)); ?>
                    <?php echo $form->error($model_degree, 'diploma'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_degree, 'school_name', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model_degree, 'school_name', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_degree, 'school_name'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_degree, 'major', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_degree, 'major', $jobMajors_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_degree, 'major'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_degree, 'country', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_degree, 'country', $country, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_degree, 'country'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_degree, 'province', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    echo $form->dropDownList($model_degree, 'province', $province,
                        array('class' => 'form-control', 'options' => $province_option)); ?>
                    <?php echo $form->error($model_degree, 'province'); ?>
                </div>
            </div>
            <div class="form-group time">
                <?php echo $form->labelEx($model_degree, 'start', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $start = strtotime(($model_degree->start == '0000-00-00 00:00:00') || empty($model_degree->start) ? date('Y-m-d H:i:s') : $model_degree->start);
                    echo CHtml::dropDownList('start_month', date('m', $start), $month, array('class' => 'form-control', 'style' => 'width: 35%;'));
                    echo CHtml::dropDownList('start_year', date('Y', $start), $year, array('class' => 'form-control', 'style' => 'width: 45%; margin-left: 2%'));
                    ?>
                </div>
            </div>
            <div class="form-group time">
                <?php echo $form->labelEx($model_degree, 'end', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php
                    $end = strtotime(($model_degree->end == '0000-00-00 00:00:00') || empty($model_degree->end) ? date('Y-m-d H:i:s') : $model_degree->end);
                    echo CHtml::dropDownList('start_month', date('m', $end), $month, array('class' => 'form-control', 'style' => 'width: 35%;'));
                    echo CHtml::dropDownList('start_year', date('Y', $end), $year, array('class' => 'form-control', 'style' => 'width: 45%; margin-left: 2%'));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <a href="#" class="add-degree">[<?php echo Yii::t('backend', 'Add to list') ?>]</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 list-degree">

        </div>
    </div>
</div>
<div id="tabs-3">
    <div class="col-sm-12">
        <h4><?php echo Yii::t('application', 'Language Skill') ?></h4>

        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model_skillLanguage, 'language', array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'language', $languageSkill_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'language'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'level', $skillLevel_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'level'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'language', $languageSkill_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'language'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'level', $skillLevel_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'level'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'language', $languageSkill_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'language'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'level', $skillLevel_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'level'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'language', $languageSkill_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'language'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->dropDownList($model_skillLanguage, 'level', $skillLevel_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_skillLanguage, 'level'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <a href="#" class="add-language">[<?php echo Yii::t('backend', 'Add to list') ?>]</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 language-skill">
            <?php
            if (count($current_languages) > 0) {
                echo '<ul>';
                foreach ($current_languages as $l) {
                    echo "<li>{$l->language} - {$l->level} <img title='Delete' alt='Delete'
                        src='' onclick='__delete({$l->id}, \'language\')'/></li>";
                }
                echo '</ul>';
            }
            ?>
        </div>
    </div>
    <div class="col-sm-12">
        <h4>
            <?php echo Yii::t('application', 'Jobs Enjoy') ?>
        </h4>

        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Job Major'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'job_major', $jobMajors_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'job_major'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Job Level'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'job_level', $jobLevels_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'job_level'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Job Type'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'job_type', $jobTypes_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'job_type'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Salary'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'job_salary', $salary_option, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'job_salary'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Work far'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'work_far', array(
                        0 => Yii::t('application', 'No'),
                        1 => Yii::t('application', 'Yes')
                    ), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'work_far'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Scope company'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'company_scope', $companyScopes_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'company_scope'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model_jobWish, Yii::t('jobWish', 'Location'), array('class' => 'col-sm-4 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->dropDownList($model_jobWish, 'location', $locations_arr, array('class' => 'form-control')); ?>
                    <?php echo $form->error($model_jobWish, 'location'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a href="#" class="add-jobwish">[<?php echo Yii::t('backend', 'Add to list') ?>]</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <?php
            echo '<table>';
            if (count($current_jobwishes) > 0) {
                foreach ($current_jobwishes as $o) {
                    $work_far = $o->work_far ? Yii::t('application', 'Yes') : Yii::t('application', 'No');
                    echo "<tr>";
                    echo "<td>{$jobMajors_arr[$o->job_major]}</td>";
                    echo "<td>{$jobTypes_arr[$o->job_type]}</td>";
                    echo "<td>{$jobLevels_arr[$o->job_level]}</td>";
                    echo "<td>{$salary_option[$o->job_salary]}</td>";
                    echo "<td>{$work_far}</td>";
                    echo "<td>{$companyScopes_arr[$o->company_scope]}</td>";
                    echo "</tr>";
                }
            }
            echo '</table>';
            ?>
        </div>
    </div>
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
</div>
<!-- form -->

<style type="text/css">
    .hidden {
        display: none;
    }

    .custom_salary select, .custom_salary input {
        display: inline;
    }

    .btn-top {
        float: right;
        position: relative;
        top: -30px;
    }

    .time select {
        display: inline;
    }

    .ui-widget {
        font-size: 14px;
    }

    .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    h4 {
        border-bottom: 1px dashed #aaa;
        padding-bottom: 5px;
    }
</style>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl . '/assets/js/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript">
    // Brief
    CKEDITOR.replace('CurriculumVitae_description');
    $('#tabs').tabs();

    $('#ddl_salary').change(function () {
        if ($(this).val() != '0') {
            $(this).parent().find('.custom_salary').removeClass('hidden');
        } else {
            $(this).parent().find('.custom_salary').addClass('hidden');
        }
    });
    // Load member data
    /*$('#CurriculumVitae_members_id').change(function() {
     $.ajax({
     url: '<?php echo Yii::app()->baseUrl ?>/backend.php?r=members/data&id=' + $(this).val(),
     success: function(d) {

     }, error: function(er) {

     }
     });
     });*/
    $('#CurriculumvitaeExperienceWorking_country').change(function () {
        $('#CurriculumvitaeExperienceWorking_province').val(0);
        // Display all province of current country
        var country_id = $(this).val();
        $('#CurriculumvitaeExperienceWorking_province option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hidden') & $(this).attr('pid') == country_id) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });
    });
    $('#CurriculumvitaeDegree_country').change(function () {
        $('#CurriculumvitaeDegree_province').val(0);
        // Display all province of current country
        var country_id = $(this).val();
        $('#CurriculumvitaeDegree_province option').each(function (index) {
            if ($(this).val() == 0) {
                return;
            }
            if ($(this).hasClass('hidden') & $(this).attr('pid') == country_id) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });
    });
</script>