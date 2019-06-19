<?php
/**
* The Template for loop blog list.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('thmlvListPost'); ?>>
	<div class="container row">
		<?php
		echo oslo_switch_post_title($post->ID, TRUE);
		?>
		<span class="thmlvClear"></span>
	</div>
</article>