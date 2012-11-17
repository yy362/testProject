<?php $this->beginContent('//layouts/main')?>
<?php Yii::app()->clientScript->registerCssFile($this->module->getAssetsUrl().'/css/docs.css')?>
<div class="subnav subnav-fixed">
	<?php $this->widget('TbMenu', array(
		'type' => 'pills',
		'items' => $this->module->getSubMenuItems()
	))?>
</div>
<div class='span12'>
	<?php echo $content?>
</div>
<?php $this->endContent()?>