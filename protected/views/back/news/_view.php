<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brief')); ?>:</b>
	<?php echo CHtml::encode($data->brief); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumb')); ?>:</b>
	<?php echo CHtml::encode($data->thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organize_id')); ?>:</b>
	<?php echo CHtml::encode($data->organize_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_time')); ?>:</b>
	<?php echo CHtml::encode($data->created_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('public_time')); ?>:</b>
	<?php echo CHtml::encode($data->public_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unpublic_time')); ?>:</b>
	<?php echo CHtml::encode($data->unpublic_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag')); ?>:</b>
	<?php echo CHtml::encode($data->tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewed')); ?>:</b>
	<?php echo CHtml::encode($data->viewed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
	<?php echo CHtml::encode($data->title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brief_en')); ?>:</b>
	<?php echo CHtml::encode($data->brief_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_en')); ?>:</b>
	<?php echo CHtml::encode($data->content_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_en')); ?>:</b>
	<?php echo CHtml::encode($data->tag_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->news_category_id); ?>
	<br />

	*/ ?>

</div>