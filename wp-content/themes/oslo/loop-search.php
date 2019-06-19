<?php
/**
* The Template for loop search.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('thmlvTypeSearch'); ?>>
	<div class="container row">
		<?php echo oslo_switch_loop_title($post->ID, TRUE); ?>
	</div>
</article>