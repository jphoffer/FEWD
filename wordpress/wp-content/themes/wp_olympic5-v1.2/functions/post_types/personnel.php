<?php
//
// Personnel Post Type related functions.
//
add_action('init', 'ci_create_cpt_personnel');
add_action('admin_init', 'ci_add_cpt_personnel_meta');
add_action('save_post', 'ci_update_cpt_personnel_meta');

if( !function_exists('ci_create_cpt_personnel') ):
function ci_create_cpt_personnel() {
	$labels = array(
		'name'               => _x( 'Personnel', 'post type general name', 'ci_theme' ),
		'singular_name'      => _x( 'Personnel', 'post type singular name', 'ci_theme' ),
		'add_new'            => __( 'Add New', 'ci_theme' ),
		'add_new_item'       => __( 'Add New Personnel', 'ci_theme' ),
		'edit_item'          => __( 'Edit Personnel', 'ci_theme' ),
		'new_item'           => __( 'New Personnel', 'ci_theme' ),
		'view_item'          => __( 'View Personnel', 'ci_theme' ),
		'search_items'       => __( 'Search Personnel', 'ci_theme' ),
		'not_found'          => __( 'No Personnel found', 'ci_theme' ),
		'not_found_in_trash' => __( 'No Personnel found in the trash', 'ci_theme' ),
		'parent_item_colon'  => __( 'Parent Personnel:', 'ci_theme' )
	);

	$args = array(
		'labels'          => $labels,
		'singular_label'  => __( 'Personnel', 'ci_theme' ),
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'page',
		'hierarchical'    => false,
		'has_archive'     => _x( 'personnel', 'post type archive slug', 'ci_theme' ),
		'rewrite'         => array( 'slug' => _x( 'personnel', 'post type slug', 'ci_theme' ) ),
		'menu_position'   => 5,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'personnel' , $args );
}
endif;

if( !function_exists('ci_add_cpt_personnel_meta') ):
function ci_add_cpt_personnel_meta(){
	add_meta_box("ci_cpt_personnel_meta", __('Personnel Details', 'ci_theme'), "ci_add_cpt_personnel_meta_box", "personnel", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_personnel_meta') ):
function ci_update_cpt_personnel_meta($post_id){

	if ( !ci_can_save_meta('personnel') ) return;

	update_post_meta($post_id, "ci_cpt_subtitle", sanitize_text_field($_POST["ci_cpt_subtitle"]) );
}
endif;

if( !function_exists('ci_add_cpt_personnel_meta_box') ):
function ci_add_cpt_personnel_meta_box(){

	ci_prepare_metabox('personnel');

	ci_metabox_input('ci_cpt_subtitle', __('Job title', 'ci_theme'));
}
endif;

?>