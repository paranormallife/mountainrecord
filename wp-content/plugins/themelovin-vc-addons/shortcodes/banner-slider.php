<?php
/*-----------------------------------------------------------------------------------*/
/* Banner slider
/*-----------------------------------------------------------------------------------*/
function thmlv_shortcode_banner_slider($atts, $content = NULL) {	
	extract(shortcode_atts(array(
		'adaptive_height' => '',
		'arrows' => '',
		'pagination' => '',
		'infinite' => '',
		'autoplay' => '',
		'background_color' => ''
	), $atts));
		
	$slider_class = 'thmlv-banner-slider slick-slider';
	$slider_settings_data = ' ';
		
	// Adaptive Height
	if (strlen($adaptive_height) > 0) {
		$slider_settings_data .= 'data-adaptive-height="true" ';
	}
		
	// Arrows
	if (strlen($arrows) > 0) {
		$slider_settings_data .= 'data-arrows="true" ';
	}
	
	// Pagination
	if (strlen($pagination) > 0) {
		$slider_class .= ' slick-dots-inside';
		$slider_settings_data .= 'data-dots="true" ';
	} else {
		$slider_class .= ' slick-dots-disabled';
	}
	
	// Infinite loop
	if (strlen($infinite) > 0) {
		$slider_settings_data .= 'data-infinite="true"';
	}
		
	// Autoplay
	if (strlen($autoplay) > 0) {
		$slider_settings_data .= 'data-autoplay="true" data-autoplay-speed="'.intval($autoplay).'" ';
	}
		
	// Background color
	 if (strlen($background_color) > 0) {
	 	$background_color_style = 'style="background-color: '.esc_attr($background_color).'"';
	 } else {
	 	$background_color_style = '';
	 }
				
	$output = '<div class="'.$slider_class.'"'.$slider_settings_data.$background_color_style.'>'.do_shortcode($content).'</div>';
						
	return $output;
}	
add_shortcode('thmlv_banner_slider', 'thmlv_shortcode_banner_slider');