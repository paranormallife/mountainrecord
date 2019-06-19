<?php
/* ---------------------------------------------------------------------------------------

Plugin Name: Themelovin Portfolio
Plugin URI: http://www.themelovin.com
Description: A simple portfolio plugins.
Version: 1.0.4
Author: Themelovin
Author URI: http://www.themelovin.com

/*------------------------------------------------------------------------------------- */

define('PORTFOLIO_DIR', dirname(__FILE__));
define('PORTFOLIO_URL', WP_PLUGIN_URL . "/" . basename(PORTFOLIO_DIR));

add_theme_support('post-thumbnails', array('portfolio'));
add_image_size('thmlvWidget', 400, 300, true);

function thmlv_portfolio_activate() {
    thmlv_portfolio_register();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'thmlv_portfolio_activate');

function thmlv_portfolio_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'thmlv_portfolio_deactivate');

/* ---------------------------------------------------------------------------------------

REGISTER POST TYPE

--------------------------------------------------------------------------------------- */

function thmlv_portfolio_register() {

    $labels = array(
        'name' => esc_html__('Portfolio', 'themelovin'),
        'singular_name' => esc_html__('Portfolio', 'themelovin'),
        'add_new' => esc_html__('Add portfolio', 'themelovin'),
        'add_new_item' => esc_html__('Add portfolio item', 'themelovin'),
        'edit_item' => esc_html__('Edit portfolio item', 'themelovin'),
        'new_item' => esc_html__('New portfolio item', 'themelovin'),
        'view_item' => esc_html__('View portfolio item', 'themelovin'),
        'search_items' => esc_html__('Search portfolio items', 'themelovin'),
        'not_found' => esc_html__('Portfolio item not found', 'themelovin'),
        'not_found_in_trash' => esc_html__('No portfolio item found into trash', 'themelovin'),
        'parent_item_colon' => '',
        'menu_name' => esc_html__('Portfolio', 'themelovin')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array(
        	'author',
            'title',
            'thumbnail',
            'editor',
            'post-formats'
        ),
        'menu_position' => 23,
        'menu_icon' => PORTFOLIO_URL.'/images/icon-portfolio.png',
        'taxonomies' => array('skills')
    );

    register_post_type('portfolio', $args);
}

function thmlv_portfolio_register_taxonomy() {
    register_taxonomy(
        'skills',
        'portfolio',
        array(
            'hierarchical' => true,
            'label' => 'Skills',
            'query_var' => true,
            'rewrite' => array('slug' => 'skills')
        )
    );
}
add_action('init', 'thmlv_portfolio_register');
add_action('init', 'thmlv_portfolio_register_taxonomy');
add_action('after_setup_theme', 'thmlv_portfolio_register_taxonomy');

/* ---------------------------------------------------------------------------------------

PORTFOLIO SORTING

--------------------------------------------------------------------------------------- */

if(!function_exists('thmlv_create_portfolio_sort_page')) {
	function thmlv_create_portfolio_sort_page() {
		$thmlv_sort_page = add_submenu_page('edit.php?post_type=portfolio', esc_html__('Sort Portfolio items', 'themelovin'), esc_html__('Sort', 'themelovin'), 'edit_posts', basename(__FILE__), 'thmlv_portfolio_sort');
		
		add_action('admin_print_scripts-' . $thmlv_sort_page , 'thmlv_portfolio_sort_scripts');
	}
	add_action('admin_menu', 'thmlv_create_portfolio_sort_page');
}

if(!function_exists('thmlv_portfolio_sort')) {
	function thmlv_portfolio_sort() {
		$portfolios = new WP_Query(array('nopaging' => true, 'post_type' => 'portfolio', 'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC' ))); ?>
		<div class="wrap">
			<div id="icon-tools" class="icon32"></div>   
			<h2><?php esc_html_e('Sort Portfolio', 'themelovin'); ?></h2>
			<p><?php esc_html_e('Re-order & repeat as necessary. The item at the top of the list will display first.', 'themelovin'); ?></p>
			<ul id="portfolio_list">
				<?php while( $portfolios->have_posts() ) : $portfolios->the_post();
					if( get_post_status() == 'publish' ) { ?>
						<li id="<?php the_id(); ?>" class="menu-item">
							<dl class="menu-item-bar">
								<dt class="menu-item-handle">
									<span class="menu-item-title"><?php the_title(); ?></span>
								</dt>
							</dl>
							<ul class="menu-item-transport"></ul>
						</li>
				<?php } endwhile; wp_reset_postdata(); ?>  
			</ul>
		</div>
	<?php }
}

