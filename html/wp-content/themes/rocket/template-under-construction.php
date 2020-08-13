<?php

/*
Template Name: Under Construction
*/


get_header('blank');

$rocket_data = get_option('rocket_data'); 
$date  = $rocket_data['rocket__opt-under-construction-datepicker'];
$days  = $rocket_data['rocket__opt-under-construction-days-txt'];
$hours = $rocket_data['rocket__opt-under-construction-hours-txt'];
$mins  = $rocket_data['rocket__opt-under-construction-mins-txt'];
$secs  = $rocket_data['rocket__opt-under-construction-secs-txt'];
?>

<div class="container">
	<header class="page-under-construction-header">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php the_title( '<h1>', '</h1>' ); ?>
				<?php if ( $rocket_data['rocket__opt-under-construction-divider'] == 1 ) { ?>
				<div class="dots-divider">
					<span class="dot1"></span>
					<span class="dot2"></span>
					<span class="dot3"></span>
				</div>
				<?php } else { ?>
				<div class="gap-30"></div>
				<?php } ?>
				<div class="page-under-construction-desc">
					<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

					<?php endwhile; // End of the loop. ?>
				</div>
			</div>
		</div>

		<!-- Countdown -->
		<div class="row">
			<div id="countdown" class="countdown"></div>
		</div>
		<!-- Countdown / End -->

		<script>
			jQuery(function($){
				$("#countdown").countdown({
        date: "<?php echo esc_js($date); ?>",
        dayText: '',
        daySingularText: '',
        hourText: '',
        hourSingularText: '',
        minText: '',
        minSingularText: '',
        secText: '',
        secSingularText: '',
        template: "<div id='days' class='holder col-sm-3'><div class='days-count number'>%d</div><div class='days-label desc'><?php echo esc_js($days); ?></div></div><div id='hours' class='holder col-sm-3'><div class='hours-count number'>%h</div><div class='hours-label desc'><?php echo esc_js($hours); ?></div></div><div id='mins' class='holder col-sm-3'><div class='mins-count number'>%i</div><div class='mins-label desc'><?php echo esc_js($mins); ?></div></div><div id='secs' class='holder col-sm-3'><div class='secs-count number'>%s</div><div class='secs-label desc'><?php echo esc_js($secs); ?></div></div>"
      });
			});
	</script>

	</header>
</div>

<?php get_footer('social'); ?>