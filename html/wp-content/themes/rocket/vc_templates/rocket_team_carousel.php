<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $cols
 * @var $posts_per_page
 * @var $nav_controls
 * @var $loop
 * @var $team_groups
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Team_Carousel
 */
$cols = $posts_per_page = $nav_controls = $loop = $team_groups = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$id = randomStr(10);

$args = array(
	'posts_per_page'      => $posts_per_page,
	'post_type'           => 'team'
);

if(!empty($team_groups)) {
	$team_groups = explode(', ', $team_groups);
	if(!empty($team_groups)) {
		$args['tax_query'] = array(
			'relation' => 'OR'
		);
		foreach($team_groups as $team_group) {
			$args['tax_query'][] = array(
				'taxonomy' => 'teamgroups',
				'field'    => 'slug',
				'terms'    => $team_group
			);
		}
	}
}

if ( $loop != 'false') {
	$loop = 'true';
} else {
	$loop = 'false';
}

if ( $cols == '1col' ) {
	$cols = '1';
} else {
	$cols = '2';
}


$staff_query = new WP_Query($args);
global $more, $post;
$more = 0;

if ( $nav_controls == 'false') {
	$output = '<style scoped>';
	$output .= '#rocket__' . esc_attr( $id ) . ' .owl-controls {display:none;}';
	$output .= '</style>';
	echo wpb_js_remove_wpautop($output, false);
}
?>
<script>
	jQuery(function($){
		// Team Slider
		$("#rocket__<?php echo esc_attr($id); ?>").owlCarousel({
			loop: <?php echo esc_js($loop); ?>,
			margin:10,
			nav: <?php echo esc_js($nav_controls); ?>,
			dots: <?php echo esc_js($nav_controls); ?>,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:1
				},
				992:{
					items: <?php echo esc_js($cols); ?>
				},
				1200:{
					items: <?php echo esc_js($cols); ?>
				}
			},
			navText : ["<span class='link-circle'><i class='fa fa-angle-left'></i></span>","<span class='link-circle'><i class='fa fa-angle-right'></i></span>"]
		});
	});
</script>

<!-- Team Carousel -->
<div class="owl-holder">
	<div class="owl-carousel owl-theme team-slider <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>" id="rocket__<?php echo esc_attr($id); ?>">
		<?php while ($staff_query->have_posts()) : $staff_query->the_post(); ?>

			<div class="item">
				<?php get_template_part( 'template-parts/content', 'team' ); ?>
			</div>

		<?php endwhile; ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<!-- Team Carousel / End -->
