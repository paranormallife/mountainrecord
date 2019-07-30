<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'new_nav' => 'New Header Navigation'
	) );
}

// Header override
if(!function_exists('oslo_child_switch_header')) {
	function oslo_child_switch_header($id = NULL) {
		global $thmlvOptions;
		$walker = new rc_scm_walker;
		if(is_home()) {
			$id = get_option('page_for_posts');
		}
		if(is_category()) {
			$titlePosition = 'thmlvTitleBottomLeft';
		}
		elseif(is_archive() || is_search() || is_404()) {
			$titlePosition = 'thmlvTitleCenter';
		} 
		else {
			$titlePosition = esc_attr(get_post_meta($id, '_oslo_title_position', true));
		}
		$type = esc_attr(get_post_meta($id, '_oslo_header_type', true));
		if(esc_attr(get_post_meta($id, '_oslo_header_height', true)) != '') {
			$class = esc_attr(get_post_meta($id, '_oslo_header_height', true));
		}
		else {
			$class = 'thmlvAutoHeight';
		}
		$height = esc_attr(get_post_meta($id, '_oslo_header_value', true));
		$slider = esc_attr(get_post_meta($id, '_oslo_slider_revolution', true));
		$hideTitle = esc_attr(get_post_meta($id, '_oslo_title_hide', true));
		if(isset($thmlvOptions['oslo-logo-light']['url'])) {
			$lightLogo = esc_url($thmlvOptions['oslo-logo-light']['url']);
		} else {
			$lightLogo = '';
		};
		if(isset($thmlvOptions['oslo-logo-dark']['url'])) {
			$darkLogo = esc_url($thmlvOptions['oslo-logo-dark']['url']);
		} else {
			$darkLogo = '';
		};
		if(isset($thmlvOptions['oslo-menu'])) {
			$menuType = esc_attr($thmlvOptions['oslo-menu']);
		} else {
			$menuType = 'thmlvHamburgerMenu';
        }
        $output .= '<div id="osloChildNav">';
		$output .= '<div id="thmlvMobileMenuWrap" class="oslo-child"><div id="thmlvMobileMenuScroll">';
		$output .= wp_nav_menu(array('theme_location' => 'new_nav', 'sort_column' => 'menu_order', 'container'=> 'nav', 'fallback_cb' => false, 'depth' => 3, 'echo' => false));
		$output .= '</div></div>';
		if( is_home() ) {
			$output .= '<div class="home-header-wrap">';
			$output .= '<div class="home-header">';
			$output .= 		'<img class="home-hero" src="' . get_header_image() . '" />';
			$output .= '</div>';
			$output .= '<div class="home-nav-wrap">';
		}
		$output .= '<div class="header-brand">';
		$output .= '<div id="thmlvLogo" class="oslo-child logo"><h1>';
		if( is_home() ) {
			$output .= '<img src="' . get_stylesheet_directory_uri() . '/assets/logo-home-2.png" />';
		} else {
			$output .= oslo_switch_logo($id, $lightLogo, $darkLogo);
		}
		$output .= '</h1></div>';
		$output .= '<div id="thmlvMenuWrap" class="'.$menuType.' oslo-child">';
		$output .= wp_nav_menu(array('theme_location' => 'new_nav', 'container_id' => 'thmlvHeaderMenu', 'sort_column' => 'menu_order', 'container'=> 'nav', 'fallback_cb' => false, 'depth' => 3, 'echo' => false, 'walker' => $walker));
		$output .= '<span id="thmlvMenuIcon"><span id="thmlvHamburger"><span></span><span></span><span></span><span></span></span></span></div>';
		$output .= '</div><!-- END #osloChildNav -->';
		$output .= '</div><!-- END .header-brand -->';
		if( is_home() ) {
			$output .= '</div><!-- END .home-nav-wrap -->';
			$output .= '</div><!-- END .home-header-wrap -->';
		}
		if(!is_page_template('thmlv-page-portfolio.php') && $type != 'none' && !is_post_type_archive()) {
			$output .= '<header id="thmlvHeader" class="'.$class.'" data-height-value="'.$height.'">';
			if($hideTitle != 'on' && !is_page_template('thmlv-page-portfolio.php')) {
				$output .= '<div id="thmlvSectionTitle" class="'.$titlePosition.'">'.oslo_switch_title($id).'</div>';
			}
			if('gallery' == get_post_format($id)) {
				$output .= oslo_header_gallery($id);
			}
			if($type == 'video') {
				$output .= oslo_video_featured($id, FALSE);
			} elseif ($type == 'slider') {
				$output .= do_shortcode('[rev_slider '.$slider.']');
			}
			$output .= '</header>';
		}
		echo $output;
	}
}

function oslo_child_slug_widgets_init() {
	if(function_exists('register_sidebar')) {
	
		register_sidebar(array(
			'name' => 'Homepage Post Tiles',
			'id' => 'homepage-post-tiles',
			'description'   => esc_html__('Tiled Feature of Selected Posts on Homepage', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="post-tiles">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
	
		register_sidebar(array(
			'name' => 'Homepage Featured Posts',
			'id' => 'homepage-featured-posts',
			'description'   => esc_html__('Columns of Featured Posts on Homepage', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="homepage-featured-posts">',
			'after_widget' => '</div>',
			'before_title' => '<h2 style="display: none;">',
			'after_title' => '</h2>',
		));
	}
}

add_action('widgets_init', 'oslo_child_slug_widgets_init');
