<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rocket
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rocket_body_classes( $classes ) {
	global $rocket_data;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class for Sticky Header
	if ( isset($rocket_data['rocket_opt-sticky-header'])) {
		$sticky_header = $rocket_data['rocket_opt-sticky-header'];
	} else {
		$sticky_header = '1';
	}

	if ( $sticky_header == '1' ) {
		$classes[] = 'sticky-header';
	}

	return $classes;
}
add_filter( 'body_class', 'rocket_body_classes' );




/**
 * Adds custom theme to Mega Menu plugin.
 *
 * @param array $themes Theme styles for Mega menu.
 * @return array
 */
function rocket_megamenu_add_theme_rocket($themes) {
	$themes["rocket"] = array(
		'title' => 'Rocket',
		'container_background_from' => 'rgba(255, 255, 255, 0)',
		'container_background_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_align' => 'right',
		'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
		'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_link_height' => '44px',
		'menu_item_link_color' => 'rgb(255, 255, 255)',
		'menu_item_link_weight' => 'bold',
		'menu_item_link_text_transform' => 'uppercase',
		'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
		'menu_item_link_weight_hover' => 'bold',
		'menu_item_link_padding_left' => '14px',
		'menu_item_link_padding_right' => '14px',
		'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
		'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
		'menu_item_highlight_current' => 'on',
		'panel_background_from' => 'rgb(255, 255, 255)',
		'panel_background_to' => 'rgb(255, 255, 255)',
		'panel_header_color' => 'rgb(116, 105, 129)',
		'panel_header_text_transform' => 'none',
		'panel_header_font_size' => '18px',
		'panel_header_padding_top' => '15px',
		'panel_header_padding_bottom' => '10px',
		'panel_header_border_color' => '#555',
		'panel_widget_padding_top' => '0px',
		'panel_widget_padding_bottom' => '0px',
		'panel_font_size' => '15px',
		'panel_font_color' => 'rgb(101, 98, 105)',
		'panel_font_family' => 'inherit',
		'panel_second_level_font_color' => 'rgb(116, 105, 129)',
		'panel_second_level_font_color_hover' => 'rgb(116, 105, 129)',
		'panel_second_level_text_transform' => 'none',
		'panel_second_level_font' => 'inherit',
		'panel_second_level_font_size' => '18px',
		'panel_second_level_font_weight' => 'normal',
		'panel_second_level_font_weight_hover' => 'normal',
		'panel_second_level_text_decoration' => 'none',
		'panel_second_level_text_decoration_hover' => 'none',
		'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_second_level_padding_left' => '24px',
		'panel_second_level_padding_right' => '24px',
		'panel_second_level_padding_top' => '14px',
		'panel_second_level_padding_bottom' => '14px',
		'panel_second_level_border_color' => 'rgb(210, 210, 221)',
		'panel_second_level_border_bottom' => '1px',
		'panel_third_level_font_color' => 'rgb(116, 105, 129)',
		'panel_third_level_font_color_hover' => 'rgb(116, 105, 129)',
		'panel_third_level_font' => 'inherit',
		'panel_third_level_font_size' => '16px',
		'panel_third_level_font_weight_hover' => 'bold',
		'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_third_level_padding_left' => '24px',
		'panel_third_level_padding_right' => '24px',
		'panel_third_level_padding_top' => '14px',
		'panel_third_level_padding_bottom' => '14px',
		'flyout_width' => '250px',
		'flyout_menu_background_from' => 'rgb(255, 255, 255)',
		'flyout_menu_background_to' => 'rgb(255, 255, 255)',
		'flyout_menu_item_divider' => 'on',
		'flyout_menu_item_divider_color' => 'rgb(210, 210, 221)',
		'flyout_link_padding_left' => '24px',
		'flyout_link_padding_right' => '24px',
		'flyout_link_padding_top' => '14px',
		'flyout_link_padding_bottom' => '14px',
		'flyout_link_height' => '28px',
		'flyout_background_from' => 'rgb(255, 255, 255)',
		'flyout_background_to' => 'rgb(255, 255, 255)',
		'flyout_background_hover_from' => 'rgb(249, 250, 251)',
		'flyout_background_hover_to' => 'rgb(249, 250, 251)',
		'flyout_link_size' => '18px',
		'flyout_link_color' => 'rgb(116, 105, 129)',
		'flyout_link_color_hover' => 'rgb(116, 105, 129)',
		'flyout_link_family' => 'inherit',
		'responsive_breakpoint' => '991px',
		'shadow' => 'on',
		'shadow_vertical' => '3px',
		'shadow_blur' => '12px',
		'shadow_color' => 'rgba(0, 0, 0, 0.15)',
		'transitions' => 'on',
		'resets' => 'on',
		'toggle_background_from' => 'rgba(255, 255, 255, 0)',
		'toggle_background_to' => 'rgba(255, 255, 255, 0)',
		'toggle_font_color' => 'rgb(255, 255, 255)',
		'mobile_background_from' => 'rgb(54, 39, 76)',
		'mobile_background_to' => 'rgb(54, 39, 76)',
		'custom_css' => '#{$wrap} #{$menu} {
/** Custom styles should be added below this line **/
}
#{$wrap} {
clear: both;
}
#{$wrap} #{$menu} {
li.mega-menu-item {

		a:before {
			margin:0 8px 0 0;
			font-weight: 400;
			color: #bfbfbf;
			font-size: 18px;
		}
}
}',
		);


	$themes["rocket_blue"] = array(
		'title' => 'Rocket - Blue',
		'container_background_from' => 'rgba(255, 255, 255, 0)',
		'container_background_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_align' => 'right',
		'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
		'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_link_height' => '44px',
		'menu_item_link_color' => 'rgb(255, 255, 255)',
		'menu_item_link_weight' => 'bold',
		'menu_item_link_text_transform' => 'uppercase',
		'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
		'menu_item_link_weight_hover' => 'bold',
		'menu_item_link_padding_left' => '14px',
		'menu_item_link_padding_right' => '14px',
		'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
		'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
		'menu_item_highlight_current' => 'on',
		'panel_background_from' => 'rgb(255, 255, 255)',
		'panel_background_to' => 'rgb(255, 255, 255)',
		'panel_header_color' => 'rgb(106, 107, 128)',
		'panel_header_text_transform' => 'none',
		'panel_header_font_size' => '18px',
		'panel_header_padding_top' => '15px',
		'panel_header_padding_bottom' => '10px',
		'panel_header_border_color' => '#555',
		'panel_widget_padding_top' => '0px',
		'panel_widget_padding_bottom' => '0px',
		'panel_font_size' => '15px',
		'panel_font_color' => 'rgb(101, 98, 105)',
		'panel_font_family' => 'inherit',
		'panel_second_level_font_color' => 'rgb(106, 107, 128)',
		'panel_second_level_font_color_hover' => 'rgb(106, 107, 128)',
		'panel_second_level_text_transform' => 'none',
		'panel_second_level_font' => 'inherit',
		'panel_second_level_font_size' => '18px',
		'panel_second_level_font_weight' => 'normal',
		'panel_second_level_font_weight_hover' => 'normal',
		'panel_second_level_text_decoration' => 'none',
		'panel_second_level_text_decoration_hover' => 'none',
		'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_second_level_padding_left' => '24px',
		'panel_second_level_padding_right' => '24px',
		'panel_second_level_padding_top' => '14px',
		'panel_second_level_padding_bottom' => '14px',
		'panel_second_level_border_color' => 'rgb(210, 210, 221)',
		'panel_second_level_border_bottom' => '1px',
		'panel_third_level_font_color' => 'rgb(106, 107, 128)',
		'panel_third_level_font_color_hover' => 'rgb(106, 107, 128)',
		'panel_third_level_font' => 'inherit',
		'panel_third_level_font_size' => '16px',
		'panel_third_level_font_weight_hover' => 'bold',
		'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_third_level_padding_left' => '24px',
		'panel_third_level_padding_right' => '24px',
		'panel_third_level_padding_top' => '14px',
		'panel_third_level_padding_bottom' => '14px',
		'flyout_width' => '250px',
		'flyout_menu_background_from' => 'rgb(255, 255, 255)',
		'flyout_menu_background_to' => 'rgb(255, 255, 255)',
		'flyout_menu_item_divider' => 'on',
		'flyout_menu_item_divider_color' => 'rgb(210, 210, 221)',
		'flyout_link_padding_left' => '24px',
		'flyout_link_padding_right' => '24px',
		'flyout_link_padding_top' => '14px',
		'flyout_link_padding_bottom' => '14px',
		'flyout_link_height' => '28px',
		'flyout_background_from' => 'rgb(255, 255, 255)',
		'flyout_background_to' => 'rgb(255, 255, 255)',
		'flyout_background_hover_from' => 'rgb(249, 250, 251)',
		'flyout_background_hover_to' => 'rgb(249, 250, 251)',
		'flyout_link_size' => '18px',
		'flyout_link_color' => 'rgb(106, 107, 128)',
		'flyout_link_color_hover' => 'rgb(106, 107, 128)',
		'flyout_link_family' => 'inherit',
		'responsive_breakpoint' => '991px',
		'shadow' => 'on',
		'shadow_vertical' => '3px',
		'shadow_blur' => '12px',
		'shadow_color' => 'rgba(0, 0, 0, 0.15)',
		'transitions' => 'on',
		'resets' => 'on',
		'toggle_background_from' => 'rgba(255, 255, 255, 0)',
		'toggle_background_to' => 'rgba(255, 255, 255, 0)',
		'toggle_font_color' => 'rgb(255, 255, 255)',
		'mobile_background_from' => 'rgb(26, 39, 88)',
		'mobile_background_to' => 'rgb(26, 39, 88)',
		'custom_css' => '#{$wrap} #{$menu} {
/** Custom styles should be added below this line **/
}
#{$wrap} {
clear: both;
}
#{$wrap} #{$menu} {
li.mega-menu-item {

		a:before {
			margin:0 8px 0 0;
			font-weight: 400;
			color: #bfbfbf;
			font-size: 18px;
		}
}
}',
		);


	$themes["rocket_pink"] = array(
		'title' => 'Rocket - Pink',
		'container_background_from' => 'rgba(255, 255, 255, 0)',
		'container_background_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_align' => 'right',
		'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
		'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
		'menu_item_link_height' => '44px',
		'menu_item_link_color' => 'rgb(255, 255, 255)',
		'menu_item_link_weight' => 'bold',
		'menu_item_link_text_transform' => 'uppercase',
		'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
		'menu_item_link_weight_hover' => 'bold',
		'menu_item_link_padding_left' => '14px',
		'menu_item_link_padding_right' => '14px',
		'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
		'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
		'menu_item_highlight_current' => 'on',
		'panel_background_from' => 'rgb(255, 255, 255)',
		'panel_background_to' => 'rgb(255, 255, 255)',
		'panel_header_color' => 'rgb(170, 0, 86)',
		'panel_header_text_transform' => 'none',
		'panel_header_font_size' => '18px',
		'panel_header_padding_top' => '15px',
		'panel_header_padding_bottom' => '10px',
		'panel_header_border_color' => '#555',
		'panel_widget_padding_top' => '0px',
		'panel_widget_padding_bottom' => '0px',
		'panel_font_size' => '15px',
		'panel_font_color' => 'rgb(101, 98, 105)',
		'panel_font_family' => 'inherit',
		'panel_second_level_font_color' => 'rgb(170, 0, 86)',
		'panel_second_level_font_color_hover' => 'rgb(170, 0, 86)',
		'panel_second_level_text_transform' => 'none',
		'panel_second_level_font' => 'inherit',
		'panel_second_level_font_size' => '18px',
		'panel_second_level_font_weight' => 'normal',
		'panel_second_level_font_weight_hover' => 'normal',
		'panel_second_level_text_decoration' => 'none',
		'panel_second_level_text_decoration_hover' => 'none',
		'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_second_level_padding_left' => '24px',
		'panel_second_level_padding_right' => '24px',
		'panel_second_level_padding_top' => '14px',
		'panel_second_level_padding_bottom' => '14px',
		'panel_second_level_border_color' => 'rgb(210, 210, 221)',
		'panel_second_level_border_bottom' => '1px',
		'panel_third_level_font_color' => 'rgb(170, 0, 86)',
		'panel_third_level_font_color_hover' => 'rgb(170, 0, 86)',
		'panel_third_level_font' => 'inherit',
		'panel_third_level_font_size' => '16px',
		'panel_third_level_font_weight_hover' => 'bold',
		'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
		'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
		'panel_third_level_padding_left' => '24px',
		'panel_third_level_padding_right' => '24px',
		'panel_third_level_padding_top' => '14px',
		'panel_third_level_padding_bottom' => '14px',
		'flyout_width' => '250px',
		'flyout_menu_background_from' => 'rgb(255, 255, 255)',
		'flyout_menu_background_to' => 'rgb(255, 255, 255)',
		'flyout_menu_item_divider' => 'on',
		'flyout_menu_item_divider_color' => 'rgb(210, 210, 221)',
		'flyout_link_padding_left' => '24px',
		'flyout_link_padding_right' => '24px',
		'flyout_link_padding_top' => '14px',
		'flyout_link_padding_bottom' => '14px',
		'flyout_link_height' => '28px',
		'flyout_background_from' => 'rgb(255, 255, 255)',
		'flyout_background_to' => 'rgb(255, 255, 255)',
		'flyout_background_hover_from' => 'rgb(249, 250, 251)',
		'flyout_background_hover_to' => 'rgb(249, 250, 251)',
		'flyout_link_size' => '18px',
		'flyout_link_color' => 'rgb(170, 0, 86)',
		'flyout_link_color_hover' => 'rgb(170, 0, 86)',
		'flyout_link_family' => 'inherit',
		'responsive_breakpoint' => '991px',
		'shadow' => 'on',
		'shadow_vertical' => '3px',
		'shadow_blur' => '12px',
		'shadow_color' => 'rgba(0, 0, 0, 0.15)',
		'transitions' => 'on',
		'resets' => 'on',
		'toggle_background_from' => 'rgba(255, 255, 255, 0)',
		'toggle_background_to' => 'rgba(255, 255, 255, 0)',
		'toggle_font_color' => 'rgb(255, 255, 255)',
		'mobile_background_from' => 'rgb(135, 0, 68)',
		'mobile_background_to' => 'rgb(135, 0, 68)',
		'custom_css' => '#{$wrap} #{$menu} {
/** Custom styles should be added below this line **/
}
#{$wrap} {
clear: both;
}
#{$wrap} #{$menu} {
li.mega-menu-item {

		a:before {
			margin:0 8px 0 0;
			font-weight: 400;
			color: #bfbfbf;
			font-size: 18px;
		}
}
}',
		);


		$themes["rocket_dark"] = array(
			'title' => 'Rocket - Dark',
			'container_background_from' => 'rgba(255, 255, 255, 0)',
			'container_background_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_align' => 'right',
			'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
			'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_link_height' => '44px',
			'menu_item_link_color' => 'rgb(255, 255, 255)',
			'menu_item_link_weight' => 'bold',
			'menu_item_link_text_transform' => 'uppercase',
			'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
			'menu_item_link_weight_hover' => 'bold',
			'menu_item_link_padding_left' => '14px',
			'menu_item_link_padding_right' => '14px',
			'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
			'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
			'menu_item_highlight_current' => 'on',
			'panel_background_from' => 'rgb(255, 255, 255)',
			'panel_background_to' => 'rgb(255, 255, 255)',
			'panel_header_color' => 'rgb(101, 98, 105)',
			'panel_header_text_transform' => 'none',
			'panel_header_font_size' => '18px',
			'panel_header_padding_top' => '15px',
			'panel_header_padding_bottom' => '10px',
			'panel_header_border_color' => '#555',
			'panel_widget_padding_top' => '0px',
			'panel_widget_padding_bottom' => '0px',
			'panel_font_size' => '15px',
			'panel_font_color' => 'rgb(101, 98, 105)',
			'panel_font_family' => 'inherit',
			'panel_second_level_font_color' => 'rgb(131, 131, 131)',
			'panel_second_level_font_color_hover' => 'rgb(131, 131, 131)',
			'panel_second_level_text_transform' => 'none',
			'panel_second_level_font' => 'inherit',
			'panel_second_level_font_size' => '18px',
			'panel_second_level_font_weight' => 'normal',
			'panel_second_level_font_weight_hover' => 'normal',
			'panel_second_level_text_decoration' => 'none',
			'panel_second_level_text_decoration_hover' => 'none',
			'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_second_level_padding_left' => '24px',
			'panel_second_level_padding_right' => '24px',
			'panel_second_level_padding_top' => '14px',
			'panel_second_level_padding_bottom' => '14px',
			'panel_second_level_border_color' => 'rgb(213, 213, 213)',
			'panel_second_level_border_bottom' => '1px',
			'panel_third_level_font_color' => 'rgb(131, 131, 131)',
			'panel_third_level_font_color_hover' => 'rgb(131, 131, 131)',
			'panel_third_level_font' => 'inherit',
			'panel_third_level_font_size' => '16px',
			'panel_third_level_font_weight_hover' => 'bold',
			'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_third_level_padding_left' => '24px',
			'panel_third_level_padding_right' => '24px',
			'panel_third_level_padding_top' => '14px',
			'panel_third_level_padding_bottom' => '14px',
			'flyout_width' => '250px',
			'flyout_menu_background_from' => 'rgb(255, 255, 255)',
			'flyout_menu_background_to' => 'rgb(255, 255, 255)',
			'flyout_menu_item_divider' => 'on',
			'flyout_menu_item_divider_color' => 'rgb(213, 213, 213)',
			'flyout_link_padding_left' => '24px',
			'flyout_link_padding_right' => '24px',
			'flyout_link_padding_top' => '14px',
			'flyout_link_padding_bottom' => '14px',
			'flyout_link_height' => '28px',
			'flyout_background_from' => 'rgb(255, 255, 255)',
			'flyout_background_to' => 'rgb(255, 255, 255)',
			'flyout_background_hover_from' => 'rgb(249, 250, 251)',
			'flyout_background_hover_to' => 'rgb(249, 250, 251)',
			'flyout_link_size' => '18px',
			'flyout_link_color' => 'rgb(131, 131, 131)',
			'flyout_link_color_hover' => 'rgb(131, 131, 131)',
			'flyout_link_family' => 'inherit',
			'responsive_breakpoint' => '991px',
			'shadow' => 'on',
			'shadow_vertical' => '3px',
			'shadow_blur' => '12px',
			'shadow_color' => 'rgba(0, 0, 0, 0.15)',
			'transitions' => 'on',
			'resets' => 'on',
			'toggle_background_from' => 'rgba(255, 255, 255, 0)',
			'toggle_background_to' => 'rgba(255, 255, 255, 0)',
			'toggle_font_color' => 'rgb(255, 255, 255)',
			'mobile_background_from' => 'rgb(51, 51, 51)',
			'mobile_background_to' => 'rgb(51, 51, 51)',
			'custom_css' => '#{$wrap} #{$menu} {
	/** Custom styles should be added below this line **/
	}
	#{$wrap} {
	clear: both;
	}
	#{$wrap} #{$menu} {
	li.mega-menu-item {

			a:before {
				margin:0 8px 0 0;
				font-weight: 400;
				color: #bfbfbf;
				font-size: 18px;
			}
	}
	}',
			);


		$themes["rocket_red"] = array(
			'title' => 'Rocket - Red',
			'container_background_from' => 'rgba(255, 255, 255, 0)',
			'container_background_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_align' => 'right',
			'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
			'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_link_height' => '44px',
			'menu_item_link_color' => 'rgb(255, 255, 255)',
			'menu_item_link_weight' => 'bold',
			'menu_item_link_text_transform' => 'uppercase',
			'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
			'menu_item_link_weight_hover' => 'bold',
			'menu_item_link_padding_left' => '14px',
			'menu_item_link_padding_right' => '14px',
			'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
			'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
			'menu_item_highlight_current' => 'on',
			'panel_background_from' => 'rgb(255, 255, 255)',
			'panel_background_to' => 'rgb(255, 255, 255)',
			'panel_header_color' => 'rgb(152, 71, 71)',
			'panel_header_text_transform' => 'none',
			'panel_header_font_size' => '18px',
			'panel_header_padding_top' => '15px',
			'panel_header_padding_bottom' => '10px',
			'panel_header_border_color' => '#555',
			'panel_widget_padding_top' => '0px',
			'panel_widget_padding_bottom' => '0px',
			'panel_font_size' => '15px',
			'panel_font_color' => 'rgb(101, 98, 105)',
			'panel_font_family' => 'inherit',
			'panel_second_level_font_color' => 'rgb(152, 71, 71)',
			'panel_second_level_font_color_hover' => 'rgb(152, 71, 71)',
			'panel_second_level_text_transform' => 'none',
			'panel_second_level_font' => 'inherit',
			'panel_second_level_font_size' => '18px',
			'panel_second_level_font_weight' => 'normal',
			'panel_second_level_font_weight_hover' => 'normal',
			'panel_second_level_text_decoration' => 'none',
			'panel_second_level_text_decoration_hover' => 'none',
			'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_second_level_padding_left' => '24px',
			'panel_second_level_padding_right' => '24px',
			'panel_second_level_padding_top' => '14px',
			'panel_second_level_padding_bottom' => '14px',
			'panel_second_level_border_color' => 'rgb(213, 213, 213)',
			'panel_second_level_border_bottom' => '1px',
			'panel_third_level_font_color' => 'rgb(152, 71, 71)',
			'panel_third_level_font_color_hover' => 'rgb(152, 71, 71)',
			'panel_third_level_font' => 'inherit',
			'panel_third_level_font_size' => '16px',
			'panel_third_level_font_weight_hover' => 'bold',
			'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_third_level_padding_left' => '24px',
			'panel_third_level_padding_right' => '24px',
			'panel_third_level_padding_top' => '14px',
			'panel_third_level_padding_bottom' => '14px',
			'flyout_width' => '250px',
			'flyout_menu_background_from' => 'rgb(255, 255, 255)',
			'flyout_menu_background_to' => 'rgb(255, 255, 255)',
			'flyout_menu_item_divider' => 'on',
			'flyout_menu_item_divider_color' => 'rgb(213, 213, 213)',
			'flyout_link_padding_left' => '24px',
			'flyout_link_padding_right' => '24px',
			'flyout_link_padding_top' => '14px',
			'flyout_link_padding_bottom' => '14px',
			'flyout_link_height' => '28px',
			'flyout_background_from' => 'rgb(255, 255, 255)',
			'flyout_background_to' => 'rgb(255, 255, 255)',
			'flyout_background_hover_from' => 'rgb(249, 250, 251)',
			'flyout_background_hover_to' => 'rgb(249, 250, 251)',
			'flyout_link_size' => '18px',
			'flyout_link_color' => 'rgb(152, 71, 71)',
			'flyout_link_color_hover' => 'rgb(152, 71, 71)',
			'flyout_link_family' => 'inherit',
			'responsive_breakpoint' => '991px',
			'shadow' => 'on',
			'shadow_vertical' => '3px',
			'shadow_blur' => '12px',
			'shadow_color' => 'rgba(0, 0, 0, 0.15)',
			'transitions' => 'on',
			'resets' => 'on',
			'toggle_background_from' => 'rgba(255, 255, 255, 0)',
			'toggle_background_to' => 'rgba(255, 255, 255, 0)',
			'toggle_font_color' => 'rgb(255, 255, 255)',
			'mobile_background_from' => 'rgb(73, 0, 0)',
			'mobile_background_to' => 'rgb(73, 0, 0)',
			'custom_css' => '#{$wrap} #{$menu} {
	/** Custom styles should be added below this line **/
	}
	#{$wrap} {
	clear: both;
	}
	#{$wrap} #{$menu} {
	li.mega-menu-item {

			a:before {
				margin:0 8px 0 0;
				font-weight: 400;
				color: #bfbfbf;
				font-size: 18px;
			}
	}
	}',
			);


		$themes["rocket_green"] = array(
			'title' => 'Rocket - Green',
			'container_background_from' => 'rgba(255, 255, 255, 0)',
			'container_background_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_align' => 'right',
			'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
			'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
			'menu_item_link_height' => '44px',
			'menu_item_link_color' => 'rgb(255, 255, 255)',
			'menu_item_link_weight' => 'bold',
			'menu_item_link_text_transform' => 'uppercase',
			'menu_item_link_color_hover' => 'rgba(255, 255, 255, 0.7)',
			'menu_item_link_weight_hover' => 'bold',
			'menu_item_link_padding_left' => '14px',
			'menu_item_link_padding_right' => '14px',
			'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
			'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
			'menu_item_highlight_current' => 'on',
			'panel_background_from' => 'rgb(255, 255, 255)',
			'panel_background_to' => 'rgb(255, 255, 255)',
			'panel_header_color' => 'rgb(113, 150, 117)',
			'panel_header_text_transform' => 'none',
			'panel_header_font_size' => '18px',
			'panel_header_padding_top' => '15px',
			'panel_header_padding_bottom' => '10px',
			'panel_header_border_color' => '#555',
			'panel_widget_padding_top' => '0px',
			'panel_widget_padding_bottom' => '0px',
			'panel_font_size' => '15px',
			'panel_font_color' => 'rgb(101, 98, 105)',
			'panel_font_family' => 'inherit',
			'panel_second_level_font_color' => 'rgb(113, 150, 117)',
			'panel_second_level_font_color_hover' => 'rgb(113, 150, 117)',
			'panel_second_level_text_transform' => 'none',
			'panel_second_level_font' => 'inherit',
			'panel_second_level_font_size' => '18px',
			'panel_second_level_font_weight' => 'normal',
			'panel_second_level_font_weight_hover' => 'normal',
			'panel_second_level_text_decoration' => 'none',
			'panel_second_level_text_decoration_hover' => 'none',
			'panel_second_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_second_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_second_level_padding_left' => '24px',
			'panel_second_level_padding_right' => '24px',
			'panel_second_level_padding_top' => '14px',
			'panel_second_level_padding_bottom' => '14px',
			'panel_second_level_border_color' => 'rgb(210, 210, 221)',
			'panel_second_level_border_bottom' => '1px',
			'panel_third_level_font_color' => 'rgb(113, 150, 117)',
			'panel_third_level_font_color_hover' => 'rgb(113, 150, 117)',
			'panel_third_level_font' => 'inherit',
			'panel_third_level_font_size' => '16px',
			'panel_third_level_font_weight_hover' => 'bold',
			'panel_third_level_background_hover_from' => 'rgb(249, 250, 251)',
			'panel_third_level_background_hover_to' => 'rgb(249, 250, 251)',
			'panel_third_level_padding_left' => '24px',
			'panel_third_level_padding_right' => '24px',
			'panel_third_level_padding_top' => '14px',
			'panel_third_level_padding_bottom' => '14px',
			'flyout_width' => '250px',
			'flyout_menu_background_from' => 'rgb(255, 255, 255)',
			'flyout_menu_background_to' => 'rgb(255, 255, 255)',
			'flyout_menu_item_divider' => 'on',
			'flyout_menu_item_divider_color' => 'rgb(210, 210, 221)',
			'flyout_link_padding_left' => '24px',
			'flyout_link_padding_right' => '24px',
			'flyout_link_padding_top' => '14px',
			'flyout_link_padding_bottom' => '14px',
			'flyout_link_height' => '28px',
			'flyout_background_from' => 'rgb(255, 255, 255)',
			'flyout_background_to' => 'rgb(255, 255, 255)',
			'flyout_background_hover_from' => 'rgb(249, 250, 251)',
			'flyout_background_hover_to' => 'rgb(249, 250, 251)',
			'flyout_link_size' => '18px',
			'flyout_link_color' => 'rgb(113, 150, 117)',
			'flyout_link_color_hover' => 'rgb(113, 150, 117)',
			'flyout_link_family' => 'inherit',
			'responsive_breakpoint' => '991px',
			'shadow' => 'on',
			'shadow_vertical' => '3px',
			'shadow_blur' => '12px',
			'shadow_color' => 'rgba(0, 0, 0, 0.15)',
			'transitions' => 'on',
			'resets' => 'on',
			'toggle_background_from' => 'rgba(255, 255, 255, 0)',
			'toggle_background_to' => 'rgba(255, 255, 255, 0)',
			'toggle_font_color' => 'rgb(255, 255, 255)',
			'mobile_background_from' => 'rgb(0, 114, 37)',
			'mobile_background_to' => 'rgb(0, 114, 37)',
			'custom_css' => '#{$wrap} #{$menu} {
	/** Custom styles should be added below this line **/
	}
	#{$wrap} {
	clear: both;
	}
	#{$wrap} #{$menu} {
	li.mega-menu-item {

			a:before {
				margin:0 8px 0 0;
				font-weight: 400;
				color: #bfbfbf;
				font-size: 18px;
			}
	}
	}',
			);


		return $themes;
}
add_filter("megamenu_themes", "rocket_megamenu_add_theme_rocket");


