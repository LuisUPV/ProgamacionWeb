<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Accordion
 */
$el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Visual Composer helper function
if(function_exists('wpb_js_remove_wpautop')){ $content = wpb_js_remove_wpautop($content, false);
} else { $content = do_shortcode(shortcode_unautop($content)); }

// Ensure HTML tags get closed
$content = force_balance_tags($content);
?>

<div class="panel-group panel-group__features panel-icon__effect2 <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>" id="accordion-advanced" role="tablist" aria-multiselectable="true">
	<?php if(function_exists('wpb_js_remove_wpautop')){ echo wpb_js_remove_wpautop($content, false);
} else { echo do_shortcode(shortcode_unautop($content)); } ?>
</div>
