<?php

/**
	 * Autoload classes from package itself
	 *
	 * @since    1.0.1
	 */

spl_autoload_register( function($classname) {

    $class      =  strtolower($classname) ;
    $classpath  = plugin_dir_path(dirname(__FILE__)) . 'includes/class-' . $class . '.php';

    if ( file_exists( $classpath) ) {
        include_once $classpath;
    }

} );

require_once plugin_dir_path(dirname(__FILE__)) . 'vendor/autoload.php';
require_once plugin_dir_path(dirname(__FILE__)) . 'includes/functions.php';
