<?php

/*
Plugin Name: CUNY-J Branding Bar
Description: A branding bar and navigation menu from the CUNY Graduate School of Journalism.
Author: Modern Tribe
GitHub URI: moderntribe/cuny-branding-bar
Version: 1.0
*/

namespace CUNY\Branding_Bar;
use Pimple\Container;

add_action( 'plugins_loaded', function() {
	require_once __DIR__ . '/vendor/autoload.php';
	$container = new Container( [
		'plugin_file' => __FILE__,
	]);
	Branding_Bar_Plugin::init( $container );
	do_action( 'cuny/branding_bar/init', Branding_Bar_Plugin::instance(), $container );
}, 1, 0 );