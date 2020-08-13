<?php
/**
 * The header for the theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rocket
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
$rocket_data    = get_option('rocket_data');
$header_display = 'yes';

// Check individual Page/Post option to show/hide Header
if ( is_page() || is_single() ) {
	$header_display = get_post_meta( $post->ID, 'rocket_header', true );
} ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('rocket_before_body_content'); ?>

	<div class="page-wrapper">

		<?php if ( ! is_404() && $header_display != 'no' ) : ?>
		<div class="top-wrapper" id="top">

			<?php get_template_part('template-parts/header-top-bar'); ?>

			<!-- Header -->
			<div class="header-wrapper">

				<header class="header header__fixed" id="header">
					<div class="header-main">
						<div class="container">

							<!-- Navigation Bar -->
							<nav class="navbar navbar-default">

								<div class="navbar-header">

									<?php get_template_part( 'template-parts/header', 'logo' ); ?>

								</div><!-- .navbar-header -->

								<div id="main-nav" class="navbar-holder">

									<?php if ( !class_exists('Mega_Menu')) { ?>
									<button type="button" class="navbar-toggle">
										<span class="fa fa-bars"></span>
									</button>
									<?php } ?>

									<?php wp_nav_menu( array(
										'theme_location'  => 'primary',
										'container'       => 'div',
										'menu_class'      => 'nav navbar-nav',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0
									) ); ?>
								</div><!-- .#main-nav -->

								<?php // Search Form
								if($rocket_data['rocket_opt-header-search-form'] == 1) {
									get_template_part('template-parts/searchform-header');
								} ?>

								<?php // Cart
								if ( class_exists( 'WooCommerce' ) && $rocket_data['rocket_opt-header-cart'] == 1 ) { ?>

									<div class="header-cart">
										<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'rocket' ); ?>">

										<span class="cart-total visible-md-inline-block visible-lg-inline-block"><?php echo WC()->cart->get_cart_total(); ?></span>
										<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
										<span class="cart-number visible-md-inline-block visible-lg-inline-block"><?php echo sprintf('%d', WC()->cart->cart_contents_count, WC()->cart->cart_contents_count ); ?></span>

										</a>
										<div class="header-cart-dropdown">
											<div class="widget_shopping_cart_content"></div>
										</div>
									</div>
								<?php } ?>

							</nav>
							<!-- Navigation Bar / End -->

						</div><!-- .container -->
					</div><!-- .header-main -->
				</header>
			</div>
			<!-- Header / End -->


			<?php if( ! is_search() ) { // search page excluded
				global $post;
				$slider           = get_post_meta($post->ID, 'rocket_slider_type', true);
				$revslider_select = get_post_meta($post->ID, 'rocket_slider', true);

				// Slider
				if( $slider == 'revslider' && function_exists('putRevSlider') ) { ?>

					<?php
					if ( empty( $revslider_select ) || $revslider_select == '' ) { ?>

						<div class="container">
							<div class="alert alert-warning alert-no-slider"><?php echo wp_kses_post( __('You have not chosen any slider in <strong>Page > Page Options > Select Revolution Slider</strong>. To create slider go to <strong>Slider Revolution > New Slider</strong> or if you want to import predefined <strong>Slider Revolution > Import Slider</strong>.', 'rocket') ); ?></div>
						</div>

					<?php } else { ?>
						<div class="tp-banner-holder container">
							<div class="tp-banner-container">
								<div class="tp-banner">
									<?php	echo do_shortcode('[rev_slider alias="' . $revslider_select . '"]') ?>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php }
			} ?>

			<?php get_template_part('template-parts/header-separators'); ?>

		<?php if ( $rocket_data['rocket__opt-page-title-position'] != 2 ) : ?>
		</div><!-- .top-wrapper -->
		<?php endif; ?>

		<?php endif; ?>
