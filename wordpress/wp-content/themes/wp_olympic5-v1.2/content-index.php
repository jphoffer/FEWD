<article id="post-<?php the_ID(); ?>" <?php post_class('row entry'); ?>>
<!--	<div class="col-lg-1 visible-lg">
		<time datetime="<?php //echo esc_attr( get_the_date( 'c' ) ); ?>"><?php //echo get_the_date('d'); ?> <span><?php //echo get_the_date('M'); ?></span></time>
	</div> -->

	<div class="col-md-12 col-lg-11">
		<div class="entry-wrap">
			<?php if ( has_post_thumbnail() ): ?>
				<figure class="entry-thumb">
					<a title="<?php echo esc_attr(sprintf( __('Permanent Link to: %s', 'ci_theme'), get_the_title() )); ?>" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('blog_thumb'); ?>
					</a>
				
				</figure>
			<?php endif; ?>

			<div class="entry-content">
				<h1 class="entry-title"><a title="<?php echo esc_attr(sprintf( __('Permanent Link to: %s', 'ci_theme'), get_the_title() )); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<!--	<div class="entry-meta">
					<span class="entry-categories"><?php //_e('Posted under:', 'ci_theme'); ?> <?php the_category(', '); ?></span>
				</div> -->

				<?php
					if ( is_page_template('template-frontpage.php') ) {
						the_excerpt();
					} else {
						ci_e_content();
					}
				?>

				<a class="button read-more" title="<?php echo esc_attr(sprintf( __('Permanent Link to: %s', 'ci_theme'), get_the_title() )); ?>" href="<?php the_permalink(); ?>"><?php ci_e_setting('read_more_text'); ?></a>
			</div>
		</div>
	</div>
</article>
