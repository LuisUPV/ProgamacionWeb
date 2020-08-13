<?php
/**
 * Template Name: One page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

get_header('onepage');

$rocket_data       = get_option('rocket_data');
$page_layout       = get_post_meta( $post->ID, 'rocket_sidebar', true );
$page_title        = get_post_meta( $post->ID, 'rocket_title', true );
$page_title_over   = $rocket_data['rocket__opt-page-title-overflow'];

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

// Page Title Overflow
if ( $page_title_over == '1' ) {
	$page_title_over = 'page-title_overflow';
} else {
	$page_title_over = 'page-title_no-overflow';
}

?>

<div class="page-section">

	<?php if ( $page_title != 'no' ) : ?>
	<!-- Page Title -->
	<header class="page-title section-title-wrapper <?php echo esc_attr( $page_title_over ); ?>">
		<div class="section-title-inner">
			<div class="container">
				<?php the_title( '<h1 class="section-title section-title__lg">', '</h1>' ); ?>
				<?php if ($rocket_data['rocket__opt-page-title-breadcrumbs'] == 1) {
					if ( function_exists('dimox_breadcrumbs') ) :
						// Breadcrumbs
						dimox_breadcrumbs();
					endif;
				} ?>
			</div>
		</div>
	</header>
	<!-- Page Title / End -->
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<!-- Content -->
			<main id="primary" class="site-main <?php echo esc_attr( $page_layout_content ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>
			</main>
			<!-- Content / End -->

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
