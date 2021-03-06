<?php
//require_once( dirname(__FILE__) . '/../components/helpers.php');
//require_once( dirname(__FILE__) . '/../extensions/yii-mail/YiiMailMessage.php');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Hospital Metropolitano',
    'timeZone' => 'America/Guayaquil',
	'language'=>'es',
	'sourceLanguage'=>'00',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.extensions.*',
             'ext.yii-mail.YiiMailMessage',
            	
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	                'admin'=>array('import'=>array(
		'application.components.*',
                'application.extensions.*',
                'ext.yii-mail.YiiMailMessage',
	)),
                       'cotizador'=>array(),	
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'class'=>'WebUser',
		),
		// uncomment the following to enable URLs in path-format
            'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),
	'urlManager'=>array(
			'urlFormat'=>'path',
                   'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/*'=>'<controller>/<action>',
                               
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
	
		// uncomment the following to use a MySQL database
	
		'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=webcont_hm',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'messages'=>array(
            'class'=>'CDbMessageSource'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@hospitalmetropolitano.org.ec',
	),
	'behaviors' => array('ApplicationConfigBehavior')

);
