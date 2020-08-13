<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocket
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="hr-alt"></div>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'rocket' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'rocket' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'rocket' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'rocket' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="commentlist">
			<?php wp_list_comments('type=all&callback=rocket_comments'); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'rocket' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'rocket' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'rocket' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<div class="alert alert-info no-comments"><?php esc_html_e( 'Comments are closed.', 'rocket' ); ?></div>
	<?php endif; ?>
	
	<!-- Comment Form -->
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	
		$comments_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_form'           => '',
			'class_submit'         => 'btn btn-primary btn-block',
			'title_reply'          => esc_html__( 'Leave a Reply', 'rocket' ),
			'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'rocket' ),
			'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'rocket' ),
			'label_submit'         => esc_html__( 'Post Comment', 'rocket' ),
	
			'comment_field'        =>  
				'<div class="comment-form-comment form-group">' .
				'<div class="input-group">' . 
				'<div class="input-group-addon"><i class="fa fa-pencil"></i></div>' . 
				'<textarea id="comment" name="comment" cols="30" rows="7" class="form-control" placeholder="' . esc_attr__('Your Comment', 'rocket') . '" aria-required="true">' .
				'</textarea>' .
				'</div>' .
				'</div>',
	
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'must_log_in'          => '<div class="alert alert-warning">' .  sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'rocket' ), array('a' => array( 'href' => array() ))), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</div>',
	
			'fields' => apply_filters( 'comment_form_default_fields', array(
	
				'author' =>
					'<div class="row">' .
					'<div class="col-md-6">' .
					'<div class="comment-form-author form-group">' .
					'<div class="input-group">' .
					'<div class="input-group-addon"><i class="fa fa-user"></i></div>' .
					'<input id="author" name="author" type="text" class="form-control" placeholder="' . esc_attr__('Your Name', 'rocket') . '" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . esc_attr($aria_req) . ' /></div>' .
					'</div>' .
					'</div>',
	
				'email' =>
					'<div class="col-md-6">' .
					'<div class="comment-form-email form-group">' .
					'<div class="input-group">' .
					'<div class="input-group-addon"><i class="fa fa-envelope"></i></div>' .
					'<input id="email" name="email" type="email" class="form-control" placeholder="' . esc_attr__('Email Address', 'rocket') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . esc_attr($aria_req) . ' /></div>' .
					'</div>' .
					'</div>' .
					'</div>',
				)
			),
		);
		comment_form($comments_args);
	?>
	<!-- Comment Form / End -->

</div><!-- #comments -->
