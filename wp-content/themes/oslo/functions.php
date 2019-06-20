<?php

$thmlvOptions = get_option('redux_builder_themelovin');

/*-----------------------------------------------------------------------------------*/
/*	TGM plugin activation
/*-----------------------------------------------------------------------------------*/
require_once("themelovin/class-tgm-plugin-activation.php");

if(!function_exists('oslo_register_required_plugins')) {
	function oslo_register_required_plugins() {
	
		$plugins = array(
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'      => 'Redux Framework',
				'slug'      => 'redux-framework',
				'required'  => true,
			),
			array(
				'name'                  => 'Revolution slider',
				'slug'                  => 'revslider',
				'source'                => get_template_directory_uri().'/include/plugins/revslider.zip',
				'required'              => false,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			),
 			array(
				'name'                  => 'Themelovin Portfolio',
				'slug'                  => 'themelovin-portfolio',
				'source'                => get_template_directory_uri().'/include/plugins/themelovin-portfolio.zip',
				'required'              => true,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			),
			array(
				'name'                  => 'Themelovin Team',
				'slug'                  => 'themelovin-team',
				'source'                => get_template_directory_uri().'/include/plugins/themelovin-team.zip',
				'required'              => true,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			),
			array(
				'name'                  => 'Themelovin Twitter',
				'slug'                  => 'themelovin-twitter',
				'source'                => get_template_directory_uri().'/include/plugins/themelovin-twitter.zip',
				'required'              => false,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			),
			array(
				'name'                  => 'Visual Composer',
				'slug'                  => 'js_composer',
				'source'                => get_template_directory_uri().'/include/plugins/js_composer.zip',
				'required'              => false,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			),
			array(
				'name'                  => 'Themelovin VC Addons',
				'slug'                  => 'themelovin-vc-addons',
				'source'                => get_template_directory_uri().'/include/plugins/themelovin-vc-addons.zip',
				'required'              => false,
				'version'               => '',
				'force_activation'      => false,
				'force_deactivation'    => false,
				'external_url'          => '',
			)
		);
		$theme_text_domain = 'oslo';
 
		$config = array(
			'domain'            => 'oslo',
			'default_path'      => '',
			'parent_slug'  		=> 'themes.php',
			'menu'              => 'install-required-plugins',
			'has_notices'       => true,
			'is_automatic'      => false,
			'message'           => '',
			'strings'           => array(
				'page_title'                                => esc_html__('Install Required Plugins', 'oslo'),
				'menu_title'                                => esc_html__('Install Plugins', 'oslo'),
				'installing'                                => esc_html__('Installing Plugin: %s', 'oslo'), // %1$s = plugin name
				'oops'                                      => esc_html__('Something went wrong with the plugin API.', 'oslo'),
				'notice_can_install_required'               => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'oslo'), // %1$s = plugin name(s)
				'notice_can_install_recommended'            => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'oslo'), // %1$s = plugin name(s)
				'notice_cannot_install'                     => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'oslo'), // %1$s = plugin name(s)
				'notice_can_activate_required'              => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'oslo'), // %1$s = plugin name(s)
				'notice_can_activate_recommended'           => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'oslo'), // %1$s = plugin name(s)
				'notice_cannot_activate'                    => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'oslo'), // %1$s = plugin name(s)
				'notice_ask_to_update'                      => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'oslo'), // %1$s = plugin name(s)
				'notice_cannot_update'                      => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'oslo'), // %1$s = plugin name(s)
				'install_link'                              => _n_noop('Begin installing plugin', 'Begin installing plugins', 'oslo'),
				'activate_link'                             => _n_noop('Activate installed plugin', 'Activate installed plugins', 'oslo'),
				'return'                                    => esc_html__('Return to Required Plugins Installer', 'oslo'),
				'plugin_activated'                          => esc_html__('Plugin activated successfully.', 'oslo'),
				'complete'                                  => esc_html__('All plugins installed and activated successfully. %s', 'oslo') // %1$s = dashboard link
			)
		);
		tgmpa( $plugins, $config ); 
	}
	add_action( 'tgmpa_register', 'oslo_register_required_plugins');
}

/*-----------------------------------------------------------------------------------*/
/*	Load sidebar(s)
/*-----------------------------------------------------------------------------------*/

