<?php

ini_set('date.timezone', 'Asia/Novosibirsk');

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../libs/framework/yii.php';
$config = dirname(__FILE__) . '/../protected/config/main.php';

require_once($yii);
Yii::createWebApplication($config)->run();
