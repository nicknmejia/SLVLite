<?php
 require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';
\ActiveRecord\Config::initialize( function ( $cfg ) {
	$cfg->set_model_directory( '/' );
	$cfg->set_connections(
		array(
			'sqlite' => 'sqlite://db/SLVL.db',
		)
	);
	$cfg->set_default_connection('sqlite');
} );