<?php


namespace CUNY\Branding_Bar;


use Pimple\Container;

class Branding_Bar_Plugin {
	/** @var static */
	private static $instance;
	/** @var Container */
	private $container;

	public function plugin_url( $path = '' ) {
		return plugins_url( $path, $this->container[ 'plugin_file' ] );
	}

	private function service_providers( Container $container ) {
		$container->register( new Branding_Bar_Service_Provider() );
	}

	private function libraries( Container $container ) {
		include( dirname( $this->container[ 'plugin_file' ] ) . '/vendor/facetwp/github-updater-lite/github-updater.php' );
	}

	/**
	 * Orchestrate hooking all the registered services
	 * into WordPress.
	 *
	 * @return void
	 */
	private function hooks( Container $container ) {
		add_action( 'after_setup_theme', function() use ( $container )  {
			$container[ 'nav.menu' ]->register();
		}, 10, 0 );
		add_action( 'wp_footer', function() use( $container ) {
			$container[ 'template.assets' ]->enqueue_css();
			echo $container[ 'template.renderer' ]->render( $container[ 'template.nav_menu_args' ] );
		}, 11, 0 );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public static function init( Container $container ) {
		$instance = self::instance();
		$instance->container = $container;
		$instance->service_providers( $container );
		$instance->libraries( $container );
		$instance->hooks( $container );
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