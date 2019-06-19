<div class="thmlv-widget-type-portfolio">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thmlvWidget'); ?></a>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_title('<h1>', '</h1>'); ?>
	</a>
	<?php
		switch (get_post_format()) {
			case 'video':
	?>
			<i class="fa fa-video-camera"></i>
	<?php
			break;
			case 'quote':
	?>
			<i class="fa fa-quote-right"></i>
	<?php
			break;
			case 'gallery':
	?>
			<i class="fa fa-camera"></i>
	<?php
			break;
			case 'link':
	?>
			<i class="fa fa-chain"></i>
	<?php
			break;
			default:
	?>
			<i class="fa fa-bookmark"></i>
	<?php
		}
	?>
</div>