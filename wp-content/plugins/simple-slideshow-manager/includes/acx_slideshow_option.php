<?php
acx_slideshow_hook_function('acx_slideshow_hook_option_above_ifpost');
if(ISSET($_POST['my_plugin_hidden']))
{
	$acx_slideshow_hidden = $_POST['my_plugin_hidden'];
} 
else
{
	$acx_slideshow_hidden = "";
}
if($acx_slideshow_hidden == 'Y') 
{
	acx_slideshow_hook_function('acx_slideshow_hook_option_onpost');
} else
{
	acx_slideshow_hook_function('acx_slideshow_hook_option_postelse');
}
acx_slideshow_hook_function('acx_slideshow_hook_option_after_else');
acx_slideshow_hook_function('acx_slideshow_hook_option_form_head');
acx_slideshow_hook_function('acx_slideshow_hook_option_fields');
acx_slideshow_hook_function('acx_slideshow_hook_option_form_footer');
acx_slideshow_hook_function('acx_slideshow_hook_option_sidebar');
?>