<?php
 require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';
\ActiveRecord\Config::initialize( function ( $cfg ) {
	$cfg->set_model_directory( '/' );
	$cfg->set_connections(
		array(
			'development' => 'mysql://root:root@localhost/slv_db',
			'production'  => 'mysql://username:password@localhost/production_database_name'
		)
	);
	$cfg->set_default_connection('development');
} );