/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';



/**
 * Random String
 */
function randomStr($length) {
	$key = null;
		$keys = array_merge(range(0,9), range('a', 'z'));
		for($i=0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}
	return $key;
}


/**
 * Get Pricing Tables ID
 */
function rocket_pricingTableID(){
	$ids = array();
	$latest_category_posts = get_posts('post_type=pricetable&showposts=9999');
	foreach ($latest_category_posts as $catpost) {
		$title = get_the_title( $catpost->ID );
		$ids[$title] = $catpost->ID;
	}
	return $ids;
}


/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
function rocket_color_luminance( $hex, $percent ) {

	// validate hex string
	$new_hex = '#';
	if ( ! empty( $hex ) ) {
		$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );

		if ( strlen( $hex ) < 6 ) {
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}

		// convert to decimal and change luminosity
		for ($i = 0; $i < 3; $i++) {
			$dec = hexdec( substr( $hex, $i*2, 2 ) );
			$dec = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
		}
	}

	return $new_hex;
}


/* Convert hexdec color string to rgb(a) string */

function rocket_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		return $default;

		//Sanitize $color if "#" is provided
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		//Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		//Check if opacity is set(rgba or rgb)
		if($opacity){
			if(abs($opacity) > 1)
				$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}

		//Return rgb(a) color string
		return $output;
}


