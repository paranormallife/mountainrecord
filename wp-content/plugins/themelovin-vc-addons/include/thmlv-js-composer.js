(function($) {
    'use strict';
	
	$(document).ready(function($){
		
		var $window = $(window);
		
		/*-----------------------------------------------------------------------------------
		BANNER SLIDER
		-----------------------------------------------------------------------------------*/
		
		var $bannerSliders = $('.thmlv-banner-slider');

		/* Helper: Add banner animation class */
		var _bannerAddAnimClass = function($slider, $slideActive) {
			$slider.$bannerContent = $slideActive.find('.thmlv-banner-text-inner');
	
			if ($slider.$bannerContent.length) {
				$slider.bannerAnimation = $slider.$bannerContent.data('animate');
				$slider.$bannerContent.addClass($slider.bannerAnimation);
			}
		};

		// Initialize banner sliders	
		$bannerSliders.each(function() {
			var $slider = $(this),
				sliderOptions = {
					arrows: false,
					prevArrow: '<a class="slick-prev"><i class="fa fa-chevron-left"></i></a>',
					nextArrow: '<a class="slick-next"><i class="fa fa-chevron-right"></i></a>',
					dots: false,
					edgeFriction: 0,
					infinite: false,
					pauseOnHover: false,
					speed: 350
				};
		
			// Wrap slider banners in a 'div' element (this will be the '.slick-slide' element around each banner)
			$slider.children().wrap('<div></div>');
	
			// Extend default slider settings with data attribute settings
			sliderOptions = $.extend(sliderOptions, $slider.data());
	
			// Event: Slick slide - Init
			$slider.on('init', function() {
				$(document).trigger('banner-slider-loaded');
				_bannerAddAnimClass($slider, $slider.find('.slick-track .slick-active'));
			});
	
			// Event: Slick slide - Slide change
			$slider.on('afterChange', function(event, slick, currentSlide) {
				// Make sure the slide has changed
				if ($slider.slideIndex != currentSlide) {
					$slider.slideIndex = currentSlide;
			
					// Remove animation class from previous banner
					if ($slider.$bannerContent) {
						$slider.$bannerContent.removeClass($slider.bannerAnimation);
					}
			
					_bannerAddAnimClass($slider, $slider.find('.slick-track .slick-active')); // Note: Don't use the "currentSlide" index to find the active element ("infinite" setting clones slides)
				}
			});
	
			// Initialize banner slider
			$slider.slick(sliderOptions);
		});
		
		/*-----------------------------------------------------------------------------------
		POST SLIDER
		-----------------------------------------------------------------------------------*/
	
		var $sliders = $('.thmlv-post-slider'),
		sliderOptions = {
			adaptiveHeight: true,
			arrows: false,
			dots: true,
			edgeFriction: 0,
			infinite: false,
			pauseOnHover: false,
			speed: 350,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 518,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]};
					
		$sliders.each(function() {
			var $slider = $(this);	
			// Extend default slider settings with data attribute settings
			sliderOptions = $.extend(sliderOptions, $slider.data());
			$slider.slick(sliderOptions);
		});	
		
		/*-----------------------------------------------------------------------------------
		ISOTOPE
		-----------------------------------------------------------------------------------*/
				
		function masonryPortfolioInit() {
			if($('.thmlvIsotopeVC').length > 0) {
				var $window = $(window);
				var $container = $('.thmlvIsotopeVC');
				var $colWidth = Math.floor($container.innerWidth() / 4);
				$container.imagesLoaded(function() {
					$container.isotope({
						itemSelector: '.thmlvMasonryPortfolioVC',
						columnWidth: $colWidth,
						layoutMode: 'packery'
					});
				});
				reLayout();
			}
		};
		masonryPortfolioInit();
		
		function reLayout() {
			if($('.thmlvIsotopeVC').closest('.vc_row').data('vc-stretch-content') !== undefined) {
				$('.thmlvIsotopeVC').width($(window).width());
				console.log('test');
			}
			var $container = $('.thmlvIsotopeVC');
			var $smallItemHeight = ($container.width() / 100 * 25) * 1.25;
			if($window.width() > 470) {
				$('.thmlvMasonryPortfolioVC').each(function() {
					$(this).css('height', $smallItemHeight);
				});
				$('.thmlvMasonryPortfolioVC.thmlvMediumSize').each(function() {
					$(this).css('height', $smallItemHeight);
				});
				$('.thmlvMasonryPortfolioVC.thmlvBigSize').each(function() {
					$(this).css('height', ($smallItemHeight * 2));
				});
			} else {
				$('.thmlvMasonryPortfolioVC').each(function() {
					$(this).css('height', ($smallItemHeight * 2));
				});
			}
			
			$container.imagesLoaded(function() {
				var $colWidth = Math.floor($container.innerWidth() / 4);
				$container.isotope({
					itemSelector: '.thmlvMasonryPortfolioVC',
					columnWidth: $colWidth,
					layoutMode: 'packery'
				});
			});
		};
		$window.resize(reLayout);
		
		/*-----------------------------------------------------------------------------------
		MAILCHIMP
		-----------------------------------------------------------------------------------*/
		
		$('#thmlvMailchimpSignup').submit(function() {
			$('#thmlvMailchimpResponse').html('Adding email address...');
				var file_path = $('.thmlvHiddenPath').val();
			$.ajax({
				url: file_path,
				data: 'ajax=true&email=' + escape($('#email').val()) + '&_mailchimp_key=' + escape($('#_mailchimp_key').val()) + '&_mailchimp_list=' + escape($('#_mailchimp_list').val()) + '&double_optin=false',
				success: function(msg) {
					$('#thmlvMailchimpResponse').html(msg);
				}
			});
			return false;
		});
		
	});
}(jQuery))