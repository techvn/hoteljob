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
    /* @var $this SkillController */
    /* @var $model Skill */

    $this->breadcrumbs = array(
        Yii::t('application', 'Skills') => array('admin'),
        Yii::t('application', 'Update'),
    );

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Skill'), 'url' => array('admin')),
        array('label' => Yii::t('jobs', 'Create Skill'), 'url' => array('create')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Update Skill'); ?></h1>

    <?php $this->renderPartial('_form', array('model' => $model, 'listSkill' => $listSkill)); ?>
</div>