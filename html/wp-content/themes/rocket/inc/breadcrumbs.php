<?php
/*
 * WordPress Breadcrumbs
 * author: Dimox
 * version: 2015.09.14
 * license: MIT
*/

function dimox_breadcrumbs() {

	$rocket_data = get_option('rocket_data');

	/* === OPTIONS === */
	$text['home']     = esc_html__( 'Home', 'rocket' ); // text for the 'Home' link
	$text['category'] = esc_html__( 'Archive by Category "%s"', 'rocket' ); // text for a category page
	$text['search']   = esc_html__( 'Search Results for "%s" Query', 'rocket' ); // text for a search results page
	$text['tag']      = esc_html__( 'Posts Tagged "%s"', 'rocket' ); // text for a tag page
	$text['author']   = esc_html__( 'Articles Posted by %s', 'rocket' ); // text for an author page
	$text['404']      = esc_html__( 'Error 404', 'rocket'); // text for the 404 page
	$text['page']     = esc_html__( 'Page %s', 'rocket' ); // text 'Page N'
	$text['cpage']    = esc_html__( 'Comment Page %s', 'rocket' ); // text 'Comment Page N'
	$text['blog']     = $rocket_data['rocket__opt-blog-title'];

	$wrap_before    = '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
	$wrap_after     = '</ol>'; // the closing wrapper tag
	$sep            = ''; // separator between crumbs
	$sep_before     = ''; // tag before separator
	$sep_after      = ''; // tag after separator
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_current   = 1; // 1 - show current page title, 0 - don't show
	$before         = '<li class="current"><span>'; // tag before the current crumb
	$after          = '</span></li>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link      = home_url('/');
	$link_before    = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link_after     = '</li>';
	$link_attr      = ' itemprop="item"';
	$link_in_before = '<span itemprop="name">';
	$link_in_after  = '</span>';
	$link           = $link_before . '<a href="%1$s"' . esc_attr( $link_attr ) . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id   = get_option('page_on_front');

	$allowed_html_breadcrumbs = array(
		'ol' => array(
			'class' => array(),
			'itemscope' => array(),
			'itemtype'  => array(),
		),
		'li' => array(
			'class'    => array(),
			'itemtype'  => array(),
			'itemscope' => array(),
			'itemprop' => array(),
		),
		'a' => array(
			'class'    => array(),
			'href'     => array(),
			'itemprop' => array(),
		),
		'span' => array(
			'class'    => array(),
			'itemprop' => array(),
		)
	);

	if (have_posts()) {
		$parent_id = $post->post_parent;
	}
	$sep            = ' ' . $sep_before . $sep . $sep_after . ' ';

	if ( is_home() && ! is_front_page() ) {

		if ($show_on_home) echo wp_kses($wrap_before, $allowed_html_breadcrumbs) . '<li><a href="' . esc_url( $home_link ) . '">' . esc_html( $text['home'] ) . '</a></li>' . $before . esc_html( $text['blog'] ) . $after . wp_kses($wrap_after, $allowed_html_breadcrumbs);

	} elseif (is_home() || is_front_page()) {

		if ($show_on_home) echo wp_kses($wrap_before, $allowed_html_breadcrumbs) . '<li><a href="' . esc_url( $home_link ) . '">' . esc_html( $text['home'] ) . '</a></li>' . wp_kses($wrap_after, $allowed_html_breadcrumbs);

	} else {

		echo wp_kses($wrap_before, $allowed_html_breadcrumbs);
		if ($show_home_link) echo sprintf($link, esc_url( $home_link ), esc_html( $text['home'] ));

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo esc_html($sep);
				echo wp_kses($cats, $allowed_html_breadcrumbs);
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo esc_html($sep) . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo esc_html($sep) . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}

		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo esc_html($sep);
				if ($show_current) echo wp_kses($before, $allowed_html_breadcrumbs) . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo esc_html($sep);
				echo wp_kses($before, $allowed_html_breadcrumbs) . sprintf($text['search'], get_search_query()) . $after;
			}

		} elseif ( is_day() ) {
			if ($show_home_link) echo esc_html($sep);
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo esc_html($sep) . $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			if ($show_home_link) echo esc_html($sep);
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo esc_html($sep) . $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo esc_html($sep);
			if ($show_current) echo wp_kses($before, $allowed_html_breadcrumbs) . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo esc_html($sep);
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, esc_url( $home_link ) . $slug['slug'] . '/', $post_type->labels->singular_name);
				// if ($show_current) echo esc_html($sep) . $before . get_the_title() . $after;
			} else {
				// $cat = get_the_category(); $cat = $cat[0];
				// $cats = get_category_parents($cat, TRUE, $sep);
				// if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				// $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				// echo wp_kses($cats, $allowed_html_breadcrumbs);
				echo '<li><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . esc_html( $text['blog'] ) . '</a></li>';
				if ( get_query_var('cpage') ) {
					echo esc_html($sep) . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					// if ($show_current) echo wp_kses($before, $allowed_html_breadcrumbs) . get_the_title() . $after;
				}
			}

		// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo esc_html($sep) . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ( have_posts() ) {
					if ($show_current) echo esc_html($sep) . $before . $post_type->label . $after;
				} else {
					if ($show_current) echo esc_html($sep) . $before . esc_html__( 'Nothing found', 'rocket' ) . $after;
				}

			}

		} elseif ( is_attachment() ) {
			if ($show_home_link) echo esc_html($sep);
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo wp_kses($cats, $allowed_html_breadcrumbs);
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo esc_html($sep) . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo esc_html($sep) . $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo esc_html($sep);
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo wp_kses($breadcrumbs[$i], $allowed_html_breadcrumbs);
					if ($i != count($breadcrumbs)-1) echo esc_html($sep);
				}
			}
			if ($show_current) echo esc_html($sep) . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo esc_html($sep) . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo esc_html($sep) . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}

		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo esc_html($sep);
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo esc_html($sep);
				if ($show_current) echo wp_kses($before, $allowed_html_breadcrumbs) . sprintf($text['author'], $author->display_name) . $after;
			}

		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo esc_html($sep);
			if ($show_current) echo wp_kses($before, $allowed_html_breadcrumbs) . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo esc_html($sep);
			echo get_post_format_string( get_post_format() );
		}

		echo wp_kses($wrap_after, $allowed_html_breadcrumbs);

	}
} // end of dimox_breadcrumbs()