function oslo_slug_widgets_init() {
	if(function_exists('register_sidebar')) {
	
		register_sidebar(array(
			'name' => 'Footer 1 widget',
			'id' => 'footer1widget',
			'description'   => esc_html__('First widgetized area, appears into the footer', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="thmlvWidgetTitle">',
			'after_title' => '</h4>',
		));
	
		register_sidebar(array(
			'name' => 'Footer 2 widget',
			'id' => 'footer2widget',
			'description'   => esc_html__('Second widgetized area, appears into the footer', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="thmlvWidgetTitle">',
			'after_title' => '</h4>',
		));
	
		register_sidebar(array(
			'name' => 'Footer 3 widget',
			'id' => 'footer3widget',
			'description'   => esc_html__('Third widgetized area, appears into the footer', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="thmlvWidgetTitle">',
			'after_title' => '</h4>',
		));
	
		register_sidebar(array(
			'name' => 'Footer 4 widget',
			'id' => 'footer4widget',
			'description'   => esc_html__('Fourth widgetized area, appears into the footer', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="thmlvWidgetTitle">',
			'after_title' => '</h4>',
		));
	
		register_sidebar(array(
			'name' => 'Homepage Post Tiles',
			'id' => 'homepage-post-tiles',
			'description'   => esc_html__('Tiled Feature of Selected Posts on Homepage', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="post-tiles">',
			'after_widget' => '</div>',
			'before_title' => '<h4 style="display: none;">',
			'after_title' => '</h4>',
		));
	
		register_sidebar(array(
			'name' => 'Homepage Featured Posts',
			'id' => 'homepage-featured-posts',
			'description'   => esc_html__('Columns of Featured Posts on Homepage', 'oslo'),
			'class' => '',
			'before_widget' => '<div id="homepage-featured-posts">',
			'after_widget' => '</div>',
			'before_title' => '<h4 style="display: none;">',
			'after_title' => '</h4>',
		));
	}
}
add_action('widgets_init', 'oslo_slug_widgets_init');

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript(s)
/*-----------------------------------------------------------------------------------*/

if(!function_exists('oslo_load_admin_scripts')) {
	function oslo_load_admin_scripts() {
		wp_enqueue_script('thmlv_admin_js', get_template_directory_uri().'/themelovin/include/jquery.admin.js', array('jquery'));
	}
	add_action('admin_enqueue_scripts', 'oslo_load_admin_scripts');
}

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin CSS
/*-----------------------------------------------------------------------------------*/

if(!function_exists('oslo_admin_styles')) {
	function oslo_admin_styles() {
		wp_enqueue_style('oslo_admin_css', get_template_directory_uri().'/themelovin/styles/thmlv-admin.css');
	}
	add_action('admin_print_styles', 'oslo_admin_styles');
}

/*-----------------------------------------------------------------------------------*/
/*	Load other function(s)
/*-----------------------------------------------------------------------------------*/

if(!function_exists('oslo_load_scripts')) {
	function oslo_load_scripts() {
		if(!is_admin()) {
			// comment reply
			if(is_singular() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
			// modernizr
			wp_enqueue_script('oslo-modernizr', get_template_directory_uri().'/include/modernizr-custom.js', array('jquery'), false, true);
			// responsive script
			wp_enqueue_script('oslo-respond', get_template_directory_uri().'/include/respond.min.js', array('jquery'), false, true);
			// fitvid
			wp_enqueue_script('oslo-fitvid', get_template_directory_uri().'/include/jquery.fitvids.js', array('jquery'), false, true);
			// rgbaster
			wp_enqueue_script('oslo-rgbaster', get_template_directory_uri().'/include/rgbaster.min.js', array('jquery'), false, true);
			// pace
			wp_enqueue_script('oslo-pace', get_template_directory_uri().'/include/pace.min.js', array('jquery'), false, true);
			// imagesloaded
			wp_enqueue_script('oslo-imagesloaded', get_template_directory_uri().'/include/imagesloaded.pkgd.min.js', array('jquery'), false, true);
			// hammer
			wp_enqueue_script('oslo-hammer', get_template_directory_uri().'/include/hammer.js', array('jquery'), false, true);
			// sharrre
			wp_enqueue_script('oslo-sharrre', get_template_directory_uri().'/include/jquery.sharrre.min.js', array('jquery'), false, true);
			// superslides
			wp_enqueue_script('oslo-superslides', get_template_directory_uri().'/include/jquery.superslides.js', array('jquery'), false, true);
			if(is_page_template('thmlv-page-portfolio-masonry.php')) {
				wp_enqueue_script('oslo-isotope', get_template_directory_uri().'/include/isotope.pkgd.min.js', array('jquery'), false, true);
				wp_enqueue_script('oslo-packery', get_template_directory_uri().'/include/packery.pkgd.min.js', array('jquery'), false, true);
			}
			// themelovin's script
			wp_enqueue_script('oslo-themelovin', get_template_directory_uri().'/include/jquery.themelovin.js', array('jquery'), false, true);
		}
	}
	add_action('wp_enqueue_scripts', 'oslo_load_scripts');
}

if(!function_exists('oslo_load_styles')) {
	function oslo_load_styles() {
		wp_enqueue_style('default', get_stylesheet_uri());
		if(is_home() || is_page_template('thmlv-page-blog-list.php') || is_singular('post') || is_archive()) {
			wp_enqueue_style('oslo-blog', get_template_directory_uri().'/styles/blog.css');
		}
		if(is_page_template('thmlv-page-portfolio.php') || is_page_template('thmlv-page-portfolio-masonry.php') || is_singular('portfolio') || is_tax('skills')) {
			wp_enqueue_style('oslo-portfolio', get_template_directory_uri().'/styles/portfolio.css');
		}
		if(is_singular('team') || is_tax('tasks')) {
			wp_enqueue_style('oslo-team', get_template_directory_uri().'/styles/team.css');
		}
		wp_enqueue_style('oslo-responsive', get_template_directory_uri().'/styles/responsive.css');
		wp_enqueue_style('ltlmtn', get_template_directory_uri().'/styles/ltlmtn.css');
	}
	add_action('wp_enqueue_scripts', 'oslo_load_styles');
}

/*-----------------------------------------------------------------------------------*/
/*	Includes
/*-----------------------------------------------------------------------------------*/

//Include CMB2: Wordpress Metabox
include(get_template_directory()."/themelovin/metabox/init.php");
include(get_template_directory()."/themelovin/metabox/metabox.php");

//Include Redux Framework: Wordpress Admin Panel
include(get_template_directory()."/themelovin/redux-framework/options-init.php");

//Include Menu Custom & Walker
include(get_template_directory()."/themelovin/menu/custom-menu.php");

/*-----------------------------------------------------------------------------------*/
/*	Widget(s)
/*-----------------------------------------------------------------------------------*/

include(get_template_directory()."/themelovin/widgets/widget-social.php");

/*-----------------------------------------------------------------------------------*/
/*	Stuff
/*-----------------------------------------------------------------------------------*/

if(!isset($content_width)) $content_width = 1080;

// Add extra functions
if(function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('gallery', 'link', 'video'));
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
}

// Add image sizes
if(function_exists('add_image_size')) {
	add_image_size('oslo-blogClassic', 860, 0, false);
}

// Add custom menu
if(function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
			'header-menu' => esc_html__('Header Menu', 'oslo')
		)
	);	
}

// Create dynamic CSS
if(!function_exists('oslo_custom_css')) {
	function oslo_custom_css($content) {
		$output = '';
		global $thmlvOptions;
		$blog_id = get_option('page_for_posts');
		$logo_height = esc_attr($thmlvOptions['oslo-logo-height']);
		$output .= 'h1, h2, h3, h4, h5, h6, .oslo-btn-title, #thmlvHeaderMenu a, #thmlvMobileMenuScroll a, .thmlvNextPostLink #thmlvNextTitle, .thmlvSelectedSwitch, .vc_tta-title-text, .author {';
		$output .= 'font-family:'.$thmlvOptions['oslo-main-typo']['font-family'].', sans-serif;';
		$output .= '}';
		
		$output .= 'h1, h2, h3, h4, h5, h6, strong, .thmlvListPost, .thmlvNextPostLink #thmlvNextPostLink, .vc_tta-title-text, .vc_toggle_icon:after, .vc_toggle_icon:before, .author, blockquote, .dropcap {';
		$output .= 'color: '.$thmlvOptions['oslo-titles-font-color'].';';
		$output .= '}';
		
		$output .= '#thmlvAuthor, #thmlvCopyright, .thmlvEntryMeta, .thmlvNextPostLink #thmlvNextText, #thmlvSectionTitle h4, .thmlvSectionCategories, .thmlvSectionCategoriesVC, #thmlvToTop, .oslo-alt-font, .oslo-post-meta, .oslo-team-member-content .thmlvSectionCategoriesVC, .thmlvAuthorMeta .pubtime {';
		$output .= 'font-family:'.$thmlvOptions['oslo-secondary-typo']['font-family'].', sans-serif;';
		$output .= '}';
		
		$output .= '.pace .pace-progress {';
		$output .= 'background-color: '.$thmlvOptions['oslo-loading-color'].';';
		$output .= '}';
		
		$output .= 'body {';
		if($thmlvOptions['oslo-main-background']['background-color'] != '') {
			$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-main-background']['background-color']).';';
		}
		if(isset($thmlvOptions['oslo-main-background']['background-image']) && $thmlvOptions['oslo-main-background']['background-image'] != '') {
			$output .= 'background-image: url('.esc_attr($thmlvOptions['oslo-main-background']['background-image']).');';
			if($thmlvOptions['oslo-main-background']['background-repeat'] != '') {
				$output .= 'background-repeat: '.esc_attr($thmlvOptions['oslo-main-background']['background-repeat']).';';	
			}
			if($thmlvOptions['oslo-main-background']['background-size'] != '') {
				$output .= 'background-size: '.esc_attr($thmlvOptions['oslo-main-background']['background-size']).';';	
			}
			if($thmlvOptions['oslo-main-background']['background-attachment'] != '') {
				$output .= 'background-attachment: '.esc_attr($thmlvOptions['oslo-main-background']['background-attachment']).';';	
			}
			if($thmlvOptions['oslo-main-background']['background-position'] != '') {
				$output .= 'background-position: '.esc_attr($thmlvOptions['oslo-main-background']['background-position']).';';	
			}
		}
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-main-font-color']).';';
		$output .= 'font-family:'.esc_attr($thmlvOptions['oslo-body-typo']['font-family']).', sans-serif;';
		if(isset($thmlvOptions['oslo-body-typo']['font-weight'])) {
			$output .= 'font-weight:'.esc_attr($thmlvOptions['oslo-body-typo']['font-weight']).';';
		}
		$output .= '}';
		
		$output .= 'input, textarea {';
		$output .= 'font-family:'.esc_attr($thmlvOptions['oslo-body-typo']['font-family']).', sans-serif;';
		$output .= '}';
		
		$output .= 'a, .vc_tta.vc_general .vc_tta-panel-title>a:hover, .thmlvClassicPost h1 a, .thmlvListPost a, .thmlvEntryMeta {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-hightlight-color']).';';
		$output .= '}';
		
		$output .= '#thmlvPostNavigation li.active .thmlvNavNum, .slick-dots li.slick-active button {';
		$output .= 'border-color: '.esc_attr($thmlvOptions['oslo-hightlight-color']).';';
		$output .= '}';

		$output .= '#thmlvLogo img {';
		$output .= 'max-height: '.$logo_height.'px;';
		$output .= '}';
		
		$output .= '.thmlvDarkLayout #thmlvHeader *:not(div), .thmlvDarkLayout #thmlvHeaderMenu a, .thmlvDarkLayout #thmlvLogo a, .thmlvDarkLayout .thmlvSelectedSwitch {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-dark-color']).';';
		$output .= '}';
		
		$output .= '.thmlvDarkLayout #thmlvHamburger span {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-dark-color']).';';
		$output .= '}';
		
		$output .= '.thmlvLightLayout #thmlvHeader *:not(div), .thmlvLightLayout #thmlvHeaderMenu a, .thmlvLightLayout #thmlvLogo a, .thmlvLightLayout .thmlvSelectedSwitch {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-light-color']).';';
		$output .= '}';
		
		$output .= '.thmlvLightLayout #thmlvHamburger span {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-light-color']).';';
		$output .= '}';
		
		$output .= '#thmlvFooter, .thmlvMobileActive #thmlvMobileMenuWrap {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-footer-background-color']).';';
		$output .= '}';
		
		$output .= '#thmlvFooter, #thmlvFooter a, .thmlvMobileActive #thmlvMobileMenuWrap a {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-footer-font-color']).';';
		$output .= '}';
		
		$output .= '#thmlvFooter a:hover, .thmlvMobileActive #thmlvMobileMenuWrap a:hover {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-footer-hightlight-color']).';';
		$output .= '}';
		
		$output .= '#thmlvFooter h1, #thmlvFooter h2, #thmlvFooter h3, #thmlvFooter h4, #thmlvFooter h5, #thmlvFooter h6 {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-footer-heading-color']).';';
		$output .= '}';
		
		$output .= '.oslo-widget-social a, .oslo-widget-social a:hover {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-footer-background-color']).' !important;';
		$output .= '}';
		
		$output .= '.oslo-widget-social a:hover {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-footer-hightlight-color']).';';
		$output .= '}';
		
		$output .= '.widget_tag_cloud a, .widget_tag_cloud a:hover {';
		$output .= 'color: '.esc_attr($thmlvOptions['oslo-footer-background-color']).' !important;';
		$output .= '}';
		
		$output .= '.widget_tag_cloud a {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-footer-font-color']).';';
		$output .= '}';
		
		$output .= '.widget_tag_cloud a:hover {';
		$output .= 'background-color: '.esc_attr($thmlvOptions['oslo-footer-hightlight-color']).';';
		$output .= '}';
		
		$tmp = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'page'
		));
		
		foreach($tmp as $item) {
			$headerType = get_post_meta($item->ID, '_oslo_header_type',true);
			$headerBgImage = get_post_meta($item->ID, '_oslo_background_image',true);
			$headerBgColor = get_post_meta($item->ID, '_oslo_background_color',true);
			$poster = get_post_meta($item->ID, '_oslo_video_poster',true);
			$headerMargin = get_post_meta($item->ID, '_oslo_header_margin',true);
			$bodyBgColor = get_post_meta($item->ID, '_oslo_selected_background_color',true);
			$bodyBgImage = get_post_meta($item->ID, '_oslo_selected_background_image',true);
			$footerMargin = get_post_meta($item->ID, '_oslo_footer_margin',true);
			
			// Header color / image background
			if($blog_id != $item->ID) {
				$output .= '.page-id-'.$item->ID.' #thmlvHeader {';
			} else {
				$output .= '.blog #thmlvHeader {';
			}
			if($headerType == 'image' && $headerBgImage != '') {
				$output .= 'background-image: url('.esc_url($headerBgImage).');';
			}
			$output .= 'background-color: '.esc_attr($headerBgColor).';';
			if($headerMargin == 'on') {
				$output .= 'margin-bottom: 0;';
			}
			$output .= '}';

			if($footerMargin == 'on') {
				if($blog_id != $item->ID) {
					$output .= '.page-id-'.$item->ID.' #thmlvFooter, .page-id-'.$item->ID.' #thmlvCommentsWrap {';
				} else {
					$output .= '.blog #thmlvFooter, .blog #thmlvCommentsWrap {';
				}
				$output .= 'margin-top: 0;';
				$output .= '}';
			} elseif($footerMargin == '' && $item->comment_status == 'open' || get_comments_number($item->ID) != 0) {
				if($blog_id != $item->ID) {
					$output .= '.page-id-'.$item->ID.' #thmlvFooter {';
				} else {
					$output .= '.blog #thmlvFooter {';
				}
				$output .= 'margin-top: 0;';
				$output .= '}';
			}
			
			if($bodyBgImage != '' || $bodyBgColor != '') {
				$output .= 'body.page-id-'.$item->ID.' {';
				if($bodyBgImage != '') {
					$output .= 'background-image: url('.esc_url($bodyBgImage).');';
				} else if($bodyBgColor != '') {
					$output .= 'background-color: '.esc_attr($bodyBgColor).';';
				}
				$output .= '}';
			}
			
			if($poster != '') {
				if($blog_id != $item->ID) {
					$output .= '.page-id-'.$item->ID.' #thmlvVideoWrap {';
				} else {
					$output .= '.blog #thmlvVideoWrap {';
				}
				$output .= 'background-image: url('.$poster.');';
				$output .= '}';
			}
		}
		
		// Check for each portfolio
		$tmp = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'portfolio'
		));
		
		foreach($tmp as $item) {
			$headerType = get_post_meta($item->ID, '_oslo_header_type',true);
			$headerBgImage = get_post_meta($item->ID, '_oslo_background_image',true);
			$headerBgColor = get_post_meta($item->ID, '_oslo_background_color',true);
			$imageCover = get_post_meta($item->ID, '_oslo_image_cover',true);
			$poster = get_post_meta($item->ID, '_oslo_video_poster',true);
			$headerMargin = get_post_meta($item->ID, '_oslo_header_margin',true);
			$footerMargin = get_post_meta($item->ID, '_oslo_footer_margin',true);
			
			$output .= '.post-'.$item->ID.'.thmlvSelected {';
			$output .= 'background-image: url('.esc_url($imageCover).');';
			$output .= '}';
			
			$output .= '.postid-'.$item->ID.' #thmlvHeader {';
			if($headerType == 'image' && $headerBgImage != '' && 'gallery' != get_post_format($item->ID)) {
				$output .= 'background-image: url('.esc_url($headerBgImage).');';
			}
			$output .= 'background-color: '.$headerBgColor.';';
			if($headerMargin == 'on') {
				$output .= 'margin-bottom: 0;';
			}
			$output .= '}';
			
			if($footerMargin == 'on') {
				$output .= '.postid-'.$item->ID.' #thmlvFooter {';
				$output .= 'margin-top: 0;';
				$output .= '}';
			}
			
			if($poster != '') {
				$output .= '.postid-'.$item->ID.' #thmlvVideoWrap {';
				$output .= 'background-image: url('.$poster.');';
				$output .= '}';
			}
		}
		
		// Check for each post
		$tmp = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'post'
		));
		
		foreach($tmp as $item) {
			$headerType = get_post_meta($item->ID, '_oslo_header_type',true);
			$headerBgImage = get_post_meta($item->ID, '_oslo_background_image',true);
			$headerBgColor = get_post_meta($item->ID, '_oslo_background_color',true);
			$poster = get_post_meta($item->ID, '_oslo_video_poster',true);
			$headerMargin = get_post_meta($item->ID, '_oslo_header_margin',true);
			$footerMargin = get_post_meta($item->ID, '_oslo_footer_margin',true);
			
			$output .= '.postid-'.$item->ID.' #thmlvHeader {';
			if($headerType == 'image' && $headerBgImage != '') {
				$output .= 'background-image: url('.esc_url($headerBgImage).');';
			}
			$output .= 'background-color: '.$headerBgColor.';';
			if($headerMargin == 'on') {
				$output .= 'margin-bottom: 0;';
			}
			$output .= '}';
			
			if($poster != '') {
				$output .= '.postid-'.$item->ID.' #thmlvVideoWrap {';
				$output .= 'background-image: url('.$poster.');';
				$output .= '}';
			}
		}
		
		// Check for each portfolio
		$tmp = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'team'
		));
		
		foreach($tmp as $item) {
			$headerType = get_post_meta($item->ID, '_oslo_header_type',true);
			$headerBgImage = get_post_meta($item->ID, '_oslo_background_image',true);
			$headerBgColor = get_post_meta($item->ID, '_oslo_background_color',true);
			$poster = get_post_meta($item->ID, '_oslo_video_poster',true);
			$headerMargin = get_post_meta($item->ID, '_oslo_header_margin',true);
			$footerMargin = get_post_meta($item->ID, '_oslo_footer_margin',true);
			
			$output .= '.postid-'.$item->ID.' #thmlvHeader {';
			if($headerType == 'image' && $headerBgImage != '' && 'gallery' != get_post_format($item->ID)) {
				$output .= 'background-image: url('.esc_url($headerBgImage).');';
			}
			$output .= 'background-color: '.$headerBgColor.';';
			if($headerMargin == 'on') {
				$output .= 'margin-bottom: 0;';
			}
			$output .= '}';
			
			if($footerMargin == 'on') {
				$output .= '.postid-'.$item->ID.' #thmlvFooter {';
				$output .= 'margin-top: 0;';
				$output .= '}';
			}
			
			if($poster != '') {
				$output .= '.postid-'.$item->ID.' #thmlvVideoWrap {';
				$output .= 'background-image: url('.$poster.');';
				$output .= '}';
			}
		}

		if(isset($thmlvOptions['oslo-custom-css']) && $thmlvOptions['oslo-custom-css'] != '') {
			$allowed_html_array = wp_kses_allowed_html();
			$output .= wp_kses($thmlvOptions['oslo-custom-css'], $allowed_html_array);
		}
		
		return $output;
	}
	add_action('oslo_custom_styles', 'oslo_custom_css', 10);
}

