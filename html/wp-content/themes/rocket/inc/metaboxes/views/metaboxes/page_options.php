<div class="rocket_metabox">

	<?php

		// Slider
		$this->select(
			'slider_type',
			esc_html__('Page Slider', 'rocket'),
			array(
				'none'      => esc_html__( 'No Slider', 'rocket' ),
				'revslider' => esc_html__( 'Revolution Slider', 'rocket' ),
			),
			esc_html__('Show or hide slider on the page.', 'rocket')
		);

		// If Slider exists add option to select one of them
		if ( is_plugin_active('revslider/revslider.php') ) {
			$this->select(
				'slider',
				esc_html__( 'Select Revolution Slider', 'rocket' ),
				all_rev_sliders_in_array(),
				esc_html__('Select Revolution Slider you created or imported.', 'rocket')
			);
		}

		// Page Layout
		$this->select(
			'sidebar',
			esc_html__('Select Page Layout', 'rocket'),
			array(
				'right' => esc_html__('Page with Right Sidebar', 'rocket'),
				'left'  => esc_html__('Page with Left Sidebar', 'rocket'),
				'none'  => esc_html__('Page with No Sidebar (Full Width)', 'rocket')
			),
			esc_html__('Choose a layout for the page.', 'rocket')
		);

		// Header
		$this->select(
			'header',
			esc_html__('Show Header?', 'rocket'),
			array(
				'yes' => esc_html__('Yes', 'rocket'),
				'no'  => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Header on the page.', 'rocket')
		);

		// Title
		$this->select(
			'title',
			esc_html__('Show title?', 'rocket'),
			array(
				'yes' => esc_html__('Yes', 'rocket'),
				'no'  => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Page Title on the page.', 'rocket')
		);

		// Custom Page Title
		$this->text(
			'custom_title',
			esc_html__( 'Custom Page Title', 'rocket' ),
			esc_html__( 'You can enter your custom page title.', 'rocket')
		);

		// Top Bar
		$this->select(
			'top_bar',
			esc_html__('Hide Top Bar', 'rocket'),
			array(
				'no'  => esc_html__('No', 'rocket'),
				'yes' => esc_html__('Yes', 'rocket')
			),
			esc_html__('Show or hide Header Top Bar on the page.', 'rocket')
		);

		// Footer Widgets
		$this->select(
			'footer_widgets',
			esc_html__('Show Footer Widgets?', 'rocket'),
			array(
				'default' => esc_html__('Default', 'rocket'),
				'yes' => esc_html__('Yes', 'rocket'),
				'no'  => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Footer Widgets on the page.', 'rocket')
		);

		// Footer
		$this->select(
			'footer',
			esc_html__('Show Footer?', 'rocket'),
			array(
				'yes' => esc_html__('Yes', 'rocket'),
				'no'  => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Footer on the page.', 'rocket')
		);

		// Header Separator Type
		$this->select(
			'header_separator',
			esc_html__('Header Separator', 'rocket'),
			array(
				'default'                           => esc_html__( 'Default', 'rocket' ),
				'none'                              => esc_html__( 'None', 'rocket' ),
				'waves_svg_separator'               => esc_html__( 'Wave', 'rocket' ),
				'tilt_left_svg_separator'           => esc_html__( 'Tilt Left', 'rocket' ),
				'tilt_right_svg_separator'          => esc_html__( 'Tilt Right', 'rocket' ),
				'curve_right_svg_separator'         => esc_html__( 'Curve Right', 'rocket' ),
				'curve_left_svg_separator'          => esc_html__( 'Curve Left', 'rocket' ),
				'big_triangle_left_svg_separator'   => esc_html__( 'Big Triangle Left', 'rocket' ),
				'big_triangle_right_svg_separator'  => esc_html__( 'Big Triangle Right', 'rocket' ),
				'big_triangle_center_svg_separator' => esc_html__( 'Big Triangle Center', 'rocket' ),
				'triangle_center_svg_separator'     => esc_html__( 'Triangle Center', 'rocket' ),
				'debris_svg_separator'              => esc_html__( 'Debris', 'rocket' ),
				'hills_svg_separator'               => esc_html__( 'Hills', 'rocket' ),
				'drops_svg_separator'               => esc_html__( 'Drops', 'rocket' ),
				'curve_inside_center_svg_separator' => esc_html__( 'Curve Inside', 'rocket' ),
			),
			esc_html__('Option allows you to set individual Header Separator for the page.', 'rocket')
		);

		// Footer Separator Type
		$this->select(
			'footer_separator',
			esc_html__('Footer Separator', 'rocket'),
			array(
				'default'                           => esc_html__( 'Default', 'rocket' ),
				'none'                              => esc_html__( 'None', 'rocket' ),
				'waves_svg_separator'               => esc_html__( 'Wave', 'rocket' ),
				'tilt_left_svg_separator'           => esc_html__( 'Tilt Left', 'rocket' ),
				'tilt_right_svg_separator'          => esc_html__( 'Tilt Right', 'rocket' ),
				'curve_right_svg_separator'         => esc_html__( 'Curve Right', 'rocket' ),
				'curve_left_svg_separator'          => esc_html__( 'Curve Left', 'rocket' ),
				'big_triangle_left_svg_separator'   => esc_html__( 'Big Triangle Left', 'rocket' ),
				'big_triangle_right_svg_separator'  => esc_html__( 'Big Triangle Right', 'rocket' ),
				'big_triangle_center_svg_separator' => esc_html__( 'Big Triangle Center', 'rocket' ),
				'triangle_center_svg_separator'     => esc_html__( 'Triangle Center', 'rocket' ),
				'debris_svg_separator'              => esc_html__( 'Debris', 'rocket' ),
				'hills_svg_separator'               => esc_html__( 'Hills', 'rocket' ),
				'drops_svg_separator'               => esc_html__( 'Drops', 'rocket' ),
				'curve_inside_center_svg_separator' => esc_html__( 'Curve Inside', 'rocket' ),
			),
			esc_html__('Option allows you to set individual Footer Separator for the page.', 'rocket')
		);
	?>
</div>
