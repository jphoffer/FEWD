<?php
/*
 * Template Name: Post Archives
 */
?>

<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>
					<div class="col-sm-12">
						<?php if ( ci_has_image_to_show() ) : ?>
							<figure class="entry-thumb">
								<a class="fb" href="<?php echo ci_get_featured_image_src('large'); ?>">
									<?php ci_the_post_thumbnail(); ?>
								</a>
							</figure>
						<?php endif; ?>

						<div class="entry-content">
							<?php the_content(); ?>

							<?php
								global $paged;
								$arrParams = array(
									'paged' => $paged,
									'ignore_sticky_posts' => 1,
									'showposts' => ci_setting('archive_no'));
								query_posts($arrParams);
							?>

							<h2><?php _e('Latest posts', 'ci_theme'); ?></h2>
							<ul class="lst archive">
								<?php while (have_posts() ) : the_post(); ?>
									<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ci_theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a> - <?php echo get_the_date(); ?><?php the_excerpt(); ?></li>
								<?php endwhile; ?>
							</ul>

							<?php wp_reset_query(); ?>

							<?php if (ci_setting('archive_week')=='enabled'): ?>
								<h2 class="hdr"><?php _e('Weekly Archive', 'ci_theme'); ?></h2>
								<ul class="lst archive"><?php wp_get_archives('type=weekly&show_post_count=1') ?></ul>
							<?php endif; ?>

							<?php if (ci_setting('archive_month')=='enabled'): ?>
								<h2 class="hdr"><?php _e('Monthly Archive', 'ci_theme'); ?></h2>
								<ul class="lst archive"><?php wp_get_archives('type=monthly&show_post_count=1') ?></ul>
							<?php endif; ?>

							<?php if (ci_setting('archive_year')=='enabled'): ?>
								<h2 class="hdr"><?php _e('Yearly Archive', 'ci_theme'); ?></h2>
								<ul class="lst archive"><?php wp_get_archives('type=yearly&show_post_count=1') ?></ul>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer(); ?>