// Create CSS link
if(!function_exists('oslo_link_custom_styles')) {
	function oslo_link_custom_styles() {
		$output = '';
		if(apply_filters('oslo_custom_styles', $output)) {
			$permalink_structure = get_option('permalink_structure');
			$css = home_url().'/oslo-custom-styles.css?'.time();
			if(!$permalink_structure) $css = home_url().'/?page_id=oslo-custom-styles.css';
			echo '<link rel="stylesheet" href="'.$css.'" type="text/css" media="screen" />';
		}
	}
	add_action('wp_head', 'oslo_link_custom_styles', 10);
}

// Create custom CSS
if(!function_exists('oslo_create_custom_styles')) {
	function oslo_create_custom_styles() {
		$permalink_structure = get_option('permalink_structure');
		$css = false;

		if($permalink_structure){
			if(!isset($_SERVER['REQUEST_URI'])){
				$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);
				if(isset($_SERVER['QUERY_STRING'])){ $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
			}
			$url = (isset($GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'])) ? $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'] : $_SERVER["REQUEST_URI"];
			if(preg_replace('/\\?.*/', '', basename($url)) == 'oslo-custom-styles.css') $css = true;
		} else {
			if(isset($_GET['page_id']) && $_GET['page_id'] == 'oslo-custom-styles.css') $css = true;
		}

		if($css){
			$output = '';
			header('Content-Type: text/css');
			echo apply_filters('oslo_custom_styles', $output);
			exit;	
		}
	}
	add_action('init', 'oslo_create_custom_styles');
}

if(!function_exists('oslo_excerpt_length')) {
	function oslo_excerpt_length($length) {
		return 15;
	}
	add_filter('excerpt_length', 'oslo_excerpt_length', 999);
}

if(!function_exists('oslo_excerpt_more')) {
	function oslo_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'oslo_excerpt_more');
}

