<?php
/*
Template Name: Inner Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

				    <div id="main" class="large-12 medium-12 columns" role="main">

						<?php get_template_part( 'parts/loop', 'page' ); ?>
            <div class="row">
      <div class="large-8 columns">
    <?php the_content(); ?>
      </div>
      <div class="large-4 columns">
        <?php the_post_thumbnail('full');  ?>
      </div>
    </div>
  </div>

    				</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
