<?php
/* @var $this UserController */
/* @var $model User */

$config = include '_form.php';
$config['activeForm'] = array(
	'class' => 'TbActiveForm',
	'type' => TbActiveForm::TYPE_HORIZONTAL,
	'id' => 'User-form',
	'enableAjaxValidation' => true,
);
$form = new TbForm($config, $model);
echo $form;