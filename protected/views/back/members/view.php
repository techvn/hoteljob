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
        'Members' => array('index'),
        $model->id,
    );

    $this->menu = array(
        array('label' => 'List Members', 'url' => array('index')),
        array('label' => 'Create Members', 'url' => array('create')),
        array('label' => 'Update Members', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Delete Members', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Members', 'url' => array('admin')),
    );
    ?>

    <h1>View Members #<?php echo $model->id; ?></h1>

    <?php $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'uname',
            'pwd',
            'gender',
            'birth',
            'address',
            'phone',
            'mobile',
            'email',
            'created_time',
            'updated_time',
            'status',
            'gullname',
            'members_group_id',
            'security_ques_id',
            'security_ans',
            'recieve_mail',
            'province_id',
            'district_id',
            'know_me_id',
            'married',
            'avatar',
            'nationality',
        ),
    )); ?>
</div>