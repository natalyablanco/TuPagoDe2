<?php


return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
		

		// Application components
		'components' => array(

			// Database
			'db' => array(
				'connectionString' => 'mysql:host=localhost;dbname=db_test',
				'username' => 'root',
				'password' => 'tupagode',
			),

			// Fixture Manager for testing
			'fixture' => array(
				'class' => 'system.test.CDbFixtureManager',
			),

			// URL Manager
			'urlManager' => array(
				'showScriptName' => true,
			),

			// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, trace, info',
					),
					// Show log messages on web pages
					array(
						'class' => 'CWebLogRoute',
						//'categories' => 'system.db.CDbCommand',		//queries
						'levels' => 'error, warning',
					),
				),
			),

		),

	)
	
);