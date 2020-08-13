<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $border_style
 * @var $border_color
 * @var $url
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Separator_Link
 */
$border_style = $border_color = $url = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'hr-scroll-to';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if ( $border_style == 'dashed' ) {
	$border_style = 'border__dashed';
} else {
	$border_style = 'border__solid';
}

$id = randomStr(10);

$output = '<div id="rocket__' . esc_attr( $id ) . '" class="' . esc_attr( $border_style ) . ' ' . esc_attr( $css_class ) . '"><a href="' . esc_url( $url ) . '">' . $content . '</a>';
$output .= '</div>';
if ( strlen( $border_color ) > 0 ) {
	$output .= '<style>';
	$output .= '#rocket__'.$id.'.hr-scroll-to:before {border-left-color:'.$border_color.';}';
	$output .= '#rocket__'.$id.'.hr-scroll-to:after {border-left-color:'.$border_color.';}';
	$output .= '#rocket__'.$id.'.hr-scroll-to a:after {background:'.$border_color.';}';
	$output .= '</style>';
}

echo wpb_js_remove_wpautop($output, false);
