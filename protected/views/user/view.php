<?php

$this->widget('TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'username',
		'password',
	),
));

$this->widget('TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'Profile.nickname',
	),
));

?>

<div class='pull-right'>
	<button class="btn btn-primary">返回</button>
</div>