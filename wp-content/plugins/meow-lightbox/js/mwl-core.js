/*
	This file contains all the Javascript logic
*/

jQuery(document).ready(function ($) {

  /**
   * A class to generate icons based on IonIcons
   */
  class MwlIcon {
    constructor() {
      this.close = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M405 136.798L375.202 107 256 226.202 136.798 107 107 136.798 226.202 256 107 375.202 136.798 405 256 285.798 375.202 405 405 375.202 285.798 256z"/></svg>';
      this.expand = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M396.795 396.8H320V448h128V320h-51.205zM396.8 115.205V192H448V64H320v51.205zM115.205 115.2H192V64H64v128h51.205zM115.2 396.795V320H64v128h128v-51.205z"/></svg>';
      this.shrink = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 371.2h76.795V448H192V320H64v51.2zm76.795-230.4H64V192h128V64h-51.205v76.8zM320 448h51.2v-76.8H448V320H320v128zm51.2-307.2V64H320v128h128v-51.2h-76.8z"/></svg>';
      this.download = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M403.002 217.001C388.998 148.002 328.998 96 256 96c-57.998 0-107.998 32.998-132.998 81.001C63.002 183.002 16 233.998 16 296c0 65.996 53.999 120 120 120h260c55 0 100-45 100-100 0-52.998-40.996-96.001-92.998-98.999zM224 268v-76h64v76h68L256 368 156 268h68z"/></svg>';
      this.pin = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/></svg>'
      this.camera = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="280" r="63"/><path d="M440 96h-88l-32-32H192l-32 32H72c-22.092 0-40 17.908-40 40v272c0 22.092 17.908 40 40 40h368c22.092 0 40-17.908 40-40V136c0-22.092-17.908-40-40-40zM256 392c-61.855 0-112-50.145-112-112s50.145-112 112-112 112 50.145 112 112-50.145 112-112 112z"/></svg>';
      this.aperture = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C132.288 32 32 132.288 32 256s100.288 224 224 224 224-100.288 224-224S379.712 32 256 32zm135.765 359.765C355.5 428.028 307.285 448 256 448s-99.5-19.972-135.765-56.235C83.972 355.5 64 307.285 64 256s19.972-99.5 56.235-135.765C156.5 83.972 204.715 64 256 64s99.5 19.972 135.765 56.235C428.028 156.5 448 204.715 448 256s-19.972 99.5-56.235 135.765z"/><path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"/></svg>';
      this.iso = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M160 48v224h64v192l128-256h-64l64-160H160z"/></svg>';
      this.shutter_speed = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M232.9 371.6c0 12.7 10.4 23.1 23.1 23.1s23.1-10.4 23.1-23.1c0-12.7-10.4-23.1-23.1-23.1s-23.1 10.3-23.1 23.1zm0-323.6v92.4h46.2V96.1c78.3 11.3 138.7 78.3 138.7 159.9 0 89.4-72.3 161.8-161.8 161.8S94.2 345.4 94.2 256c0-38.8 13.6-74.4 36.5-102.2L256 279.1l32.6-32.6L131.4 89.4v.5C80.8 127.7 48 187.8 48 256c0 114.9 92.9 208 208 208 114.9 0 208-93.1 208-208S370.9 48 256 48h-23.1zm161.8 208c0-12.7-10.4-23.1-23.1-23.1-12.7 0-23.1 10.4-23.1 23.1s10.4 23.1 23.1 23.1c12.7 0 23.1-10.4 23.1-23.1zm-277.4 0c0 12.7 10.4 23.1 23.1 23.1s23.1-10.4 23.1-23.1-10.4-23.1-23.1-23.1-23.1 10.4-23.1 23.1z"/></svg>';
      this.focal_length = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 105c-101.8 0-188.4 62.4-224 151 35.6 88.6 122.2 151 224 151s188.4-62.4 224-151c-35.6-88.6-122.2-151-224-151zm0 251.7c-56 0-101.8-45.3-101.8-100.7S200 155.3 256 155.3 357.8 200.6 357.8 256 312 356.7 256 356.7zm0-161.1c-33.6 0-61.1 27.2-61.1 60.4s27.5 60.4 61.1 60.4 61.1-27.2 61.1-60.4-27.5-60.4-61.1-60.4z"/></svg>';
      this.lens = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 152c-57.2 0-104 46.8-104 104s46.8 104 104 104 104-46.8 104-104-46.8-104-104-104zm0-104C141.601 48 48 141.601 48 256s93.601 208 208 208 208-93.601 208-208S370.399 48 256 48zm0 374.4c-91.518 0-166.4-74.883-166.4-166.4S164.482 89.6 256 89.6 422.4 164.482 422.4 256 347.518 422.4 256 422.4z"/></svg>';
      this.arrow_left = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 128L192 256l128 128z"/></svg>';
      this.arrow_right = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M192 128l128 128-128 128z"/></svg>';
    }
  }

  /**
   * The MwlImage class
   */
  class MwlImage {
    constructor(datas) {
      this.id = datas.id;
      this.index = datas.index;
      this.exists = datas.exists;
      this.img_low_res_src = datas.img_low_res_src;
      this.img_src = datas.img_src;
      this.img_gps = datas.img_gps;
      this.img_srcset = datas.img_srcset;
      this.img_sizes = datas.img_sizes;
      this.img_dimensions = datas.img_dimensions;
      this.img_orientation = datas.img_orientation;
      this.img_exifs = datas.img_exifs;
      this.preloaded = false;
    }
  };

  class MwlController {

    constructor(settings) {
      this.settings = settings;
      this.images_number;
      this.images = [];
      this.current_image_index;
    }

    createMwlTargetDiv() {
      var mwlIcon = new MwlIcon();
      var lightbox_container = '<div id="mwl-target"> \
                                    <div class="mwl-fullpage-container invisible"> \
                                      <div class="controls-container"> \
                                        <div class="mwl-control control-close right">' + mwlIcon.close + '</div> \
                                        <div class="mwl-control control-expand right">' + mwlIcon.expand + '</div> \
                                        <div class="mwl-control control-shrink right">' + mwlIcon.shrink + '</div> \
                                        <div class="mwl-control control-download right">' + mwlIcon.download + '</div> \
                                        <div class="mwl-control control-show-map right">' + mwlIcon.pin + '</div> \
                                        <div class="mwl-control control-hide-map right">' + mwlIcon.camera + '</div> \
                                      </div> \
                                      <div class="image-container"> \
                                        <img class="low-res-img"> \
                                        <div class="loader"></div> \
                                        <img alt="Lightbox Image" class="high-res-img"> \
                                        <div class="control-navigation-container prev">' + mwlIcon.arrow_left + '</div> \
                                        <div class="control-navigation-container next">' + mwlIcon.arrow_right + '</div> \
                                      </div> \
                                      <div class="image-info-container"> \
                                        <div class="content"> \
                                          <h2 data-exif="title"></h2> \
                                          <p data-exif="caption"></p> \
                                          <div class="image-exifs"> \
                                            <div class="image-exif">' + mwlIcon.camera + ' <span data-exif="camera"></span></div> \
                                            <div class="image-exif">' + mwlIcon.lens + ' <span data-exif="lens"></span></div> \
                                            <div class="image-exif">' + mwlIcon.aperture + ' <span data-exif="aperture"></span></div> \
                                            <div class="image-exif">' + mwlIcon.shutter_speed + ' <span data-exif="shutter_speed"></span></div> \
                                            <div class="image-exif">' + mwlIcon.iso + ' <span data-exif="iso"></span></div> \
                                            <div class="image-exif">' + mwlIcon.focal_length + ' <span data-exif="focal_length"></span></div> \
                                          </div> \
                                        </div> \
                                      </div> \
                                    </div> \
                                  </div>';
      // If it's already there, we remove it.
      $('#mwl-target').remove();
      // And we add it again.
      $('body').append(lightbox_container);
    }

    scrapThePage() {
      var self = this;
      // Select all images inside the selector.
      var $potential_images = $(self.settings.selector).find('img');
      // If there is an anti_selector setting, or if it's not empty
      if (self.settings.anti_selector) {
        // For each potential image
        var index = 0;
        $potential_images.each(function () {
          // If it has no parents matching the anti-selector AND that it isn't matching the anti selector itself
          if ($(this).parents(self.settings.anti_selector).length == 0 && !$(this).is(self.settings.anti_selector)) {
            // It gets the mwl-img class, and an index.
            $(this).addClass('mwl-img').attr('mwl-index', index);
            index++;
          }
        });
      } else {
        // For each potential image
        var index = 0;
        $potential_images.each(function () {
          // It gets the mwl-img class, and an index.
          $(this).addClass('mwl-img').attr('mwl-index', index);
          index++;
        });
      }

      self.images_number = $('.mwl-img').length;
    }

    retrieveImagesData() {
      var self = this;
      var $images = $('.mwl-img');
      // For each image
      $images.each(function () {
        var $image = $(this);
        // The image used in the thumbnail
        var current_src = $image.prop('currentSrc');
        // If image has an ID
        if ($image.attr('data-mwl-img-id') && mwl_data && mwl_data[$image.attr('data-mwl-img-id')]) {
          // We get data from the mwl_data
          var image_data = mwl_data[$image.attr('data-mwl-img-id')];
          // We rewrite the GPS
          if (image_data.data.gps.split(",").length > 1) {
            image_data.gps = {
              lat: parseFloat(image_data.data.gps.split(",")[0]),
              lng: parseFloat(image_data.data.gps.split(",")[1])
            }
          } else {
            image_data.gps = {
              lat: "N/A",
              lng: "N/A"
            }
          }
          // We create a temporary data object for this image.
          var datas = {
            id: image_data.data.id,
            index: parseInt($image.attr('mwl-index')),
            exists: true,
            img_low_res_src: current_src,
            img_src: encodeURI(image_data.file),
            img_srcset: image_data.file_srcset,
            img_sizes: image_data.file_sizes,
            img_dimensions: image_data.dimension,
            img_orientation: image_data.dimension.width > image_data.dimension.height ? "landscape" : "portrait",
            img_exifs: image_data.data,
            img_gps: image_data.gps
          };
          // We create a new MwlImage object with these datas
          self.images.push(new MwlImage(datas));
        }
        // If image doesn't have an ID
        else {
          // We create basic datas for this image.
          var img_src = '';
          if ($image.hasClass('mgl-lazy')) {
            var img_src = $image.attr('mgl-src');
          }
          if ($image.attr('data-lazy-src')) {
            var img_src = $image.attr('data-lazy-src');
          }
          if (!img_src) {
            var img_src = $image.attr('src');
          }

          var img_srcset = '';
          if ($image.attr('data-lazy-srcset')) {
            var img_srcset = $image.attr('data-lazy-srcset');
          }
          if (!img_srcset) {
            var img_srcset = $image.attr('srcset');
          }

          var img_sizes = '';
          if ($image.attr('data-lazy-sizes')) {
            var img_sizes = $image.attr('data-lazy-sizes');
          }
          if (!img_sizes) {
            var img_sizes = $image.attr('sizes');
          }

          var datas = {
            exists: true,
            index: parseInt($image.attr('mwl-index')),
            img_low_res_src: current_src,
            img_src: img_src,
            img_srcset: img_srcset,
            img_sizes: img_sizes,
            img_dimensions: false,
            img_orientation: 'landscape',
            img_exifs: {
              title: '',
              caption: '',
              camera: 'N/A',
              lens: 'N/A',
              aperture: 'N/A',
              shutter_speed: 'N/A',
              iso: 'N/A',
              focal_length: 'N/A'
            }
          };
          // We create a new MwlImage object with these datas
          self.images.push(new MwlImage(datas));
        }
      });
    }

    populateLightbox(image) {
      var self = this;

      var $mwl_container = $('.mwl-fullpage-container');
      var $mwl_image_container = $('.mwl-fullpage-container .image-container');
      var $low_res_img = $('.mwl-fullpage-container .image-container .low-res-img');
      var $high_res_img = $('.mwl-fullpage-container .image-container .high-res-img');
      var $mwl_image_info_container = $('.mwl-fullpage-container .image-info-container');

      // If deep-linkng is active, we add the deep-linking anchor to the URL
      if (self.settings.deep_linking && typeof mwl_pro_create_deeplinking_hash === "function") {
        mwl_pro_create_deeplinking_hash(image);
      }

      // Add theme attribute
      if (self.settings.theme) {
        $mwl_container.attr('data-theme', self.settings.theme);
      }

      // Add orientation attribute
      if (self.settings.orientation_responsive.enabled) {
        $mwl_container.attr('data-orientation', image.img_orientation);
      } else {
        $mwl_container.attr('data-orientation', self.settings.orientation_responsive.orientation);
      }

      // Show or hide download control
      if (!self.settings.download.enable) {
        $('.control-download').hide();
      }

      // ====================================
      // We add Image datas to the template
      // ====================================

      if(self.settings.low_res_placeholder) {
        // Placeholder src
        $low_res_img.attr('src', image.img_low_res_src);
        $low_res_img.removeClass('landscape portrait');
        $low_res_img.addClass(image.img_orientation);

        $mwl_container.find('.loader').hide();
        setTimeout(function() {
          $mwl_container.find('.loader').fadeIn();
        },200);
      }

      //  Image src
      $high_res_img.attr('src', image.img_src);

      // Image srcset and sizes
      $high_res_img.removeAttr('srcset sizes');
      if (image.img_srcset) {
        $high_res_img.attr("srcset", image.img_srcset);
      }
      if (image.img_sizes) {
        $high_res_img.attr("sizes", image.img_sizes);
      }

      // Image exif info
      $mwl_container.find('[data-exif]').each(function () {
        var info = $(this).attr('data-exif');
        // If we have to display this info
        if (self.settings.infos_to_display[info]) {
          // If it's the caption
          if (info == 'caption') {
            // Use the caption_source setting
            $(this).html(image.img_exifs[self.settings.caption_source]);
          } else {
            $(this).html(image.img_exifs[info]);
          }

        }
        // If we have to hide this info, we add the hidden-exif class
        else {
          $(this).parent().addClass('hidden-exif');
        }
      });

      // When image has loaded, we fade it in.
      $mwl_image_container.imagesLoaded().always(function () {
        setTimeout(function () {
          $mwl_image_container.addClass('full-res-loaded');
        }, 50);
      });

      // ====================================
      // Now it's time to clean a bit !
      // ====================================

      // A probe detecting if there is title or caption or exif
      var there_is_info = false;
      // A probe detecting if there is any exif info
      var there_is_exif = false;
      $(".image-exif").each(function () {
        if ($(this).find('span').html() == 'N/A' || $(this).hasClass('hidden-exif')) {
          $(this).hide();
        } else {
          $(this).show();
          there_is_exif = true;
          there_is_info = true;
        }
      });

      // Detecting if there is title or caption
      if ($('*[data-exif="title"]').html() != '' || $('*[data-exif="caption"]').html() != '') {
        there_is_info = true;
      }

      // If there is no info for this image, we hide the info container
      if (!there_is_info) {
        $mwl_image_info_container.hide();
      }
      // If there is, we show it.
      else {
        $mwl_image_info_container.css('display', 'inline-flex');
      }

      // Apply correct margins depending on the present data
      if (image.img_exifs.title != '' && image.img_exifs.caption != '' || image.img_exifs.title != '' && there_is_exif) {
        $mwl_image_info_container.find('h2').css('margin-bottom', '10px')
      } else {
        $mwl_image_info_container.find('h2').css('margin-bottom', '0px')
      }

      if (image.img_exifs.caption != '' && there_is_exif) {
        $mwl_image_info_container.find('p').css('margin-bottom', '10px')
      } else {
        $mwl_image_info_container.find('p').css('margin-bottom', '0px')
      }

      // If map is enabled, and image has GPS, we start the map part !
      if (typeof mwl_pro_init_map === "function" && self.settings.map.enabled) {
        if (image.img_gps && image.img_gps.lat !== "N/A") {
          $('.google-map-script').remove();
          window.google = {};
          mwl_pro_init_map(image.img_gps, self.settings.map);
        } else {
          $('.control-show-map').hide();
          $('.control-hide-map').hide();
        }
      }
    }

    init() {
      var self = this;

      self.createMwlTargetDiv();
      self.scrapThePage();
      self.retrieveImagesData();
    }

    /**
     * Get the next image index
     * @returns {[[int]]} index [[next image index]]
     */
    getNextIndex() {
      var self = this;

      var next_index = self.current_image_index + 1;
      if (next_index == self.images_number) {
        next_index = 0;
      } else {
        next_index = self.current_image_index + 1;
      }
      return next_index;
    };

    /**
     * Get the previous image index
     * @returns {[[int]]} index [[previous image index]]
     */
    getPrevIndex() {
      var self = this;

      var prev_index = self.current_image_index - 1;
      if (prev_index < 0) {
        prev_index = self.images_number - 1;
      } else {
        prev_index = self.current_image_index - 1;
      }
      return prev_index;
    };

    /**
     * Get an image with its index
     * @param   {[[int]]} index [[image index]]
     * @returns {[[MwlImage]]} [[image]]
     */
    getMwlImageByIndex(index) {
      var self = this;

      var result;
      self.images.forEach(function (item) {
        if (item.index == index) {
          result = item;
        }
      });
      return result;
    };

    /**
     * Get an image with its id
     * @param   {[[int]]} id [[image index]]
     * @returns {[[MwlImage]]} [[image]]
     */
    getMwlImageById(id) {
      var self = this;

      var result;
      self.images.forEach(function (item) {
        if (item.id == id) {
          result = item;
        }
      });
      return result;
    };

    /**
     * Open the lightbox
     * @param {[[MwlImage]]} mwl_image    [[image to display]]
     * @param {[[string]]} mwl_layout [[lightbox template]]
     */
    showLightbox(mwl_image) {
      var self = this;

      if (mwl_image) {
        self.current_image_index = mwl_image.index;
        self.populateLightbox(mwl_image);
        // Preloading
        var next_image_index = self.getNextIndex();
        var next_image = self.getMwlImageByIndex(next_image_index);
        if (typeof mwl_pro_preload_image === "function") {
          if (self.settings.preloading && next_image.exists && !next_image.preloaded) {
            mwl_pro_preload_image(next_image.img_src, next_image.img_srcset, next_image.img_sizes);
            next_image.preloaded = true;
          }
        }
        // Unhide the lightbox
        $('.mwl-fullpage-container').removeClass('invisible');
      }
    };

    /**
     * Download the image.
     */
    downloadImage() {
      var self = this;

      var current_image = this.getMwlImageByIndex(self.current_image_index);
      window.open(current_image.img_src, '_blank');
    };

    /**
     * Expand the current image
     */
    expandImage() {
      var self = this;
      
      // Switching to expend template
      $('.mwl-fullpage-container').addClass('expanded');
      self.settings.expanded_image = true;
    };

    /**
     * Shrink an expanded image back to its original layout
     */
    shrinkImage() {
      var self = this;

      // Switching to shrink mode
      $('.mwl-fullpage-container').removeClass('expanded');
      $('.mwl-fullpage-container .image-container img').hide().show(0);
      // Setting expanded_image setting to false
      self.settings.expanded_image = false;
    };

    /**
     * Change the image in the lightbox ( opened )
     * @param {[[MwlImage]]} mwl_image    [[image to display]]
     * @param {[[string]]} mwl_layout [[lightbox template]]
     */
    changeLightboxImage(mwl_image, mwl_layout, mwl_theme, navigating) {
      var self = this;

      $('.mwl-fullpage-container .image-container').removeClass('full-res-loaded');
      $('.mwl-fullpage-container .image-container .low-res-img').attr('src', '');

      // Hiding potential map
      $('#mwl-map').css({
        'visibility': 'hidden',
        'opacity': 0
      });

      // If current_image_index is in expanded mode, next one stays in expanded mode.
      if (self.settings.expanded_image) {
        mwl_layout = "expanded"
      };

      self.current_image_index = mwl_image.index;
      var next_image_index, next_image, next_index, prev_index, temp_mwl_img;
      if (mwl_image && mwl_image.exists) {
        self.populateLightbox(mwl_image);
        next_image_index = self.getNextIndex();
        next_image = self.getMwlImageByIndex(next_image_index);
        if (typeof mwl_pro_preload_image === "function") {
          if (self.settings.preloading && next_image.exists && !next_image.preloaded) {
            mwl_pro_preload_image(next_image.img_src, next_image.img_srcset, next_image.img_sizes);
            next_image.preloaded = true;
          }
        }
      } else {
        if (navigating === "next") {
          next_index = self.getNextIndex();
          temp_mwl_img = self.getMwlImageByIndex(next_index);
          self.changeLightboxImage(temp_mwl_img, mwl_layout, mwl_theme, navigating);
        }
        if (navigating === "previous") {
          prev_index = self.getPrevIndex();
          temp_mwl_img = self.getMwlImageByIndex(prev_index);
          self.changeLightboxImage(temp_mwl_img, mwl_layout, mwl_theme, navigating);
        }
      }
    };

    /**
     * Close the lightbox
     */
    closeLightbox() {
      var self = this;

      // If there is a deep-linking anchor
      if(window.location.href.indexOf('#mwl-') > 0) {
        // We remove it.
        var clean_url = window.location.href.replace(/(#mwl-)([0-9])+/gm, "");
        history.pushState(null, '', clean_url);
      }

      $('.mwl-fullpage-container .image-container').removeClass('full-res-loaded');

      // close the lightbox
      $('.mwl-fullpage-container').addClass('invisible');
      $('#mwl-map').css({
        'visibility': 'hidden',
        'opacity': 0
      });

      $('.mwl-container').html('');

      // exit expanding mode
      self.settings.expanded_image = false;
    };
  }

  window.MwlController = MwlController;

});