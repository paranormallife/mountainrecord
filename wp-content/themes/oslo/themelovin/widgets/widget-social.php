<?php
/*
Plugin Name: Social widget
Plugin URI: http://themelovin.com
Description: Display your social links.
Version: 1.0
Author: Themelovin
Author URI: http://themelovin.com
*/

class thmlv_social_widget extends WP_Widget {
	function thmlv_social_widget() {
		$widget_options = array('classname' => 'oslo-social', 'description' => esc_html__('Simple social widget.', 'oslo'));
		$control_options = array('width' => 300, 'height' => 350, 'id_base' => 'thmlv-social-widget');
		parent::__construct('thmlv-social-widget', esc_html__('Themelovin Social', 'oslo'), $widget_options, $control_options);
	}
 
	function widget($args, $instance) {
		// outputs the content of the widget
		extract($args);
		global $thmlvOptions;
		
		$social = array();
		@$title = apply_filters('widget_title', $instance['title']);
		@$social['behance'] = esc_url($thmlvOptions['oslo-behance']);
		@$social['dribbble'] = esc_url($thmlvOptions['oslo-dribbble']);
		@$social['facebook'] = esc_url($thmlvOptions['oslo-facebook']);
		@$social['flickr'] = esc_url($thmlvOptions['oslo-flickr']);
		@$social['foursquare'] = esc_url($thmlvOptions['oslo-foursquare']);
		@$social['git'] = esc_url($thmlvOptions['oslo-git']);
		@$social['google'] = esc_url($thmlvOptions['oslo-googleplus']);
		@$social['instagram'] = esc_url($thmlvOptions['oslo-instagram']);
		@$social['linkedin'] = esc_url($thmlvOptions['oslo-linkedin']);
		@$social['pinterest'] = esc_url($thmlvOptions['oslo-pinterest']);
		@$social['rss'] = esc_url($thmlvOptions['oslo-rss']);
		@$social['soundcloud'] = esc_url($thmlvOptions['oslo-soundcloud']);
		@$social['skype'] = esc_url($thmlvOptions['oslo-skype']);
		@$social['tumblr'] = esc_url($thmlvOptions['oslo-tumblr']);
		@$social['twitter'] = esc_url($thmlvOptions['oslo-twitter']);
		@$social['vimeo'] = esc_url($thmlvOptions['oslo-vimeo']);
		@$social['weibo'] = esc_url($thmlvOptions['oslo-weibo']);
		@$social['youtube'] = esc_url($thmlvOptions['oslo-youtube']);
		
		echo $before_widget;
		
		echo $before_title.$title.$after_title;
		
		$pictograms = array('behance' => 'fa-behance', 'dribbble' => 'fa-dribbble', 'facebook' => 'fa-facebook', 'foursquare' => 'fa-foursquare', 'flickr' => 'fa-flickr','git' => 'fa-git', 'google' => 'fa-google-plus', 'instagram' => 'fa-instagram', 'linkedin' => 'fa-linkedin', 'pinterest' => 'fa-pinterest', 'rss' => 'fa-rss', 'skype' => 'fa-skype', 'soundcloud' => 'fa-soundcloud', 'tumblr' => 'fa-tumblr', 'twitter' => 'fa-twitter', 'vimeo' => 'fa-vimeo-square', 'youtube' => 'fa-youtube', 'weibo' => 'fa-weibo');
		$output = '<div class="oslo-widget-social">';
		foreach($social as $key => $value) {
			if(!empty($value)) {
				$value = trim($value, '/');
				if(!preg_match('~^(?:f|ht)tps?://~i', $value)) {
					$value = 'http://'.$value;
				}
				$output .= '<a href="'.$value.'" title="Join us on '.$key.'" target="_blank" class="'.$key.'"><i class="fa '.$pictograms[$key].' "></i></a>';
			}
		}
		$output .= '</div>';
		echo $output;
		
		echo $after_widget;
	}
 
	function update($new_instance, $old_instance) {
		return $new_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	}
 
	function form($instance) {
		// outputs the options form on admin
		$defaults = array(
			'title' => esc_html__('Social', 'oslo')
		);  
		$instance = wp_parse_args((array) $instance, $defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'oslo'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
<?php
	}
}
register_widget('thmlv_social_widget');
?>