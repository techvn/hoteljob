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
        Yii::t('jobs', 'Language Skills') => array('index'),
        Yii::t('application', 'Update'),
    );

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Language Skill'), 'url' => array('create')),
        array('label' => Yii::t('jobs', 'Manage Language'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Update Language  Skill'); ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>