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
    /* @var $this FaqsAnswerController */
    /* @var $model FaqsAnswer */
    $faqsQues_arr = array();
    foreach($faqsQues as $f) {
        $faqsQues_arr[$f->id] = $f->title;
    }
    $members_arr = array();
    foreach ($members as $m) {
        $members_arr[$m->id] = $m->uname;
    }

    $this->breadcrumbs = array(
        Yii::t('faqs', 'Faqs Answers') => array('admin'),
        Yii::t('application', 'Manage'),
    );
    $this->widget('application.widgets.backend.CBreadcrumbs', array(
        'links' => $this->breadcrumbs
    ));

    $this->menu = array(
        array('label' => Yii::t('faqs', 'Create FaqsAnswer'), 'url' => array('create')),
    );

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#faqs-answer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
</div>

<div class="well">

    <h1><?php echo Yii::t('faqs', 'Manage Faqs Answers') ?></h1>

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
        'id' => 'faqs-answer-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'answer',
            array(
                'name' => 'faqs_question_id',
                'value' => function($d) use($faqsQues_arr) {
                        return isset($faqsQues_arr[$d->member_id]) ? $faqsQues_arr[$d->member_id] : '---';
                    },
                'filter' => $faqsQues_arr
            ),
            array(
                'name' => 'member_id',
                'value' => function($d) use($members_arr) {
                        return isset($members_arr[$d->member_id]) ? $members_arr[$d->member_id] : '---';
                    },
                'filter' => $members_arr
            ),
            //'ip_address',
            array(
                'name' => 'created_time',
                'value' => '($created = preg_split("/\s/",$data->created_time)) > 1 ? $created[0] : ""'
            ),
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
