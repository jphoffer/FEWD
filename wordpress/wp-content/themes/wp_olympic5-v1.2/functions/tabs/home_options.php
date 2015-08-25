<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_homepage_options', 20);
	if( !function_exists('ci_add_tab_homepage_options') ):
		function ci_add_tab_homepage_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Homepage Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );

	$ci_defaults['ci_first_widget_title'] = 'Popular Classes';
	$ci_defaults['home_news_number'] = 1;
	$ci_defaults['home_news_categories'] = array();
	$ci_defaults['homepage_page_id'] = '';

	load_panel_snippet('slider_flexslider');

?>
<?php else: ?>

	<fieldset class="set">
		<legend><?php _e('Widget Area Title', 'ci_theme'); ?></legend>
		<p class="guide"><?php _e('Enter the title of the first widget area in your homepage. This title is completely optional and it is best used when you use the -= CI Post Type =- widgets on that sidebar.', 'ci_theme'); ?></p>
		<?php ci_panel_input('ci_first_widget_title', __('Title:', 'ci_theme')); ?>
	</fieldset>

	<?php load_panel_snippet('slider_flexslider'); ?>

	<fieldset class="set">
		<legend><?php _e('News Section', 'ci_theme'); ?></legend>
		<fieldset class="set">
			<p class="guide"><?php _e('Instead of displaying news on the homepage, you can display the content of a page. This can be the the homepage itself, or any other page you wish.', 'ci_theme'); ?></p>
			<?php wp_dropdown_pages(array(
				'selected'=>$ci['homepage_page_id'],
				'name'=>THEME_OPTIONS.'[homepage_page_id]',
				'show_option_none' => __('Select a page','ci_theme'),
				'option_none_value' => ''
			)); ?>
		</fieldset>

		<p class="guide"><?php _e('Set the number of blog posts you want shown in the News Section on your homepage.', 'ci_theme'); ?></p>
		<?php ci_panel_input('home_news_number', __('Number of blog posts on news section', 'ci_theme')); ?>

		<p class="guide"><?php _e('Select the categories from which the homepage news will be displayed. Select none to always include all of them.', 'ci_theme'); ?></p>
		<?php ci_panel_terms_checklist('home_news_categories', 'category', __('Homepage news categories:', 'ci_theme')); ?>
	</fieldset>
	
<?php endif; ?>