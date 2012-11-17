<?php
$form = $this->beginWidget('CActiveForm', array(
	'method' => 'post',
));
echo $form->textField($model, 'username');
echo $form->textField($model, 'password');
echo $form->textField($model, 'Profile.nickname');
echo CHtml::submitButton('提交');
$this->endWidget();
?>