/**
 * Adds class to the array of body classes to hide Header Top Bar if set.
 */
function rocket_hide_header_top_bar( $classes ) {
	global $post;

	if ( is_page() || is_single() ) {
		$header_top_bar = get_post_meta( $post->ID, 'rocket_top_bar', true );

		if ( $header_top_bar == 'yes' ){
			$classes[] = 'body-hide-h-top-bar';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'rocket_hide_header_top_bar' );


/**
 * Adds class to the array of body classes to change Layout (fullwidth or boxed).
 */
function rocket_set_layout( $classes ) {
	global $rocket_data;

	if ( isset( $rocket_data['rocket__opt-layout'] )) {
		$layout = $rocket_data['rocket__opt-layout'];

		if( $layout == 2) {
			$classes[] = 'rocket_layout_boxed';
		} else {
			$classes[] = 'rocket_layout_fullwidth';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'rocket_set_layout' );


/**
 * Get all sliders in array
 * @result alias => title
 */

if ( !function_exists( 'all_rev_sliders_in_array' ) ) {
		function all_rev_sliders_in_array(){
			if (class_exists('RevSlider')) {
				$theslider     = new RevSlider();
				$arrSliders = $theslider->getArrSliders();
				$arrA     = array();
				$arrT     = array();

				foreach($arrSliders as $slider){
					$arrA[]     = $slider->getAlias();
					$arrT[]     = $slider->getTitle();
				}
				if($arrA && $arrT){
					$result = array_combine($arrA, $arrT);
				}
				else {
					$result = false;
				}
				return $result;
			}
		}
}


/**
 * Sample Data Import function
 */

if ( !function_exists( 'rocket_wbc_extended' ) ) {
	function rocket_wbc_extended( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		// Import Revolution Sliders
		if ( class_exists( 'RevSlider' ) ) {
			$wbc_sliders_array = array(
				'default'     => array('text-slider.zip','ipad-slider.zip','infographic-header.zip','iphone-slider.zip'),
				'application' => array('rocket-app-slider.zip'),
				'movie'       => array('rocket-movie-slider.zip'),
				'shop'        => array('rocket-wooshop-slider.zip')
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists(    $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

				if( is_array( $wbc_slider_import ) ){
					foreach ($wbc_slider_import as $slider_zip) {
						if ( !empty($slider_zip) && file_exists( $demo_directory_path.$slider_zip ) ) {
							$slider = new RevSlider();
							$slider->importSliderFromPost( true, true, $demo_directory_path.$slider_zip );
						}
					}
				} else{
					if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
						$slider = new RevSlider();
						$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
					}
				}
			}
		}


		// Setting Menus (Demo Default)
		$wbc_menu_array = array( 'default' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'rocket' ), 'nav_menu' );
			$onepage_menu = get_term_by( 'name', esc_html__( 'One Page Menu', 'rocket' ), 'nav_menu' );

			if ( isset( $primary_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $primary_menu->term_id,
						'onepage' => $onepage_menu->term_id
					)
				);
			}

		}

		// Setting Menus (Demo - Application)
		$wbc_menu_array_app = array( 'application' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_app ) ) {
				$primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'rocket' ), 'nav_menu' );
				$onepage_menu = get_term_by( 'name', esc_html__( 'One Page Menu', 'rocket' ), 'nav_menu' );

				if ( isset( $primary_menu->term_id ) ) {
						set_theme_mod( 'nav_menu_locations', array(
										'primary' => $primary_menu->term_id,
										'onepage' => $onepage_menu->term_id
								)
						);
				}

		}

		// Setting Menus (Demo - Movie)
		$wbc_menu_array_movie = array( 'movie' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_movie ) ) {
				$primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'rocket' ), 'nav_menu' );

				if ( isset( $primary_menu->term_id ) ) {
						set_theme_mod( 'nav_menu_locations', array(
										'primary' => $primary_menu->term_id
								)
						);
				}

		}

		// Setting Menus (Demo - Shop)
		$wbc_menu_array_shop = array( 'shop' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_shop ) ) {
			$primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'rocket' ), 'nav_menu' );

			if ( isset( $primary_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $primary_menu->term_id
					)
				);
			}
		}

		// Set HomePage
		$wbc_home_pages = array(
			'default'     => 'Home',
			'application' => 'Home',
			'movie'       => 'Home',
			'shop'        => 'Home'
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}
	add_action( 'wbc_importer_after_content_import', 'rocket_wbc_extended', 10, 2 );
}


