<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('lib',dirname(__FILE__).'/../../../syslib');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Web Application',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),
	'language' => 'zh_cn',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'system.web.actions.*',
		'system.web.form.*',
		'system.bootstrap.widgets.*',
		'system.bootstrap.web.*',
	),
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
          		'bootstrap.gii',
        	),
		),
		
		'rights' => array(
		),
		
	),

	// application components
	'components'=>array(
		'authManager' => array(
			'class'=>'HDbAuthManager',
			'connectionID' => 'db',
		),
		
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'class'=>'CWebUser',
		),
		'bootstrap'=>array(
        	'class'=>'system.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
			'responsiveCss' => true,	
		),
		// uncomment the following to enable URLs in path-format

    	'urlManager'=>array(
    		'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=php',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);