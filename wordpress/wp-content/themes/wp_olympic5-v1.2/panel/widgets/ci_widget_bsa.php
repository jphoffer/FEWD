<?php 
if( !class_exists('CI_BSA') ):
class CI_BSA extends WP_Widget {

	function CI_Bsa(){
		$widget_ops = array('description' => __('BuySellAds.com Integration','ci_theme'));
		$control_ops = array(/*'width' => 400, 'height' => 200*/);
		parent::WP_Widget('ci_buysellads_widget', $name='-= CI BuySellAds.com =-', $widget_ops, $control_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$code = $instance['code'];
		echo $before_widget;
		echo '<div class="group">' . $code . '</div>'; 
		echo $after_widget;
	} // widget

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['code'] = stripslashes($new_instance['code']);
		return $instance;
	} // save

	function form($instance){
		$instance = wp_parse_args( (array) $instance, array('code'=>'') );
		$code = $instance['code'];
		echo '<p><label for="'.$this->get_field_id('code').'">' . __('Zone Code:', 'ci_theme') . '</label><textarea rows="10" id="' . $this->get_field_id('code') . '" name="' . $this->get_field_name('code') . '" class="widefat" >'. esc_textarea($code) .'</textarea></p>';
		echo '<p>' . sprintf(__('Paste your <strong>Zone Code</strong> here, as described in this <a href="%s">BuySellAds tutorial</a>.', 'ci_theme'), 'http://support.buysellads.com/knowledge_base/topics/how-to-install-your-ad-code') . '</p>';
	} // form

} // class

register_widget('CI_BSA');

endif; //class_exists
?>