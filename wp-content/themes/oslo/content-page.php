<?php
/**
* The Template for display page content.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
?>
<div id="thmlvContent" class="container row">
	<?php
	the_content();
	?>
	<div class="thmlvClear"></div>
	<?php
		wp_link_pages();
	?>
</div>
<?php
if(comments_open() || get_comments_number() != 0) { ?>
	<div id="thmlvCommentsWrap">
		<?php comments_template(); ?>
	</div>
<?php
}
?>