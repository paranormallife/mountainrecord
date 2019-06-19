/*
	This file is linking the front-end events with the JS logic in mwl-core.js
*/

jQuery(document).ready(function($) {

    var orientation_responsive = {}

    if(mwl.settings.orientation == "auto") {
      orientation_responsive.enabled = true;
      orientation_responsive.orientation = 'landscape';
    } else {
      orientation_responsive.enabled = false;
      orientation_responsive.orientation = mwl.settings.orientation;
    }

    var settings = {
      layout: mwl.settings.layout,
      expanded_image: false,
      selector: mwl.settings.selector,
      anti_selector: mwl.settings.anti_selector,
      theme: mwl.settings.theme,
      allow_expand: true, // TO LINK WITH PHP OPTION
      allow_fullscreen: false, // TO LINK WITH PHP OPTION, /!\STILL IN BETA/!\
      slideshow: { // Still in dev
        enable: false,
        slide_duration: 3000
      },
      preloading: mwl.settings.preloading,
      orientation_responsive: orientation_responsive,
      map: mwl.settings.map,
      caption_source: mwl.settings.caption_source,
      low_res_placeholder: mwl.settings.low_res_placeholder,
      deep_linking: mwl.settings.deep_linking,
      infos_to_display: {
        title: mwl.settings.exif.title,
        caption: mwl.settings.exif.caption,
        camera: mwl.settings.exif.camera,
        lens: mwl.settings.exif.lens,
        shutter_speed: mwl.settings.exif.shutter_speed,
        aperture: mwl.settings.exif.aperture,
        focal_length: mwl.settings.exif.focal_length,
        iso: mwl.settings.exif.iso
      },
      download: {
        enable: mwl.settings.download_link
      },
      right_click_protection: mwl.settings.right_click_protection
    };

    var mwlController = new MwlController(settings);
    mwlController.init();

    // For AJAX loaded content
    $(document).ajaxComplete(function(e, xhr, settings) {
      if (settings.url.indexOf('/ids/') == -1 && settings.url.indexOf('.html') == -1 && settings.url.indexOf('?wc=') == -1) {
        mwlController.init();
      }
    });

    // If we detect a deep-link URL
    if (window.location.href.indexOf('#mwl-') > 0) {
      var raw_key = window.location.href.match(/(#mwl-)([0-9])+/gm);
      var key = raw_key[0].match(/([0-9])+/gm)[0];
      var mwl_img = mwlController.getMwlImageById(key);
      console.log(mwlController.getMwlImageById(key));
      mwlController.showLightbox(mwl_img, settings.layout, settings.theme);
    }

    $(document).on('click', '.mwl-img', function(e) {
      e.preventDefault();
      var image_index = $(this).attr('mwl-index');
      var mwl_img = mwlController.getMwlImageByIndex(image_index);
      mwlController.showLightbox(mwl_img, settings.layout, settings.theme);
    });

	/**
	 * Load the next image
	 * @return void
	 */
	function go_to_next_image() {
		next_index = mwlController.getNextIndex();
    next_image = mwlController.getMwlImageByIndex(next_index);
		mwlController.changeLightboxImage(next_image, settings.layout, settings.theme, "next");
	}

	/**
	 * Load the previous image
	 * @return void
	 */
	function go_to_prev_image() {
		prev_index = mwlController.getPrevIndex();
		prev_image = mwlController.getMwlImageByIndex(prev_index);
		mwlController.changeLightboxImage(prev_image, settings.layout, settings.theme, "previous");
	}

	/**
	 * Close the lightbox & cancel fullscreen mode
	 * @return void
	 */
	function close_lightbox() {
		mwlController.closeLightbox();
	}

  $(document).on('click', '.mwl-fullpage-container:not(invisible)', function(e) {
    var prev_index, prev_image, next_index, next_image;
    e.stopPropagation();
    // Closing Lightbox
    if ($(e.target).is($('.control-close *'))) {
      close_lightbox();
    }
    // Expanding Image
    if ($(e.target).is($('.control-expand *'))) {
      mwlController.expandImage();
    }
    // Going / Exiting FullScreen
    if ($(e.target).is($('.control-fullscreen *'))) {
      mwlController.toggleFullScreen(document.body);
    }
    // Shrinking Image
    if ($(e.target).is($('.control-shrink *'))) {
      mwlController.shrinkImage();
    }
    // Download Image
    if ($(e.target).is($('.control-download *'))) {
      mwlController.downloadImage();
    }
    // Previous Image
    if ($(e.target).is($('.control-navigation-container.prev *'))) {
      go_to_prev_image();
    }
    // Next Image
    if ($(e.target).is($('.control-navigation-container.next *'))) {
      go_to_next_image();
    }
    if ($(e.target).is($('.image-container')) ||
      $(e.target).is($('.control-navigation-container')) ||
      $(e.target).is($('.image-info-container')) ||
      $(e.target).is($('.controls-container')) ||
      $(e.target).is($('.loader')) ) {
      close_lightbox();
    }
  });

	// Keyboard Controls
  $(document).keydown(function(e) {
    // If lightbox is visible
    if ( $('.mwl-fullpage-container').length > 0 && !$('.mwl-fullpage-container').hasClass('invisible')) {
      var prev_index, prev_image, next_index, next_image;
      switch (e.which) {
        case 37: // left : previous image
          go_to_prev_image();
          break;

        case 39: // right : next image
          go_to_next_image();
          break;

        case 27: // esc : close lightbox
          close_lightbox();
          break;

        default:
        return; // exit this handler for other keys
      }
      e.preventDefault(); // prevent the default action (scroll / move caret)
    }
  });

  // swiping
  $(document).on('swipeleft', '.mwl-fullpage-container', function (e, data) { 
    go_to_next_image();
  });

  $(document).on('swiperight', '.mwl-fullpage-container', function (e, data) {
    go_to_prev_image();
  });

  // preventing right click
  if(settings.right_click_protection) {
    $(document).on('contextmenu', '#mwl-target .image-container img', function (e) {
      return false;
    });
  }
});
