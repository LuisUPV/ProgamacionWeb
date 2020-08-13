<div class="rocket_metabox">

	<?php

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
			esc_html__('Show or hide Post Title on the page.', 'rocket')
		);

		// Custom Post Title
		$this->text(
			'custom_title',
			esc_html__( 'Custom Post Title', 'rocket' ),
			esc_html__( 'You can enter your custom post title.', 'rocket')
		);

		// Post Layout
		$this->select(
			'sidebar',
			esc_html__('Select Post Layout', 'rocket'),
			array(
				'right' => esc_html__('Page with Right Sidebar', 'rocket'),
				'left'  => esc_html__('Page with Left Sidebar', 'rocket'),
				'none'  => esc_html__('Page with No Sidebar (Full Width)', 'rocket')
			),
			esc_html__('Choose a layout for the post.', 'rocket')
		);

		// Post Author Box
		$this->select(
			'post_author',
			esc_html__('Show Post Author Box?', 'rocket'),
			array(
				'default' => esc_html__('Default', 'rocket'),
				'yes'     => esc_html__('Yes', 'rocket'),
				'no'      => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Post Author box on this post. Leave "Default" if you want to control it globaly with Theme Options', 'rocket')
		);

		// Top Bar
		$this->select(
			'top_bar',
			esc_html__('Hide Top Bar', 'rocket'),
			array(
				'no'  => esc_html__('No', 'rocket'),
				'yes' => esc_html__('Yes', 'rocket')
			),
			esc_html__('Show or hide Header Top Bar on the post.', 'rocket')
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
			esc_html__('Show or hide Footer Widgets on the post.', 'rocket')
		);

		// Footer
		$this->select(
			'footer',
			esc_html__('Show Footer?', 'rocket'),
			array(
				'yes' => esc_html__('Yes', 'rocket'),
				'no'  => esc_html__('No', 'rocket'),
			),
			esc_html__('Show or hide Footer on the post.', 'rocket')
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
			esc_html__('Option allows you to set individual Header Separator for the post.', 'rocket')
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
			esc_html__('Option allows you to set individual Footer Separator for the post.', 'rocket')
		);
	?>
</div>
