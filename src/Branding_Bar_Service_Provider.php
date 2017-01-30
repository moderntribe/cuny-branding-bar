<?php


namespace CUNY\Branding_Bar;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class Branding_Bar_Service_Provider implements ServiceProviderInterface {
	public function register( Container $container ) {
		$this->register_menus( $container );
		$this->hook( $container );
	}

	private function hook( Container $container ) {
		add_action( 'after_setup_theme', function() use ( $container )  {
			$container[ 'nav.menu' ]->register();
		}, 10, 0 );
	}

	private function register_menus( Container $container ) {
		$container[ 'nav.menu.label' ] = __( 'CUNY-J Branding Bar', 'cuny' );
		$container[ 'nav.menu.key' ] = 'cunyj-branding-bar';
		$container[ 'nav.menu' ] = function( Container $container ) {
			return new Menu_Location( $container[ 'nav.menu.key' ], $container[ 'nav.menu.label' ] );
		};
	}
}