/**
 * Remove Slider Revolution notice about plugin activation
 */
if(!function_exists('rocket_remove_revslider_notice')) {
	function rocket_remove_revslider_notice() {
		echo '<style type="text/css" media="screen">';
			echo '[data-slug="slider-revolution"] + .plugin-update-tr { display: none;}';
		echo '</style>';
	}
}
add_action('admin_head', 'rocket_remove_revslider_notice');


/**
 * Add Google Tracking Code
 */
if(!function_exists('rocket_add_tracking_code')) {
	function rocket_add_tracking_code() {
		global $rocket_data;

		if ( !empty( $rocket_data['rocket__opt-tracking_code'] ) ) {
			echo $rocket_data['rocket__opt-tracking_code'];
		}
	}
}
add_action('wp_footer', 'rocket_add_tracking_code', 100);


/**
 * Defer Parsing of Google Map Script
 */
if(!function_exists('rocket_add_dever_attribute_google_map')) {
	function rocket_add_dever_attribute_google_map($tag, $handle) {
		if ( 'google-maps' !== $handle )
			return $tag;
		return str_replace( ' src', ' defer="defer" src', $tag );
	}
	add_filter('script_loader_tag', 'rocket_add_dever_attribute_google_map', 10, 2);
}


// Add Base Google Fonts
if(!function_exists('rocket_add_google_fonts')) {
	function rocket_add_google_fonts() {
		wp_enqueue_style( 'rocket-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Exo+2:400italic,200,300,400,600,700', false );
	}
	add_action( 'wp_enqueue_scripts', 'rocket_add_google_fonts' );
}


