<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments">
		<h2>
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'rocket' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'rocket' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'rocket' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter    = wp_get_current_commenter();
					$comment_form = array(
						/* translators: %s is product title */
						'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'rocket' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'rocket' ), get_the_title() ),
						/* translators: %s is product title */
						'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'rocket' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(

							'author' => '<div class="row"><div class="col-md-6"><div class="comment-form-author form-group"><div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div><input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr( 'Name', 'rocket' ) . '" aria-required="true" /></div></div></div>',

							'email'  => '<div class="col-md-6"><div class="comment-form-email form-group">
							            <div class="input-group"><div class="input-group-addon"><i class="fa fa-envelope"></i></div><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr( 'Email', 'rocket' ) . '" aria-required="true" /></div></div></div></div>',
						),
						'label_submit'  => esc_html__( 'Submit Review', 'rocket' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( wp_kses_post( __( 'You must be <a href="%s">logged in</a> to post a review.', 'rocket' ) ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( wc_review_ratings_enabled() ) {
						$comment_form['comment_field'] = '<div class="row"><div class="col-lg-12"><div class="form-group"><div class="comment-form-rating form-control"><select name="rating" id="rating">
							<option value="">' . esc_html__( 'Rate&hellip;', 'rocket' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'rocket' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'rocket' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'rocket' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'rocket' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'rocket' ) . '</option>
						</select></div></div></div></div>';
					}

					$comment_form['comment_field'] .= '<div class="comment-form-comment form-group"><div class="input-group"><div class="input-group-addon"><i class="fa fa-pencil"></i></div><textarea id="comment" name="comment" class="form-control" cols="45" rows="7" placeholder="' . esc_html__( 'Your Review', 'rocket' ) . '" aria-required="true"></textarea></div></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'rocket' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
