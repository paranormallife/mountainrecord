=== Gallery Slideshow ===
Contributors: jethin
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QWXNS8XBHTDCE
Tags: slideshow, gallery
Requires at least: 3.0
Tested up to: 4.8.1
Stable tag: 1.4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Turn any WordPress gallery into a simple, robust, lightweight and fluid slideshow.

== Description ==

This plugin allows authors to turn a [WordPress gallery](http://codex.wordpress.org/User:Esmi/The_WordPress_Gallery) into a slideshow.

To activate slideshow mode set the "GSS Slideshow" option to "Yes" when editing a gallery in the WordPress Media Manager. Alternatively you can manually add the "gss" attribute to a Wordpress gallery shortcode:

`[gallery gss="1" ids="1,2,3"]`

[See here](http://s89693915.onlinehome.us/wp/?page_id=4) to view an example slideshow.

The plugin supports six optional shortcode attributes:

`[gallery gss="1" ids="1,2,3" size="full" link="none" options="timeout=4000" name="myslideshow" style="width:50%" carousel="fx=carousel"]`

*size*: The size of the slideshow images (included in "Gallery Settings").

*link*: The default link for slideshow images (included in "Gallery Settings"). Custom links can be set via the "GSS Link" metadata on individual images.

*options*: This attribute can be used to override default slideshow options or set custom options. Attribute value uses query string format, e.g.: 'option1=value1&option2=value2' etc. Option names are in standard Cycle2 format *without 'data-cycle-' prefix*. [See the Cycle2 website](http://jquery.malsup.com/cycle2/api/#options) for documentation and supported options.

*name*: Use this attribute to give slideshow(s) unique ids (applied to container `<div>`). Give each slideshow a unique name / id when displaying multiple slideshows on a single page.

*style*: Inline CSS styles applied to the slideshow container. Outputted string is prefaced with "style=" and must contain standard "property:value;" syntax.

*carousel*: Set 'fx=carousel' value in this attribute to include a carousel pager navigation (thumbnails) in a slideshow. See the [Cycle2 Carousel](http://jquery.malsup.com/cycle2/demo/carousel.php) for documentation and supported options. Carousel options follow the same string format as the options attribute above.

**Support**

Plugin author is no longer able to respond to new threads in the "Support" forum. Plugin users are encouraged to provide support to others.

**Notes**

Slideshows perform best if images are sized to desired slideshow width / container.

Slideshow captions are taken from each image's "Caption" field. Upload and use unique versions of any images that are reused elsewhere on your site with different captions.

Slideshow widths should automatically adjust to the smaller of: 1) the width of the largest image in the slideshow or 2) the width of its container.

Default Display: Height / width of slideshow image area is set by the first image; images appear at full size or are scaled down to fit container; smaller images are horizontally centered; images are bottom aligned to caption area; some white space may appear at the top of slideshows that contain both horizontally and vertically aligned images.

Default CSS ids begin with "gss_", classes with "cycle-". Default slideshow id is "gslideshow". Default CSS styles were created using the Twenty Thirteen theme -- some CSS customization may be necessary for other themes.

In addition to the options attribute mentioned above, slideshows can be customized by placing a "gss-custom.js" file inside the Gallery Slideshow plugin directory. An example "gss-custom.js"  can be found in the /assets/ directory.

This plugin uses [jQuery Cycle2](http://jquery.malsup.com/cycle2/). Cycle2 may conflict with previous versions of Cycle if used on the same page.

**Embed Slideshow (Experimental; requires version 1.3+)**

To embed a slideshow on another site:

1. Move the 'embed.js' and 'embed.php' files out of the plugin's /assets/ directory and into the main /gallery-slideshow/ directory.

1. While editing a post/page with a slideshow, locate the slideshow's embed key in the "Custom Fields" meta box . (If the embed key isn't shown make sure the [gss ...] shortcode exists in the visual editor and update the page/post.)

1. Replace the all caps text below with 1) your site's URL/domain name and 2) the embed key to produce the embed code:

`<script src="YOUR_SITES_DOMAIN/wp-content/plugins/gallery-slideshow/embed.js" data-embed="GSS_EMBED_KEY" type="text/javascript"></script><div id="gss-embed"></div>`

*'data-target' attribute (optional)*: Add this attribute to the embed code to target a specific div by id (use unique ids if multiple slideshows are embedded on a page):

`<script src="YOUR_SITES_DOMAIN/wp-content/plugins/gallery-slideshow/embed.js" data-embed="GSS_EMBED_KEY" data-target="UNIQUE_TARGET_NAME" type="text/javascript"></script><div id="UNIQUE_TARGET_NAME"></div>`

== Installation ==

1. Download and unzip the plugin file.
1. Upload the unzipped 'gallery-slideshow' directory to your '/wp-content/plugins/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Screenshots ==

1. The WordPress Media Manager in "Edit Gallery" mode; GSS related options are outlined in red. The "Link To" option applies to all images; "Caption" and "GSS Link" are specific to individual images.
2. A screen capture of a basic GSS slideshow.
3. An "Edit Page" admin screen showing the WP editor in text mode and a sample GSS shortcode.

== Changelog ==

= 1.4.1 =
* Added resume/pause button.

= 1.4 =
* "Gallery Settings" image size and link parameters now active. "GSS Link" custom metadata variable added to image attachments. 

= 1.3.2 =
* Added “GSS Slideshow” activation option for native WordPress gallery support; improved script enqueueing; updated plugin documentation.

= 1.3.1 =
* Fixed header bug from version 1.3 uploaded to WordPress.

= 1.3 =
* Added carousel pager (thumbnails) and embed functionalities.

= 1.2 =
* Added 'options' shortcode attribute for customized slideshows; default display changes (css); more robust Javascript functions including recentering of images after window load.

= 1.1 =
* Loads 'gss-custom.js' -- which can be used to alter default slideshow options -- if it is present in the /gallery-slideshow/ plugin directory. Sample 'gss-custom.js' file included inside /assets/ directory.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.4.1 =
* "Gallery Settings" image size and link parameters now active; "GSS Link" custom metadata variable added to image attachments; resume/pause button navigation. 

= 1.3.2 =
* Added “GSS Slideshow” activation option for native WordPress gallery support and improved script enqueueing.

= 1.3.1 =
Fixed header bug from version 1.3 uploaded to WordPress.

= 1.3 =
Plugin now supports carousel pager (thumbnails) navigation and embed functionality (experimental).

= 1.2 =
Plugin now supports 'options' shortcode attribute for customizing slideshows; default display and functionality improved.

= 1.1 =
Plugin now supports custom options via inclusions of optional 'gas-custom.js' file.