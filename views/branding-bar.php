<?php
/**
 * @var string $menu The fully render wp nav menu
 */

// Don't output the branding bar if the menu is not set.
if ( ! $menu ) {
	return;
}

?>
<nav
	id="cunybar"
	class="cuny-branding-bar"
	aria-label="<?php _e( 'CUNY Graduate School of Journalism inter-website navigation', 'tribe' ); ?>"
	itemtype="https://schema.org/SiteNavigationElement"
	itemscope
>
	<h1 class="cuny-branding-bar__logo">
		<a href="https://www.journalism.cuny.edu/">
			<span class="visually-hide"><?php _e( 'CUNY Graduate School of Journalism', 'tribe' ); ?></span>
		</a>
	</h1>

	<button
		id="cunybar__toggle"
		class="cuny-branding-bar__toggle"
		aria-controls="cunybar__menu"
		aria-expanded="false"
		aria-haspopup="true"
		aria-label="<?php _e( 'Toggle Sites Menu' , 'tribe' ); ?>"
	>
		<?php _e( 'Sites' , 'tribe' ); ?>
	</button>

	<div id="cunybar__menu" class="cuny-branding-bar__menu" aria-hidden="true">
		<?php echo $menu; ?>
	</div>
</nav>