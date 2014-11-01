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
    /* @var $this JobMajorController */
    /* @var $model JobMajor */
    $jobsMajor_arr = array();
    foreach ($jobsMajor as $j) {
        if ($j->pid == 0 || empty($j->pid)) {
            $jobsMajor_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
            foreach ($jobsMajor as $j_child) {
                if ($j_child->pid == $j->id) {
                    $jobsMajor_arr[$j_child->id] = '--- ' . (Yii::app()->language == 'vi' ? $j_child->title : $j_child->title_en);
                }
            }
        }
    }

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Manage Job Majors') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links'=>$this->breadcrumbs
    ));

    $this->menu = array(
        array('label' =>  Yii::t('jobs', 'Create JobMajor'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#job-major-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>

<div class="well">
<h1><?php  echo Yii::t('jobs', 'Manage Job Majors') ?></h1>

<p>
    <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
</p>

<?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'job-major-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'title',
            'value' => function($d) {
                    return Yii::app()->language == 'vi'? $d->title : $d->title_en;
                }
        ),
        array(
            'name' => 'pid',
            'value'=> function($d) use ($jobsMajor_arr) {
                    return isset($jobsMajor_arr[$d->pid]) ? $jobsMajor_arr[$d->pid] : Yii::t('application', 'Root');
                },
            'filter' => $jobsMajor_arr
        ),
        'pos',
        array(
            'name' => 'status',
            'value' => '$data->status ? Yii::t("application","Published") : Yii::t("application","UnPublished")',
            'filter' => array(1 => Yii::t("application", "Published"), 0 => Yii::t("application", "UnPublished"))
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
</div>
