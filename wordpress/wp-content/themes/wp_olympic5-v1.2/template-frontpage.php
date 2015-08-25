<?php
/*
  * Template Name: Homepage
  */
?>

<?php get_header(); ?>

<?php get_template_part('inc_slider'); ?>

<main id="main" class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="widget first-widget-area">
				<?php if ( ci_setting('ci_first_widget_title') ) : ?>
					<h3 class="s-title"><?php ci_e_setting('ci_first_widget_title'); ?></h3>
				<?php endif; ?>

				<div class="row">
					<?php dynamic_sidebar('frontpage-widgets-1'); ?>
				</div>
			</div>

			<?php dynamic_sidebar('frontpage-widgets-2'); ?>

			<div class="row">
				<div class="col-lg-9 col-sm-8">
				<?php if ( ci_setting('homepage_page_id') == "" ) : ?>
					<h3 class="s-title"><?php _e('Exercise of the Week', 'ci_theme'); ?></h3>

					<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => ci_setting('home_news_number'),
							'cat' => implode(',', (array)ci_setting('news-cat'))
						);
						$homepost = new WP_Query($args);

						while ( $homepost->have_posts() ) : $homepost->the_post();
							get_template_part('content', 'index');
						endwhile;

						wp_reset_postdata();
					?>
				<?php else : ?>
					<?php
						$the_page = new WP_Query( array(
							'page_id' => ci_setting('homepage_page_id')
						) );
						if ( $the_page->have_posts() ) : while ( $the_page->have_posts() ) : $the_page->the_post();
					?>

					<article class="entry">
						<?php the_content(); ?>
					</article>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				<?php endif; ?>
				</div>

				<div class="col-lg-3 col-sm-4 sidebar">
					<?php dynamic_sidebar('frontpage-widgets-3'); ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
