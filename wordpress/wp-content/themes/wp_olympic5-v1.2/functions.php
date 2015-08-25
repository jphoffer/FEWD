<?php 
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 900;

	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');

	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 480, 360, true );
	add_image_size( 'homepage_slider', 1920, 550, true);
	add_image_size( 'blog_thumb', 800, 350, true);
	add_image_size( 'main_thumb', 700, 504, true);

	//
	// Add fancybox support.
	//
	add_fancybox_support();

	//
	// Use HTML5 on galleries
	//
	add_theme_support( 'html5', array( 'gallery' ) );

?>