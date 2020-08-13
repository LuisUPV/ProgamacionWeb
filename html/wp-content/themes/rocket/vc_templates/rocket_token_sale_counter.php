<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $subtitle
 * @var $end_date
 * @var $progress_value_current
 * @var $progress_value_target
 * @var $target_label
 * @var $min_label
 * @var $min_amount
 * @var $soft_cap_label
 * @var $soft_cap_value
 * @var $btn_link
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Token_Sale_Counter
 */
$title = $subtitle = $end_date = $progress_value_current = $progress_value_target = $target_label = $min_label = $min_amount = $soft_cap_label = $soft_cap_value = $btn_link = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'token-sale-counter';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$btn_link = vc_build_link( $btn_link );

wp_enqueue_script('jcountdown');

$unique_id = randomStr(10);

$output = '<div id="rocket_token-sale-counter-' . esc_attr( $unique_id ) . '" class="' . esc_attr( $css_class ) . '">';
	$output .= '<div class="token-sale-counter__header">';
		$output .= '<h3 class="token-sale-counter__title">' . $title . '</h3>';
		$output .= '<div class="token-sale-counter__countdown" id="rocket_token-sale-countdown-' . esc_attr( $unique_id ) . '"></div>';
	$output .= '</div>';
	$output .= '<div class="token-sale-counter__progress">';
		$output .= '<h4 class="token-sale-counter__subtitle">' . $subtitle . '</h4>';
		$output .= '<div class="progress">';
			$output .= '<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="' . esc_attr( $progress_value_current ). '%" aria-valuemin="0" aria-valuemax="100" style="width: ' . esc_attr( $progress_value_current ). '%;">';
				$output .= $progress_value_current . '%';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="token-sale-counter__info">';
		$output .= '<ul class="token-sale-counter__info-list list-unstyled">';
			$output .= '<li class="token-sale-counter__info-list-item">';
				$output .= '<span class="token-sale-counter__info-list-item-label">' . $soft_cap_label . '</span>';
				$output .= '<strong class="token-sale-counter__info-list-item-value"> ' . $soft_cap_value . '</strong>';
			$output .= '</li>';
			$output .= '<li class="token-sale-counter__info-list-item">';
				$output .= '<span class="token-sale-counter__info-list-item-label">' . $min_label . '</span>';
				$output .= '<strong class="token-sale-counter__info-list-item-value"> ' . $min_amount . '</strong>';
			$output .= '</li>';
			$output .= '<li class="token-sale-counter__info-list-item">';
				$output .= '<span class="token-sale-counter__info-list-item-label">' . $target_label . '</span>';
				$output .= '<strong class="token-sale-counter__info-list-item-value"> ' . $target_amount . '</strong>';
			$output .= '</li>';
			$output .= '<li class="token-sale-counter__info-list-item"></li>';
		$output .= '</ul>';
	$output .= '</div>';
	$output .= '<div class="token-sale-counter__footer">';
		if ( ! empty( $btn_link['url'] ) ) {
			$output .= '<a class="token-sale-counter__footer-btn btn btn-primary btn-block btn-has-icon icon-right" href="' . esc_attr( $btn_link['url'] ) . '"'
				. ( $btn_link['target'] ? ' target="' . esc_attr( $btn_link['target'] ) . '"' : '' )
				. ( $btn_link['title'] ? ' title="' . esc_attr( $btn_link['title'] ) . '"' : '' )
				. '>' . esc_html( $btn_link['title'] ) . '<i class="btn-icon fa fa-arrow-circle-o-right"></i></a>';
		}
	$output .= '</div>';
$output .= '</div>';

echo $output;
?>

<script>
	jQuery(document).ready(function($) {
		$("#rocket_token-sale-countdown-<?php echo esc_js( $unique_id ); ?>").countdown({
			date: "<?php echo strlen( $end_date ) > 0 ? ' ' . trim( esc_attr( $end_date ) ) : 'December 31, 2018 10:00'; ?>",
			dayText: '',
			daySingularText: '',
			hourText: '',
			hourSingularText: '',
			minText: '',
			minSingularText: '',
			secText: '',
	    secSingularText: '',
	    template: "<div id='days' class='token-sale-counter__countdown-item'><div class='days-count number'>%d</div><div class='days-label desc'><?php esc_html_e( 'Days', 'rocket' ); ?></div></div><div id='hours' class='token-sale-counter__countdown-item'><div class='hours-count number'>%h</div><div class='hours-label desc'><?php esc_html_e( 'Hours', 'rocket' ); ?></div></div><div id='mins' class='token-sale-counter__countdown-item'><div class='mins-count number'>%i</div><div class='mins-label desc'><?php esc_html_e( 'Minutes', 'rocket' ); ?></div></div><div id='secs' class='token-sale-counter__countdown-item'><div class='secs-count number'>%s</div><div class='secs-label desc'><?php esc_html_e( 'Seconds', 'rocket' ); ?></div></div>"
		});
	});
</script>
