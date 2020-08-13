<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $cols
 * @var $posts_per_page
 * @var $groups
 * @var $autoplay
 * @var $autoplay_speed
 * @var $loop
 * @var $show_title
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Partners_Carousel
 */
$cols = $posts_per_page = $groups = $autoplay_speed = $loop = $show_title = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$id = randomStr(10);

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

if ( $loop == '') {
	$loop = 'false';
} else {
	$loop = 'true';
}

if ( $autoplay == '') {
	$autoplay = 'false';
} else {
	$autoplay = 'true';
}

if ( $cols == '1col' ) {
	$cols = 1;
} elseif ( $cols == '2cols') {
	$cols = 2;
} elseif ( $cols == '3cols') {
	$cols = 3;
} elseif ( $cols == '4cols') {
	$cols = 4;
}  else {
	$cols = 6;
}

if ( $show_title == '' ) {
	$show_title = 'hide_title';
} else {
	$show_title = 'show_title';
}


$partners_query = new WP_Query($args);
global $more, $post;
$more = 0;
?>
<script>
	jQuery(function($){
		// Partners Carousel
		$("#rocket__<?php echo esc_attr($id); ?>").owlCarousel({
			autoplay: <?php echo esc_js($autoplay); ?>,
      autoplayTimeout: <?php echo esc_js($autoplay_speed); ?>,
      autoplayHoverPause:true,
      loop:<?php echo esc_js($loop); ?>,
      margin:10,
      nav:false,
      dots:false,
      responsive:{
        0:{
          items:2
        },
        768:{
          items: <?php echo esc_js($cols); ?>
        },
        992:{
          items: <?php echo esc_js($cols); ?>
        }
      }
		});
	});
</script>

<!-- Partners Carousel -->
<div class="owl-carousel owl-theme logo-slider <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?> <?php echo esc_attr($show_title); ?>" id="rocket__<?php echo esc_attr($id); ?>">
	<?php while ($partners_query->have_posts()) : $partners_query->the_post(); ?>

		<div class="item">
			<?php get_template_part( 'template-parts/content', 'partner' ); ?>
		</div>

	<?php endwhile; ?>
</div>
<!-- Team Carousel / End -->
<?php wp_reset_query(); ?>
