<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

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
$this->widget('application.widgets.backend.CBreadcrumbs', array(
    'links' => array(
        Yii::t('backend_menu', 'Dashboard') => array('site/index'),
        //'Edit' // Action Edit, list, view ...
    ),
));
?>

<div style="width: 100%; height: 200px;"></div>

