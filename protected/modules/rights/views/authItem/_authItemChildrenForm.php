<?php if($this->action->id == 'update'):?>
<form action='<?php echo $this->createUrl("addChilds")?>' method='post'>
	<?php echo CHtml::hiddenField('AuthItemChildForm[parent]', $model->name)?>
	<div class='row'>
		<div class='span3'>
			<fieldset>
				<legend>Current items</legend>
<?php
$items = $this->authManager->getItemChildren($model->name);
$dataProvider = new CArrayDataProvider(array_values($items), array(
	'keyField' => 'name',
	'pagination'=>array(
        'pageSize'=>20,
    ),
));
$this->widget('TbGridView', array(
	'dataProvider' => $dataProvider,
	'template' => '{pager}{items}',
	'itemsCssClass' => 'items table table-bordered table-striped',
	'columns' => array(
		'name',
		array(
			'class' => 'TbButtonColumn',
			'template' => '{update} {delete}',
			'buttons' => array(
				'update' => array(
					'label' => '修改',
					'url' => 'Yii::app()->controller->createUrl("update", array("id"=>"$data->name"))'
				),
				'delete' => array(
					'label' => '删除',
					'url' => 'Yii::app()->controller->createUrl("deleteChild", array("parent"=>"'.$model->name.'", "child"=>"$data->name"))',
				),
			),
		),
	),
));
?>		
			</fieldset>
		</div>
	
		<div class='span9'>
			<fieldset>
				<legend>All items</legend>
<?php 
$tabs = array();
foreach($this->getAuthItemTypes() as $type=>$label) {
	$tabs[] = array(
		'label' => $label,
		'content' => $this->renderPartial('/authItem/admin', array(
			'layer'=>1,
			'path'=>'',
			'rootItems'=>$this->authManager->getRootItems($type)
		), true)
	);
}
$tabs[0]['active'] = true;
$this->widget('TbTabs', array(
	'tabs' => $tabs
));
?>
			</fieldset>
			<div class='form-actions'>
				<div class='pull-right'>
					<button class='btn btn-primary' type='submit'>添加</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php endif;?>