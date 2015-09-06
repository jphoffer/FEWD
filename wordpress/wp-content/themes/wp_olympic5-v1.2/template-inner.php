<?php
/*
 * Template Name: Inner Page
 */
?>
<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>

					<div class="col-md-12">
						<?php if ( ci_has_image_to_show() ) : ?>

						<?php endif; ?>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<?php rewind_posts(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_sidebar('secondary'); ?>
		<?php endwhile; ?>
		</div>
		</main>

		<?php get_footer(); ?>
