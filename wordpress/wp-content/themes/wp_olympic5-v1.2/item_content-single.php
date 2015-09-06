<?php if ( get_post_type() == 'attachment' ) : ?>
	<div class="item">
		<a href="<?php echo ci_get_image_src($post->ID, 'large'); ?>" title="<?php echo get_the_excerpt(); ?>" data-fancybox-group="gal" class="fb">
			<img src="<?php echo ci_get_image_src($post->ID, 'main_thumb'); ?>">
			<?php if ( get_the_excerpt() ) : ?>
				<div class="item-desc">
					<h4><?php echo get_the_excerpt(); ?></h4>
				</div>
			<?php endif; ?>
		</a>
	</div>
<?php else : ?>
	<div class="item">
		<a title="<?php the_title_attribute(); ?>" href="<?php echo ci_get_featured_image_src('large'); ?>" class="fb">
			<?php the_post_thumbnail('main_thumb'); ?>
			<div class="item-desc">
				<h4><?php the_title(); ?></h4>
				<?php if ( get_post_meta( get_the_ID(), 'ci_cpt_subtitle', true ) ) : ?>
					<b><?php echo get_post_meta( get_the_ID(), 'ci_cpt_subtitle', true ); ?></b>
				<?php endif; ?>
			</div>
		</a>
	</div>
<?php endif; ?>
