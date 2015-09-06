<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-12 col-sm-10">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>
					<div class="col-xs-12">
						<div class="entry-content">
							<?php ci_e_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<?php rewind_posts(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php /*get_sidebar('secondary'); */?>
		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>
