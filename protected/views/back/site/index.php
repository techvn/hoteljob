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

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
));

$this->widget('CMultiFileUpload', array(
    'model' => $model,
    'attribute' => 'photos',
    'accept' => 'jpg|gif|png',
    'options' => array(// 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
        // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
        // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
        // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
        // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
        // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
    ),
    'denied' => 'File is not allowed',
    'max' => 10, // max 10 files
));

echo CHtml::activeLabel($model,'username');
echo CHtml::activeTextField($model,'username');
echo '<br/>';
echo CHtml::activeCheckBox($model,'rememberMe');
echo CHtml::activeLabel($model,'rememberMe');
echo '<br/>';
echo CHtml::activeLabel($model, 'password');
echo CHtml::activePasswordField($model,'password');
echo '<br/>';
echo CHtml::activeFileField($model, 'image');
echo '<br/>';
echo CHtml::submitButton('Upload');

$this->endWidget(); ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
