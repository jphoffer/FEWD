<?php
//
// Gallery Post Type related functions.
//
add_action('init', 'ci_create_cpt_gallery');
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');

if( !function_exists('ci_create_cpt_gallery') ):
function ci_create_cpt_gallery() {
	$labels = array(
		'name'               => _x( 'Galleries', 'post type general name', 'ci_theme' ),
		'singular_name'      => _x( 'Gallery', 'post type singular name', 'ci_theme' ),
		'add_new'            => __( 'Add New', 'ci_theme' ),
		'add_new_item'       => __( 'Add New Gallery', 'ci_theme' ),
		'edit_item'          => __( 'Edit Gallery', 'ci_theme' ),
		'new_item'           => __( 'New Gallery', 'ci_theme' ),
		'view_item'          => __( 'View Gallery', 'ci_theme' ),
		'search_items'       => __( 'Search Galleries', 'ci_theme' ),
		'not_found'          => __( 'No galleries found', 'ci_theme' ),
		'not_found_in_trash' => __( 'No galleries found in the trash', 'ci_theme' ),
		'parent_item_colon'  => __( 'Parent Gallery:', 'ci_theme' )
	);
	
	$args = array(
		'labels'          => $labels,
		'singular_label'  => _x( 'Gallery', 'post type singular name', 'ci_theme' ),
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'hierarchical'    => false,
		'has_archive'     => _x( 'gallery', 'post type archive slug', 'ci_theme' ),
		'rewrite'         => array( 'slug' => _x( 'gallery', 'post type slug', 'ci_theme' ) ),
		'menu_position'   => 5,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);
	
	register_post_type( 'gallery' , $args );

}
endif;

if( !function_exists('ci_add_cpt_gallery_meta') ):
function ci_add_cpt_gallery_meta(){
	add_meta_box("ci_cpt_gallery_meta", __('Gallery Details', 'ci_theme'), "ci_add_cpt_gallery_meta_box", "gallery", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_gallery_meta') ):
function ci_update_cpt_gallery_meta($post_id)
{
	if ( !ci_can_save_meta('gallery') ) return;

	ci_metabox_gallery_save($_POST);
}
endif;

if( !function_exists('ci_add_cpt_gallery_meta_box') ):
function ci_add_cpt_gallery_meta_box()
{
	ci_prepare_metabox('gallery');

	?><p><?php _e('Use the below area to create and edit your gallery. You should also upload and/or select a Featured Image, so that it will be used as the cover of the Gallery.', 'ci_theme'); ?></p><?php
	ci_metabox_gallery();
} 
endif;

?>