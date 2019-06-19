<?php
/*-----------------------------------------------------------------------------------*/
/* Mailchimp
/*-----------------------------------------------------------------------------------*/
vc_map(array(
	'name' => esc_html__("Mailchimp Form", 'themelovin'),
	'category' => esc_html__('Content', 'themelovin'),
	'description' => esc_html__('Add a Mailchimp subscription form.', 'themelovin'),
	'base' => 'thmlv_mailchimp',
	"icon" => 'thmlv_mailchimp',
	'params' => array(
	    array(
			"type" => "textfield",
			"heading" => esc_html__("MailChimp API Key", 'themelovin'),
			"param_name" => "mailchimp_key",
			"description" => esc_html__("Grab and insert an API Key from <a href='http://admin.mailchimp.com/account/api/' target='_blank'>here</a>", 'themelovin'),
	   ),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("MailChimp API List", 'themelovin'),
			"param_name" => "mailchimp_list",
			"description" => esc_html__("Grab your Lists Unique Id by going to <a href='http://admin.mailchimp.com/lists/' target='_blank'>here</a>. Click the \"Settings\" link for the list and then \"List name and defaults\" - the Unique Id is at the bottom of that page.", 'themelovin'),
	   ),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Newsletter text", 'themelovin'),
			"param_name" => "newsletter_text",
			"description" => esc_html__("Text to be displayed before the actual form. HTML not allowed", 'themelovin')
	   ),
        array(
           'type' => 'textfield',
           'heading' => esc_html__('Extra class name', 'themelovin'),
           'param_name' => 'el_class',
           'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'themelovin'),
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