<style type="text/css">
    .preloader {
        display: none;
    }

    #ajax-content {
        display: block;
    }

    #curriculum-vitae-grid_c0 {
        width: 5%;
    }

    #curriculum-vitae-grid_c3, #curriculum-vitae-grid_c4 {
        width: 15%;
    }

    #curriculum-vitae-grid_c5, #curriculum-vitae-grid_c6 {
        width: 10%;
    }
</style>

<div class="row">
    <?php
    /* @var $this CurriculumVitaeController */
    /* @var $model CurriculumVitae */
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }
    $jobTypes_arr = array();
    foreach ($jobTypes as $j) {
        $jobTypes_arr[$j->id] = (Yii::app()->language == 'vi' ? $j->title : $j->title_en);
    }
    $jobMajors_arr = array();
    foreach ($jobMajors as $j) {
        $jobMajors_arr[$j->id] = (Yii::app()->language == 'vi' ? $j->title : $j->title_en);
    }

    $this->breadcrumbs = array(
        Yii::t('curriculum', 'Curriculum Vitae') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array('links' => $this->breadcrumbs));

    $this->menu = array(
        array('label' => Yii::t('curriculum', 'Create Curriculum Vitae'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#curriculum-vitae-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
    ?>
</div>
<div class="well">
    <h1><?php echo Yii::t('curriculum', 'Manage Curriculum Vitae') ?></h1>

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
        'id' => 'curriculum-vitae-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'members_id',
            'title',
            array(
                'name' => 'job_major_id',
                'value' => function ($d) use ($jobMajors) {
                        return isset($jobMajors[$d->job_major_id]) ? (
                        Yii::app()->language == 'vi' ? $jobMajors[$d->job_major_id]->title : $jobMajors[$d->job_major_id]->title_en
                        ) : '';
                    },
                'filter' => $jobMajors_arr
            ),
            array(
                'name' => 'job_type_id',
                'value' => function ($d) use ($jobTypes) {
                        return isset($jobTypes[$d->job_type_id]) ? (
                        Yii::app()->language == 'vi' ? $jobTypes[$d->job_type_id]->title : $jobTypes[$d->job_type_id]->title_en
                        ) : '';
                    },
                'filter' => $jobTypes_arr
            ),
            'experience_year',
            array(
                'name' => 'published',
                'value' => '$data->published ? Yii::t("application", "Published") : Yii::t("application", "UnPublished")',
                'filter' => CHtml::dropDownList('CurriculumVitae[published]', 'published', // you have to declare the selected value
                        array(
                            '1' => Yii::t('application', 'Published'),
                            '0' => Yii::t('application', 'UnPublished'),
                        )
                    )
            ),
            //'cv_file',
            //'description',
            //'private_data',
            /*
            'salary_desired_from',
            'salary_desired_to',
            'currency_id',
            'work_from_away',
            'job_level_id',
            'company_scope_id',
            */
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    )); ?>
</div>
