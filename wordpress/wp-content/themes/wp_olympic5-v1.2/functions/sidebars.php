<?php
add_action( 'widgets_init', 'ci_widgets_init' );
if( !function_exists('ci_widgets_init') ):
function ci_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Blog Sidebar', 'ci_theme'),
		'id' => 'blog-sidebar',
		'description' => __( 'The list of widgets assigned here will appear in your blog posts.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>'
	));

	register_sidebar(array(
		'name' => __( 'Pages Sidebar', 'ci_theme'),
		'id' => 'pages-sidebar',
		'description' => __( 'The list of widgets assigned here will appear in your pages.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>'
	));

	register_sidebar(array(
		'name' => __( 'Services Sidebar', 'ci_theme'),
		'id' => 'services-sidebar',
		'description' => __( 'The list of widgets assigned here will appear in your Service posts. If empty, the widgets of the Pages Sidebar will be shown instead.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>'
	));

	register_sidebar(array(
		'name' => __( 'Front Page Widgets #1', 'ci_theme'),
		'id' => 'frontpage-widgets-1',
		'description' => __( 'The list of widgets assigned here will appear in your front page template row one. The widgets will be split into 4 columns.', 'ci_theme'),
		'before_widget' => '<div class="col-md-3 col-xs-6"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="s-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __( 'Front Page Widgets #2', 'ci_theme'),
		'id' => 'frontpage-widgets-2',
		'description' => __( 'The list of widgets assigned here will appear in your front page template row two. This is a fullwidth widget area.', 'ci_theme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="s-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __( 'Front Page Widgets #3', 'ci_theme'),
		'id' => 'frontpage-widgets-3',
		'description' => __( 'The list of widgets assigned here will appear in your front page template, on a sidebar next to the latest blog post. .', 'ci_theme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __( 'Under Content Sidebar', 'ci_theme'),
		'id' => 'under-content-sidebar',
		'description' => __( 'Widgets here will appear under Galleries, Staff, Services and Events (if you have the Events Calendar plugin) pages. The -= CI Callout =- plugin is recommended for this area.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>'
	));

	register_sidebar(array(
		'name' => __( 'Contact Page Sidebar', 'ci_theme'),
		'id' => 'contact-widgets',
		'description' => __( 'The list of widgets assigned here will appear in your contact page.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="wrap">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>'
	));


	register_sidebar(array(
		'name' => __( 'Footer Widgets Column 1', 'ci_theme'),
		'id' => 'footer-widgets-1',
		'description' => __( 'The widgets here will appear in the first column of your website\'s footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widgets Column 2', 'ci_theme'),
		'id' => 'footer-widgets-2',
		'description' => __( 'The widgets here will appear in the second column of your website\'s footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widgets Column 3', 'ci_theme'),
		'id' => 'footer-widgets-3',
		'description' => __( 'The widgets here will appear in the third column of your website\'s footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widgets Column 4', 'ci_theme'),
		'id' => 'footer-widgets-4',
		'description' => __( 'The widgets here will appear in the fourth column of your website\'s footer.', 'ci_theme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	));

}
endif;
?>