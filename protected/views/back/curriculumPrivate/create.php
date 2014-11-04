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
    /* @var $this CurriculumPrivateController */
    /* @var $model CurriculumPrivate */

    $this->breadcrumbs = array(
        Yii::t('curriculum', 'Information Privates') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('curriculum', 'Manage Curriculum Private'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('curriculum', 'Create Curriculum Private') ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'member_fields' => $member_fields, 'curriculumVitae_fields' => $curriculumVitae_fields)); ?>
</div>