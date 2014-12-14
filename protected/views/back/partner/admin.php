<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #partner-grid img { max-width: 100px; }
    #partner-grid_c1 { width: 15%; }
    #partner-grid_c0 { width: 5%; }
    tr td:nth-child(2) { text-align: center; }
    #partner-grid_c3, #partner-grid_c4 { width: 10%; }
</style>
<div class="row">
    <?php
    /* @var $this PartnerController */
    /* @var $model Partner */

    $this->breadcrumbs = array(
        Yii::t('partner_attr', 'Partners') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('partner_attr', 'Manage Partner'), 'url' => array('admin')),
        array('label' => Yii::t('application', 'Create'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#partner-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });
    ");
    ?>
</div>

<div class="well">

    <h1><?php echo Yii::t('partner_attr', 'Manage Partner') ?></h1>

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
        'id' => 'partner-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name' => 'logo',
                'type' => 'html',
                'value' => function ($d) {
                        return "<img src='" . Yii::app()->request->baseUrl . "/uploads/partner/$d->logo'/>";
                    }
            ),
            array(
                'name' => 'name',
                'type' => 'html',
                'value' => function ($d) {
                        return "<a href='{$d->link}' target='_blank'>{$d->name}</a>";
                    }
            ),
            'pos',
            array(
                'name' => 'status',
                'value' => function($d) {
                        return $d->status == 1 ? Yii::t('application', 'Published') : Yii::t('application', 'UnPublished');
                    },
                'filter' => array(
                    '0' => Yii::t('application', 'UnPublished'),
                    '1' => Yii::t('application', 'Published')
                )
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>