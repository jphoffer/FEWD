<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">
				<article id="entry-404" class="row entry">
					<div class="col-sm-12">
						<div class="entry-content">
							<h1 class="entry-title"><?php _e('Page Not Found', 'ci_theme'); ?></h1>
							<p><?php _e( 'Oh, no! The page you requested could not be found. Perhaps searching will help...', 'ci_theme' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>
				</article>
		</div>

		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer(); ?>