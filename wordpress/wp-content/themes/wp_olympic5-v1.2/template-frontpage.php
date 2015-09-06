<?php
/*
  * Template Name: Homepage
  */
?>

<?php get_header(); ?>

<div id="slideshow" class="flexslider">
	<ul class="slides">

								<li style="background: url('http://localhost/wordpress/wp-content/uploads/2013/12/situp-1300x550.jpg') no-repeat top center;">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-lg-5">
							<div class="sld-info">
								<h3>Personal training at its best!</h3>
								<a class="button" href="http://localhost/wordpress/exercise-week/slider/personal-training-at-its-best/">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</li>
								<li style="background: url('http://localhost/wordpress/wp-content/uploads/2013/12/sample_image4-1920x550.jpg') no-repeat top center;">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-lg-5">
							<div class="sld-info">
								<h3>Get in your best shape now!</h3>
								<a class="button" href="http://localhost/wordpress/exercise-week/slider/get-in-your-best-shape-now/">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</li>
								<li style="background: url('') no-repeat top center;">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-lg-5">
							<div class="sld-info">
								<h3>Get ripped in no time!</h3>
								<a class="button" href="http://localhost/wordpress/muhdix/">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			</ul>
</div>

<main id="main" class="container">
	<div class="row">
			<div class="col-sm-12">
				<div class="widget first-widget-area">

					<div class="row">
						<div class="col-md-3 col-xs-6"><div id="ci_post_type_widget-3" class="widget widget_ci_post_type_widget"><div class="item">
		<a title="Personal Training" href="http://localhost/wordpress/personal-training/">
			<img width="601" height="504" src="http://localhost/wordpress/wp-content/uploads/2013/12/personal_training-601x504.png" class="attachment-main_thumb wp-post-image" alt="personal_training" />		<div class="item-desc">
				<h4>Personal Training</h4>
						</div>
		</a>
	</div></div></div><div class="col-md-3 col-xs-6"><div id="ci_post_type_widget-4" class="widget widget_ci_post_type_widget"><div class="item">
		<a title="Online Coaching" href="http://localhost/wordpress/online-coaching/">
			<img width="602" height="504" src="http://localhost/wordpress/wp-content/uploads/2015/08/online_coaching-602x504.png" class="attachment-main_thumb wp-post-image" alt="online_coaching" />		<div class="item-desc">
				<h4>Online Coaching</h4>
						</div>
		</a>
	</div></div></div><div class="col-md-3 col-xs-6"><div id="ci_post_type_widget-5" class="widget widget_ci_post_type_widget"><div class="item">
		<a title="Custom Gyms" href="http://localhost/wordpress/custom-gyms/">
			<img width="601" height="504" src="http://localhost/wordpress/wp-content/uploads/2015/08/custom_gym-601x504.png" class="attachment-main_thumb wp-post-image" alt="custom_gym" />		<div class="item-desc">
				<h4>Custom Gyms</h4>
						</div>
		</a>
	</div></div></div><div class="col-md-3 col-xs-6"><div id="ci_post_type_widget-7" class="widget widget_ci_post_type_widget"><div class="item">
		<a title="Buy Isagenix" href="http://localhost/wordpress/test/">
			<img width="600" height="504" src="http://localhost/wordpress/wp-content/uploads/2015/08/Screen-Shot-2015-08-25-at-8.46.55-PM-600x504.png" class="attachment-main_thumb wp-post-image" alt="Screen Shot 2015-08-25 at 8.46.55 PM" />		<div class="item-desc">
				<h4>Buy Isagenix</h4>
						</div>
		</a>
	</div></div></div>				</div>
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
