<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Rocket_Countdown
 */
$date_event = $days_color = $days_number_color = $days_border_color = $days_text_color = $hours_color = $hours_number_color = $hours_border_color = $hours_text_color = $mins_color = $mins_number_color = $mins_border_color = $mins_text_color = $secs_color = $secs_number_color = $secs_border_color = $secs_text_color = $days_text = $hours_text = $minutes_text = $seconds_text = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

wp_enqueue_script('jcountdown');

$countdownID = randomStr(10);

?>

<div id="countdown-<?php echo esc_attr( $countdownID ); ?>" class="countdown countdown__color-circles countdown__sm <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>"></div>

<?php if ( $days_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .days-count {
		background: <?php echo esc_attr( $days_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $days_number_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .days-count {
		color: <?php echo esc_attr( $days_number_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $days_border_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .days-count:before {
		border-color: <?php echo esc_attr( $days_border_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $days_text_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .days-label {
		color: <?php echo esc_attr( $days_text_color ); ?>;
	}
</style>
<?php } ?>


<?php if ( $hours_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .hours-count {
		background: <?php echo esc_attr( $hours_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $hours_number_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .hours-count {
		color: <?php echo esc_attr( $hours_number_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $hours_border_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .hours-count:before {
		border-color: <?php echo esc_attr( $hours_border_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $hours_text_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .hours-label {
		color: <?php echo esc_attr( $hours_text_color ); ?>;
	}
</style>
<?php } ?>


<?php if ( $mins_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .mins-count {
		background: <?php echo esc_attr( $mins_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $mins_number_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .mins-count {
		color: <?php echo esc_attr( $mins_number_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $mins_border_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .mins-count:before {
		border-color: <?php echo esc_attr( $mins_border_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $mins_text_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .mins-label {
		color: <?php echo esc_attr( $mins_text_color ); ?>;
	}
</style>
<?php } ?>


<?php if ( $secs_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .secs-count {
		background: <?php echo esc_attr( $secs_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $secs_number_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .secs-count {
		color: <?php echo esc_attr( $secs_number_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $secs_border_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .secs-count:before {
		border-color: <?php echo esc_attr( $secs_border_color ); ?>;
	}
</style>
<?php } ?>

<?php if ( $secs_text_color != '' ) { ?>
<style scoped>
	#countdown-<?php echo esc_attr( $countdownID ); ?> .secs-label {
		color: <?php echo esc_attr( $secs_text_color ); ?>;
	}
</style>
<?php } ?>

<script>
	jQuery(document).ready(function($) {
		$("#countdown-<?php echo esc_js( $countdownID ); ?>").countdown({
			date: "<?php echo strlen( $date_event ) > 0 ? ' ' . trim( esc_attr( $date_event ) ) : 'september 1, 2016 09:59'; ?>",
			dayText: '',
			daySingularText: '',
			hourText: '',
			hourSingularText: '',
			minText: '',
			minSingularText: '',
			secText: '',
	    secSingularText: '',
	    template: "<div id='days' class='holder col-sm-3'><div class='days-count number'>%d</div><div class='days-label desc'><?php echo esc_js( $days_text ); ?></div></div><div id='hours' class='holder col-sm-3'><div class='hours-count number'>%h</div><div class='hours-label desc'><?php echo esc_js( $hours_text ); ?></div></div><div id='mins' class='holder col-sm-3'><div class='mins-count number'>%i</div><div class='mins-label desc'><?php echo esc_js( $minutes_text ); ?></div></div><div id='secs' class='holder col-sm-3'><div class='secs-count number'>%s</div><div class='secs-label desc'><?php echo esc_js( $seconds_text ); ?></div></div>"
		});
	});
</script>
