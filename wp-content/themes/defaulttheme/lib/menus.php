<?php
//
// Desktop Menu's
//------------------------------------------------------------------------------
/**
 * Top navigation
*/
add_action('top_navigation', function() {
	if (has_nav_menu('primary')) {
		return wp_nav_menu([
			'theme_location' => 'primary',
			'menu_id' 		 => 'menu-top-menu',
			'menu_class'     => 'menu menu--horizontal',
			'container'      => false,
		]);
	}
}, 10);

/**
 * Top secondary navigation
*/
add_action('top_secondary_navigation', function() {
	if (has_nav_menu('secondary')) {
		return wp_nav_menu([
			'theme_location' => 'secondary',
			'menu_id'		 => 'menu-top-secondary-menu',
			'menu_class'     => 'menu menu--horizontal theme-font',
			'container'      => false
		]);
	}
}, 10);

/**
 * Top secondary navigation
*/
add_action('footer_navigation', function() {
	if (has_nav_menu('footer_navigation')) {
		return wp_nav_menu([
			'theme_location' => 'footer_navigation',
			'menu_id'		 => 'menu-top-secondary-menu',
			'menu_class'     => 'menu',
			'container'      => false
		]);
	}
}, 10);

//
// Mobile menu's
//------------------------------------------------------------------------------
/**
 * Top navigation
*/
add_action('top_navigation--mobile', function() {
	if (has_nav_menu('primary')) {
		return wp_nav_menu([
			'theme_location' => 'primary',
			'menu_id' 		 => 'menu-top-menu',
			'menu_class'     => 'menu__mobile',
			'container'      => false,
		]);
	}
}, 10);

/**
 * Top secondary navigation
*/
add_action('top_secondary_navigation--mobile', function() {
	if (has_nav_menu('secondary')) {
		return wp_nav_menu([
			'theme_location' => 'secondary',
			'menu_id'		 => 'menu-top-secondary-menu',
			'menu_class'     => 'menu__mobile-secondary',
			'container'      => false
		]);
	}
}, 10);

/**
 * Top secondary navigation
*/
add_action('footer_navigation--mobile', function() {
	if (has_nav_menu('footer_navigation')) {
		return wp_nav_menu([
			'theme_location' => 'footer_navigation',
			'menu_id'		 => 'menu-top-secondary-menu',
			'menu_class'     => 'menu',
			'container'      => false
		]);
	}
}, 10);