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
    /* @var $this SkillLevelController */
    /* @var $model SkillLevel */

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Skill Levels') => array('index'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Manage Skill Levels'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Create Skill Level') ?></h1>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>