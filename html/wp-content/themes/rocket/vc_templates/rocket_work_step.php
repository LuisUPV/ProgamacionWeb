<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $date
 * @var $subtitle
 * @var $link
 * @var $active
 * @var $checkmark_active
 * @var $el_class
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Work_Step
 */
$title = $date = $subtitle = $link = $active = $checkmark_active = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$url = vc_build_link( $link );

if ( $active == 'yes' ) {
	$active_class = 'timeline-step__active';
} else {
	$active_class = 'timeline-step__non-active';
}

if ( $checkmark_active == 'yes' ) {
	$check_active_class = 'item-checkmark__active';
} else {
	$check_active_class = 'item-checkmark__non-active';
}

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

?>

<div class="timeline-step <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>">

	<?php if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) { ?>
		<a href="<?php echo esc_attr( $url['url'] ); ?>" class="item-link <?php echo esc_attr( $active_class ); ?> <?php echo esc_attr( $check_active_class ); ?>" title="<?php echo esc_attr( $url['title'] ); ?>" target="<?php echo ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ); ?>">
	<?php } else { ?>
		<a href="#" class="item-link <?php echo esc_attr( $active_class ); ?> <?php echo esc_attr( $check_active_class ); ?>" onclick="event.preventDefault();">
	<?php } ?>
		<?php if ( ! empty( $date ) ) : ?>
		<p class="timeline__item-date"><?php echo esc_html( $date ); ?></p>
		<?php endif; ?>
		<h5 class="timeline__item-title"><?php echo strlen( $title ) > 0 ? ' ' . trim( esc_attr( $title ) ) : 'Sample Title'; ?></h5>
		<div class="desc-holder">
			<span class="desc"><?php echo strlen( $subtitle ) > 0 ? ' ' . trim( esc_attr( $subtitle ) ) : 'Short description goes here'; ?></span>
		</div>
	</a>
</div>
