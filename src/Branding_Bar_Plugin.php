<?php


namespace CUNY\Branding_Bar;


use Pimple\Container;

class Branding_Bar_Plugin {
	/** @var static */
	private static $instance;
	/** @var Container */
	private $container;

	/**
	 * Hook into WordPress
	 *
	 * @return void
	 */
	private function hooks() {

	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public static function init( Container $container ) {
		$instance = self::instance();
		$instance->container = $container;
		$instance->hooks();
	}
	/**
	 * Get the global instance of the class
	 *
	 * @return static
	 */
	public static function instance() {
		if ( empty( static::$instance ) ) {
			static::$instance = new static();
		}
		return static::$instance;
	}
}