<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$rocket_data = get_option('rocket_data');

$post_date   = $rocket_data['rocket__opt-single-post-date'];
$post_footer = $rocket_data['rocket__opt-single-post-footer'];
$post_tags   = $rocket_data['rocket__opt-single-post-tags'];
$post_title  = $rocket_data['rocket__opt-single-post-title'];
$post_thumb  = $rocket_data['rocket__opt-single-post-thumb'];
$post_author = $rocket_data['rocket__opt-single-post-author'];

$post_author_local = get_post_meta( $post->ID, 'rocket_post_author', true );

if ( has_post_thumbnail() && $post_thumb == 1 ) {
	$post_thumb_class = 'has-post-thumbnail';
} else {
	$post_thumb_class = 'no-post-thumbnail';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_thumb_class ); ?>>

	<?php if( has_post_thumbnail() && $post_thumb == 1 ) { ?>
	<figure class="entry-thumbnail">
		<?php the_post_thumbnail('rocket_post-thumbnail-lg'); ?>
	</figure>
	<?php } ?>

	<div class="entry-body">

		<?php if ( $post_date == 1 ) : ?>
		<div class="entry-date">
			<span class="entry-day"><?php the_time('j'); ?></span>
			<span class="entry-month"><?php the_time('M'); ?></span>
		</div><!-- .entry-date -->
		<?php endif; ?>

		<?php // Social sharing
		get_template_part('template-parts/social-share/social-share'); ?>

		<?php if ( $post_title == 1 ) : ?>
		<header class="entry-header">
			<div class="title-bordered border__solid">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</header><!-- .entry-header -->
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rocket' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .entry-body -->

	<?php if ( $post_footer == 1 ) : ?>
	<footer class="entry-footer">
		<?php rocket_single_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->

<?php // Post Tags
if ( $post_tags == 1 ) :
	rocket_tags();
endif; ?>

<?php
if ( $post_author_local != 'no' ) :
	if ( $post_author == 1 || $post_author_local == 'yes' ) : ?>
	<!-- Post Author -->
	<ol class="commentlist post-author-holder">
		<li class="comment post-author">
			<div class="comment-wrapper post-author-inner">
				<?php echo get_avatar(get_the_author_meta('email'), '100'); ?>
				<div class="comment-body">
					<div class="comment-meta vcard">
						<h5 class="comment-author"><?php the_author(); ?></h5>
						<?php if ( get_the_author_meta('url') ) : ?>
						<div class="comment-date commentmetadata">
							<i class="fa fa-globe"></i> <a href="<?php echo esc_url( get_the_author_meta('url') ); ?>"><?php the_author_meta('url'); ?></a>
						</div>
						<?php endif; ?>
					</div>
					<div class="comment-txt">
						<?php the_author_meta('description'); ?>
					</div>
				</div>
			</div>
		</li>
	</ol>
	<!-- Post Author / End -->
	<?php endif;
	endif; ?>
