<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $cols
 * @var $posts_per_page
 * @var $team_groups
 * @var $type
 * @var $order
 * @var $orderby
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Team_Posts
 */
$cols = $posts_per_page = $team_groups = $type = $orderby = $order = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type'      => 'team',
		'orderby'        => $orderby,
		'order'          => $order,
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

	if ( $cols == '1col' ) {
		$cols = 'col-md-12';
	} elseif ( $cols == '3cols' ) {
		$cols = 'col-sm-4';
	} elseif ( $cols == '4cols' ) {
		$cols = 'col-md-3';
	} else {
		$cols = 'col-md-6';
	}


	$staff_query = new WP_Query($args);
	global $more, $post;
	$more = 0; ?>

	<div class="row <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>">

		<?php while ($staff_query->have_posts()) : $staff_query->the_post(); ?>

		<div class="<?php echo esc_attr( $cols ); ?>">
			<?php if ( $type == 'classic' ) {
				get_template_part( 'template-parts/content', 'team-classic' );
			} else {
				get_template_part( 'template-parts/content', 'team' );
			} ?>
		</div>

		<?php endwhile; ?>

	</div><!-- .row -->
	<?php wp_reset_query(); ?>
