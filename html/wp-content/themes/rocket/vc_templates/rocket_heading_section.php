<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $subtitle
 * @var $dots_color
 * @var $color
 * @var $subtitle_color
 * @var $title_tag
 * @var $title_font_size
 * @var $title_font_size_lg
 * @var $title_font_size_md
 * @var $title_font_size_sm
 * @var $title_font_size_xs
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Heading_Section
 */
$subtitle = $color = $subtitle_color = $dots_color = $title_tag = $title_font_size = $title_font_size_lg = $title_font_size_md = $title_font_size_sm = $title_font_size_xs = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'section-title-wrapper';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$unique_id = randomStr(10);

$title_styles = array();
$subtitle_styles = array();
$title_font_size_responsive = array();

$dots_color_inline = '';
if ( strlen( $dots_color ) > 0 ) {
	$dots_color_inline = 'style="background-color: ' . $dots_color . '"';
}

if ( strlen( $color ) > 0 ) {
	$title_styles[] = 'color: ' . $color;
}

if ( strlen( $subtitle_color ) > 0 ) {
	$subtitle_styles[] = 'color: ' . $subtitle_color;
}

$title_font_size_inline = '';
if ( strlen( $title_font_size ) > 0 ) {
	$title_font_size_responsive[] = '<style>';
		$title_font_size_responsive[] = '@media (min-width: 992px) { #rocket__section-title-' . $unique_id . ' .section-title { font-size: ' . $title_font_size_md . ' !important; } }';
		$title_font_size_responsive[] = '@media (min-width: 1200px) { #rocket__section-title-' . $unique_id . ' .section-title { font-size: ' . $title_font_size_lg . ' !important; } }';
		$title_font_size_responsive[] = '@media (max-width: 991px) { #rocket__section-title-' . $unique_id . ' .section-title { font-size: ' . $title_font_size_sm . ' !important; } }';
		$title_font_size_responsive[] = '@media (max-width: 767px) { #rocket__section-title-' . $unique_id . ' .section-title { font-size: ' . $title_font_size_xs . ' !important; } }';
	$title_font_size_responsive[] = '</style>';
}

$title_styles = 'style="' . implode( ';', $title_styles ) . '"';
$subtitle_styles = 'style="' . implode( ';', $subtitle_styles ) . '"';
$title_font_size_responsive = implode( ' ', $title_font_size_responsive );

echo $title_font_size_responsive;

$output = '<div id="rocket__section-title-' . esc_attr( $unique_id ) . '" class="' . esc_attr( $css_class ) . '">';
	$output .= '<div class="section-title-inner section-title-inner__alt">';
		$output .= '<' . $title_tag . ' class="section-title section-title__lg" ' . $title_styles . '>' . esc_html( $content ) . '</' . $title_tag . '>';
		if ( strlen( $subtitle ) > 0 ) {
			$output .= '<span class="section-desc" ' . $subtitle_styles . '>' . esc_html( $subtitle ) . '</span>';
		}
		$output .= '<span class="section-title-dots">';
			$output .= '<span class="dot1" ' . $dots_color_inline . '></span><span class="dot2" ' . $dots_color_inline . '></span><span class="dot3" ' . $dots_color_inline . '></span>';
		$output .= '</span>';
	$output .= '</div>';
$output .= '</div>';

echo $output;
