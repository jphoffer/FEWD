<?php
/*
* Template Name: Contact Template
*/
?>

<?php get_header(); ?>

<main id="main" class="container">
	<div class="row">
		<?php if ( ci_setting('disable_map') != 'enabled' ) : ?>
		<div class="col-xs-12">
			<div id="map"></div>
		</div>
		<?php endif; ?>
		<div class="col-lg-9 col-sm-8">
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="entry">
				<div class="entry-content">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</article>
			<?php endwhile; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>