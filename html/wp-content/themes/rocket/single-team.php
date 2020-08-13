<?php
/**
 * The template for displaying Team single posts (Member).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rocket
 */

get_header();

$rocket_data       = get_option('rocket_data');
$page_title        = get_post_meta( $post->ID, 'rocket_title', true );
$page_title_custom = get_post_meta( $post->ID, 'rocket_custom_title', true );
$page_title_dots   = $rocket_data['rocket__opt-page-title-breadcrumbs-dots'];
$page_title_layout = $rocket_data['rocket__opt-page-title-breadcrumbs-position'];
$breadcrumbs_type  = $rocket_data['rocket__opt-breadcrumbs-type'];
$page_title_over   = $rocket_data['rocket__opt-page-title-overflow'];

$home              = esc_html__('Home', 'rocket'); // text for the 'Home' link
$team_page         = $rocket_data['rocket__opt-team-page'];
$team_label        = $rocket_data['rocket__opt-team-breadcrumbs-name'];

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


<?php if ( $page_title != 'no' ) { ?>
<!-- Page Title -->
<header class="page-title section-title-wrapper section-title-wrapper__no-bottom-margin <?php echo esc_attr( $page_title_layout ); ?> <?php echo esc_attr( $page_title_preset ); ?> <?php echo esc_attr( $page_title_over ); ?>">
	<div class="section-title-inner">
		<div class="container">
			<div class="section-title-decoration">
				<div class="row">
					<div class="<?php echo esc_attr( $page_title_wrapper_class ); ?>">
						<?php if ( $page_title_custom != '') {
							echo '<h1 class="section-title section-title__lg">' . esc_html( $page_title_custom ) . '</h1>';
						} else {
							the_title( '<h1 class="section-title section-title__lg">', '</h1>' );
						} ?>
					</div>
					<?php if ($rocket_data['rocket__opt-page-title-breadcrumbs'] == 1) { ?>
						<div class="<?php echo esc_attr( $breadcrumbs_wrapper_class ); ?> <?php echo esc_attr( $breadcrumbs_type ); ?>">
							<ol class="breadcrumb">
								<li><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo esc_html( $home ); ?></a></li>
								<li><a href="<?php if ( $team_page ) { echo esc_url( get_permalink( $team_page ) ); } ?>"><?php echo esc_html( $team_label ); ?></a></li>
								<li class="current"><span><?php the_title(); ?></span></li>
							</ol>
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

			<!-- Project -->
			<main id="primary" class="site-main col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single-team' ); ?>

				<?php endwhile; // End of the loop. ?>
			</main>
			<!-- Project / End -->

		</div>
	</div>

</div>

<?php get_footer(); ?>
