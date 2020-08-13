<div class="rocket_metabox">

	<?php

		// Sidebar Options
		$this->hide_sidebar();

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
			esc_html__( 'Show title?' ),
			array(
				'yes' => esc_html__( 'Yes', 'rocket' ),
				'no'  => esc_html__( 'No', 'rocket' )
			),
			esc_html__('Show or hide Page Title on the page.', 'rocket')
		);

		// Custom Project Title
		$this->text(
			'custom_title',
			esc_html__( 'Custom Project Title', 'rocket' ),
			esc_html__( 'You can enter your custom project title.', 'rocket')
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
			esc_html__('Show or hide Footer on the page.', 'rocket')
		);

		// Layout
		$this->select(
			'layout',
			esc_html__( 'Choose Layout' ),
			array(
				'default'     => esc_html__( 'Default', 'rocket' ),
				'right_desc'  => esc_html__( 'Right Description', 'rocket' ),
				'left_desc'   => esc_html__( 'Left Description', 'rocket' ),
				'full_width'  => esc_html__( 'Full Width', 'rocket' ),
				'blank'       => esc_html__( 'Blank', 'rocket' )
			),
			''
		);

		// Author Name
		$this->text(
			'author',
			esc_html__( 'Author name', 'rocket' )
		);

		// Client Name
		$this->text(
			'client',
			esc_html__( 'Client name', 'rocket' )
		);

		// Tools used
		$this->text(
			'tools',
			esc_html__( 'Tools', 'rocket' )
		);

		// Project URL
		$this->text(
			'project_url',
			esc_html__( 'Project url', 'rocket' )
		);
	?>

</div>
