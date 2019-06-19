<?php
/* ---------------------------------------------------------------------------------------

 	Widget Name: Themelovin Twitter Feed
 	Widget URI: http://hemelovin.com
 	Description:  A widget to displays your recent tweets (using API v1.1).
 	Author: Themelovin
 	Author URI: http://www.themelovin.com
 	Version: 1.1
 
--------------------------------------------------------------------------------------- */

// ADD FUNTION TO WIDGETS_INIT
add_action('widgets_init', create_function('', 'register_widget("thmlv_twitter_widget");'));

//REQUIRED
require_once('include/twitteroauth.php');

//WIDGET CLASS
class thmlv_twitter_widget extends WP_Widget {

	private $thmlv_twitter_oauth = array();

	public function __construct() {
		parent::__construct(
			'thmlv_twitter', // BASE ID
			esc_html__('Themelovin Twitter', 'themelovin'), // NAME
			array(
				'classname' => 'thmlv-widget-twitter',
				'description' => esc_html__('Displays your preferred Twitter feed.', 'themelovin')
			)
		);
		add_action('wp_enqueue_scripts', array(&$this, 'thmlv_enqueue_scripts'));
	}
	
	public function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = apply_filters('widget_title', $instance['title']);
		if($title) {
			echo $before_title.$title.$after_title;
		}
		$result = $this->getTweets($instance['username'], $instance['count']);
		
