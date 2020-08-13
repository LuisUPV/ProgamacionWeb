<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'rocket_vcSetAsTheme' );
function rocket_vcSetAsTheme() {
	vc_set_as_theme( $disable_updater = true );
}



/**
 * Modified Files
 *
 * include/templates/params/vc_grid_item/attributes/vc_btn.php
 * include/params/vc_grid_item/templates.php
 * assets/lib/owl-carousel2-dist/assets/owl.min.css
 * config/content/vc-icon-element.php
 */



/**
 * Removed Elements
 */
vc_remove_element( 'vc_gallery' );
vc_remove_element( 'vc_tta_tour' );
vc_remove_element( 'vc_tta_pageable');
vc_remove_element( 'vc_toggle' );
vc_remove_element( 'vc_flickr' );
vc_remove_element( 'vc_round_chart' );
vc_remove_element( 'vc_line_chart' );
vc_remove_element( 'vc_gmaps' );


/**
 * Row
 */
$attributes = array(

	//Deprecated since 1.3.0
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Section', 'rocket' ),
		'param_name'  => 'section',
		'value'       => array(
			esc_html__( 'No', 'rocket' )      => 'no',
			esc_html__( 'Default', 'rocket' ) => 'default',
			esc_html__( 'Alternate', 'rocket' )    => 'dark',
			esc_html__( 'Dark', 'rocket' ) => 'darkest',
		),
		'description' => esc_html__( 'Choose section type.', 'rocket' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __('Separator ','rocket'),
		'param_name' => 'separator_enable',
		'value'       => array(
			esc_html__( 'Enable', 'rocket' ) => 'true'
		),
		'group' => 'Separator',
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Type','rocket'),
		'param_name' => 'separator_type',
		'value' => array(
			esc_html__( 'None', 'rocket' ) => '',
			esc_html__( 'Waves Default', 'rocket' ) => 'waves_svg_separator',
			esc_html__( 'Tilt Left', 'rocket' ) => 'tilt_left_svg_separator',
			esc_html__( 'Tilt Right', 'rocket' ) => 'tilt_right_svg_separator',
			esc_html__( 'Curve Left', 'rocket' ) => 'curve_left_svg_separator',
			esc_html__( 'Curve Right', 'rocket' ) => 'curve_right_svg_separator',
			esc_html__( 'Big Triangle Left', 'rocket' ) => 'big_triangle_left_svg_separator',
			esc_html__( 'Big Triangle Right', 'rocket' ) => 'big_triangle_right_svg_separator',
			esc_html__( 'Big Triangle Center', 'rocket' ) => 'big_triangle_center_svg_separator',
			esc_html__( 'Triangle Center', 'rocket' ) => 'triangle_center_svg_separator',
			esc_html__( 'Debris', 'rocket' ) => 'debris_svg_separator',
			esc_html__( 'Hills', 'rocket' ) => 'hills_svg_separator',
			esc_html__( 'Drops', 'rocket' ) => 'drops_svg_separator',
			esc_html__( 'Rocket', 'rocket' ) => 'rocket_svg_separator',
			esc_html__( 'Curve Inside Center', 'rocket' ) => 'curve_inside_center_svg_separator',
		),
		'group' => 'Separator',
		'dependency' => array(
			'element' => 'separator_enable',
			'value' => 'true'
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Position','rocket'),
		'param_name' => 'separator_position',
		'value' => array(
			esc_html__('Top','rocket') => 'top_separator',
			esc_html__('Bottom','rocket') => 'bottom_separator',
			esc_html__('Top and Bottom','rocket') => 'top_bottom_separator'
		),
		'group' => 'Separator',
		'dependency' => array(
			'element' => 'separator_enable',
			'value' => 'true'
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Separator Background Color','rocket'),
		'param_name' => 'separator_bg_color',
		'value' => array(
			esc_html__('Default','rocket') => 'separator_color_default',
			esc_html__('Custom','rocket')  => 'separator_color_custom',
		),
		'group' => 'Separator',
		'dependency' => array(
			'element' => 'separator_enable',
			'value' => 'true'
		),
	),
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__('Background','rocket'),
		'param_name' => 'separator_shape_background',
		'value' => '#f1f2f4',
		'group' => 'Separator',
		'description' => esc_html__('Mostly, this should be background color of your adjacent row section.','rocket'),
		'dependency' => array(
			'element' => 'separator_bg_color',
			'value' => 'separator_color_custom'
		),
	),
	array(
		'group'       => 'Overlay',
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Overlay Enable', 'rocket' ),
		'param_name'  => 'overlay_enable',
		'value'       => array(
			esc_html__( 'Enable Row Overlay?', 'rocket' ) => 'true'
		),
	),
	array(
		'group'       => 'Overlay',
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Overlay Color', 'rocket' ),
		'param_name'  => 'overlay',
		'value'       => '#f9fafb',
		'description' => esc_html__('Select Overlay Color.','rocket'),
		'dependency'  => array(
			'element'   => 'overlay_enable',
			'value'     => 'true'
		),
	),
	array(
		'group'       => 'Overlay',
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Overlay Opacity', 'rocket' ),
		'param_name'  => 'overlay_opacity',
		'value'       => '95',
		'description' => esc_html__( 'Enter Overlay Opacity (min 0 max 100).', 'rocket' ),
		'dependency'  => array(
			'element'   => 'overlay_enable',
			'value'     => 'true'
		),
	),
);
vc_add_params( 'vc_row', $attributes );


/**
 * Alert
 */
vc_remove_param( 'vc_message', 'message_box_style' );
vc_remove_param( 'vc_message', 'style' );

$attributes = array(
	array(
		'type' => 'params_preset',
		'heading' => esc_html__( 'Message Box Presets', 'rocket' ),
		'param_name' => 'color',
		// due to backward compatibility, really it is message_box_type
		'value' => '',
		'options' => array(
			array(
				'label' => esc_html__( 'Custom', 'rocket' ),
				'value' => '',
				'params' => array(),
			),
			array(
				'label' => esc_html__( 'Informational', 'rocket' ),
				'value' => 'info',
				'params' => array(
					'message_box_color' => 'info',
					'icon_type' => 'fontawesome',
					'icon_fontawesome' => 'fa fa-info-circle',
				),
			),
			array(
				'label' => esc_html__( 'Warning', 'rocket' ),
				'value' => 'warning',
				'params' => array(
					'message_box_color' => 'warning',
					'icon_type' => 'fontawesome',
					'icon_fontawesome' => 'fa fa-exclamation-triangle',
				),
			),
			array(
				'label' => esc_html__( 'Success', 'rocket' ),
				'value' => 'success',
				'params' => array(
					'message_box_color' => 'success',
					'icon_type' => 'fontawesome',
					'icon_fontawesome' => 'fa fa-check',
				),
			),
			array(
				'label' => esc_html__( 'Error', 'rocket' ),
				'value' => 'danger',
				'params' => array(
					'message_box_color' => 'danger',
					'icon_type' => 'fontawesome',
					'icon_fontawesome' => 'fa fa-times',
				),
			),
		),
		'description' => esc_html__( 'Select predefined message box design or choose "Custom" for custom styling.', 'rocket' ),
		'param_holder_class' => 'vc_message-type vc_colored-dropdown',
	)
);
vc_add_params( 'vc_message', $attributes );


$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'message_box_color',
		'value' => array(
			esc_html__( 'Informational', 'rocket' ) => 'info',
			esc_html__( 'Warning', 'rocket' ) => 'warning',
			esc_html__( 'Success', 'rocket' ) => 'success',
			esc_html__( 'Danger', 'rocket' ) => 'danger',
		),
		'description' => esc_html__( 'Select message box color.', 'rocket' ),
		'param_holder_class' => 'vc_message-type vc_colored-dropdown',
	)
);
vc_add_params( 'vc_message', $attributes );


$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Icon library', 'rocket' ),
		'param_name' => 'icon_type',
		'value' => array(
			esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
			esc_html__( 'Open Iconic', 'rocket' ) => 'openiconic',
			esc_html__( 'Typicons', 'rocket' ) => 'typicons',
			esc_html__( 'Entypo', 'rocket' ) => 'entypo',
			esc_html__( 'Linecons', 'rocket' ) => 'linecons',
		),
		'description' => esc_html__( 'Select icon library.', 'rocket' )
	)
);
vc_add_params( 'vc_message', $attributes );




/**
 * Title Bordered
 */

