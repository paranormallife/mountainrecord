<?php
/* ---------------------------------------------------------------------------------------

Plugin Name: Themelovin Team
Plugin URI: http://www.themelovin.com
Description: A simple team plugins.
Version: 1.0.3
Author: Themelovin
Author URI: http://www.themelovin.com

--------------------------------------------------------------------------------------- */

define('TEAM_DIR', dirname(__FILE__));
define('TEAM_URL', WP_PLUGIN_URL . "/" . basename(TEAM_DIR));

add_theme_support('post-thumbnails', array('team'));
add_image_size('thmlvWidget', 400, 300, true);

function thmlv_team_activate() {
    thmlv_team_register();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'thmlv_team_activate');

function thmlv_team_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'thmlv_team_deactivate');

/* ---------------------------------------------------------------------------------------

REGISTER POST TYPE

--------------------------------------------------------------------------------------- */

function thmlv_team_register() {

    $labels = array(
        'name' => esc_html__('Team', 'themelovin'),
        'singular_name' => esc_html__('Team', 'themelovin'),
        'add_new' => esc_html__('Add team', 'themelovin'),
        'add_new_item' => esc_html__('Add team member', 'themelovin'),
        'edit_item' => esc_html__('Edit team member', 'themelovin'),
        'new_item' => esc_html__('New team member', 'themelovin'),
        'view_item' => esc_html__('View team member', 'themelovin'),
        'search_items' => esc_html__('Search team member', 'themelovin'),
        'not_found' => esc_html__('Team member not found', 'themelovin'),
        'not_found_in_trash' => esc_html__('No team member found into trash', 'themelovin'),
        'parent_item_colon' => '',
        'menu_name' => esc_html__('Team', 'themelovin')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'menu_position' => 23,
        'menu_icon' => TEAM_URL.'/images/icon-team.png',
        'taxonomies' => array('tasks')
    );

    register_post_type('team', $args);
}

function thmlv_team_register_taxonomy() {
    register_taxonomy(
        'tasks',
        'team',
        array(
            'hierarchical' => true,
            'label' => 'Tasks',
            'query_var' => true,
            'rewrite' => array('slug' => 'tasks')
        )
    );
}
add_action('init', 'thmlv_team_register');
add_action('init', 'thmlv_team_register_taxonomy');
add_action('after_setup_theme', 'thmlv_team_register_taxonomy');

/* ---------------------------------------------------------------------------------------

TEAM SORTING

--------------------------------------------------------------------------------------- */

if(!function_exists('thmlv_create_team_sort_page')) {	
	function thmlv_create_team_sort_page() {
		$thmlv_sort_page = add_submenu_page('edit.php?post_type=team', esc_html__('Sort Team items', 'themelovin'), esc_html__('Sort', 'themelovin'), 'edit_posts', basename(__FILE__), 'thmlv_team_sort');
		
		add_action('admin_print_scripts-' . $thmlv_sort_page , 'thmlv_team_sort_scripts');
	}
	add_action('admin_menu', 'thmlv_create_team_sort_page');
}

if(!function_exists('thmlv_team_sort')) {
	function thmlv_team_sort() {
		$teams = new WP_Query(array('nopaging' => true, 'post_type' => 'team', 'orderby' => array('menu_order' => 'ASC', 'ID' => 'ASC' ))); ?>
		<div class="wrap">
			<div id="icon-tools" class="icon32"></div>   
			<h2><?php esc_html_e('Sort Team', 'themelovin'); ?></h2>
			<p><?php esc_html_e('Re-order & repeat as necessary. The item at the top of the list will display first.', 'themelovin'); ?></p>
			<ul id="team_list">
				<?php while( $teams->have_posts() ) : $teams->the_post();
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
	
if(!function_exists('thmlv_save_team_sorted_order')) {
	function thmlv_save_team_sorted_order() {
		global $wpdb;
		
		$order = explode(',', $_POST['order']);
		$counter = 0;
		
		foreach($order as $team_id) {
			$wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $team_id));
			$counter++;
		}
		die(1);
	}
	add_action('wp_ajax_team_sort', 'thmlv_save_team_sorted_order');
}

if(!function_exists('thmlv_team_sort_scripts')) {
	function thmlv_team_sort_scripts() {
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script( 'thmlv-team-sort', plugins_url( '/include/jquery.sort.js', __FILE__ ), array('jquery') );
	}
}

/* ---------------------------------------------------------------------------------------

TEAM WIDGET

--------------------------------------------------------------------------------------- */

class thmlv_widget_team extends WP_Widget{
  function thmlv_widget_team(){
    $widget_ops = array('classname' => 'team-items', 'description' => esc_html__('Display team members.', 'themelovin'));
    $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'thmlv_widget_team');
    parent::__construct( 
		'thmlv_widget_team',
		esc_html__('Themelovin Team', 'themelovin'), 
		$widget_ops,
		$control_ops
	);
  }

  function widget($args, $instance){
    extract($args);
    
	wp_enqueue_style( 'thmlv-team', plugins_url( '/styles/thmlv-team.css', __FILE__ ));
	
    $title = apply_filters('widget_title', $instance['title'] );
    $button_text = $instance['button_text'];
    $button_link = $instance['button_link'];
    $post_count = $instance['post_count'];

    echo $before_widget;
    
    echo $before_title. $title . $after_title;
?>
	<div class="thmlv-widget-team-content">
<?php
    $args = array(
		'posts_per_page' => $post_count,
		'post_type' => 'team',
		'orderby' => array('menu_order' => 'DESC', 'ID' => 'DESC')
	);
	$wp_query = new WP_Query($args);
	while ($wp_query->have_posts()) : $wp_query->the_post();
	if (locate_template('widget-loop-team.php') != '') {
		get_template_part('widget', 'loop-team');
	} else {	
		load_template(dirname( __FILE__ ) . '/templates/widget-loop-team.php', false);
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
      'title' => 'Featured Members',
      'button_text' => 'Go to members page',
      'button_link' => '',
      'post_count' => 4,
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    /* HERE GOES THE FORM */
    ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('button_link'); ?>"><?php esc_html_e('Members page Link:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" value="<?php echo $instance['button_link']; ?>" />
      <span class="description"><?php esc_html_e('Enter the portfolio URL.', 'themelovin'); ?></span>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e('Button Text:', 'themelovin'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo $instance['button_text']; ?>" />
      <span class="description"><?php esc_html_e('Enter the text for go to blog button.', 'themelovin'); ?></span>
    </p>
    
    <p>
      <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php esc_html_e('Members Count:', 'themelovin'); ?></label>
      <input type="number" step="3" class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" value="<?php echo $instance['post_count']; ?>" />
      <span class="description"><?php esc_html_e('Enter the number of posts to display in right side.', 'themelovin'); ?></span>
    </p>

    <?php
  }
}

function thmlv_load_team_widget() {
	register_widget('thmlv_widget_team');
}
add_action('widgets_init','thmlv_load_team_widget', 10);

?>