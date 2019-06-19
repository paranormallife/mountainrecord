jQuery(document).ready(function(jQuery){

	/*-----------------------------------------------------------------------------------
	PAGE METABOX
	-----------------------------------------------------------------------------------*/
	
	var templateSelect = jQuery('#page_template');
	
	thmlv_metaboxReset();
	
	if(jQuery('#page_template').length != 0) {
		var current = jQuery('#page_template > option:selected').val();
		if(current == 'thmlv-page-portfolio.php') {
			jQuery('#_oslo_selected_layout').css('display', 'block');
			jQuery('#_oslo_layout_options').css('display', 'none');
			thmlv_metaboxSelectedHide();
		}
	}
	
	templateSelect.on('change', function() {
		thmlv_metaboxReset();
		thmlv_metaboxSelectedShow();
		if(jQuery(this).val() == 'thmlv-page-portfolio.php') {
			jQuery('#_oslo_selected_layout').css('display', 'block');
			jQuery('#_oslo_layout_options').css('display', 'none');
			thmlv_metaboxSelectedHide();
		}
	});
	
	function thmlv_metaboxReset() {
		jQuery('#_oslo_selected_layout').css('display', 'none');
		jQuery('#_oslo_layout_options').css('display', 'block');
	}
	
	function thmlv_metaboxSelectedHide() {
		jQuery('.cmb2-id--oslo-header-type').css('display', 'none');
		jQuery('.cmb2-id--oslo-background-color').css('display', 'none');
		jQuery('.cmb2-id--oslo-background-image').css('display', 'none');
		jQuery('.cmb2-id--oslo-video-mp4').css('display', 'none');
		jQuery('.cmb2-id--oslo-video-webm').css('display', 'none');
		jQuery('.cmb2-id--oslo-video-webm').css('display', 'none');
		jQuery('.cmb2-id--oslo-video-ogv').css('display', 'none');
		jQuery('.cmb2-id--oslo-slider-revolution').css('display', 'none');
		jQuery('.cmb2-id--oslo-header-height').css('display', 'none');
		jQuery('.cmb2-id--oslo-header-value').css('display', 'none');
		jQuery('.cmb2-id--oslo-custom-title').css('display', 'none');
		jQuery('.cmb2-id--oslo-subtitle').css('display', 'none');
		jQuery('.cmb2-id--oslo-title-position').css('display', 'none');
		jQuery('.cmb2-id--oslo-title-hide').css('display', 'none');
	}
	
	function thmlv_metaboxSelectedShow() {
		jQuery('.cmb2-id--oslo-header-type').css('display', 'block');
		jQuery('.cmb2-id--oslo-background-color').css('display', 'block');
		jQuery('.cmb2-id--oslo-background-image').css('display', 'block');
		jQuery('.cmb2-id--oslo-header-type').css('display', 'block');
		jQuery('.cmb2-id--oslo-video-mp4').css('display', 'block');
		jQuery('.cmb2-id--oslo-video-webm').css('display', 'block');
		jQuery('.cmb2-id--oslo-video-ogv').css('display', 'block');
		jQuery('.cmb2-id--oslo-slider-revolution').css('display', 'block');
		jQuery('.cmb2-id--oslo-slider-revolution').css('display', 'block');
		jQuery('.cmb2-id--oslo-header-height').css('display', 'block');
		jQuery('.cmb2-id--oslo-header-value').css('display', 'block');
		jQuery('.cmb2-id--oslo-custom-title').css('display', 'block');
		jQuery('.cmb2-id--oslo-subtitle').css('display', 'block');
		jQuery('.cmb2-id--oslo-title-position').css('display', 'block');
		jQuery('.cmb2-id--oslo-title-hide').css('display', 'block');
	}
	
	/*-----------------------------------------------------------------------------------
	POST FORMAT
	-----------------------------------------------------------------------------------*/
	
	var galleryOptions = jQuery('#_oslo_gallery_options');
	var galleryTrigger = jQuery('#post-format-gallery');
	var linkOptions = jQuery('#_oslo_link_options');
	var linkTrigger = jQuery('#post-format-link');
	var radiobox = jQuery('#post-formats-select input');
	
	if(jQuery('#page_template').length == 0) {
		thmlv_formatHide();
		radiobox.change(function(){
			thmlv_formatHide();
			if(jQuery(this).val() == 'gallery') {
				galleryOptions.css('display', 'block');
			} else if(jQuery(this).val() == 'link') {
				linkOptions.css('display', 'block');
			}
		});
		
	}
	
	function thmlv_formatHide() {
		galleryOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		//jQuery('#_oslo_layout_options').css('display', 'none');
    }
    
    if(galleryTrigger.is(':checked')) {
		galleryOptions.css('display', 'block');
	}
	if(linkTrigger.is(':checked')) {
		linkOptions.css('display', 'block');
	}

});