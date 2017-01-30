<?php


namespace CUNY\Branding_Bar;


class Admin_Display_Title_Attribute_Field {

	public function add_filter() {
		add_filter( 'get_user_option_managenav-menuscolumnshidden', [ $this, 'filter_hidden_fields' ], 10, 1 );
	}

	public function filter_hidden_fields( $fields ) {
		if ( ! is_array( $fields ) ) {
			return $fields;
		}
		$location = array_search( 'title-attribute', $fields );
		if ( $location !== false ) {
			unset( $fields[ $location ] );
		}
		return $fields;
	}
}