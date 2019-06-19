<?php
/**
* The Template for display single team member.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_switch_header($post->ID);
while (have_posts()) {
	the_post();
	get_template_part('content', 'team');
}
get_footer();
?>