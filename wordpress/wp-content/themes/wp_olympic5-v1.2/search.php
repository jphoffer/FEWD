<?php get_header(); ?>
<?php
	global $wp_query;

	$found = $wp_query->found_posts;
	$none  = __( 'No results found. Please broaden your terms and search again.', 'ci_theme' );
	$one   = __( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'ci_theme' );
	$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'ci_theme' ), $found );
?>

<main id="main" class="container">
	<div class="row">
		<div class="col-lg-9 col-sm-8">

			<article class="entry searchnotice">
				<div class="entry-content">
					<h2><?php ci_e_inflect($found, $none, $one, $many); ?></h2>
					<?php if($found==0) get_search_form(); ?>
				</div>
			</article>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'index'); ?>
			<?php endwhile; ?>

			<div class="row">
				<div class="col-sm-12 col-lg-offset-1 col-sm-offset-0">
					<?php ci_pagination(); ?>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer(); ?>