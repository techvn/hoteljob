<?php
$province = array('' => Yii::t('application', 'All'));
$district = array('' => Yii::t('application', 'All'));

$memberQuery = Yii::app()->request->getQuery('Members');
$province_selected = isset($memberQuery['province_id']) ? $memberQuery['province_id'] : 0;

if($locations) {
    foreach($locations as $k => $v) {
        if($v->parent_id == Locations::LOCATION_VN) {
            $province[$v->id] = $v->name;
            foreach($locations as $k1 => $v1) {
                if($v1->parent_id == $province_selected) {
                    $district[$v1->id] = $v1->name;
                }
            }
        }
    }
}
?>
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
            //'fullname',
            //'pwd',
            //'gender',
            //'birth',
            array(
                'name' => 'birth',
                'value' => '($birth = preg_split("/\s/",$data->birth)) > 1 ? $birth[0] : ""',
                //'filter' => false,
                //'sortable'=>false,
                //'header'=>Yii::t('member_attribute', 'Birth')
            ),
            'phone',
            'mobile',
            'email',
            //'created_time',
            /*array(
                'name' => 'created_time',
                'value' => '($created_time = preg_split("/\s/",$data->created_time)) > 1 ? $created_time[0] : ""',
                //'filter' => false,
                //'sortable'=>false,
                'header' => Yii::t('member_attribute', 'Created Time')
            ),*/
            //'updated_time',
            //'members_group_id',
            //'security_ques_id',
            //'security_ans',
            //'recieve_mail',
            //'province_id',
            //'district_id',
            array(
                'name' => 'province_id',
                'value' => function ($data, $row) use ($locations) {
                        return (isset($locations[$data->province_id]) ? $locations[$data->province_id]->name : '---');
                    }, //, //'$locations[$data->district_id]->name . ", " . $locations[$data->province_id]->name',
                'filter' => $province,
                //'sortable'=>false,
            ),
            array(
                'name' => 'district_id',
                'value' => function ($data, $row) use ($locations) {
                        return (isset($locations[$data->district_id]) ? $locations[$data->district_id]->name : '---');
                    }, //, //'$locations[$data->district_id]->name . ", " . $locations[$data->province_id]->name',
                'filter' => $district,
                //'sortable'=>false,
            ),
            //'address',
            array(
                'name' => 'status',
                'value' => '$data->status ? Yii::t("application", "Published") : Yii::t("application", "UnPublished")',
                'filter' => CHtml::dropDownList('Members[status]', 'status',  // you have to declare the selected value
                        array(
                            ''=>Yii::t('application', 'All'),
                            '1'=>Yii::t('application', 'Published'),
                            '0'=>Yii::t('application', 'UnPublished'),
                        )
                    ),
                //'sortable'=>false,
                //'header'=>'Email/Username'
            ),

            //'status',
            //'know_me_id',
            //'married',
            //'avatar',
            //'nationality',
            array(
                'class' => 'CButtonColumn'
            ),
        ),
    ));
    ?>
</div>
