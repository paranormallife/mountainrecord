<?php
/*-----------------------------------------------------------------------------------*/
/* Mailchimp
/*-----------------------------------------------------------------------------------*/
function thmlv_shortcode_mailchimp($atts, $content = null) {
	$output = '';
	$plugins_dir = ABSPATH.'wp-content/plugins';
	extract( shortcode_atts( array(
		'mailchimp_key' => '',
	    'mailchimp_list' => '',
	    'newsletter_text' => '',
	    'column_number' => '',
		'el_class' => ''
	), $atts ) );

	if(strlen($mailchimp_key) > 0 && strlen($mailchimp_list) > 0) {
		$output = '<div class="thmlv_mailchimp wpb_content_element'.esc_attr( $el_class ).'">';
		if(strlen($mailchimp_key) > 0) {
			$output .= '<p>'.esc_attr($newsletter_text).'</p>';
		}
		$output .= '<form id="thmlvMailchimpSignup" action="'.$_SERVER['PHP_SELF'].'" method="get">';
		$output .= '<fieldset>';
		$output .= '<input type="text" name="email" id="email"  class="input-newsletter" value=""/>';
		$output .= '<input type="hidden" name="_mailchimp_key" id="_mailchimp_key" value="'.esc_attr($mailchimp_key).'"/>';
		$output .= '<input type="hidden" name="_mailchimp_list" id="_mailchimp_list" value="'.esc_attr($mailchimp_list).'"/>';
		$output .= '<input type="submit" src="" name="submit" value="'.__('Subscribe', 'themelovin').'" class="stw-btn submit-newsletter" alt="Submit" />';
		$output .= '<input type="text" style="display: none" value="'.WP_PLUGIN_URL.'/themelovin-vc-addons/include/store-address.php" name="hidden_path" class="thmlvHiddenPath">';
		$output .= '</fieldset>';
		$output .= '<span id="thmlvMailchimpResponse">';
		$output .= '</span>';
		$output .= '</form>';
		$output .= '</div>';
		return $output;
	} else {
		return __('<p>Please, add the Mailchimp API Key and API List</p>', 'themelovin');
	}
}
add_shortcode('thmlv_mailchimp', 'thmlv_shortcode_mailchimp');
?>