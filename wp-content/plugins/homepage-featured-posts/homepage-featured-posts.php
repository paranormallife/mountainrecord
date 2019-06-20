<?php
/*
Plugin Name: Selected Posts in Widget
Plugin URI: https://timeandupdate.com/selected_posts_in_widget/
Description: Add Selected Posts in your Widget Area.
Version: 1.0.1
Author: Time and Update
Author URI: https://timeandupdate.com/
License: TCIY
*/
// The widget class
class Selected_Posts_in_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'selected_posts_in_widget',
			__( 'Selected Posts Widget', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}
	public function form( $instance ) {
		$defaults = array(
			'title'    => 'Editors Choices',
			'select'   => '',
			'select2'   => '02',
			'select3'   => '03',
			'select4'   => '04',
			'select5'   => '05',
			'select6'   => '06',
			'select7'   => '07',
			'select8'   => '08',
			'select9'   => '09',
			'select10'   => '10',
			'select11'   => '11',
			'select12'   => '12',
			'select13'   => '13',
			'select14'   => '14',
			'select15'   => '15',
		);

		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<?php // Dropdown
			$options = array();
			// query for your post type
			$post_type_query  = new WP_Query(  
				array (  
					'posts_per_page' => -1  
				)  
			);   
			// we need the array of posts
			$posts_array      = $post_type_query->posts;   
			// create a list with needed information
			// the key equals the ID, the value is the post_title
			$options = wp_list_pluck( $posts_array, 'post_title', 'ID' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select 1st Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'select2' ); ?>"><?php _e( 'Select 2nd Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select2' ); ?>" id="<?php echo $this->get_field_id( 'select2' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select2, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'select3' ); ?>"><?php _e( 'Select 3rd Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select3' ); ?>" id="<?php echo $this->get_field_id( 'select3' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select3, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select4' ); ?>"><?php _e( 'Select 4th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select4' ); ?>" id="<?php echo $this->get_field_id( 'select4' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select4, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select5' ); ?>"><?php _e( 'Select 5th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select5' ); ?>" id="<?php echo $this->get_field_id( 'select5' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select5, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select6' ); ?>"><?php _e( 'Select 6th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select6' ); ?>" id="<?php echo $this->get_field_id( 'select6' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select6, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select7' ); ?>"><?php _e( 'Select 7th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select7' ); ?>" id="<?php echo $this->get_field_id( 'select7' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select7, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select8' ); ?>"><?php _e( 'Select 8th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select8' ); ?>" id="<?php echo $this->get_field_id( 'select8' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select8, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select9' ); ?>"><?php _e( 'Select 9th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select9' ); ?>" id="<?php echo $this->get_field_id( 'select9' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select9, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select10' ); ?>"><?php _e( 'Select 10th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select10' ); ?>" id="<?php echo $this->get_field_id( 'select10' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select10, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select11' ); ?>"><?php _e( 'Select 11th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select11' ); ?>" id="<?php echo $this->get_field_id( 'select11' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select11, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select12' ); ?>"><?php _e( 'Select 12th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select12' ); ?>" id="<?php echo $this->get_field_id( 'select12' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select12, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select13' ); ?>"><?php _e( 'Select 13th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select13' ); ?>" id="<?php echo $this->get_field_id( 'select13' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select13, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select14' ); ?>"><?php _e( 'Select 14th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select14' ); ?>" id="<?php echo $this->get_field_id( 'select14' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select14, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'select15' ); ?>"><?php _e( 'Select 15th Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select15' ); ?>" id="<?php echo $this->get_field_id( 'select15' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select15, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>

	<?php }
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		$instance['select2']   = isset( $new_instance['select2'] ) ? wp_strip_all_tags( $new_instance['select2'] ) : '';
		$instance['select3']   = isset( $new_instance['select3'] ) ? wp_strip_all_tags( $new_instance['select3'] ) : '';
		$instance['select4']   = isset( $new_instance['select4'] ) ? wp_strip_all_tags( $new_instance['select4'] ) : '';
		$instance['select5']   = isset( $new_instance['select5'] ) ? wp_strip_all_tags( $new_instance['select5'] ) : '';
		$instance['select6']   = isset( $new_instance['select6'] ) ? wp_strip_all_tags( $new_instance['select6'] ) : '';
		$instance['select7']   = isset( $new_instance['select7'] ) ? wp_strip_all_tags( $new_instance['select7'] ) : '';
		$instance['select8']   = isset( $new_instance['select8'] ) ? wp_strip_all_tags( $new_instance['select8'] ) : '';
		$instance['select9']   = isset( $new_instance['select9'] ) ? wp_strip_all_tags( $new_instance['select9'] ) : '';
		$instance['select10']   = isset( $new_instance['select10'] ) ? wp_strip_all_tags( $new_instance['select10'] ) : '';
		$instance['select11']   = isset( $new_instance['select11'] ) ? wp_strip_all_tags( $new_instance['select11'] ) : '';
		$instance['select12']   = isset( $new_instance['select12'] ) ? wp_strip_all_tags( $new_instance['select12'] ) : '';
		$instance['select13']   = isset( $new_instance['select13'] ) ? wp_strip_all_tags( $new_instance['select13'] ) : '';
		$instance['select14']   = isset( $new_instance['select14'] ) ? wp_strip_all_tags( $new_instance['select14'] ) : '';
		$instance['select15']   = isset( $new_instance['select15'] ) ? wp_strip_all_tags( $new_instance['select15'] ) : '';
		return $instance;
	}
	public function widget( $args, $instance ) {
		extract( $args );
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$select   = isset( $instance['select'] ) ? $instance['select'] : '';
		$select2   = isset( $instance['select2'] ) ? $instance['select2'] : '';
		$select3   = isset( $instance['select3'] ) ? $instance['select3'] : '';
		$select4   = isset( $instance['select4'] ) ? $instance['select4'] : '';
		$select5   = isset( $instance['select5'] ) ? $instance['select5'] : '';
		$select6   = isset( $instance['select6'] ) ? $instance['select6'] : '';
		$select7   = isset( $instance['select7'] ) ? $instance['select7'] : '';
		$select8   = isset( $instance['select8'] ) ? $instance['select8'] : '';
		$select9   = isset( $instance['select9'] ) ? $instance['select9'] : '';
		$select10   = isset( $instance['select10'] ) ? $instance['select10'] : '';
		$select11   = isset( $instance['select11'] ) ? $instance['select11'] : '';
		$select12   = isset( $instance['select12'] ) ? $instance['select12'] : '';
		$select13   = isset( $instance['select13'] ) ? $instance['select13'] : '';
		$select14   = isset( $instance['select14'] ) ? $instance['select14'] : '';
		$select15   = isset( $instance['select15'] ) ? $instance['select15'] : '';
		// WordPress core before_widget hook (always include )
		echo '
			'. $before_widget;
			// Display the widget
			echo '
				<div class="widget-text wp_widget_plugin_box">
				';
					if ( $title ) {
						echo '	'.$before_title . $title . $after_title;
					}
					echo'
					<ul>';
					if ( $select ) {
						echo '
						<li>
							<a href="'. post_permalink($select) .'">'. get_the_title($select) .'</a>
						</li>';
					}
					if ( $select2 ) {
						echo '
						<li>
							<a href="'. post_permalink($select2) .'">'. get_the_title($select2) .'</a>
						</li>';
					}
					if ( $select3 ) {
						echo '
						<li>
							<a href="'. post_permalink($select3) .'">'. get_the_title($select3) .'</a>
						</li>';
					}
					if ( $select4 ) {
						echo '
						<li>
							<a href="'. post_permalink($select4) .'">'. get_the_title($select4) .'</a>
						</li>';
					}
					if ( $select5 ) {
						echo '
						<li>
							<a href="'. post_permalink($select5) .'">'. get_the_title($select5) .'</a>
						</li>';
					}
					if ( $select6 ) {
						echo '
						<li>
							<a href="'. post_permalink($select6) .'">'. get_the_title($select6) .'</a>
						</li>';
					}
					if ( $select7 ) {
						echo '
						<li>
							<a href="'. post_permalink($select7) .'">'. get_the_title($select7) .'</a>
						</li>';
					}
					if ( $select8 ) {
						echo '
						<li>
							<a href="'. post_permalink($select8) .'">'. get_the_title($select8) .'</a>
						</li>';
					}
					if ( $select9 ) {
						echo '
						<li>
							<a href="'. post_permalink($select9) .'">'. get_the_title($select9) .'</a>
						</li>';
					}
					if ( $select10 ) {
						echo '
						<li>
							<a href="'. post_permalink($select10) .'">'. get_the_title($select10) .'</a>
						</li>';
					}
					if ( $select11 ) {
						echo '
						<li>
							<a href="'. post_permalink($select11) .'">'. get_the_title($select11) .'</a>
						</li>';
					}
					if ( $select12 ) {
						echo '
						<li>
							<a href="'. post_permalink($select12) .'">'. get_the_title($select12) .'</a>
						</li>';
					}
					if ( $select13 ) {
						echo '
						<li>
							<a href="'. post_permalink($select13) .'">'. get_the_title($select13) .'</a>
						</li>';
					}
					if ( $select14 ) {
						echo '
						<li>
							<a href="'. post_permalink($select14) .'">'. get_the_title($select14) .'</a>
						</li>';
					}
					if ( $select15 ) {
						echo '
						<li>
							<a href="'. post_permalink($select15) .'">'. get_the_title($select15) .'</a>
						</li>';
					}
			
					echo'
					<ul>';
				echo '
				</div>';
			// WordPress core after_widget hook (always include )
			echo '
			' . $after_widget . '
	';
	}
}
function register_selected_posts_in_widget() {
	register_widget( 'Selected_Posts_in_Widget' );
}
add_action( 'widgets_init', 'register_selected_posts_in_widget' );
?>
