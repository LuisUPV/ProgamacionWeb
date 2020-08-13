<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $value
 * @var $color
 * @var $custom_color
 * @var $custom_number_color
 * @var $custom_txt_color
 * @var $shape
 * @var $size
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Counter
 */
$title = $value = $color = $custom_color = $custom_number_color = $custom_txt_color = $shape = $size = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'rocket_counter rocket_counter-border';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Add Counter script
wp_enqueue_script('appear');
wp_enqueue_script('count-to');
wp_enqueue_script('count-to-init-counter');

// Custom styling
$custom_color_inline = '';
if ( strlen( $custom_color ) > 0 ) {
	$custom_color_inline = 'style="background-color: ' . esc_attr( $custom_color ) . '"';
}

$custom_number_color_inline = '';
if ( strlen( $custom_number_color ) > 0 ) {
	$custom_number_color_inline = 'style="color: ' . esc_attr( $custom_number_color ) . '"';
}

$custom_txt_color_inline = '';
if ( strlen( $custom_txt_color ) > 0 ) {
	$custom_txt_color_inline = 'style="color: ' . esc_attr( $custom_txt_color ) . '"';
}

$output = '<div class="' . esc_attr( $css_class ) . ' rocket_counter-color__' .  esc_attr( $color ) . ' rocket_counter-shape__' .  esc_attr( $shape ) . '   rocket_counter-size__' .  esc_attr( $size ) . '" ' .  $custom_color_inline . '>';
	$output .= '<span class="rocket_counter-value" ' . $custom_number_color_inline . '>' . esc_html( $value ) . '</span>';
$output .= '</div>';
$output .= '<h3 class="rocket_counter-label" ' . $custom_txt_color_inline . '>';
	$output .= $title;
$output .= '</h3>';

echo wp_kses_post( $output );
