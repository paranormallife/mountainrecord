<?php
/*-----------------------------------------------------------------------------------*/
/* Google map
/*-----------------------------------------------------------------------------------*/
vc_map(array(
	'name'			=> esc_html__('Google Maps', 'themelovin'),
	'category'		=> esc_html__('Content', 'themelovin'),
	'description'	=> esc_html__('Embed a Google maps', 'themelovin'),
	'base'			=> 'thmlv_gmaps',
	'icon'			=> 'thmlv_gmaps',
	'params'			=> array(
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__('Address', 'themelovin'),
			'param_name' 	=> 'address',
			'description'	=> esc_html__('Address for the map marker (you can type it in any language).', 'themelovin'),
			'value' 		=> 'Oslo, Norway'
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__('Map Type', 'themelovin'),
			'param_name' 	=> 'map_type',
			'description'	=> esc_html__('Select a map type.', 'themelovin'),
			'value' 		=> array(
				'Custom Roadmap'						=> 'roadmap_custom',
				'Default Roadmap (no custom styles)'	=> 'roadmap',
				'Satellite'								=> 'satellite',
				'Terrain'								=> 'terrain'
			),
			'std' 			=> 'roadmap_custom'
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__('Map Style', 'themelovin'),
			'param_name' 	=> 'map_style',
			'description'	=> esc_html__('Select a map style.', 'themelovin'),
			'value' 		=> array(
				'Clean Flat'			=> 'clean_flat',
				'Grayscale'				=> 'grayscale',
				'Cooltone Grayscale'	=> 'cooltone_grayscale',
				'Light Monochrome'		=> 'light_monochrome',
				'Dark Monochrome'		=> 'dark_monochrome',
				'Paper'					=> 'paper',
				'Countries'				=> 'countries'
			),
			'std' 			=> 'paper'
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__('Map Height', 'themelovin'),
			'param_name' 	=> 'height',
			'description'	=> esc_html__('Enter a map height.', 'themelovin')
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__('Zoom Level', 'themelovin'),
			'param_name' 	=> 'zoom',
			'description' 	=> esc_html__('Default map zoom level (1 - 20).', 'themelovin'),
			'value' 		=> '18',
		),
		array(
			'type' 			=> 'checkbox',
			'heading' 		=> esc_html__('Zoom Controls', 'themelovin'),
			'param_name' 	=> 'zoom_controls',
			'description' 	=> esc_html__('Display map zoom controls.', 'themelovin'),
			'value'			=> array(
				esc_html__('Enable', 'themelovin')	=> '1'
			)
		),
		array(
			'type' 			=> 'checkbox',
			'heading' 		=> esc_html__('Scroll Zoom', 'themelovin'),
			'param_name' 	=> 'scroll_zoom',
			'description' 	=> esc_html__('Enable mouse-wheel zoom.', 'themelovin'),
			'value'			=> array(
				esc_html__('Enable', 'themelovin')	=> '1'
			)
		),
		array(
			'type' 			=> 'checkbox',
			'heading' 		=> esc_html__('Touch Drag', 'themelovin'),
			'param_name' 	=> 'touch_drag',
			'description' 	=> esc_html__('Enable touch-drag on mobile devices.', 'themelovin'),
			'value'			=> array(
				esc_html__('Enable', 'themelovin')	=> '1'
			)
		),
		array(
			'type' 			=> 'attach_image',
			'heading' 		=> esc_html__('Marker Icon', 'themelovin'),
			'param_name' 	=> 'marker_icon',
			'description' 	=> esc_html__('Custom marker icon.', 'themelovin')
		),
		array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'themelovin' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'themelovin' ),
        )
	)
));
	