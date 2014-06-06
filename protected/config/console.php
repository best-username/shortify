<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'runtimePath' => dirname(__FILE__) . '/../../runtime',

    'commandMap' => array(
	'migrate' => array(
	    'class' 		=> 'system.cli.commands.MigrateCommand',
	    'migrationPath' 	=> 'application.migrations',
	    'migrationTable' 	=> 'migrations',
	    'connectionID'	=> 'db',
    )),

    'components' => array(
	// Параметры подключения к БД. Вынесены в отдельный файл db.php
        'db' => file_exists(dirname(__FILE__) . '/db.php') ? require_once dirname(__FILE__) . '/db.php' : array(),
		
    ),

    'params' => array(
	'cacheTTL' => 300,
        'hostname' => 'http://short.local'
    ),
);
