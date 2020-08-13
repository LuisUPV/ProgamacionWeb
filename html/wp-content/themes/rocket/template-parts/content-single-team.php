<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$position        = get_post_meta($post->ID, 'rocket_position', true);
$email           = get_post_meta($post->ID, 'rocket_email', true);
$facebook        = get_post_meta($post->ID, 'rocket_facebook', true);
$twitter         = get_post_meta($post->ID, 'rocket_twitter', true);
$linkedin        = get_post_meta($post->ID, 'rocket_linkedin', true);
$gplus           = get_post_meta($post->ID, 'rocket_gplus', true);

$skill_1_label   = get_post_meta($post->ID, 'rocket_skill_1_label', true);
$skill_1_value   = get_post_meta($post->ID, 'rocket_skill_1_value', true);
$skill_1_color   = get_post_meta($post->ID, 'rocket_skill_1_color', true);
$skill_1_icon    = get_post_meta($post->ID, 'rocket_skill_1_icon', true);

$skill_2_label   = get_post_meta($post->ID, 'rocket_skill_2_label', true);
$skill_2_value   = get_post_meta($post->ID, 'rocket_skill_2_value', true);
$skill_2_color   = get_post_meta($post->ID, 'rocket_skill_2_color', true);
$skill_2_icon    = get_post_meta($post->ID, 'rocket_skill_2_icon', true);

$skill_3_label   = get_post_meta($post->ID, 'rocket_skill_3_label', true);
$skill_3_value   = get_post_meta($post->ID, 'rocket_skill_3_value', true);
$skill_3_color   = get_post_meta($post->ID, 'rocket_skill_3_color', true);
$skill_3_icon    = get_post_meta($post->ID, 'rocket_skill_3_icon', true);

$skill_4_label   = get_post_meta($post->ID, 'rocket_skill_4_label', true);
$skill_4_value   = get_post_meta($post->ID, 'rocket_skill_4_value', true);
$skill_4_color   = get_post_meta($post->ID, 'rocket_skill_4_color', true);
$skill_4_icon    = get_post_meta($post->ID, 'rocket_skill_4_icon', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-md-6">
			<?php if(has_post_thumbnail()) { ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail('rocket_portfolio-thumbnail'); ?>
			</figure>
			<?php } ?>

			<div class="gap-30"></div>

			<?php if ( $skill_1_value != '' ) { ?>
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo esc_attr( $skill_1_color ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $skill_1_value ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $skill_1_value ); ?>%;">
					<i class="fa <?php echo esc_attr( $skill_1_icon ); ?>"></i>
					<?php echo esc_attr( $skill_1_label ); ?>
				</div>
			</div>
			<?php } ?>

			<?php if ( $skill_2_value != '' ) { ?>
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo esc_attr( $skill_2_color ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $skill_2_value ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $skill_2_value ); ?>%;">
					<i class="fa <?php echo esc_attr( $skill_2_icon ); ?>"></i>
					<?php echo esc_attr( $skill_2_label ); ?>
				</div>
			</div>
			<?php } ?>

			<?php if ( $skill_3_value != '' ) { ?>
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo esc_attr( $skill_3_color ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $skill_3_value ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $skill_3_value ); ?>%;">
					<i class="fa <?php echo esc_attr( $skill_3_icon ); ?>"></i>
					<?php echo esc_attr( $skill_3_label ); ?>
				</div>
			</div>
			<?php } ?>

			<?php if ( $skill_4_value != '' ) { ?>
			<div class="progress">
				<div class="progress-bar progress-bar-<?php echo esc_attr( $skill_4_color ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $skill_4_value ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $skill_4_value ); ?>%;">
					<i class="fa <?php echo esc_attr( $skill_4_icon ); ?>"></i>
					<?php echo esc_attr( $skill_4_label ); ?>
				</div>
			</div>
			<?php } ?>

		</div>
		<div class="col-md-6">
			<div class="entry-body">
				<header class="entry-header">
					<div class="title-bordered border__solid">
						<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
						<?php echo esc_html( $position ); ?>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<hr>

				<ul class="social-icons social-icons__rounded social-icons__outline">
					<?php if ( $facebook ) : ?>
					<li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>

					<?php if ( $linkedin ) : ?>
					<li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; ?>

					<?php if ( $twitter ) : ?>
					<li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>

					<?php if ( $gplus ) : ?>
					<li><a href="<?php echo esc_url( $gplus ); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
				</ul>

				<hr class="mb-50">

				<?php if ( $email != '' ) : ?>
				<a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-has-icon btn-lg btn-primary"><i class="fa fa-envelope"></i> <?php esc_html_e( 'Get in Touch', 'rocket' ); ?></a>
				<?php endif; ?>

			</div><!-- .entry-body -->
		</div>
	</div>

	<hr class="hr__dashed hr__lg">

	<?php echo do_shortcode('[rocket_team_posts posts_per_page="3" cols="3cols" type="classic" orderby="rand"]'); ?>


</article><!-- #post-## -->
