<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $color
 * @var $title_color
 * @var $number
 * @var $number_color
 * @var $track_color
 * @var $bar_color
 * @var $icon_type
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_linecons
 * @var $icon_entypo
 * @var $symbol
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Progress_Bar_Vertical
 */
$title = $color = $title_color = $number = $number_color = $track_color = $bar_color = $icon_type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_linecons = $icon_entypo = $symbol = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'progress progress__vertical';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );

if ( $icon_type != 'false' ) {
	switch ( $icon_type ) {
		case 'openiconic':
			$icon_type = $icon_openiconic;
			break;
		case 'typicons':
			$icon_type = $icon_typicons;
			break;
		case 'entypo':
			$icon_type = $icon_entypo;
			break;
		case 'linecons':
			$icon_type = $icon_linecons;
			break;
		default:
			$icon_type = $icon_fontawesome;
	}
}

// Ensure HTML tags get closed
$title = force_balance_tags($title);

// Add Counter script
wp_enqueue_script('appear');
wp_enqueue_script('count-to');
wp_enqueue_script('count-to-init');

// Generate Unique ID to be used for styling
$unique_id = randomStr(10);

$track_color_inline = '';
if ( strlen( $track_color ) > 0 && $color == 'custom' ) {
	$track_color_inline = 'style="background-color: ' . $track_color . '"';
}

$bar_color_inline = '';
if ( strlen( $bar_color ) > 0 && $color == 'custom' ) {
	$bar_color_inline = 'style="background-color: ' . $bar_color . '"';
}

$title_color_inline = '';
if ( strlen( $title_color ) > 0 && $color == 'custom' ) {
	$title_color_inline = 'style="color: ' . $title_color . '"';
}

$number_color_inline = '';
if ( strlen( $number_color ) > 0 && $color == 'custom' ) {
	$number_color_inline = 'style="color: ' . $number_color . '"';
}

$output = '<div id="rocket__progress-' . esc_attr( $unique_id ) . '" class="' . esc_attr( $css_class ) . '" ' . $track_color_inline . '>';
	$output .= '<div class="progress-bar-wrapper">';
		$output .= '<div class="progress-bar progress-bar-' . esc_attr( $color ) . '" role="progressbar" data-number="' . esc_attr( $number ) . '" ' . $bar_color_inline . '>';
			$output .= '<span class="progress-icon"><i class="' . esc_attr( $icon_type ) . '"></i></span>';
			$output .= '<h4 class="progress-label" ' . $title_color_inline . '>' . $title . '</h4>';
		$output .= '</div>';
	$output .= '</div>';
	$output .= '<h4 class="progress-footer" ' . $number_color_inline . '><span class="progress-bar-number"><span>' . $number . '</span></span>' . $symbol . '</h4>';
$output .= '</div>';

echo wpb_js_remove_wpautop($output, false);
