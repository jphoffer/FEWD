<?php

register_nav_menus( array(
	'ci_main_menu' => __('Main Menu', 'ci_theme'),
));

// Remove page parent from custom post type
// page_css_class filter applies to wp_page_menu()
// nav_menu_css_class applies to wp_nav_menu()
add_filter('page_css_class', 'remove_cpt_parent_class');
add_filter('nav_menu_css_class', 'remove_cpt_parent_class');
function remove_cpt_parent_class($classes)
{
	if( is_single() and in_array(get_post_type(), array('galleries')) )
		return array_filter($classes, 'cpt_remove_parent_classes_callback');
	else
		return $classes;
}

function cpt_remove_parent_classes_callback($class)
{
	// check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor') ? FALSE : TRUE;
}

?>