<?php
/*-----------------------------------------------------------------------------------*/
/* Banner
/*-----------------------------------------------------------------------------------*/
function thmlv_shortcode_banner($atts, $content = NULL) {
	extract(shortcode_atts(array(
		'title' => '',
		'subtitle' => '',
		'custom_link' => '',
		'link_type' => 'banner_link',
		'text_color' => '',
		'text_position' => 'h_center-v_center',
		'text_alignment' => 'align_left',
		'text_animation' => '',
		'image_id' => '',
		'image_type' => 'fluid',
		'height' => '',
		'background_color' => ''
	), $atts ) );
		
	// Centered content class
	$banner_class = '';
	
	// Background color
	$background_color_style = (strlen($background_color) > 0) ? 'background-color: ' . esc_attr($background_color) . ';' : '';
		
	$image_output = '';
	if (strlen($image_id) > 0) {
		$image = wp_get_attachment_image_src($image_id, 'full');
	
		if ($image_type == 'fluid') {
			$height_style = ''; // Remove the banner height if a regular image is used
			$banner_class .= 'image-type-fluid';
			$image_output .= '<img src="' . esc_url($image[0]) . '" />';
		} else {
			// Image height style
			$height = intval($height);
			$height_style = ($height > 0) ? 'height: ' . $height . 'px; ' : '';
		
			$banner_class .= 'image-type-css';
			$image_output .= '<div class="thmlv-banner-image" style="' . $height_style . 'background-image: url(' . esc_url($image[0]) . ');"></div>';
		}
			
		$banner_height_style = '';
	} else {
		// No image class
		$banner_class .= 'image-type-none';
	
		// Banner height style
		$height = intval($height);
		$banner_height_style = ($height > 0) ? 'height: ' . $height . 'px; ' : '';
	}
		
	// CSS animation
	if (strlen($text_animation) > 0) {
		$animation_class = ' animated';
		$animation_data = ' data-animate="' . esc_attr($text_animation) . '"';
	} else {
		$animation_class = '';
		$animation_data = '';
	}
		
	// Text
	$content_output = '';
	$content_output .= (strlen($title) > 0) ? '<h2 style="color:'.$text_color.';">' . $title . '</h2>' : '';
	$content_output .= (strlen($subtitle) > 0) ? '<h3 class="thmlv-alt-font"  style="color:'.$text_color.';">' . $subtitle . '</h3>' : '';
		
	// Link
	$banner_link_open_output = $banner_link_close_output = '';
	$link_class = '';
	if (strlen($custom_link) > 0) {
		$banner_link = vc_build_link($custom_link);
		if ($link_type === 'banner_link') {
			$banner_link_open_output = '<a href="' . esc_url($banner_link['url']) . '" class="thmlv-banner-link thmlv-banner-link-full' . $link_class . '">';
			$banner_link_close_output = '</a>';
		} else {
			$content_output = '<a href="' . esc_url($banner_link['url']) . '" class="thmlv-banner-link' . $link_class . '">' . $content_output . '</a>';
		}
	}
		
	// Display banner content?
	if (strlen($content_output) > 0) {
		// Text position array
		$text_position = explode('-', $text_position);
		
		// Content markup
		$content_output = '
			<div class="thmlv-banner-content">
				<div class="thmlv-banner-content-inner">
					<div class="thmlv-banner-text ' . $text_position[0] . ' ' . $text_position[1] . ' ' . $text_alignment . '" style="width: 57%;">
						<div class="thmlv-banner-text-inner' . $animation_class . '"' . $animation_data . '>' . $content_output . '</div>
					</div>
				</div>
			</div>';
	}
		
	// Banner markup
	$banner_output = '
		<div class="thmlv-banner ' . $banner_class . '" style="' . $banner_height_style . $background_color_style . '">' .
			$banner_link_open_output .
				$image_output .
				$content_output .
			$banner_link_close_output . '
		</div>';
		
	return $banner_output;
}
	
add_shortcode( 'thmlv_banner', 'thmlv_shortcode_banner' );
	