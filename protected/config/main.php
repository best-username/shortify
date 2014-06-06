<?php

define(DS, DIRECTORY_SEPARATOR);

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'runtimePath' => dirname(__FILE__) . '/../../runtime',
    'name' => 'Shortify - сервис коротких урлов',

    'preload' => array(
		'log'
	),

    'aliases' => array(
        'bootstrap' => realpath(dirname(__FILE__) . '/../extensions/bootstrap')
    ),
    
    // autoloading model and component classes
    'import' => array(
        'application.components.*',
		'application.controllers.*',
        'bootstrap.helpers.TbHtml',
		'application.modules.user.models.User',
		'application.modules.user.components.*'
    ),

    'modules' => array(
		'gii'=>array(
            'class' => 'system.gii.GiiModule',
            'password'=> '123',
        ),
		'users' => array(
			'class' => 'application.modules.users.UsersModule'
		),
	    'urls' => array(
			'class' => 'application.modules.urls.UrlsModule'
		),
    ),

    // application components
    'components' => array(
        'user' => array(
			'class' => 'application.modules.users.components.WebUser',
            'allowAutoLogin' => true,
			'loginUrl' =>array('backend/login'),
        ),

		'authManager' => array(
			'class' => 'PhpAuthManager',
			'defaultRoles' => array('guest'),
		),
		
		'session' => array(
			'class' => 'CDbHttpSession',
			'connectionID' => 'db',
			'sessionTableName' => 'session',
			'autoCreateSessionTable' => true,
		),
		
		'request' => array(
			'enableCsrfValidation' => strpos($_SERVER['REQUEST_URI'], 'backend') != -1 ? false : true,
		),
		
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => file_exists(dirname(__FILE__) . '/db.php') ? require_once dirname(__FILE__) . '/routes.php' : array(),
        ),

		// Параметры подключения к БД. Вынесены в отдельный файл db.php
        'db' => file_exists(dirname(__FILE__) . '/db.php') ? require_once dirname(__FILE__) . '/db.php' : array(),
		
		// Обработчик ошибок
        'errorHandler' => array(
            'errorAction' => 'frontend/error',
        ),
		
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
				array(
					// направляем результаты профайлинга в ProfileLogRoute (отображается
					// внизу страницы)
					'class' => 'CProfileLogRoute',
					'levels' => 'profile',
					'enabled' => true,
				),	
				array(
					'class' => 'CWebLogRoute',
					'categories' => 'application',
					'levels'=>'error, warning, trace, profile, info',
				),			
            ),
        ),
		
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),

		'cache' => array(
			'class' => 'system.caching.CFileCache',
		)
	),

    'params' => array(
		'cacheTTL' => 300,
	    'hostname' => 'http://example.com'
	),
);
