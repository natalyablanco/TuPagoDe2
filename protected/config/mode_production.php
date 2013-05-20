 <?php


return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
		
        'components'=>array(
		// Asset manager
			'assetManager' => array(
				'linkAssets' => true, // publish symbolic links for easier developing
			),
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),
            'wunit' => array(
                        'class' => 'WUnit'
            ),
            'db'=>array(
                        'connectionString' => 'mysql:host=localhost;dbname=db_prod',
                        'emulatePrepare' => true,
                        'username' => 'root',
                        'password' => 'tupagode',
                        'charset' => 'utf8',
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
						// Send errors via email to the system admin
						array(
							'class' => 'CEmailLogRoute',
							'levels' => 'error, warning',
							'emails' => 'webadmin@example.com',
						),
					),
				),
        ),
		'modules'=>array(
		// uncomment the following to enable the Gii tool
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'hola',
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('127.0.0.1','::1'),
			),
		/**/
		),

    )
	
);


