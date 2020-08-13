<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $img_src
 * @var $name
 * @var $position
 * @var $type
 * @var $title_color
 * @var $position_color
 * @var $text_color
 * @var $foot_color
 * @var $foot_icon_color
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Testimonial
 */
$img_src = $name = $el_class = $css_animation = $title_color = $position_color = $text_color = $foot_color = $foot_icon_color = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'testimonial';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

if ( $type == 'type2' ) {
	$testi_type = 'testimonial__type2';
	$img = wp_get_attachment_image_src($img_src, 'rocket_thumbnail-md');
} else {
	$testi_type = 'testimonial__type1';
	$img = wp_get_attachment_image_src($img_src, 'rocket_thumbnail-sm');
}
$imgSrc = $img[0];

// Author Name Color
$title_color_inline = '';
if ( strlen( $title_color ) > 0 ) {
	$title_color_inline = 'style="color: ' . esc_attr( $title_color ) . '"';
}

// Author Position Color
$position_color_inline = '';
if ( strlen( $position_color ) > 0 ) {
	$position_color_inline = 'style="color: ' . esc_attr( $position_color ) . '"';
}

// Author Text Color
$text_color_inline = '';
if ( strlen( $text_color ) > 0 ) {
	$text_color_inline = 'style="color: ' . esc_attr( $text_color ) . '"';
}

// Footer Background Color
$foot_color_inline = '';
if ( strlen( $foot_color ) > 0 ) {
	$foot_color_inline = 'style="background-color: ' . esc_attr( $foot_color ) . '"';
}

// Footer Icon Color
$foot_icon_color_inline = '';
if ( strlen( $foot_icon_color ) > 0 ) {
	$foot_icon_color_inline = 'style="color: ' . esc_attr( $foot_icon_color ) . '"';
}

$output = '<div class="' . esc_attr( $css_class ) . ' ' . esc_attr( $testi_type ) . '">';
	if ( $img_src != '') {
		$output .= '<figure class="testimonial-thumb"><img src="' . $imgSrc . '" alt="' . esc_attr($name) . '" class="img-round"></figure>';
	}
	$output .= '<div class="testimonial-body">';
		$output .= '<header class="testimonial-heading">';
		$output .= '<h5 ' . $title_color_inline . '>' . $name . '</h5>';
		if ( $position ) {
			$output .= '<span class="testimonial-author-position" ' . $position_color_inline . '>' . $position . '</span>';
		}
		$output .= '</header>';
		$output .= '<p ' . $text_color_inline . '>' . $content . '</p>';
	$output .= '</div>';

	if ( $type == 'type2' ) {
		$output .= '<footer class="testimonial-footer" ' . $foot_color_inline . '>';	
			$output .= '<i class="fa fa-3x fa-quote-left" ' . $foot_icon_color_inline . '></i>';
		$output .= '</footer>';
	}
$output .= '</div>';

echo wpb_js_remove_wpautop($output, false);
