<?php
if( !class_exists('CI_Recent_Items') ):
class CI_Recent_Items extends WP_Widget {

	function CI_Recent_Items(){
		$widget_ops = array('description' => __('Displays a list of recent posts of the selected post type.', 'ci_theme'));
		$control_ops = array(/*'width' => 300, 'height' => 400*/);
		parent::WP_Widget('ci_recent_items_widget', $name='-= CI Recent Items =-', $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		global $post;

		extract($args);

		$per_page = $instance['per_page'];


		echo $before_widget;

			$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

			?>
			<?php if ($title) echo $before_title . $title . $after_title; ?>

		<div class="row">
		<?php
		$post_type_name = $instance['post_type_name'];
		$per_page = $instance['per_page'];

		$args = array(
			'post_type' => $post_type_name,
			'posts_per_page' => $per_page
		);

		$posts = new WP_Query($args);
		while ( $posts->have_posts() ) : $posts->the_post();
		?>
			<div class="col-sm-12 col-xs-6">
			<?php get_template_part('item_content', 'index'); ?>
			</div>
		<?php
			endwhile; wp_reset_postdata();
		?>

		</div>
		<?php
		echo $after_widget;

	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['post_type_name'] = sanitize_key($new_instance['post_type_name']);
		$instance['per_page'] = absint($new_instance['per_page']);
		return $instance;
	}

	function form($instance){

		$defaults = array(
			'title' => '',
			'post_type_name' => 'post',
			'per_page' => 2
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = $instance['title'];
		$post_type_name = $instance['post_type_name'];
		$per_page = $instance['per_page'];

		?><p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'ci_theme'); ?></label><input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat" /></p><?php

		$post_types = get_post_types( array('public' => true), 'objects' );
		unset($post_types['attachment']);

		?><p><label for="<?php echo $this->get_field_id('post_type_name'); ?>"><?php _e('Show posts from this post type:', 'ci_theme'); ?></label></p><?php
		?><select name="<?php echo $this->get_field_name('post_type_name'); ?>" id="<?php echo $this->get_field_id('post_type_name'); ?>" ><?php
		foreach( $post_types as $key => $pt )
		{
			?><option value="<?php echo esc_attr($key); ?>" <?php selected($key, $post_type_name); ?>><?php echo $pt->labels->name; ?></option><?php
		}
		?></select> <?php

		echo '<p><label>' . __('Number of items:', 'ci_theme') . '</label><input id="' . $this->get_field_id('per_page') . '" name="' . $this->get_field_name('per_page') . '" type="text" value="' . esc_attr($per_page) . '" class="widefat" /></p>';
	}

} // class


register_widget('CI_Recent_Items');

endif; // !class_exists


?>