<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #organize-data-grid_c0 { width: 5%; }
    #organize-data-grid_c1 { width: 30%; }

</style>

<div class="row">
    <?php
    /* @var $this OrganizeManagerController */
    /* @var $model OrganizeData */
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }

    $this->breadcrumbs = array(
        Yii::t('organize', 'Manage Organize') => array('index'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('organize', 'Create Organize'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#organize-data-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('organize', 'Manage Organize') ?></h1>

    <p>
        <?php echo Yii::t('backend', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
    </p>
    <?php echo CHtml::link(Yii::t('backend', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
    <!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'organize-data-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            Yii::app()->language == 'vi' ? 'name' : 'name_en',
            array(
                'name' => 'members_id',
                'value' => function ($d) use ($members) {
                        return isset($members[$d->members_id]) ? $members[$d->members_id]->uname : '';
                    },
                'filter' => $members_arr
            ),
            'website',
            'brand',
            'email',
            /*
            'fax',
            'tax',
            'logo',
            'contact',
            'company_scope_id',
            'description',
            'description_en',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
