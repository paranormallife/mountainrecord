<?php
/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/	
function thmlv_shortcode_button($atts, $content = NULL) {
	extract(shortcode_atts(array(
		'title'	=> __('Button with Text', 'themelovin'),
		'link' 	=> '',
		'style'	=> 'filled',
		'bgcolor'	=> '',
		'txtcolor'	=> '',
		'size' 	=> 'lg',
		'align'	=> 'left'
	), $atts));
	
	// Parse link
	$link = ($link == '||') ? '' : $link;
	$link = vc_build_link($link);
	$a_href = $link['url'];
	$a_title = $link['title'];
	
	// Class
	$button_class = 'thmlv-btn thmlv-btn-'.esc_attr($size).' thmlv-btn-'.esc_attr($style);
	
	// Background style
	$bg_style = $txt_style = '';
	if (strlen($bgcolor) > 0) {
		$bg_style = ' style="background-color:'.$bgcolor.';"';
	}
	if (strlen($txtcolor) > 0) {
		$txt_style = ' style="color:'.$txtcolor.';"';
	}
	
	$output = '
		<div class="thmlv-btn-align-'.$align.'">
			<a href="'.esc_url($a_href).'" class="'.$button_class.'" title="'.esc_attr($a_title).'" '.$txt_style.'>
				<span class="thmlv-btn-title">'.esc_attr($title).'</span>
				<span class="thmlv-btn-bg"'.$bg_style.'></span>
			</a>
		</div>';
		
	return $output;
}	
add_shortcode('thmlv_button', 'thmlv_shortcode_button');