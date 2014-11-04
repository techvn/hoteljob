<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }
    #job-applies-grid_c0 { width: 5%; }
</style>

<div class="row">
    <?php
    /* @var $this JobAppliesController */
    /* @var $model JobApplies */
    $jobs_arr = array();
    foreach ($jobs as $j) {
        $jobs_arr[$j->id] = (Yii::app()->language == 'vi' ? $j->title : $j->title_en);
    }
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }

    $this->breadcrumbs = array(
        Yii::t('jobs', 'List Recruitment') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Recruitment'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#job-applies-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div
<div class="well">
    <h1><?php echo Yii::t('jobs', 'Manage Recruitment') ?></h1>

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
        'id' => 'job-applies-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name'=>'members_id',
                'value'=>function($d) use($members) {
                        return isset($members[$d->members_id]) ? $members[$d->members_id]->uname : '';
                    },
                'filter'=>$members_arr
            ),
            array(
                'name' => 'jobs_id',
                'value' => function ($d) use ($jobs) {
                        return isset($jobs[$d->jobs_id]) ? (Yii::app()->language == 'vi' ? $jobs[$d->jobs_id]->title : $jobs[$d->jobs_id]->title_en) : '';
                    },
                'filter' => $jobs_arr
            ),
            array(
                'name' => 'applied_time',
                'value' => function ($d) {
                        return count($time = preg_split('/\s/', $d->applied_time)) > 1 ? $time[0] : '';
                    }
            ),
            array(
                'name' => Yii::app()->language == 'vi' ? 'title' : 'title_en',
                'value' => function ($d) {
                        return Yii::app()->language == 'vi' ? $d->title : $d->title_en;
                    }
            ),
            //'candidate_name',
            'email',
            /*
            'brief',
            'fitness',
            'cv_link',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
