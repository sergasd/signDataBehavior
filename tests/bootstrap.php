<?php

require_once(__DIR__ . '/../vendor/autoload.php');

// change the following paths if necessary
$yiit = __DIR__ . '/../vendor/yiisoft/yii/framework/yiit.php';
$config = __DIR__ . '/app/config/test.php';

require_once(__DIR__ . '/TestCase.php');

require_once($yiit);
Yii::createWebApplication($config);
