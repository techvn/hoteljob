<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
</style>

<div class="row">
    <?php
    /* @var $this CurriculumVitaeController */
    /* @var $model CurriculumVitae */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Curriculum Vitae') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Curriculum Vitae'), 'url' => array('admin')),
        array('label' => Yii::t('jobs', 'Create Curriculum Vitae'), 'url' => array('create')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Update Curriculum Vitae'); ?></h1>

    <?php $this->renderPartial('_form', array(
        'model' => $model,
        'members' => $members,
        'model_experience' => $model_experience,
        'model_degree' => $model_degree,
        'model_skillLanguage' => $model_skillLanguage,
        'model_otherSkill' => $model_otherSkill,
        'members' => $members,
        'jobTypes' => $jobTypes,
        'jobMajors' => $jobMajors,
        'languageSkill' => $languageSkill,
        'companyScopes'=>$companyScopes,
        'skillLevel'=>$skillLevel,
        'academic' =>$academic,
        'curriculumPrivate' => $curriculumPrivate,
        'currency' => $currency,
        'jobLevels' => $jobLevels,
        'locations' => $locations,
        'model_jobWish' => $model_jobWish
    )); ?>
</div>