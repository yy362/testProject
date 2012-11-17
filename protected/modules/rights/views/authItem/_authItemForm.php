<?php
$config = array(
	'elements' => array(
		array(
			'name', 'hint' => '名称必须唯一',
		),
		array(
			'description', 'hint' => '用于描述这个项目',
		),
		/*array(
			'type', 'dropdownlist', 'hint' => '这个项目的类型',
			'items'=>array(
				CAuthItem::TYPE_OPERATION => '操作',
				CAuthItem::TYPE_ROLE => '角色',
				CAuthItem::TYPE_TASK => '任务',
			),
		),*/
		array(
			'bizRule', 'textarea', 'hint' => '业务规则在checkAccess的时候会被PHP执行，往往是逻辑表达式',
		),
		array(
			'data', 'textarea', 'hint' => '判断业务规则时所需的数据',
		),
	),
	'buttons' => array(
		'submit' => array('value'=>'提交', 'type'=>'submit'),
		'reset' => array('value'=>'重置', 'type'=>'reset'),
	),
	'activeForm' => array(
		'class' => 'TbActiveForm',
		'type' => TbActiveForm::TYPE_HORIZONTAL,
		'enableAjaxValidation' => true,
		'id' => 'authItem-form'
	),
);
$form = new TbForm($config, $model);
return $form;