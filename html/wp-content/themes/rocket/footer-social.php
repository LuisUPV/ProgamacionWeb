<?php
/**
 * The template for displaying the blank footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rocket
 */

?>

	<?php
	$rocket_data = get_option('rocket_data');
	$footer_display = 'yes';

	// Check Page option to show/hide Footer
	if ( is_page() || is_single() ) {
		$footer_display = get_post_meta( $post->ID, 'rocket_footer', true );
	} ?>

	<?php if ( $footer_display != 'no' ) : ?>
	<div class="container">
		<footer class="page-coming-soon-footer">
			<?php
				// Footer Social Links
				$social_media_toggle = 1;
				if ( is_page_template('template-under-construction.php') ) {
					$social_media_toggle = $rocket_data['rocket__opt-social-in-footer-under-construction'];
				} elseif ( is_page_template('template-coming-soon.php') ) {
					$social_media_toggle = $rocket_data['rocket__opt-social-in-footer-coming-soon'];
				}

				$social_media = $rocket_data['rocket__opt-social-media'];
				$social_media_style = $rocket_data['rocket__opt-social-media-style'];

				if ( $social_media_style == 'rounded' ) {
					$social_media_style = 'footer-social-links__rounded';
				} else {
					$social_media_style = 'footer-social-links__squared';
				}

				if ($social_media_toggle == 1):

					echo '<ul class="footer-social-links '. esc_attr( $social_media_style ) .' list-inline text-center">';

					foreach (array_filter($social_media) as $key=>$value) {

					switch($key) {

						case esc_html__( 'Facebook URL', 'rocket') :
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Facebook URL', 'rocket') ] ) . '" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>';
						break;

						case esc_html__( 'Twitter URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Twitter URL', 'rocket') ] ) . '" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>';
						break;

						case esc_html__( 'LinkedIn URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'LinkedIn URL', 'rocket') ] ) . '" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
						break;

						case esc_html__( 'Google+ URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Google+ URL', 'rocket') ] ) . '" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
						break;

						case esc_html__( 'Instagram URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Instagram URL', 'rocket') ] ) . '" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>';
						break;

						case esc_html__( 'Github URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Github URL', 'rocket') ] ) . '" title="Github" target="_blank"><i class="fa fa-github"></i></a></li>';
						break;

						case esc_html__( 'VK URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'VK URL', 'rocket') ] ) . '" title="VKontakte" target="_blank"><i class="fa fa-vk"></i></a></li>';
						break;

						case esc_html__( 'YouTube URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'YouTube URL', 'rocket') ] ) . '" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a></li>';
						break;

						case esc_html__( 'Pinterest URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Pinterest URL', 'rocket') ] ) . '" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
						break;

						case esc_html__( 'Tumblr URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Tumblr URL', 'rocket') ] ) . '" title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
						break;

						case esc_html__( 'Dribbble URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Dribbble URL', 'rocket') ] ) . '" title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
						break;

						case esc_html__( 'Vimeo URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Vimeo URL', 'rocket') ] ) . '" title="Vimeo" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
						break;

						case esc_html__( 'Flickr URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Flickr URL', 'rocket') ] ) . '" title="Flickr" target="_blank"><i class="fa fa-flickr"></i></a></li>';
						break;

						case esc_html__( 'Yelp URL', 'rocket'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Yelp URL', 'rocket') ] ) . '" title="Yelp" target="_blank"><i class="fa fa-yelp"></i></a></li>';
						break;

			    }

				}

				echo '</ul>';
			endif; ?>
		</footer>
	</div>
	<?php endif; ?>

</div><!-- .page-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
