<?php


namespace CUNY\Branding_Bar;


class Branding_Bar_Renderer {
	private $template_dir = '';
	private $template_path;

	public function __construct( $template_dir ) {
		$this->template_dir = untrailingslashit( $template_dir );
	}

	public function render( $args = [] ) {
		$template = $this->get_template_path();
		$args = wp_parse_args( $args, [

		] );
		$args[ 'echo' ] = false;
		$menu = wp_nav_menu( $args );
		ob_start();
		include( $template );
		return ob_get_clean();
	}

	public function get_template_path() {
		if ( ! isset( $this->template_path ) ) {
			$this->template_path = locate_template( 'cuny/branding-bar.php', false, false );
			if ( empty( $this->template_path ) ) {
				$this->template_path = $this->template_dir . '/branding-bar.php';
			}
		}
		return $this->template_path;
	}
}