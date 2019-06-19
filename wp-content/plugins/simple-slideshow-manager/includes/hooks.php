<?php
function acx_slideshow_hook_function($function_name)
{
	if($function_name!="")
	{
		if(function_exists($function_name))
		{
			$function_name();	
		}
	}
}
function acx_slideshow_hook_option_above_ifpost()
{
	do_action('acx_slideshow_hook_option_above_ifpost');
}
function acx_slideshow_hook_option_onpost()
{
	do_action('acx_slideshow_hook_option_onpost');
}
function acx_slideshow_hook_option_postelse()
{
	do_action('acx_slideshow_hook_option_postelse');
}
function acx_slideshow_hook_option_after_else()
{
	do_action('acx_slideshow_hook_option_after_else');
}
function acx_slideshow_hook_option_form_head()
{
	do_action('acx_slideshow_hook_option_form_head');
}
function acx_slideshow_hook_option_fields()
{
	do_action('acx_slideshow_hook_option_fields');
}
function acx_slideshow_hook_option_form_footer()
{
	do_action('acx_slideshow_hook_option_form_footer');
}
function acx_slideshow_hook_option_sidebar()
{
	do_action('acx_slideshow_hook_option_sidebar');
}
function acx_slideshow_hook_option_footer()
{
	do_action('acx_slideshow_hook_option_footer');
}


//manage gallery hooks starts here

function acx_slideshow_hook_option_above_ifpost_manage()
{
	do_action('acx_slideshow_hook_option_above_ifpost_manage');
}
function acx_slideshow_hook_option_onpost_manage()
{
	do_action('acx_slideshow_hook_option_onpost_manage');
}
function acx_slideshow_hook_option_postelse_manage()
{
	do_action('acx_slideshow_hook_option_postelse_manage');
}
function acx_slideshow_hook_option_after_else_manage()
{
	do_action('acx_slideshow_hook_option_after_else_manage');
}
function acx_slideshow_hook_option_form_head_manage()
{
	do_action('acx_slideshow_hook_option_form_head_manage');
}
function acx_slideshow_hook_option_fields_manage()
{
	do_action('acx_slideshow_hook_option_fields_manage');
}
function acx_slideshow_hook_option_form_footer_manage()
{
	do_action('acx_slideshow_hook_option_form_footer_manage');
}
function acx_slideshow_hook_option_sidebar_manage()
{
	do_action('acx_slideshow_hook_option_sidebar_manage');
}
function acx_slideshow_hook_option_footer_manage()
{
	do_action('acx_slideshow_hook_option_footer_manage');
}
//Generate shortcode page hooks starts here

function acx_slideshow_hook_option_above_ifpost_manage_generate()
{
	do_action('acx_slideshow_hook_option_above_ifpost_manage_generate');
}
function acx_slideshow_hook_option_onpost_manage_generate()
{
	do_action('acx_slideshow_hook_option_onpost_manage_generate');
}
function acx_slideshow_hook_option_postelse_manage_generate()
{
	do_action('acx_slideshow_hook_option_postelse_manage_generate');
}
function acx_slideshow_hook_option_after_else_manage_generate()
{
	do_action('acx_slideshow_hook_option_after_else_manage_generate');
}
function acx_slideshow_hook_option_form_head_manage_generate()
{
	do_action('acx_slideshow_hook_option_form_head_manage_generate');
}
function acx_slideshow_hook_option_fields_manage_generate()
{
	do_action('acx_slideshow_hook_option_fields_manage_generate');
}
function acx_slideshow_hook_option_form_footer_manage_generate()
{
	do_action('acx_slideshow_hook_option_form_footer_manage_generate');
}
function acx_slideshow_hook_option_sidebar_manage_generate()
{
	do_action('acx_slideshow_hook_option_sidebar_manage_generate');
}
function acx_slideshow_hook_option_footer_manage_generate()
{
	do_action('acx_slideshow_hook_option_footer_manage_generate');
}
//misc manage gallery hooks starts here

function acx_slideshow_hook_option_above_ifpost_manage_misc()
{
	do_action('acx_slideshow_hook_option_above_ifpost_manage_misc');
}
function acx_slideshow_hook_option_onpost_manage_misc()
{
	do_action('acx_slideshow_hook_option_onpost_manage_misc');
}
function acx_slideshow_hook_option_postelse_manage_misc()
{
	do_action('acx_slideshow_hook_option_postelse_manage_misc');
}
function acx_slideshow_hook_option_after_else_manage_misc()
{
	do_action('acx_slideshow_hook_option_after_else_manage_misc');
}
function acx_slideshow_hook_option_form_head_manage_misc()
{
	do_action('acx_slideshow_hook_option_form_head_manage_misc');
}
function acx_slideshow_hook_option_fields_manage_misc()
{
	do_action('acx_slideshow_hook_option_fields_manage_misc');
}
function acx_slideshow_hook_option_form_footer_manage_misc()
{
	do_action('acx_slideshow_hook_option_form_footer_manage_misc');
}
function acx_slideshow_hook_option_sidebar_manage_misc()
{
	do_action('acx_slideshow_hook_option_sidebar_manage_misc');
}
function acx_slideshow_hook_option_footer_manage_misc()
{
	do_action('acx_slideshow_hook_option_footer_manage_misc');
}
//help page hooks starts here
function acx_slideshow_hook_option_above_ifpost_manage_help()
{
	do_action('acx_slideshow_hook_option_above_ifpost_manage_help');
}
function acx_slideshow_hook_option_onpost_manage_help()
{
	do_action('acx_slideshow_hook_option_onpost_manage_help');
}
function acx_slideshow_hook_option_postelse_manage_help()
{
	do_action('acx_slideshow_hook_option_postelse_manage_help');
}
function acx_slideshow_hook_option_after_else_manage_help()
{
	do_action('acx_slideshow_hook_option_after_else_manage_help');
}
function acx_slideshow_hook_option_form_head_manage_help()
{
	do_action('acx_slideshow_hook_option_form_head_manage_help');
}
function acx_slideshow_hook_option_fields_manage_help()
{
	do_action('acx_slideshow_hook_option_fields_manage_help');
}
function acx_slideshow_hook_option_form_footer_manage_help()
{
	do_action('acx_slideshow_hook_option_form_footer_manage_help');
}
function acx_slideshow_hook_option_sidebar_manage_help()
{
	do_action('acx_slideshow_hook_option_sidebar_manage_help');
}
function acx_slideshow_hook_option_footer_manage_help()
{
	do_action('acx_slideshow_hook_option_footer_manage_help');
}
/* Addon Page */

function acx_slideshow_addon_hook_option_page_head()
{
	do_action('acx_slideshow_addon_hook_option_page_head');
}
function acx_slideshow_addon_hook_option_above_page_cvr()
{
	do_action('acx_slideshow_addon_hook_option_above_page_cvr');
}
function acx_slideshow_addon_hook_option_page()
{
	do_action('acx_slideshow_addon_hook_option_page');
}
function acx_slideshow_addon_hook_option_footer()
{
	do_action('acx_slideshow_addon_hook_option_footer');
}
function acx_slideshow_addon_hook_option_field_content()
{
	do_action('acx_slideshow_addon_hook_option_field_content');
}
?>