add_action( 'vc_before_init', 'rocket_heading_bordered' );
function rocket_heading_bordered() {
	vc_map( array(
		'name'        => esc_html__( 'Title Bordered', 'rocket' ),
		'base'        => 'rocket_heading_bordered',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-title-bordered.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Horizontal separator line with heading', 'rocket' ),
		'params' => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading text', 'rocket' ),
				'param_name'  => 'content',
				'value'       => esc_html__( 'Heading text', 'rocket' ),
				'description' => esc_html__( 'Add title text.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Font Size', 'rocket' ),
				'param_name'  => 'font_size',
				'value'       => array(
					esc_html__( 'Large', 'rocket' )  => 'font_large',
					esc_html__( 'Normal', 'rocket' ) => 'font_normal',
				),
				'description' => esc_html__( 'Title font size (for "h3" for Large and "h5" for Normal).', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Border Style', 'rocket' ),
				'param_name'  => 'border_style',
				'value'       => array(
					esc_html__( 'Solid', 'rocket' )  => 'solid',
					esc_html__( 'Dashed', 'rocket' ) => 'dashed',
				),
				'description' => esc_html__( 'Border display style.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Title Color', 'rocket' ),
				'param_name'  => 'color',
				'description' => esc_html__( 'Set title color.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Border color', 'rocket' ),
				'param_name'  => 'border_bottom_color',
				'description' => esc_html__( 'Set border color.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Heading_Bordered extends WPBakeryShortCode {
	}
}



/**
 * Title with Icon
 */

add_action( 'vc_before_init', 'rocket_heading_icon' );
function rocket_heading_icon() {
	vc_map( array(
		'name'        => esc_html__( 'Title with Icon', 'rocket' ),
		'base'        => 'rocket_heading_icon',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-title-with-icon.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Heading with border and icon.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading text', 'rocket' ),
				'param_name'  => 'content',
				'value'       => esc_html__( 'Heading text', 'rocket' ),
				'description' => esc_html__( 'Add title text.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Title Color', 'rocket' ),
				'param_name'  => 'color',
				'description' => esc_html__( 'Set title color.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icons', 'rocket' ),
				'value' => array(
					esc_html__( 'Default Icon', 'rocket' ) => 'default',
					esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'rocket' ) => 'openiconic',
					esc_html__( 'Typicons', 'rocket' ) => 'typicons',
					esc_html__( 'Entypo', 'rocket' ) => 'entypo',
					esc_html__( 'Linecons', 'rocket' ) => 'linecons',
				),
				'param_name' => 'type',
				'description' => esc_html__( 'Select icon library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_openiconic',
				'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_typicons',
				'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_entypo',
				'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'entypo',
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_linecons',
				'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Color', 'rocket' ),
				'param_name' => 'icon_color',
				'value' => array(
					esc_html__( 'Default', 'rocket' ) => 'default',
					esc_html__( 'Primary', 'rocket' ) => 'primary',
					esc_html__( 'Secondary', 'rocket' ) => 'secondary',
					esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
					esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
					esc_html__( 'Custom Color', 'rocket' ) => 'custom',
				),
				'description' => esc_html__( 'Select icon color.', 'rocket' ),
				'dependency' => array(
					'element' => 'type',
					'value' => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons'),
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Custom color', 'rocket' ),
				'param_name' => 'icon_custom_color',
				'description' => esc_html__( 'Select custom icon color.', 'rocket' ),
				'dependency' => array(
					'element' => 'icon_color',
					'value' => 'custom',
				),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Heading_Icon extends WPBakeryShortCode {
	}
}



/**
 * Section Title with Subtitle
 */

add_action( 'vc_before_init', 'rocket_heading_section' );
function rocket_heading_section() {
	vc_map( array(
		'name'        => esc_html__( 'Section Title', 'rocket' ),
		'base'        => 'rocket_heading_section',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-title-section.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Heading for Section with subtitle.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading text', 'rocket' ),
				'param_name'  => 'content',
				'value'       => esc_html__( 'Heading text', 'rocket' ),
				'description' => esc_html__( 'Add title text.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'rocket' ),
				'param_name'  => 'subtitle',
				'value'       => esc_html__( 'Subtitle text', 'rocket' ),
				'description' => esc_html__( 'Add subtitle text.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Title Color', 'rocket' ),
				'param_name'  => 'color',
				'description' => esc_html__( 'Set title color.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Subtitle Color', 'rocket' ),
				'param_name'  => 'subtitle_color',
				'description' => esc_html__( 'Set subtitle color.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Dots Color', 'rocket' ),
				'param_name'  => 'dots_color',
				'description' => esc_html__( 'Set title dots color.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Title Tag', 'rocket' ),
				'param_name' => 'title_tag',
				'value' => array(
					'h1' => 'h1',
					'h2' => 'h2',
					'h3' => 'h3',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
					'p' => 'p',
					'div' => 'div',
				),
				'default' => 'h1',
				'description' => esc_html__( 'Select icon title tag.', 'rocket' ),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Customize Title Font size?', 'rocket' ),
				'param_name'  => 'title_font_size',
				'description' => esc_html__( 'Enable to change title font size.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title Font Size (Desktop Large)', 'rocket' ),
				'param_name'  => 'title_font_size_lg',
				'value'       => '60px',
				'description' => esc_html__( 'Font size on large screens (desktops).', 'rocket' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'title_font_size',
					'value' => 'true',
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title Font Size (Desktop)', 'rocket' ),
				'param_name'  => 'title_font_size_md',
				'value'       => '60px',
				'description' => esc_html__( 'Font size on medium screens.', 'rocket' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'title_font_size',
					'value' => 'true',
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title Font Size (Tablets)', 'rocket' ),
				'param_name'  => 'title_font_size_sm',
				'value'       => '36px',
				'description' => esc_html__( 'Font size on tablets.', 'rocket' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'title_font_size',
					'value' => 'true',
				),
			),
			array(
				'group'       => esc_html__( 'Styling', 'rocket'),
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title Font Size (Mobile)', 'rocket' ),
				'param_name'  => 'title_font_size_xs',
				'value'       => '21px',
				'description' => esc_html__( 'Font size on mobile devices.', 'rocket' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'title_font_size',
					'value' => 'true',
				),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Heading_Section extends WPBakeryShortCode {
	}
}




/**
 * Subsection Title with Subtitle
 */

add_action( 'vc_before_init', 'rocket_heading_subsection' );
function rocket_heading_subsection() {
	vc_map( array(
		'name'        => esc_html__( 'Subsection Title', 'rocket' ),
		'base'        => 'rocket_heading_subsection',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-title-section.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Heading for Section with subtitle.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading text', 'rocket' ),
				'param_name'  => 'content',
				'value'       => esc_html__( 'Heading text', 'rocket' ),
				'description' => esc_html__( 'Add title text.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'rocket' ),
				'param_name'  => 'subtitle',
				'value'       => esc_html__( 'Subtitle text', 'rocket' ),
				'description' => esc_html__( 'Add subtitle text.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Color', 'rocket' ),
				'param_name'  => 'color',
				'description' => esc_html__( 'Set title color.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Heading_Subsection extends WPBakeryShortCode {
	}
}




/**
 * Separator with Link
 */

add_action( 'vc_before_init', 'rocket_separator_link' );
function rocket_separator_link() {
	vc_map( array(
		'name'        => esc_html__( 'Separator with Link', 'rocket' ),
		'base'        => 'rocket_separator_link',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-separator-link.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Heading for Section with subtitle.', 'rocket' ),
		'params' => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Link Text', 'rocket' ),
				'param_name'  => 'content',
				'value'       => esc_html__( 'Text Link Here', 'rocket' ),
				'description' => esc_html__( 'Add link text.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'URL', 'rocket' ),
				'param_name'  => 'url',
				'value'       => esc_html__( '#', 'rocket' ),
				'description' => esc_html__( 'Add link URL.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Border Style', 'rocket' ),
				'param_name'  => 'border_style',
				'value'       => array(
					esc_html__( 'Solid', 'rocket' ) => 'solid',
					esc_html__( 'Dashed', 'rocket' ) => 'dashed',
				),
				'description' => esc_html__( 'Border display style.', 'rocket' ),
			),
			array(
				'type'        => 'colorpicker',
				'group'       => esc_html__( 'Styling', 'rocket'),
				'heading'     => esc_html__( 'Border Color', 'rocket' ),
				'param_name'  => 'border_color',
				'description' => esc_html__( 'Set separator color.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Separator_Link extends WPBakeryShortCode {
	}
}




/**
 * Blockquote with Icon
 */

add_action( 'vc_before_init', 'rocket_blockquote_icon' );
function rocket_blockquote_icon() {
	vc_map( array(
		'name' => esc_html__( 'Blockquote with Icon', 'rocket' ),
		'base' => 'rocket_blockquote_icon',
		'icon' => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-blockquote-with-icon.png',
		'category' => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Blockquote with Icon.', 'rocket' ),
		'params' => array(
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Blockquote Text', 'rocket' ),
				'param_name' => 'content',
				'value' => esc_html__( 'Some text goes here', 'rocket' ),
				'description' => esc_html__( 'Add blockquote text.', 'rocket' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Direction', 'rocket' ),
				'param_name' => 'direction',
				'value' => array(
					esc_html__( 'Default', 'rocket' ) => 'default',
					esc_html__( 'Reverse', 'rocket' ) => 'reverse',
				),
				'description' => esc_html__( 'Choose blockquote direction.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
		),
	) );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Blockquote_Icon extends WPBakeryShortCode {
		}
}



/**
 * Button
 */

$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Shape', 'rocket' ),
		'description' => esc_html__( 'Select button shape.', 'rocket' ),
		'param_name' => 'shape',
		// need to be converted
		'value' => array(
			esc_html__( 'Square', 'rocket' ) => 'square',
			esc_html__( 'Rounded', 'rocket' ) => 'rounded',
			esc_html__( 'Round', 'rocket' ) => 'round',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'color',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'default',
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Info', 'rocket' ) => 'info',
			esc_html__( 'Success', 'rocket' ) => 'success',
			esc_html__( 'Warning', 'rocket' ) => 'warning',
			esc_html__( 'Danger', 'rocket' ) => 'danger',
		),
		'description' => esc_html__( 'Select button color.', 'rocket' ),
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Style', 'rocket' ),
		'description' => esc_html__( 'Select button display style.', 'rocket' ),
		'param_name' => 'style',
		// partly compatible with btn2, need to be converted shape+style from btn2 and btn1
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'default',
			esc_html__( 'Custom', 'rocket' ) => 'custom',
			esc_html__( 'Gradient', 'rocket' ) => 'gradient',
			esc_html__( 'Gradient Custom', 'rocket' ) => 'gradient-custom',
		),
	),
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Custom Background Hover', 'rocket' ),
		'param_name' => 'custom_background_hover',
		'description' => esc_html__( 'Select custom background color on hover.', 'rocket' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
		'std' => '#666',
		'weight' => 0
	),
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Custom Text Hover', 'rocket' ),
		'param_name' => 'custom_text_hover',
		'description' => esc_html__( 'Select custom text color on hover.', 'rocket' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
		'std' => '#ededed',
		'weight' => 0
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Icon library', 'rocket' ),
		'param_name' => 'i_type',
		'value' => array(
			esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
			esc_html__( 'Open Iconic', 'rocket' ) => 'openiconic',
			esc_html__( 'Typicons', 'rocket' ) => 'typicons',
			esc_html__( 'Entypo', 'rocket' ) => 'entypo',
			esc_html__( 'Linecons', 'rocket' ) => 'linecons',
		),
		'description' => esc_html__( 'Select icon library.', 'rocket' )
	),
);
vc_add_params( 'vc_btn', $attributes );



/**
 * Testimonial
 */
add_action( 'init', 'rocket_testimonial' );
function rocket_testimonial() {
	vc_map( array(
		'name' => esc_html__( 'Testimonial', 'rocket' ),
		'base' => 'rocket_testimonial',
		'icon' => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-testimonial.png',
		'category' => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Testimonial with Image.', 'rocket' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'rocket' ),
				'param_name' => 'name',
				'value' => esc_html__( 'John Doe', 'rocket' ),
				'description' => esc_html__( 'Enter author name here.', 'rocket' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'rocket' ),
				'param_name' => 'position',
				'value' => esc_html__( 'Co-Founder', 'rocket' ),
				'description' => esc_html__( 'Enter author position here.', 'rocket' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'rocket' ),
				'param_name' => 'img_src',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'rocket' ),
			),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Testimonial Text', 'rocket' ),
				'param_name' => 'content',
				'value' => esc_html__( 'Some text goes here', 'rocket' ),
				'description' => esc_html__( 'Add testimonial text.', 'rocket' ),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Type', 'rocket' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__( 'Type 1', 'rocket' ) => 'type1',
					esc_html__( 'Type 2', 'rocket' ) => 'type2',
				),
				'description' => esc_html__( 'Select Testimonial appearance type.', 'rocket' ),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Author Name Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'title_color',
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Author Position Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'position_color',
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Author Text Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'text_color',
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Footer Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'foot_color',
				'dependency' => array(
					'element'  => 'type',
					'value'    => array( 'type2' ),
				),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Footer Icon Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'foot_icon_color',
				'dependency' => array(
					'element'  => 'type',
					'value'    => array( 'type2' ),
				),
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Testimonial extends WPBakeryShortCode {
	}
}




/**
 * Team Posts
 */
add_action( 'init', 'rocket_team_posts' );
function rocket_team_posts() {

	// Team Groups
	$team_groups = get_terms( array( 'teamgroups' ) );
	$team_groups_array = array();

	if(!empty($team_groups) and !is_wp_error($team_groups)) {
		foreach ( $team_groups as $team_group ) {
			$team_groups_array[] = array(
				'label' => $team_group->name,
				'value' => $team_group->slug
			);
		}
	}

	vc_map( array(
		'name'        => esc_html__( 'Team Posts', 'rocket' ),
		'base'        => 'rocket_team_posts',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-team-posts.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Team Posts.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Posts per page', 'rocket' ),
				'param_name'  => 'posts_per_page',
				'value'       => '2',
				'description' => esc_html__( 'Number of posts to display.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Number of Columns', 'rocket' ),
				'param_name'  => 'cols',
				'value'       => array(
					esc_html__( '2 Columns', 'rocket' ) => '2cols',
					esc_html__( '3 Columns', 'rocket' ) => '3cols',
					esc_html__( '4 Columns', 'rocket' ) => '4cols',
					esc_html__( '1 Column', 'rocket' )  => '1col',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Type', 'rocket' ),
				'param_name'  => 'type',
				'value'       => array(
					esc_html__( 'Modern', 'rocket' ) => 'modern',
					esc_html__( 'Classic', 'rocket' )  => 'classic',
				),
				'description' => esc_html__( 'Choose the type of the team list.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Orderby', 'rocket' ),
				'param_name'  => 'orderby',
				'value'       => array(
					esc_html__( 'Date', 'rocket' ) => 'date',
					esc_html__( 'Title', 'rocket' ) => 'title',
					esc_html__( 'Random', 'rocket' ) => 'rand',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Order', 'rocket' ),
				'param_name'  => 'order',
				'value'       => array(
					esc_html__( 'DESC', 'rocket' ) => 'DESC',
					esc_html__( 'ASC', 'rocket' ) => 'ASC',
				),
				'description' => esc_html__( 'Designates the ascending or descending order. Defaults to "DESC".', 'rocket' ),
			),
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Groups', 'alchemists' ),
				'param_name' => 'team_groups',
				'settings' => array(
					'multiple' => true,
					'min_length' => 1,
					'groups' => true,
					// In UI show results grouped by groups, default false
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend, default false
					'display_inline' => true,
					// In UI show results inline view, default false (each value in own line)
					'delay' => 500,
					// delay for search. default 500
					'auto_focus' => true,
					// auto focus input, default true
					'sortable' => true,
					'no_hide' => true,
					'values' => $team_groups_array
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Filter posts by Groups.', 'alchemists' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Team_Posts extends WPBakeryShortCode {
	}
}



/**
 * Team Carousel
 */
add_action( 'init', 'rocket_team_carousel' );
function rocket_team_carousel() {

	// Team Groups
	$team_groups = get_terms( array( 'teamgroups' ) );
	$team_groups_array = array();

	if(!empty($team_groups) and !is_wp_error($team_groups)) {
		foreach ( $team_groups as $team_group ) {
			$team_groups_array[] = array(
				'label' => $team_group->name,
				'value' => $team_group->slug
			);
		}
	}

	vc_map( array(
		'name'        => esc_html__( 'Team Carousel', 'rocket' ),
		'base'        => 'rocket_team_carousel',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-team-carousel.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Team Members displayed via carousel.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Posts per page', 'rocket' ),
				'param_name'  => 'posts_per_page',
				'value'       => '2',
				'description' => esc_html__( 'Number of posts to display.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Number of Columns', 'rocket' ),
				'param_name'  => 'cols',
				'value'       => array(
					esc_html__( '2 Columns', 'rocket' ) => '2cols',
					esc_html__( '1 Column', 'rocket' )  => '1col',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Show Controls?', 'rocket' ),
				'param_name'  => 'nav_controls',
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true',
					esc_html__( 'No', 'rocket' )  => 'false',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Loop?', 'rocket' ),
				'param_name'  => 'loop',
				'description' => esc_html__( 'If checked carousel will be looped.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
			),
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Groups', 'alchemists' ),
				'param_name' => 'team_groups',
				'settings' => array(
					'multiple' => true,
					'min_length' => 1,
					'groups' => true,
					// In UI show results grouped by groups, default false
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend, default false
					'display_inline' => true,
					// In UI show results inline view, default false (each value in own line)
					'delay' => 500,
					// delay for search. default 500
					'auto_focus' => true,
					// auto focus input, default true
					'sortable' => true,
					'no_hide' => true,
					'values' => $team_groups_array
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Filter posts by Groups.', 'alchemists' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Team_Carousel extends WPBakeryShortCode {
	}
}



/**
 * Partners Posts
 */
add_action( 'init', 'rocket_partners_posts' );
function rocket_partners_posts() {

	// Partner Groups
	$partner_groups = get_terms( array( 'groups' ) );
	$partner_groups_array = array();

	if(!empty($partner_groups) and !is_wp_error($partner_groups)) {
		foreach ( $partner_groups as $partner_group ) {
			$partner_groups_array[] = array(
				'label' => $partner_group->name,
				'value' => $partner_group->slug
			);
		}
	}

	vc_map( array(
		'name'        => esc_html__( 'Partners Posts', 'rocket' ),
		'base'        => 'rocket_partners_posts',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-partners-posts.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Partners Posts.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Posts per page', 'rocket' ),
				'param_name'  => 'posts_per_page',
				'value'       => '4',
				'description' => esc_html__( 'Number of posts to display.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Number of Columns', 'rocket' ),
				'param_name'  => 'cols',
				'value'       => array(
					esc_html__( '6 Columns', 'rocket' ) => '6cols',
					esc_html__( '4 Columns', 'rocket' ) => '4cols',
					esc_html__( '3 Columns', 'rocket' ) => '3cols',
					esc_html__( '2 Columns', 'rocket' ) => '2cols',
					esc_html__( '1 Column', 'rocket' )  => '1col',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Groups', 'alchemists' ),
				'param_name' => 'groups',
				'settings' => array(
					'multiple' => true,
					'min_length' => 1,
					'groups' => true,
					// In UI show results grouped by groups, default false
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend, default false
					'display_inline' => true,
					// In UI show results inline view, default false (each value in own line)
					'delay' => 500,
					// delay for search. default 500
					'auto_focus' => true,
					// auto focus input, default true
					'sortable' => true,
					'no_hide' => true,
					'values' => $partner_groups_array
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Filter posts by Groups.', 'alchemists' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Show Title?', 'rocket' ),
				'param_name'  => 'show_title',
				'description' => esc_html__( 'If checked partner name will be displayed.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Partners_Posts extends WPBakeryShortCode {
	}
}



/**
 * Partners Carousel
 */
add_action( 'init', 'rocket_partners_carousel' );
function rocket_partners_carousel() {

	// Partner Groups
	$partner_groups = get_terms( array( 'groups' ) );
	$partner_groups_array = array();

	if(!empty($partner_groups) and !is_wp_error($partner_groups)) {
		foreach ( $partner_groups as $partner_group ) {
			$partner_groups_array[] = array(
				'label' => $partner_group->name,
				'value' => $partner_group->slug
			);
		}
	}

	vc_map( array(
		'name'        => esc_html__( 'Partners Carousel', 'rocket' ),
		'base'        => 'rocket_partners_carousel',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-partners-carousel.png',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Partners Carousel.', 'rocket' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Posts per page', 'rocket' ),
				'param_name'  => 'posts_per_page',
				'value'       => '6',
				'description' => esc_html__( 'Number of posts to display.', 'rocket' ),
			),
			array(
				'type' => 'autocomplete',
				'heading' => esc_html__( 'Groups', 'alchemists' ),
				'param_name' => 'groups',
				'settings' => array(
					'multiple' => true,
					'min_length' => 1,
					'groups' => true,
					// In UI show results grouped by groups, default false
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend, default false
					'display_inline' => true,
					// In UI show results inline view, default false (each value in own line)
					'delay' => 500,
					// delay for search. default 500
					'auto_focus' => true,
					// auto focus input, default true
					'sortable' => true,
					'no_hide' => true,
					'values' => $partner_groups_array
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => esc_html__( 'Filter posts by Groups.', 'alchemists' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Number of Columns', 'rocket' ),
				'param_name'  => 'cols',
				'value'       => array(
					esc_html__( '6 Columns', 'rocket' ) => '6cols',
					esc_html__( '4 Columns', 'rocket' ) => '4cols',
					esc_html__( '3 Columns', 'rocket' ) => '3cols',
					esc_html__( '2 Columns', 'rocket' ) => '2cols',
					esc_html__( '1 Column', 'rocket' )  => '1col',
				),
				'description' => esc_html__( 'Choose the number of columns.', 'rocket' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Loop?', 'rocket' ),
				'param_name'  => 'loop',
				'description' => esc_html__( 'If checked carousel will be looped.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Autoplay?', 'rocket' ),
				'param_name'  => 'autoplay',
				'description' => esc_html__( 'If checked carousel will be looped.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Autoplay Speed', 'rocket' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '5000',
				'description' => esc_html__( 'Set Autoplay Speed in ms, e.g 5000 (5s).', 'rocket' ),
				'dependency' => array(
					'element' => 'autoplay',
					'value' => array( 'true' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Show Title?', 'rocket' ),
				'param_name'  => 'show_title',
				'description' => esc_html__( 'If checked partner name will be displayed.', 'rocket' ),
				'value'       => array(
					esc_html__( 'Yes', 'rocket' ) => 'true'
				),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Partners_Carousel extends WPBakeryShortCode {
	}
}



/**
 * Pricing Tables
 */
add_action( 'init', 'rocket_pricing_tables' );
function rocket_pricing_tables() {

	vc_map( array(
		'name' => esc_html__( 'Pricing Tables', 'rocket' ),
		'base' => 'rocket_pricing_tables',
		'icon' => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-pricing-table.png',
		'category' => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Pricing Tables.', 'rocket' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Pricing Table ID', 'rocket' ),
				'param_name' => 'id',
				'value' => rocket_pricingTableID(),
				'description' => esc_html__( 'Choose the Pricing Table to use.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'Css', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Pricing_Tables extends WPBakeryShortCode {
	}
}



/**
 * Progress Bar
 */
$attributes = array(
	array(
		'type' => 'param_group',
		'heading' => esc_html__( 'Values', 'rocket' ),
		'param_name' => 'values',
		'description' => esc_html__( 'Enter values for graph - value, title and color.', 'rocket' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_html__( 'Development', 'rocket' ),
				'value' => '90',
			),
			array(
				'label' => esc_html__( 'Design', 'rocket' ),
				'value' => '80',
			),
			array(
				'label' => esc_html__( 'Marketing', 'rocket' ),
				'value' => '70',
			),
		) ) ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Label', 'rocket' ),
				'param_name' => 'label',
				'description' => esc_html__( 'Enter text used as title of bar.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Value', 'rocket' ),
				'param_name' => 'value',
				'description' => esc_html__( 'Enter value of bar.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Color', 'rocket' ),
				'param_name' => 'color',
				'value' => array(
										esc_html__( 'Default', 'rocket' ) => '',
										esc_html__( 'Primary', 'rocket' ) => 'primary',
										esc_html__( 'Informational', 'rocket' ) => 'info',
										esc_html__( 'Warning', 'rocket' ) => 'warning',
										esc_html__( 'Success', 'rocket' ) => 'success',
										esc_html__( 'Danger', 'rocket' ) => 'danger',
										esc_html__( 'Quinary', 'rocket' ) => 'quinary',
									 ) + array(
										esc_html__( 'Custom Color', 'rocket' ) => 'custom',
									 ),
				'description' => esc_html__( 'Select single bar background color.', 'rocket' ),
				'admin_label' => true,
				'param_holder_class' => 'vc_colored-dropdown',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Custom color', 'rocket' ),
				'param_name' => 'customcolor',
				'description' => esc_html__( 'Select custom single bar background color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => array( 'custom' ),
				),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Custom text color', 'rocket' ),
				'param_name' => 'customtxtcolor',
				'description' => esc_html__( 'Select custom single bar text color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => array( 'custom' ),
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'rocket' ),
				'param_name' => 'icon_type',
				'value' => array(
					esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'rocket' ) => 'openiconic',
					esc_html__( 'Typicons', 'rocket' ) => 'typicons',
					esc_html__( 'Entypo', 'rocket' ) => 'entypo',
					esc_html__( 'Linecons', 'rocket' ) => 'linecons',
				),
				'description' => esc_html__( 'Select icon library.', 'rocket' )
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
		),
	),
);
vc_add_params( 'vc_progress_bar', $attributes );


$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'bgcolor',
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Informational', 'rocket' ) => 'info',
			esc_html__( 'Warning', 'rocket' ) => 'warning',
			esc_html__( 'Success', 'rocket' ) => 'success',
			esc_html__( 'Error', 'rocket' ) => 'danger',
		) + array(
			esc_html__( 'Custom Color', 'rocket' ) => 'custom',
		),
		'description' => esc_html__( 'Select bar background color.', 'rocket' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
);
vc_add_params( 'vc_progress_bar', $attributes );



/**
 * Progress Bar Vertical
 */
add_action( 'init', 'rocket_progress_bar_vertical' );
function rocket_progress_bar_vertical() {
	vc_map( array(
		'name'        => esc_html__( 'Progress Bar Vertical' , 'rocket'),
		'description' => esc_html__('Animated progress bar (vertical)', 'rocket'),
		'base'        => 'rocket_progress_bar_vertical',
		'controls'    => 'full',
		'class'       => 'rocket-progress-bar',
		'icon'        => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-vertical-progress-bar.png',
		'category'    => esc_html__( 'Content', 'rocket'),
		'params'      => array(
			array(
				'group'      => esc_html__('General', 'rocket'),
				'type'       => 'textfield',
				'heading'    => esc_html__('Title', 'rocket'),
				'value'      => 'Lorem Ipsum',
				'param_name' => 'title',
			),
			array(
				'group'      => esc_html__('General', 'rocket'),
				'type'       => 'textfield',
				'heading'    => esc_html__('Number', 'rocket'),
				'value'      => '50',
				'param_name' => 'number',
			),
			array(
				'group'      => esc_html__('General', 'rocket'),
				'type'       => 'textfield',
				'heading'    => esc_html__('Symbol', 'rocket'),
				'param_name' => 'symbol',
				'value'      => '%',
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Color', 'rocket' ),
				'param_name' => 'color',
				'value' => array(
					esc_html__( 'Primary', 'rocket' )       => 'primary',
					esc_html__( 'Informational', 'rocket' ) => 'info',
					esc_html__( 'Warning', 'rocket' )       => 'warning',
					esc_html__( 'Success', 'rocket' )       => 'success',
					esc_html__( 'Danger', 'rocket' )        => 'danger',
				) + array(
					esc_html__( 'Custom Color', 'rocket' )  => 'custom',
				),
				'description' => esc_html__( 'Select single bar background color.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Title Color', 'rocket'),
				'value'      => '#fff',
				'type'       => 'colorpicker',
				'param_name' => 'title_color',
				'dependency' => array(
					'element'  => 'color',
					'value'    => array( 'custom' ),
				),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Number Color', 'rocket'),
				'value'      => '#c8cbd0',
				'type'       => 'colorpicker',
				'param_name' => 'number_color',
				'dependency' => array(
					'element'  => 'color',
					'value'    => array( 'custom' ),
				),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Bar Color', 'rocket'),
				'value'      => '#ff7149',
				'type'       => 'colorpicker',
				'param_name' => 'bar_color',
				'dependency' => array(
					'element'  => 'color',
					'value'    => array( 'custom' ),
				),
			),
			array(
				'group'      => esc_html__('Styling', 'rocket'),
				'heading'    => esc_html__('Track Color', 'rocket'),
				'value'      => 'transparent',
				'type'       => 'colorpicker',
				'param_name' => 'track_color',
				'dependency' => array(
					'element'  => 'color',
					'value'    => array( 'custom' ),
				),
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Icon library', 'rocket' ),
				'param_name'  => 'icon_type',
				'value'       => array(
					esc_html__( 'Font Awesome', 'rocket' )        => 'fontawesome',
					esc_html__( 'Open Iconic', 'rocket' )         => 'openiconic',
					esc_html__( 'Typicons', 'rocket' )            => 'typicons',
					esc_html__( 'Entypo', 'rocket' )              => 'entypo',
					esc_html__( 'Linecons', 'rocket' )            => 'linecons',
					esc_html__( 'Do not display icon', 'rocket' ) => 'false',
				),
				'description' => esc_html__( 'Select icon library.', 'rocket' )
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'rocket' ),
				'param_name'  => 'icon_fontawesome',
				'value'       => 'fa fa-info-circle',
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'rocket' ),
				'param_name'  => 'icon_openiconic',
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'rocket' ),
				'param_name'  => 'icon_typicons',
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'type'         => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'rocket' ),
				'param_name'  => 'icon_entypo',
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'type'         => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'entypo',
				),
			),
			array(
				'group'       => esc_html__('Icon', 'rocket'),
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'rocket' ),
				'param_name'  => 'icon_linecons',
				'settings'    => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'rocket' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rocket' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'Css', 'rocket' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design options', 'rocket' ),
				),
		),
	));// END vc_map
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Progress_Bar_Vertical extends WPBakeryShortCode {
	}
}





/**
 * Icon
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Display', 'rocket' ),
		'param_name' => 'display',
		'value' => array(
			esc_html__( 'Block', 'rocket' ) => 'block',
			esc_html__( 'Inline-Block', 'rocket' ) => 'inline-block',
		),
		'description' => esc_html__( 'Select display option.', 'rocket' )
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Icon Color', 'rocket' ),
		'param_name' => 'color',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'default',
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Custom Color', 'rocket' ) => 'custom',
		),
		'description' => esc_html__( 'Select icon color.', 'rocket' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Background Color', 'rocket' ),
		'param_name' => 'background_color',
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Custom Color', 'rocket' ) => 'custom',
		),
		'description' => esc_html__( 'Select background color for icon.', 'rocket' ),
		'dependency' => array(
			'element' => 'background_style',
			'not_empty' => true,
		),
	),
);
vc_add_params( 'vc_icon', $attributes );



/**
 * Icon Boxes
 */
add_action( 'init', 'rocket_icon_box_toVC' );
function rocket_icon_box_toVC() {
	 vc_map( array(
			'name' => esc_html__( 'Icon Box', 'rocket' ),
			'base' => 'rocket_icon_box',
			'icon' => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-icon-box.png',
			"params" => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'rocket'),
					'value'      => 'Lorem Ipsum',
					'param_name' => 'title',
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Content', 'rocket' ),
					'param_name' => 'content',
					'value' => esc_html__( 'Donec placerat massa quis efficitur commodo. Duis sapien massa, ornare nec nulla id, pulvinar lacinia purus. Vivamus et erat commodo.', 'rocket' ),
					'description' => esc_html__( 'Add text here.', 'rocket' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'rocket' ),
					'value' => array(
						esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'rocket' ) => 'openiconic',
						esc_html__( 'Typicons', 'rocket' ) => 'typicons',
						esc_html__( 'Entypo', 'rocket' ) => 'entypo',
						esc_html__( 'Linecons', 'rocket' ) => 'linecons',
					),
					'admin_label' => true,
					'param_name' => 'type',
					'description' => esc_html__( 'Select icon library.', 'rocket' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'rocket' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'rocket' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'rocket' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'rocket' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'rocket' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'rocket' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'rocket' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'entypo',
					),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'rocket' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'rocket' ),
				),
				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Icon Color', 'rocket' ),
					'param_name' => 'color',
					'value' => array(
						esc_html__( 'Default', 'rocket' ) => 'default',
						esc_html__( 'Primary', 'rocket' ) => 'primary',
						esc_html__( 'Secondary', 'rocket' ) => 'secondary',
						esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
						esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
						esc_html__( 'Custom Color', 'rocket' ) => 'custom',
					),
					'description' => esc_html__( 'Select icon color.', 'rocket' ),
				),
				array(
					'type' => 'colorpicker',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Custom color', 'rocket' ),
					'param_name' => 'custom_color',
					'description' => esc_html__( 'Select custom icon color.', 'rocket' ),
					'dependency' => array(
						'element' => 'color',
						'value' => 'custom',
					),
				),
				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Background shape', 'rocket' ),
					'param_name' => 'background_style',
					'value' => array(
						esc_html__( 'None', 'rocket' ) => '',
						esc_html__( 'Circle', 'rocket' ) => 'rounded',
						esc_html__( 'Square', 'rocket' ) => 'boxed',
						esc_html__( 'Rounded', 'rocket' ) => 'rounded-less',
						esc_html__( 'Outline Circle', 'rocket' ) => 'rounded-outline',
						esc_html__( 'Outline Square', 'rocket' ) => 'boxed-outline',
						esc_html__( 'Outline Rounded', 'rocket' ) => 'rounded-less-outline',
					),
					'description' => esc_html__( 'Select background shape and style for icon.', 'rocket' ),
				),
				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Background Color', 'rocket' ),
					'param_name' => 'background_color',
					'value' => array(
						esc_html__( 'Primary', 'rocket' ) => 'primary',
						esc_html__( 'Secondary', 'rocket' ) => 'secondary',
						esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
						esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
						esc_html__( 'Custom Color', 'rocket' ) => 'custom',
					),
					'description' => esc_html__( 'Select background color for icon.', 'rocket' ),
					'dependency' => array(
						'element' => 'background_style',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'colorpicker',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Custom background color', 'rocket' ),
					'param_name' => 'custom_background_color',
					'description' => esc_html__( 'Select custom icon background color.', 'rocket' ),
					'dependency' => array(
						'element' => 'background_color',
						'value' => 'custom',
					),
				),
				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Size', 'rocket' ),
					'param_name' => 'size',
					'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
					'std' => 'md',
					'description' => esc_html__( 'Icon size.', 'rocket' ),
				),
				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Icon alignment', 'rocket' ),
					'param_name' => 'align',
					'value' => array(
						esc_html__( 'Left', 'rocket' ) => 'left',
						esc_html__( 'Right', 'rocket' ) => 'right',
						esc_html__( 'Center', 'rocket' ) => 'center',
					),
					'description' => esc_html__( 'Select icon alignment.', 'rocket' ),
				),

				array(
					'type' => 'dropdown',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Title Color', 'rocket' ),
					'param_name' => 'title_color',
					'value' => array(
						esc_html__( 'Theme Default', 'rocket' ) => 'default',
						esc_html__( 'Custom Color', 'rocket' ) => 'custom',
					),
					'description' => esc_html__( 'Select title color.', 'rocket' ),
				),
				array(
					'type' => 'colorpicker',
					'group'  => esc_html__('Styling', 'rocket'),
					'heading' => esc_html__( 'Custom title color', 'rocket' ),
					'param_name' => 'custom_title_color',
					'description' => esc_html__( 'Select custom title color.', 'rocket' ),
					'dependency' => array(
						'element' => 'title_color',
						'value' => 'custom',
					),
				),

				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'rocket' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add link to icon.', 'rocket' ),
				),
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'rocket' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rocket' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'Css', 'rocket' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design options', 'rocket' ),
				),
			),
			'js_view' => 'VcIconElementView_Backend',
	 ) );
}
class WPBakeryShortCode_rocket_icon_box extends WPBakeryShortCode {
}



/**
 * Tabs
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'param_name' => 'style',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'classic',
		),
		'heading' => esc_html__( 'Style', 'rocket' ),
		'description' => esc_html__( 'Select tabs display style.', 'rocket' ),
	),
	array(
		'type' => 'dropdown',
		'param_name' => 'color',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'description' => esc_html__( 'Select tabs color.', 'rocket' ),
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Grey', 'rocket' ) => 'grey',
			esc_html__( 'Black', 'rocket' ) => 'black',
		),
		'std' => 'primary',
	),
	array(
		'type' => 'dropdown',
		'param_name' => 'pagination_color',
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'White', 'rocket' ) => 'white',
			esc_html__( 'Grey', 'rocket' ) => 'grey',
			esc_html__( 'Black', 'rocket' ) => 'black',
		),
		'heading' => esc_html__( 'Pagination color', 'rocket' ),
		'description' => esc_html__( 'Select pagination color.', 'rocket' ),
		'std' => 'primary',
		'dependency' => array(
			'element' => 'pagination_style',
			'not_empty' => true,
		),
	),
	array(
		'type' => 'dropdown',
		'param_name' => 'shape',
		'value' => array(
			esc_html__( 'Rounded', 'rocket' ) => 'rounded',
			esc_html__( 'Square', 'rocket' ) => 'square',
			esc_html__( 'Round', 'rocket' ) => 'round',
		),
		'std' => 'square',
		'heading' => esc_html__( 'Shape', 'rocket' ),
		'description' => esc_html__( 'Select tabs shape.', 'rocket' ),
	),
);
vc_add_params( 'vc_tta_tabs', $attributes );



/**
 * Accordion
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'param_name' => 'style',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'classic',
		),
		'heading' => esc_html__( 'Style', 'rocket' ),
		'description' => esc_html__( 'Select accordion display style.', 'rocket' ),
	),
	array(
		'type' => 'dropdown',
		'param_name' => 'color',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'description' => esc_html__( 'Select accordion color.', 'rocket' ),
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Grey', 'rocket' ) => 'grey',
			esc_html__( 'Black', 'rocket' ) => 'black',
		),
		'std' => 'grey',
	),
);
vc_add_params( 'vc_tta_accordion', $attributes );



/**
 * Advanced Accordion
 */
add_action( 'init', 'rocket_accordion_custom' );
function rocket_accordion_custom() {
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Accordion Advanced', 'rocket'),
		'description'             => esc_html__('Collapsible content panels', 'rocket'),
		'base'                    => 'rocket_accordion',
		'show_settings_on_create' => false,
		// 'controls'                => 'full',
		// 'show_settings_on_create' => true,
		// 'content_element'         => true,
		'js_view'                 => 'VcColumnView',
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-accordion-advanced.png',
		'as_parent'   => array('only' => 'rocket_accordion_panel'),
		'params'      => array(
			vc_map_add_css_animation(),
			array(
				'group'       => esc_html__('CSS Class', 'rocket'),
				'type'        => 'textfield',
				'holder'      => 'div',
				'heading'     => esc_html__('CSS class name', 'rocket'),
				'param_name'  => 'custom_css_class',
				'description' => esc_html__('Give this element an extra CSS class name if you wish to refer to it in a CSS file. (optional)', 'rocket')
			),
		),
	) );
}


add_action( 'init', 'rocket_accordion_panel' );
function rocket_accordion_panel() {
	// Map the accordion content
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Accordion Panel', 'rocket'),
		'description'             => esc_html__('Add an accordion panel', 'rocket'),
		'base'                    => 'rocket_accordion_panel',
		'controls'                => 'full',
		'content_element'         => true,
		'show_settings_on_create' => true,
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-accordion-advanced.png',
		'as_child'    => array( 'only' => 'rocket_accordion' ),
		'params'      => array(
			array(
				'heading'       => esc_html__( 'Title', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'title',
				'description'   => esc_html__( 'This title is shown before the user clicks the sliding panel.', 'rocket' )
			),
			array(
				'heading'       => esc_html__( 'Subtitle', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'subtitle',
				'description'   => esc_html__( 'This subtitle located under the title.', 'rocket' )
			),
			array(
				'heading'       => esc_html__( 'Short Description', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'description',
				'description'   => esc_html__( 'This short description is shown before the user clicks the sliding panel.', 'rocket' )
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Icon library', 'rocket' ),
				'param_name'    => 'icon_type',
				'value' => array(
					esc_html__( 'Font Awesome', 'rocket' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'rocket' )  => 'openiconic',
					esc_html__( 'Typicons', 'rocket' )     => 'typicons',
					esc_html__( 'Entypo', 'rocket' )       => 'entypo',
					esc_html__( 'Linecons', 'rocket' )     => 'linecons',
				),
				'description'   => esc_html__( 'Select icon library.', 'rocket' )
			),
			array(
				'type'          => 'iconpicker',
				'heading'       => esc_html__( 'Icon', 'rocket' ),
				'param_name'    => 'icon_fontawesome',
				'value'         => 'fa fa-info-circle',
				'settings'      => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'    => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'description'   => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type'          => 'iconpicker',
				'heading'       => esc_html__( 'Icon', 'rocket' ),
				'param_name'    => 'icon_openiconic',
				'settings'      => array(
					'emptyIcon'    => false,
					// default true, display an "EMPTY" icon?
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency'    => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'description'   => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'rocket' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Color', 'rocket' ),
				'param_name'  => 'color',
				'value'       => array(
					esc_html__( 'Primary', 'rocket' ) => 'primary',
					esc_html__( 'Secondary', 'rocket' ) => 'secondary',
					esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
					esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
					esc_html__( 'Custom Color', 'rocket' ) => 'custom',
				),
				'std'         => 'primary',
				'description' => esc_html__( 'Select icon color.', 'rocket' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Custom color', 'rocket' ),
				'param_name' => 'customcolor',
				'description' => esc_html__( 'Select custom icon color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => array( 'custom' ),
				),
			),
			array(
				'heading'    => esc_html__('Content', 'rocket'),
				'type'       => 'textarea_html',
				'param_name' => 'content',
				'value'      => esc_html__( '<h3>Heading</h3><p>Lorem ipsum dolor ante venenatis dapibus posuere.</p>', 'rocket' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Rocket_Accordion extends WPBakeryShortCodesContainer {
		}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Accordion_Panel extends WPBakeryShortCode {
		}
}




/**
 * Call to Action
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Shape', 'rocket' ),
		'param_name' => 'shape',
		'std' => 'square',
		'value' => array(
			esc_html__( 'Square', 'rocket' ) => 'square',
			esc_html__( 'Rounded', 'rocket' ) => 'rounded',
		),
		'description' => esc_html__( 'Select call to action shape.', 'rocket' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Style', 'rocket' ),
		'param_name' => 'style',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'classic',
			esc_html__( 'Flat', 'rocket' ) => 'flat',
			esc_html__( 'Outline', 'rocket' ) => 'outline',
			esc_html__( 'Custom', 'rocket' ) => 'custom',
		),
		'std' => 'classic',
		'description' => esc_html__( 'Select call to action display style.', 'rocket' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'color',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'classic',
			esc_html__( 'Primary', 'rocket' ) => 'primary',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Black', 'rocket' ) => 'black',
			esc_html__( 'Grey', 'rocket' ) => 'grey',
			esc_html__( 'White', 'rocket' ) => 'white',
		),
		'std' => 'classic',
		'description' => esc_html__( 'Select color schema.', 'rocket' ),
		'dependency' => array(
			'element' => 'style',
			'value_not_equal_to' => array( 'custom' ),
		),
	),

);
vc_add_params( 'vc_cta', $attributes );



/**
 * Pie Chart
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'color',
		'value' => array(
			esc_html__( 'Primary', 'rocket' ) => 'primary1',
			esc_html__( 'Secondary', 'rocket' ) => 'secondary',
			esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
			esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
			esc_html__( 'Black', 'rocket' ) => 'black',
			esc_html__( 'Grey', 'rocket' ) => 'grey',
			esc_html__( 'White', 'rocket' ) => 'white',
		) + array( esc_html__( 'Custom', 'rocket' ) => 'custom' ),
		'description' => esc_html__( 'Select pie chart color.', 'rocket' ),
		'admin_label' => true,
		'std' => 'grey',
	),

);
vc_add_params( 'vc_pie', $attributes );



/**
 * Post Grid (Filter)
 */
$attributes = array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Style', 'rocket' ),
		'param_name' => 'filter_style',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'default',
		),
		'dependency' => array(
			'element' => 'show_filter',
			'value' => array( 'yes' ),
		),
		'group' => esc_html__( 'Filter', 'rocket' ),
		'description' => esc_html__( 'Select filter display style.', 'rocket' ),
		'std' => 'default',
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Color', 'rocket' ),
		'param_name' => 'filter_color',
		'value' => array(
			esc_html__( 'Default', 'rocket' ) => 'default',
		),
		'std' => 'default',
		'dependency' => array(
			'element' => 'show_filter',
			'value' => array( 'yes' ),
		),
		'group' => esc_html__( 'Filter', 'rocket' ),
		'description' => esc_html__( 'Select filter color.', 'rocket' ),
	),
);
vc_add_params( 'vc_basic_grid', $attributes );





/**
 * Work Steps
 */
add_action( 'init', 'rocket_work_steps' );
function rocket_work_steps() {
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Work Steps', 'rocket'),
		'description'             => esc_html__('Work Steps', 'rocket'),
		'base'                    => 'rocket_work_steps',
		'show_settings_on_create' => false,
		// 'controls'                => 'full',
		// 'show_settings_on_create' => true,
		// 'content_element'         => true,
		'js_view'                 => 'VcColumnView',
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-work-process.png',
		'as_parent'   => array('only' => 'rocket_work_step'),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Direction', 'rocket' ),
				'param_name'  => 'layout_direction',
				'value'       => array(
					esc_html__( 'Horizontal', 'rocket' ) => 'horizontal',
					esc_html__( 'Vertical', 'rocket' )   => 'vertical',
				),
				'description' => esc_html__( 'Select layout direction.', 'rocket' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Line Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'line_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Title Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'title_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Title Color on Hover', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'title_color_hover',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'SubTitle Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'subtitle_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'SubTitle Color on Hover', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'subtitle_color_hover',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Dot Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'dot_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Dot Color on Hover', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'dot_color_hover',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Dot Border Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'dot_border_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Icon Color on Hover', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'icon_color_hover',
			),
			array(
				'group'       => esc_html__( 'CSS Class', 'rocket' ),
				'type'        => 'textfield',
				'holder'      => 'div',
				'heading'     => esc_html__('CSS class name', 'rocket'),
				'param_name'  => 'custom_css_class',
				'description' => esc_html__('Give this element an extra CSS class name if you wish to refer to it in a CSS file. (optional)', 'rocket')
			),
		),
	) );
}


add_action( 'init', 'rocket_work_step' );
function rocket_work_step() {
	// Map the accordion content
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Work Single Step', 'rocket'),
		'description'             => esc_html__('Add an accordion panel', 'rocket'),
		'base'                    => 'rocket_work_step',
		'controls'                => 'full',
		'content_element'         => true,
		'show_settings_on_create' => true,
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-work-process-single.png',
		'as_child'    => array( 'only' => 'rocket_work_steps' ),
		'params'      => array(
			array(
				'heading'       => esc_html__( 'Title', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'title',
				'description'   => esc_html__( 'This title is shown before the user clicks the sliding panel.', 'rocket' )
			),
			array(
				'heading'       => esc_html__( 'Subtitle', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'subtitle',
				'description'   => esc_html__( 'This subtitle located under the title.', 'rocket' )
			),
			array(
				'heading'       => esc_html__( 'Date/Text', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'date',
				'description'   => esc_html__( 'Add date or short text.', 'rocket' )
			),
			array(
				'heading'       => esc_html__( 'URL (Link)', 'rocket' ),
				'type'          => 'vc_link',
				'param_name'    => 'link',
				'description'   => esc_html__( 'Add link to the element or leave it empty.', 'rocket' ),
			),
			array(
				'heading'       => esc_html__( 'Active State?', 'rocket' ),
				'type'          => 'checkbox',
				'param_name'    => 'active',
				'value'         => array(
					esc_html__( 'Yes', 'rocket' ) => 'yes'
				),
			),
			array(
				'heading'       => esc_html__( 'Checkmark active?', 'rocket' ),
				'type'          => 'checkbox',
				'param_name'    => 'checkmark_active',
				'value'         => array(
					esc_html__( 'Yes', 'rocket' ) => 'yes'
				),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'    => 'el_class',
				'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__( 'CSS box', 'rocket' ),
				'param_name'    => 'css',
				'group'         => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Rocket_Work_Steps extends WPBakeryShortCodesContainer {
		}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Work_Step extends WPBakeryShortCode {
		}
}



/**
 * Countdown
 */
add_action( 'init', 'rocket_countdown' );
function rocket_countdown() {
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Countdown', 'rocket'),
		'description'             => esc_html__('Add an accordion panel', 'rocket'),
		'base'                    => 'rocket_countdown',
		'controls'                => 'full',
		'show_settings_on_create' => true,
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-countdown.png',
		'params'      => array(
			array(
				'heading'       => esc_html__( 'Event Date and Time', 'rocket' ),
				'type'          => 'textfield',
				'holder'        => 'div',
				'param_name'    => 'date_event',
				'description'   => esc_html__( 'Enter the date of the event in next format: <em>may 1, 2016 09:59</em>', 'rocket' )
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Days Circle Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'days_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Days Number Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'days_number_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Days Border Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'days_border_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Days Text Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'days_text_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Hours Circle Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'hours_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Hours Number Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'hours_number_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Hours Border Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'hours_border_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Hours Text Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'hours_text_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Minutes Circle Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'mins_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Minutes Number Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'mins_number_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Minutes Border Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'mins_border_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Minutes Text Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'mins_text_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Seconds Circle Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'secs_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Seconds Number Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'secs_number_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Seconds Border Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'secs_border_color',
			),
			array(
				'group'      => esc_html__( 'Design', 'rocket' ),
				'heading'    => esc_html__( 'Seconds Text Color', 'rocket'),
				'value'      => '',
				'type'       => 'colorpicker',
				'param_name' => 'secs_text_color',
			),
			array(
				'group'      => esc_html__( 'Labels', 'rocket' ),
				'heading'    => esc_html__( 'Days Label', 'rocket'),
				'value'      => 'Days',
				'type'       => 'textfield',
				'param_name' => 'days_text',
			),
			array(
				'group'      => esc_html__( 'Labels', 'rocket' ),
				'heading'    => esc_html__( 'Hours Label', 'rocket'),
				'value'      => 'Hours',
				'type'       => 'textfield',
				'param_name' => 'hours_text',
			),
			array(
				'group'      => esc_html__( 'Labels', 'rocket' ),
				'heading'    => esc_html__( 'Minutes Label', 'rocket'),
				'value'      => 'Minutes',
				'type'       => 'textfield',
				'param_name' => 'minutes_text',
			),
			array(
				'group'      => esc_html__( 'Labels', 'rocket' ),
				'heading'    => esc_html__( 'Seconds Label', 'rocket'),
				'value'      => 'Seconds',
				'type'       => 'textfield',
				'param_name' => 'seconds_text',
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Countdown extends WPBakeryShortCode {
		}
}



/**
 * Text Separator
 */
$attributes = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Color', 'rocket' ),
		'param_name'  => 'color',
		'value'       => array(
			esc_html__( 'Grey', 'rocket' )         => 'grey',
			esc_html__( 'White', 'rocket' )        => 'white',
			esc_html__( 'Black', 'rocket' )        => 'black',
			esc_html__( 'Custom Color', 'rocket' ) => 'custom',
		),
		'std'         => 'grey',
		'description' => esc_html__( 'Select color of separator.', 'rocket' ),
	),
);
vc_add_params( 'vc_text_separator', $attributes );




/**
 * Counter
 */

add_action( 'init', 'rocket_counter' );
function rocket_counter() {
	vc_map( array(
		'name' => esc_html__( 'Counter', 'rocket' ),
		'base' => 'rocket_counter',
		'icon' => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-counter.png',
		'category' => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Counter stats.', 'rocket' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Counter Title', 'rocket' ),
				'param_name' => 'title',
				'value' => esc_html__( 'Your Title', 'rocket' ),
				'description' => esc_html__( 'Enter title for the counter block.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Counter Value', 'rocket' ),
				'param_name' => 'value',
				'value' => esc_html__( '843', 'rocket' ),
				'description' => esc_html__( 'Enter value for the counter block.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Color', 'rocket' ),
				'param_name' => 'color',
				'value' => array(
					esc_html__( 'Primary', 'rocket' ) => 'primary',
					esc_html__( 'Secondary', 'rocket' ) => 'secondary',
					esc_html__( 'Tertiary', 'rocket' ) => 'tertiary',
					esc_html__( 'Quaternary', 'rocket' ) => 'quaternary',
				) + array(
					esc_html__( 'Custom Color', 'rocket' ) => 'custom',
				),
				'description' => esc_html__( 'Select counter background color.', 'rocket' ),
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Circle color', 'rocket' ),
				'param_name' => 'custom_color',
				'description' => esc_html__( 'Select custom color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => 'custom',
				),
				'param_holder_class' => 'vc_col-xs-4',
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Number color', 'rocket' ),
				'param_name' => 'custom_number_color',
				'description' => esc_html__( 'Select custom number color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => 'custom',
				),
				'param_holder_class' => 'vc_col-xs-4',
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Text color', 'rocket' ),
				'param_name' => 'custom_txt_color',
				'description' => esc_html__( 'Select custom text color.', 'rocket' ),
				'dependency' => array(
					'element' => 'color',
					'value' => 'custom',
				),
				'param_holder_class' => 'vc_col-xs-4',
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Shape', 'rocket' ),
				'param_name' => 'shape',
				'value' => array(
					esc_html__( 'Circle', 'rocket' ) => 'circle',
					esc_html__( 'Square', 'rocket' ) => 'square',
					esc_html__( 'Rounded', 'rocket' ) => 'rounded',
				),
				'description' => esc_html__( 'Select counter shape.', 'rocket' ),
			),
			array(
				'group' => esc_html__( 'Styling', 'rocket' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'rocket' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__( 'Normal', 'rocket' ) => 'normal',
					esc_html__( 'Small', 'rocket' ) => 'small',
					esc_html__( 'Large', 'rocket' ) => 'large',
				),
				'description' => esc_html__( 'Select counter size.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'rocket' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'rocket' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'rocket' ),
			),
		),
	) );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Counter extends WPBakeryShortCode {
		}
}


/**
 * Info Banner
 */
add_action( 'init', 'rocket_info_banner' );
function rocket_info_banner() {
	vc_map( array(
		'category'                => esc_html__('Content', 'rocket'),
		'name'                    => esc_html__('Info Banner', 'rocket'),
		'description'             => esc_html__('Image, text, buttons.', 'rocket'),
		'base'                    => 'rocket_info_banner',
		'controls'                => 'full',
		'show_settings_on_create' => true,
		'icon'                    => get_template_directory_uri() . '/vendor/js_composer/assets/images/icons/icon-info-banner.png',
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'rocket' ),
				'param_name'  => 'title',
				'value'       => esc_html__( 'Your Title', 'rocket' ),
				'description' => esc_html__( 'Enter title for the info banner.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'rocket' ),
				'param_name'  => 'subtitle',
				'value'       => esc_html__( 'Your Subtitle', 'rocket' ),
				'description' => esc_html__( 'Enter subtitle for the info banner.', 'rocket' ),
			),
			array(
				'type'        => 'textarea_html',
				'heading'     => esc_html__( 'Description', 'rocket' ),
				'param_name'  => 'content',
				'value'       => '',
				'description' => esc_html__( 'Enter short description for the info banner.', 'rocket' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content Alignment', 'rocket' ),
				'param_name'  => 'content_alignment',
				'value'       => array(
					esc_html__( 'Left', 'rocket' )   => 'left',
					esc_html__( 'Right', 'rocket' )  => 'right',
					esc_html__( 'Center', 'rocket' ) => 'center',
				),
				'description' => esc_html__( 'Select content alignment.', 'rocket' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Banner URL (Link)', 'rocket' ),
				'param_name'  => 'btn_link',
				'description' => esc_html__( 'Add link or select existing page to link to this banner.', 'rocket' ),
			),
			array(
				'group'       => 'Overlay',
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Overlay Enable', 'rocket' ),
				'param_name'  => 'overlay_enable',
				'value'       => array(
					esc_html__( 'Enable Banner Overlay?', 'rocket' ) => 'true'
				),
			),
			array(
				'group'       => 'Overlay',
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Banner Overlay Color', 'rocket' ),
				'param_name'  => 'overlay',
				'value'       => '#f9fafb',
				'description' => esc_html__('If not empty applied on Banner Background Image.','rocket'),
				'dependency'  => array(
					'element'   => 'overlay_enable',
					'value'     => 'true'
				),
			),
			array(
				'group'       => 'Overlay',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Overlay Opacity', 'rocket' ),
				'param_name'  => 'overlay_opacity',
				'value'       => '95',
				'description' => esc_html__( 'Enter Overlay Opacity (min 0 max 100).', 'rocket' ),
				'dependency'  => array(
					'element'   => 'overlay_enable',
					'value'     => 'true'
				),
			),
			array(
				'group'       => 'Image',
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Banner Image', 'rocket' ),
				'param_name'  => 'banner_img',
				'value'       => '',
				'description' => esc_html__( 'This image will be used as banner image.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Min Height', 'rocket' ),
				'param_name'  => 'min_height',
				'value'       => '150',
				'description' => esc_html__( 'Enter min height for the banner, in px', 'rocket' ),
			),
			array(
				'group'       => 'Image',
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image Alignment', 'rocket' ),
				'param_name'  => 'img_alignment',
				'value'       => array(
					esc_html__('Top Left','rocket')      => 'rocket_info-banner-img-top-left',
					esc_html__('Top Center','rocket')    => 'rocket_info-banner-img-top-center',
					esc_html__('Top Right','rocket')     => 'rocket_info-banner-img-top-right',
					esc_html__('Center Left','rocket')   => 'rocket_info-banner-img-center-left',
					esc_html__('Center','rocket')        => 'rocket_info-banner-img-center',
					esc_html__('Center Right','rocket')  => 'rocket_info-banner-img-center-right',
					esc_html__('Bottom Left','rocket')   => 'rocket_info-banner-img-bottom-left',
					esc_html__('Bottom Center','rocket') => 'rocket_info-banner-img-bottom-center',
					esc_html__('Bottom Right','rocket')  => 'rocket_info-banner-img-bottom-right',
				),
				'description' => esc_html__( 'Select banner image alignment.', 'rocket' ),
			),
			array(
				'group'       => 'Button',
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Button Enable', 'rocket' ),
				'param_name'  => 'btn_enable',
				'value'       => array(
					esc_html__( 'Enable Button?', 'rocket' ) => 'true'
				),
			),
			array(
				'group'       => 'Button',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Button Text', 'rocket' ),
				'param_name'  => 'btn_txt',
				'value'       => '',
				'description' => esc_html__( 'Enter short description for the info banner.', 'rocket' ),
				'dependency'  => array(
					'element'   => 'btn_enable',
					'value'     => 'true'
				),
			),
			array(
				'group'       => 'Button',
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Color', 'rocket' ),
				'param_name'  => 'btn_type',
				'value'       => array(
					esc_html__( 'Default', 'rocket' ) => 'default',
					esc_html__( 'Primary', 'rocket' ) => 'primary',
					esc_html__( 'Secondary', 'rocket' ) => 'secondary',
					esc_html__( 'Info', 'rocket' )    => 'info',
					esc_html__( 'Success', 'rocket' ) => 'success',
					esc_html__( 'Warning', 'rocket' ) => 'warning',
					esc_html__( 'Danger', 'rocket' ) => 'danger',
				),
				'description' => esc_html__( 'Select button color.', 'rocket' ),
				'dependency'  => array(
					'element'   => 'btn_enable',
					'value'     => 'true'
				),
			),
			array(
				'group'       => 'Image',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Image Height (px) - Desktop Large', 'rocket' ),
				'param_name'  => 'height_desktop_large',
				'value'       => '360',
				'description' => esc_html__( 'Enter the banner height on Large Desktops.', 'rocket' ),
			),
			array(
				'group'       => 'Image',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Image Height (px) - Desktop', 'rocket' ),
				'param_name'  => 'height_desktop',
				'value'       => '240',
				'description' => esc_html__( 'Enter the banner height on Desktop.', 'rocket' ),
			),
			array(
				'group'       => 'Image',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Image Height (px) - Tablet', 'rocket' ),
				'param_name'  => 'height_tablet',
				'value'       => '200',
				'description' => esc_html__( 'Enter the banner height on Tablets.', 'rocket' ),
			),
			array(
				'group'       => 'Image',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Banner Image Height (px) - Mobile', 'rocket' ),
				'param_name'  => 'height_mobile',
				'value'       => '120',
				'description' => esc_html__( 'Enter the banner height on Mobile devices.', 'rocket' ),
			),
			array(
				'group'       => 'Styling',
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'rocket' ),
				'param_name'  => 'title_color',
				'value'       => '',
				'description' => esc_html__('Change Title text color if needed.','rocket'),
			),
			array(
				'group'       => 'Styling',
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Subtitle Color', 'rocket' ),
				'param_name'  => 'subtitle_color',
				'value'       => '',
				'description' => esc_html__('Change Subtitle text color if needed.','rocket'),
			),
			array(
				'group'       => 'Styling',
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'rocket' ),
				'param_name'  => 'description_color',
				'value'       => '',
				'description' => esc_html__('Change Description text color if needed.','rocket'),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Info_Banner extends WPBakeryShortCode {
		}
}



/**
 * Title Bordered
 */

add_action( 'vc_before_init', 'rocket_token_sale_counter' );
function rocket_token_sale_counter() {
	vc_map( array(
		'name'        => esc_html__( 'Token Counter', 'rocket' ),
		'base'        => 'rocket_token_sale_counter',
		'category'    => esc_html__( 'Content', 'rocket' ),
		'description' => esc_html__( 'Sales Counter for Token.', 'rocket' ),
		'params' => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'rocket' ),
				'param_name'  => 'title',
				'value'       => esc_html__( 'Token Sale Ends In:', 'rocket' ),
				'description' => esc_html__( 'Add title here.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'rocket' ),
				'param_name'  => 'subtitle',
				'value'       => esc_html__( 'Current Bonus:', 'rocket' ),
				'description' => esc_html__( 'Add subtitle here.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'End Date:', 'rocket' ),
				'param_name'  => 'end_date',
				'value'       => '31 December 2018',
				'description' => esc_html__( 'The final date for the sale.', 'rocket' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Progress Bar - Bonus', 'rocket' ),
				'param_name'  => 'progress_value_current',
				'value'       => '50',
				'description' => esc_html__( 'Add Current Bonus.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Target - Amount', 'rocket' ),
				'param_name'  => 'target_amount',
				'value'       => '$50 000 000',
				'description' => esc_html__( 'Add Final Amount.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Target - Label', 'rocket' ),
				'param_name'  => 'target_label',
				'value'       => esc_html__( 'Target:', 'rocket' ),
				'description' => esc_html__( 'Add Target Label.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Min Transaction - Label', 'rocket' ),
				'param_name'  => 'min_label',
				'value'       => esc_html__( 'Min. transaction amount:', 'rocket' ),
				'description' => esc_html__( 'Add Min Transaction Label.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Min Transaction - Amount', 'rocket' ),
				'param_name'  => 'min_amount',
				'value'       => '$200 000',
				'description' => esc_html__( 'Add Minimum Transaction Amount.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Soft Cap - Label', 'rocket' ),
				'param_name'  => 'soft_cap_label',
				'value'       => esc_html__( 'Soft Cap:', 'rocket' ),
				'description' => esc_html__( 'Add Soft Cap Amount.', 'rocket' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Soft Cap - Amount', 'rocket' ),
				'param_name'  => 'soft_cap_value',
				'value'       => '$200 000',
				'description' => esc_html__( 'Add Soft Cap Amount.', 'rocket' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Button URL (Link)', 'rocket' ),
				'param_name'  => 'btn_link',
				'description' => esc_html__( 'Add link or select existing page to link this element.', 'rocket' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'rocket' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'rocket' ),
			),
			array(
				'type'        => 'css_editor',
				'heading'     => esc_html__( 'CSS box', 'rocket' ),
				'param_name'  => 'css',
				'group'       => esc_html__( 'Design Options', 'rocket' ),
			),
		)
	) );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Rocket_Token_Sale_Counter extends WPBakeryShortCode {
	}
}



// Page Template - Home
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_home' ); // Hook in
function rocket_add_page_template_home( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - Home Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row el_id="section-about" css=".vc_custom_1462913366165{padding-bottom: 100px !important;}"][vc_column][rocket_heading_section subtitle=""]About Company[/rocket_heading_section][vc_row_inner][vc_column_inner width="5/12"][vc_images_carousel images="" img_size="full" onclick="link_no" mode="vertical" hide_prev_next_buttons="yes" wrap="yes"][/vc_column_inner][vc_column_inner width="7/12"][rocket_heading_icon]Creative Start-Up idea[/rocket_heading_icon][rocket_testimonial name="Christian Womero" img_src="3275"]Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Morbi mollis tellus ac sapien. Phasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam mauris ut lacus. Fusce vel dui.[/rocket_testimonial][vc_separator style="dashed"][vc_column_text]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo.
<blockquote>
<p style="text-align: right;">Nothing is particularly hard if you divide it into small jobs</p>
</blockquote>
<p style="text-align: right;"><em>- Henry Harrison Ford</em></p>

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" section="darkest" separator_enable="true" separator_type="waves_svg_separator" separator_position="top_bottom_separator" el_id="section-work" css=".vc_custom_1475176205752{background-image: url(http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2015/09/bg-footer.png?id=3798) !important;}"][vc_column][rocket_heading_section subtitle="EXAMPLE OF WORK PROCESS" color="#ffffff"]How We Work[/rocket_heading_section][rocket_work_steps][rocket_work_step title="Project Start" subtitle="Approval of the terms of reference" link="||"][rocket_work_step title="PSD Design" subtitle="Graphic part of the template"][rocket_work_step title="HTML Version" subtitle="Development of high-quality layout"][rocket_work_step title="CMS Template" subtitle="CMS definition and conversion"][rocket_work_step title="Approval Stage" subtitle="Stage testing &amp; troubleshooting"][rocket_work_step title="24/7 Support" subtitle="Highly qualified template support"][/rocket_work_steps][/vc_column][/vc_row][vc_row css=".vc_custom_1462914340736{padding-top: 110px !important;padding-bottom: 110px !important;}"][vc_column][rocket_accordion][rocket_accordion_panel icon_fontawesome="fa fa-lightbulb-o" color="secondary" panel_active="false" title="Creative Start idea" subtitle="Cristian Womero" description="Phasellus dolor. Maecenas vestibulu mollis diam. Pellentesque ut neque. Quisque id mi. Ut tincidunt tincid"]Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. <strong>Morbi mattis ullamcorper velit.</strong> Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.
<ul>
	<li>Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</li>
	<li>Phasellus tempus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien</li>
	<li>Vivamus consectetuer hendrerit lacus. Cras non dolor</li>
</ul>
Phasellus magna. In hac habitasse dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis velit. <a href="#">Phasellus gravida semper nisi</a>. Nullam vel sem. Pellentesque tincidunt et, tincidunt eget, semper nec, quam.[/rocket_accordion_panel][rocket_accordion_panel icon_fontawesome="fa fa-rocket" color="quaternary" panel_active="false" title="Quick &amp; Efficient" subtitle="Cristian Womero" description="Phasellus dolor. Maecenas vestibulu mollis diam. Pellentesque ut neque. Quisque id mi. Ut tincidunt tincid"]Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. <strong>Morbi mattis ullamcorper velit.</strong> Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.
<ul>
	<li>Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</li>
	<li>Phasellus tempus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien</li>
	<li>Vivamus consectetuer hendrerit lacus. Cras non dolor</li>
</ul>
Phasellus magna. In hac habitasse dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis velit. <a href="#">Phasellus gravida semper nisi</a>. Nullam vel sem. Pellentesque tincidunt et, tincidunt eget, semper nec, quam.[/rocket_accordion_panel][rocket_accordion_panel icon_fontawesome="fa fa-heart-o" color="tertiary" panel_active="false" title="The Best Reviews" subtitle="Cristian Womero" description="Phasellus dolor. Maecenas vestibulu mollis diam. Pellentesque ut neque. Quisque id mi. Ut tincidunt tincid"]Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. <strong>Morbi mattis ullamcorper velit.</strong> Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.
<ul>
	<li>Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</li>
	<li>Phasellus tempus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien</li>
	<li>Vivamus consectetuer hendrerit lacus. Cras non dolor</li>
</ul>
Phasellus magna. In hac habitasse dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis velit. <a href="#">Phasellus gravida semper nisi</a>. Nullam vel sem. Pellentesque tincidunt et, tincidunt eget, semper nec, quam.[/rocket_accordion_panel][/rocket_accordion][vc_empty_space height="96px"][rocket_heading_section subtitle=""]Our Skills[/rocket_heading_section][vc_row_inner el_class="progress-condensed"][vc_column_inner width="1/2"][vc_column_text]
<h3>Let’s talking about percentage</h3>
Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Quisque id mi. Ut tincidunt tincidunt erat. Etiam feugiat lorem non metus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.

Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.[/vc_column_text][vc_progress_bar values="%5B%7B%22label%22%3A%22Web%20Design%22%2C%22value%22%3A%2290%22%2C%22color%22%3A%22warning%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-lightbulb-o%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22label%22%3A%22Web%20Development%22%2C%22value%22%3A%2280%22%2C%22color%22%3A%22primary%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-sliders%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22label%22%3A%22%20HTML%2FCSS3%20%22%2C%22value%22%3A%2260%22%2C%22color%22%3A%22primary%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-html5%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22label%22%3A%22JQuery%20(JS)%22%2C%22value%22%3A%2290%22%2C%22color%22%3A%22danger%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-pencil%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][rocket_progress_bar_vertical title="Web Design" number="90" color="warning" icon_type="false"][rocket_progress_bar_vertical title="Web Dev" number="80" icon_fontawesome="fa fa-smile-o"][rocket_progress_bar_vertical title="HTML5" number="60" icon_type="false"][rocket_progress_bar_vertical title="jQuery" number="90" color="danger" icon_type="false"][/vc_column_inner][/vc_row_inner][vc_empty_space height="64px"][rocket_separator_link]Read More[/rocket_separator_link][/vc_column][/vc_row][vc_row full_width="stretch_row" section="dark" separator_enable="true" separator_type="waves_svg_separator" separator_position="top_bottom_separator" el_id="section-gallery"][vc_column][rocket_heading_section subtitle="Some of our projects"]Our Gallery[/rocket_heading_section][vc_basic_grid post_type="portfolio" max_items="9" style="load-more" items_per_page="6" gap="1" item="basicGrid_GoTopSlideout" initial_loading_animation="none" btn_color="default" btn_align="center" btn_i_icon_fontawesome="fa fa-refresh" grid_id="vc_gid:1479161304754-cca3cc02-c714-3" btn_add_icon="true"][/vc_column][/vc_row][vc_row full_width="stretch_row" separator_enable="true" separator_type="waves_svg_separator" el_id="section-partners"][vc_column][vc_row_inner][vc_column_inner width="7/12"][rocket_heading_subsection subtitle="Partnerships with the best"]Partners[/rocket_heading_subsection][rocket_partners_carousel cols="2cols" loop="true" show_title="true"][/vc_column_inner][vc_column_inner width="5/12"][rocket_heading_subsection subtitle="Our clients today"]2000 +[/rocket_heading_subsection][rocket_partners_posts posts_per_page="9" cols="3cols"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" section="darkest" separator_enable="true" separator_type="waves_svg_separator" separator_position="top_bottom_separator" css=".vc_custom_1475176295065{background-image: url(http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2015/09/bg-footer.png?id=3798) !important;}"][vc_column][rocket_heading_section subtitle="Browse and use the Information" color="#ffffff"]Event Countdown[/rocket_heading_section][vc_row_inner][vc_column_inner width="2/3"][rocket_countdown days_text_color="#ffffff" hours_text_color="#ffffff" mins_text_color="#ffffff" secs_text_color="#ffffff" date_event="december 30, 2016 09:59"][/vc_column_inner][vc_column_inner width="1/3"][vc_column_text]<span style="color: #ffffff;">Use the buttons with category name to preview images in this category. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque</span>[/vc_column_text][vc_separator style="dashed"][vc_btn title="View this offer" color="primary" i_icon_fontawesome="fa fa-hand-o-right" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row el_id="section-products" css=".vc_custom_1462915033042{padding-top: 110px !important;padding-bottom: 110px !important;}"][vc_column][rocket_heading_section subtitle="The list of the products"]Latest Products[/rocket_heading_section][recent_products per_page="4" columns="4" orderby="date" order="DESC"][vc_text_separator title="" i_icon_fontawesome="fa fa-chevron-down" i_color="secondary" style="dashed" add_icon="true" el_class="vc_divider_bottom"][vc_empty_space][rocket_heading_section subtitle="Team members"]Our Team[/rocket_heading_section][rocket_team_carousel posts_per_page="4" loop="true"][/vc_column][/vc_row][vc_row full_width="stretch_row" section="dark" separator_enable="true" separator_type="waves_svg_separator" separator_position="top_bottom_separator" el_id="section-pricing"][vc_column][rocket_heading_section subtitle="Our pricing"]Pricing Tables[/rocket_heading_section][rocket_pricing_tables id="1767"][/vc_column][/vc_row][vc_row full_width="stretch_row" separator_enable="true" el_id="section-blog"][vc_column][rocket_heading_section subtitle="Our latest news"]Company Blog[/rocket_heading_section][vc_masonry_grid post_type="post" max_items="6" style="load-more" item="masonryGrid_ScaleWithRotation" initial_loading_animation="none" btn_color="default" btn_align="center" btn_i_icon_fontawesome="fa fa-refresh" grid_id="vc_gid:1479161304756-cd1e15a7-57b4-6" btn_add_icon="true"][rocket_separator_link border_style="dashed"]Visit our Blog[/rocket_separator_link][/vc_column][/vc_row][vc_row el_id="section-contacts"][vc_column][rocket_heading_section subtitle="Get in Touch"]Contact Us[/rocket_heading_section][contact-form-7 id="3469"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][vc_empty_space][vcmacedgmap height="420" controls="Hide All" shape="top_wave" toggle="true" styles="ultra_light_with_labels"][/vcmacedgmap][vc_empty_space height="70px"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][rocket_icon_box title="Our Address" icon_fontawesome="fa fa-map-marker" background_style="rounded" background_color="quaternary" size="lg"]
<h5>New York (Main Office)</h5>
40.719939, -74.010579
<h5>Miami (Support &amp; Dev.)</h5>
50.069587, 14.431292
<strong>Work time - 24/7</strong>[/rocket_icon_box][/vc_column][vc_column width="1/3"][rocket_icon_box title="Our Phones" icon_fontawesome="fa fa-phone" background_style="rounded" size="lg"]
<h5>Main Manager</h5>
8 800 380-123-45-67
<h5>Company Numbers</h5>
+380-12-34-56
8 800 360-231-13-32[/rocket_icon_box][/vc_column][vc_column width="1/3"][rocket_icon_box title="About Us" icon_fontawesome="fa fa-pencil" background_style="rounded" background_color="secondary" size="lg"]In hac habitasse platea dictum. Curabitur a felis in nunc fringi tristique. Nullam sem.

Pellentesque libero tortor, tin- dunt et, tincidunt eget. Pellen- tesque egestas, neque.[/rocket_icon_box][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}


// Page Template - About Me
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_about_me' ); // Hook in
function rocket_add_page_template_about_me( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - About Me Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row content_placement="bottom"][vc_column width="1/3" css=".vc_custom_1464175985022{margin-bottom: 77px !important;}"][vc_column_text css=".vc_custom_1464174962202{margin-bottom: 0px !important;}"]
<p style="text-align: center;">SEO and Marketing</p>

[/vc_column_text][vc_separator style="dashed" css=".vc_custom_1464174971041{margin-top: 20px !important;margin-bottom: 20px !important;}"][vc_column_text css=".vc_custom_1464175882660{margin-bottom: 0px !important;}"]
<h3 style="text-align: center;">Michael Fitser</h3>
[/vc_column_text][/vc_column][vc_column width="1/3"][vc_single_image image="" img_size="full" alignment="center" style="vc_box_circle_2"][/vc_column][vc_column width="1/3" el_class="text-center" css=".vc_custom_1464175938413{margin-bottom: 60px !important;}"][vc_column_text css=".vc_custom_1464174947339{margin-bottom: 0px !important;}"]
<p style="text-align: center;">Find me here!</p>

[/vc_column_text][vc_separator style="dashed" css=".vc_custom_1464174938707{margin-top: 20px !important;margin-bottom: 20px !important;}"][vc_icon icon_fontawesome="fa fa-youtube-play" color="secondary" background_style="rounded-outline" background_color="secondary" size="xs" align="center" display="inline-block" link="url:%23||" css=".vc_custom_1464175729300{margin-top: 0px !important;margin-right: 3px !important;margin-bottom: 0px !important;margin-left: 3px !important;}"][vc_icon icon_fontawesome="fa fa-facebook" color="secondary" background_style="rounded-outline" background_color="secondary" size="xs" align="center" display="inline-block" link="url:%23||" css=".vc_custom_1464175595467{margin-right: 3px !important;margin-bottom: 0px !important;margin-left: 3px !important;}"][vc_icon icon_fontawesome="fa fa-github" color="secondary" background_style="rounded-outline" background_color="secondary" size="xs" align="center" display="inline-block" link="url:%23||" css=".vc_custom_1464175600890{margin-right: 3px !important;margin-bottom: 0px !important;margin-left: 3px !important;}"][vc_icon icon_fontawesome="fa fa-instagram" color="secondary" background_style="rounded-outline" background_color="secondary" size="xs" align="center" display="inline-block" link="url:%23||" css=".vc_custom_1464175605885{margin-right: 3px !important;margin-bottom: 0px !important;margin-left: 3px !important;}"][vc_icon icon_fontawesome="fa fa-linkedin" color="secondary" background_style="rounded-outline" background_color="secondary" size="xs" align="center" display="inline-block" link="url:%23||" css=".vc_custom_1464175610835{margin-right: 3px !important;margin-bottom: 0px !important;margin-left: 3px !important;}"][/vc_column][/vc_row][vc_row][vc_column][vc_empty_space height="45px"][/vc_column][/vc_row][vc_row equal_height="yes" css=".vc_custom_1464178946463{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1464713838477{padding-top: 150px !important;padding-bottom: 150px !important;background-image: url(http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2016/05/about-me-img1.jpg?id=3632) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1464179222867{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 10px !important;padding-left: 30px !important;background-color: #f9fafb !important;border-left-color: #d2d2dd !important;border-left-style: solid !important;border-right-color: #d2d2dd !important;border-right-style: solid !important;border-top-color: #d2d2dd !important;border-top-style: solid !important;border-bottom-color: #d2d2dd !important;border-bottom-style: solid !important;}"][rocket_heading_bordered font_size="font_normal" border_style="dashed"]What I'm Talking About[/rocket_heading_bordered][vc_column_text]Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque habitant morb.[/vc_column_text][vc_btn title="Click here" color="primary"][/vc_column][/vc_row][vc_row equal_height="yes" css=".vc_custom_1464178965749{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1464179228840{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 10px !important;padding-left: 30px !important;background-color: #f9fafb !important;border-left-color: #d2d2dd !important;border-left-style: solid !important;border-right-color: #d2d2dd !important;border-right-style: solid !important;border-top-color: #d2d2dd !important;border-top-style: solid !important;border-bottom-color: #d2d2dd !important;border-bottom-style: solid !important;}"][rocket_heading_bordered font_size="font_normal" border_style="dashed"]A little bit about me[/rocket_heading_bordered][vc_column_text]Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque habitant morb.[/vc_column_text][vc_btn title="Click here" color="primary"][/vc_column][vc_column width="1/2" css=".vc_custom_1464713855690{padding-top: 150px !important;padding-bottom: 150px !important;background-image: url(http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2016/05/about-me-img2.jpg?id=3633) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][/vc_row][vc_row][vc_column][vc_empty_space height="60px"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="We can make everything" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_column_text]Fusce a quam. Etiam ut purus mattis mauris sodales aliquam. Curabitur nisi. Quisque malesuada placerat nisl. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Mauris sollicitudin fermentum libero. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere.

Cubilia id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][rocket_heading_bordered font_size="font_normal" border_style="dashed"]My Story[/rocket_heading_bordered][vc_column_text]Fusce a quam. Etiam ut purus mattis mauris sodales aliquam. Curabitur nisi. Quisque malesuada placerat nisl. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui. Vestibulum facilisis.[/vc_column_text][/vc_column][vc_column width="2/3"][rocket_heading_bordered font_size="font_normal" border_style="dashed"]My Awards[/rocket_heading_bordered][vc_column_text]Fusce a quam. Etiam ut purus mattis mauris sodales aliquam. Curabitur nisi. Quisque malesuada placerat nisl. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Mauris sollicitudin fermentum libero. Praesent nonummy mi in odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_separator style="dashed" css=".vc_custom_1464205656702{margin-top: 30px !important;margin-bottom: 60px !important;}"][/vc_column][/vc_row][vc_row][vc_column width="1/4" offset="vc_col-xs-6"][rocket_counter title="Finished Projects" color="secondary"][/vc_column][vc_column width="1/4" offset="vc_col-xs-6"][rocket_counter title="Cups of Tea" value="136" color="quaternary"][/vc_column][vc_column width="1/4" offset="vc_col-xs-6"][rocket_counter title="Happy Customers" value="740"][/vc_column][vc_column width="1/4" offset="vc_col-xs-6"][rocket_counter title="New Partners" value="491" color="tertiary"][/vc_column][/vc_row][vc_row][vc_column][vc_separator style="dashed" css=".vc_custom_1464205656702{margin-top: 30px !important;margin-bottom: 60px !important;}"][rocket_team_posts posts_per_page="3" cols="3cols" type="classic"][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}


// Page Template - About Me
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_about_us' ); // Hook in
function rocket_add_page_template_about_us( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - About Us Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row][vc_column][vc_single_image image="3628" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column width="7/12"][vc_column_text]
<h3>We can make everything</h3>
Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/vc_column_text][vc_row_inner][vc_column_inner width="1/4" offset="vc_col-xs-3"][vc_single_image image="2274" img_size="170x170"][/vc_column_inner][vc_column_inner width="3/4" offset="vc_col-xs-9"][vc_column_text]Aenean posuere, tortor sed cursus feugiat, nunc augue blandit sodales nec, volutpat a, suscipit non, turpis. Fusce id purus.

Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Praesent turpis.

<strong>-  Merry J. <img class="alignnone size-full wp-image-3626" src="http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2016/05/sign.png" alt="sign" width="102" height="54" /></strong>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="5/12"][vc_custom_heading text="Clients Testimonials" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][rocket_testimonial name="Christian Womero" img_src="2135"]Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc[/rocket_testimonial][vc_separator style="dashed" css=".vc_custom_1464103050702{margin-top: 35px !important;}"][rocket_testimonial name="Paullo Avendor" img_src="3276"]Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc[/rocket_testimonial][/vc_column][/vc_row][vc_row][vc_column][vc_separator style="dashed" css=".vc_custom_1464173722523{margin-top: 0px !important;margin-bottom: 50px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1464216226194{margin-left: 0px !important;}"][vc_column width="1/3" css=".vc_custom_1464173632262{border-top-width: 1px !important;border-right-width: 1px !important;border-bottom-width: 1px !important;border-left-width: 1px !important;padding-top: 25px !important;padding-right: 20px !important;padding-bottom: 0px !important;padding-left: 20px !important;background-color: #f9fafb !important;border-left-color: #d2d2dd !important;border-left-style: solid !important;border-right-color: #d2d2dd !important;border-right-style: solid !important;border-top-color: #d2d2dd !important;border-top-style: solid !important;border-bottom-color: #d2d2dd !important;border-bottom-style: solid !important;}"][vc_column_text]
<ul>
 	<li>Pellentesque libero tortor, tincidunt</li>
 	<li>Proin viverra, ligula sit amet ultrices</li>
 	<li>Vivamus consectetuer hendrerit lacus</li>
 	<li>Endrerit lacus metus, condimentum</li>
</ul>
[/vc_column_text][/vc_column][vc_column width="2/3"][vc_progress_bar values="%5B%7B%22label%22%3A%22Web%20Design%22%2C%22value%22%3A%2275%22%2C%22color%22%3A%22warning%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-lightbulb-o%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22label%22%3A%22Web%20Development%22%2C%22value%22%3A%2265%22%2C%22color%22%3A%22primary%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-sliders%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%2C%7B%22label%22%3A%22HTML%2FCSS%203%22%2C%22value%22%3A%2255%22%2C%22color%22%3A%22quinary%22%2C%22customcolor%22%3A%22%23ea582f%22%2C%22icon_type%22%3A%22fontawesome%22%2C%22icon_fontawesome%22%3A%22fa%20fa-html5%22%2C%22icon_openiconic%22%3A%22vc-oi%20vc-oi-dial%22%2C%22icon_typicons%22%3A%22typcn%20typcn-adjust-brightness%22%2C%22icon_entypo%22%3A%22entypo-icon%20entypo-icon-note%22%2C%22icon_linecons%22%3A%22vc_li%20vc_li-heart%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column][vc_text_separator title="Who works for you?" css=".vc_custom_1464174240962{margin-top: 60px !important;margin-bottom: 50px !important;}"][rocket_team_posts][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}


// Page Template - Services
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_services' ); // Hook in
function rocket_add_page_template_services( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - Services Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row css=".vc_custom_1464717105142{background-image: url(http://rocketwp.dan-fisher.com/demo-default/wp-content/uploads/2016/05/services-macbook.png?id=3670) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}" el_class="mobile-no-bg"][vc_column width="7/12"][vc_column_text]
<h3>We are the Best</h3>
Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in.

Faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/vc_column_text][vc_row_inner][vc_column_inner width="1/4" offset="vc_col-xs-4"][vc_icon type="entypo" icon_entypo="entypo-icon entypo-icon-lamp" color="custom" background_style="rounded" background_color="secondary" display="inline-block" custom_color="#ffffff" link="url:%23||"][/vc_column_inner][vc_column_inner width="1/4" offset="vc_col-xs-4"][vc_icon type="entypo" icon_entypo="entypo-icon entypo-icon-hourglass" color="custom" background_style="rounded" background_color="quaternary" display="inline-block" custom_color="#ffffff" link="url:%23||"][/vc_column_inner][vc_column_inner width="1/4" offset="vc_col-xs-4"][vc_icon type="entypo" icon_entypo="entypo-icon entypo-icon-heart-empty" color="custom" background_style="rounded" background_color="tertiary" display="inline-block" custom_color="#ffffff" link="url:%23||"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="5/12" offset="vc_hidden-xs"][/vc_column][/vc_row][vc_row][vc_column][vc_separator style="dashed" css=".vc_custom_1464096817695{margin-top: 50px !important;margin-bottom: 70px !important;}"][vc_row_inner][vc_column_inner width="1/3"][rocket_icon_box title="100% Responsive" type="entypo" icon_entypo="entypo-icon entypo-icon-monitor" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rocket_icon_box title="Visual Composer" type="entypo" icon_entypo="entypo-icon entypo-icon-trophy" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rocket_icon_box title="Redux Framework" type="entypo" icon_entypo="entypo-icon entypo-icon-heart" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][rocket_icon_box title="Design" type="entypo" icon_entypo="entypo-icon entypo-icon-camera" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rocket_icon_box title="WPML compatible" type="entypo" icon_entypo="entypo-icon entypo-icon-graduation-cap" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rocket_icon_box title="PSD included" type="entypo" icon_entypo="entypo-icon entypo-icon-rocket" color="secondary" background_style="rounded-outline" background_color="custom" size="sm" link="url:%23||" custom_background_color="#e5e2e0"]Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque.[/rocket_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column][vc_empty_space height="64px"][/vc_column][/vc_row][vc_row][vc_column][vc_text_separator title="Contact Us"][/vc_column][/vc_row][vc_row css=".vc_custom_1464717137571{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column css=".vc_custom_1464101620838{padding: 25px !important;background-color: #f9fafb !important;border: 1px solid #d2d2dd !important;}"][contact-form-7 id="3469"][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}


// Page Template - Team Classic
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_team_classic' ); // Hook in
function rocket_add_page_template_team_classic( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - Team Classic Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row][vc_column][rocket_team_posts posts_per_page="6" cols="3cols" type="classic"][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}


// Page Template - Team Modern
add_filter( 'vc_load_default_templates', 'rocket_add_page_template_team_modern' ); // Hook in
function rocket_add_page_template_team_modern( $data ) {
		$template               = array();
		$template['name']       = esc_html__( 'Rocket - Team Modern Page', 'rocket' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = <<<CONTENT
				[vc_row][vc_column][rocket_team_posts posts_per_page="6"][/vc_column][/vc_row]
CONTENT;
		array_unshift( $data, $template );
		return $data;
}
