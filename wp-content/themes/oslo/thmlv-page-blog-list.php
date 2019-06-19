<?php
/**
* Template Name: Blog List
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
get_header();
echo oslo_switch_header($post->ID);
$temp = $wp_query; 
$wp_query = null; 
$wp_query = new WP_Query(); 
$num = get_option('posts_per_page');
$wp_query->query('showposts='.$num.'&paged='.$paged);
if(have_posts()) {
	while (have_posts()) {
		the_post();
		get_template_part('loop-single-list', get_post_format());
	}
}
oslo_numeric_posts_nav();
get_footer();
?>