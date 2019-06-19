(function($) {
    'use strict';
    
    $(window).load(function() {
    
    	/*-----------------------------------------------------------------------------------
		SWITCH HEADER HEIGHT
		-----------------------------------------------------------------------------------*/
		
		function switchHeight() {
			if($('.thmlvAutoHeight').length > 0) {
				var logoHeight = $('#thmlvLogo').outerHeight();
				var titleHeight = $('#thmlvSectionTitle').outerHeight();
				if($('#thmlvSectionTitle h3').is(':empty')) {
					var heightValue = logoHeight + 100;
				} else {
					var heightValue = logoHeight + titleHeight + 288;
				}
				$('.thmlvAutoHeight').height(heightValue);
			}
			if($('.thmlvFixedHeight').length > 0) {
				var heightValue = $('.thmlvFixedHeight').data("heightValue");
				if(!heightValue) {
					$('.thmlvFixedHeight').height($(window).height() * 0.5);
				} else {
					$('.thmlvFixedHeight').height(heightValue);
				}
			}
			else if($('.thmlvPercentHeight').length > 0) {
				var heightValue = $('.thmlvPercentHeight').data("heightValue");
				if(!heightValue) {
					heightValue = 50;
				}
				$('.thmlvPercentHeight').height($(window).height() * (heightValue / 100));
			}
			headerGallery();
		}
		switchHeight();
		$(window).resize(switchHeight);
		
		function headerGallery() {
			if($('#thmlvHeaderGallery').length != 0) {
				var $slides = $('#thmlvHeaderGallery');

				Hammer($slides[0]).on("swipeleft", function(e) {
					$slides.data('superslides').animate('next');
				});

				Hammer($slides[0]).on("swiperight", function(e) {
					$slides.data('superslides').animate('prev');
				});
		
				$('#thmlvHeaderGallery').superslides({
					animation: 'fade',
					inherit_width_from: '#thmlvHeader',
					inherit_height_from: '#thmlvHeader',
					play: 5000
				})
			}
        }
        
        /*-----------------------------------------------------------------------------------
		PORTFOLIO SELECTED SIZES
		-----------------------------------------------------------------------------------*/
		
		function selectedSizes() {
			if($('.thmlvSelectedContent').length) {
				var windowWidth = $(window).width();
				var windowHeight = $(window).height();
				$('.thmlvSelectedContent').width(windowWidth).height(windowHeight);
				$('.thmlvSelected').each(function() {
					$(this).width(windowWidth).height(windowHeight);
				});
			}
		}
		selectedSizes();
		$(window).resize(selectedSizes);
    
    });
	
	$(document).ready(function($){
	
		var $window = $(window);
		
		/*-----------------------------------------------------------------------------------
		ADAPTIVE LOGO ON INNER PAGES
		-----------------------------------------------------------------------------------*/
		
		var headerBg = $('#thmlvHeader').css('background-image');
		var headerBgColor = $('#thmlvHeader').css('backgroundColor');
		var bodyBgColor = $('body').css("background-color");
		if($('.thmlvAutoLayout').length) {
			if(headerBg != 'none' && headerBg !== undefined) {
				headerBg = /url\(['"]?(.*)\b['"]?\)/.exec(headerBg)[1];
				RGBaster.colors(headerBg, {
				  success: function(payload) {
					var r, b, g, hsp, a;
					a = payload.secondary.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
					r = a[1];
					b = a[2];
					g = a[3];
					hsp = Math.sqrt( // HSP equation from http://alienryderflex.com/hsp.html
					  0.299 * (r * r) +
					  0.587 * (g * g) +
					  0.114 * (b * b)
					);
					if(hsp<127.5) {
						$('body').addClass('thmlvDarkLayout');
						$('#thmlvSelectedTitles').addClass('thmlvDarkLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-dark'));
						console.log($('#thmlvLogo img').data('appeal-dark'));
					} else {
						$('body').addClass('thmlvLightLayout');
						$('#thmlvSelectedTitles').addClass('thmlvLightLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-light'));
						console.log($('#thmlvLogo img').data('appeal-light'));
					}
				  }
				});
			} else if(headerBgColor != 'none' && headerBgColor !== undefined) {
				var r, b, g, hsp, a;
				a = headerBgColor.match(/^rgb?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
				if(a != null) {
					r = a[1];
					b = a[2];
					g = a[3];
					hsp = Math.sqrt( // HSP equation from http://alienryderflex.com/hsp.html
						0.299 * (r * r) +
						0.587 * (g * g) +
						0.114 * (b * b)
					);
					if(hsp<127.5) {
						$('body').addClass('thmlvDarkLayout');
						$('#thmlvSelectedTitles').addClass('thmlvDarkLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-dark'));
						console.log($('#thmlvLogo img').data('appeal-dark'));
					} else {
						$('body').addClass('thmlvLightLayout');
						$('#thmlvSelectedTitles').addClass('thmlvLightLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-light'));
						console.log($('#thmlvLogo img').data('appeal-light'));
					}
				}
			} else {
				var r, b, g, hsp, a;
				a = bodyBgColor.match(/^rgb?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);
				if(a != null) {
					r = a[1];
					b = a[2];
					g = a[3];
					hsp = Math.sqrt( // HSP equation from http://alienryderflex.com/hsp.html
						0.299 * (r * r) +
						0.587 * (g * g) +
						0.114 * (b * b)
					);
					if(hsp<127.5) {
						$('body').addClass('thmlvDarkLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-dark'));
						console.log($('#thmlvLogo img').data('appeal-dark'));
					} else {
						$('body').addClass('thmlvLightLayout');
						$('#thmlvLogo img').attr("src", $('#thmlvLogo img').data('appeal-light'));
						console.log($('#thmlvLogo img').data('appeal-light'));
					}
				}	
			}
		}
		
		/*-----------------------------------------------------------------------------------
		PORTFOLIO SELECTED SWITCH
		-----------------------------------------------------------------------------------*/
		
		function lazyLoadVideo(currentSection) {
			var hasVideo = currentSection.find('source[data-src]');
			if($(hasVideo).length && !Modernizr.touch) {
				hasVideo.each(function(){
					$(this).attr('src', $(this).data('src'));
					$(this).removeAttr('data-src');
					
					if($(this).is('source')){
						$(this).closest('video').get(0).load();
					}
				});
			}
			hasVideo.closest('video').animate({'opacity': 1}, 800);
		}
		
		function selectedSwitch() {
			if($('.thmlvSelectedContent').length) {
				$('.thmlvSelectedSwitch').each(function() {
					$(this).on("mouseover", function(e) {
						e.preventDefault();
						var current = $(this).data('selected');
						$('.thmlvSelected.post-'+current).stop().animate({'opacity': 1}, 200);
						$('.thmlvSelected.post-'+current).siblings().stop().animate({'opacity': 0}, 200);
						lazyLoadVideo($('.thmlvSelected.post-'+current));
					});
					$(this).on("mouseout", function(e) {
						e.preventDefault();
						var current = $(this).data('selected');
						$('.thmlvSelected.post-'+current).stop().animate({'opacity': 0}, 200);
					});
				});
			}
		}
		selectedSwitch();
		
		/*-----------------------------------------------------------------------------------
		ISOTOPE
		-----------------------------------------------------------------------------------*/
				
		function masonryPortfolioInit() {
			if($('#thmlvIsotope').length > 0) {
				var $window = $(window);
				var $container = $('#thmlvIsotope');
				var $colWidth = Math.floor($container.innerWidth() / 4);
				$container.imagesLoaded(function() {
					$container.isotope({
						itemSelector: '.thmlvMasonryPortfolio',
						columnWidth: $colWidth,
						layoutMode: 'packery'
					});
				});
				reLayout();
				$window.resize(reLayout());
			}
		};
		masonryPortfolioInit();
		
		function reLayout() {
			var $container = $('#thmlvIsotope');
			var $smallItemHeight = ($container.width() / 100 * 25) * 1.25;
			if($window.width() > 470) {
				$('.thmlvMasonryPortfolio').each(function() {
					$(this).css('height', $smallItemHeight);
				});
				$('.thmlvMasonryPortfolio.thmlvMediumSize').each(function() {
					$(this).css('height', $smallItemHeight);
				});
				$('.thmlvMasonryPortfolio.thmlvBigSize').each(function() {
					$(this).css('height', ($smallItemHeight * 2));
				});
			} else {
				$('.thmlvMasonryPortfolio').each(function() {
					$(this).css('height', ($smallItemHeight * 2));
				});
			}
			
			$container.imagesLoaded(function() {
				var $colWidth = Math.floor($container.innerWidth() / 4);
				$container.isotope({
					itemSelector: '.thmlvMasonryPortfolio',
					columnWidth: $colWidth,
					layoutMode: 'packery'
				});
			});
		};
		$window.resize(reLayout);
		
		/*-----------------------------------------------------------------------------------
		COMMENT FORM
		-----------------------------------------------------------------------------------*/
    	
    	$('.comment-form-comment').on('click', function () {
				$(this).addClass('form-open').next().slideDown(300);
			})
			.prependTo($('.comment-form'))
			.siblings().wrapAll('<div class="comment-form-inner"/>');
		$('.comment-form-inner').hide();
		
		/*-----------------------------------------------------------------------------------
		TO TOP
		-----------------------------------------------------------------------------------*/
		
		$('#thmlvToTop').on('click', function(e) {
            e.preventDefault();
            $('body, html').animate({
                scrollTop: 0,
            }, 800);
        });
        
        /*-----------------------------------------------------------------------------------
		SHARE TOGGLE
		-----------------------------------------------------------------------------------*/
		
		$('#thmlvSocialToggle').on('click', function(e) {
			e.preventDefault();
			$(this).parent().addClass('open');
		});
        
        /*-----------------------------------------------------------------------------------
		SOCIAL SHARE
		-----------------------------------------------------------------------------------*/
        
        function socialShares() {
			$('#thmlvShareBar ul').each(function () {
				var url = $(this).parent().data('url'),
					media = $(this).parent().data('media'),
					description = $(this).parent().data('description');
				
				$(this).sharrre({
					share: {
						googlePlus: false,
						facebook: true,
						twitter: false,
						pinterest: true
					},
					url: url,
					urlCurl: false,
					template: '<li><a href="#" title="Share" class="facebook"><i class="fa fa-facebook"></i></a></li><li><a href="#" title="Share" class="twitter"><i class="fa fa-twitter"></i></a></li><li><a href="#" title="Share" class="google-plus"><i class="fa fa-google-plus"></i></a></li><li><a href="#" title="Share" class="pinterest"><i class="fa fa-pinterest-p"></i></a></li>',
					enableHover: false,
					enableTracking: false, //TODO add as theme option
					render: function(api, options){
						options.buttons.pinterest.media = media;
						options.buttons.pinterest.description = description + ' ' + url;
					
						$(api.element).on('click', '.twitter', function() {
							api.simulateClick();
							api.openPopup('twitter');
						});
						$(api.element).on('click', '.facebook', function() {
							api.simulateClick();
							api.openPopup('facebook');
						});
						$(api.element).on('click', '.google-plus', function() {
							api.simulateClick();
							api.openPopup('googlePlus');
						});
						$(api.element).on('click', '.pinterest', function() {
							api.simulateClick();
							api.openPopup('pinterest');
						});
					}
				});
			});
		}
		socialShares();

		/*-----------------------------------------------------------------------------------
		MENU
		-----------------------------------------------------------------------------------*/
		
		function submenu_adjustments() {
			$("#thmlvHeaderMenu > ul > .menu-item").mouseenter(function() {
				if ( $(this).children(".sub-menu").length > 0 ) {
					var submenu = $(this).children(".sub-menu");
					var window_width = parseInt($(window).outerWidth());
					var submenu_width = parseInt(submenu.outerWidth());
					var submenu_offset_left = parseInt(submenu.offset().left);
					var submenu_adjust = window_width - submenu_width - submenu_offset_left;
				
					if (submenu_adjust < 0) {
						submenu.css("left", submenu_adjust-30 + "px");
					}
				}
			});
		}
	
		submenu_adjustments();
		
		/*-----------------------------------------------------------------------------------
		TITLE OPACITY
		-----------------------------------------------------------------------------------*/
		
		function title_opacity() {
			$(window).on('scroll', function() {
				var toTop = $(this).scrollTop();
				var headerHeight = $('#thmlvHeader').height();
				if (toTop <= headerHeight) {
				  $('#thmlvSectionTitle').css({'opacity' : (1 - toTop/headerHeight)});
			   }
			});
		}
		
		title_opacity();
		
		/*-----------------------------------------------------------------------------------
		PARALLAX
		-----------------------------------------------------------------------------------*/
		
		var windowHeight = $window.height();
		var windowWidth = $window.width();
	
		$.fn.parallax = function(xpos, speedFactor, outerHeight) {
			var $this = $(this);
			var getHeight;
			var firstTop;
			var paddingTop = 0;
		
			//get the starting position of each element to have parallax applied to it		
			$this.each(function(){
				firstTop = $this.offset().top;
			});
		
			$window.resize(function () {
				$this.each(function(){
					firstTop = $this.offset().top;
				});
			});
		
			$window.load(function(){
				$this.each(function(){
					firstTop = $this.offset().top;
				}); 
			});
	 
	
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		 
			
			// setup defaults if arguments aren't specified
			if (arguments.length < 1 || xpos === null) xpos = "50%";
			if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
			if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
			// function to be called whenever the window is scrolled or resized
			function update(){
				var pos = $window.scrollTop();				
	
				$this.each(function(){
					var $element = $(this);
					var top = $element.offset().top;
					var height = getHeight($element);
					// Check if totally above or totally below viewport
					if (top + height < pos || top > pos + windowHeight) {
						return;
					}
					
					if( windowWidth > 1024 ) {
						$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
					}
				});
			}		
	
			$window.bind('scroll', update).resize(update);
			update();
		};
	
		$.fn.countTo = function (options) {
			options = options || {};
		
			return $(this).each(function () {
				// set options for current element
				var settings = $.extend({}, $.fn.countTo.defaults, {
					from:            $(this).data('from'),
					to:              $(this).data('to'),
					speed:           $(this).data('speed'),
					refreshInterval: $(this).data('refresh-interval'),
					decimals:        $(this).data('decimals')
				}, options);
			
				// how many times to update the value, and how much to increment the value on each update
				var loops = Math.ceil(settings.speed / settings.refreshInterval),
					increment = (settings.to - settings.from) / loops;
			
				// references & variables that will change with each update
				var self = this,
					$self = $(this),
					loopCount = 0,
					value = settings.from,
					data = $self.data('countTo') || {};
			
				$self.data('countTo', data);
			
				// if an existing interval can be found, clear it first
				if (data.interval) {
					clearInterval(data.interval);
				}
				data.interval = setInterval(updateTimer, settings.refreshInterval);
			
				// initialize the element with the starting value
				render(value);
			
				function updateTimer() {
					value += increment;
					loopCount++;
				
					render(value);
				
					if (typeof(settings.onUpdate) == 'function') {
						settings.onUpdate.call(self, value);
					}
				
					if (loopCount >= loops) {
						// remove the interval
						$self.removeData('countTo');
						clearInterval(data.interval);
						value = settings.to;
					
						if (typeof(settings.onComplete) == 'function') {
							settings.onComplete.call(self, value);
						}
					}
				}
			
				function render(value) {
					var formattedValue = settings.formatter.call(self, value, settings);
					$self.html(formattedValue);
				}
			});
		};
	
		$.fn.countTo.defaults = {
			from: 0,               // the number the element should start at
			to: 0,                 // the number the element should end at
			speed: 1000,           // how long it should take to count between the target numbers
			refreshInterval: 100,  // how often the element should be updated
			decimals: 0,           // the number of decimal places to show
			formatter: formatter,  // handler for formatting the value before rendering
			onUpdate: null,        // callback method for every time the element is updated
			onComplete: null       // callback method for when the element finishes updating
		};
	
		function formatter(value, settings) {
			return value.toFixed(settings.decimals);
		}
		
		$("#thmlvHeader").parallax("50%", -0.3);
		
		/*-----------------------------------------------------------------------------------
		MOBILE MENU
		-----------------------------------------------------------------------------------*/
		
		function sideMenu() {
			$('#thmlvMenuIcon').on('click', function(e) {
				e.preventDefault();
				if($window.width() <= 768) {
					$('body').toggleClass('thmlvMobileActive');
				}
			});
		}
		sideMenu();
		
		$window.resize(function(e) {
			$('body').removeClass('thmlvMobileActive');
		});
		
		$('#thmlvMobileMenuScroll li a').on('click', function(e) {
			console.log($(this).parent());
			if($(this).parent().has('ul').length) {
				e.preventDefault();
				$(this).parent().children('ul').slideToggle();
				console.log('ok');
			}
		});
		
		/*-----------------------------------------------------------------------------------
		FITVID
		-----------------------------------------------------------------------------------*/
		
		$("#thmlvContent, .thmlvClassicPost").fitVids();
	});
}(jQuery))