<?php
/*
 * Template Name: Fullwidth Page
 */
?>

<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>

					<div class="col-md-12">
						<?php if ( ci_has_image_to_show() ) : ?>
							<figure class="entry-thumb">
								<a class="fb" href="<?php echo ci_get_featured_image_src('large'); ?>">
									<?php ci_the_post_thumbnail_full(); ?>
								</a>
							</figure>
						<?php endif; ?>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div> 
				</article>

				<div class="row">
					<div class="col-sm-12">
						<div id="comments">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
