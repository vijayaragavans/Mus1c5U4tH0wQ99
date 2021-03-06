<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Music eStore',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
	),

 
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'martin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,

		),
			'Paypal' => array(
				    'class'=>'application.components.Paypal',
/*				    'apiUsername' => 'sjvmv_api1.yahoo.co.in',
				    'apiPassword' => '9R9K82M66Y6QEKUE',
				    'apiSignature' => 'AAI2vtI8Y2GBeHHmNUWRIK5z.YDZApPCngdYQb.U8-vxm9OIeupu0nH0', 
*/
				    // Beta Haiinteractive Credentials
				    'apiUsername' => 'vijayaragavan.sivagurusamy_api1.gmail.com',
				    'apiPassword' => 'EBNVW39WQSFCBG94',
				    'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgwZPwwb3aVfxGpjRfL6aTkNc9Ug', 
				    'apiLive' => false,
				 
				    'returnUrl' => 'paypal/confirm/', //regardless of url management component
				    'cancelUrl' => 'paypal/cancel/', //regardless of url management component
				 
				    // Default currency to use, if not set USD is the default
				    'currency' => 'USD',
				 
				    // Default description to use, defaults to an empty string
				    //'defaultDescription' => '',
				 
				    // Default Quantity to use, defaults to 1
				    //'defaultQuantity' => '1',
				 
				    //The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
				    //'version' => '3.0',
				),			           		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
                        		'caseSensitive'=>false, 
                        			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
/*		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
*/		// uncomment the following to use a MySQL database
		
/*		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=musicstore',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
*/	

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=rightern_musicstore',
			'emulatePrepare' => true,
			'username' => 'rightern_news',
			'password' => 'M0nster.com',
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
		'params'=>array(
			// this is used in contact page
			'Site_Name'		=> 'Music eStore Market',
			'page_Keyword'		=> 'Music eStore, Music Market, Download Music',
			'adminEmail'=>'webmaster@example.com',
			'AVATAR_MAX_SIZE'	=> "9000",	
			'Fb_App_ID' => '298627920311869',			// Demo.haiinteractive.com
			'Fb_URL' => 'http://demo.haiinteractive.com/musicestore',	// Demo.haiinteractive.com
			'avatar_thumb_path' => '/home3/rightern/public_html/demo/musicestore/images/avatar/',		
			'avatar_thumb_url' => 'http://demo.haiinteractive.com/musicestore/images/avatar/',
			'song_url' => 'http://demo.haiinteractive.com/musicestore/images/',
			

/*			'Fb_App_ID' => '1468178786757324',			// Demo.localhost.com
			'Fb_URL' => 'http://demo.locahost.com/musicestore',	// Demo.localhost.com
			'avatar_thumb_path' => 'C:/wamp/www/Hai_interactive/demo/musicestore/images/avatar/',
			'avatar_thumb_url' => 'http://demo.localhost.com/musicestore/images/avatar/',
			'song_url' => 'http://demo.localhost.com/musicestore/images/',
*/
		),
);
