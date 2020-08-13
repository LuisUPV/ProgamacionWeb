<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $color
 * @var $style
 * @var $font_size
 * @var $border_style
 * @var $border_bottom_color
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Heading_Bordered
 */
$color = $style = $font_size = $border_style = $border_bottom_color = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'title-bordered';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if ( $border_style == 'dashed' ) {
	$border_style = 'border__dashed';
} else {
	$border_style = 'border__solid';
}

if ( $font_size == 'font_normal' ) {
	$font_size = 'h5';
} else {
	$font_size = 'h3';
}

$border_bottom_color_inline = '';
if ( strlen( $border_bottom_color ) > 0 ) {
	$border_bottom_color_inline = 'style="border-bottom-color: ' . esc_attr( $border_bottom_color ) . '"';
}

$color_inline = '';
if ( strlen( $color ) > 0 ) {
	$color_inline = 'style="color: ' . esc_attr( $color ) . '"';
}

$output = '<div class="' . esc_attr( $css_class ) . ' ' . esc_attr( $border_style ) . '" ' . $border_bottom_color_inline . '>';
	$output .= '<' . esc_attr( $font_size ) . ' ' . $color_inline . '>';
		$output .= esc_attr( $content );
	$output .= '</' . esc_attr( $font_size ) . '>';
$output .= '</div>';

echo wp_kses( $output, array( 
	'div' => array(
		'class' => array(),
		'style' => array()
	),
	'h3' => array(
		'style' => array()
	),
	'h5' => array(
		'style' => array()
	)
));
