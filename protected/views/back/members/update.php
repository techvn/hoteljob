<?php
$_knowMe = array();
foreach($knowMe as $v) {
    $_knowMe[$v->id] = (Yii::app()->language == 'vi' ? $v->title : $v->title_en);
}
$_memberGroup = array();
foreach($memberGroup as $v) {
    $_memberGroup[$v->id] = $v->name;
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
<?php
/* @var $this MembersController */
/* @var $model Members */

$this->breadcrumbs = array(
    Yii::t('backend_menu', 'Member') => array('index'),
    $model->uname => array('view', 'id' => $model->id),
    Yii::t('application', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('backend_menu', 'Add Member'), 'url' => array('create')),
    array('label' => Yii::t('backend_menu', 'Member Manage'), 'url' => array('admin'))
);
?>
<div class="row">
    <?php
    $this->widget('application.widgets.backend.CBreadcrumbs',
        array(
            'links' => $this->breadcrumbs
        )
    );
    ?>
</div>

<input type="hidden" name="update" value="<?php echo $update ?>"/>
<div class="well">
    <h1><?php echo Yii::t('backend_menu', 'Update Member') ?> "<b><?php echo $model->uname; ?></b>"</h1>
    <?php $this->renderPartial('_form',
        array(
            'model' => $model,
            'memberGroup' => $_memberGroup,
            'knowMe' => $_knowMe,
            'locations' => $locations,
            'securityQues' => $securityQues,
            'update' => 1
        )); ?>
</div>