<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Rocket
 */
?>

<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

	<aside id="search" class="widget widget__sidebar widget_search">
		<?php get_search_form(); ?>
	</aside>

	<aside id="archives" class="widget widget__sidebar widget_archive">
		<h3 class="widget-title"><?php esc_html_e( 'Archives', 'rocket' ); ?></h3>
		<ul>
			<?php wp_get_archives(array(
			'type' => 'monthly'
			)); ?>
		</ul>
	</aside>

	<aside id="meta" class="widget widget__sidebar widget_meta">
		<h3 class="widget-title"><?php esc_html_e( 'Meta', 'rocket' ); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>

<?php endif; // end sidebar widget area ?>
