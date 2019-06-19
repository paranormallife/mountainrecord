<?php
/**
* The Template for category.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_switch_header();
if(have_posts()) {
	while (have_posts()) {
		the_post();
		$format = get_post_format();
		get_template_part('loop-single', get_post_format());
	}
}
oslo_numeric_posts_nav();
get_footer();
?>