<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';



switch (@$_SERVER["APPLICATION_ENV"]){
    case "dev":
        $config=dirname(__FILE__).'/protected/config/mode_development.php';
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',true);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
        break;
 
    case "test":
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',true);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
        $config=dirname(__FILE__).'/protected/config/mode_test.php';
        break;
		
	case "prod":
        // remove the following lines when in production mode
        defined('YII_DEBUG') or define('YII_DEBUG',false);
        // specify how many levels of call stack should be shown in each log message
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);
        $config=dirname(__FILE__).'/protected/config/mode_production.php';
        break;
}


require_once($yii);

Yii::createWebApplication($config)->run();

return array(
   'class' => 'CWebApplication',
   'config' => $config,
);
