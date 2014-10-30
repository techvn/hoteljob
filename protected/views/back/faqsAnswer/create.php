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
    /* @var $this FaqsAnswerController */
    /* @var $model FaqsAnswer */

    $this->breadcrumbs = array(
        Yii::t('faqs', 'Faqs Answers') => array('admin'),
        Yii::t('application', 'Create'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqs', 'Manage FaqsAnswer'), 'url' => array('admin')),
    );
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('faqs', 'Create FaqsAnswer') ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'members' => $members, 'faqsQues' => $faqsQues)); ?>
</div>