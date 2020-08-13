<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$url = get_post_meta($post->ID, 'rocket_partner_url', true);
?>
<a href="<?php echo esc_url($url); ?>" class="partner-link" target="_blank">
	<?php if(has_post_thumbnail()) { ?>
		<?php the_post_thumbnail( 'full'); ?>
	<?php } else { ?>
		<img src="<?php echo get_stylesheet_directory_uri() . '/images/placeholder-170x170.jpg'?>" alt="">
	<?php } ?>
	<span class="partner-name"><i class="fa fa-rotate-90 fa-level-up"></i> <?php the_title(); ?></span>
</a>
