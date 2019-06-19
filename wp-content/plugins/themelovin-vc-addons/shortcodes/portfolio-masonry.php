<?php
/*-----------------------------------------------------------------------------------*/
/*	Portfolio masonry
/*-----------------------------------------------------------------------------------*/
function thmlv_portfolio_masonry_shortcode( $atts, $content = NULL ) {
	shortcode_atts(array(
		'taxonomy' => ''
	), $atts);
	include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
	if(is_plugin_active('themelovin-portfolio/thmlv-portfolios.php')) {
		$output = '<div class="thmlvIsotopeVC">';
		if(isset($atts['taxonomy'])) {
			$args = array(
				'nopaging' => true,
				'post_type' => 'portfolio',
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC'),
				'tax_query' => array(
					array(
						'taxonomy' => 'skills',
						'field' => 'slug',
						'terms' => $atts['taxonomy']
					),
				),
			);
		} else {
			$args = array(
				'nopaging' => true,
				'post_type' => 'portfolio',
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC'),
			);
		}
		$wp_query = new WP_Query($args);
		while ($wp_query->have_posts()) : $wp_query->the_post();
			$thmlvPortfolioClasses[] = 'thmlvMasonryPortfolioVC';
			$thmlvPortfolioClasses[] = get_post_meta(get_the_ID(), '_oslo_portfolio_size', true);
			if('' != get_post_meta(get_the_ID(), '_thmlv_link', true)) {
				$link = get_post_meta(get_the_ID(), '_thmlv_link', true).'" target="_blank';
			} else {
				$link = get_the_permalink();
			}
			$featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			$output .= '<a href="'.get_the_permalink().'" id="post-'.get_the_ID().'"  class="'.implode(' ', get_post_class($thmlvPortfolioClasses)).'">';
			$output .= '<div class="thmlvMasonryTitleVC">';
			$output .= thmlv_switch_loop_title(get_the_ID()).thmlv_post_categories(get_the_ID(), 'skills', FALSE);
			$output .= '</div>';
			$output .= '<div class="thmlvMasonryHoverWrapVC">';
			$output .= '<div class="thmlvMasonryShadows"><div class="thmlvMasonryHoverVC" style="background-image: url('.$featured[0].');"></div></div>';
			$output .= '</div>';
			$output .= '</a>';
			unset($thmlvPortfolioClasses);
		endwhile;
		wp_reset_postdata();
		$output .= '</div>';
		return $output;
	} else {
		return __('Please, activate the themelovin portfolio plugin before add this element :)', 'themelovin');
	}
}
add_shortcode('thmlv_portfolio_masonry', 'thmlv_portfolio_masonry_shortcode' );