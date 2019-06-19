<?php
//create gallery page starts here
function acx_slideshow_nonce_check()
{
	if (!isset($_POST['acx_slideshow_add_gall_config'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_add_gall_config'],'acx_slideshow_add_gall_config')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','simple-slideshow-manager')."</a>");
} add_action('acx_slideshow_hook_option_onpost','acx_slideshow_nonce_check',1);

function acx_slideshow_nonce_field()
{
	echo "<input name='acx_slideshow_add_gall_config' type='hidden' value='".wp_create_nonce('acx_slideshow_add_gall_config')."' />";
	echo "<input name='my_plugin_hidden' type='hidden' value='Y' />";
} add_action('acx_slideshow_hook_option_fields','acx_slideshow_nonce_field',10);

function acx_slideshow_option_form_start()
{
	echo "<form name='acurax_si_form' id='acx_slideshow_form' onSubmit='javascript:return acx_validate_newgallery()'  method='post' action='".esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI']))."'>";
} add_action('acx_slideshow_hook_option_form_head','acx_slideshow_option_form_start',100);


function acx_slideshow_option_form_end()
{
	echo "</form>";
}  add_action('acx_slideshow_hook_option_form_footer','acx_slideshow_option_form_end',100);


function acx_slideshow_option_div_start()
{
	echo "<div id=\"acx_slideshow_option_page_holder\"> \n";
	echo "<div class=\"acx_slideshow_option_page_left\"> \n";
} add_action('acx_slideshow_hook_option_form_head','acx_slideshow_option_div_start',30);


function acx_slideshow_option_sidebar_start()
{
	echo "</div> <!-- acx_slideshow_option_page_left --> \n";
	echo "<div class=\"acx_slideshow_option_page_right\"> \n";
}  add_action('acx_slideshow_hook_option_sidebar','acx_slideshow_option_sidebar_start',10);


function acx_slideshow_option_sidebar_end()
{
	echo "</div> <!-- acx_slideshow_option_page_right --> \n";
	acx_slideshow_hook_function('acx_slideshow_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_hook_option_sidebar','acx_slideshow_option_sidebar_end',500);

function acx_slideshow_print_option_page_title()
{
	$acx_ssm_settings_h1 = __('Slideshow Manager Settings','simple-slideshow-manager');
 echo print_acx_slideshow_option_heading($acx_ssm_settings_h1);
} add_action('acx_slideshow_hook_option_form_head','acx_slideshow_print_option_page_title',50);
//create gallery page ends here

//manage gallery page starts here
function acx_slideshow_nonce_check_manage()
{
	if (!isset($_POST['acx_slideshow_manage_gall_config'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_manage_gall_config'],'acx_slideshow_manage_gall_config')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','simple-slideshow-manager')."</a>");
} add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_nonce_check_manage',1);

function acx_slideshow_nonce_field_manage()
{
	echo "<input name='acx_slideshow_manage_gall_config' type='hidden' value='".wp_create_nonce('acx_slideshow_manage_gall_config')."' />";
	echo "<input name='acx_slideshow_hidden' type='hidden' value='Y' />";
} add_action('acx_slideshow_hook_option_fields_manage','acx_slideshow_nonce_field_manage',10);

function acx_slideshow_option_form_start_manage()
{
	echo "<form name='acx_slideshow_form' data='eeeeeee' id='acx_slideshow_form' method='post' action='".esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI']))."'>";
} add_action('acx_slideshow_hook_option_form_head_manage','acx_slideshow_option_form_start_manage',100);

function acx_slideshow_option_form_end_manage()
{
	echo "</form>";
}  add_action('acx_slideshow_hook_option_form_footer_manage','acx_slideshow_option_form_end_manage',100);

function acx_slideshow_option_div_start_manage()
{
	echo "<div id=\"acx_slideshow_option_page_holder\"> \n";
	echo "<div class=\"acx_slideshow_option_page_left\"> \n";
} add_action('acx_slideshow_hook_option_form_head_manage','acx_slideshow_option_div_start_manage',30);

function acx_slideshow_option_sidebar_start_manage()
{
	
	echo "</div> <!-- acx_slideshow_option_page_left --> \n";
	echo "<div class=\"acx_slideshow_option_page_right\"> \n";
}  add_action('acx_slideshow_hook_option_sidebar_manage','acx_slideshow_option_sidebar_start_manage',10);

function acx_slideshow_option_sidebar_end_manage()
{
	echo "</div> <!-- acx_slideshow_option_page_right --> \n";
	acx_slideshow_hook_function('acx_slideshow_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_hook_option_sidebar_manage','acx_slideshow_option_sidebar_end_manage',500);

function acx_slideshow_print_option_page_title_manage()
{
	$acx_ssm_settings_h2 = __('Advanced Slideshow Manager Settings','simple-slideshow-manager');
 echo print_acx_slideshow_option_heading($acx_ssm_settings_h2);
} add_action('acx_slideshow_hook_option_form_head_manage','acx_slideshow_print_option_page_title_manage',50);

//manage gallery page ends here
//generate page starts here
function acx_slideshow_nonce_check_manage_generate()
{
	if (!isset($_POST['acx_slideshow_misc_config'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_misc_config'],'acx_slideshow_misc_config')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','simple-slideshow-manager')."</a>");
} add_action('acx_slideshow_hook_option_onpost_manage_generate','acx_slideshow_nonce_check_manage_generate',1);

function acx_slideshow_nonce_field_manage_generate()
{
	echo "<input name='acx_slideshow_misc_config' type='hidden' value='".wp_create_nonce('acx_slideshow_misc_config')."' />";
	echo "<input name='acx_slideshow_misc_hidden' type='hidden' value='Y' />";
} add_action('acx_slideshow_hook_option_fields_manage_generate','acx_slideshow_nonce_field_manage_generate',10);

function acx_slideshow_option_form_start_manage_generate()
{
	echo "<form name='acx_slideshow_generate_form' id='acx_slideshow_generate_form' method='post' action='".esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI']))."'>";
} add_action('acx_slideshow_hook_option_form_head_manage_generate','acx_slideshow_option_form_start_manage_generate',100);

function acx_slideshow_option_form_end_manage_generate()
{
	echo "</form>";
}  add_action('acx_slideshow_hook_option_form_footer_manage_generate','acx_slideshow_option_form_end_manage_generate',100);
function acx_slideshow_option_div_start_manage_generate()
{
	echo "<div id=\"acx_slideshow_option_page_holder\"> \n";
	echo "<div class=\"acx_slideshow_option_page_left\"> \n";
} add_action('acx_slideshow_hook_option_form_head_manage_generate','acx_slideshow_option_div_start_manage_generate',30);
function acx_slideshow_option_sidebar_start_manage_generate()
{
	echo "</div> <!-- acx_slideshow_option_page_left --> \n";
	echo "<div class=\"acx_slideshow_option_page_right\"> \n";
}  add_action('acx_slideshow_hook_option_sidebar_manage_generate','acx_slideshow_option_sidebar_start_manage_generate',10);
function acx_slideshow_option_sidebar_end_manage_generate()
{
	echo "</div> <!-- acx_slideshow_option_page_right --> \n";
	acx_slideshow_hook_function('acx_slideshow_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_hook_option_sidebar_manage_generate','acx_slideshow_option_sidebar_end_manage_generate',500);

function acx_slideshow_print_option_page_title_manage_generate()
{
	$acx_ssm_settings_h3 = __('Generate Shortcode or Php Code','simple-slideshow-manager');
 echo print_acx_slideshow_option_heading($acx_ssm_settings_h3 );
} add_action('acx_slideshow_hook_option_form_head_manage_generate','acx_slideshow_print_option_page_title_manage_generate',50);
//generate page ends here

//misc gallery page starts here
function acx_slideshow_nonce_check_manage_misc()
{
	if (!isset($_POST['acx_slideshow_misc_config'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_misc_config'],'acx_slideshow_misc_config')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','simple-slideshow-manager')."</a>");
} add_action('acx_slideshow_hook_option_onpost_manage_misc','acx_slideshow_nonce_check_manage_misc',1);

function acx_slideshow_nonce_field_manage_misc()
{
	echo "<input name='acx_slideshow_misc_config' type='hidden' value='".wp_create_nonce('acx_slideshow_misc_config')."' />";
	echo "<input name='acx_slideshow_misc_hidden' type='hidden' value='Y' />";
} add_action('acx_slideshow_hook_option_fields_manage_misc','acx_slideshow_nonce_field_manage_misc',10);

function acx_slideshow_option_form_start_manage_misc()
{
	echo "<form name='acx_slideshow_misc_form' id='acx_slideshow_form' method='post' action='".esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI']))."'>";
} add_action('acx_slideshow_hook_option_form_head_manage_misc','acx_slideshow_option_form_start_manage_misc',100);

function acx_slideshow_option_form_end_manage_misc()
{
	echo "</form>";
}  add_action('acx_slideshow_hook_option_form_footer_manage_misc','acx_slideshow_option_form_end_manage_misc',100);
function acx_slideshow_option_div_start_manage_misc()
{
	do_action('acx_slideshow_banners_misc_top');
	echo "<div id=\"acx_slideshow_option_page_holder\"> \n";
	echo "<div class=\"acx_slideshow_option_page_left\"> \n";
} add_action('acx_slideshow_hook_option_form_head_manage_misc','acx_slideshow_option_div_start_manage_misc',30);
function acx_slideshow_option_sidebar_start_manage_misc()
{
	echo "</div> <!-- acx_slideshow_option_page_left --> \n";
	echo "<div class=\"acx_slideshow_option_page_right\"> \n";
}  add_action('acx_slideshow_hook_option_sidebar_manage_misc','acx_slideshow_option_sidebar_start_manage_misc',10);
function acx_slideshow_option_sidebar_end_manage_misc()
{
	echo "</div> <!-- acx_slideshow_option_page_right --> \n";
	acx_slideshow_hook_function('acx_slideshow_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_hook_option_sidebar_manage_misc','acx_slideshow_option_sidebar_end_manage_misc',500);

function acx_slideshow_print_option_page_title_manage_misc()
{
	$acx_ssm_settings_h4 = __('Simple Slideshow Manager Misc Settings','simple-slideshow-manager');
 echo print_acx_slideshow_option_heading($acx_ssm_settings_h4);
} add_action('acx_slideshow_hook_option_form_head_manage_misc','acx_slideshow_print_option_page_title_manage_misc',50);
//misc manage gallery page ends here
//help page starts here
function acx_slideshow_nonce_check_manage_help()
{
	if (!isset($_POST['acx_slideshow_misc_config'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_misc_config'],'acx_slideshow_misc_config')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!current_user_can('manage_options')) die("<br><br>".__('Sorry, You have no permission to do this action...','simple-slideshow-manager')."</a>");
} add_action('acx_slideshow_hook_option_onpost_manage_help','acx_slideshow_nonce_check_manage_help',1);

function acx_slideshow_nonce_field_manage_help()
{
	echo "<input name='acx_slideshow_misc_config' type='hidden' value='".wp_create_nonce('acx_slideshow_misc_config')."' />";
	echo "<input name='acx_slideshow_misc_hidden' type='hidden' value='Y' />";
} add_action('acx_slideshow_hook_option_fields_manage_help','acx_slideshow_nonce_field_manage_help',10);

function acx_slideshow_option_form_start_manage_help()
{
	echo "<form name='acx_slideshow_misc_form' id='acx_slideshow_form' method='post' action='".esc_url(str_replace( '%7E', '~',$_SERVER['REQUEST_URI']))."'>";
} add_action('acx_slideshow_hook_option_form_head_manage_help','acx_slideshow_option_form_start_manage_help',100);
function acx_slideshow_option_form_end_manage_help()
{
	echo "</form>";
}  add_action('acx_slideshow_hook_option_form_footer_manage_help','acx_slideshow_option_form_end_manage_help',100);
function acx_slideshow_option_div_start_manage_help()
{
	echo "<div id=\"acx_slideshow_option_page_holder\"> \n";
	echo "<div class=\"acx_slideshow_option_page_left\"> \n";
} add_action('acx_slideshow_hook_option_form_head_manage_help','acx_slideshow_option_div_start_manage_help',30);
function acx_slideshow_option_sidebar_start_manage_help()
{
	echo "</div> <!-- acx_slideshow_option_page_left --> \n";
	echo "<div class=\"acx_slideshow_option_page_right\"> \n";
}  add_action('acx_slideshow_hook_option_sidebar_manage_help','acx_slideshow_option_sidebar_start_manage_help',10);
function acx_slideshow_option_sidebar_end_manage_help()
{
	echo "</div> <!-- acx_slideshow_option_page_right --> \n";
	acx_slideshow_hook_function('acx_slideshow_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_hook_option_sidebar_manage_help','acx_slideshow_option_sidebar_end_manage_help',500);
function acx_slideshow_print_option_page_title_manage_help()
{
	$acx_ssm_settings_h5 = __('Simple Slideshow Manager - Wordpress Plugin - Help/Support','simple-slideshow-manager');
 echo print_acx_slideshow_option_heading($acx_ssm_settings_h5);
} add_action('acx_slideshow_hook_option_form_head_manage_help','acx_slideshow_print_option_page_title_manage_help',50);
//help page ends here
function display_acx_slideshow_saved_success()
{ ?>
<div class="updated"><p><strong><?php _e('Simple Slideshow Settings Saved.','simple-slideshow-manager'); ?></strong></p></div>
<script type="text/javascript">
 setTimeout(function(){
		jQuery('.updated').fadeOut('slow');
		
		}, 4000);

</script>
<?php
}
add_action('acx_slideshow_hook_option_onpost','display_acx_slideshow_saved_success',5000);
add_action('acx_slideshow_hook_option_onpost_manage','display_acx_slideshow_saved_success',5000);
add_action('acx_slideshow_hook_option_onpost_manage_misc','display_acx_slideshow_saved_success',5000);
add_action('acx_slideshow_hook_option_onpost_manage_misc','display_acx_slideshow_saved_success',5000);

function acx_slideshow_lb_infobox()
{ ?>
<script type="text/javascript">
jQuery( ".slideshow_info_lb" ).click(function() {
var lb_title = jQuery(this).attr('lb_title');
var lb_content = jQuery(this).attr('lb_content');
var html= '<div id="acx_slideshow_c_icon_p_info_lb_h" style="display:none;"><div class="acx_slideshow_c_icon_p_info_c"><span class="acx_slideshow_c_icon_p_info_close" onclick="slideshow_remove_info()"></span><h4>'+lb_title+'</h4><div class="acx_slideshow_c_icon_p_info_content">'+lb_content+'</div></div></div> <!-- acx_slideshow_c_icon_p_info_lb_h -->';
jQuery( "body" ).append(html)
jQuery( "#acx_slideshow_c_icon_p_info_lb_h" ).fadeIn();
});

function slideshow_remove_info()
{
jQuery( "#acx_slideshow_c_icon_p_info_lb_h" ).fadeOut()
jQuery( "#acx_slideshow_c_icon_p_info_lb_h" ).remove();
};
</script>
<?php
} add_action('acx_slideshow_hook_option_footer','acx_slideshow_lb_infobox');
add_action('acx_slideshow_hook_option_footer','acx_slideshow_comparison_with_premium');

function acx_slideshow_service_banners()
{
?>
<div id="acx_slideshow_sidebar">
<?php $acx_slideshow_misc_acx_service_banners = get_option('acx_slideshow_misc_acx_service_banners');
if ($acx_slideshow_misc_acx_service_banners != "no") { ?>
<div id="acx_ad_banners_slideshow">
<a href="http://www.acurax.com/?utm_source=slideshow&utm_campaign=sidebar_banner_1" target="_blank" class="acx_ad_slideshow_1">
<div class="acx_ad_slideshow_title"><?php _e('Need Help on Wordpress?','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_title -->
<div class="acx_ad_slideshow_desc"><?php _e('Instant Solutions for your wordpress Issues','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_desc -->
</a> <!--  acx_ad_slideshow_1 -->

<a href="http://www.acurax.com/branding/?utm_source=slideshow&utm_campaign=sidebar_banner_2" target="_blank" class="acx_ad_slideshow_1">
<div class="acx_ad_slideshow_title"><?php _e('Unique Design For Better Branding','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_title -->
<div class="acx_ad_slideshow_desc acx_ad_slideshow_desc2" style="padding-top: 0px; padding-left: 50px; height: 41px; font-size: 13px; text-align: center;"><?php _e('Get Responsive Custom Designed Website For High Conversion','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_desc -->
</a> <!--  acx_ad_slideshow_1 -->

<a href="http://www.acurax.com/social-profile-design/?utm_source=slideshow&utm_campaign=sidebar_banner_3" target="_blank" class="acx_ad_slideshow_1">
<div class="acx_ad_slideshow_title"><?php _e('Brand Your Social Media Profiles','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_title -->
<div class="acx_ad_slideshow_desc acx_ad_slideshow_desc3" style="padding-top: 0px; height: 110px; text-align: left; font-size: 12px; line-height: 20px;"><?php _e('Social Profile Design means customizing and designing your online presence across many social networks in a professional way to maximize your customer engagement.<br><br>Order and Get Social Media Elements in 24 Hours','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_desc -->
</a> <!--  acx_ad_slideshow_1 -->

</div> <!--  acx_ad_banners_slideshow -->
<?php } else { ?>
<div class="acx_slideshow_sidebar_widget">
<div class="acx_slideshow_sidebar_w_title"><?php _e('Affordable Website Services','simple-slideshow-manager');?></div> <!-- acx_ad_slideshow_title -->
<div class="acx_slideshow_sidebar_w_content">
<?php _e('We know you are in the process of improving your website, and we the team at Acurax is always available for hire. ','simple-slideshow-manager'); ?><a href="http://www.acurax.com/webdesigning/?utm_source=slideshow&utm_campaign=sidebar_text_1" target="_blank"><?php _e('Get in touch','simple-slideshow-manager') ;?></a>
</div>
</div> <!-- acx_slideshow_sidebar_widget -->
<div class="acx_slideshow_sidebar_widget">
<div class="acx_slideshow_sidebar_w_title"><?php _e('Brand Your Social Media Profiles','simple-slideshow-manager');?></div>
<div class="acx_slideshow_sidebar_w_content"><?php _e('Social Profile Design means customizing and designing your online presence across many social networks in a professional way to maximize your customer engagement.','simple-slideshow-manager');?> <br><br><a href="http://www.acurax.com/social-profile-design/?utm_source=slideshow&utm_campaign=sidebar_text_2" target="_blank"><?php _e('Order and Get Social Media Elements in 24 Hours','simple-slideshow-manager'); ?></a></div>
</div> <!-- acx_slideshow_sidebar_widget -->
<div class="acx_slideshow_sidebar_widget">
<div class="acx_slideshow_sidebar_w_title"><?php _e('Partner With Us','simple-slideshow-manager'); ?></div> <!-- acx_ad_slideshow_title -->
<div class="acx_slideshow_sidebar_w_content acx_slideshow_sidebar_w_content_p_slide">
</div>
</div> <!-- acx_slideshow_sidebar_widget -->
<script type="text/javascript">
var acx_slideshow = new Array("<?php _e('<b>Are you an Agency?</b>, You can Outsource your projects to the team at Acurax...<br><br><a href=\'http://www.acurax.com/partner-with-us/?utm_source=slideshow&utm_campaign=sidebar_text_partner\' target=\'_blank\'>Know More...</a>','simple-slideshow-manager'); ?>","<?php _e('<ul><li>- Expert team with timely delivery</li><li>- Reducing the project cost</li><li>- Single Point of contact</li><li>- 100% White-label + Non disclosed agreement</li></ul><a href=\'http://www.acurax.com/partner-with-us/?utm_source=slideshow&utm_campaign=sidebar_text_partner\' target=\'_blank\'>Know More...</a>','simple-slideshow-manager'); ?>","<?php _e('<ul><li>- Ability to handle multiple projects at a time</li><li>- Well documented project management on project management system</li><li>- No Communication Barriers. Email/support ticket/IM via Skype, Yahoo, Hangouts and Phone etc...</li></ul><a href=\'http://www.acurax.com/partner-with-us/?utm_source=slideshow&utm_campaign=sidebar_text_partner\' target=\'_blank\'>Know More...</a>','simple-slideshow-manager'); ?>");
var current_loaded = 0;
function acx_slideshow_t_rotate()
{
	console.log(current_loaded);
	// acx_slideshow_text = acx_slideshow[Math.floor(Math.random()*acx_slideshow.length)];
	acx_slideshow_count = (acx_slideshow.length-1);
	acx_slideshow_text = acx_slideshow[current_loaded];
	jQuery(".acx_slideshow_sidebar_w_content_p_slide").fadeOut('fast');
	jQuery(".acx_slideshow_sidebar_w_content_p_slide").html(acx_slideshow_text);
	jQuery(".acx_slideshow_sidebar_w_content_p_slide").fadeIn('slow');
	current_loaded = current_loaded+1;
	if(current_loaded > acx_slideshow_count)
	{
		current_loaded = 0;
	}
}
jQuery(document).ready(function() {
	acx_slideshow_t_rotate();
	setInterval(function(){ acx_slideshow_t_rotate(); }, 4000);
});
</script>
<?php } ?>
<div class="acx_slideshow_sidebar_widget">
<div class="acx_slideshow_sidebar_w_title"><?php _e('Rate us on wordpress.org','simple-slideshow-manager'); ?></div>
<div class="acx_slideshow_sidebar_w_content" style="text-align:center;font-size:13px;"><b><?php _e('Thank you for being with us... If you like our plugin then please show us some love','simple-slideshow-manager');?> </b></br>
<a href="https://wordpress.org/support/view/plugin-reviews/<?php echo ACX_SLIDESHOW_WP_SLUG; ?>/" target="_blank" style="text-decoration:none;">
<span id="acx_slideshow_stars">
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
</span>
<span class="acx_slideshow_star_button button button-primary"><?php _e('Click Here','simple-slideshow-manager'); ?></span>
</a>
<p><?php _e('If you are facing any issues, kindly post them at plugins support forum','simple-slideshow-manager');?> <a href="http://wordpress.org/support/plugin/<?php echo ACX_SLIDESHOW_WP_SLUG; ?>/" target="_blank"><?php _e('here','simple-slideshow-manager'); ?></a>
</div>
</div> <!-- acx_slideshow_sidebar_widget -->
</div> <!--  acx_slideshow_sidebar -->
<?php	
} add_action('acx_slideshow_hook_option_sidebar','acx_slideshow_service_banners');
 add_action('acx_slideshow_hook_option_sidebar_manage','acx_slideshow_service_banners');
 add_action('acx_slideshow_hook_option_sidebar_manage_generate','acx_slideshow_service_banners');
 add_action('acx_slideshow_hook_option_sidebar_manage_misc','acx_slideshow_service_banners');
 add_action('acx_slideshow_hook_option_sidebar_manage_help','acx_slideshow_service_banners');

function acx_slideshow_misc_top_bnnr()
{
$acx_slideshow_misc_hide_advert = get_option('acx_slideshow_misc_hide_advert');
	if($acx_slideshow_misc_hide_advert=="")
	{
		$acx_slideshow_misc_hide_advert ="no";
	}
	if($acx_slideshow_misc_hide_advert == "no")
	{
		?>
		<div id="acx_ssm_premium">
		<a style="margin: 8px 0px 0px 10px; float: left; font-size: 16px; font-weight: bold;" href="http://www.acurax.com/products/simple-advanced-slideshow-manager/?utm_source=plugin&utm_medium=highlight&utm_campaign=ssm" target="_blank"><?php _e('Fully Featured Plugin - Advanced Slideshow Manager','simple-slideshow-manager'); ?></a>
		<a style="margin: -14px 0px 0px 10px; float: left;" href="http://www.acurax.com/products/simple-advanced-slideshow-manager/?utm_source=plugin&utm_medium=highlight_yellow&utm_campaign=ssm" target="_blank"><img src="<?php echo plugins_url('../images/yellow.png', __FILE__);?>"></a>
		</div> <!-- acx_ssm_premium -->
		<?php 
	}
}
add_action('acx_slideshow_banners_misc_top','acx_slideshow_misc_top_bnnr');
/*********************************************** Addons Page *************************************************/
function acx_slideshow_addon_option_div_start()
{
	echo "<div id=\"acx_slideshow_option_page_holder\" class=\"acx_slideshow_option_page_hold_cvr\"> \n";
	acx_slideshow_hook_function('acx_slideshow_addon_hook_option_above_page_cvr');
	echo "<div class=\"acx_slideshow_addon_option_page_cvr\"> \n";
} add_action('acx_slideshow_addon_hook_option_page_head','acx_slideshow_addon_option_div_start',30);
function acx_slideshow_addon_hook_heading()
{
	$acx_string = __("Acurax Advanced Slideshow Manger Available Addons","simple-slideshow-manager");
 echo print_acx_slideshow_option_heading($acx_string);
}
add_action("acx_slideshow_addon_hook_option_above_page_cvr","acx_slideshow_addon_hook_heading");
function acx_slideshow_addon_option_sidebar_start()
{
	acx_slideshow_hook_function('acx_slideshow_addon_hook_option_field_content');
	echo "</div> <!-- acx_slideshow_addon_option_page_cvr --> \n";
}  add_action('acx_slideshow_addon_hook_option_page','acx_slideshow_addon_option_sidebar_start',10);
function acx_slideshow_addon_option_sidebar_end()
{
	acx_slideshow_hook_function('acx_slideshow_addon_hook_option_footer');
	echo "</div> <!-- acx_slideshow_option_page_holder --> \n";
} add_action('acx_slideshow_addon_hook_option_page','acx_slideshow_addon_option_sidebar_end',500);
/*********************************************** Addons Page *************************************************/
?>