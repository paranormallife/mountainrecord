<?php
/**
* The Template for taxonomy
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
get_header();
?>
<div id="thmlvContent">
	<?php
	echo oslo_switch_header();
	include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
	if(is_plugin_active('themelovin-portfolio/thmlv-portfolios.php')) {
	?>
	<div id="thmlvIsotope">
		<?php
		$args = array(
			'nopaging' => true,
			'post_type' => 'portfolio',
			'skills' => $term->slug,
			'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC')
		);
		$wp_query = new WP_Query($args);
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
			get_template_part('loop-portfolio', get_post_format());
		endwhile;
		wp_reset_postdata();
		?>
	</div>
	<?php
	}
	?>
</div>
<?php
get_footer();
?>