<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-12 columns" id="content" role="main">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>

			</header>
			<!-- First Band (Slider) -->

			  <div class="row">
			    <div class="large-12 columns">
			    <ul data-orbit>
			      <li><img src="http://placehold.it/1000x400&text=[ img 1 ]" /></li>
			      <li><img src="http://placehold.it/1000x400&text=[ img 2 ]" /></li>
			      <li><img src="http://placehold.it/1000x400&text=[ img 3 ]" /></li>
			      <li><img src="http://placehold.it/1000x400&text=[ img 4 ]" /></li>
			    </ul>
			    <!-- <div id="slider">

			    </div> -->

			    <hr />
			    </div>
			  </div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<div class="row">
				<div class=" item large-3 columns">
					<a href="#">
					<div class="panel personal-t">
					</div>
					<h4 class="item-desc">Personal Training</h4>
				</a>
				</div>
				<div class="item large-3 columns">
					<a href="#">
						<div class="panel online-coach">
						</div>
						<h4 class="item-desc">Online Coaching</h4>
					</a>
				</div>
				<div class="item large-3 columns">
					<a href="#">
						<div class="panel custom-gym">
					 	</div>
						<h4 class="item-desc">Custom Gyms</h4>
					</a>
				</div>
				<div class="item large-3 columns">
					<a href="#">
						<div class="panel buy-isa">
						</div>
						<h4 class="item-desc">Buy Isagenix</h4>
					</a>
				</div>

			</div>
			<div class="row">
				<div class="large-12 columns">
					<div class="panel testimonial">
						<h3>"Michael made me big and strong"</h3>
						<h4>Zach</h4>
					</div>
				</div>
			<div class="row">
				<div class="large-8 columns">
					<h3>Exercise of the Week</h3>
						<div class="front-ex-wk">
							<?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>
							<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?><?php the_post_thumbnail(); ?>
								<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<?php the_excerpt(__('(more…)')); ?> <a href="<?php the_permalink() ?>" class="button secondary">Read More</a>
<?php
endwhile;
wp_reset_postdata();
?>
						</div>
				</div>
				<div class="large-3 columns">
					<h4>Meet Michael</h4>
					<div class="item">
						<a href="#">
						<div class="panel michael">

					</div>
				</a>
				 </div>
				</div>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>

<?php get_footer(); ?>
