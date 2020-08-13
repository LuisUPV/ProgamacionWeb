<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $layout_direction
 * @var $line_color
 * @var $title_color
 * @var $title_color_hover
 * @var $subtitle_color
 * @var $subtitle_color_hover
 * @var $dot_color
 * @var $dot_color_hover
 * @var $el_class
 * @var $css_animation
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Work_Steps
 */
$layout_direction = $line_color = $title_color = $title_color_hover = $subtitle_color = $subtitle_color_hover = $dot_color = $dot_color_hover = $dot_border_color = $icon_color_hover = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= 'timeline-layout--' . $layout_direction;
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Ensure HTML tags get closed
$content = force_balance_tags($content);

$timelineID = randomStr(10);

?>
<div id="timeline-<?php echo esc_attr($timelineID); ?>" class="timeline row <?php echo strlen( $css_class ) > 0 ? ' ' . trim( esc_attr( $css_class ) ) : ''; ?>">
	<?php if(function_exists('wpb_js_remove_wpautop')){ echo wpb_js_remove_wpautop($content, false);
} else { echo do_shortcode(shortcode_unautop($content)); } ?>
</div>


	<?php if ( $line_color != '' ) { ?>
	<style scoped>
		@media (min-width: 992px) {
			#timeline-<?php echo esc_attr( $timelineID ); ?>.timeline:after {
				background: <?php echo esc_attr( $line_color ); ?> !important;
			}
		}
	</style>
	<?php } ?>
	
	<?php if ( $title_color != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link h5 {
	  color: <?php echo esc_attr( $title_color ); ?>;
	}
	</style>
	<?php } ?>

	<?php if ( $title_color_hover != '' ) { ?>
	<style scoped>
	@media (min-width: 992px) {
		#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link:hover h5 {
		  color: <?php echo esc_attr( $title_color_hover ); ?>;
		}
	}
	</style>
	<?php } ?>

	<?php if ( $subtitle_color != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link > .desc-holder .desc {
	  color: <?php echo esc_attr( $subtitle_color ); ?>;
	}
	</style>
	<?php } ?>
	<?php if ( $subtitle_color_hover != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link:hover > .desc-holder .desc {
	  color: <?php echo esc_attr( $subtitle_color_hover ); ?>;
	}
	</style>
	<?php } ?>

	<?php if ( $dot_color != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link .desc-holder:before {
	  background: <?php echo esc_attr( $dot_color ); ?>;
	}
	</style>
	<?php } ?>
	<?php if ( $dot_color_hover != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link:hover .desc-holder:before {
	  background: <?php echo esc_attr( $dot_color_hover ); ?>;
	}
	</style>
	<?php } ?>
	<?php if ( $dot_border_color != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link .desc-holder:before {
	  border-color: <?php echo esc_attr( $dot_border_color ); ?>;
	}
	</style>
	<?php } ?>
	<?php if ( $icon_color_hover != '' ) { ?>
	<style scoped>
	#timeline-<?php echo esc_attr( $timelineID ); ?> > .timeline-step > .item-link .desc-holder:after {
	  color: <?php echo esc_attr( $icon_color_hover ); ?>;
	}
	</style>
	<?php } ?>

<?php if ( $layout_direction != 'vertical' ) : ?>
<script>
	;(function($){
  "use strict";

	  var timelineSteps = $('#timeline-<?php echo esc_attr($timelineID); ?> .timeline-step').length;
	  var timelineStep = $('.timeline-step');

	  if ( timelineSteps == 1 ) {
	  	timelineStep.addClass('col-md-12');
	  } else if ( timelineSteps == 2 ) {
	  	timelineStep.addClass('col-md-6');
	  } else if ( timelineSteps == 3 ) {
	  	timelineStep.addClass('col-md-4');
	  } else if ( timelineSteps == 4 ) {
	  	timelineStep.addClass('col-md-3');
	  } else if ( timelineSteps == 6 ) {
	  	timelineStep.addClass('col-md-2');
	  }

	})(jQuery);
</script>
<?php endif; ?>
