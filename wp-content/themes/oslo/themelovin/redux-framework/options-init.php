<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if (! class_exists('Redux')) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_builder_themelovin";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'redux_builder_themelovin',
        'google_update_weekly' => FALSE,
        'google_api_key' => '',
        'use_cdn' => TRUE,
        'dev_mode' => FALSE,
        'display_name' => $theme->get('Name'),
        'display_version' => $theme->get('Version'),
        'page_slug' => 'oslo',
        'page_title' => 'Theme Options',
        'update_notice' => FALSE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'default_mark' => '*',
        'class' => 'thmlv',
        'hints' => array(
            'icon' => 'el el-idea',
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
           ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
           ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
               ),
                'hide' => array(
                    'effect' => 'fade',
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
               ),
           ),
       ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
   );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/themelovin',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
   );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/themelovin',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
   );

    Redux::setArgs($opt_name, $args);

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection($opt_name, array(
        'title'  => __('General', 'oslo'),
        'id'     => 'general',
        'desc'   => __('General fields not included in other specific sections.', 'oslo'),
        'icon'   => 'el el-cog',
        'fields' => array(
            array(
                'id' => 'oslo-favicon',
                'type' => 'media',
                'url' => 'true',
                'title' => __('Favicon', 'oslo'),
                'subtitle' => __('<em>Upload your custom favicon for your site (If your site is Wordpress 4.2+ use the new Customizer option).</em>', 'oslo')
           ),
            array(
                'id' => 'oslo-touch-icon',
                'type' => 'media',
                'url' => 'true',
                'title' => __('Touch icon', 'oslo'),
                'subtitle' => __('<em>Upload your custom touch icon for your site</em>.', 'oslo')
           )
       )
   ));
    
    Redux::setSection($opt_name, array(
        'title'  => __('Logo', 'oslo'),
        'id'     => 'logo',
        'desc'   => __('Use the fields below to upload all your brand images.', 'oslo'),
        'icon'   => 'el el-eye-open',
        'fields' => array(
            array(
                'id' => 'oslo-logo-light',
                'type' => 'media',
                'url' => 'true',
                'title' => __('Logo light', 'oslo'),
                'subtitle' => __('<em>Upload your light logo for your site.</em>', 'oslo')
           ),
            array(
                'id' => 'oslo-logo-dark',
                'type' => 'media',
                'url' => 'true',
                'title' => __('Logo dark', 'oslo'),
                'subtitle' => __('<em>Upload your dark logo for your site.</em>', 'oslo')
           ),
           array(
           		'id' => 'oslo-logo-height',
           		'type' => 'slider',
                'title' => __('Logo Height', 'oslo'),
                'subtitle' => __('<em>Drag the slider to set the logo height.</em>', 'oslo'),
                'default' => 60,
                'min' => 0,
                "step" => 1,
                'max' => 300,
                'display_value' => 'text'
            )
       )
   ));

    Redux::setSection($opt_name, array(
        'title'  => __('Styling', 'oslo'),
        'id'     => 'styling',
        'desc'   => __('Use the fields below to style the main colors.', 'oslo'),
        'icon'   => 'el el-pencil',
        'fields' => array(

			array(
				'id'	=> 'info_styling_general',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __('General', 'oslo') . '</h3>'
			),
			            
            array (
                'title' => __('Main font color', 'oslo'),
                'subtitle' => __('<em>Body texts color of the site.</em>', 'oslo'),
                'id' => 'oslo-main-font-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#8c8c8c',
           ),
           
           array (
                'title' => __('Titles font color', 'oslo'),
                'subtitle' => __('<em>Titles texts color of the site.</em>', 'oslo'),
                'id' => 'oslo-titles-font-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#3d3d3d',
           ),
           
           array (
                'title' => __('Hightlight color', 'oslo'),
                'subtitle' => __('<em>Links color of the site.</em>', 'oslo'),
                'id' => 'oslo-hightlight-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#1f1f1f',
           ),
           
           array (
                'title' => __('Loading color', 'oslo'),
                'subtitle' => __('<em>Loading bar color.</em>', 'oslo'),
                'id' => 'oslo-loading-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#2d5ef2',
           ),
 
 			array(
				'id'	=> 'info_header_layout-color',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Header layout color', 'oslo' ) . '</h3>'
			),
			          
           array (
                'title' => __('Dark layout color', 'oslo'),
                'subtitle' => __('<em>Color to use on dark layout.</em>', 'oslo'),
                'id' => 'oslo-dark-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#ffffff',
           ),
           
           array (
                'title' => __('Light layout color', 'oslo'),
                'subtitle' => __('<em>Color to use on light layout.</em>', 'oslo'),
                'id' => 'oslo-light-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#1f1f1f',
           ),
 
  			array(
				'id'	=> 'info_footer',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Footer', 'oslo' ) . '</h3>'
			),
			          
           array (
                'title' => __('Footer font color', 'oslo'),
                'subtitle' => __('<em>Footer text color.</em>', 'oslo'),
                'id' => 'oslo-footer-font-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#adadad',
           ),
           
           array (
                'title' => __('Footer heading color', 'oslo'),
                'subtitle' => __('<em>Footer heading color.</em>', 'oslo'),
                'id' => 'oslo-footer-heading-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#cccccc',
           ),
           
           array (
                'title' => __('Footer highlight color', 'oslo'),
                'subtitle' => __('<em>Footer links color.</em>', 'oslo'),
                'id' => 'oslo-footer-hightlight-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#e0e0e0',
           ),
           
           array (
                'title' => __('Footer background color', 'oslo'),
                'subtitle' => __('<em>Footer background color.</em>', 'oslo'),
                'id' => 'oslo-footer-background-color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#292929',
           ),

 			array(
				'id'	=> 'info_background',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Background', 'oslo' ) . '</h3>'
			),
			            
            array(
                'id'            => 'oslo-main-background',
                'type'          => 'background',
                'title'         => "Body Background",
                'subtitle'      => "<em>Body background with image, color, etc.</em>",
                'default'  => array(
                    'background-color' => '#fff',
               ),
                'transparent'   => false,
           ),
            
       )
        
   ));
   
   Redux::setSection($opt_name, array(
        'title'  => __('Typography', 'oslo'),
        'id'     => 'typography',
        'desc'   => __('Use the fields below to set your site fonts.', 'oslo'),
        'icon'   => 'el el-fontsize',
        'fields' => array(
            array(
                'id' => 'oslo-main-typo',
                'type' => 'typography',
                'google' => true, 
				'font-backup' => false,
				'font-style' => false,
				'font-size' => false,
				'line-height' => false,
				'text-align' => false,
				'color' => false,
				'subsets' => false,
                'title' => __('Main font', 'oslo'),
                'subtitle' => __('<em>Pick the Main Font for your site.</em>', 'oslo'),
                'default'     => array(
					'font-style' => '400', 
					'font-family' => 'Playfair Display', 
					'google' => true
				)
           ),
            array(
                'id' => 'oslo-secondary-typo',
                'type' => 'typography',
                'google'      => true, 
				'font-backup' => false,
				'font-style' => false,
				'font-size' => false,
				'line-height' => false,
				'text-align' => false,
				'color' => false,
				'subsets' => false,
                'title' => __('Secondary font', 'oslo'),
                'subtitle' => __('<em>Pick the Secondary Font for your site.</em>', 'oslo'),
                'default'     => array(
					'font-style' => '400', 
					'font-family' => 'Roboto Condensed', 
					'google' => true
				)
           ),
           array(
                'id' => 'oslo-body-typo',
                'type' => 'typography',
                'google'      => true, 
				'font-backup' => false,
				'font-style' => false,
				'font-size' => false,
				'line-height' => false,
				'text-align' => false,
				'color' => false,
				'subsets' => false,
                'title' => __('Body font', 'oslo'),
                'subtitle' => __('<em>Pick the Font for your body text.</em>', 'oslo'),
                'default'     => array(
					'font-style' => '300', 
					'font-family' => 'PT Sans', 
					'google' => true
				)
           )
       )
   ));
   
   Redux::setSection($opt_name, array(
        'title'  => __('Header', 'oslo'),
        'id'     => 'oslo-header',
        'desc'   => __('Use the fields below to style the theme header.', 'oslo'),
        'icon'   => 'el el-upload',
        'fields' => array(
        	array(
        		'title'    => __('Select the preferred menu layouts', 'oslo'),
				'id'       => 'oslo-menu',
                'type' => 'radio',
				'desc' => __('Enable the "Desktop menu" instead of the default "Hamburger menu".', 'oslo'),
				'options' => array(
					'thmlvHamburgerMenu' => 'Hamburger Menu', 
					'thmlvDesktopMenu' => 'Desktop Menu', 
				),
				'default' => 'thmlvHamburgerMenu',
			)
		)
   ));
   
   Redux::setSection($opt_name, array(
        'title'  => __('Footer', 'oslo'),
        'id'     => 'oslo-footer',
        'desc'   => __('Use the fields below to style the theme footer.', 'oslo'),
        'icon'   => 'el el-download',
        'fields' => array(
            array (
                'title' => __('Copyright', 'oslo'),
                'subtitle' => __('<em>Type your copyright text, HTML link permitted</em>', 'oslo'),
                'id' => 'oslo-copyright',
                'type' => 'text',
                'default' => '&copy; Oslo by Themelovin'
           ),
        	array(
        		'title'    => __('Social icons', 'oslo'),
				'id'       => 'oslo-social',
                'type' => 'switch',
                'on' => __('Enabled', 'oslo'),
                'off' => __('Disabled', 'oslo'),
				'subtitle' => __('<em>Select if display or not social icons</em>', 'oslo'),
				'default'  => '1',
			),
			array(
				'title'	=> __('Columns', 'oslo'),
				'id'	=> 'thmlv_footer_columns',
				'type'	=> 'slider',
				'desc'	=> __('Select the number of footer widget columns to display.', 'oslo'),
				'default'	=> 4,
				'min'	=> 1,
				'max'	=> 4,
				'step'	=> 1,
				'display_value'	=> 'text'
			),
			array(
				'title' => __('Layout', 'oslo'), 
				'id' => 'oslo-footer-layout',
				'type' => 'radio',
				'desc' => __('Select the preferred footer layout type.', 'oslo'),
				'options' => array(
					'thmlvFullWidth' => 'Full Width', 
					'thmlvStandardWidth' => 'Standard', 
				),
				'default' => 'thmlvFullWidth',
			)
		)
   ));

	Redux::setSection($opt_name, array(
        'icon'   => 'fa fa-share-alt-square',
        'title'  => __('Social Media', 'oslo'),
        'icon'   => 'el el-share-alt',
        'fields' => array(
        
        	array (
                'title' => __('<i class="fa fa-behance"></i> Behance', 'oslo'),
                'subtitle' => __('<em>Type your Behance profile URL here.</em>', 'oslo'),
                'id' => 'oslo-behance',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-dribbble"></i> Dribble', 'oslo'),
                'subtitle' => __('<em>Type your Dribble profile URL here.</em>', 'oslo'),
                'id' => 'oslo-dribbble',
                'type' => 'text',
                'default' => 'http://dribbble.com/themelovin',
           ),
            
            array (
                'title' => __('<i class="fa fa-facebook"></i> Facebook', 'oslo'),
                'subtitle' => __('<em>Type your Facebook profile URL here.</em>', 'oslo'),
                'id' => 'oslo-facebook',
                'type' => 'text',
                'default' => 'https://www.facebook.com/themelovin',
           ),
           
           array (
                'title' => __('<i class="fa fa-flickr"></i> Flickr', 'oslo'),
                'subtitle' => __('<em>Type your Flickr profile URL here.</em>', 'oslo'),
                'id' => 'oslo-flickr',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-foursquare"></i> Foursquare', 'oslo'),
                'subtitle' => __('<em>Type your Foursquare profile URL here.</em>', 'oslo'),
                'id' => 'oslo-foursquare',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-git"></i> Git', 'oslo'),
                'subtitle' => __('<em>Type your Git profile URL here.</em>', 'oslo'),
                'id' => 'oslo-git',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-google-plus"></i> Google+', 'oslo'),
                'subtitle' => __('<em>Type your Google+ profile URL here.</em>', 'oslo'),
                'id' => 'oslo-googleplus',
                'type' => 'text',
                'default' => 'https://plus.google.com/+Themelovin-Wordpress-Themes',
           ),
           
           array (
                'title' => __('<i class="fa fa-instagram"></i> Instagram', 'oslo'),
                'subtitle' => __('<em>Type your Instagram profile URL here.</em>', 'oslo'),
                'id' => 'oslo-instagram',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-linkedin"></i> LinkedIn', 'oslo'),
                'subtitle' => __('<em>Type your LinkedIn profile URL here.</em>', 'oslo'),
                'id' => 'oslo-linkedin',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-pinterest"></i> Pinterest', 'oslo'),
                'subtitle' => __('<em>Type your Pinterest profile URL here.</em>', 'oslo'),
                'id' => 'oslo-pinterest',
                'type' => 'text'
           ),
           
           array (
                'title' => __('<i class="fa fa-rss"></i> RSS', 'oslo'),
                'subtitle' => __('<em>Type your RSS Feed URL here.</em>', 'oslo'),
                'id' => 'oslo-rss',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-soundcloud"></i> Soundcloud', 'oslo'),
                'subtitle' => __('<em>Type your Soundcloud profile URL here.</em>', 'oslo'),
                'id' => 'oslo-soundcloud',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-skype"></i> Skype', 'oslo'),
                'subtitle' => __('<em>Type your Skype profile URL here.</em>', 'oslo'),
                'id' => 'oslo-skype',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-tumblr"></i> Tumblr', 'oslo'),
                'subtitle' => __('<em>Type your Tumblr URL here.</em>', 'oslo'),
                'id' => 'oslo-tumblr',
                'type' => 'text',
           ),
            
            array (
                'title' => __('<i class="fa fa-twitter"></i> Twitter', 'oslo'),
                'subtitle' => __('<em>Type your Twitter profile URL here.</em>', 'oslo'),
                'id' => 'oslo-twitter',
                'type' => 'text',
                'default' => 'https://twitter.com/themelovin',
           ),
           
           array (
                'title' => __('<i class="fa fa-vimeo-square"></i> Vimeo', 'oslo'),
                'subtitle' => __('<em>Type your Vimeo profile URL here.</em>', 'oslo'),
                'id' => 'oslo-vimeo',
                'type' => 'text',
           ),
           
           array (
                'title' => __('<i class="fa fa-weibo"></i> Weibo', 'oslo'),
                'subtitle' => __('<em>Type your Weibo profile URL here.</em>', 'oslo'),
                'id' => 'oslo-weibo',
                'type' => 'text',
           ),
            
            array (
                'title' => __('<i class="fa fa-youtube-play"></i> Youtube', 'oslo'),
                'subtitle' => __('<em>Type your Youtube profile URL here.</em>', 'oslo'),
                'id' => 'oslo-youtube',
                'type' => 'text',
           )
            
       )
        
   ));

    Redux::setSection($opt_name, array(
        'icon'   => 'el el-edit',
        'title'  => __('Custom Code', 'oslo'),
        'fields' => array(
            
            array (
                'title' => __('Custom CSS', 'oslo'),
                'subtitle' => __('<em>Paste your custom CSS code here.</em>', 'oslo'),
                'id' => 'oslo-custom-css',
                'type' => 'ace_editor',
                'mode' => 'css',
           )
            
       )
        
   ));

    /*
     * <--- END SECTIONS
     */
