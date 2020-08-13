<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$position        = get_post_meta($post->ID, 'rocket_position', true);
$description     = get_post_meta($post->ID, 'rocket_excerpt', true);
$email           = get_post_meta($post->ID, 'rocket_email', true);
$facebook        = get_post_meta($post->ID, 'rocket_facebook', true);
$twitter         = get_post_meta($post->ID, 'rocket_twitter', true);
$linkedin        = get_post_meta($post->ID, 'rocket_linkedin', true);
$gplus           = get_post_meta($post->ID, 'rocket_gplus', true);
?>

<div class="person-info-classic">
	<?php if(has_post_thumbnail()) { ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'rocket_portfolio-thumbnail-n' );
		$url = $thumb['0']; ?>

		<div class="person-info-thumb-classic" style="background-image:url(<?php echo $url;?>);">
			<a href="<?php the_permalink(); ?>" class="person-info-link-classic"></a>
		</div>
	<?php } else { ?>
		<div class="person-info-thumb-classic" style="background-image:url(<?php echo get_template_directory_uri() . '/images/placeholder-264x314.jpg'?>);">
			<a href="<?php the_permalink(); ?>" class="person-info-link-classic"></a>
		</div>
	<?php } ?>
	<div class="person-info-content-classic">
		<h5 class="person-info-title-classic title-bordered border__dashed"><?php the_title(); ?></h5>
		<?php echo esc_html( $description ); ?>
	</div>
	<footer class="person-info-footer-classic">
		<ul class="social-icons social-icons__rounded social-icons__outline text-center">
			<?php if ( $facebook ) : ?>
			<li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>

			<?php if ( $linkedin ) : ?>
			<li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>

			<?php if ( $twitter ) : ?>
			<li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>

			<?php if ( $gplus ) : ?>
			<li><a href="<?php echo esc_url( $gplus ); ?>"><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>
		</ul>
	</footer>
</div>
