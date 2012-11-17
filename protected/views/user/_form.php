<?php
/* @var $this UserController */
/* @var $model User */

$config = array (
	'elements' => array (
		array (
			'username',
			'text',
		),
		array (
			'password',
			'password',
			'hint' => '请输入密码3-16位',
		),
		'Profile' => array (
			'class' => 'TbFieldset',
			'legend' => 'Profile',
			'elements' => array (
				array (
					'Profile.nickname',
					'text',
				),
				array (
					'Profile.address',
					'textarea',
				),
				array (
					'Profile.age',
					'text',
				),
				array (
					'Profile.remark',
					'textarea',
				),
			),
		),
	),
);
$config['buttons'] = array(
	'submit' => array('type'=>'submit', 'value'=>'提交'),
	'reset' => array('type'=>'reset', 'value'=>'重置')
);
return $config;