<?php
/**
* The Template for pages.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();
echo oslo_switch_header();
?>
<div id="thmlvContent" class="container row">
	<?php esc_html_e('Sorry, the page you requested could not be found.', 'oslo') ?>
	<br />
	<a href="<?php home_url("/") ?>" title="<?php esc_html_e('Back to the Homepage','oslo') ?>"><?php esc_html_e('Back to the Homepage','oslo') ?> <i class="fa fa-angle-right"></i></a>
</div>
<?php get_footer(); ?>