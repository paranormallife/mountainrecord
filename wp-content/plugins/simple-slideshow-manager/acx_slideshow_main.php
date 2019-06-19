<?php
/* 
Plugin Name: Simple Slideshow Manager 
Plugin URI: http://www.acurax.com
Description: A Simple 2 Use Slideshow Plugin Which Help You To Create Multiple Image or Video Slideshows That You Can Display On Your Theme, Page, Post and Sidebar
Author: Acurax 
Version: 2.3.1
Author URI: http://www.acurax.com
Text Domain : simple-slideshow-manager
License: GPLv2 or later
*/
/*
Copyright 2008-current  Acurax International  ( website : www.acurax.com )
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
define("ACX_SLIDESHOW_VERSION", "2.3.1");
define("ACX_SLIDESHOW_BASE_LOCATION",plugin_dir_url( __FILE__ ));
define("ACX_SLIDESHOW_WP_SLUG","simple-slideshow-manager");
include_once(plugin_dir_path( __FILE__ ).'function.php');
include_once(plugin_dir_path( __FILE__ ).'includes/hooks.php');
include_once(plugin_dir_path( __FILE__ ).'includes/hook_functions.php');
include_once(plugin_dir_path( __FILE__ ).'includes/option_fields.php');
include_once(plugin_dir_path( __FILE__ ).'includes/acx-slideshow-licence-activation.php');
function acx_slideshow_admin() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/acx_slideshow_option.php');
}
function acx_slideshow_generate_shortcode() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/acx_slideshow_generate_shortcode.php');
}
function simple_slideshow_manager_misc() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/simple-slideshow-manager-misc.php');
}
function acx_slideshow_admin_help_gallery() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/help.php');
}
function acx_slideshow_admin_manage_gallery() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/acx_slideshow_managegallery.php');
}
function acx_slideshow_addons_page() 
{
	include_once(plugin_dir_path( __FILE__ ).'includes/acx_slideshow_addons.php');
}
function acx_slideshow_admin_actions()
{
	$acx_slideshow_misc_user_level = get_option('acx_slideshow_misc_user_level');
	if($acx_slideshow_misc_user_level=="")
	{
		$acx_slideshow_misc_user_level = "manage_options";
	}	
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page(  'Acurax Slideshow Configuration', __('Slideshow','simple-slideshow-manager'),$acx_slideshow_misc_user_level ,'Acurax-Slideshow-Settings' ,'acx_slideshow_admin',plugin_dir_url( __FILE__ ).'/images/admin.png' ); // manage_options for admin
	
	add_submenu_page('', __('Manage Gallery','simple-slideshow-manager'), __('Add Images','simple-slideshow-manager'), $acx_slideshow_misc_user_level, 'Acurax-Slideshow-Add-Images' ,'acx_slideshow_admin_manage_gallery');
	
	add_submenu_page('Acurax-Slideshow-Settings', __('Generate Shortcode','simple-slideshow-manager'), __('Code Generator','simple-slideshow-manager'), $acx_slideshow_misc_user_level, 'Acurax-Slideshow-Generate-Shortcode' ,'acx_slideshow_generate_shortcode');

	add_submenu_page('Acurax-Slideshow-Settings', __('Misc','simple-slideshow-manager'), __('Misc','simple-slideshow-manager'), $acx_slideshow_misc_user_level,'Acurax-Slideshow-Misc','simple_slideshow_manager_misc');
	
	add_submenu_page('Acurax-Slideshow-Settings', __('Acurax Slideshow Available Add-ons','simple-slideshow-manager'), __('Add-ons','simple-slideshow-manager'), 'manage_options', 'Acurax-Slideshow-Add-ons' ,'acx_slideshow_addons_page');
	
	add_submenu_page('Acurax-Slideshow-Settings', __('Help','simple-slideshow-manager'), __('Help','simple-slideshow-manager'), $acx_slideshow_misc_user_level,'Acurax-Slideshow-Help' ,'acx_slideshow_admin_help_gallery');
		
}
if (is_admin())
{
	add_action('admin_menu', 'acx_slideshow_admin_actions');
}
//*********** Include Additional Menu ********************
function AcuraxLinks_ASM($links, $file) {
	$plugin = plugin_basename(__FILE__);
	// create link
	if ($file == $plugin) {
		return array_merge( $links, array( 
			'<div id="plugin_page_links"><a href="http://www.acurax.com" target="_blank">' . __('Acurax International','simple-slideshow-manager') . '</a>',
			'<a href="https://twitter.com/#!/acuraxdotcom" target="_blank">' . __('Acurax on Twitter','simple-slideshow-manager') . '</a>',
			'<a href="http://www.facebook.com/AcuraxInternational" target="_blank">' . __('Acurax on Facebook','simple-slideshow-manager') . '</a>',
			'<a href="http://www.acurax.com/services/web-designing.php" target="_blank">' . __('Wordpress Support From Acurax','simple-slideshow-manager') . '</a>' 
		));
	}
	return $links;
}	add_filter('plugin_row_meta', 'AcuraxLinks_ASM', 10, 2 );
?>