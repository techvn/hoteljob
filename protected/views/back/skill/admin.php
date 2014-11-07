<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }

    #skill-grid_c0 {
        width: 5%;
    }
    #skill-grid_c2 { width: 25%; }
    #skill-grid_c3, #skill-grid_c4 {
        width: 10%;
    }

</style>

<div class="row">
    <?php
    /* @var $this SkillController */
    /* @var $model Skill */
    $listSkill_arr = array();
    foreach ($listSkill as $sk) {
        $listSkill_arr[$sk->id] = (Yii::app()->language == 'vi' ? $sk->title : $sk->title_en);
    }

    $this->breadcrumbs = array(
        Yii::t('application', 'Skills') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Skill'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#skill-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('jobs', 'Manage Skills') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'skill-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        Yii::app()->language == 'vi' ? 'title' : 'title_en',
        array(
            'name' => 'pid',
            'value' => function ($d) use ($listSkill) {
                    return isset($listSkill[$d->pid]) ?
                        (Yii::app()->language == 'vi' ? $listSkill[$d->pid]->title : $listSkill[$d->pid]->title_en) : '';
                },
            'filter' => $listSkill_arr
        ),
        'pos',
        array(
            'name' => 'status',
            'value' => '$data->status ? Yii::t("application","Published") : Yii::t("application","UnPublished")',
            'filter' => array(
                '0' => Yii::t('application', 'UnPublished'),
                '1' => Yii::t('application', 'Published'),
            )
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
</div>