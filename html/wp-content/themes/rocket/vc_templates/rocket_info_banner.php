<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $subtitle
 * @var $content_alignment
 * @var $overlay_enable
 * @var $bg_img
 * @var $bg_color
 * @var $overlay
 * @var $overlay_opacity
 * @var $banner_img
 * @var $min_height
 * @var $img_alignment
 * @var $btn_enable
 * @var $btn_txt
 * @var $btn_link
 * @var $btn_type
 * @var $height_desktop_large
 * @var $height_desktop
 * @var $height_tablet
 * @var $height_mobile
 * @var $title_color
 * @var $subtitle_color
 * @var $description_color
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Info_Banner
 */
$title = $subtitle = $content_alignment = $bg_img = $bg_color = $overlay_enable = $overlay = $overlay_opacity = $banner_img = $min_height = $img_alignment = $el_class = $btn_enable = $btn_txt = $btn_link = $btn_type = $height_desktop_large = $height_desktop = $height_tablet = $height_mobile = $title_color = $subtitle_color = $description_color = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'rocket_info-banner';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$btn_link = vc_build_link( $btn_link );

$unique_id = randomStr(10);

$title_color_inline = '';
if ( strlen( $title_color ) > 0 ) {
	$title_color_inline = 'style="color: ' . esc_attr( $title_color ) . '"';
}

$subtitle_color_inline = '';
if ( strlen( $subtitle_color ) > 0 ) {
	$subtitle_color_inline = 'style="color: ' . esc_attr( $subtitle_color ) . '"';
}

$description_color_inline = '';
if ( strlen( $description_color ) > 0 ) {
	$description_color_inline = 'style="color: ' . esc_attr( $description_color ) . '"';
}

$output = '<div id="rocket_info-banner-id' . esc_attr( $unique_id ) . '" class="' . esc_attr( $css_class ) . ' rocket_info-align-' . $content_alignment . '">';
	
	$output .= '<div class="rocket_info-banner-wrap">';
		// Banner Link
		if ( $btn_enable == false && ! empty( $btn_link['url'] ) ) {
			$output .= '<a class="rocket_info-banner-link-full" href="' . esc_attr( $btn_link['url'] ) . '"'
				. ( $btn_link['target'] ? ' target="' . esc_attr( $btn_link['target'] ) . '"' : '' )
				. ( $btn_link['title'] ? ' title="' . esc_attr( $btn_link['title'] ) . '"' : '' )
				. '></a>';
		}

		//Banner Image
		$output .= '<img src="' . wp_get_attachment_image_url($banner_img, 'full') . '" alt="" class="rocket_info-banner-img ' . $img_alignment . '">';

		if ( $overlay_enable ) {
			$output .= '<div class="rocket_info-banner-overlay" style="background-color:' . $overlay . '; opacity: 0.' . $overlay_opacity . ';"></div>';
		}

		$output .= '<div class="rocket_info-banner-inner">';

			if ( $subtitle ) {
				$output .= '<h6 class="rocket_info-banner-subtitle" ' . $subtitle_color_inline . '>';
					$output .= $subtitle;
				$output .= '</h6>';
			}

			if ( $title ) {
				$output .= '<h2 class="rocket_info-banner-title" ' . $title_color_inline . '>';
					$output .= $title;
				$output .= '</h2>';
			}

			if ( $content ) {
				$output .= '<div class="rocket_info-banner-desc" ' . $description_color_inline . '>';
					$output .= $content;
				$output .= '</div>';
			}

			if ( $btn_enable == true && ! empty( $btn_link['url'] ) ) {
				$output .= '<a class="rocket_info-banner-btn btn btn-' . $btn_type . '" href="' . esc_attr( $btn_link['url'] ) . '"'
					. ( $btn_link['target'] ? ' target="' . esc_attr( $btn_link['target'] ) . '"' : '' )
					. ( $btn_link['title'] ? ' title="' . esc_attr( $btn_link['title'] ) . '"' : '' )
					. '>' . $btn_txt . '</a>';
			}
			
		$output .= '</div>';
	$output .= '</div>';
$output .= '</div>';

if ( $min_height != '100' ) {
	$output .= '<style>';
		$output .= '#rocket_info-banner-id' . esc_attr( $unique_id ). ' {';
			$output .= 'min-height: ' . $min_height . 'px;';
		$output .= '}';
	$output .= '</style>';
}


// Banner Height on Mobiles
if ( $height_mobile != '' ) {
	$output .= '<style>';
		$output .= '@media (max-width: 767px) {';
			$output .= '#rocket_info-banner-id' . esc_attr( $unique_id ). ' .rocket_info-banner-img {';
				$output .= 'height: ' . $height_mobile . 'px;';
			$output .= '}';
		$output .= '}';
	$output .= '</style>';
}

// Banner Height on Tablets
if ( $height_tablet != '' ) {
	$output .= '<style>';
		$output .= '@media (min-width:480px) and (max-width: 991px) {';
			$output .= '#rocket_info-banner-id' . esc_attr( $unique_id ). ' .rocket_info-banner-img {';
				$output .= 'height: ' . $height_tablet . 'px;';
			$output .= '}';
		$output .= '}';
	$output .= '</style>';
}

// Banner Height on Desktop
if ( $height_desktop != '' ) {
	$output .= '<style>';
		$output .= '@media (min-width:992px) and (max-width: 1199px) {';
			$output .= '#rocket_info-banner-id' . esc_attr( $unique_id ). ' .rocket_info-banner-img {';
				$output .= 'height: ' . $height_desktop . 'px;';
			$output .= '}';
		$output .= '}';
	$output .= '</style>';
}

// Banner Height on Desktop Large
if ( $height_desktop_large != '' ) {
	$output .= '<style>';
		$output .= '@media (min-width: 1200px) {';
			$output .= '#rocket_info-banner-id' . esc_attr( $unique_id ). ' .rocket_info-banner-img {';
				$output .= 'height: ' . $height_desktop_large . 'px;';
			$output .= '}';
		$output .= '}';
	$output .= '</style>';
}

echo $output;
