/**
 * CUNY Branding Bar Plugin Scripts
 */

jQuery(function($) {

	initCunyBar($);

	/**
	 * Initialize the CUNY Branding bar scripts.
	 */
	function initCunyBar($) {

		var cunybar = document.getElementById('cunybar');

		// If the cuny bar isn't loaded, there's nothing to do.
		if(!cunybar) {
			return;
		}

		var $cunybar = $(cunybar);
		var $toggle  = $('#cunybar__toggle');
		var $menu    = $('#cunybar__menu');
		var state    = {
			mobile_breakpoint: 960,
			is_mobile: false,
			v_height: 0,
			v_width: 0,
		};

		/**
		 * Update the state object on resize.
		 *
		 * @type {Function}
		 */
		var resize = debounce(function(){
			setState();

			if (state.is_mobile) {
				hideMenu();
			} else {
				showMenu();
			}
		}, 200);

		// Set initial viewport states
		setState();

		// handle resize
		$(window).resize(resize);

		// handle desktop state initially
		if ( ! state.is_mobile ) {
			showMenu();
		}

		// handle toggle button
		$toggle.click(toggleMenu);

		function toggleMenu() {
			if($cunybar.hasClass('cuny-branding-bar--active')) {
				hideMenu();
			} else {
				showMenu();
			}
		}

		function showMenu() {
			$cunybar.addClass('cuny-branding-bar--active');
			$menu.attr('aria-hidden', 'false');
			$toggle.attr('aria-expanded', 'true');
		}

		function hideMenu() {
			$cunybar.removeClass('cuny-branding-bar--active');
			$menu.attr('aria-hidden', 'true');
			$toggle.attr('aria-expanded', 'false');
		}

		/**
		 * Set the state values on init and resize
		 */
		function setState() {
			state.v_height = document.body.clientHeight;
			state.v_width = document.body.clientWidth;
			state.is_mobile = (state.v_width < state.mobile_breakpoint);
		}

		/**
		 * Simple debounce function from underscores.js
		 *
		 * @param func
		 * @param wait
		 * @param immediate
		 * @returns {Function}
		 */
		function debounce(func, wait, immediate) {
			var timeout;
			return function() {
				var context = this, args = arguments;
				var later = function() {
					timeout = null;
					if (!immediate) func.apply(context, args);
				};
				var callNow = immediate && !timeout;
				clearTimeout(timeout);
				timeout = setTimeout(later, wait);
				if (callNow) func.apply(context, args);
			};
		}
	}
});