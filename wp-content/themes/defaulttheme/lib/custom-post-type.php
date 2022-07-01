<?php
/**
 * Create CPT Customer Stories
 */

// Function Nieuws Post Type
function create_nieuws_cpt()
{
	$labels = array(
		'name' => _x('Nieuws', 'Post Type General Name', 'zuid'),
		'singular_name' => _x('Nieuws', 'Post Type Singular Name', 'zuid'),
		'menu_name' => _x('Nieuws', 'Admin Menu text', 'zuid'),
		'name_admin_bar' => _x('Nieuws', 'Add New on Toolbar', 'zuid'),
		'archives' => __('Nieuws Archief', 'zuid'),
		'attributes' => __('Nieuws Attributen', 'zuid'),
		'parent_item_colon' => __('Hoofd Nieuws:', 'zuid'),
		'all_items' => __('Alle Nieuws', 'zuid'),
		'add_new_item' => __('Nieuws toevoegen', 'zuid'),
		'add_new' => __('Nieuw Nieuws', 'zuid'),
		'new_item' => __('Nieuws toevoegen', 'zuid'),
		'edit_item' => __('Bewerken Nieuws', 'zuid'),
		'update_item' => __('Bijwerken Nieuws', 'zuid'),
		'view_item' => __('Nieuws bekijken', 'zuid'),
		'view_items' => __('Nieuws bekijken', 'zuid'),
		'search_items' => __('Zoeken Nieuws', 'zuid'),
		'not_found' => __('Geen Nieuws gevonden.', 'zuid'),
		'not_found_in_trash' => __('Geen Nieuws gevonden in de prullenbak.', 'zuid'),
		'featured_image' => __('Uitgelichte afbeelding', 'zuid'),
		'set_featured_image' => __('Uitgelichte afbeelding instellen', 'zuid'),
		'remove_featured_image' => __('Uitgelichte afbeelding verwijderen', 'zuid'),
		'use_featured_image' => __('Uitgelichte afbeelding instellen', 'zuid'),
		'insert_into_item' => __('Invoegen in Nieuws', 'zuid'),
		'uploaded_to_this_item' => __('Geüpload naar dit Nieuws', 'zuid'),
		'items_list' => __('Nieuws Lijst', 'zuid'),
		'items_list_navigation' => __('Nieuws Lijst navigatie', 'zuid'),
		'filter_items_list' => __('Filter Nieuws Lijst', 'zuid'),
	);
	$args = array(
		'label' => __('nieuws', 'zuid'),
		'description' => __('Post Type Description', 'zuid'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
		'menu_icon' => 'dashicons-tag',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'query_var' => 'nieuws',
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'rewrite' => array('slug' => ''),
	);
	register_post_type('nieuws', $args);
}
add_action('init', 'create_nieuws_cpt', 0);


// Function Nieuws Post Type Taxonomy
function custom_post_type_nieuws_taxonomy() {
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );
  register_taxonomy('nieuwstypes',array('nieuws'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'nieuwstypes' ),
  ));
}
add_action( 'init', 'custom_post_type_nieuws_taxonomy', 0 );