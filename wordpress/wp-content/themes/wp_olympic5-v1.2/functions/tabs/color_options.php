<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_color_options', 30);
	if( !function_exists('ci_add_tab_color_options') ):
		function ci_add_tab_color_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Color Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;
	
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['default_bg_image'] = ''; // Holds the URL of the image file to use as background

	load_panel_snippet('custom_background');
	load_panel_snippet('color_scheme');


	add_action('wp_head', 'ci_custom_background_image', 100);

	if ( !function_exists('ci_custom_background_image') ):
	function ci_custom_background_image()
	{
		if(ci_setting('default_bg_image'))
		{
			?>
			<style type="text/css">
				#page { background: url('<?php echo ci_setting('default_bg_image'); ?>') no-repeat top center; }
			</style>
			<?php
		}
	}
	endif;
?>
<?php else: ?>

	<fieldset class="set">
		<legend><?php _e('Inner Background', 'ci_theme'); ?></legend>
		<p class="guide"><?php _e('Upload or select an image to be displayed as a background image throughout your website, except for the frontpage. This field is optional, if it is left empty then the body background will only be visible', 'ci_theme'); ?></p>
		<?php ci_panel_upload_image('default_bg_image', __('Upload a header image', 'ci_theme')); ?>
	</fieldset>

	<?php load_panel_snippet('color_scheme'); ?>

	<?php load_panel_snippet('custom_background'); ?>

<?php endif; ?>