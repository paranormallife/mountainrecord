<?php
/*-----------------------------------------------------------------------------------*/
/*Post slider
/*-----------------------------------------------------------------------------------*/
$categories_array = array( esc_html__('All post categories', 'themelovin') => 'thmlv-all-tax');
$categories_list = get_terms('category', array('hide_empty' => false));
if(is_array($categories_list) && !empty($categories_list)) {
	foreach ($categories_list as $categories_details) {   
    	$begin = esc_html__(' (ID: ', 'themelovin');
        $end = esc_html__(')', 'themelovin');
        $categories_array[$categories_details->name.$begin.$categories_details->term_id.$end] = $categories_details->slug;  
    }
}

vc_map(array(
   'name'=> esc_html__('Post Slider', 'themelovin'),
   'category'=> esc_html__('Content', 'themelovin'),
   'description'=> esc_html__('Display posts from the blog', 'themelovin'),
   'base'=> 'thmlv_post_slider',
   'icon'=> 'thmlv_post_slider',
   'params'=> array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Number of Posts', 'themelovin'),
			'param_name' => 'num_posts',
			'description' => esc_html__('Enter max number of posts to display.', 'themelovin'),
			'value' => '8'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Category', 'themelovin'),
			'param_name' => 'category',
			'description'=> esc_html__('Filter by post category.', 'themelovin'),
			'value' => $categories_array
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns', 'themelovin'),
			'param_name' => 'columns',
			'description'=> esc_html__('Select slider columns.', 'themelovin'),
			'value' => array(
				'3'=> '3',
				'4'=> '4',
				'5'=> '5'
			),
				'std' => '4'
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Image Type', 'themelovin'),
			'param_name' => 'image_type',
			'description'=> esc_html__('Select image-type to display.', 'themelovin'),
			'value' => array(
				'Fluid'=> 'fluid',
				'Background (CSS)'=> 'background'
			),
			'std' => 'fluid'
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Background Image Height', 'themelovin'),
			'param_name' => 'bg_image_height',
			'description' => esc_html__('Enter a height for the background image.', 'themelovin'),
			'value' => '',
			'dependency'=> array(
				'element'=> 'image_type',
				'value'=> 'background'
			)
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Post Excerpt', 'themelovin'),
			'param_name' => 'post_excerpt',
			'description'=> esc_html__('Display post excerpt.', 'themelovin'),
			'value'=> array(
				esc_html__('Enable', 'themelovin')=> '1'
			)
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