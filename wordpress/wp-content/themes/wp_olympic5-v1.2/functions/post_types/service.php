<?php
//
// Service Post Type related functions.
//
add_action('init', 'ci_create_cpt_service');
add_action('admin_init', 'ci_add_cpt_service_meta');
add_action('save_post', 'ci_update_cpt_service_meta');

if( !function_exists('ci_create_cpt_service') ):
function ci_create_cpt_service() {
	$labels = array(
		'name'               => _x( 'Services', 'post type general name', 'ci_theme' ),
		'singular_name'      => _x( 'Service', 'post type singular name', 'ci_theme' ),
		'add_new'            => __( 'Add new', 'ci_theme' ),
		'add_new_item'       => __( 'Add new Service', 'ci_theme' ),
		'edit_item'          => __( 'Edit Service', 'ci_theme' ),
		'new_item'           => __( 'New Service', 'ci_theme' ),
		'view_item'          => __( 'View Service', 'ci_theme' ),
		'search_items'       => __( 'Search Services', 'ci_theme' ),
		'not_found'          => __( 'No Services found', 'ci_theme' ),
		'not_found_in_trash' => __( 'No Services found in the trash', 'ci_theme' ),
		'parent_item_colon'  => __( 'Parent Service:', 'ci_theme' )
	);

	$args = array(
		'labels'          => $labels,
		'singular_label'  => __( 'Service', 'ci_theme' ),
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'page',
		'hierarchical'    => false,
		'has_archive'     => false,
		'rewrite'         => array( 'slug' => _x( 'service', 'post type slug', 'ci_theme' ) ),
		'menu_position'   => 5,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'service' , $args );
}
endif;

if( !function_exists('ci_add_cpt_service_meta') ):
function ci_add_cpt_service_meta(){

}
endif;

if( !function_exists('ci_update_cpt_service_meta') ):
function ci_update_cpt_service_meta($post_id){


}
endif;

if( !function_exists('ci_add_cpt_service_meta_box') ):
function ci_add_cpt_service_meta_box(){

}
endif;

?>