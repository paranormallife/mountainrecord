<?php
/**
* Template Name: Portfolio Selected
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
get_header();
$class = esc_attr(get_post_meta($post->ID, '_oslo_header_appeal', true));
echo oslo_switch_header($post->ID);
?>
<div id="thmlvContent" class="thmlvSelectedContent">
	<div id="thmlvSelectedBackgrounds">
		<?php
		include_once(ABSPATH.'wp-admin/includes/plugin.php');
		if(is_plugin_active('themelovin-portfolio/thmlv-portfolios.php')){
			$args = array(
				'nopaging' => true,
				'post_type' => 'portfolio',
				'meta_query' => array(
					array(
						'key' => '_oslo_selected',
						'value' => 'on'
					)
				),
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC')
			);
			$wp_query = new WP_Query($args);
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
				get_template_part('loop-selected', get_post_format());
			endwhile;
		}
		?>
	</div>
	<div id="thmlvSelectedTitles" class="<?php echo $class; ?>">
		<ul>
		<?php
		include_once(ABSPATH.'wp-admin/includes/plugin.php'); 
		if(is_plugin_active('themelovin-portfolio/thmlv-portfolios.php')) {
			$args = array(
				'nopaging' => true,
				'post_type' => 'portfolio',
				'meta_query' => array(
					array(
						'key' => '_oslo_selected',
						'value' => 'on'
					)
				),
				'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC')
			);
			$wp_query = new WP_Query($args);
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
				echo oslo_switch_loop_link($post->ID, 1);
			endwhile;
		}
		?>
		</ul>
	</div>
</div>
<?php
get_footer();
?>