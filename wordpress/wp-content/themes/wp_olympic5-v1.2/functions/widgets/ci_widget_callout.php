<?php
if( !class_exists('CI_Callout') ):

class CI_Callout extends WP_Widget {

	function CI_Callout() {
		$widget_ops = array('description' => __('Displays a promotional widget for the homepage.', 'ci_theme'));
		$control_ops = array(/*'width' => 300, 'height' => 400*/);
		parent::WP_Widget('ci_callout_widget', $name='-= CI Callout =-', $widget_ops, $control_ops);
	}

	function widget($args, $instance) {

		extract($args);
		$ci_title = apply_filters( 'widget_title', empty( $instance['ci_title'] ) ? '' : $instance['ci_title'], $instance, $this->id_base );

		$url = esc_attr($instance['url']);
		$button_text = $instance['button_text'];
		$bg_img_url = $instance['bg_img_url'];

		echo $before_widget;

		?>
		<div class="promo">
		<div class="promo-inner group" style="background: url('<?php echo $bg_img_url; ?>') no-repeat">
			<h3><?php echo $ci_title; ?></h3>
			<a class="button read-more" href="<?php echo esc_attr($url); ?>"><?php echo $button_text; ?></a>
		</div>
		</div>
		<?php

		echo $after_widget;

	} // widget

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['ci_title'] = stripslashes($new_instance['ci_title']);
		$instance['url'] = esc_attr($new_instance['url']);
		$instance['button_text'] = stripslashes($new_instance['button_text']);
		$instance['bg_img_url'] = stripslashes($new_instance['bg_img_url']);

		return $instance;
	} // save

	function form($instance){

		$instance = wp_parse_args( (array) $instance, array('ci_title' => '', 'url' => '', 'button_text' => __('Contact us', 'ci_theme'), 'bg_img_url' => ''));

		$ci_title = htmlspecialchars($instance['ci_title']);
		$url = esc_attr($instance['url']);
		$button_text = stripslashes($instance['button_text']);
		$bg_img_url = stripslashes($instance['bg_img_url']);

		echo '<p><label>' . __('Title', 'ci_theme') . '</label><input id="' . $this->get_field_id('ci_title') . '" name="' . $this->get_field_name('ci_title') . '" type="text" value="' . esc_attr($ci_title) . '" class="widefat" /></p>';
		echo '<p><label>' . __('URL (with http:// in front):', 'ci_theme') . '</label><input id="' . $this->get_field_id('url') . '" name="' . $this->get_field_name('url') . '" type="text" value="' . esc_attr($url) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Button Text', 'ci_theme') . '</label><input id="' . $this->get_field_id('button_text') . '" name="' . $this->get_field_name('button_text') . '" type="text" value="' . esc_attr($button_text) . '" class="widefat" /></p>';
		echo '<p><label>'. __('URL of background image (optional):', 'ci_theme') .'</label><input type="text" value="' . esc_attr($bg_img_url) . '" class="widefat" id="' . $this->get_field_id('bg_img_url') . '" name="' .  $this->get_field_name('bg_img_url') . '"></p>';

	} // form

} // class


register_widget('CI_Callout');

endif; //class_exists

?>