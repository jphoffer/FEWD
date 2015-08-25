<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="<?php echo esc_attr(ci_setting('services_listing_cols')); ?> col-xs-12">
				<?php get_template_part('item_content', 'index'); ?>
			</div>

		<?php endwhile; ?>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php ci_pagination(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<?php dynamic_sidebar('under-content-sidebar'); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>