if(!function_exists('oslo_body_classes')) {
	function oslo_body_classes($classes) {
		if(is_home()) {
			$id = get_option('page_for_posts');
		} else {
			$id = get_the_ID();
		}
		if(get_post_meta($id, '_oslo_header_appeal', true) != '') {
			$class = ' '.esc_attr(get_post_meta($id, '_oslo_header_appeal', true));
		} else {
			$class = ' thmlvAutoLayout';
		}
		if(is_category()|| is_tax() || is_tag() || is_archive() || is_search()) {
			$class = ' thmlvAutoLayout';
		}
		if(is_category('33')) {
			$class = ' thmlvDarkLayout';
		}
		$classes[] = $class;	
		return $classes;
	}
	add_filter('body_class', 'oslo_body_classes');
}

// Add favicon
if(!function_exists('oslo_print_favicon')) {
	function oslo_print_favicon() {
		if (!function_exists('wp_site_icon')) {
			global $thmlvOptions;
			$output = '';
			if(isset($thmlvOptions['oslo-favicon'])) {
				$output .= '<link rel="shortcut icon" href="'.esc_url($thmlvOptions['oslo-favicon']['url']).'" />';
			}
			if(isset($thmlvOptions['oslo-touch-icon'])) {
				$output .= '<link rel="apple-touch-icon-precomposed" href="'.esc_url($thmlvOptions['oslo-touch-icon']['url']).'" />';
			}
			echo $output;
		}
	}
}

