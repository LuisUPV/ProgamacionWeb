<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $subtitle
 * @var $color
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Heading_Subection
 */
$subtitle = $color = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'hgroup';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$unique_id = randomStr(10);

$color_inline = '';
if ( strlen( $color ) > 0 ) {
	$color_inline = ' style="color: ' . $color . '"';
}

$output = '<div id="rocket__subsection-title-' . esc_attr( $unique_id ) . '" class= "' . esc_attr( $css_class ) . '">';
	$output .= '<h2' . $color_inline . '>' . esc_html( $content ) . '</h2>';
	if ( strlen( $subtitle ) > 0 ) {
		$output .= '<h5' . $color_inline . '>' . esc_html( $subtitle ) . '</h5>';
	}
$output .= '</div>';

echo wp_kses_post( $output );
