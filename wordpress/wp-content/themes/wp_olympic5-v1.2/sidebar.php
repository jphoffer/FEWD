<div class="sidebar col-lg-3 col-sm-4">
	<?php
		if ( is_page_template('template-contact.php') ) {
			dynamic_sidebar('contact-widgets');
		} elseif ( is_page() OR get_post_type() == 'personnel' ) {
			dynamic_sidebar('pages-sidebar');
		} elseif ( get_post_type() == 'service' ) {
			dynamic_sidebar('services-sidebar');
		} else {
			dynamic_sidebar('blog-sidebar');
		}
	?>
</div>