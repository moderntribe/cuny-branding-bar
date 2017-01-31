<?php


namespace CUNY\Branding_Bar;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class Branding_Bar_Service_Provider implements ServiceProviderInterface {
	public function register( Container $container ) {
		$this->register_menus( $container );
		$this->register_templates( $container );
	}

	private function register_menus( Container $container ) {
		$container[ 'nav.menu.label' ] = __( 'CUNY-J Branding Bar', 'cuny' );
		$container[ 'nav.menu.key' ] = 'cunyj-branding-bar';
		$container[ 'nav.menu' ] = function( Container $container ) {
			return new Menu_Location( $container[ 'nav.menu.key' ], $container[ 'nav.menu.label' ] );
		};
		$container[ 'nav.description' ] = function( Container $container ) {
			return new Admin_Display_Description_Field();
		};
	}

	private function register_templates( Container $container ) {
		$container[ 'template.dir' ] = function ( Container $container ) {
			return dirname( $container[ 'plugin_file' ] ) . '/views';
		};
		$container[ 'template.renderer' ] = function( Container $container ) {
			return new Branding_Bar_Renderer( $container[ 'template.dir' ] );
		};
		$container[ 'template.nav_menu_args' ] = function( Container $container ) {
			return [
				'theme_location' => $container[ 'nav.menu.key' ],
			];
		};
		$container[ 'template.assets' ] = function( Container $container ) {
			return new Branding_Bar_Assets( $container[ 'version' ], $container[ 'plugin' ] );
		};
	}
}