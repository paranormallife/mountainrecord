<?php
/**
* Homepage template.
*
* @package WordPress
* @subpackage Sample
* @since Sample 1.0
*/
get_header();

echo oslo_child_switch_header();

echo '<div class="zen-icons desktop"><img src="' . get_stylesheet_directory_uri() . '/assets/zen-icons_desktop.jpg" /></div>';
echo '<div class="zen-icons mobile"><img src="' . get_stylesheet_directory_uri() . '/assets/zen-icons_mobile.jpg" /></div>';

echo '<div class="container row post-tiles-container">';
dynamic_sidebar( 'homepage-post-tiles' );
echo '</div>';

echo '<div class="calligraphy"><img src="' . get_stylesheet_directory_uri() . '/assets/calligraphy.jpg" /></div>';

echo '<div class="homepage-posts-container">';
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
            echo '<article class="homepage">';
                $thumbnail = get_the_post_thumbnail_url( $post->ID, 'large' );
                echo '<div class="column image" style="background-image: url(\'' . $thumbnail . '\')">';
                    echo '<a href="' . get_the_permalink() . '">';
                        echo '<img src="' . $thumbnail . '" />';
                    echo '</a>';
                echo '</div>';
                echo '<div class="column content">';
                    echo '<a href="' . get_the_permalink() . '"><h3>';
                        the_title();
                    echo '</a></h3>';
                    echo '<div class="timestamp">' . get_the_time( 'F j, Y', $post->ID ) . '</div>';
                    echo '<div class="excerpt">';
                        the_excerpt();
                    echo '</div>';
                    echo '<a href="' . get_the_permalink() . '" class="read-more">Read More &raquo;</a>';
                echo '</div>';
            echo '</article>';
	} // end while
} // end if
the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( '&laquo; Previous Page', 'textdomain' ),
	'next_text' => __( 'Next Page &raquo;', 'textdomain' ),
) );
echo '</div>';
echo '<div class="tag-cloud">';
$cloud = array(
	'smallest'                  => 12, 
	'largest'                   => 18,
	'unit'                      => 'px'
); 
echo '<h2>More Topics</h2>';
wp_tag_cloud( $cloud );
echo '</div>';

get_footer();
?>