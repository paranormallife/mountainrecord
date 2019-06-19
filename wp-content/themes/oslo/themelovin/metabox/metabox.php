<?php
function thmlv_register_metabox() {
	$prefix = '_oslo_';
	
	// Header metabox
	$thmlv_header = new_cmb2_box(array(
		'id'            => $prefix . 'header_options',
		'title'         => esc_html__('Header options', 'oslo'),
		'object_types'  => array('page', 'portfolio', 'post', 'team'),
	));
	
	$thmlv_header->add_field(array(
		'name'    => esc_html__('Header type', 'oslo'),
		'desc' => esc_html__('Select the preferred header type.', 'oslo'),
		'id'      => $prefix.'header_type',
		'type'    => 'radio_inline',
		'default' => 'color',
		'options' => array(
			'color' => esc_html__('Background color', 'oslo'),
			'image' => esc_html__('Background image', 'oslo'),
			'video'   => esc_html__('Background video', 'oslo'),
			'slider'   => esc_html__('Slider Revolution', 'oslo'),
			'none'   => esc_html__('No Header', 'oslo')
		),
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Header background color', 'oslo'),
		'desc' => esc_html__('Choose background color.', 'oslo'),
		'id'   => $prefix.'background_color',
		'type' => 'colorpicker',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Header Image', 'oslo'),
		'desc' => esc_html__('Upload an image or enter a URL.', 'oslo'),
		'id'   => $prefix.'background_image',
		'type' => 'file',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Upload video (MP4)', 'oslo'),
		'desc' => esc_html__('Upload a MP4 video to display into your header.', 'oslo'),
		'id'   => $prefix.'video_mp4',
		'type' => 'file',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Upload video (WebM)', 'oslo'),
		'desc' => esc_html__('Upload a WebM video to display into your header.', 'oslo'),
		'id'   => $prefix.'video_webm',
		'type' => 'file',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Upload video (OGV)', 'oslo'),
		'desc' => esc_html__('Upload a OGV video to display into your header.', 'oslo'),
		'id'   => $prefix.'video_ogv',
		'type' => 'file',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Preview Image', 'oslo'),
		'desc' => esc_html__('This is the image that will be seen in place of your video on mobile devices & older browsers before your video is played (browsers like IE8 don\'t allow autoplaying).', 'oslo'),
		'id'   => $prefix.'video_poster',
		'type' => 'file',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Slider Revolution alias', 'oslo'),
		'desc' => esc_html__('Insert the preferred Slider Revolution alias.', 'oslo'),
		'id' => $prefix.'slider_revolution',
		'type' => 'text_small',
	));
	
	$thmlv_header->add_field(array(
		'name'    => esc_html__('Header height', 'oslo'),
		'desc' => esc_html__('Select the preferred header height.', 'oslo'),
		'id'      => $prefix.'header_height',
		'type'    => 'radio_inline',
		'default' => 'thmlvAutoHeight',
		'options' => array(
			'thmlvAutoHeight' => esc_html__('Auto', 'oslo'),
			'thmlvFixedHeight'   => esc_html__('Fixed', 'oslo'),
			'thmlvPercentHeight'     => esc_html__('Percent', 'oslo'),
		),
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Header height value (Pixels or Percent)', 'oslo'),
		'desc' => esc_html__('Insert the Pixels / Percent number value.', 'oslo'),
		'id' => $prefix.'header_value',
		'type' => 'text_small',
	));
		
	$thmlv_header->add_field(array(
		'name'    => esc_html__('Dark / light', 'oslo'),
		'desc' => esc_html__('Select the header appeal.', 'oslo'),
		'id'      => $prefix.'header_appeal',
		'type'    => 'radio_inline',
		'default' => 'thmlvAutoLayout',
		'options' => array(
			'thmlvAutoLayout' => esc_html__('Auto', 'oslo'),
			'thmlvDarkLayout' => esc_html__('Dark', 'oslo'),
			'thmlvLightLayout'   => esc_html__('Light', 'oslo'),
		),
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Custom title', 'oslo'),
		'desc' => esc_html__('Insert the custom title.', 'oslo'),
		'id' => $prefix.'custom_title',
		'type' => 'text',
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Subtitle', 'oslo'),
		'desc' => esc_html__('Insert the subtitle.', 'oslo'),
		'id' => $prefix.'subtitle',
		'type' => 'text',
	));
	
	$thmlv_header->add_field(array(
		'name'    => esc_html__('Title and subtitle position', 'oslo'),
		'desc' => esc_html__('Select title and subtitle position.', 'oslo'),
		'id'      => $prefix.'title_position',
		'type'    => 'select',
		'default' => 'thmlvTitleBottomLeft',
		'options' => array(
			'thmlvTitleCenter' => esc_html__('Center', 'oslo'),
			'thmlvTitleTopLeft' => esc_html__('Top Left', 'oslo'),
			'thmlvTitleTopCenter' => esc_html__('Top Center', 'oslo'),
			'thmlvTitleTopRight' => esc_html__('Top Right', 'oslo'),
			'thmlvTitleCenterLeft' => esc_html__('Center Left', 'oslo'),
			'thmlvTitleCenterRight' => esc_html__('Center Right', 'oslo'),
			'thmlvTitleBottomLeft' => esc_html__('Bottom Left', 'oslo'),
			'thmlvTitleBottomCenter' => esc_html__('Bottom Center', 'oslo'),
			'thmlvTitleBottomRight' => esc_html__('Bottom Right', 'oslo'),
		),
	));
	
	$thmlv_header->add_field(array(
		'name' => esc_html__('Hide title and subtitle', 'oslo'),
		'desc' => esc_html__('If checked title and subtitle will be hidden from the header.', 'oslo'),
		'id' => $prefix.'title_hide',
		'type' => 'checkbox',
	));
	
	// Layout metabox
	$thmlv_layout = new_cmb2_box(array(
		'id'            => $prefix . 'layout_options',
		'title'         => esc_html__('Layout options', 'oslo'),
		'object_types'  => array('page', 'portfolio', 'post', 'team'),
	));
	
	$thmlv_layout->add_field( array(
		'name' => 'Header margin',
		'desc' => 'Hide margin below the header',
		'id' => $prefix.'header_margin',
		'type' => 'checkbox'
	));
	
	$thmlv_layout->add_field( array(
		'name' => 'Footer margin',
		'desc' => 'Hide margin above the footer',
		'id' => $prefix.'footer_margin',
		'type' => 'checkbox'
	));
	
	// Selected page metabox
	$thmlv_selected = new_cmb2_box(array(
		'id'            => $prefix . 'selected_layout',
		'title'         => esc_html__('Selected page layout', 'oslo'),
		'object_types'  => array('page'),
	));
	
	$thmlv_selected->add_field(array(
		'name' => esc_html__('Page background Image', 'oslo'),
		'desc' => esc_html__('Upload an image or enter a URL.', 'oslo'),
		'id'   => $prefix.'selected_background_image',
		'type' => 'file',
	));
	
	$thmlv_selected->add_field(array(
		'name' => esc_html__('Page background color', 'oslo'),
		'desc' => esc_html__('Choose background color.', 'oslo'),
		'id'   => $prefix.'selected_background_color',
		'type' => 'colorpicker',
	));
	
	
	// Portfolio metabox
	$thmlv_portfolio = new_cmb2_box(array(
		'id'            => $prefix . 'portfolio_options',
		'title'         => esc_html__('Portfolio options', 'oslo'),
		'object_types'  => array('portfolio'),
	));
	
	$thmlv_portfolio->add_field(array(
		'name' => esc_html__('Selected', 'oslo'),
		'desc' => esc_html__('If checked it will be published into the "Portfolio Selected" template.', 'oslo'),
		'id' => $prefix.'selected',
		'type' => 'checkbox',
	));
	
	$thmlv_portfolio->add_field(array(
		'name' => esc_html__('Upload cover image', 'oslo'),
		'desc' => esc_html__('Upload a JPG / PNG file to use as cover image.', 'oslo'),
		'id'   => $prefix.'image_cover',
		'type' => 'file',
	));
	
	$thmlv_portfolio->add_field(array(
		'name' => esc_html__('Select the preferred size', 'oslo'),
		'desc' => esc_html__('Item size on portfolio Masonry page', 'oslo'),
		'id' => $prefix.'portfolio_size',
		'type' => 'radio_inline',
		'default' => 'thmlvSmallSize',
		'options' => array(
			'thmlvSmallSize' => esc_html__('Small', 'oslo'),
			'thmlvMediumSize' => esc_html__('Medium', 'oslo'),
			'thmlvBigSize' => esc_html__('Big', 'oslo'),
		),
	));
	
	// Gallery metabox
	$thmlv_gallery = new_cmb2_box(array(
		'id'            => $prefix . 'gallery_options',
		'title'         => esc_html__('Gallery options', 'oslo'),
		'object_types'  => array('portfolio', 'post'),
	));
	
	$thmlv_gallery->add_field(array(
		'name' => esc_html__('Upload the gallery images', 'oslo'),
		'desc' => esc_html__('Upload your preferred images to create the gallery', 'oslo'),
		'id'   => $prefix . 'gallery_images',
		'type' => 'file_list',
		'options' => array(
			'add_upload_files_text' => esc_html__('Upload', 'oslo'),
			'remove_image_text' => esc_html__('Remove', 'oslo'),
			'file_text' => esc_html__('Upload the gallery images', 'oslo'),
			'file_download_text' => esc_html__('Download', 'oslo'),
			'remove_text' => esc_html__('Remove', 'oslo'),
		),
	));
	
	// Link metabox
	$thmlv_link = new_cmb2_box(array(
		'id'            => $prefix . 'link_options',
		'title'         => esc_html__('Link options', 'oslo'),
		'object_types'  => array('portfolio', 'post'),
	));
	
	$thmlv_link->add_field(array(
		'name' => esc_html__('Custom URL', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'link',
		'type' => 'text_url',
	));
	
	// Team metabox
	$thmlv_team = new_cmb2_box(array(
		'id'            => $prefix . 'team_options',
		'title'         => esc_html__('Team options', 'oslo'),
		'object_types'  => array('team'),
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Behance', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_behance',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Dribbble', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_dribbble',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Facebook', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_facebook',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Flickr', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_flickr',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Foursquare', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_foursquare',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Git', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_git',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Google+', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_google_plus',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Instagram', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_instagram',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('LinkedIn', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_linkedin',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Pinterest', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_pinterest',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('RSS', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_rss',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Soundcloud', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_soundcloud',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Skype', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_skype',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Tumblr', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_tumblr',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Twitter', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_twitter',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Vimeo', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_vimeo',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Weibo', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_weibo',
		'type' => 'text_url',
	));
	
	$thmlv_team->add_field(array(
		'name' => esc_html__('Youtube', 'oslo'),
		'desc' => esc_html__('Insert the link.', 'oslo'),
		'id' => $prefix.'team_youtube',
		'type' => 'text_url',
	));
}
add_action('cmb2_init', 'thmlv_register_metabox');
?>