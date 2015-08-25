<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_contact_options', 50);
	if( !function_exists('ci_add_tab_contact_options') ):
		function ci_add_tab_contact_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Contact Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;
	
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_map'] = '';
	$ci_defaults['map_tooltip'] = 'Pointblank Str. 14, 54242, California';
	$ci_defaults['map_coords'] = '33.59,-80';
	$ci_defaults['map_zoom_level'] = '6';

?>
<?php else: ?>

	<fieldset class="set">
		<legend><?php _e('Map', 'ci_theme'); ?></legend>
		<p class="guide"><?php _e('Here you can customize your map that appears on your contact page. That is the page that you have assigned the <strong>Contact Page</strong> template.', 'ci_theme');?> </p>

		<?php ci_panel_input('map_coords', __('Enter the exact coordinates of your address (you can find your coordinates based on address using this tool: http://itouchmap.com/latlong.html):', 'ci_theme')); ?>

		<?php ci_panel_input('map_zoom_level', __('Enter a single number from 1 to 20 that represents the default zoom level you want on your map. Higher number means closer.', 'ci_theme')); ?>

		<?php ci_panel_input('map_tooltip', __('Enter the text you wish to display when a user clicks on the map pin that points to your address (e.g. Your actual address):', 'ci_theme')); ?>

		<?php ci_panel_checkbox('disable_map', 'enabled', __('Disable the map.', 'ci_theme')); ?>

	</fieldset>

<?php endif; ?>