<!doctype html>
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>
<?php get_template_part('inc_mobile-bar'); ?>

<div id="page">
	<header id="header">
		<div class="container">
			<div class="col-sm-3">
				<?php ci_e_logo('<h1 id="logo" class="'. get_logo_class() .'">', '</h1>'); ?>
			</div>

			<div class="col-sm-9">
				<nav id="nav">
					<?php
						wp_nav_menu( array(
							'theme_location' 	=> 'ci_main_menu',
							'fallback_cb' 		=> '',
							'container' 		=> '',
							'menu_id' 			=> 'navigation',
							'menu_class' 		=> ''
						));
					?>
				</nav><!-- #nav -->

				<div id="mobilemenu"></div>
			</div>
		</div>
	</header>

	<?php
		if ( !is_page_template('template-frontpage.php') ) {
			get_template_part('inc_titles');
		}
	?>