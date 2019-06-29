<?php
/**
* The Template for display footer.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
if(!is_page_template('thmlv-page-no-footer.php')) {
?>
	<div class="sublogo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mr-sublogo.png" />
	</div>
	<footer id="thmlvFooter" class="<?php oslo_footer_layout(); ?>">
		<div class="container row gutters">
			<?php
			oslo_footer_widgets();
			?>
		</div>
		<div class="container row">
			<div class="span_6 col">
				<?php
				echo '<span id="thmlvCopyright">'.oslo_copyright().'</span>';
				echo oslo_social_link();
				?>
			</div>
			<div class="span_6 col">
				<a href="#" id="thmlvToTop"><?php esc_html_e('Back to top', 'oslo'); ?></a>
			</div>
		</div>
	</footer>
	<?php oslo_share_links() ?>
<?php
}
wp_footer();
?>

</body>
</html>