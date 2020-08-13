<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $direction
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Blockquote_Icon
 */
$direction = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'blockquote';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if ( $direction == 'reverse' ) {
	$direction = 'blockquote-reverse';
}

$output = '<blockquote class="' . esc_attr( $css_class ) . ' ' . esc_attr( $direction ) . '">';
	$output .= $content;
$output .= '</blockquote>';

echo wp_kses( $output, array( 
	'blockquote' => array(
		'class' => array()
	),
	'strong' => array(),
	'em' => array()
));
