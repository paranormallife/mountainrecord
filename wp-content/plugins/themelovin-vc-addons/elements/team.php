<?php
/*-----------------------------------------------------------------------------------*/
/* Team
/*-----------------------------------------------------------------------------------*/
$tasks_array = array( esc_html__('All team tasks', 'themelovin') => 'thmlv-all-tax');
$tasks_list = get_terms('tasks', array('hide_empty' => false));
if(is_array($tasks_list) && !empty($tasks_list)) {
	foreach ($tasks_list as $tasks_details) {   
    	$begin = esc_html__(' (ID: ', 'themelovin');
        $end = esc_html__(')', 'themelovin');
        $tasks_array[$tasks_details->name.$begin.$tasks_details->term_id.$end] = $tasks_details->slug;  
    }
}

vc_map(array(
	'name'			=> esc_html__('Team', 'themelovin'),
	'category'		=> esc_html__('Content', 'themelovin'),
	'description'	=> esc_html__('Team members grid', 'themelovin'),
	'base'			=> 'thmlv_team',
	'icon'			=> 'thmlv_team',
	'params'			=> array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__('Columns', 'themelovin'),
			'param_name' 	=> 'columns',
			'description'	=> esc_html__('Select columns.', 'themelovin'),
			'value' 		=> array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5'
			),
			'std' => '2'
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__('Items', 'themelovin'),
			'param_name' 	=> 'items',
			'description'	=> esc_html__('Number of items to display.', 'themelovin')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Team taxonomy', 'themelovin'),
			'param_name' => 'taxonomy',
			'description' => esc_html__('Insert the taxonomy name you want to display.', 'themelovin'),
			'value' => $tasks_array
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