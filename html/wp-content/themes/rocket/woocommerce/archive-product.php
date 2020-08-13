<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

	$rocket_data       = get_option('rocket_data');
	$shop_id           = get_option( 'woocommerce_shop_page_id' );
	$page_layout       = get_post_meta( $shop_id, 'rocket_sidebar', true );
	$page_title        = get_post_meta( $shop_id, 'rocket_title', true );
	$page_title_dots   = $rocket_data['rocket__opt-page-title-breadcrumbs-dots'];
	$page_title_layout = $rocket_data['rocket__opt-page-title-breadcrumbs-position'];
	$breadcrumbs_type  = $rocket_data['rocket__opt-breadcrumbs-type'];
	$page_title_over   = $rocket_data['rocket__opt-page-title-overflow'];

	$shop_page       = $rocket_data['rocket__opt-shop-page'];
	$shop_label      = $rocket_data['rocket__opt-shop-breadcrumbs-name'];

	// Page Title & Breadcrumbs position
	if ( $page_title_layout == 2 ) {
		$page_title_layout = 'page-title-layout__left-right';
		$page_title_wrapper_class = 'col-md-6';
		$breadcrumbs_wrapper_class = 'col-md-6';
	} elseif ( $page_title_layout == 3 ) {
		$page_title_layout = 'page-title-layout__right-left';
		$page_title_wrapper_class = 'col-md-6 col-md-push-6';
		$breadcrumbs_wrapper_class = 'col-md-6 col-md-pull-6';
	} else {
		$page_title_layout = 'page-title-layout__both-centered';
		$page_title_wrapper_class = 'col-md-12';
		$breadcrumbs_wrapper_class = 'col-md-12';
	}

	// Page Title Presets
	if ( isset( $rocket_data['rocket__opt-page-title-preset'] ) ) {
		$page_title_preset = $rocket_data['rocket__opt-page-title-preset'];
	} else {
		$page_title_preset = 'page_title_preset_1';
	}

	// Right Sidebar by default
	$page_layout_content = 'col-md-9';
	$page_layout_sidebar = 'col-md-3';

	if ( $page_layout == 'none' ) {
		// Full width Layout
		$page_layout_content = 'col-md-12';
	} elseif ( $page_layout == 'left' ) {
		// Left Sidebar Layout
		$page_layout_content = 'col-md-9 col-md-push-3';
		$page_layout_sidebar = 'col-md-3 col-md-pull-9';
	}

	// Breadcrumbs Type
	if ( $breadcrumbs_type == '2' ) {
		$breadcrumbs_type = 'breadcrumbs-bordered';
	} else {
		$breadcrumbs_type = 'breadcrumbs-default';
	}

	// Page Title Overflow
	if ( $page_title_over == '1' ) {
		$page_title_over = 'page-title_overflow';
	} else {
		$page_title_over = 'page-title_no-overflow';
	}

	/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
	do_action( 'woocommerce_before_main_content' );
	?>

	<?php if ( $page_title != 'no' ) { ?>
	<!-- Page Title -->
	<header class="page-title section-title-wrapper section-title-wrapper__no-bottom-margin <?php echo esc_attr( $page_title_layout ); ?> <?php echo esc_attr( $page_title_preset ); ?> <?php echo esc_attr( $page_title_over ); ?>">
		<div class="section-title-inner">
			<div class="container">
				<div class="section-title-decoration">
					<div class="row">
						<div class="<?php echo esc_attr( $page_title_wrapper_class ); ?>">
							<h1 class="section-title section-title__lg">
							<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) {
								woocommerce_page_title();
							} else {
								the_title();
							} ?></h1>
						</div>
						<?php if ($rocket_data['rocket__opt-page-title-breadcrumbs'] == 1) { ?>
							<div class="<?php echo esc_attr( $breadcrumbs_wrapper_class ); ?> <?php echo esc_attr( $breadcrumbs_type ); ?>">
								<?php if ( function_exists('dimox_breadcrumbs') ) :
									// Breadcrumbs
									dimox_breadcrumbs();
								endif; ?>
							</div>
						<?php } ?>
					</div>

					<?php if ( $page_title_dots == 1 ) { ?>
						<span class="section-title-dots">
							<span class="dot1"></span>
							<span class="dot2"></span>
							<span class="dot3"></span>
						</span>
					<?php } ?>

				</div>
			</div>
			<div class="section-title-overlay"></div>
		</div>
	</header>
	<!-- Page Title / End -->
	<?php } ?>

	<?php if ( $rocket_data['rocket__opt-page-title-position'] == 2 ) : ?>
	</div><!-- .top-wrapper -->
	<?php endif; ?>

	<div class="page-section">
		<div class="container">
			<div class="row">
				<main id="primary" class="site-main <?php echo esc_attr( $page_layout_content ); ?>">
					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>

					<?php
					if ( have_posts() ) :
						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );

					elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

						wc_get_template( 'loop/no-products-found.php' );

					endif;
					?>

				</main>

				<?php
					/**
					 * woocommerce_sidebar hook
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>

				<?php if ( $page_layout != 'none' ) : ?>
				<!-- Sidebar -->
				<aside id="secondary" class="sidebar <?php echo esc_attr( $page_layout_sidebar ); ?>">
					<?php dynamic_sidebar('rocket-shop-sidebar'); ?>
				</aside>
				<!-- Sidebar / End -->
				<?php endif; ?>

			</div>
		</div>
	</div>

	<?php
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>


<?php get_footer( 'shop' ); ?>
