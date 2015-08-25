<?php
//
// Include all custom post types here (one custom post type per file)
//
add_action('after_setup_theme', 'ci_load_custom_post_type_files');
if( !function_exists('ci_load_custom_post_type_files') ):
function ci_load_custom_post_type_files()
{
	$cpt_files = apply_filters('load_custom_post_type_files', array(
		'functions/post_types/personnel',
		'functions/post_types/service',
		'functions/post_types/gallery',
		'functions/post_types/slider'
	));
	foreach($cpt_files as $cpt_file) get_template_part($cpt_file);
}
endif;


add_action( 'init', 'ci_tax_create_taxonomies');
if( !function_exists('ci_tax_create_taxonomies') ):
function ci_tax_create_taxonomies() {
	//
	// Create all taxonomies here.
	//

	//
	// Gallery Taxonomy
	//
	$labels = array(
		'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'ci_theme' ),
		'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'ci_theme' ),
		'search_items'      => __( 'Search Gallery Categories', 'ci_theme' ),
		'all_items'         => __( 'All Gallery Categories', 'ci_theme' ),
		'parent_item'       => __( 'Parent Gallery Category', 'ci_theme' ),
		'parent_item_colon' => __( 'Parent Gallery Category:', 'ci_theme' ),
		'edit_item'         => __( 'Edit Gallery Category', 'ci_theme' ),
		'update_item'       => __( 'Update Gallery Category', 'ci_theme' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'ci_theme' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'ci_theme' ),
		'menu_name'         => __( 'Categories', 'ci_theme' ),
		'view_item'         => __( 'View Gallery Category', 'ci_theme' ),
		'popular_items'     => __( 'Popular Gallery Categories', 'ci_theme' ),
	);
	register_taxonomy( 'gallery-category', array( 'gallery' ), array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => _x( 'gallery-category', 'taxonomy slug', 'ci_theme' ) ),
	) );

	//
	// Personnel Taxonomy
	//
	$labels = array(
		'name'              => _x( 'Personnel Categories', 'taxonomy general name', 'ci_theme' ),
		'singular_name'     => _x( 'Personnel Category', 'taxonomy singular name', 'ci_theme' ),
		'search_items'      => __( 'Search Personnel Categories', 'ci_theme' ),
		'all_items'         => __( 'All Personnel Categories', 'ci_theme' ),
		'parent_item'       => __( 'Parent Personnel Category', 'ci_theme' ),
		'parent_item_colon' => __( 'Parent Personnel Category:', 'ci_theme' ),
		'edit_item'         => __( 'Edit Personnel Category', 'ci_theme' ),
		'update_item'       => __( 'Update Personnel Category', 'ci_theme' ),
		'add_new_item'      => __( 'Add New Personnel Category', 'ci_theme' ),
		'new_item_name'     => __( 'New Personnel Category Name', 'ci_theme' ),
		'menu_name'         => __( 'Categories', 'ci_theme' ),
		'view_item'         => __( 'View Personnel Category', 'ci_theme' ),
		'popular_items'     => __( 'Popular Personnel Categories', 'ci_theme' ),
	);
	register_taxonomy( 'personnel-category', array( 'personnel' ), array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => _x( 'personnel-category', 'taxonomy slug', 'ci_theme' ) ),
	) );

	//
	// Service Taxonomy
	//
	$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name', 'ci_theme' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'ci_theme' ),
		'search_items'      => __( 'Search Service Categories', 'ci_theme' ),
		'all_items'         => __( 'All Service Categories', 'ci_theme' ),
		'parent_item'       => __( 'Parent Service Category', 'ci_theme' ),
		'parent_item_colon' => __( 'Parent Service Category:', 'ci_theme' ),
		'edit_item'         => __( 'Edit Service Category', 'ci_theme' ),
		'update_item'       => __( 'Update Service Category', 'ci_theme' ),
		'add_new_item'      => __( 'Add New Service Category', 'ci_theme' ),
		'new_item_name'     => __( 'New Service Category Name', 'ci_theme' ),
		'menu_name'         => __( 'Categories', 'ci_theme' ),
		'view_item'         => __( 'View Service Category', 'ci_theme' ),
		'popular_items'     => __( 'Popular Service Categories', 'ci_theme' ),
	);
	register_taxonomy( 'service-category', array( 'service' ), array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => _x( 'service-category', 'taxonomy slug', 'ci_theme' ) ),
	) );

}
endif;


add_action('admin_enqueue_scripts', 'ci_load_post_scripts');
if( !function_exists('ci_load_post_scripts') ):
function ci_load_post_scripts($hook)
{
	//
	// Add here all scripts and styles, to load on all admin pages.
	//	

	
	if('post.php' == $hook or 'post-new.php' == $hook)
	{
		//
		// Add here all scripts and styles, specific to post edit screens.
		//
		wp_enqueue_media();
		ci_enqueue_media_manager_scripts();
		
		wp_enqueue_script( 'google-maps' );

	}
}
endif;

add_filter('request', 'ci_feed_request');
if( !function_exists('ci_feed_request') ):
function ci_feed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type'])){

		$qv['post_type'] = array();
		$qv['post_type'] = get_post_types($args = array(
	  		'public'   => true,
	  		'_builtin' => false
		));
		$qv['post_type'][] = 'post';
	}
	return $qv;
}
endif;
?>