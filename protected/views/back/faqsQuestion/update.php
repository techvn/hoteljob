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
    /* @var $this FaqsQuestionController */
    /* @var $model FaqsQuestion */

    $this->breadcrumbs = array(
        Yii::t('faqs', 'Faqs Questions') => array('index'),
        Yii::t('application', 'Update'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqs', 'Create FaqsQuestion'), 'url' => array('create')),
        array('label' => Yii::t('faqs', 'Manage FaqsQuestion'), 'url' => array('admin')),
    );
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('faqs', 'Update FaqsQuestion') ?></h1>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'cats' => $cats, 'members' => $members, 'jobs' => $jobs)); ?>
</div>