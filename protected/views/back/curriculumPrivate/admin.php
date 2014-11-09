<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #curriculum-private-grid_c0, #curriculum-private-grid_c3 { width: 10%; }
</style>

<div class="row">
    <?php
    /* @var $this CurriculumPrivateController */
    /* @var $model CurriculumPrivate */

    $this->breadcrumbs = array(
        Yii::t('curriculum', 'Information Privates') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links'=>$this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('curriculum', 'Create Information Private'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#curriculum-private-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>

<div class="well">

    <h1><?php echo Yii::t('curriculum', 'Manage Curriculum Privates') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'curriculum-private-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'field',
            array(
                'name'=> (Yii::app()->language == 'vi' ? 'alias' : 'alias_en'),
                'value' => function($data) {
                        return Yii::app()->language == 'vi' ? $data->alias : $data->alias_en;
                    },
                'header' => Yii::t('application', 'Alias')
            ),
            array(
                'name' => 'published',
                'value' => '$data->published ? Yii::t("application","Published") : Yii::t("application","UnPublished")',
                'filter' => array(1 => Yii::t("application", "Published"), 0 => Yii::t("application", "UnPublished"))
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
