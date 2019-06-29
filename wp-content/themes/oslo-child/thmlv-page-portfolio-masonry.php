<?php
/**
* Template Name: Portfolio Masonry
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
get_header();
echo oslo_child_switch_header($post->ID);
include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
if(is_plugin_active('themelovin-portfolio/thmlv-portfolios.php')) {
?>
<div id="thmlvIsotope">
	<?php
	$args = array(
		'nopaging' => true,
		'post_type' => 'portfolio',
		'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC')
	);
	$wp_query = new WP_Query($args);
	while ($wp_query->have_posts()) : $wp_query->the_post(); 
		get_template_part('loop-portfolio', get_post_format());
	endwhile;
	?>
</div>
<?php
	}
get_footer();
?>