/**
 * Shortcode in Widget
 */
add_filter('widget_text', 'do_shortcode');


/**
 * Add Open Graph Meta Tags
 */
if(!function_exists('rocket_fb_opengraph')) {
	function rocket_fb_opengraph() {

		// Enable Open Graph depends on Theme Options
		global $rocket_data;

		if ( isset( $rocket_data['rocket_opt-open-graphs'] ) && $rocket_data['rocket_opt-open-graphs'] == 1 ) {
			global $post;

			if(is_single()) {
				if(has_post_thumbnail($post->ID)) {
					$img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'rocket_portfolio-thumbnail-n');
				} else {
					$img_src = get_stylesheet_directory_uri() . '/images/placeholder-264x314.jpg';
				}
				if($excerpt = $post->post_excerpt) {
					$excerpt = strip_tags($post->post_excerpt);
					$excerpt = str_replace("", "'", $excerpt);
				} else {
					$excerpt = get_bloginfo('description');
				}
			?>
		<meta property="og:title" content="<?php echo esc_attr( the_title() ); ?>"/>
		<meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>"/>
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php echo esc_attr( the_permalink() ); ?>"/>
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo() ); ?>"/>
		<meta property="og:image" content="<?php echo esc_attr( $img_src[0] ); ?>"/>

		<?php } else {
				return;
			}
		}
	}
	add_action('wp_head', 'rocket_fb_opengraph', 5);
}



/**
 * Add Excerpt to Pages
 */
if(!function_exists('rocket_add_excerpts_to_pages')) {
	add_action( 'init', 'rocket_add_excerpts_to_pages' );
	function rocket_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
}


/**
 * Clean up string
 */
if( ! function_exists('rocket_str_clean') ) {
	function rocket_str_clean( $string ) {
		$string = str_replace(' ', '', $string);
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}


/**
 * Demo Style Switcher
 *
 */
if ( file_exists( get_template_directory() . '/demo-style-switcher/rocket-style-switcher.php' ) ) {
	include_once get_template_directory() . '/demo-style-switcher/rocket-style-switcher.php';
}


/**
 * Theme Info
 */
function df_get_theme_info() {
	$theme      = wp_get_theme();
	$theme_name = $theme->get('Name');
	$theme_v    = $theme->get('Version');

	$theme_info = array(
		'name' => $theme_name,
		'slug' => sanitize_file_name( strtolower( $theme_name ) ),
		'v'    => $theme_v,
	);

	return $theme_info;
}
