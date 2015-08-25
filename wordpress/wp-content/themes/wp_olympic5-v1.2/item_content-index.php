<div class="item">
	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('main_thumb'); ?>
		<div class="item-desc">
			<h4><?php the_title(); ?></h4>
			<?php if ( get_post_meta( get_the_ID(), 'ci_cpt_subtitle', true ) ) : ?>
				<b><?php echo get_post_meta( get_the_ID(), 'ci_cpt_subtitle', true ); ?></b>
			<?php endif; ?>
		</div>
	</a>
</div>