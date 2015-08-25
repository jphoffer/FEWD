<?php
//
// Uncomment one of the following two. Their functions are in panel/generic.php
//
add_action('wp_enqueue_scripts', 'ci_enqueue_modernizr');
//add_action('wp_enqueue_scripts', 'ci_print_html5shim');


// This function lives in panel/generic.php
add_action('wp_footer', 'ci_print_selectivizr', 100);



add_action('init', 'ci_register_theme_scripts');
if( !function_exists('ci_register_theme_scripts') ):
function ci_register_theme_scripts()
{
	//
	// Register all scripts here, both front-end and admin. 
	// There is no need to register them conditionally, as the enqueueing can be conditional.
	//
	wp_register_script('jquery-mmenu', get_child_or_parent_file_uri('/js/jquery.mmenu.min.all.js'), array('jquery'), false, true);
	wp_register_script('jquery-flexslider-latest', get_child_or_parent_file_uri('/js/jquery.flexslider-min.js'), array('jquery'), false, true);
	wp_register_script('jquery-equalHeights', get_child_or_parent_file_uri('/js/jquery.equalHeights.js'), array('jquery'), false, true);
	wp_register_script('ci-admin-widgets', get_child_or_parent_file_uri('/js/admin/admin-widgets.js'), array('jquery'), CI_THEME_VERSION, true);
	wp_register_script('ci-front-scripts', get_child_or_parent_file_uri('/js/scripts.js'), array(
		'jquery',
		'jquery-mmenu',
		'jquery-superfish',
		'jquery-flexslider-latest',
		'jquery-fitVids'
	), CI_THEME_VERSION, true);

}
endif;



add_action('wp_enqueue_scripts', 'ci_enqueue_theme_scripts');
if( !function_exists('ci_enqueue_theme_scripts') ):
function ci_enqueue_theme_scripts()
{
	//
	// Enqueue all (or most) front-end scripts here.
	// They can be also enqueued from within template files.
	//	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if ( ci_setting( 'google_maps_api_enable' ) == 'on' ) {
		wp_enqueue_script( 'google-maps' );
	}

	//
	// Map options export for ci-front-scripts
	//
	$coords = explode(',', ci_setting('map_coords'));
	$params['map_zoom_level'] = ci_setting('map_zoom_level');
	$params['map_coords_lat'] = $coords[0];
	$params['map_coords_long'] = $coords[1];
	$params['map_tooltip'] = ci_setting('map_tooltip');

	//
	// Slider options export for ci-front-scripts
	//
	$params['slider_autoslide'] = ci_setting('slider_autoslide')=='enabled' ? true : false;
	$params['slider_effect'] = ci_setting('slider_effect');
	$params['slider_direction'] = ci_setting('slider_direction');
	$params['slider_duration'] = (string)ci_setting('slider_duration');
	$params['slider_speed'] = (string)ci_setting('slider_speed');


	wp_localize_script('ci-front-scripts', 'ThemeOption', $params);
	wp_enqueue_script('ci-front-scripts');


}
endif;


if( !function_exists('ci_enqueue_admin_theme_scripts') ):
add_action('admin_enqueue_scripts','ci_enqueue_admin_theme_scripts');
function ci_enqueue_admin_theme_scripts() 
{
	global $pagenow;

	//
	// Enqueue here scripts that are to be loaded on all admin pages.
	//

	if ( in_array( $pagenow, array( 'widgets.php', 'customize.php' ) ) ) {
		//
		// Widget pages (widgets.php, customize.php) specific scripts.
		//
		wp_enqueue_script('ci-admin-widgets');
		
		$params['no_posts_found'] = __('No posts found.', 'ci_theme');
		$params['ajaxurl'] = admin_url( 'admin-ajax.php' );

		$params['track_title'] = __('Day:', 'ci_theme');
		$params['track_subtitle'] = __('Hours:', 'ci_theme');
		$params['track_remove'] = __('Remove day', 'ci_theme');

		wp_localize_script('ci-admin-widgets', 'ThemeWidget', $params);
	}

	if(is_admin() and $pagenow=='themes.php' and isset($_GET['page']) and $_GET['page']=='ci_panel.php')
	{
		//
		// Enqueue here scripts that are to be loaded only on CSSIgniter Settings panel.
		//
	}
}
endif;

?>