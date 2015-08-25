<?php
/**
 * Scheduling Widget.
 */
if( !class_exists('CI_Schedule') ):

class CI_Schedule extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'ci_schedule_widget', // Base ID
			'-= CI Schedule =-', // Name
			array( 'description' => __( 'Display your schedule in a table.', 'ci_theme' ), 'classes' => 'ci_schedule_widget'),
			array( 'width'=> 400 /*, 'height'=> 350*/ )
		);

	}

	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$tracks = is_array($instance['days']) ? $instance['days'] : array();

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
		<table class="opening-hours">
			<?php
			if( !empty($tracks) )
			{
				$track_num = 0; // Helps count actual days (instead of increments of field groups, i.e. 6)

				for( $i = 0; $i < count($tracks); $i+=2 )
				{
					$track_num++;
					$i_title = $i;
					$i_subtitle = $i + 1;

					?>
					<tr>
						<th><?php echo $tracks[$i_title]; ?></th>
						<td><?php echo $tracks[$i_subtitle]; ?></td>
					</tr>
				<?php
				}
			}
			?>
		</table>
		<?php

		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['days'] = is_array($new_instance['days']) ? $new_instance['days'] : array();
		return $instance;
	}

	function form($instance){
		$instance 	= wp_parse_args( (array) $instance, array('title'=>'', 'days'=>array()));
		$title 		= htmlspecialchars($instance['title']);
		$tracks 	= is_array($instance['days']) ? $instance['days'] : array();
		echo '<p><label>' . __('Title:','ci_theme') . '</label><input id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" class="widefat" /></p>';

		?>
		<span class="hid_id" data-hidden-name="<?php echo $this->get_field_name('days'); ?>"></span>
		<?php

		echo '<div class="tracks ci-top-tracks-widget-admin">';
		if (!empty($tracks))
		{
			for( $i = 0; $i < count($tracks); $i+=2 )
			{
				?>
				<div class="track">
					<label><?php _e('Day:', 'ci_theme'); ?> <input type="text" class="widefat" name="<?php echo $this->get_field_name('days'); ?>[]" value="<?php echo esc_attr($tracks[$i]); ?>" /></label>
					<label><?php _e('Hours:', 'ci_theme'); ?> <input type="text" class="widefat" name="<?php echo $this->get_field_name('days'); ?>[]" value="<?php echo esc_attr($tracks[$i+1]); ?>" /></label>
					<a class="track-remove" href="#"><?php _e('Remove day', 'ci_theme'); ?></a>
				</div>
			<?php
			}
		}
		echo '</div>';

		?>
		<a class="button add-track" href="#"><?php _e('Add Day', 'ci_theme'); ?></a>

	<?php
	} // form

} // class CI_Schedule

register_widget('CI_Schedule');

endif;
?>