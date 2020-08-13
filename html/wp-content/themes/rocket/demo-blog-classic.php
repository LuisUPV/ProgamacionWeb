<?php
/*
Template Name: Demo - Blog Classic
*/

get_header();

$rocket_data       = get_option('rocket_data');
$page_layout       = get_post_meta( $post->ID, 'rocket_sidebar', true );
$page_title        = get_post_meta( $post->ID, 'rocket_title', true );
$page_title_dots   = $rocket_data['rocket__opt-page-title-breadcrumbs-dots'];
$page_title_layout = $rocket_data['rocket__opt-page-title-breadcrumbs-position'];
$breadcrumbs_type  = $rocket_data['rocket__opt-breadcrumbs-type'];
$page_title_over   = $rocket_data['rocket__opt-page-title-overflow'];

$blog_sidebar = $rocket_data['rocket__opt-blog-sidebar'];
$sidebar_width = $rocket_data['rocket__opt-blog-sidebar-width'];

if ($sidebar_width == 2) {
	$sidebar_width = '4'; // col-md-4
	$content_width = '8'; // col-md-8
} else {
	$sidebar_width = '3'; // col-md-3
	$content_width = '9'; // col-md-9
}

// Right Sidebar by default
$page_layout_content = 'col-md-' . $content_width;
$page_layout_sidebar = 'col-md-' . $sidebar_width;

if ( $page_layout == 'none' ) {
	// Full width Layout
	$page_layout_content = 'col-md-12';
} elseif ( $page_layout == 'left' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-' . $content_width . ' col-md-push-' . $sidebar_width;
	$page_layout_sidebar = 'col-md-' . $sidebar_width . ' col-md-pull-' . $content_width;
}

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
} ?>


<!-- Page Title -->
<header class="page-title section-title-wrapper section-title-wrapper__no-bottom-margin <?php echo esc_attr( $page_title_layout ); ?> <?php echo esc_attr( $page_title_preset ); ?> <?php echo esc_attr( $page_title_over ); ?>">
	<div class="section-title-inner">
		<div class="container">
			<div class="section-title-decoration">
				<div class="row">
					<div class="<?php echo esc_attr( $page_title_wrapper_class ); ?>">
						<h1 class="section-title section-title__lg">
							<?php if ( $rocket_data['rocket__opt-blog-title'] == '') {
								esc_html_e( 'Blog', 'rocket' );
							} else {
								echo esc_html( $rocket_data['rocket__opt-blog-title'] );
							} ?>
						</h1>
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

<?php if ( $rocket_data['rocket__opt-page-title-position'] == 2 ) : ?>
</div><!-- .top-wrapper -->
<?php endif; ?>

<div class="page-section">
	<div class="container">
		<div class="row">

			<!-- Posts Feed -->
			<main id="primary" class="site-main <?php echo esc_attr( $page_layout_content ); ?>">

			<?php // Loop
			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query("post_type=post&paged=".$paged); ?>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php rocket_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main>
			<!-- Posts Feed / End -->

			<?php if ( $page_layout != 'none' ) : ?>
			<!-- Sidebar -->
			<aside id="secondary" class="sidebar <?php echo esc_attr( $page_layout_sidebar ); ?>">
				<?php dynamic_sidebar('rocket-sidebar'); ?>
			</aside>
			<!-- Sidebar / End -->
			<?php endif; ?>

		</div>
	</div>
</div>
<?php get_footer(); ?>
