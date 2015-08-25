<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'index'); ?>
			<?php endwhile; endif; ?>

			<div class="row">
				<div class="col-sm-12 col-lg-offset-1 col-sm-offset-0">
					<?php ci_pagination(); ?>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer(); ?>