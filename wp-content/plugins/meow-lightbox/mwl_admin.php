<?php

include "common/admin.php";

class Meow_MWL_Admin extends MeowApps_Admin {

	public function __construct( $prefix, $mainfile, $domain ) {
		parent::__construct( $prefix, $mainfile, $domain );
		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'app_menu' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		}
	}

	function admin_notices() {
		$permastruct = get_option( 'permalink_structure' );
		if ( empty( $permastruct ) ) {
		?>
			<div class="notice notice-error is-dismissible">
					<p><?php _e( 'Meow Lightbox will not work properly if your permalinks are set up on "Plain". Please pick a dynamic structure for your permalinks (Settings > Permalinks).', 'meow-lightbox' ); ?></p>
			</div>
		<?php
		}
		if ( !function_exists( "exif_read_data" ) ) {
			?>
			<div class="notice notice-error is-dismissible">
					<p><?php _e( 'The function <i>exif_read_data</i> is not available on your server, but it is required by the Meow Lightbox. Please ask your hosting service to enable the <i>php_exif</i> module.', 'meow-lightbox' ); ?></p>
			</div>
			<?php
		}
	}

	function common_url( $file ) {
		return trailingslashit( plugin_dir_url( __FILE__ ) ) . 'common/' . $file;
	}

	function app_menu() {

		//TODO: After June 2019, delete this.
		delete_option( 'mwl_layout' );

		$value = get_option( 'mwl_selector', '.entry-content, .gallery, .mgl-gallery, .wp-block-gallery' );
		if ( empty( $value ) ) {
			update_option( 'mwl_selector', '.entry-content, .gallery, .mgl-gallery, .wp-block-gallery' );
		}

		// SUBMENU > Settings
		add_submenu_page( 'meowapps-main-menu', 'Lightbox', 'Lightbox', 'manage_options',
			'mwl_settings-menu', array( $this, 'admin_settings' ) );

			// SUBMENU > Settings > Display
			add_settings_section( 'mwl_settings', null, null, 'mwl_settings-menu' );
			add_settings_field( 'mwl_theme', __( "Theme", 'meow-lightbox' ),
				array( $this, 'admin_theme_callback' ),
				'mwl_settings-menu', 'mwl_settings' );
			add_settings_field( 'mwl_orientation', "Responsive Orientation",
				array( $this, 'admin_orientation_callback' ),
				'mwl_settings-menu', 'mwl_settings' );
			add_settings_field( 'mwl_download_link', "Download Link",
				array( $this, 'admin_download_link_callback' ),
				'mwl_settings-menu', 'mwl_settings' );
			add_settings_field( 'mwl_image_size', __ ( "Image Size", 'meow-lightbox' ),
				array( $this, 'admin_image_size_callback' ),
				'mwl_settings-menu', 'mwl_settings' );
			add_settings_field( 'mwl_map', "Location Map<br />(Pro)",
				array( $this, 'admin_map_callback' ),
				'mwl_settings-menu', 'mwl_settings' );

			// SUBMENU > Settings > EXIF Info
			add_settings_section( 'mwl_exif_info', null, null, 'mwl_settings-menu-exif_info' );
			add_settings_field( 'mwl_title', __( "Display", 'meow-lightbox' ), array( $this, 'admin_title_callback' ),
				'mwl_settings-menu-exif_info', 'mwl_exif_info' );
			add_settings_field( 'mwl_caption_origin', "Caption Source",
				array( $this, 'admin_caption_origin_callback' ), 'mwl_settings-menu-exif_info', 'mwl_exif_info' );

			// SUBMENU > Settings > Advanced
			add_settings_section( 'mwl_advanced', null, null, 'mwl_settings-menu-advanced' );
			add_settings_field( 'mwl_preloading', "Preloading<br />(Pro)",
				array( $this, 'admin_preloading_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_deep_linking', "Deep Linking<br />(Pro)",
				array( $this, 'admin_deep_linking_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_low_res_placeholder', "Low-Res First<br />",
				array( $this, 'admin_low_res_placeholder_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_right_click', "Right Click<br />",
				array( $this, 'admin_right_click_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_selector', __( "Selector", 'meow-lightbox' ),
				array( $this, 'admin_selector_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_anti_selector', __( "Anti Selector", 'meow-lightbox' ),
				array( $this, 'admin_anti_selector_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );
			add_settings_field( 'mwl_obmode', __( "Output Buffering", 'meow-lightbox' ),
				array( $this, 'admin_obmode_callback' ),
				'mwl_settings-menu-advanced', 'mwl_advanced' );

			register_setting( 'mwl_settings-advanced', 'mwl_selector' );
			register_setting( 'mwl_settings-advanced', 'mwl_anti_selector' );
			register_setting( 'mwl_settings-advanced', 'mwl_deep_linking' );
			register_setting( 'mwl_settings-advanced', 'mwl_low_res_placeholder' );
			register_setting( 'mwl_settings-advanced', 'mwl_right_click' );
			register_setting( 'mwl_settings-advanced', 'mwl_preloading' );
			register_setting( 'mwl_settings-advanced', 'mwl_obmode' );

			// SUBMENU > Settings > Map
			add_settings_section( 'mwl_map', null, null, 'mwl_settings-menu-map' );
			add_settings_field( 'mwl_map_api_key', __( "API Key", 'meow-lightbox' ),
				array( $this, 'admin_map_api_key_callback' ),
				'mwl_settings-menu-map', 'mwl_map' );
			add_settings_field( 'mwl_map_style', __( "Style", 'meow-lightbox' ),
				array( $this, 'admin_map_style_callback' ),
				'mwl_settings-menu-map', 'mwl_map' );

		// SETTINGS
		register_setting( 'mwl_settings', 'mwl_theme' );
		register_setting( 'mwl_settings', 'mwl_orientation' );
		register_setting( 'mwl_settings', 'mwl_image_size' );
		register_setting( 'mwl_settings', 'mwl_map' );
		register_setting( 'mwl_settings', 'mwl_download_link' );

		register_setting( 'mwl_settings-exif_info', 'mwl_caption_origin' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_title' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_caption' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_camera' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_lens' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_shutter_speed' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_aperture' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_focal_length' );
		register_setting( 'mwl_settings-exif_info', 'mwl_exif_iso' );

		register_setting( 'mwl_settings-map', 'mwl_map_api_key' );
		register_setting( 'mwl_settings-map', 'mwl_map_style' );
	}

	function reset_cache() {
		global $wpdb;
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '%_mwl_exif_%'" );
	}

	function admin_settings() {
		$reseturl = admin_url( 'admin.php?page=mwl_settings-menu' );
		$reseturl_nonced = wp_nonce_url( $reseturl, 'mwl_reset_cache', 'meow_nonce' );
		?>
		<div class="wrap meow-admin">
		<?php echo $this->display_title( "Meow Lightbox" , "By Jordy Meow & Thomas Kim");  ?>
		<p>Lightbox made for photographers, by photographers. It works in all circumstances while being light, optimized, and responsive.</p>

		<div class="section group">
			<div class="meow-box col span_2_of_2">
				<h3><?php echo _e( "How to use", 'meow-lightbox' ) ?></h3>
				<div class="inside">
					<?php echo _e( "Meow Lightbox works out of the box with the standard Gallery, the Meow Gallery, and many others. If it doesn't work right away, check the <a target='_blank' href='https://meowapps.com/plugin/meow-lightbox/'>usage</a> section. <b>In some cases, you might want to reset your the cache created by the Meow Lightbox (which contains the EXIF information, caption, description, the sizes of your images, etc.), to do so, click on the button below.</b> The cache is automatically reset every 3 months.", 'meow-lightbox' ) ?>
					<div class="submit">
						<form method="post">
							<?php wp_nonce_field( 'mwl_reset_cache', 'meow_nonce' ); ?>
							<?php
							if ( isset( $_POST['meow_nonce']) && wp_verify_nonce( $_POST['meow_nonce'], 'mwl_reset_cache' ) ) {
								$this->reset_cache();
								echo "<span style='top: 5px; position: relative; margin-right: 5px;'>Done!</span>";
							}
							?>
							<input class="button button-primary" type="submit" value="Reset cache"></input>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="meow-row">

			<div class="meow-col meow-span_1_of_2">

				<div class="meow-box">
					<form method="post" action="options.php">
						<h3><span class="dashicons dashicons-admin-tools"></span> DISPLAY</h3>
						<div class="inside">
							<?php settings_fields( 'mwl_settings' ); ?>
							<?php do_settings_sections( 'mwl_settings-menu' ); ?>
							<?php submit_button(); ?>
						</div>
					</form>
				</div>

				<div class="meow-box">
					<form method="post" action="options.php">
							<h3><span class="dashicons dashicons-admin-tools"></span> EXIF INFO</h3>
							<div class="inside">
								<?php settings_fields( 'mwl_settings-exif_info' ); ?>
								<?php do_settings_sections( 'mwl_settings-menu-exif_info' ); ?>
								<?php submit_button(); ?>
							</div>
					</form>
				</div>

			</div>

			<div class="meow-col meow-span_1_of_2">

				<?php $this->display_serialkey_box( "https://meowapps.com/meow-lightbox/" ); ?>

				<?php if ( get_option( 'mwl_map', false ) ): ?>
				<div class="meow-box">
					<form method="post" action="options.php">
							<h3><span class="dashicons dashicons-admin-tools"></span> MAP</h3>
							<div class="inside">
								<?php settings_fields( 'mwl_settings-map' ); ?>
								<?php do_settings_sections( 'mwl_settings-menu-map' ); ?>
								<?php submit_button(); ?>
							</div>
					</form>
				</div>
				<?php endif; ?>

				<div class="meow-box">
					<form method="post" action="options.php">
						<h3><span class="dashicons dashicons-admin-tools"></span> ADVANCED</h3>
						<div class="inside">
							<?php settings_fields( 'mwl_settings-advanced' ); ?>
							<?php do_settings_sections( 'mwl_settings-menu-advanced' ); ?>
							<?php submit_button(); ?>
						</div>
					</form>
				</div>

			</div>

		</div>


		</div>
		<?php
	}

	/*
		OPTIONS CALLBACKS
	*/

	function admin_theme_callback( $args ) {
		$themes = array(
			'dark' => array( 'name' => 'Dark (default)', 'desc' => "" ),
			'light' => array( 'name' => 'Light', 'desc' => "" ),
		);
		$html = '';
		foreach ( $themes as $key => $arg )
			$html .= '<input type="radio" class="radio" id="mwl_theme" name="mwl_theme" value="' . $key . '"' .
				checked( $key, get_option( 'mwl_theme', 'dark' ), false ) . ' > '  .
				( empty( $arg ) ? 'None' : $arg['name'] ) .
				( empty( $arg ) ? '' : '<br/><small>' . $arg['desc'] . '</small>' );
		echo $html;
	}

	function admin_obmode_callback( $args ) {
		$html = '<input type="checkbox" id="mwl_obmode" name="mwl_obmode" value="1" ' . checked( 1, get_option( 'mwl_obmode' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>For the sake of simplicity and performance, it is recommended to avoid Output Buffering. However, if your WordPress install does not run content filters (it happens) or if you want your whole website to be covered by the Lightbox (sidebars, headers, footers), you will need to active this.</small>';
		echo $html;
	}

	function admin_orientation_callback( $args ) {
		$orientations = array(
			'auto' => array( 'name' => 'Natural (default)', 'desc' => "" ),
			'landscape' => array( 'name' => 'Landscape', 'desc' => "" ),
			'portrait' => array( 'name' => 'Portrait', 'desc' => "" ),
		);
		$html = '';
		foreach ( $orientations as $key => $arg )
			$html .= '<input type="radio" class="radio" id="mwl_orientation" name="mwl_orientation" value="' . $key . '"' .
				checked( $key, get_option( 'mwl_orientation', 'auto' ), false ) . ' > '  .
				( empty( $arg ) ? 'None' : $arg['name'] ) .
				( empty( $arg ) ? '' : '<br/><small>' . $arg['desc'] . '</small>' );
		echo $html;
	}

	function admin_map_callback( $args ) {
		$html = '<input ' . disabled( $this->is_registered(), false, false ) .
			' type="checkbox" id="mwl_map" name="mwl_map" value="1" ' .
			checked( 1, get_option( 'mwl_map' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>The location of the photos will be displayed on a little map. On click, the map will be be enlarged to the entire lightbox.</small>';
		echo $html;
	}

	function admin_selector_callback( $args ) {
		$value = get_option( 'mwl_selector', '.entry-content, .gallery, .mgl-gallery, .wp-block-gallery' );
		$html = '<input type="text" id="mwl_selector" name="mwl_selector" value="' . $value . '" />';
		$html .= '<br /><span class="description">This selector will be used to apply the lightbox to the images.</span>';
		echo $html;
	}

	function admin_anti_selector_callback( $args ) {
		$value = get_option( 'mwl_anti_selector', '' );
		$html = '<input type="text" id="mwl_anti_selector" name="mwl_anti_selector" value="' . $value . '" />';
		$html .= '<br /><span class="description">This anti selector will be used <b>to avoid</b> applying the lightbox to the images.</span>';
		echo $html;
	}

	function admin_image_size_callback( $args ) {
		$layouts = array(
			'srcset' => array( 'name' => __( 'Responsive Images (src-set)', 'meow-lightbox' ), 'desc' => "" ),
			'thumbnail' => array( 'name' => __( 'Thumbnail', 'meow-lightbox' ), 'desc' => "" ),
			'medium' => array( 'name' => __( 'Medium', 'meow-lightbox' ), 'desc' => "" ),
			'large' => array( 'name' => __( 'Large', 'meow-lightbox' ), 'desc' => "" ),
			'full' => array( 'name' => __( 'Full', 'meow-lightbox' ), 'desc' => "" )
		);
		$html = '';
		$image_size = get_option( 'mwl_image_size', 'srcset' );
		if ( empty( $image_size ) ) {
			update_option( 'mwl_image_size', 'srcset' );
			$image_size = 'srcset';
		}
		foreach ( $layouts as $key => $arg )
			$html .= '<input type="radio" class="radio" id="mwl_image_size" name="mwl_image_size" value="' . $key . '"' .
				checked( $key, $image_size, false ) . ' > '  .
				( empty( $arg ) ? 'None' : $arg['name'] ) .
				'<br />';
		echo $html;
	}

	function admin_download_link_callback( $args ) {
		$html = '<input type="checkbox" id="mwl_download_link" name="mwl_download_link" value="1" ' .
			checked( 1, get_option( 'mwl_download_link' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>Little icon that will allow the user to see the original photo, and download it.</small>';
		echo $html;
	}

	function admin_preloading_callback( $args ) {
		$html = '<input ' . disabled( $this->is_registered(), false, false ) .
			' type="checkbox" id="mwl_preloading" name="mwl_preloading" value="1" ' .
			checked( 1, get_option( 'mwl_preloading' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>Once the lightbox is started, the next images will be preloaded to offer a better experience to the user.</small>';
		echo $html;
	}

	function admin_deep_linking_callback( $args ) {
		$html = '<input ' . disabled( $this->is_registered(), false, false ) .
			' type="checkbox" id="mwl_deep_linking" name="mwl_deep_linking" value="1" ' .
			checked( 1, get_option( 'mwl_deep_linking' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>When the Lightbox is active, the URL will become Lightbox-aware and anybody with the link will see the Lightbox with the specified image.</small>';
		echo $html;
	}

	function admin_low_res_placeholder_callback() {
		$html = '<input type="checkbox" id="mwl_low_res_placeholder" name="mwl_low_res_placeholder" value="1" ' .
			checked( 1, get_option( 'mwl_low_res_placeholder' ), false ) . '/>';
		$html .= '<label>Enabled</label><br /><small>Give the impression that the image is loaded instantly.</small>';
		echo $html;
	}

	function admin_right_click_callback() {
		$html = '<input type="checkbox" id="mwl_right_click" name="mwl_right_click" value="1" ' .
			checked( 1, get_option( 'mwl_right_click' ), false ) . '/>';
		$html .= '<label>Enabled</label>';
		echo $html;
	}

	function admin_title_callback( $args ) {
		$html = '<input type="checkbox" id="mwl_exif_title" name="mwl_exif_title" value="1" ' .
			checked( 1, get_option( 'mwl_exif_title', true ), false ) . '/>';
		$html .= '<label>Title</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_caption" name="mwl_exif_caption" value="1" ' .
			checked( 1, get_option( 'mwl_exif_caption', true ), false ) . '/>';
		$html .= '<label>Caption</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_camera" name="mwl_exif_camera" value="1" ' .
			checked( 1, get_option( 'mwl_exif_camera', true ), false ) . '/>';
		$html .= '<label>Camera</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_lens" name="mwl_exif_lens" value="1" ' .
			checked( 1, get_option( 'mwl_exif_lens', false ), false ) . '/>';
		$html .= '<label>Lens</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_shutter_speed" name="mwl_exif_shutter_speed" value="1" ' .
			checked( 1, get_option( 'mwl_exif_shutter_speed', true ), false ) . '/>';
		$html .= '<label>Shutter Speed</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_aperture" name="mwl_exif_aperture" value="1" ' .
			checked( 1, get_option( 'mwl_exif_aperture', true ), false ) . '/>';
		$html .= '<label>Aperture</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_focal_length" name="mwl_exif_focal_length" value="1" ' .
			checked( 1, get_option( 'mwl_exif_focal_length', true ), false ) . '/>';
		$html .= '<label>Focal Length</label><br />';
		$html .= '<input type="checkbox" id="mwl_exif_iso" name="mwl_exif_iso" value="1" ' .
			checked( 1, get_option( 'mwl_exif_iso', true ), false ) . '/>';
		$html .= '<label>ISO</label><br />';
		echo $html;
	}

	function admin_caption_origin_callback( $args ) {
		$origins = array(
			'caption' => array( 'name' => 'Caption (default)' ),
			'description' => array( 'name' => 'Description' )
		);
		$html = '';
		foreach ( $origins as $key => $arg )
			$html .= '<input type="radio" class="radio" id="mwl_caption_origin" name="mwl_caption_origin" value="' . $key . '"' .
				checked( $key, get_option( 'mwl_caption_origin', 'caption' ), false ) . ' > '  .
				( empty( $arg ) ? 'None' : $arg['name'] ) . '<br />';
		echo $html;
	}

	// function admin_map_position_callback( $args ) {
	// 	$positions = array(
	// 		'top-left' => array( 'name' => 'Top Left' ),
	// 		'top-right' => array( 'name' => 'Top Right' ),
	// 		'bottom-left' => array( 'name' => 'Bottom Left' ),
	// 		'bottom-right' => array( 'name' => 'Bottom Right (Default)' )
	// 	);
	// 	$html = '';
	// 	foreach ( $positions as $key => $arg )
	// 		$html .= '<input type="radio" class="radio" id="mwl_map_position" name="mwl_map_position" value="' . $key . '"' .
	// 			checked( $key, get_option( 'mwl_map_position', 'bottom-right' ), false ) . ' > '  .
	// 			( empty( $arg ) ? 'None' : $arg['name'] ) . '<br /><div style="clear: both;">';
	// 	echo $html;
	// }

	// function admin_map_margin_callback( $args ) {
	//   $value = get_option( 'mwl_map_margin', 10 );
	//   $html = '<input type="number" id="mwl_map_margin" name="mwl_map_margin" value="' . $value . '" />';
	//   $html .= '<br /><span class="description">Margins <b>in pixels</b> around the map (default: 10).</span>';
	//   echo $html;
	// }
	//
	// function admin_map_size_callback( $args ) {
	//   $value = get_option( 'mwl_map_size', 70 );
	//   $html = '<input type="number" id="mwl_map_size" name="mwl_map_size" value="' . $value . '" />';
	//   $html .= '<br /><span class="description">Size <b>in pixels</b> of the little map (default: 70).</span>';
	//   echo $html;
	// }

	function admin_map_api_key_callback( $args ) {
		$value = get_option( 'mwl_map_api_key', "" );
		$html = '<input type="text" id="mwl_map_api_key" name="mwl_map_api_key" value="' . $value . '" />';
		$html .= '<br /><span class="description">' . __( 'Generate it for free here: <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Get a Google Maps API Key</a>.', 'meow-lightbox' ) . '</span>';
		echo $html;
	}

	function admin_map_style_callback( $args ) {
		$value = get_option( 'mwl_map_style', $this->create_default_style() );
		$value = json_encode( json_decode( $value ), JSON_PRETTY_PRINT );
		if ( empty( $value ) || $value == 'null' ) {
			echo '<p style="color: red; margin-bottom: 5px;">' . __( "The format of the style must be valid JSON. To avoid errors, it was reverted to the default style.", 'meow-lightbox' ) . "</p>";
			$value = $this->create_default_style( true );
			$value = json_encode( json_decode( $value ), JSON_PRETTY_PRINT );
		}
		$html = '<textarea rows="8" id="mwl_map_style" style="width: 100%;" name="mwl_map_style">' . $value . '</textarea>';
		$html .= '<br /><span class="description">' . __( 'Google Map Style JSON. You can find a lot of beautiful templates ready to use here: <a target="_blank" href="https://snazzymaps.com/">SnazzyMaps.com</a>. Remove it and it will reset to the default style.', 'meow-lightbox' ) . '</span>';
		echo $html;
	}

	function create_default_style( $force = false ) {
		$style = get_option( 'mwl_map_style', "" );
		if ( $force || empty( $style ) ) {
			$style = '[{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]';
			update_option( 'mwl_map_style', $style );
		}
		return $style;
	}

}

?>
