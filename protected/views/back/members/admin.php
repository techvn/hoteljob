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
    /* @var $this MembersController */
    /* @var $model Members */
    $this->breadcrumbs = array(
        Yii::t('backend_menu', 'Member') => array('index'),
        Yii::t('backend_menu', 'List'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs',
        array(
            'links' => $this->breadcrumbs
        )
    );
    ?>
</div>

<div class="well">
    <?php
    $this->menu = array(
        array('label' => Yii::t('backend_menu', 'List Member'), 'url' => array('index')),
        array('label' => Yii::t('backend_menu', 'Add Member'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#members-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });"
    );
    ?>

    <h1><?php echo Yii::t('backend_menu', 'List Member') ?></h1>

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
        'id' => 'members-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            //'id',
            'uname',
            //'gullname',
            //'pwd',
            //'gender',
            'birth',
            'phone',
            'mobile',
            'email',
            'created_time',
            //'updated_time',
            //'members_group_id',
            //'security_ques_id',
            //'security_ans',
            //'recieve_mail',
            'province_id',
            'district_id',
            'address',
            'status',
            //'know_me_id',
            //'married',
            //'avatar',
            //'nationality',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div>
