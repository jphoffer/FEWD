<?php
	add_action( 'after_setup_theme', 'ci_register_default_hooks' );

	if ( ! function_exists( 'ci_register_default_hooks' ) ):
	function ci_register_default_hooks() {
		// Wraps post counts in span.ci-count
		// Needed for the default widgets, however more appropriate filters don't exist.
		add_filter( 'get_archives_link', 'ci_theme_wrap_archive_widget_post_counts_in_span', 10, 2 );
		add_filter( 'wp_list_categories', 'ci_theme_wrap_category_widget_post_counts_in_span', 10, 2 );
	}
	endif;

	if ( ! function_exists( 'ci_theme_wrap_archive_widget_post_counts_in_span' ) ):
	function ci_theme_wrap_archive_widget_post_counts_in_span( $output ) {
		$output = preg_replace_callback( '#(<li>.*?<a.*?>.*?</a>.*&nbsp;)(\(.*?\))(.*?</li>)#', 'ci_theme_replace_archive_widget_post_counts_in_span', $output );

		return $output;
	}
	endif;

	if ( ! function_exists( 'ci_theme_replace_archive_widget_post_counts_in_span' ) ):
	function ci_theme_replace_archive_widget_post_counts_in_span( $matches ) {
		return sprintf( '%s<span class="ci-count">%s</span>%s',
			$matches[1],
			$matches[2],
			$matches[3]
		);
	}
	endif;


	if ( ! function_exists( 'ci_theme_wrap_category_widget_post_counts_in_span' ) ):
	function ci_theme_wrap_category_widget_post_counts_in_span( $output, $args ) {
		if ( $args['show_count'] == 0 ) {
			return $output;
		}
		$output = preg_replace_callback( '#(<a.*?>\s*)(\(.*?\))#', 'ci_theme_replace_category_widget_post_counts_in_span', $output );

		return $output;
	}
	endif;

	if ( ! function_exists( 'ci_theme_replace_category_widget_post_counts_in_span' ) ):
	function ci_theme_replace_category_widget_post_counts_in_span( $matches ) {
		return sprintf( '%s<span class="ci-count">%s</span>',
			$matches[1],
			$matches[2]
		);
	}
	endif;
