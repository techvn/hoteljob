<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }

    #jobs-grid_c0 {
        width: 5%;
    }

    #jobs-grid_c6, #jobs-grid_c7 {
        width: 8%;
    }

    #jobs-grid_c2, #jobs-grid_c3 {
        width: 12%;
    }

    #jobs-grid_c5 {
        width: 10%;
    }

    #jobs-grid_c4 {
        width: 12%;
    }
</style>

<div class="row">
    <?php
    /* @var $this JobsController */
    /* @var $model Jobs */
    $jobTypes_arr = array();
    foreach ($jobTypes as $j) {
        $jobTypes_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }
    $jobMajors_arr = array();
    foreach ($jobMajors as $j) {
        $jobMajors_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }
    $jobTimes_arr = array();
    foreach ($jobTimes as $j) {
        $jobTimes_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }
    $jobSalaries_arr = array();
    foreach ($jobSalaries as $j) {
        $symbol = isset($currencies[$j->type]) ? $currencies[$j->type]->symbol : '';
        $jobSalaries_arr[$j->id] = $j->from . ' - ' . $j->to . "($symbol)";
    }
    $jobLevels_arr = array();
    foreach ($jobLevels as $j) {
        $jobLevels_arr[$j->id] = Yii::app()->language == 'vi' ? $j->title : $j->title_en;
    }

    $this->breadcrumbs = array(
        Yii::t('jobs', 'Manage Jobs') => array('admin'),
        Yii::t('application', 'Manage'),
    );

    $this->menu = array(
        array('label' => Yii::t('jobs', 'Create Job'), 'url' => array('create')),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#jobs-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>
<div class="well">

    <h1><?php echo Yii::t('jobs', 'Manage Jobs') ?></h1>

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
        'id' => 'jobs-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            array(
                'name' => Yii::app()->language == 'vi' ? 'title' : 'title_en',
                'value' => function ($data) {
                        return Yii::app()->language == 'vi' ? $data->title : $data->title_en;
                    }
            ),
            'code',
            array(
                'name' => 'job_level_id',
                'value' => function ($data) use ($jobLevels) {
                        return isset($jobLevels[$data->job_level_id]) ? (Yii::app()->language == 'vi' ? $jobLevels[$data->job_level_id]->title : $jobLevels[$data->job_level_id]->title_en) : '';
                    },
                'filter' => $jobLevels_arr
            ),
            array(
                'name' => 'job_major_id',
                'value' => function ($data) use ($jobMajors) {
                        return isset($jobMajors[$data->job_major_id]) ? (Yii::app()->language == 'vi' ? $jobMajors[$data->job_major_id]->title : $jobMajors[$data->job_major_id]->title_en) : '';
                    },
                'filter' => $jobMajors_arr
            ),
            array(
                'name' => 'job_type_id',
                'value' => function ($data) use ($jobTypes) {
                        return isset($jobTypes[$data->job_type_id]) ? (Yii::app()->language == 'vi' ? $jobTypes[$data->job_type_id]->title : $jobTypes[$data->job_type_id]->title_en) : '';
                    },
                'filter' => $jobTypes_arr
            ),
            array(
                'name' => 'salary_from',
                'value' => function ($d) use ($currencies) {
                        $ext = '';
                        if(!function_exists('money_format')) {
                            $ext = " (" . (isset($currencies[$d->salary_type]) ? $currencies[$d->salary_type]->symbol : '') . ")";
                        }
                        return Helpers::currencyFormat(
                            $d->salary_from,
                            Yii::app()->language == 'vi' ? 'vi_VN' : 'en_US'
                        ) . $ext;
                    }
            ),

            array(
                'name' => 'salary_to',
                'value' => function ($d) use ($currencies) {
                        $ext = '';
                        if(!function_exists('money_format')) {
                            $ext = " (" . (isset($currencies[$d->salary_type]) ? $currencies[$d->salary_type]->symbol : '') . ")";
                        }
                        return Helpers::currencyFormat(
                            $d->salary_to,
                            Yii::app()->language == 'vi' ? 'vi_VN' : 'en_US'
                        ) . $ext;
                    }
            ),
            /*
            'job_time_id',
            'require',
            'job_type_id',
            'created_time',
            'end_time',
            'published',
            'description',
            'description_en',
            'language',
            'tags',
            'status',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
