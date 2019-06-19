<?php
/**
* The Template for display single post.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_switch_header($post->ID);
while (have_posts()) {
	the_post();
	get_template_part('content', 'single');
}
get_footer();
?>