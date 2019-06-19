<?php
/**
* The Template for display comments.
*
* @package WordPress
* @subpackage Oslo
* @since Oslo 1.0
*/
?>
<div id="thmlvComments"  class="row container">
	<h1><?php printf( _n('%1$s Comment', '%1$s Comments', get_comments_number(), 'oslo'), number_format_i18n(get_comments_number())); ?></h1>
	<?php if(post_password_required()) { ?>
		<p class="nopassword"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'oslo'); ?></p>
</div>
<?php
	return;
	}
if(have_comments()) {
?>
<ol class="thmlvCommentList">
	<?php wp_list_comments(array( 'callback' => 'oslo_comment')); ?>
</ol>
<?php
}
if (get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
?>
	<nav class="thmlvCommentNavigation">
    	<?php paginate_comments_links(); ?>
    </nav>
<?php
}
?>
</div>	
<?php comment_form(oslo_edit_comment_form()); ?>