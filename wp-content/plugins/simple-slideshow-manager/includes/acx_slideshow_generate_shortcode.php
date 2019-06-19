<?php
acx_slideshow_hook_function('acx_slideshow_hook_option_above_ifpost_manage_generate');
if(ISSET($_POST['acx_slideshow_hidden']))
{
	$acx_slideshow_hidden = $_POST['acx_slideshow_hidden'];
} 
else
{
	$acx_slideshow_hidden = "";
}
if($acx_slideshow_hidden == 'Y') 
{
	acx_slideshow_hook_function('acx_slideshow_hook_option_onpost_manage_generate');
} else
{
	acx_slideshow_hook_function('acx_slideshow_hook_option_postelse_manage_generate');
}
acx_slideshow_hook_function('acx_slideshow_hook_option_after_else_manage_generate');
acx_slideshow_hook_function('acx_slideshow_hook_option_form_head_manage_generate');
acx_slideshow_hook_function('acx_slideshow_hook_option_fields_manage_generate');
acx_slideshow_hook_function('acx_slideshow_hook_option_form_footer_manage_generate');
acx_slideshow_hook_function('acx_slideshow_hook_option_sidebar_manage_generate');
?>