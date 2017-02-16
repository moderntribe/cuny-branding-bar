<?php


namespace CUNY\Branding_Bar;


class Branding_Bar_Assets {
	private $version = '';

	/** @var Branding_Bar_Plugin */
	private $plugin;

	public function __construct( $version, Branding_Bar_Plugin $plugin ) {
		$this->version = $version;
		$this->plugin = $plugin;
	}

	public function enqueue_css() {
		wp_enqueue_style( 'cuny-branding-bar', $this->plugin->plugin_url( 'assets/css/cuny-branding-bar.css' ), [], $this->version, 'all' );
	}

	public function enqueue_js() {
		wp_enqueue_script( 'cuny-branding-bar', $this->plugin->plugin_url( 'assets/js/cuny-branding-bar.js' ), ['jquery'], $this->version, true );
	}
}