if(!function_exists('thmlv_save_portfolio_sorted_order')) {	
	function thmlv_save_portfolio_sorted_order() {
		global $wpdb;
		
		$order = explode(',', $_POST['order']);
		$counter = 0;
		
		foreach($order as $portfolio_id) {
			$wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_id));
			$counter++;
		}
		die(1);
	}
	add_action('wp_ajax_portfolio_sort', 'thmlv_save_portfolio_sorted_order');
}

if(!function_exists('thmlv_portfolio_sort_scripts')) {	
	function thmlv_portfolio_sort_scripts() {
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script( 'thmlv-portfolio-sort', plugins_url( '/include/jquery.sort.js', __FILE__ ), array('jquery') );
	}
}

/* ---------------------------------------------------------------------------------------

PORTFOLIO WIDGET

--------------------------------------------------------------------------------------- */

class thmlv_widget_portfolio extends WP_Widget{
  function thmlv_widget_portfolio(){
    $widget_ops = array('classname' => 'portfolio-items', 'description' => esc_html__('Display portfolio items.', 'themelovin'));
    $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'thmlv_widget_portfolio');
    parent::__construct( 
		'thmlv_widget_portfolio',
		esc_html__('Themelovin Portfolio', 'themelovin'), 
		$widget_ops,
		$control_ops
	);
  }

  function widget($args, $instance){
    extract($args);
    
	wp_enqueue_style( 'thmlv-portfolio', plugins_url( '/styles/thmlv-portfolio.css', __FILE__ ));
	wp_enqueue_style( 'thmlv-portfolio-fa', plugins_url( '/styles/font-awesome.min.css', __FILE__ ));
	
    $title = apply_filters('widget_title', $instance['title'] );
    $button_text = $instance['button_text'];
    $button_link = $instance['button_link'];
    $post_count = $instance['post_count'];

    echo $before_widget;
    
    echo $before_title. $title . $after_title;
?>
	<div class="thmlv-widget-portfolio-content">
<?php
    $args = array(
		'posts_per_page' => $post_count,
		'post_type' => 'portfolio',
		'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC')
	);
	$wp_query = new WP_Query($args);
	while ($wp_query->have_posts()) : $wp_query->the_post();
	if (locate_template('widget-loop-portfolio.php') != '') {
		get_template_part('widget', 'loop-portfolio');
	} else {	
		load_template(dirname( __FILE__ ) . '/templates/widget-loop-portfolio.php', false);
	}
    endwhile;
    wp_reset_postdata();
?>
	</div>
<?php
	if($button_text != '') {
?>
	<a href="<?php echo $button_link; ?>" title="<?php echo $button_text ?>" class="thmlv-button"><?php echo $button_text ?></a>
<?php   
	} 
    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;

    // STRIP TAGS TO REMOVE HTML
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['button_text'] = strip_tags($new_instance['button_text']);
    $instance['button_link'] = strip_tags($new_instance['button_link']);
    $instance['post_count'] = strip_tags($new_instance['post_count']);

    return $instance;
  }

  function form($instance){
    $defaults = array(
      /* Deafult options goes here */
      'title' => 'Featured Work',
      'button_text' => 'Go to Portfolio',
      'button_link' => '',
      'post_count' => 4,
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('button_link'); ?>"><?php esc_html_e('Portfolio Link:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" value="<?php echo $instance['button_link']; ?>" />
      <span class="description"><?php esc_html_e('Enter the portfolio URL.', 'themelovin'); ?></span>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e('Button Text:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo $instance['button_text']; ?>" />
      <span class="description"><?php esc_html_e('Enter the text for go to blog button.', 'themelovin'); ?></span>
    </p>
    
    <p>
      <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php esc_html_e('Post Count:', 'themelovin'); ?></label>
      <input type="number" step="3" class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" value="<?php echo $instance['post_count']; ?>" />
      <span class="description"><?php esc_html_e('Enter the number of posts to display in right side.', 'themelovin'); ?></span>
    </p>

    <?php
  }
}

function thmlv_load_portfolio_widget() {
	register_widget('thmlv_widget_portfolio');
}
add_action('widgets_init','thmlv_load_portfolio_widget', 10);

?>