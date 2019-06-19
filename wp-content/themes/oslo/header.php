<?php
/**
* The Template for display header.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<!--[if ie]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php oslo_print_favicon(); ?>
	
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>