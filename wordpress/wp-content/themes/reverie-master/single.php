<?php get_header(); ?>

<!-- Row for main content area -->
	<div id="content" role="main">
<!-- cut this from prev line class="small-12 large-8 columns" -->
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
			<div class="row">
				<div class="large-8 columns">

				<?php the_content(); ?>
			</div>
			<div class="large-4 columns">
				<?php the_post_thumbnail(); ?>
			</div>
		 </div>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Post'); ?>
			</footer>
		</article>


	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
