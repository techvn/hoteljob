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
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }
    $cats_arr = array();
    foreach ($cats as $c) {
        if ($c->parent_id == 0 || empty($c->parent_id)) {
            $cats_arr[$c->id] = Yii::app()->language == 'vi' ? $c->title : $c->title_en;
            foreach ($cats as $c_child) {
                if ($c_child->parent_id == $c->id) {
                    $cats_arr[$c_child->id] = Yii::app()->language == 'vi' ? $c_child->title : $c_child->title_en;
                }
            }
        }
    }

    $this->breadcrumbs = array(
        Yii::t('faqs', 'Faqs Questions') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqs', 'Create FaqsQuestion'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#faqs-question-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
        ");
    ?>
</div>

<div class="well">
    <h1><?php echo Yii::t('faqs', 'Manage Faqs Questions') ?></h1>

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
        'id' => 'faqs-question-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name' => 'member_id',
                'value' => function ($data) use ($members_arr) {
                        return isset($members_arr[$data->member_id]) ? $members_arr[$data->member_id] : '---';
                    },
                'filter' => $members_arr
            ),
            'question',
            array(
                'name' => 'faqs_category_id',
                'value' => function ($d) use ($cats_arr) {
                        return isset($cats_arr[$d->faqs_category_id]) ? $cats_arr[$d->faqs_category_id] : '---';
                    },
                'filter' => $cats_arr
            ),
            //'brief',
            array(
                'name' => 'status',
                'value' => '$data->status ? Yii::t("application","Published") : Yii::t("application","UnPublished")',
                'filter' => array(1 => Yii::t("application", "Published"), 0 => Yii::t("application", "UnPublished"))
            ),
            /*'ip_address',
            'job_id',
            'viewed',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
