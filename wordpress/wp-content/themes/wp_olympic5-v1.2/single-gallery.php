<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php $attachments = ci_featgal_get_attachments(); ?>

			<?php while ( $attachments->have_posts() ) : $attachments->the_post(); ?>
				<div class="<?php echo esc_attr(ci_setting('gallery_cols')); ?> col-xs-6">
					<?php get_template_part('item_content', 'single'); ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>

		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>