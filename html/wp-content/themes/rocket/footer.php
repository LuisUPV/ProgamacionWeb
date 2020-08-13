<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rocket
 */

?>

	<?php
	$rocket_data                 = get_option('rocket_data');
	$footer_display              = 'yes';
	$footer_widgets_display_page = 'default';
	$footer_widgets_display      = $rocket_data['rocket__opt-footer-widgets'];

	// Check individual Page/Post option to show/hide Footer
	if ( is_page() || is_single() ) {
		$footer_display              = get_post_meta( $post->ID, 'rocket_footer', true );
		$footer_widgets_display_page = get_post_meta( $post->ID, 'rocket_footer_widgets', true );
	} ?>

	<?php if ( ! is_404() && $footer_display != 'no' ) : ?>
	<!-- Footer -->
	<footer class="footer page-section" id="footer">

		<?php get_template_part('template-parts/footer-separators'); ?>

		<div class="container">
			<div class="footer-inner">

				<?php if ( ( $footer_widgets_display == 1 && $footer_widgets_display_page != 'no' ) ||  $footer_widgets_display_page == 'yes' ) :

					$footer_widgets_layout = $rocket_data['rocket__opt-footer-widgets-layout'];
					$footer_widget_1 = '';
					$footer_widget_2 = '';
					$footer_widget_3 = '';
					$footer_widget_4 = '';

					switch ($footer_widgets_layout) {
						case '1':
							$footer_widget_1 = 'col-sm-6 col-md-3';
							$footer_widget_2 = 'col-sm-6 col-md-3';
							$footer_widget_3 = 'col-sm-6 col-md-3';
							$footer_widget_4 = 'col-sm-6 col-md-3';
							break;
						case '2':
							$footer_widget_1 = 'col-sm-6 col-md-2';
							$footer_widget_2 = 'col-sm-6 col-md-2';
							$footer_widget_3 = 'col-sm-6 col-md-4';
							$footer_widget_4 = 'col-sm-6 col-md-4';
							break;
						case '3':
							$footer_widget_1 = 'col-sm-4 col-md-6';
							$footer_widget_2 = 'col-sm-4 col-md-3';
							$footer_widget_3 = 'col-sm-4 col-md-3';
							break;
						case '4':
							$footer_widget_1 = 'col-sm-4 col-md-3';
							$footer_widget_2 = 'col-sm-4 col-md-3';
							$footer_widget_3 = 'col-sm-4 col-md-6';
							break;
						case '5':
							$footer_widget_1 = 'col-sm-4 col-md-4';
							$footer_widget_2 = 'col-sm-4 col-md-4';
							$footer_widget_3 = 'col-sm-4 col-md-4';
							break;
						case '6':
							$footer_widget_1 = 'col-sm-4 col-md-4';
							$footer_widget_2 = 'col-sm-8 col-md-8';
							break;
						case '7':
							$footer_widget_1 = 'col-sm-8 col-md-8';
							$footer_widget_2 = 'col-sm-4 col-md-4';
							break;
					} ?>

					<div class="footer-widgets">
						<div class="container">
							<div class="row">
								<div class="<?php echo esc_attr( $footer_widget_1 ); ?>">
									<?php dynamic_sidebar('rocket-footer-widget-1'); ?>
								</div>
								<div class="<?php echo esc_attr( $footer_widget_2 ); ?>">
									<?php dynamic_sidebar('rocket-footer-widget-2'); ?>
								</div>

								<?php if( $footer_widgets_layout == 1 || $footer_widgets_layout == 2 || $footer_widgets_layout == 3  || $footer_widgets_layout == 4  || $footer_widgets_layout == 5 ): ?>
								<div class="<?php echo esc_attr( $footer_widget_3 ); ?>">
									<?php dynamic_sidebar('rocket-footer-widget-3'); ?>
								</div>
								<?php endif; ?>

								<?php if( $footer_widgets_layout == 1 || $footer_widgets_layout == 2 ): ?>
								<div class="<?php echo esc_attr( $footer_widget_4 ); ?>">
									<?php dynamic_sidebar('rocket-footer-widget-4'); ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

				<?php endif; ?>






				<?php if ( isset( $rocket_data['rocket__opt-footer-logo'] ) ) : ?>
					<?php if ( $rocket_data['rocket__opt-footer-logo'] == 1  ) : ?>
					<!-- Logo Footer -->
					<div class="logo-footer">
						<?php if($rocket_data['rocket__opt-footer-logo-img']['url'] !== "") { ?>

							<!-- Logo Standard -->
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $rocket_data['rocket__opt-footer-logo-img']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" title="<?php echo esc_attr( get_bloginfo('description') ); ?>" />
							</a>

						<?php } else { ?>

							<!-- Logo Text Default -->
							<h2 class="logo-footer-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h2>

						<?php } ?>
					</div>
				<?php endif;
				endif; ?>
				<!-- Logo Footer / End -->

				<?php
				// Footer Social Links
				$social_media_toggle = $rocket_data['rocket__opt-social-in-footer'];
				$social_media        = $rocket_data['rocket__opt-social-media'];
				$social_media_style  = $rocket_data['rocket__opt-social-media-style'];

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

				<?php
				// Footer Text
				$footer_copyright = $rocket_data['rocket__opt-copyright'];
				?>

				<?php if ( $footer_copyright == 1) : ?>
				<div class="footer-text text-center">
					<div class="row">

						<?php
						// Depends on Footer columns number set the column width
						$footer_col_class = '';
						$footer_col_number = $rocket_data['rocket__opt-copyright-area-col'];

						if ( $footer_col_number == 1 ) {
							$footer_col_class = 'col-md-12';
						} elseif ( $footer_col_number == 2 ) {
							$footer_col_class = 'col-sm-6 col-md-6';
						} else {
							$footer_col_class = 'col-sm-4 col-md-4';
						}
						?>

						<?php // Footer Text Area 1 ?>
						<div class="<?php echo esc_attr( $footer_col_class ); ?>">
							<?php echo wp_kses_post( $rocket_data['rocket__opt-copyright-1'] ); ?>
						</div>

						<?php
						// Footer Text Area 2
						if ( $footer_col_number == 2 || $footer_col_number == 3 ) : ?>
						<div class="<?php echo esc_attr( $footer_col_class ); ?>">
							<?php echo wp_kses_post( $rocket_data['rocket__opt-copyright-2'] ); ?>
						</div>
						<?php endif; ?>

						<?php // Footer Text Area 2
						if ( $footer_col_number == 3 ) : ?>
						<div class="<?php echo esc_attr( $footer_col_class ); ?>">
							<?php echo wp_kses_post( $rocket_data['rocket__opt-copyright-3'] ); ?>
						</div>
						<?php endif; ?>

					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</footer>
	<!-- Footer / End -->
	<?php endif; ?>

</div><!-- .page-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
