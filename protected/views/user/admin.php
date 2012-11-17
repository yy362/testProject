<?php
$this->widget('TbGridView', array(
	'dataProvider' => $data,
	'template' => '{items}{pager}',
	'itemsCssClass' => 'items table-bordered table-striped',
	//'pagerCssClass' => 'pull-right pagination',
	'columns' => array(
		'id',
		'username',
		array(
			'class' => 'TbButtonColumn',
		),
	),
));
?>
