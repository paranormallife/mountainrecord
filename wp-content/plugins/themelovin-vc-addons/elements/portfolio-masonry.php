<?php
/*-----------------------------------------------------------------------------------*/
/*	Portfolio masonry
/*-----------------------------------------------------------------------------------*/	
$skills_array = array( esc_html__('All portfolio skills', 'themelovin') => 'thmlv-all-tax');
$skills_list = get_terms('skills', array('hide_empty' => false));
if(is_array($skills_list) && !empty($skills_list)) {
	foreach ($skills_list as $skills_details) {   
    	$begin = esc_html__(' (ID: ', 'themelovin');
        $end = esc_html__(')', 'themelovin');
        $skills_array[$skills_details->name.$begin.$skills_details->term_id.$end] = $skills_details->slug;  
    }
}

vc_map(array(
	'name' => esc_html__('Portfolio Masonry', 'themelovin'),
	'category' => esc_html__('Content', 'themelovin'),
	'description' => esc_html__('Display your portfolio items in masonry grid', 'themelovin'),
	'base' => 'thmlv_portfolio_masonry',
	'icon' => 'thmlv_portfolio_masonry',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Portfolio taxonomy', 'themelovin'),
			'param_name' => 'taxonomy',
			'description' => esc_html__('Insert the taxonomy name you want to display.', 'themelovin'),
			'value' => $skills_array
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