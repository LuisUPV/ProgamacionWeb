<?php
/**
 * The template for displaying Portfolio single posts.
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
$project_nav       = $rocket_data['rocket__opt-single-project-nav'];
$related_post      = $rocket_data['rocket__opt-single-project-related'];
$related_title     = $rocket_data['rocket__opt-single-project-related-title'];
$portfolio_page    = $rocket_data['rocket__opt-portfolio-page'];
$portfolio_label   = $rocket_data['rocket__opt-portfolio-breadcrumbs-name'];

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
								<li><a href="<?php if ( $portfolio_page ) { echo esc_url( get_permalink( $portfolio_page ) ); } ?>"><?php echo esc_html( $portfolio_label ); ?></a></li>
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

					<?php if ( $project_nav == 1 ) : ?>
					<!-- Post Nav -->
					<nav class="post-nav">
						<ul class="pager-custom">
							<li class="previous">
								<!-- For mobile device -->
								<a href="<?php if ( $portfolio_page ) { echo esc_url( get_permalink( $portfolio_page ) ); } ?>" class="btn btn-default btn-single-icon visible-xs-inline-block"><i class="fa fa-long-arrow-left"></i></a>
								<!-- For desktop -->
								<a href="<?php if ( $portfolio_page ) { echo esc_url( get_permalink( $portfolio_page ) ); } ?>" class="btn btn-default btn-has-icon hidden-xs"><i class="fa fa-long-arrow-left"></i> <?php esc_html_e( 'Turn Back', 'rocket' ); ?></a>
							</li>
							<li class="next">
								<?php
								$prev = get_permalink(get_adjacent_post(false,'',false));
								if ($prev != get_permalink()) { ?>
								<a href="<?php echo esc_url( $prev ); ?>" class="btn btn-primary btn-has-icon icon-right"><i class="fa fa-chevron-right"></i><span><?php esc_html_e( 'Next', 'rocket' ); ?></span></a>
								<?php } ?>

								<?php
								$next = get_permalink(get_adjacent_post(false,'',true));
								if ($next != get_permalink()) { ?>
								<a href="<?php echo esc_url( $next ); ?>" class="btn btn-primary btn-has-icon"><i class="fa fa-chevron-left"></i><span><?php esc_html_e( 'Prev', 'rocket' ); ?></span></a>
								<?php } ?>
							</li>
						</ul>
					</nav>
					<!-- Post Nav / End -->
					<?php endif; ?>

					<?php get_template_part( 'template-parts/content', 'single-portfolio' ); ?>

				<?php endwhile; // End of the loop. ?>
			</main>
			<!-- Project / End -->

		</div>
	</div>
</div>
<?php if ( $related_post == 1 && ( is_array( get_the_terms( $post->ID , 'catportfolio') ) ) ) : ?>
<section class="page-section page-section__no-top-padding">

	<div class="container">

		<div class="section-title-wrapper mb-60">
			<div class="section-title-inner">
				<h2 class="section-title"><?php echo esc_html( $related_title ); ?></h2>
			</div>
		</div>

		<!-- Gallery Feed -->
		<div class="portfolio-feed">

			<?php
			//Get array of terms
			$terms = get_the_terms( $post->ID , 'catportfolio');
			//Pluck out the IDs to get an array of IDS
			$term_ids = array_values(wp_list_pluck($terms,'term_id'));

			//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
			//Choose 'AND' if you want to query for posts with all terms
			$second_query = new WP_Query( array(
				'post_type'           => 'portfolio',
				'tax_query'           => array(
					array(
						'taxonomy'  => 'catportfolio',
						'field'     => 'id',
						'terms'     => $term_ids,
						'operator'  => 'IN' //Or 'AND' or 'NOT IN'
					)),
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => 1,
				'orderby'             => 'rand',
				'post__not_in'        => array($post->ID),
			));

			//Loop through posts and display...
			if($second_query->have_posts()) {
			while ($second_query->have_posts() ) : $second_query->the_post();

			$thumb   = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image   = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'rocket_portfolio-thumbnail-n');
			?>

			<div class="portfolio-item col-xs-4 col-md-4">
				<div class="portfolio-item-holder">

					<?php if(has_post_thumbnail()): ?>
					<figure class="portfolio-img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( $image[0] ); ?>" alt=""></a>
					</figure>
					<?php endif; ?>

					<div class="portfolio-details">
						<h5 class="portfolio-title"><?php the_title(); ?></h5>
						<a href="<?php echo esc_url( $img_url ); ?>" class="btn btn-primary btn-single-icon btn-portfolio-plus magnific-popup__custom-title" data-desc="<?php esc_attr(the_title()); ?> <a href='<?php the_permalink(); ?>' class='btn btn-primary btn-has-icon icon-right'><i class='fa fa-link'></i> <?php _e('View more', 'rocket'); ?></a>">
							<i class="fa fa-plus"></i>
						</a>
						<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-single-icon btn-portfolio-link"><i class="fa fa-link"></i></a>
					</div>

				</div>
			</div>

			<?php endwhile; wp_reset_query(); } ?>

		</div>
		<!-- Gallery Feed / End -->

	</div>


</section>
<?php endif; ?>

<?php get_footer(); ?>