		echo '<ul>';
		if($result && is_array($result)) {
			foreach($result as $tweet) {
				$text = $this->link_replace($tweet['text']);
				echo '<li><i class="fa fa-twitter"></i> ';
					echo $text;
					echo '<a class="thmlv-twitter-timestamp" href="http://twitter.com/'.$instance['username'].'/status/'.$tweet['id'].'">'.$tweet['timestamp'].'</a>';
				echo '</li>';
			}
		} else {
			echo '<li>'.esc_html__('There was an error retrieving your Twitter feed', 'themelovin').'</li>';
		}
		echo '</ul>';
		if(!empty($instance['tweettext'])) {
			echo '<a class="thmlv-follow-link button" href="http://twitter.com/'.$instance['username'].'">'.$instance['tweettext'].'</a>';
		}
		echo $after_widget;
	}
	
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['tweettext'] = strip_tags($new_instance['tweettext']);
		return $instance;
	}
	
	public function form($instance) {
		$instance = wp_parse_args((array)$instance);
		// default values
		$defaults = array(
			'title' => 'Twitter.',
			'username' => 'themelovin',
			'count' => '4',
			'tweettext' => 'Follow us',
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		
		$access_token = get_option('thmlv_access_token');
		$access_token_secret = get_option('thmlv_access_token_secret');
		$consumer_key = get_option('thmlv_consumer_key');
		$consumer_key_secret = get_option('thmlv_consumer_secret');
		
		if(empty($access_token) || empty($access_token_secret) || empty($consumer_key) || empty($consumer_key_secret)) {
			echo '<p><a href="options-general.php?page=thmlv-twitter">Twitter widget setting mismatch!</a></p>'; 
		} else { ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
			
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('Twitter Username: (ex: <a href="http://www.twitter.com/themelovin" target="_blank">Themelovin</a>)', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
			
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php esc_html_e('Number of Tweets:', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
		</p>
			
		<p>
			<label for="<?php echo $this->get_field_id('tweettext'); ?>"><?php esc_html_e('Button Text:', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('tweettext'); ?>" name="<?php echo $this->get_field_name('tweettext'); ?>" value="<?php echo $instance['tweettext']; ?>" />
		</p>
		<?php
		}
	}
	
	public function getTweets($username, $count) {
		$config = array();
		$config['username'] = $username;
		$config['count'] = $count;
		$config['access_token'] = get_option('thmlv_access_token');
		$config['access_token_secret'] = get_option('thmlv_access_token_secret');
		$config['consumer_key'] = get_option('thmlv_consumer_key');
		$config['consumer_key_secret'] = get_option('thmlv_consumer_secret');
		
		$currentname = 'thmlv_'.$username.'_'.$count;
		
		$result = get_transient($currentname);
		if(!$result) {
			$result = $this->thmlv_oauth_tweets($config);
	
			if(isset($result['errors'])) {
				$result = NULL; 
			} else {
				$result = $this->thmlv_parse_tweets($result);
				set_transient($currentname, $result, 300);
			}
		} else {
			if(is_string($result))
				unserialize($result);
		}
		return $result;
	}
	
	private function thmlv_oauth_tweets($config) {
		if(empty($config['access_token'])) 
			return array('error' => esc_html__('Check settings', 'themelovin'));		
		if(empty($config['access_token_secret'])) 
			return array('error' => esc_html__('Ccheck settings', 'themelovin'));
		if(empty($config['consumer_key'])) 
			return array('error' => esc_html__('Check settings', 'themelovin'));		
		if(empty($config['consumer_key_secret'])) 
			return array('error' => esc_html__('Check settings', 'themelovin'));		
	
		$options = array(
			'trim_user' => true,
			'exclude_replies' => false,
			'include_rts' => true,
			'count' => $config['count'],
			'screen_name' => $config['username']
		);
	
		$connection = new TwitterOAuth($config['consumer_key'], $config['consumer_key_secret'], $config['access_token'], $config['access_token_secret']);
		$result = $connection->get('statuses/user_timeline', $options);
	
		return $result;
	}
	
	public function thmlv_parse_tweets($results = array()) {
		$tweets = array();
		foreach($results as $result) {
			$temp = explode(' ', $result['created_at']);
			$timestamp = $temp[2].' '.$temp[1].' '.$temp[5];
	
			$tweets[] = array(
				'timestamp' => $timestamp,
				'text' => filter_var($result['text'], FILTER_SANITIZE_STRING),
				'id' => $result['id_str']
			);
		}
		return $tweets;
	}
	
	private function thmlv_text_link($matches) {
		return '<a href="'.$matches[0].'" target="_blank">'.$matches[0].'</a>';
	}
	
	private function thmlv_username_link($matches) {
		return '<a href="http://twitter.com/'.$matches[0].'" target="_blank">'.$matches[0].'</a>';
	}
	
	public function link_replace($text) {
		//links
		$string = preg_replace_callback("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", array(&$this, 'thmlv_text_link'), $text);
		//username
		$string = preg_replace_callback('/@([A-Za-z0-9_]{1,15})/', array(&$this, 'thmlv_username_link'), $string);
		return $string;
	}
	
	function thmlv_enqueue_scripts() {
		wp_enqueue_style('thmlv-twitter', plugins_url('/styles/thmlv-twitter.css', __FILE__));
		wp_enqueue_style('thmlv-twitter-fawesome', plugins_url('/styles/font-awesome.min.css', __FILE__));
	}
	
}

function thmlv_twitter_options_page_settings() {
	add_options_page(
		esc_html__('Twitter Settings', 'themelovin'), esc_html__('Themelovin Twitter', 'themelovin'), 'manage_options', 'thmlv-twitter', 'thmlv_twitter_admin_page'
	);
}
add_action('admin_menu', 'thmlv_twitter_options_page_settings');

function thmlv_twitter_settings() {
	$thmlv_opts = array();
	$thmlv_opts[] = array('label' => 'Consumer Key:', 'name' => 'thmlv_consumer_key');
	$thmlv_opts[] = array('label' => 'Consumer Secret:', 'name' => 'thmlv_consumer_secret');
	$thmlv_opts[] = array('label' => 'Account Access Token:', 'name' => 'thmlv_access_token');
	$thmlv_opts[] = array('label' => 'Account Access Token Secret:', 'name' => 'thmlv_access_token_secret');
	return $thmlv_opts;
}

function thmlv_register_settings() {
	$settings = thmlv_twitter_settings();
	foreach($settings as $setting) {
		register_setting('thmlv_twitter_settings', $setting['name']);
	}
}
add_action('admin_init', 'thmlv_register_settings');

function thmlv_twitter_admin_page() {
	if(!current_user_can('manage_options')) {
		wp_die(esc_html__('Insufficient permissions', 'themelovin'));
	}

	$settings = thmlv_twitter_settings();

	echo '<div class="wrap">';
	 	screen_icon();
		echo '<h2>Themelovin Twitter plugin</h2>';
		echo '<div class="wrap">'; 
		echo '<p>'.esc_html__('Display yout tweets using our new Twitter plugin! Remember to fill the fields below with the <a href="https://dev.twitter.com/apps/new" target="_blank">correct information</a> to use our plugin.', 'themelovin').'</p></br>';
		?>
			<?php
			echo '<form method="post" action="options.php">';
				settings_fields('thmlv_twitter_settings');
				echo '<h4 style="font-size: 15px; font-weight: 600; color: #222; margin-bottom: 7px;">'.esc_html__('OAuth Codes', 'themelovin').'</h4>';
				echo '<table>';
					foreach($settings as $setting) {
						echo '<tr>';
							echo '<td style="padding-right: 20px;">'.$setting['label'].'</td>';
							echo '<td><input type="text" style="width:500px;" name="'.$setting['name'].'" value="'.get_option($setting['name']).'" /></td>';
						echo '</tr>';
					}
				echo '</table>';
				submit_button();
			echo '</form>';
		echo '</div>';
	echo '</div>';
}
?>