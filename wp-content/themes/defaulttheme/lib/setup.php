<?php

namespace Zuid\Setup;

/**
 * Register some useful constants
 */
define('THEMEDIR', get_template_directory_uri());
define('ASSETDIR', THEMEDIR . '/assets');
define('DISTDIR', THEMEDIR . '/dist');

/**
 * Theme setup
 */
function theme_setup()
{
	// Make theme available for translation
	load_theme_textdomain('zuid', get_template_directory() . '/lang');

	// Add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support('post-thumbnails');

	// Enable plugins to manage the document title
	add_theme_support('title-tag');

	// Enable support for Post Formats
	// add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));

	// Enable support for HTML5 markup
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

	// Add post type support excerpt
	add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', __NAMESPACE__ . '\\theme_setup');

/**
 * Register assets
 */
function register_assets()
{
	// Scripts
	wp_enqueue_script(
		'main-scripts',
		get_template_directory_uri() . '/dist/scripts/main.js',
		array('jquery'),
		filemtime(get_template_directory() . '/dist/scripts/main.js'),
		true
	);

	// Styles
	wp_enqueue_style(
		'main-styles',
		get_template_directory_uri() . '/dist/styles/main.css',
		array(),
		filemtime(get_template_directory() . '/dist/styles/main.css')
	);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_assets');

/**
 * Register menus
 */
register_nav_menus(array(
	'primary' => __('Top Menu', 'zuid'),
	'secondary' => __('Secundair menu', 'zuid'),
	'footer_navigation' => __('Footer navigation', 'zuid'),
));

/**
 * Register custom image sizes
 */
function add_image_sizes()
{
	// Example custom image size
	// add_image_size('featured', '350', '200', true);
}
add_action('init', __NAMESPACE__ . '\\add_image_sizes');

/**
 * Register sidebar and widget areas
 */
function widgets_init()
{
	register_sidebar(array(
		'name' => __('Primary Sidebar', 'zuid'),
		'id' => 'primary-sidebar',
		'description' => 'Widgets displayed in the blog sidebar.',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('Footer Widgets', 'zuid'),
		'id' => 'footer-widgets',
		'description' => 'Select up to three widgets for display in the footer.',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Remove jQuery migrate
 */
function remove_jquery_migrate($scripts)
{
	if (!is_admin() && isset($scripts->registered['jquery'])) {
		$script = $scripts->registered['jquery'];

		if ($script->deps) { // Check whether the script has any dependencies
			$script->deps = array_diff($script->deps, array(
				'jquery-migrate'
			));
		}
	}
}
add_action('wp_default_scripts', __NAMESPACE__ . '\\remove_jquery_migrate');

/**
 * Deque gutenberg styling
 */
function remove_block_css()
{
	wp_dequeue_style('wp-block-library'); // Wordpress core
	wp_dequeue_style('wp-block-library-theme'); // Wordpress core
	wp_dequeue_style('wc-block-style'); // WooCommerce
	wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\remove_block_css');
