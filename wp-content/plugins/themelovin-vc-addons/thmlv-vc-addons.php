<?php
/* ---------------------------------------------------------------------------------------

Plugin Name: Themelovin Visual Composer Addons
Plugin URI: http://www.themelovin.com
Description: Some Addons for Visual Composer.
Version: 1.0.4
Author: Themelovin
Author URI: http://www.themelovin.com

/*------------------------------------------------------------------------------------- */

define('VC_DIR', dirname(__FILE__));
define('VC_URL', WP_PLUGIN_URL . "/" . basename(VC_DIR));

global $thmlv_vc_active;
include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
if(is_plugin_active('js_composer/js_composer.php')) {
	$thmlv_vc_active = TRUE;
} else {
	$thmlv_vc_active = FALSE;
}

add_image_size('thmlvTeamVC', 600, 600, true);

/*-----------------------------------------------------------------------------------*/
/*	Load component(s)
/*-----------------------------------------------------------------------------------*/

include(VC_DIR .'/elements-config.php');

/*-----------------------------------------------------------------------------------*/
/*	Set element template files directory
/*-----------------------------------------------------------------------------------*/

if($thmlv_vc_active) {
	$vc_element_templates_dir = VC_DIR.'/templates/';
	vc_set_shortcodes_templates_dir($vc_element_templates_dir);
}

/*-----------------------------------------------------------------------------------*/
/*	Set element un-deprecated
/*-----------------------------------------------------------------------------------*/
if($thmlv_vc_active) {
	function thmlv_vc_undeprecate_elements() {
		vc_map_update('vc_tabs', array('deprecated' => false));
		vc_map_update('vc_tour', array('deprecated' => false));
		vc_map_update('vc_accordion', array('deprecated' => false));
	}
	add_action('init', 'thmlv_vc_undeprecate_elements');
}

/*-----------------------------------------------------------------------------------*/
/*	Functions
/*-----------------------------------------------------------------------------------*/

// Get taxonomy list
if(!function_exists('thmlv_post_categories')) {
	function thmlv_post_categories($id = NULL, $taxonomy = 'category', $link = true) {
		$output = '';
		$all = wp_get_object_terms($id, $taxonomy);
		if(!empty($all)){
			$output = '<span class="thmlvSectionCategoriesVC">';
			if(!is_wp_error($all)){
				$lastItem = (end($all));
				foreach($all as $current) {
					if($current) {
						if($link) {
							@$output .= '<a href="'.get_term_link($current->slug, $taxonomy).'" title="'.esc_attr($current->name).'" class="category">'.esc_attr($current->name).'</a>';
						}
						else {
							$output .= $current->name;
						}
						if($lastItem->term_id != $current->term_id)
							$output .= ', ';
					}
				}
			}
			$output .= '</span>';
		}
		return $output;
	}
}

// Switch between title
if(!function_exists('thmlv_switch_loop_title')) {
	function thmlv_switch_loop_title($id = NULL, $link = FALSE, $truncate = 200) {
		//$url = thmlv_addhttp(get_post_meta($id, '_thmlv_link_url', true));
		$url = '';
		if(get_post_meta($id, '_thmlv_custom_title', true) != '') {
			$title = esc_attr(get_post_meta($id, '_thmlv_custom_title', true));
		} else {
			$title = get_the_title($id);
		}
		
		if(strlen($title) >= $truncate) {
			$title = $title." "; 
			$title = substr($title, 0, $truncate); 
			$title = substr($title, 0, strrpos($title,' ')); 
			$title = $title."...";
		}
		
		$output = '<h1>';
		if($link) {
			if(get_post_format($id) == 'link') {
				if(isset($url['url'])) {
					$output .= '<a href="'.esc_url($url['url']).'" title="'.$title.'">';
				} else {
					$output .= '<a href="#" title="'.$title.'">';
				}
			} else {
				$output .= '<a href="'.get_permalink($id).'" title="'.$title.'">';
			}
		}
		$output .= $title;
		if($link == 1) {
			$output .= '</a>';
		}
		$output .= '</h1>';
		return $output;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Stuff
/*-----------------------------------------------------------------------------------*/

// Enqueue styles / scripts
function thmlv_vc_frontend_assets() {
	// Animate
	wp_enqueue_style('animate', VC_URL.'/styles/animate.css', array(), '1.0', 'all');
	// Font awesome
	wp_enqueue_style('font-awesome', VC_URL.'/styles/font-awesome.min.css', array(), '1.0', 'all');
	// Slick
	wp_enqueue_style('slick-css', VC_URL.'/styles/slick.min.css', array(), '1.0', 'all');
	// Slick theme
	wp_enqueue_style('slick-theme-css', VC_URL.'/styles/slick-theme.min.css', array(), '1.0', 'all');
	// VC styles
	wp_enqueue_style('thmlv-vc-css', VC_URL.'/styles/thmlv-js-composer.css', array(), '1.0', 'all');
	// Isotope
	wp_enqueue_script('isotope', VC_URL.'/include/isotope.pkgd.min.js', array('jquery'), false, true);
	// Modernizr
	wp_enqueue_script('modernizr-vc', VC_URL.'/include/modernizr-custom.js', array('jquery'), false, true);
	// Packery
	wp_enqueue_script('packery', VC_URL.'/include/packery.pkgd.min.js', array('jquery'), false, true);
	// Slick
	wp_enqueue_script('slick-js', VC_URL.'/include/slick.min.js', array('jquery'), false, true);
	// Custom JS
	wp_enqueue_script('thmlv-vc-js', VC_URL.'/include/thmlv-js-composer.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'thmlv_vc_frontend_assets', 1);

function thmlv_vc_admin_assets() {
	// VC admin styles
	wp_enqueue_style( 'thmlv-vc-admin-css', VC_URL.'/styles/thmlv-js-composer-admin.css', array(), '1.0', 'all' );
}
add_action( 'admin_print_scripts', 'thmlv_vc_admin_assets');

// Disable frontend editor
if($thmlv_vc_active) {
	vc_disable_frontend();
}

// Include external shortcodes
function thmlv_vc_register_shortcodes() {
	include(VC_DIR.'/shortcodes/banner.php');
	include(VC_DIR.'/shortcodes/banner-slider.php');
	include(VC_DIR.'/shortcodes/button.php');
	include(VC_DIR.'/shortcodes/google-maps.php');
	include(VC_DIR.'/shortcodes/mailchimp.php');
	include(VC_DIR.'/shortcodes/portfolio-masonry.php');
	include(VC_DIR.'/shortcodes/post-slider.php');
	include(VC_DIR.'/shortcodes/social-profiles.php');
	include(VC_DIR.'/shortcodes/team.php');
}
add_action('init', 'thmlv_vc_register_shortcodes');

// Include external elements
if (is_admin()) {
	function thmlv_vc_register_elements() {
		include(VC_DIR.'/elements/banner.php');
		include(VC_DIR.'/elements/banner-slider.php');
		include(VC_DIR.'/elements/button.php');
		include(VC_DIR.'/elements/google-maps.php');
		include(VC_DIR.'/elements/mailchimp.php');
		include(VC_DIR.'/elements/portfolio-masonry.php');
		include(VC_DIR.'/elements/post-slider.php');
		include(VC_DIR.'/elements/social-profiles.php');
		include(VC_DIR.'/elements/team.php');
	}
	add_action('vc_build_admin_page', 'thmlv_vc_register_elements');
}

?>