<?php
if( !class_exists('CI_Jons') ):
class CI_Jons extends WP_Widget {

	function CI_Jons(){
		$widget_ops = array('description' => __('Displays a selected post from a selected post type.', 'ci_theme'));
		$control_ops = array(/*'width' => 300, 'height' => 400*/);
		parent::WP_Widget('ci_jons_widget', $name='-= CI Post Type =-', $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		global $post;
		$old_post = $post;

		extract($args);

		$ci_post_id = $instance['postid'];

		$post = get_post($ci_post_id);

		echo $before_widget;

		if($post)
		{
			setup_postdata($post);

			$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

			if ($title) echo $before_title . $title . $after_title;
			get_template_part('item_content', 'index');

			$post = $old_post;
			setup_postdata($post);
		}

		echo $after_widget;

	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['post_type_name'] = sanitize_key($new_instance['post_type_name']);
		$instance['postid'] = absint($new_instance['postid']);
		return $instance;
	}

	function form($instance){

		$defaults = array(
			'title' => '',
			'post_type_name' => 'post',
			'postid' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = $instance['title'];
		$post_type_name = $instance['post_type_name'];
		$post_id = $instance['postid'];

		?><p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'ci_theme'); ?></label><input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat" /></p><?php

		$post_types = get_post_types( array('public' => true), 'objects' );
		unset($post_types['attachment']);

		?><p><label for="<?php echo $this->get_field_id('post_type_name'); ?>"><?php _e('Show posts from this post type:', 'ci_theme'); ?></label></p><?php
		?><select name="<?php echo $this->get_field_name('post_type_name'); ?>" id="<?php echo $this->get_field_id('post_type_name'); ?>" ><?php
			foreach( $post_types as $key => $pt )
			{
				?><option value="<?php echo esc_attr($key); ?>" <?php selected($key, $post_type_name); ?>><?php echo $pt->labels->name; ?></option><?php
			}
		?></select> <img src="<?php echo get_child_or_parent_file_uri('/panel/img/ajax-loader-16x16.gif'); ?>" class="loading_posts" style="display: none;"><?php
		?><p></p><?php
		?><p><label for="<?php echo $this->get_field_id('postid'); ?>"><?php _e('Select a post to show:', 'ci_theme'); ?></label></p><?php
		?><div class="ci_widget_post_type_posts_dropdown"><?php
		wp_dropdown_posts(
			array(
				'post_type' => $post_type_name,
				'show_option_none' => '&nbsp;',
				'selected' => $post_id,
				'class' => 'widefat'
			),
			$this->get_field_name('postid')
		);
		?></div><?php
	}


	static function _ajax_get_posts()
	{
		$post_type_name = sanitize_key($_POST['post_type_name']);
		$name_field = esc_attr($_POST['name_field']);

		$str = wp_dropdown_posts(
			array(
				'echo' => false,
				'post_type' => $post_type_name,
				'show_option_none' => '&nbsp;',
				'class' => 'widefat'
			),
			$name_field
		);

		echo $str;
		die;
	}

} // class


register_widget('CI_Jons');

add_action('wp_ajax_ci_widget_post_type_ajax_get_posts', 'CI_Jons::_ajax_get_posts');

endif; // !class_exists


?>
