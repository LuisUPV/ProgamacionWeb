<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

$rocket_data = get_option('rocket_data');

$post_format        = get_post_format();
$post_date          = $rocket_data['rocket__opt-post-date'];
$post_footer        = $rocket_data['rocket__opt-post-footer'];
$post_footer_author = $rocket_data['rocket__opt-post-footer-author'];
$post_cats          = $rocket_data['rocket__opt-post-categories'];

// Check if Post Date enabled
$post_date_var = '';
if ( $post_date == 1 ) {
	$post_date_var = 'entry-header__has-date';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ) { ?>
	<figure class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</figure>
	<?php } ?>

	<div class="entry-body">

		<?php if ( $post_date == 1 ) : ?>
		<div class="entry-date">
			<span class="entry-day"><?php the_time('j'); ?></span>
			<span class="entry-month"><?php the_time('M'); ?></span>
		</div><!-- .entry-date -->
		<?php endif; ?>

		<header class="entry-header <?php echo esc_attr( $post_date_var ); ?>">
			<?php the_title( sprintf( '<div class="title-bordered border__solid"><h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></div>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-excerpt">

			<?php if ( $post_format == 'audio' || $post_format == 'video' || $post_format == 'link' || $post_format == 'quote' || $post_format == 'chat' ){
				the_content();
			} else {
				the_excerpt();
			}; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rocket' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-excerpt -->

		<?php // Post Categories
		if ( $post_cats == 1 ) : ?>
		<?php rocket_entry_categories(); ?>
		<?php endif; ?>

	</div><!-- .entry-body -->

	<?php if ( ! post_password_required() && $post_footer == 1) : ?>
	<footer class="entry-footer">

		<?php if ( $post_footer_author == 1 ) : ?>
		<div class="pull-left">
			<?php rocket_entry_footer(); ?>
		</div>
		<?php endif; ?>

		<div class="pull-right">
			<a href="<?php the_permalink() ?>" class="dotted-link2"><span><?php echo esc_html( $rocket_data['rocket__opt-blog-more-txt'] ); ?></span> <i class="fa fa-chevron-right"></i></a>
		</div>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-## -->
