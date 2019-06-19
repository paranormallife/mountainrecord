<?php
/**
* The Template for loop blog.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('thmlvClassicPost'); ?>>
	<?php if(has_post_thumbnail()) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail('oslo-blogClassic'); ?>
	</a>	
	<?php } ?>
	<div class="container row">
		<?php
		echo oslo_switch_post_title($post->ID, TRUE);
		?>
		<span class="thmlvClear"></span>
		<?php
		global $more;
		$more = 0;
		the_content('');
		echo '<a href="'.get_permalink().'" class="more-link">Read more</a>';
		?>
	</div>
</article>