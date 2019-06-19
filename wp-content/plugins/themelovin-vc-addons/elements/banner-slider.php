<?php
/*-----------------------------------------------------------------------------------*/
/* Banner slider
/*-----------------------------------------------------------------------------------*/

vc_map(array(
	'name' => esc_html__('Banner Slider', 'themelovin'),
	'category' => esc_html__('Content', 'themelovin'),
   	'description' => esc_html__('Create a banner slider', 'themelovin'),
	'base' => 'thmlv_banner_slider',
	'icon' => 'thmlv_banner_slider',
	'as_parent' => array('only' => 'thmlv_banner'),
	'controls' => 'full',
	'content_element' => true,
	'show_settings_on_create' => false,
	'js_view' => 'VcColumnView',
	'params' => array(
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Adaptive Height', 'themelovin'),
			'param_name' => 'adaptive_height',
			'description' => esc_html__('Enable adaptive height for each slide.', 'themelovin'),
			'value' => array(
				esc_html__('Enable', 'themelovin') => '1'
			)
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Arrows', 'themelovin'),
			'param_name' => 'arrows',
			'description' => esc_html__('Display "prev" and "next" arrows.', 'themelovin'),
			'value' => array(
				esc_html__('Enable', 'themelovin') => '1'
			)
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Pagination', 'themelovin'),
			'param_name' => 'pagination',
			'description' => esc_html__('Display pagination.', 'themelovin'),
			'value' => array(
				esc_html__('Enable', 'themelovin') => '1'
			)
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Infinite Loop', 'themelovin'),
			'param_name' => 'infinite',
			'description' => esc_html__('Infinite loop sliding.', 'themelovin'),
			'value' => array(
				esc_html__('Enable', 'themelovin') => '1'
			)
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Autoplay', 'themelovin'),
			'param_name' => 'autoplay',
			'description' => esc_html__('Enter autoplay interval in milliseconds (1 second = 1000 milliseconds).', 'themelovin')
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
	
	
// Extend element with the WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer') && !class_exists('WPBakeryShortCode_Thmlv_Banner_Slider')) {
	class WPBakeryShortCode_Thmlv_Banner_Slider extends WPBakeryShortCodesContainer {}
}
?>