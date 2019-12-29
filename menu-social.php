<?php
/* Social Icons inside of a Custom Menu */
/* This uses the method in the tutorial "Social nav menus: Part 2" by Justin Tadlock */
/* using the Themify icons for the social icons */
/* http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2 */

if( has_nav_menu( 'social_profiles' ) ) {
	wp_nav_menu(
		array(
			'theme_location' => 'social_profiles',
			'container' => 'div',
			'container_id' => 'menu-social',
			'container_class' => 'menu',
			'menu_id' => 'menu-social-items',
			'menu_class' => 'menu-items',
			'depth' => 1,
			'link_before' => '<span class="screen-reader-text">',
			'link_after' => '</span>',
			'fallback_cb' => '',
		)
	);
}

?>