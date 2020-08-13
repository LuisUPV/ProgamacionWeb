<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $type
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $color
 * @var $custom_color
 * @var $background_style
 * @var $background_color
 * @var $custom_background_color
 * @var $title_color
 * @var $custom_title_color
 * @var $size
 * @var $align
 * @var $el_class
 * @var $link
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_IconBox
 */
$title = $type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = $color = $custom_color = $background_style = $background_color = $custom_background_color = $title_color = $custom_title_color = $size = $align = $el_class = $link = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $type );

$url = vc_build_link( $link );
$has_style = false;
if ( strlen( $background_style ) > 0 ) {
	$has_style = true;
	if ( false !== strpos( $background_style, 'outline' ) ) {
		$background_style .= ' rocket_icon_box-outline'; // if we use outline style it is border in css
	} else {
		$background_style .= ' rocket_icon_box-background';
	}
}

$iconClass = isset( ${'icon_' . $type} ) ? esc_attr( ${'icon_' . $type} ) : 'fa fa-adjust';

$style = '';
if ( 'custom' === $background_color ) {
	if ( false !== strpos( $background_style, 'outline' ) ) {
		$style = 'border-color:' . $custom_background_color;
	} else {
		$style = 'background-color:' . $custom_background_color;
	}
}
$style = $style ? ' style="' . esc_attr( $style ) . '"' : '';

$title_icon_style = '';
if ( 'custom' === $title_color ) {
	$title_icon_style = 'color:' . $custom_title_color;
}
$title_icon_style = $title_icon_style ? ' style="' . esc_attr( $title_icon_style ) . '"' : '';

?>
<div
	class="rocket_icon_box rocket_icon_box-outer<?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?> rocket_icon_box-align-<?php echo esc_attr( $align ); ?><?php if ( $has_style ) { echo ' rocket_icon_box-have-style'; } ?>">
	<div class="rocket_icon_box-inner rocket_icon_box-color-<?php echo esc_attr( $color ); ?><?php if ( $has_style ) { echo ' rocket_icon_box-have-style-inner'; } ?> rocket_icon_box-size-<?php echo esc_attr( $size ); ?> rocket_icon_box-style-<?php echo esc_attr( $background_style ); ?> rocket_icon_box-background-color-<?php echo esc_attr( $background_color ); ?>"<?php echo $style; ?>><span class="rocket_icon_box-icon <?php echo esc_attr( $iconClass ); ?>" <?php echo( 'custom' === $color ? 'style="color:' . esc_attr( $custom_color ) . ' !important"' : '' ); ?>></span><?php
			if ( strlen( $link ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a class="rocket_icon_box-link" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"></a>';
			}
		?></div>
	<div class="rocket_icon_box-text">
		<?php if ( $size == 'lg' || $size == 'xl' || $size == 'md' ) { ?>
		<h3 <?php echo $title_icon_style; ?>><?php echo strlen( $title ) > 0 ? ' ' . trim( esc_attr( $title ) ) : 'Lorem Ipsum'; ?></h3>
		<?php } else { ?>
		<h5 <?php echo $title_icon_style; ?>><?php echo strlen( $title ) > 0 ? ' ' . trim( esc_attr( $title ) ) : 'Lorem Ipsum'; ?></h5>
		<?php } ?>
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div>
</div>
