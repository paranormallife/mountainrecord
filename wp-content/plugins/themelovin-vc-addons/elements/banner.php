<?php
/*-----------------------------------------------------------------------------------*/
/* Banner
/*-----------------------------------------------------------------------------------*/
vc_map(array(
	'name' => esc_html__('Banner', 'themelovin'),
	'category' => esc_html__('Content', 'themelovin'),
	'description' => esc_html__('Responsive banner', 'themelovin'),
	'base' => 'thmlv_banner',
	'icon' => 'thmlv_banner',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'themelovin'),
			'param_name' => 'title',
			'description' => esc_html__('Enter a banner title.', 'themelovin')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Subtitle', 'themelovin'),
			'param_name' => 'subtitle',
			'description' => esc_html__('Enter a banner subtitle.', 'themelovin')
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('Link (URL)', 'themelovin'),
			'param_name' => 'custom_link',
			'description' => esc_html__('Set a banner link.', 'themelovin'),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Link Layout', 'themelovin'),
			'param_name' => 'link_type',
			'description' => esc_html__('Select a link layout.', 'themelovin'),
			'value' => array(
				'Banner Link' => 'banner_link',
				'Text Link' => 'text_link'
			),
			'std' => 'banner_link'
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Text Color', 'themelovin'),
			'param_name' => 'text_color',
			'description' => esc_html__('Select text color.', 'themelovin')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Text Position', 'themelovin'),
			'param_name' => 'text_position',
			'description' => esc_html__('Select text position.', 'themelovin'),
			'value' => array(
				'Center' => 'h_center-v_center',
				'Top Left' => 'h_left-v_top',
				'Top Center' => 'h_center-v_top',
				'Top Right' => 'h_right-v_top',
				'Center Left' => 'h_left-v_center',
				'Center Right' => 'h_right-v_center',
				'Bottom Left' => 'h_left-v_bottom',
				'Bottom Center' => 'h_center-v_bottom',
				'Bottom Right' => 'h_right-v_bottom'
			),
			'std' => 'h_center-v_center'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Text Alignment', 'themelovin'),
			'param_name' => 'text_alignment',
			'description' => esc_html__('Select text alignment.', 'themelovin'),
			'value' => array(
				'Left' => 'align_left',
				'Center' => 'align_center',
				'Right' => 'align_right'
			),
			'std' => 'align_left'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Text Animation (Banner Slider)', 'themelovin'),
			'param_name' => 'text_animation',
			'description' => esc_html__('Select a text animation (used by the Banner Slider).', 'themelovin'),
			'value' => array(
				'(none)' => '',
				'fadeIn' => 'fadeIn',
				'fadeInDown' => 'fadeInDown',
				'fadeInLeft' => 'fadeInLeft',
				'fadeInRight' => 'fadeInRight',
				'fadeInUp' => 'fadeInUp'
			)
		),
	  	array(
			'type' => 'attach_image',
			'heading' => esc_html__('Image', 'themelovin'),
			'param_name' => 'image_id',
			'description' => esc_html__('Add a banner image.', 'themelovin')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Image Type', 'themelovin'),
			'param_name' => 'image_type',
			'description' => esc_html__('Select the banner image type.', 'themelovin'),
			'value' => array(
				'Fluid Image' => 'fluid',
				'CSS Background Image' => 'css'
			),
			'std' => 'fluid'
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Banner Height', 'themelovin'),
			'param_name' => 'height',
			'description' => esc_html__('Enter banner height (numbers only).', 'themelovin'),
			'dependency' => array(
				'element' => 'image_type',
				'value' => array('css')
			)
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Background Color', 'themelovin'),
			'param_name' => 'background_color',
			'description' => esc_html__('Set a background color.', 'themelovin')
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