<?php

global $thmlv_vc_active;

/*-----------------------------------------------------------------------------------*/
/*	Remove Visual Composer elements
/*-----------------------------------------------------------------------------------*/
if($thmlv_vc_active) {
	vc_remove_element('vc_basic_grid');
	vc_remove_element('vc_btn');
	vc_remove_element('vc_posts_slider');
	vc_remove_element('vc_masonry_grid');
	vc_remove_element('vc_masonry_media_grid');
	vc_remove_element('vc_media_grid');
	vc_remove_element('vc_gallery');
	vc_remove_element('vc_images_carousel');
	vc_remove_element('vc_wp_meta');
	vc_remove_element('vc_flickr');
	vc_remove_element('vc_tta_pageable');
	vc_remove_element('vc_wp_search');
	vc_remove_element('vc_wp_recentcomments');
	vc_remove_element('vc_wp_calendar');
	vc_remove_element('vc_wp_pages');
	vc_remove_element('vc_wp_tagcloud');
	vc_remove_element('vc_wp_custommenu');
	vc_remove_element('vc_wp_text');
	vc_remove_element('vc_wp_posts');
	vc_remove_element('vc_wp_categories');
	vc_remove_element('vc_wp_archives');
	vc_remove_element('vc_wp_rss');
	vc_remove_element('vc_gmaps');
	vc_remove_element('vc_line_chart');
	vc_remove_element('vc_round_chart');
	vc_remove_element('rev_slider_vc');
}

/*-----------------------------------------------------------------------------------*/
/*	Custom social elements
/*-----------------------------------------------------------------------------------*/
if($thmlv_vc_active) {
	vc_remove_param('vc_googleplus', 'css');
	vc_remove_param('vc_tweetmeme', 'css');
	vc_remove_param('vc_pinterest', 'css');
}

/*-----------------------------------------------------------------------------------*/
/*	Custom toggle elements
/*-----------------------------------------------------------------------------------*/
if($thmlv_vc_active) {
	vc_remove_param('vc_toggle', 'style');
	vc_remove_param('vc_toggle', 'color');
	vc_remove_param('vc_toggle', 'size');
	vc_remove_param('vc_toggle', 'css_animation');
}

/*-----------------------------------------------------------------------------------*/
/*	Custom single image
/*-----------------------------------------------------------------------------------*/
if($thmlv_vc_active) {
	vc_remove_param('vc_single_image', 'title');
	function thmlv_vc_single_image_param_onclick() {
		$param = WPBMap::getParam('vc_single_image', 'onclick');	
		$param['value'] = array(
			__('None', 'themelovin') => '',
			__('Link to large image', 'themelovin') => 'img_link_large',
			__('Open custom link', 'themelovin') => 'custom_link'
		);
		vc_update_shortcode_param('vc_single_image', $param);
	}
	add_action('vc_after_init', 'thmlv_vc_single_image_param_onclick');
}

if($thmlv_vc_active) {

	/*-----------------------------------------------------------------------------------*/
	/*	Custom social elements
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_googleplus', 'css');
	vc_remove_param('vc_tweetmeme', 'css');
	vc_remove_param('vc_pinterest', 'css');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom toggle elements
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_toggle', 'style');
	vc_remove_param('vc_toggle', 'color');
	vc_remove_param('vc_toggle', 'size');
	vc_remove_param('vc_toggle', 'css_animation');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom tour
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_tta_tabs', 'style');
	vc_remove_param('vc_tta_tour', 'title');
	vc_remove_param('vc_tta_tour', 'shape');
	vc_remove_param('vc_tta_tour', 'color');
	vc_remove_param('vc_tta_tour', 'no_fill_content_area');
	vc_remove_param('vc_tta_tour', 'spacing');
	vc_remove_param('vc_tta_tour', 'gap');
	vc_remove_param('vc_tta_tour', 'controls_size');
	vc_remove_param('vc_tta_tour', 'pagination_style');
	vc_remove_param('vc_tta_tour', 'pagination_color');
	vc_add_param( 'vc_tta_tour', array(
		'type' => 'dropdown',
		'heading' => __('Style', 'themelovin'),
		'param_name' => 'style',
		'description' => __('Select tour layout.', 'themelovin'),
		'weight' => 2,
		'value' => array(
			'Classic' => 'classic',
			'Minimal' => 'minimal',
		)
	));

	/*-----------------------------------------------------------------------------------*/
	/*	Custom accordion
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_accordion', 'title');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom widget sidebar
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_widget_sidebar', 'title');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom video
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_video', 'title');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom progress bar
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_progress_bar', 'title');
	vc_remove_param('vc_progress_bar', 'options');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom line chart
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_line_chart', 'title');

	/*-----------------------------------------------------------------------------------*/
	/*	Custom gmap
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_gmaps', 'title');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Custom toggle elements
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_tta_accordion', 'style');
	vc_remove_param('vc_tta_accordion', 'shape');
	vc_remove_param('vc_tta_accordion', 'no_fill');
	vc_remove_param('vc_tta_accordion', 'color');
	vc_remove_param('vc_tta_accordion', 'spacing');
	vc_remove_param('vc_tta_accordion', 'gap');
	vc_remove_param('vc_tta_accordion', 'c_align');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Custom tabs elements
	/*-----------------------------------------------------------------------------------*/
	vc_remove_param('vc_tta_tabs', 'style');
	vc_remove_param('vc_tta_tabs', 'shape');
	vc_remove_param('vc_tta_tabs', 'no_fill');
	vc_remove_param('vc_tta_tabs', 'color');
	vc_remove_param('vc_tta_tabs', 'spacing');
	vc_remove_param('vc_tta_tabs', 'gap');
	vc_remove_param('vc_tta_tabs', 'pagination_style');
	vc_remove_param('vc_tta_tabs', 'pagination_color');
	vc_add_param( 'vc_tta_tabs', array(
		'type' => 'dropdown',
		'heading' => __('Style', 'themelovin'),
		'param_name' => 'style',
		'description' => __('Select tab layout.', 'themelovin'),
		'weight' => 2,
		'value' => array(
			'Classic' => 'classic',
			'Minimal' => 'minimal',
		)
	));
}

?>