<?php 
$form = include '_authItemForm.php';
$childrenForm = $this->renderPartial('/authItem/_authItemChildrenForm', array(
	'model' => $model,
), true);
?>
<div class="page-header">
	<h1><?php echo $this->action->id=='create'?'Create':'Update '.$model->name?></h1>
</div>
<?php 
$this->widget('TbTabs', array(
	'tabs' => array(
		array(
			'label' => 'Information',
			'content' => $form,
			'active' => true,
		),
		array(
			'label' => 'Children', 
			'content'=> $childrenForm,
			'visible' => $this->action->id == 'update',
		)
	),
));
?>