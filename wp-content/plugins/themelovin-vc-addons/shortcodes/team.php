<?php
/*-----------------------------------------------------------------------------------*/
/*	Team
/*-----------------------------------------------------------------------------------*/	
function thmlv_shortcode_team($atts, $content = NULL) {	
	extract(shortcode_atts(array(
		'columns'		=> '2',
		'items'			=> '',
		'taxonomy' => ''
	), $atts));
	
	include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
	if(is_plugin_active('themelovin-team/thmlv-team.php')) {
		$output = '<div class="thmlv-team-wrapper thmlv-team-'.esc_attr($columns).'-cols">';
		if (intval(esc_attr($items)) > 0) {
		 	$posts_per_page = intval(esc_attr($items));
		} else {
			$posts_per_page = -1;
		}
		if(isset($atts['taxonomy'])) {
			$args = array(
				'post_type' => 'team',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC'),
				'tax_query' => array(
					array(
						'taxonomy' => 'tasks',
						'field' => 'slug',
						'terms' => $atts['taxonomy']
					),
				),
			);
		} else {
			$args = array(
				'post_type' => 'team',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC'),
			);
		}
		$wp_query = new WP_Query($args);
		while ($wp_query->have_posts()) : $wp_query->the_post();
			$output .= '<a href="'.get_the_permalink().'" title="'.get_the_title().'" id="post-'.get_the_ID().'"  class="'.implode(' ', get_post_class()).'">';
			$output .= '<div class="thmlv-team-member-image">';
			$featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thmlvTeamVC');
			if($featured[0]) {
				$output .= '<img src="'.$featured[0].'" alt="'.get_the_title().'" />';
			} else {
				$output .= '<img src="'.VC_URL.'/images/team-placeholder.jpg" alt="'.get_the_title().'" />';
			}
			$output .= '<div class="thmlv-team-member-overlay">';
			$output .= '<div class="thmlv-team-member-content">';
			$output .= '<h2>'.get_the_title().'</h2>';
			$output .= thmlv_post_categories(get_the_ID(), 'tasks', FALSE);
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</a>';
		endwhile;	
		wp_reset_postdata();
		$output .= '</div>';
		return $output;
	} else {
		return __('Please, activate the themelovin team plugin before add this element :)', 'themelovin');
	}
}	
add_shortcode('thmlv_team', 'thmlv_shortcode_team');