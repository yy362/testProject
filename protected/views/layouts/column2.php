<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class='span9'>
		<?php echo $content; ?>
	</div>
	<div class='span3'>
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
		    'stacked'=>true, // whether this is a stacked menu
		    'items'=>$this->menu,
		)); ?>
	</div>
<?php $this->endContent(); ?>