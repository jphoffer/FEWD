<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_gallery_options', 60);
	if( !function_exists('ci_add_tab_gallery_options') ):
		function ci_add_tab_gallery_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Gallery Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );

	$ci_defaults['galleries_per_page'] = '12';
	$ci_defaults['gallery_listing_cols'] = 'col-sm-4';
	$ci_defaults['gallery_cols'] = 'col-sm-4';

	// Intercepts the request and injects the appropriate posts_per_page parameter according to the request.
	add_filter( 'pre_get_posts', 'ci_gallery_taxonomy_paging_request' );
	if( !function_exists('ci_gallery_taxonomy_paging_request') ):
	function ci_gallery_taxonomy_paging_request( $query )
	{
		//We don't want to mess other post types or with the admin panel.
		if( (!is_tax('gallery-category') and !is_post_type_archive('gallery')) or is_admin() ) return;
	
		// Don't mess with the posts if the query is explicit.
		if (!isset($query->query_vars['posts_per_page']))
		{
			$num_of_pages = intval(ci_setting('galleries_per_page'));
			// Assign a number only if a number was found, otherwise, disable pagination.
			if ($num_of_pages > 0)
				$query->set( 'posts_per_page', $num_of_pages );
			else
				$query->set( 'posts_per_page', -1 );
		}

		return $query;
	}
	endif;

?>
<?php else: ?>

	<fieldset class="set">
		<legend><?php _e('Pagination', 'ci_theme'); ?></legend>
		<p class="guide"><?php _e('Set how many galleries per page should be displayed, in listing pages.', 'ci_theme'); ?></p>
		<?php ci_panel_input('galleries_per_page', __('Number of Galleries per page', 'ci_theme')); ?>
	</fieldset>

	<?php 
		$options = array(
			'col-sm-3' => __('Four Columns', 'ci_theme'),
			'col-sm-4' => __('Three Columns', 'ci_theme'),
			'col-sm-6' => __('Two Columns', 'ci_theme'),
		);
	?>

	<fieldset class="set">
		<legend><?php _e('Columns', 'ci_theme'); ?></legend>
		<p class="guide"><?php _e('Select how many columns you want the Gallery Listing area to be.', 'ci_theme'); ?></p>
		<?php ci_panel_dropdown('gallery_listing_cols', $options, __('Gallery Listing Columns:', 'ci_theme')); ?>

		<p class="guide mt20"><?php _e('Select how many columns you want to display your Gallery photos in each of your Galleries.' , 'ci_theme'); ?></p>
		<?php ci_panel_dropdown('gallery_cols', $options, __('Gallery Page Columns:', 'ci_theme')); ?>
	</fieldset>

<?php endif; ?>