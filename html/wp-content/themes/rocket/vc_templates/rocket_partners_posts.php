<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $cols
 * @var $posts_per_page
 * @var $groups
 * @var $show_title
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Partners_Posts
 */
$cols = $posts_per_page = $groups = $show_title = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'logos-list';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$args = array(
	'posts_per_page'      => $posts_per_page,
	'post_type'           => 'partners'
);

if ($groups !== '' && $groups !== "all") {
	$args['tax_query']=array(
		array(
			'taxonomy' => 'groups',
			'field' => 'slug',
			'terms' => $groups,
			'suppress_filters' => true,
		)
	);
}

if ( $cols == '1col' ) {
	$cols = 'col-md-12';
} elseif ( $cols == '2cols') {
	$cols = 'col-md-6';
} elseif ( $cols == '3cols') {
	$cols = 'col-md-4 col-sm-4';
} elseif ( $cols == '4cols') {
	$cols = 'col-md-3';
}  else {
	$cols = 'col-md-2';
}

if ( $show_title == 'true' ) {
	$show_title = 'show_title';
} else {
	$show_title = 'hide_title';
}


$staff_query = new WP_Query($args);
global $more, $post;
$more = 0; ?>

<div class="row <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?> <?php echo esc_attr($show_title); ?>">

	<?php while ($staff_query->have_posts()) : $staff_query->the_post(); ?>

	<div class="<?php echo esc_attr( $cols ); ?>">
		<?php get_template_part( 'template-parts/content', 'partner' ); ?>
	</div>

	<?php endwhile; ?>

</div><!-- .row -->
<?php wp_reset_query(); ?>
