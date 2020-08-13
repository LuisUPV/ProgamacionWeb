<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rocket
 */

if ( ! function_exists( 'rocket_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function rocket_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'rocket' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( wp_kses( __( '<span class="meta-nav">&larr;</span> Older posts', 'rocket' ), array('span' => array( 'class' => array())))); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( wp_kses( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'rocket' ), array( 'span' => array( 'class' => array())))); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'rocket_entry_categories' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function rocket_entry_categories() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( );
		if ( $categories_list && rocket_categorized_blog() ) {
			printf( $categories_list );
		}
	}
}
endif;


if ( ! function_exists( 'rocket_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the author.
 */
function rocket_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		$byline = sprintf(
			esc_html_x( 'Posted by %s', 'post author', 'rocket' ),
			'<span class="author vcard"><a class="url fn n dotted-link1" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo wp_kses( $byline, array(
			'span' => array(
				'class' => array()
			),
			'a' => array(
				'href' => array(),
				'class' => array()
			)
		));
	}

	edit_post_link( esc_html__( 'Edit', 'rocket' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'rocket_single_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the author.
 */
function rocket_single_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		echo '<ul class="entry-meta list-inline">';

		echo '<li>';
		$byline = sprintf(
			esc_html_x( 'Posted by %s', 'post author', 'rocket' ),
			'<span class="author vcard"><a class="url fn n dotted-link1" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo wp_kses( $byline, array(
			'span' => array(
				'class' => array()
			),
			'a' => array(
				'href' => array(),
				'class' => array()
			)
		));
		echo '</li>';

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'rocket' ) );
		if ( $categories_list && rocket_categorized_blog() ) {
			echo '<li>';
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'rocket' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			echo '</li>';
		}

		echo '</ul>';
	}
	edit_post_link( esc_html__( 'Edit', 'rocket' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'rocket_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function rocket_tags() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', '');
		if ( $tags_list ) {
			printf( '<div class="entry-tags"><div class="tagcloud">' . '<h3>' . esc_html__('Tags', 'rocket') . '</h3>' . esc_html__( '%1$s', 'rocket' ) . '</div></div>', $tags_list ); // WPCS: XSS OK.
		}
	}
	
}
endif;


if ( ! function_exists( 'rocket_meta_comments' ) ) :
/**
 * Prints HTML with comments information for the post.
 */
function rocket_meta_comments() {
	if ( ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( '0', '1', '%', 'btn btn-default btn-has-icon hidden-xs', 'x' );
			echo '</span>';
		}
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rocket_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rocket_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rocket_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rocket_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rocket_categorized_blog should return false.
		return false;
	}
}


if(!function_exists('rocket_comments')) {
	/**
	 * Return Custom Comments markup
	 */
	function rocket_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
	    
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
	?>
		<<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-wrapper">
		<?php endif; ?>
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 100 ); ?>
		<div class="comment-body">
			<div class="comment-meta vcard">
				<?php printf(__('<h5 class="comment-author">%s</h5>', 'rocket'), get_comment_author_link()) ?>
				<div class="comment-date commentmetadata"><i class="fa fa-clock-o"></i> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
				printf( __('%1$s', 'rocket'), get_comment_date()) ?></a><?php edit_comment_link( esc_html__('(Edit)', 'rocket' ),'  ','' );
				?>
				</div>
				<div class="comment-reply">
					<?php comment_reply_link(array_merge( $args, array(
						'add_below'   => $add_below,
						'depth'       => $depth,
						'reply_text'  => '<i class="fa fa-reply"></i> <span>' . esc_html__( 'Reply', 'rocket' ) . '</span>',
						'max_depth'   => $args['max_depth']
					))) ?>
				</div>
			</div>
				
			<?php if ($comment->comment_approved == '0') : ?>
			<div class="comment-awaiting-moderation alert alert-warning"><?php _e('Your comment is awaiting moderation.', 'rocket') ?></div>
			<br />
			<?php endif; ?>
			
			<div class="comment-txt">
				<?php comment_text() ?>
			</div>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php }
}


if(!function_exists('rocket_pagination')) {
	/**
	 * Return HTML for blog pagination
	 */
	function rocket_pagination($pages = '', $range = 2) { 
		$showitems = ($range * 2)+1; 

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}  

		if(1 != $pages) {
		echo "<ul class=\"pagination__custom list-unstyled list-inline\">";
		// if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a class='first' href='".get_pagenum_link(1)."'>First</a></li>";
		if($paged > 1) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='btn btn-default'><i class=\"fa fa-angle-left\"></i></a></li>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){ echo ($paged == $i)? "<li><span class=\"btn btn-primary current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"btn btn-default\">".$i."</a></li>";
			}
		}

		if ($paged < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\" class='btn btn-default'><i class=\"fa fa-angle-right\"></i></a></li>"; 
		// if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class='last' href='".get_pagenum_link($pages)."'>Last</a></li>";
		echo "</ul>\n";
		}
	}
}



/**
 * Password protected post
 */
if(!function_exists('rocket_password_form')) {
	function rocket_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="form-inline" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<p>' . __( "To view this protected post, enter the password below:", "rocket" ) . '</p>
		<div class="form-group"><label for="' . $label . '">' . __( "Password:", "rocket" ) . ' </label> &nbsp; <input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /> &nbsp; </div><input type="submit" class="btn btn-primary" name="Submit" value="' . esc_attr__( "Submit", "rocket" ) . '" />
		</form>
		';
		return $output;
	}
}
add_filter( 'the_password_form', 'rocket_password_form' );

// Add the Password Form to the Excerpt (for password protected posts)
if(!function_exists('rocket_excerpt_password_form')) {
	function rocket_excerpt_password_form( $excerpt ) {
	  if ( post_password_required() )
	  	$excerpt = get_the_password_form();
	  return $excerpt;
	}
	add_filter( 'the_excerpt', 'rocket_excerpt_password_form' );
}


/**
 * Flush out the transients used in rocket_categorized_blog.
 */
function rocket_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'rocket_categories' );
}
add_action( 'edit_category', 'rocket_category_transient_flusher' );
add_action( 'save_post',     'rocket_category_transient_flusher' );
