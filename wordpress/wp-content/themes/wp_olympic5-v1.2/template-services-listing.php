<?php
/*
 * Template Name: Services Listing
 */
?>

<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">

		<?php
			global $paged;
			$args = array(
				'paged' => $paged,
				'post_type' => 'service',
				'posts_per_page' => ci_setting('services_per_page')
			);

			$services = new WP_Query($args);
		?>
		<?php while ( $services->have_posts() ) : $services->the_post(); ?>

			<div class="<?php echo esc_attr(ci_setting('services_listing_cols')); ?> col-xs-12">
				<?php get_template_part('item_content', 'index'); ?>
			</div>

		<?php endwhile; ?>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php ci_pagination(array(), $services); ?>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>

	<div class="row">
		<div class="col-sm-12">
			<?php dynamic_sidebar('under-content-sidebar'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>