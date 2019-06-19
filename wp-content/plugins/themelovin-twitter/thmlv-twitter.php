<?php
/* ---------------------------------------------------------------------------------------

Plugin Name: Themelovin Twitter
Plugin URI: http://themelovin.com
Description: Create a Twitter widget (using API v1.1). You have to create a <a href="https://dev.twitter.com/apps/">Twitter App</a> to retrieve your access tokens.
Version: 1.1
Author: Themelovin
Author URI: http://www.themelovin.com

--------------------------------------------------------------------------------------- */

// prevent from any direct call
if (!function_exists('add_action')) {
	echo 'Ooops! What are you looking for?!';
	exit;
}

// include widget
require_once('thmlv-twitter-widget.php');
?>