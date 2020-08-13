<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Rocket
 */

get_header(); ?>

	<?php $rocket_data = get_option('rocket_data');

	// Social Links
	$social_404_media_toggle = $rocket_data['rocket__opt-404-social']; ?>

	<div class="container">

		<div class="page-404-main">
			<div class="row">
				<div class="col-md-7">
					<span class="page-404-num">404</span>
					<?php if ( $rocket_data['rocket__opt-404-page-title-txt'] ) {
						echo '<span class="page-404-notice">' . esc_html( $rocket_data['rocket__opt-404-page-title-txt'] ) . '</span>';
					} ?>

					<?php if ( $rocket_data['rocket__opt-404-btn'] == 1 ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-has-icon btn-page-404"><i class="fa fa-home"></i> <?php echo esc_html($rocket_data['rocket__opt-404-btn-txt']); ?></a>
					<?php endif; ?>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<!-- 404 Logo -->
					<header class="page-404-header">
						<?php if($rocket_data['rocket__opt-404-logo']['url'] !== "") { ?>

							<!-- Logo Image -->
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $rocket_data['rocket__opt-404-logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" title="<?php echo esc_attr( get_bloginfo('description') ); ?>" />
							</a>

						<?php } else { ?>

							<!-- Logo Text -->
							<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>

						<?php } ?>
					</header>
					<!-- 404 Logo / End -->

					<div class="page-404-desc">
						<?php echo esc_html( $rocket_data['rocket__opt-404-desc'] ); ?>
					</div>

					<footer class="page-404-footer">

						<?php // Social Title
						if ( $rocket_data['rocket__opt-404-social-title-txt'] && $social_404_media_toggle == 1 ) {
							echo '<span class="page-404-footer-label">' . esc_html( $rocket_data['rocket__opt-404-social-title-txt'] ) . '</span>';
						} ?>

						<?php

						$social_404_media = $rocket_data['rocket__opt-social-media'];

						if ($social_404_media_toggle == 1):

							echo '<ul class="page-404-social list-inline">';

							foreach (array_filter($social_404_media) as $key=>$value) {

								switch($key) {

									case 'Facebook URL':
										echo '<li><a href="' . esc_url( $social_404_media['Facebook URL'] ) . '" title="Facebook"><i class="fa fa-facebook"></i></a></li>';
									break;

									case 'Twitter URL':
										echo '<li><a href="' . esc_url( $social_404_media['Twitter URL'] ) . '" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
									break;

									case 'LinkedIn URL':
										echo '<li><a href="' . esc_url( $social_404_media['LinkedIn URL'] ) . '" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>';
									break;

									case 'Google+ URL':
										echo '<li><a href="' . esc_url( $social_404_media['Google+ URL'] ) . '" title="Google+"><i class="fa fa-google-plus"></i></a></li>';
									break;

									case 'Instagram URL':
										echo '<li><a href="' . esc_url( $social_404_media['Instagram URL'] ) . '" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
									break;

									case 'Github URL':
										echo '<li><a href="' . esc_url( $social_404_media['Github URL'] ) . '" title="Github"><i class="fa fa-github"></i></a></li>';
									break;

									case 'VK URL':
										echo '<li><a href="' . esc_url( $social_404_media['VK URL'] ) . '" title="VKontakte"><i class="fa fa-vk"></i></a></li>';
									break;

									case 'YouTube URL':
										echo '<li><a href="' . esc_url( $social_404_media['YouTube URL'] ) . '" title="YouTube"><i class="fa fa-youtube"></i></a></li>';
									break;

									case 'Pinterest URL':
										echo '<li><a href="' . esc_url( $social_404_media['Pinterest URL'] ) . '" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>';
									break;

									case 'Tumblr URL':
										echo '<li><a href="' . esc_url( $social_404_media['Tumblr URL'] ) . '" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>';
									break;

									case 'Dribbble URL':
										echo '<li><a href="' . esc_url( $social_404_media['Dribbble URL'] ) . '" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>';
									break;

									case 'Vimeo URL':
										echo '<li><a href="' . esc_url( $social_404_media['Vimeo URL'] ) . '" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>';
									break;

									case 'Flickr URL':
										echo '<li><a href="' . esc_url( $social_404_media['Flickr URL'] ) . '" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
									break;

									case 'Yelp URL':
										echo '<li><a href="' . esc_url( $social_404_media['Yelp URL'] ) . '" title="Yelp"><i class="fa fa-yelp"></i></a></li>';
									break;

						    }

							}

							echo '</ul>';
						endif; ?>

					</footer>
				</div>
			</div>
		</div>

		<?php if( $rocket_data['rocket__opt-404-image']['url'] !== "" ) : ?>
		<div class="page-404-rocket">
			<img src="<?php echo esc_attr($rocket_data['rocket__opt-404-image']['url']); ?>" alt="<?php bloginfo('name'); ?>">
		</div>
		<?php endif; ?>

		<?php if ( $rocket_data['rocket__opt-404-social'] == 1 ) : ?>
		<div class="row">
			<div class="col-md-7 col-md-offset-5">

			</div>
		</div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
