<?php
/**
* Template Name: No Footer
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_child_switch_header($post->ID);
while (have_posts()) {
	the_post();
	get_template_part('content', 'page');
}
get_footer();
?>