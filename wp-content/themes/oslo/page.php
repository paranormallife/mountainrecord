<?php
/**
* The Template for display page.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_switch_header($post->ID);
while (have_posts()) {
	the_post();
	get_template_part('content', 'page');
}
get_footer();
?>