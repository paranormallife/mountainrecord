<?php
/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/

vc_map(array(
	'name' => esc_html__('Button', 'themelovin'),
	'category' => esc_html__('Content', 'themelovin'),
	'description' => esc_html__('Eye catching button', 'themelovin'),
	'base' => 'thmlv_button',
	'icon' => 'thmlv_button',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'themelovin'),
			'param_name' => 'title',
			'description'=> esc_html__('Enter a button title.', 'themelovin'),
			'value' => esc_html__('Button with Text', 'themelovin')
		),
		array(
			'type'=> 'vc_link',
			'heading'=> esc_html__('URL (Link)', 'themelovin'),
			'param_name'=> 'link',
			'description'=> esc_html__('Set a button link.', 'themelovin')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'themelovin'),
			'param_name'=> 'style',
			'description'=> esc_html__('Select button style.', 'themelovin'),
			'value' => array(
				'Filled'=> 'filled',
				'Filled Rounded'=> 'filled-rounded',
				'Border'=> 'border',
				'Border Rounded'=> 'border-rounded',
				'Link'=> 'link'
			),
			'std'=> 'filled'
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Background color', 'themelovin'),
			'param_name' => 'bgcolor',
			'description'=> esc_html__('Button background color.', 'themelovin')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Text color', 'themelovin'),
			'param_name' => 'txtcolor',
			'description'=> esc_html__('Button text color.', 'themelovin')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Size', 'themelovin'),
			'param_name'=> 'size',
			'description'=> esc_html__('Select button size.', 'themelovin'),
			'value'=> array(
				'Large'=> 'lg',
				'Medium'=> 'md',
				'Small' => 'sm',
				'Extra Small'=> 'xs'
			),
			'std' => 'lg'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Align', 'themelovin'),
			'param_name'=> 'align',
			'description'=> esc_html__('Select button alignment.', 'themelovin'),
			'value'=> array(
				'Left' => 'left',
				'Center'=> 'center',
				'Right' => 'right'
			),
			'std' => 'left'
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