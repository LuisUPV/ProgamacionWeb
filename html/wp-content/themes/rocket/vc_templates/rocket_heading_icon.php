<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $color
 * @var $type
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $icon_color
 * @var $icon_custom_color
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Heading_Icon
 */
$color = $type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $icon_color = $icon_custom_color = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'title-with-icon';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$iconClass = isset( ${'icon_' . $type} ) ? esc_attr( ${'icon_' . $type} ) : 'title-with-icon__icon-el__default';

$color_inline = '';
if ( strlen( $color ) > 0 ) {
	$color_inline = 'style="color: ' . esc_attr( $color ) . '"';
}

$output = '<div class="' . esc_attr( $css_class ) . '">';
	$output .= '<h3 ' . $color_inline . '>';
		$output .= $content;
	$output .= '</h3>';
	$output .= '<span class="title-with-icon__icon-el ' . esc_attr( $iconClass ) . ' title-with-icon__icon-el_color_' . $icon_color . '" ' . ( 'custom' === $icon_color ? 'style="color:' . esc_attr( $icon_custom_color ) . ' !important"' : '' ) . '></span>';
$output .= '</div>';


echo wp_kses_post( $output );