// Switch between logos
if(!function_exists('oslo_switch_logo')) {
	function oslo_switch_logo($id, $light, $dark) {
		$output = '<a href="'.home_url().'" title="'.get_bloginfo('name').'">';
		if('thmlvLightLayout' == esc_attr(get_post_meta($id, '_oslo_header_appeal', true)) && $dark != '') {
			$output .= '<img src="'.$dark.'" alt="'.get_bloginfo('name').'" />';
		} elseif('thmlvDarkLayout' == esc_attr(get_post_meta($id, '_oslo_header_appeal', true)) && $light != '') {
			$output .= '<img src="'.$light.'" alt="'.get_bloginfo('name').'" />';
		} elseif ($light != '' && $dark != '') {
			$output .= '<img src="'.esc_url($light).'" alt="'.get_bloginfo('name').'" data-appeal-light="'.esc_url($dark).'"  data-appeal-dark="'.esc_url($light).'" />';
		} else {
			$output .= get_bloginfo('name');
		}
		$output .= '</a>';
		return $output;
	}
}

// Return header layout
if(!function_exists('oslo_switch_header')) {
	function oslo_switch_header($id = NULL) {
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
		$output = '<div id="thmlvMobileMenuWrap"><div id="thmlvMobileMenuScroll">';
		$output .= wp_nav_menu(array('theme_location' => 'header-menu', 'sort_column' => 'menu_order', 'container'=> 'nav', 'fallback_cb' => false, 'depth' => 3, 'echo' => false));
		$output .= '</div></div>';
		$output .= '<div id="thmlvLogo"><h1>';
		$output .= oslo_switch_logo($id, $lightLogo, $darkLogo);
		$output .= '</h1></div>';
		$output .= '<div id="thmlvMenuWrap" class="'.$menuType.'">';
		$output .= wp_nav_menu(array('theme_location' => 'header-menu', 'container_id' => 'thmlvHeaderMenu', 'sort_column' => 'menu_order', 'container'=> 'nav', 'fallback_cb' => false, 'depth' => 3, 'echo' => false, 'walker' => $walker));
		$output .= '<span id="thmlvMenuIcon"><span id="thmlvHamburger"><span></span><span></span><span></span><span></span></span></span></div>';
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

if(!function_exists('oslo_header_gallery')) {
	function oslo_header_gallery($id, $size = 'full') {
		$attachments = array();
		$all_images = get_post_meta($id, '_oslo_gallery_images', true);
		foreach ((array)$all_images as $key => $val ) {
			$attachments[] = $key;
		}
		if(!empty($attachments)) {
			$output = '<div id="thmlvHeaderGallery"><div class="slides-container">';
			foreach($attachments as $attachment) {
				$thumb = wp_get_attachment_image_src($attachment, $size);
				$output .= '<img src="'.esc_url($thumb[0]).'" alt="" />';
			}
			$output .= '</div></div>';
		}
		return $output;
	}
}

// Return video
if(!function_exists('oslo_video_featured')) {
	function oslo_video_featured($id, $lazy = TRUE) {
		$embed = esc_url(get_post_meta($id, '_oslo_video_url', true));
		$poster = esc_url(get_post_meta($id, '_oslo_video_poster', true));
		if($poster .= '') {
			$poster = 'poster="'.$poster.'"';
		}
		$videos = array();
		$videos['mp4'] = esc_url(get_post_meta($id, '_oslo_video_mp4', true));
		$videos['webm'] = esc_url(get_post_meta($id, '_oslo_video_webm', true));
		$videos['ogg'] = esc_url(get_post_meta($id, '_oslo_video_ogv', true));
		$output = '<div id="thmlvVideoWrap"><video loop preload="auto" '.$poster.' muted autoplay>';
		foreach($videos as $key => $value) {
			if(!empty($value) && $lazy == FALSE) {
				$output .= '<source src="'.$value.'" type="video/'.$key.'">';
			} elseif(!empty($value) && $lazy == TRUE) {
				$output .= '<source src="#" data-src="'.$value.'" type="video/'.$key.'">';
			}
		}
		$output .= '</video></div>';
		return $output;
	}
}

// Switch between title
if(!function_exists('oslo_switch_title')) {
	function oslo_switch_title($id = NULL, $link = 0, $truncate = 200, $html = 1) {
		if(is_404()) {
			$title = '404 Error';
		} else if(is_search()) {
			$title = sprintf(esc_html__('Search Results for: %s', 'oslo'), get_search_query());
		} else if(is_category()) {
			$title = single_cat_title('', false);
		} else if(is_tax()) {
			$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			$title = $term->name;
		} else if(is_archive()) {
			if (is_day()) {
				$title = sprintf( esc_html__('Daily Archives: %s', 'oslo'), get_the_date());
			} elseif (is_month()) {
				$title = sprintf( esc_html__('Monthly Archives: %s', 'oslo'), get_the_date( _x( 'F Y', 'monthly archives date format', 'oslo')));
			} elseif (is_year()) {
				$title = sprintf( esc_html__('Yearly Archives: %s', 'oslo'), get_the_date( _x( 'Y', 'yearly archives date format', 'oslo')));
			} else {
				$title = esc_html__('Archives', 'oslo');
			}
		} else if($id == 0) {
			$title = '';
		}
		 else if(esc_attr(get_post_meta($id, '_oslo_custom_title', true)) != '') {
			$title = esc_attr(get_post_meta($id, '_oslo_custom_title', true));
		} else {
			$title = get_the_title($id);
		}
		
		if(strlen($title) >= $truncate) {
			$title = $title." "; 
			$title = substr($title, 0, $truncate); 
			$title = substr($title, 0, strrpos($title,' ')); 
			$title = $title."...";
		}
		$output = '';
		if($html == 1) {
			$output .= '<h3>';
		}
		if($link == 1) {
			$output .= '<a href="'.get_permalink($id).'" title="'.$title.'">';
		}
		$output .= $title;
		if($link == 1) {
			$output .= '</a>';
		}
		if($html == 1) {
			$output .= '</h3>';
		}
		if(is_page() || is_home() && get_post_meta($id, '_oslo_subtitle', true) != '') {
			$output .= '<h4>';
			$output .= esc_attr(get_post_meta($id, '_oslo_subtitle', true));
			$output .= '</h4>';
		} else if(is_singular('portfolio')) {
			$output .= oslo_post_categories($id, 'skills');
		}
		else if(is_singular('post')) {
			$output .= oslo_entry_meta($id);
		}
		else if(is_singular('team')) {
			$output .= oslo_post_categories($id, 'tasks');
			$output .= oslo_member_social($id);
		}
		return $output;
	}
}

// Create member social links list
if(!function_exists('oslo_member_social')) {
	function oslo_member_social($id) {
		$output = '<ul class="oslo-team-member-social-icons">';
		$social = array(
			'behance' => '_oslo_team_behance',
			'dribbble' => '_oslo_team_dribbble',
			'facebook' => '_oslo_team_facebook',
			'flickr' => '_oslo_team_flickr',
			'foursquare' => '_oslo_team_foursquare',
			'git' => '_oslo_team_git',
			'google' => '_oslo_team_google_plus',
			'instagram' => '_oslo_team_instagram',
			'linkedin' => '_oslo_team_linkedin',
			'pinterest' => '_oslo_team_pinterest',
			'rss' => '_oslo_team_rss',
			'soundscloud' => '_oslo_team_soundcloud',
			'skype' => '_oslo_team_skype',
			'tumblr' => '_oslo_team_tumblr',
			'twitter' => '_oslo_team_twitter',
			'vimeo' => '_oslo_team_vimeo',
			'weibo' => '_oslo_team_weibo',
			'youtube' => '_oslo_team_youtube'
		);
		$pictograms = array(
			'behance' => 'fa-behance',
			'dribbble' => 'fa-dribbble',
			'facebook' => 'fa-facebook',
			'flickr' => 'fa-flickr',
			'foursquare' => 'fa-foursquare',
			'git' => 'fa-git',
			'google' => 'fa-google-plus',
			'instagram' => 'fa-instagram',
			'linkedin' => 'fa-linkedin',
			'pinterest' => 'fa-pinterest',
			'rss' => 'fa-rss',
			'soundscloud' => 'fa-soundcloud',
			'skype' => 'fa-skype',
			'tumblr' => 'fa-tumblr',
			'twitter' => 'fa-twitter',
			'vimeo' => 'fa-vimeo-square',
			'weibo' => 'fa-weibo',
			'youtube' => 'fa-youtube'
		);
		$var = get_post_meta($id, 'oslo_team_mail', true);
		if(!empty($var)) {
			$output .= '<li><a href="mailto:'.$var.'" title="Mail us"><i class="fa fa-envelope-o "></i></a></li>';
		}
		foreach($social as $key => $value) {
			$var = get_post_meta($id, $value , true);
			if(!empty($var)) {
				$var = trim($var, '/');
				if(!preg_match('~^(?:f|ht)tps?://~i', $var)) {
					$var = 'http://'.$var;
				}
				$output .= '<li><a href="'.$var.'" title="Join us on '.$key.'" target="_blank"><i class="fa '.$pictograms[$key].' "></i></a></li>';
			}
		}
		$output .= '</ul>';
		return $output;
	}
}

// Switch between title
if(!function_exists('oslo_switch_loop_title')) {
	function oslo_switch_loop_title($id = NULL, $link = FALSE, $truncate = 200) {
		//$url = oslo_addhttp(get_post_meta($id, '_oslo_link_url', true));
		$url = '';
		if(get_post_meta($id, '_oslo_custom_title', true) != '') {
			$title = esc_attr(get_post_meta($id, '_oslo_custom_title', true));
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
				if('' != get_post_meta($id, '_oslo_link', true)) {
					$url = esc_url(get_post_meta($id, '_oslo_link', true)).'" target="_blank';
					$output .= '<a href="'.$url.'" title="'.$title.'">';
				} else {
					$output .= '<a href="#" title="'.$title.'">';
				}
			} else {
				$output .= '<a href="'.get_permalink($id).'" title="'.$title.'">';
			}
		}
		$output .= $title;
		if($link) {
			$output .= '</a>';
		}
		$output .= '</h1>';
		return $output;
	}
}

// Switch between title into loop
if(!function_exists('oslo_switch_loop_link')) {
	function oslo_switch_loop_link($id = NULL, $link = FALSE, $truncate = 200) {
		$url = oslo_addhttp(get_post_meta($id, '_oslo_link', true));
		if(get_post_meta($id, '_oslo_custom_title', true) != '') {
			$title = esc_attr(get_post_meta($id, '_oslo_custom_title', true));
		} else {
			$title = get_the_title($id);
		}
		if(strlen($title) >= $truncate) {
			$title = $title." "; 
			$title = substr($title, 0, $truncate); 
			$title = substr($title, 0, strrpos($title,' ')); 
			$title = $title."...";
		}
		$output = '<li>';
		if($link) {
			if(get_post_format($id) == 'link') {
				$output .= '<a href="'.$url['url'].'" title="'.$title.'" class="thmlvSelectedSwitch" data-selected="'.get_the_ID().'">';
			} else {
				$output .= '<a href="'.get_permalink($id).'" title="'.$title.'" class="thmlvSelectedSwitch" data-selected="'.get_the_ID().'">';
			}
		}
		$output .= $title;
		if($link) {
			$output .= '</a>';
		}
		$output .= '</li>';
		return $output;
	}
}

if(!function_exists('oslo_switch_post_title')) {
	function oslo_switch_post_title($id, $link = FALSE, $truncate = 200) {
		$url = oslo_addhttp(get_post_meta($id, '_oslo_link', true));
		if(get_post_meta($id, '_oslo_custom_title', true) != '') {
			$title = esc_attr(get_post_meta($id, '_oslo_custom_title', true));
		} else {
			$title = get_the_title($id);
		}
		if(strlen($title) >= $truncate) {
			$title = $title." "; 
			$title = substr($title, 0, $truncate); 
			$title = substr($title, 0, strrpos($title,' ')); 
			$title = $title."...";
		}
		
		$output = get_avatar(get_the_author_meta('email'), '60');
		$output .= '<header>';
		$output .= '<h1>';
		if($link) {
			if(get_post_format($id) == 'link') {
				$output .= '<a href="'.$url['url'].'" title="'.$title.'">';
			} else {
				$output .= '<a href="'.get_permalink($id).'" title="'.$title.'">';
			}
		}
		$output .= $title;
		if($link) {
			$output .= '</a>';
		}
		$output .= '</h1>';
		$output .= oslo_entry_meta($id);
		$output .= '</header>';
		return $output;
	}
}

// Create post meta
if(!function_exists('oslo_entry_meta')) {
	function oslo_entry_meta($id, $taxonomy = 'category') {
		$allowed_html_array = wp_kses_allowed_html();
		$output = wp_kses( __('<span class="thmlvEntryMeta">', 'oslo'), $allowed_html_array );
		$date = '';
		$date = sprintf( '<time class="entry-date" datetime="%1$s">%2$s</time> &middot; ',
			esc_attr(get_the_date('c')),
			esc_html(get_the_date('F d'))
		);
		$categories_list = get_the_category_list( esc_html__(', ', 'oslo'));
		$tag_list = get_the_tag_list('', esc_html__(', ', 'oslo'));
		$output .= 	esc_html__('%1$s', 'oslo');
		if($categories_list) {
			$output .= wp_kses( __('<span>%2$s</span>', 'oslo'), $allowed_html_array );
		}
		if($tag_list) {
			$output .= wp_kses( __(' &middot; <span>%3$s</span>', 'oslo'), $allowed_html_array );
		}
		$output .= wp_kses( __('</span>', 'oslo'), $allowed_html_array );
		return sprintf(
			$output,
			$date,
			$categories_list,
			$tag_list
		);
	}
}

// Get taxonomy list
if(!function_exists('oslo_post_categories')) {
	function oslo_post_categories($id = NULL, $taxonomy = 'category', $link = true) {
		$output = '';
		$all = wp_get_object_terms($id, $taxonomy);
		if(!empty($all)){
			$output = '<span class="thmlvSectionCategories">';
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

// Filter url
if(!function_exists('oslo_addhttp')) {
	function oslo_addhttp($url) {
		if(empty($url)) {
			$url = 'http://www.themelovin.com';
		}
		$url = esc_url($url);
		$url = trim($url, '/');
		if(!preg_match('~^(?:f|ht)tps?://~i', $url)) {
			$url = 'http://'.$url;
		}
		$array = array(
			"url" => $url
		);
		$urlParts = parse_url($url);
		$array['domain'] = preg_replace('/^www\./', '', $urlParts['host']);
		return $array;
	}
}

if(!function_exists('oslo_author')) {
	function oslo_author() {
		$output = '<div id="thmlvAuthor">';
		$output .= get_avatar(get_the_author_meta('email'), '60').'%1$s';
		$author = esc_html__('Written by ', 'oslo').get_the_author_link();
		$date = '';
		$date = sprintf( ' &middot; <time class="entry-date" datetime="%1$s">%2$s</time>',
			esc_attr(get_the_date('c')),
			esc_html(get_the_date('F m'))
		);
		$categories_list = get_the_category_list( esc_html__(', ', 'oslo'));
		$tag_list = get_the_tag_list('', esc_html__(', ', 'oslo'));
		$output .= 	esc_html__('%2$s', 'oslo');
		if($categories_list) {
			$output .= esc_html__(' &middot; %3$s', 'oslo');
		}
		if($tag_list) {
			$output .= esc_html__(' &middot; %4$s', 'oslo');
		}
		$output .= '</div>';
		echo sprintf(
			$output,
			$author,
			$date,
			$categories_list,
			$tag_list
		);
	}
}

// Custom blog navigation
if(!function_exists('oslo_numeric_posts_nav')) {
	function oslo_numeric_posts_nav() {
		if(is_singular()) {
			return;
		}
		global $wp_query;
		/** Stop execution if there's only 1 page */
		if($wp_query->max_num_pages <= 1) {
			return;
		}
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
		/**	Add current page to the array */
		if ($paged >= 1) {
			$links[] = $paged;
		}
		/**	Add the pages around the current page to the array */
		if ($paged >= 3) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
		if (($paged + 2) <= $max) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		echo '<div class="container row" id="thmlvPostNavigation"><ul>' . "\n";
		/**	Previous Post Link */
		if (get_previous_posts_link()) {
			printf('<li>%s</li>' . "\n", get_previous_posts_link());
		}
		/**	Link to first page, plus ellipses if necessary */
		if (! in_array(1, $links)) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf('<li%s><a href="%s" class="thmlvNavNum">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

			if (!in_array( 2, $links)) {
				echo '<li>...</li>';
			}
		}
		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort($links);
		foreach ((array) $links as $link) {
			$class = $paged == $link ? ' class="active"' : '';
			printf('<li%s><a href="%s" class="thmlvNavNum">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
		}
		/**	Link to last page, plus ellipses if necessary */
		if (! in_array($max, $links)) {
			if (!in_array( $max - 1, $links))
				echo '<li>...</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf('<li%s><a href="%s" class="thmlvNavNum">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
		}
		/**	Next Post Link */
		if (get_next_posts_link()) {
			printf('<li>%s</li>' . "\n", get_next_posts_link());
		}
		echo '</ul></div>'."\n";

	}
}

if(!function_exists('oslo_next_post_link')) {
	function oslo_next_post_link() {
		$next_post = get_adjacent_post(false, '', true);
		if(!empty($next_post)) {
			$featured = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'full');
			echo '<a href="'.get_permalink($next_post->ID).'" title="'.$next_post->post_title.'" class="thmlvNextPostLink"><div class="container row"><span id="thmlvNextText">'.esc_html__('Next', 'oslo').'</span><span id="thmlvNextTitle">'.$next_post->post_title.'</span></div><div id="thmlvNextLinkBgColor"></div><div id="thmlvNextLinkBgImage" style="background-image: url('.esc_url($featured[0]).')"></div></a>';
		}
	}
}

if(!function_exists('oslo_footer_widgets')) {
	function oslo_footer_widgets() {
		global $thmlvOptions;
		$output = '';
		if(isset($thmlvOptions['thmlv_footer_columns'])) {
			$cols = absint($thmlvOptions['thmlv_footer_columns']);
		} else {
			$cols = 4;
		}
		$width = 12 / $cols;
		for($i = 1; $i <= $cols; $i++) {
			ob_start();
			dynamic_sidebar('footer'.$i.'widget');
			$sidebar = ob_get_contents();
			ob_end_clean();
			$output .= '<div class="span_'.$width.' col">';
			$output .= $sidebar;
			$output .= '</div>';
		}
		echo $output;
	}
}

// Return social links
if(!function_exists('oslo_social_link')) {
	function oslo_social_link() {
		global $thmlvOptions;
		$output = '';
		if($thmlvOptions['oslo-social']) {
			$output = '<ul id="thmlvSocial">';

			$social = array(
				'behance' => 'oslo-behance',
				'dribbble' => 'oslo-dribbble',
				'facebook' => 'oslo-facebook',
				'flickr' => 'oslo-flickr',
				'foursquare' => 'oslo-foursquare',
				'git' => 'oslo-git',
				'google' => 'oslo-googleplus',
				'instagram' => 'oslo-instagram',
				'linkedin' => 'oslo-linkedin',
				'pinterest' => 'oslo-pinterest',
				'rss' => 'oslo-rss',
				'soundscloud' => 'oslo-soundcloud',
				'skype' => 'oslo-skype',
				'tumblr' => 'oslo-tumblr',
				'twitter' => 'oslo-twitter',
				'vimeo' => 'oslo-vimeo',
				'weibo' => 'oslo-weibo',
				'youtube' => 'oslo-youtube'
			);
			$pictograms = array(
				'behance' => 'fa-behance',
				'dribbble' => 'fa-dribbble',
				'facebook' => 'fa-facebook',
				'flickr' => 'fa-flickr',
				'foursquare' => 'fa-foursquare',
				'git' => 'fa-git',
				'google' => 'fa-google-plus',
				'instagram' => 'fa-instagram',
				'linkedin' => 'fa-linkedin',
				'pinterest' => 'fa-pinterest',
				'rss' => 'fa-rss',
				'soundscloud' => 'fa-soundcloud',
				'skype' => 'fa-skype',
				'tumblr' => 'fa-tumblr',
				'twitter' => 'fa-twitter',
				'vimeo' => 'fa-vimeo-square',
				'weibo' => 'fa-weibo',
				'youtube' => 'fa-youtube'
			);
			foreach($social as $key => $value) {
				if(isset($thmlvOptions[$value]) && $thmlvOptions[$value] != '') {
					$var = $thmlvOptions[$value];
					if(!empty($var)) {
						$var = trim($var, '/');
						if(!preg_match('~^(?:f|ht)tps?://~i', $var)) {
							$var = 'http://'.$var;
						}
						$var = esc_url($var);
						$output .= '<li><a href="'.esc_url($var).'" title="Join us on '.esc_attr($key).'" target="_blank" class="'.esc_attr($key).' fa '.$pictograms[$key].'"></a></li>';
					}
				}
			}
			$output .= '</ul>';
		}
		return $output;
	}
}

// Return social links
if(!function_exists('oslo_share_links')) {
	function oslo_share_links() {
		$id = get_the_ID();
		if(is_home()) {
			$id = get_option('page_for_posts');
		}
		$link = home_url();
		$title = get_bloginfo('name');
		$featured = '';
		if(isset($id)) {
			$link = get_permalink($id);
			$title = get_the_title($id);
			$featured = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
		}
		$output = '<div id="thmlvShareBar" data-url="'.esc_url($link).'" data-description="'.esc_attr($title).'" data-media="'.esc_url($featured[0]).'">';
		$output .= '<a href="#" title="'.esc_html__('Share', 'oslo').'" id="thmlvSocialToggle"><i class="fa fa-share-alt"></i></a>';
		$output .= '<ul></ul>';
		$output .= '</div>';
		echo $output;
	}
}

// Create member social links list
if(!function_exists('oslo_member_social')) {
	function oslo_member_social($id) {
		$output = '<ul class="oslo-team-member-social-icons">';
		$social = array(
			'behance' => '_oslo_team_behance',
			'dribbble' => '_oslo_team_dribbble',
			'facebook' => '_oslo_team_facebook',
			'flickr' => '_oslo_team_flickr',
			'foursquare' => '_oslo_team_foursquare',
			'git' => '_oslo_team_git',
			'google' => '_oslo_team_googleplus',
			'instagram' => '_oslo_team_instagram',
			'linkedin' => '_oslo_team_linkedin',
			'pinterest' => '_oslo_team_pinterest',
			'rss' => '_oslo_team_rss',
			'soundscloud' => '_oslo_team_soundcloud',
			'skype' => '_oslo_team_skype',
			'tumblr' => '_oslo_team_tumblr',
			'twitter' => '_oslo_team_twitter',
			'vimeo' => '_oslo_team_vimeo',
			'weibo' => '_oslo_team_weibo',
			'youtube' => '_oslo_team_youtube'
		);
		$pictograms = array(
			'behance' => 'fa-behance',
			'dribbble' => 'fa-dribbble',
			'facebook' => 'fa-facebook',
			'flickr' => 'fa-flickr',
			'foursquare' => 'fa-foursquare',
			'git' => 'fa-git',
			'google' => 'fa-google-plus',
			'instagram' => 'fa-instagram',
			'linkedin' => 'fa-linkedin',
			'pinterest' => 'fa-pinterest',
			'rss' => 'fa-rss',
			'soundscloud' => 'fa-soundcloud',
			'skype' => 'fa-skype',
			'tumblr' => 'fa-tumblr',
			'twitter' => 'fa-twitter',
			'vimeo' => 'fa-vimeo-square',
			'weibo' => 'fa-weibo',
			'youtube' => 'fa-youtube'
		);
		$var = esc_attr(get_post_meta($id, 'thmlv_team_mail', true));
		if(!empty($var)) {
			$output .= '<li><a href="mailto:'.$var.'" title="Mail us"><i class="fa fa-envelope-o "></i></a></li>';
		}
		foreach($social as $key => $value) {
			$var = esc_url(get_post_meta($id, $value , true));
			if(!empty($var)) {
				$var = trim($var, '/');
				if(!preg_match('~^(?:f|ht)tps?://~i', $var)) {
					$var = 'http://'.$var;
				}
				$output .= '<li><a href="'.esc_url($var).'" title="Join us on '.$key.'" target="_blank"><i class="fa '.$pictograms[$key].' "></i></a></li>';
			}
		}
		$output .= '</ul>';
		echo $output;
	}
}

// Echo copyright
if(!function_exists('oslo_copyright')) {
	function oslo_copyright() {
		global $thmlvOptions;
		$allowed_html_array = wp_kses_allowed_html();
		return wp_kses($thmlvOptions['oslo-copyright'], $allowed_html_array);
	}
}

if(!function_exists('oslo_footer_layout')) {
	function oslo_footer_layout() {
		global $thmlvOptions;
		echo esc_attr($thmlvOptions['oslo-footer-layout']);
	}
}

if(!function_exists('oslo_edit_comment_form')) {
	function oslo_edit_comment_form() {
		$fields = array(
			'author' => '<input id="author" name="author" type="text" value="" placeholder="'.esc_html__('Name', 'oslo').'" class="required" /><br />',
			'email' => '<input id="email" name="email" type="text" value="" placeholder="'.esc_html__('Email', 'oslo').'" class="required requiredField email" />',
		);
		$defaults['fields'] = apply_filters('comment_form_default_fields', $fields);
		$defaults['comment_field'] = '<textarea id="comment" name="comment" placeholder="'.esc_html__('Express your thoughts, idea or write a feedback by clicking here & start an awesome comment', 'oslo').'" cols="45" rows="8" aria-required="true" class="comment-form-comment"></textarea>';
		$defaults['title_reply'] = '';
		$defaults['comment_notes_after'] = '';
		$defaults['comment_notes_before'] = '';
		$defaults['label_submit'] = 'Submit';
		return $defaults;
	}
}

if(!function_exists('oslo_comment')) {
	function oslo_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		$allowed_html_array = wp_kses_allowed_html();
	?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<?php
					echo get_avatar($comment, 60);
					printf( wp_kses( __('<span class="thmlvAuthorMeta"><span class="author">%1s</span> %2s</span>', 'oslo'), $allowed_html_array ),
						get_comment_author_link(),
						sprintf( wp_kses( __('<a href="%1$s" class="pubtime"><time pubdate datetime="%2$s">%3$s</time></a> ', 'oslo'), $allowed_html_array ),
							get_comment_link($comment->comment_ID),
							get_comment_time('c'),
							sprintf( esc_html__('%1$s - %2$s', 'oslo'), get_comment_date(), get_comment_time() )
						)
					);
					comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
					edit_comment_link( esc_html__('Edit', 'oslo'), '&nbsp;<span class="edit-link">', '</span>' );
					if ( $comment->comment_approved == '0' ) { ?>
						<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'oslo'); ?></em>
						<br />
					<?php } ?>
				<div class="thmlvCommentContent"><?php comment_text(); ?></div>	
		</li>	
	<?php
	}
}

if(!function_exists('oslo_add_allowed_tags')) {
	function oslo_add_allowed_tags($tags) {
		$tags['time'] = array(
			'datetime' => true,
		);
		$tags['span'] = array(
			'class' => true,
			'id' => true
		);
		$tags['a'] = array(
			'class' => true,
			'id' => true,
			'href' => true
		);
		return $tags;
	}
	add_filter('wp_kses_allowed_html', 'oslo_add_allowed_tags');
}

?>