<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $subtitle
 * @var $description
 * @var $icon_type
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $color
 * @var $customcolor
 * @var $el_class
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Accordion_Panel
 */
$title = $subtitle = $description = $icon_type = $icon_fontawesome = $icon_openiconic = $icon_typicons =
$icon_entypo = $icon_linecons = $color = $customcolor = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );

$iconClass = isset( ${'icon_' . $icon_type} ) ? esc_attr( ${'icon_' . $icon_type} ) : 'fa fa-adjust';

$style = '';
if ( 'custom' === $color ) {
	$style = 'background-color:' . $customcolor;
}
$style = $style ? ' style=' . esc_attr( $style ) : '';

$heading_id = randomStr(10);
$panel_id   = randomStr(10);

?>

<!-- Panel -->
<div class="panel panel-default <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>">
	<!-- Panel Heading -->
	<div class="panel-heading" role="tab" id="panel-heading-<?php echo esc_attr( $heading_id ); ?>">
		<div class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion-advanced" href="#panel-<?php echo esc_attr( $panel_id ); ?>" aria-expanded="false" aria-controls="panel-<?php echo esc_attr( $panel_id ); ?>">
				<div class="row">
					<div class="col-md-2 col-sm-1 col-xs-1 panel-title__number"></div>
					<div class="col-md-3 col-sm-8 col-xs-9 panel-title__heading">
						<div class="v-center">
							<div class="v-center-inner">
								<div class="hgroup-panel">
									<h3><?php echo strlen( $title ) > 0 ? ' ' . trim( esc_attr( $title ) ) : 'Sample Title'; ?></h3>
									<?php echo strlen( $subtitle ) > 0 ? '<h5>' . trim( esc_attr( $subtitle ) ) . '</h5>' : ' '; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 hidden-xs">
						<span class="circled-icon icon-color-<?php echo esc_attr( $color ); ?> <?php echo esc_attr( $iconClass ); ?>" <?php echo esc_attr( $style ); ?>></span>
					</div>
					<div class="col-md-3 col-xs-12 panel-title__desc">
						<div class="v-center">
							<div class="v-center-inner">
								<?php echo strlen( $description ) > 0 ? ' ' . trim( esc_attr( $description ) ) : 'Short description goes here'; ?>
							</div>
						</div>
					</div>
					<div class="col-md-2 panel-title__close">
						<span class="panel-icon"></span>
					</div>
				</div>
			</a>
		</div>
	</div>
	<!-- Panel Heading / End -->
	<!-- Panel Content -->
	<div id="panel-<?php echo esc_attr( $panel_id ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panel-heading-<?php echo esc_attr( $heading_id ); ?>">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php echo wpb_js_remove_wpautop($content, true); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Panel Content / End -->
</div>
<!-- Panel / End -->
