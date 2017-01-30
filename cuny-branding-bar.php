<?php

/*
Plugin Name: CUNY-J Branding Bar
Description: A branding bar and navigation menu from the CUNY Graduate School of Journalism.
Author: Modern Tribe
GitHub URI: moderntribe/cuny-branding-bar
Version: 1.0-alpha
*/

namespace CUNY\Branding_Bar;

use Pimple\Container;

add_action( 'plugins_loaded', function () {
	require_once __DIR__ . '/vendor/autoload.php';
	$container = new Container( [
		'plugin_file' => __FILE__,
		'version'     => '1.0-alpha',
	] );
	Branding_Bar_Plugin::init( $container );
	$container[ 'plugin' ] = Branding_Bar_Plugin::instance();
	do_action( 'cuny/branding_bar/init', $container[ 'plugin' ], $container );
}, 1, 0 );