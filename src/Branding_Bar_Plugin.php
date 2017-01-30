<?php


namespace CUNY\Branding_Bar;


use Pimple\Container;

class Branding_Bar_Plugin {
	/** @var static */
	private static $instance;
	/** @var Container */
	private $container;

	private function service_providers() {
		$this->container->register( new Branding_Bar_Service_Provider() );
	}

	private function libraries() {
		include( dirname( $this->container[ 'plugin_file' ] ) . '/vendor/facetwp/github-updater-lite/github-updater.php' );
	}

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
		$instance->service_providers();
		$instance->libraries();
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