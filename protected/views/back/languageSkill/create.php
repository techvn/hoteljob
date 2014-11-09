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
    /* @var $this LanguageSkillController */
    /* @var $model LanguageSkill */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Language Skills') => array('admin'),
        Yii::t('application', 'create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Language'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Language Skill') ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>