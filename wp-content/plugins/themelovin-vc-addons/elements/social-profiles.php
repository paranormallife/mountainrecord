<?php
/*-----------------------------------------------------------------------------------*/
/* Social profiles
/*-----------------------------------------------------------------------------------*/
vc_map( array(
   'name'			=> esc_html__( 'Social Profiles', 'themelovin' ),
   'category'		=> esc_html__( 'Social', 'themelovin' ),
   'description'	=> esc_html__( 'Social media profile icons', 'themelovin' ),
   'base'			=> 'thmlv_social_profiles',
   'icon'			=> 'thmlv_social_profiles',
   'params'			=> array(
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Facebook',
			'param_name' 	=> 'social_profile_facebook',
			'description'	=> esc_html__( 'Enter your Facebook profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Instagram',
			'param_name' 	=> 'social_profile_instagram',
			'description'	=> esc_html__( 'Enter your Instagram profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Twitter',
			'param_name' 	=> 'social_profile_twitter',
			'description'	=> esc_html__( 'Enter your Twitter profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Google+',
			'param_name' 	=> 'social_profile_googleplus',
			'description'	=> esc_html__( 'Enter your Google+ profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'LinedIn',
			'param_name' 	=> 'social_profile_linkedin',
			'description'	=> esc_html__( 'Enter your LinedIn profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Pinterest',
			'param_name' 	=> 'social_profile_pinterest',
			'description'	=> esc_html__( 'Enter your Pinterest profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'RSS',
			'param_name' 	=> 'social_profile_rss',
			'description'	=> esc_html__( 'Enter your RSS feed URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Tumblr',
			'param_name' 	=> 'social_profile_tumblr',
			'description'	=> esc_html__( 'Enter your Tumblr profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'Vimeo',
			'param_name' 	=> 'social_profile_vimeo',
			'description'	=> esc_html__( 'Enter your Vimeo profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> 'YouTube',
			'param_name' 	=> 'social_profile_youtube',
			'description'	=> esc_html__( 'Enter your YouTube profile URL.', 'themelovin' )
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Icon Size', 'themelovin' ),
			'param_name' 	=> 'icon_size',
			'description'	=> esc_html__( 'Select icon size.', 'themelovin' ),
			'value' 		=> array(
				'Small'		=> 'small',
				'Medium'	=> 'medium',
				'Large'		=> 'large'
			),
			'std' 			=> 'medium'
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Icon Alignment', 'themelovin' ),
			'param_name' 	=> 'alignment',
			'description'	=> esc_html__( 'Select icon alignment.', 'themelovin' ),
			'value' 		=> array(
				'center'	=> 'center',
				'Left'		=> 'left',
				'Right'		=> 'right'
			),
			'std' 			=> 'center'
		),
		array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'themelovin' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'themelovin' ),
        )
	)
));
?>