<?php
/**
* The Template for loop portfolio.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('thmlvSelected'); ?>>
	<?php
	echo oslo_video_featured($post->ID);
	?>
</article>