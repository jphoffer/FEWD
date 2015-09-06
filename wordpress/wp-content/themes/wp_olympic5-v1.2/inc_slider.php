<div id="slideshow" class="flexslider">
	<ul class="slides">
		<?php
			$args = array(
				'post_type' => 'slider',
				'posts_per_page' => -1
			);

			$slides = new WP_Query($args);
		?>

		<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
			<?php
				$slider_url = get_post_meta( get_the_ID(), 'ci_cpt_slider_url', true );
				if ( empty( $slider_url ) ) {
					$slider_url = get_permalink();
				}
			?>
			<li style="background: url('<?php echo ci_get_featured_image_src('homepage_slider'); ?>') no-repeat top center;">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-lg-5">
							<div class="sld-info">
								<h3><?php the_title(); ?></h3>
								<a class="button" href="<?php echo esc_url( $slider_url ); ?>"><?php _e( 'Learn More', 'ci_theme' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</li>
		<?php endwhile; wp_reset_postdata(); ?>
	</ul>
</div>
