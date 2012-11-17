<?php /* @var $this Controller */ ?>
<?php $cs = Yii::app()->clientScript ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<?php $cs->registerCssFile(Yii::app()->baseUrl.'/css/page.css')?>
	</head>
<body>
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'null', // null or 'inverse'
		'brand'=>Yii::app()->name,
		'fixed' => 'top',
		'brandUrl'=>$this->createUrl('/'),
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.TbMenu',
			 	'items'=> array(
				),
			),
		)
	))?>
	<div class="container main">
		<div class="row">
			<?php echo $content; ?>
		</div>
	</div> <!-- /container -->

</body>
</html>
