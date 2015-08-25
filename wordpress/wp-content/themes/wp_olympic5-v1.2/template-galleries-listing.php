<?php
/*
 * Template Name: Galleries Listing
 */
?>

<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">

		<?php
			global $paged;
			$args = array(
				'paged' => $paged,
				'post_type' => 'gallery',
				'posts_per_page' => ci_setting('galleries_per_page')
			);

			$galleries = new WP_Query($args);
		?>
		<?php while ( $galleries->have_posts() ) : $galleries->the_post(); ?>

			<div class="<?php echo esc_attr(ci_setting('gallery_listing_cols')); ?> col-xs-12">
				<?php get_template_part('item_content', 'index'); ?>
			</div>

		<?php endwhile; ?>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<?php ci_pagination(array(), $galleries); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<?php dynamic_sidebar('under-content-sidebar'); ?>
		</div>
	</div>

	<?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>