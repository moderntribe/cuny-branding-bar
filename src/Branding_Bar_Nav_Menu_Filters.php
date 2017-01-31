<?php

namespace CUNY\Branding_Bar;

/**
 * Class Nav_Attribute_Filters
 *
 * Filters the attributes applied to HTML elements in a nav menu
 */
class Branding_Bar_Nav_Menu_Filters {
	private $menu_location = null;

	public function __construct( $menu_location = '' ) {
		$this->menu_location = $menu_location;
	}

	public function add_filters() {
		add_filter( 'nav_menu_item_title', [ $this, 'customize_nav_menu_item_title' ], 10, 4 );
	}

	/**
	 * Check that the filters only apply to the menu locations we want them to.
	 * @param $location
	 *
	 * @return bool
	 */
	public function is_branding_bar_location( $location ) {
		return $location === $this->menu_location;
	}

	/**
	 * Remove the ID attributed from the nav item
	 *
	 * @param string    $title The menu item's title.
	 * @param \WP_Post  $item  The current menu item.
	 * @param \stdClass $args  An object of wp_nav_menu() arguments.
	 * @param int       $depth Depth of menu item. Used for padding.
	 * @return string
	 */
	public function customize_nav_menu_item_title( $title, $item, $args, $depth ) {
		if ( $this->is_branding_bar_location( $args->theme_location ) && ! empty( $item->description ) ) {
			$title = sprintf(
				'<span class="cuny-branding-bar__item-label" aria-hidden="true">%s</span><span class="cuny-branding-bar__item-description">%s</span>',
				$title,
				esc_html( $item->description )
			);
		}

		return $title;
	}
}
