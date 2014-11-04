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
    /* @var $this SecurityQuestionController */
    /* @var $model SecurityQuestion */

    $this->breadcrumbs = array(
        Yii::t('member_attribute', 'Security Questions') => array('index'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('member_attribute', 'Manage Security Question'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('member_attribute', 'Create Security Question') ?></h1>

    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>