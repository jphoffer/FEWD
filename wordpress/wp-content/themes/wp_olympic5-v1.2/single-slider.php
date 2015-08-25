<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>
					<div class="col-lg-1 visible-lg">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('M'); ?></span></time>
					</div>

					<div class="col-md-12 col-lg-11">
						<div class="entry-wrap">
							<?php if ( has_post_thumbnail() ) : ?>
								<figure class="entry-thumb">
									<a class="fb" href="<?php echo ci_get_featured_image_src('large'); ?>">
										<?php the_post_thumbnail('blog_thumb'); ?>
									</a>
									<time class="hidden-lg" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('M'); ?></span></time>
								</figure>
							<?php endif; ?>

							<div class="entry-content">
								<h1 class="entry-title"><?php the_title(); ?></h1>

								<?php the_content(); ?>
								<?php wp_link_pages(); ?>
							</div>
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

		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer(); ?>