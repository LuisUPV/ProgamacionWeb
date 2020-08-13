<?php
/**
 * Template part for displaying Portfolio single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$rocket_data = get_option('rocket_data');

// Layout
// @since 1.5.0
$portfolio_layout      = $rocket_data['rocket__opt-single-project-layout'];
$portfolio_layout_page = get_post_meta( $post->ID, 'rocket_layout', true );

if ( $portfolio_layout != $portfolio_layout_page && $portfolio_layout_page != 'default' && $portfolio_layout_page != '' ) {
	$portfolio_layout = $portfolio_layout_page;
}

$img_col  = 'col-md-8';
$desc_col = 'col-md-4';
$img_size = 'rocket_portfolio-thumbnail';

if ( $portfolio_layout == 'left_desc' ) {
	$img_col  = 'col-md-8 col-md-push-4';
	$desc_col = 'col-md-4 col-md-pull-8';
} elseif ( $portfolio_layout == 'full_width' ) {
	$img_col  = 'col-md-12';
	$desc_col = 'col-md-12';
	$img_size = 'full';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // If not Blank Layout 
	if ( $portfolio_layout !== 'blank' ) { ?>

	<div class="row">
		<div class="<?php echo esc_attr( $img_col ); ?>">
			<?php if(has_post_thumbnail()) { ?>
			<figure class="portfolio-single-thumbnail thumbnail">
				<?php the_post_thumbnail($img_size); ?>
			</figure>
			<?php } ?>
		</div>
		<div class="<?php echo esc_attr( $desc_col ); ?>">

			<?php the_title( '<div class="title-bordered border__solid"><h4>', '</h4></div>' ); ?>

			<?php // If Full width Layout 
				if ( $portfolio_layout == 'full_width') { ?>
				<div class="row">
					<div class="col-md-7">
						<?php the_content(); ?>
					</div>
					<div class="col-md-5">
						<?php get_template_part( 'template-parts/portfolio', 'info' ); ?>
					</div>
				</div>
			<?php } else { ?>

				<?php the_content(); ?>

				<?php get_template_part( 'template-parts/portfolio', 'info' ); ?>

			<?php } ?>
		</div>
	</div>

	<?php // if Blank Layout selected display only content
	} else { ?>

		<?php the_content(); ?>

	<?php } ?>

</article><!-- #post-## -->
