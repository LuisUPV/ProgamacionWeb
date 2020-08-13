<?php
/**
 * Template part for displaying Partners Single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$rocket_data = get_option('rocket_data');
$post_thumb  = $rocket_data['rocket__opt-single-post-thumb'];

if ( has_post_thumbnail() && $post_thumb == 1 ) {
	$post_thumb_class = 'has-post-thumbnail';
} else {
	$post_thumb_class = 'no-post-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_thumb_class ); ?>>

	<?php if( has_post_thumbnail() && $post_thumb == 1 ) { ?>
	<figure class="entry-thumbnail">
		<?php the_post_thumbnail('rocket_post-thumbnail-lg'); ?>
	</figure>
	<?php } ?>
	
</article><!-- #post-## -->
