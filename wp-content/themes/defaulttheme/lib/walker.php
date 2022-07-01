<?php

/**
 * Register walker for top menu
 */

class Top_Menu_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{

		//if ($depth == 0 && !empty(get_field('link_to_post', $item)[0])) {
		//	$output .= "<li class='" .  implode(" ", $item->classes) . " has-menu-post-link'>";
		//} else {
			$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
		//}

		if ($item->url && $item->url != '#') {
			if(in_array('menu-item-has-children', $item->classes)) {
				$output .= '<a aria-haspopup="true" aria-expanded="false" href="' . $item->url . '">';
			} else {
				$output .= '<a href="' . $item->url . '">';	
			}
		} else {
			$output .= '<span class="menu-title">';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

		if ($depth == 0 && $args->walker->has_children) {
			$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><rect width="16" height="16" fill="none"/><path fill="currentColor" d="M4.354,5.246a.5.5,0,0,1-.707,0L.354,1.954a.5.5,0,0,1,0-.707L1.246.354a.5.5,0,0,1,.707,0L4,2.4,6.046.353a.5.5,0,0,1,.707,0l.893.893a.5.5,0,0,1,0,.707Z" transform="translate(4 5)"/></svg>';
		}

		if ($depth == 0) {
			$output .= '<div class="menu-fixed-wrap"><div class="menu-translate"><div class="container">';
		}


		if ($depth == 0 && !empty($item->description)) {
			$output .= '<span class="menu-description">' . $item->description . '</span>';
		}

		// if ($depth == 0 && $args->walker->has_children && !empty(get_field('link_to_post', $item)[0])) {
		// 	$postID = get_field('link_to_post', $item)[0];

		// 	$output .= '<div class="menu-post-item">';
		// 	$output .= '<h3>Newsroom</h3>';
		// 	$output .= '<a href="' . get_permalink($postID) . '"><img src="' . get_the_post_thumbnail_url($postID) . '" loading=lazy/></a>';
		// 	$output .= '<p>' . get_the_excerpt($postID) . '</p>';
		// 	$output .= '<a href="' . get_permalink($postID) . '" class="menu-learn-more">Learn more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><rect width="16" height="16" fill="none"/><path d="M.745.419A.5.5,0,0,0,0,.855v6.29a.5.5,0,0,0,.745.436L6.336,4.436a.5.5,0,0,0,0-.872Z" transform="translate(9 4)" fill="#485fe0"/><rect width="10" height="2" rx="0.5" transform="translate(0 7)" fill="#485fe0"/></svg></a>';
		// 	$output .= '</div>';
		// }
	}

	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$classes = array('sub-menu');
		$class_names = implode(' ', $classes);

		if ($depth == 0) {
			$output .=  '<ul class="' . $class_names . '"><div class="sub-menu-left-wrap">';
		} else {
			$output .=  '<ul class="' . $class_names . '">';
		}
	}
	function end_lvl(&$output, $depth = 0, $args = array())
	{
		if ($depth == 0) {
			$output .=  '</div></ul>';
		} else {
			$output .=  '</ul>';
		}
	}

	function end_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{
		if ($depth == 0) {
			$output .= '</div></div></div>';
		}
	}
}
