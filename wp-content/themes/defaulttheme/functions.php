<?php

require('lib/menus.php');
require('lib/functions-acf.php');

/**
 * Load the Zuid code library:
 * - /lib/helpers.php
 * - /lib/setup.php
 * - /lib/shortcodes.php
 * - /lib/walker.php
 * - /lib/products.php
 */
array_map(function ($file) {
	$file = "lib/{$file}.php";
	if (!$filepath = locate_template($file)) {
		trigger_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'zuid'), $file), E_USER_ERROR);
	}
	require_once $filepath;
}, ['helpers', 'setup', 'shortcodes', 'walker', 'custom-post-type']);

/**
 * Add admin/admin.css to backend
 */
function admin_style()
{
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

/**
 * Svg support
 * Don't forget to sanitize svg: http://svg.enshrined.co.uk/
 */
function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/**
 * Add preload class to body_class()
 * (no animations on load)
 */
function wp_body_classes( $classes ) {
	$classes[] = 'preload';

	return $classes;
}
add_filter( 'body_class','wp_body_classes' );


/**
 * Don't show admin bar in development
 */
if (strpos($_SERVER['SERVER_NAME'], '.test')) {
	show_admin_bar(false);
}

// Advanced custom fields Option page
if( function_exists('acf_add_options_sub_page') ) {
	// Add parent.
	$parent = acf_add_options_page(array(
			'page_title'  => __('Default'),
			'menu_title'  => __('Theme Options'),
			'redirect'    => false,
	));

	// Add sub page.
	$child = acf_add_options_sub_page(array(
		'page_title'  => __('Header'),
		'menu_title'  => __('Header'),
		'parent_slug' => $parent['menu_slug'],
	));

	$child = acf_add_options_sub_page(array(
		'page_title'  => __('Footer'),
		'menu_title'  => __('Footer'),
		'parent_slug' => $parent['menu_slug'],
	));

	$child = acf_add_options_sub_page(array(
		'page_title'  => __('Sidebars'),
		'menu_title'  => __('Sidebars'),
		'parent_slug' => $parent['menu_slug'],
	));
}

//Custom menu area
function wpb_custom_new_menu() {
	register_nav_menu('copyright-menu',__( 'Copyright menu' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );

// //Remove JS and CSS types
// add_action( 'template_redirect', function(){
// 	ob_start( function( $buffer ){
// 		$buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'", 'type="text/css"', "type='text/css'" ), '', $buffer );
	
// 		return $buffer;
// 	});
// });

function get_the_content_blocks($post_id, $type, $path) {
	// all content blocks
	$content_blocks = get_field($type, $post_id);

	if($content_blocks) {
		// loop over them with key => value
		foreach ($content_blocks as $key => $contentblock) {
			// decide which layout is being used
			if($contentblock['acf_fc_layout']) {
				get_template_part($path . $contentblock['acf_fc_layout'] , null, [
					'content' => $contentblock
				]);
			}
		}
	}
}

/* FOOTER WIDGET ZONES */
function init_widget_zones() {

    // First footer widget area, located in the footer. Empty by default.
  	register_sidebar(array(
    	'name' => 'Footer area 1',
		'id' => 'footer-area-1',
		'before_widget' => '<div class="widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<strong>',
		'after_title' => '</strong>',
	) );

    // Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => 'Footer area 2',
		'id' => 'footer-area-2',
		'before_widget' => '<div class="widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<strong>',
		'after_title' => '</strong>',
	) );
  }
// Register sidebars by running init_widget_zones() on the widgets_init hook.
add_action( 'widgets_init', 'init_widget_zones' );

/**
 * WCAG 2.0 Attributes for Dropdown Menus
 *
 * Adjustments to menu attributes tot support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @ref https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function wcag_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

    // Add [aria-haspopup] and [aria-expanded] to menu items that have children
    $item_has_children = in_array( 'menu-item-has-children', $item->classes );
    if ( $item_has_children ) {
        $atts['aria-haspopup'] = "true";
        $atts['aria-expanded'] = "false";
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'wcag_nav_menu_link_attributes', 10, 4 );

function wp_get_menu_array() {
	$args = array (
		'order'                  => 'ASC',                  // List ASCending or DESCending
		'orderby'                => 'menu_order',                // Order by your usual, menu_order, post_title, etc. Check WP_Query
		'post_type'              => 'nav_menu_item',        // To be honest, I'm not sure why this is an option, leave it be.
		'post_status'            => 'publish',              // If there are private / draft posts in our menu, don't show them
		'output'                 => ARRAY_A,                // Return an Array of Objects
		'output_key'             => 'menu_order',           // Not sure what this does
		'nopaging'               => true,                   // Not sure what this does
		'update_post_term_cache' => false 
	);
	
	$array_menu = wp_get_nav_menu_items('Hoofdnavigatie', $args);

	$menu = array();
	if ($array_menu) {
		foreach ($array_menu as $m) {
			if (empty($m->menu_item_parent)) {
				$menu[$m->ID] = array();
				$menu[$m->ID]['ID']      	 =   $m->ID;
				$menu[$m->ID]['title']       =   $m->title;
				$menu[$m->ID]['url']         =   $m->url;
				$menu[$m->ID]['children']    =   array();
				$menu[$m->ID]['order']		 = 	 $m->menu_order;
			}
		}
		$submenu = array();
		foreach ($array_menu as $m) {
			if ($m->menu_item_parent) {
				$submenu[$m->ID] = array();
				$submenu[$m->ID]['ID']       =   $m->ID;
				$submenu[$m->ID]['title']    =   $m->title;
				$submenu[$m->ID]['url']  	 =   $m->url;
				$submenu[$m->ID]['order']	 =   $m->menu_order;
				$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
			}
		}
	}
	
	return $menu;
}

function reset_editor() {
     global $_wp_post_type_features;

     $post_type="page";
     $feature = "editor";
     if ( !isset($_wp_post_type_features[$post_type]) ) {
     } elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     unset($_wp_post_type_features[$post_type][$feature]);
}
add_action("init","reset_editor");



function getNevigationData ($dat) {
	$menuLocations = get_nav_menu_locations();
	$menuID = $menuLocations[$dat];
	$thisNav = wp_get_nav_menu_items($menuID);
	foreach ( $thisNav as $navItem ) {
		echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
	}
}


