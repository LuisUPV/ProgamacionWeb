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
			esc_html__( 'Show title?', 'rocket' ),
			array(
				'yes' => esc_html__( 'Yes', 'rocket' ),
				'no'  => esc_html__( 'No', 'rocket' )
			),
			esc_html__('Show or hide Page Title on the page.', 'rocket')
		);

		// Custom Page Title
		$this->text(
			'custom_title',
			esc_html__( 'Custom Page Title', 'rocket' ),
			esc_html__( 'You can enter your custom page title.', 'rocket')
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

		// Team Member Position
		$this->text(
			'position',
			esc_html__( 'Position', 'rocket' )
		);

		// Description
		$this->textarea(
			'excerpt',
			esc_html__( 'Description', 'rocket' )
		);

		// Team Member Email Address
		$this->text(
			'email',
			esc_html__( 'Email Address', 'rocket' )
		);

		// Facebook
		$this->text(
			'facebook',
			esc_html__( 'Facebook Link', 'rocket' )
		);

		// Twitter
		$this->text(
			'twitter',
			esc_html__( 'Twitter Link', 'rocket' )
		);

		// LinkedIn
		$this->text(
			'linkedin',
			esc_html__( 'LinkedIn Link', 'rocket' )
		);

		// Google+
		$this->text(
			'gplus',
			esc_html__( 'Google+ Link', 'rocket' )
		);

		// Skill 1 Label
		$this->text(
			'skill_1_label',
			esc_html__( 'Skill 1 - Label', 'rocket' ),
			esc_html__( 'Enter Skill Label, e.g Web Design.', 'rocket')
		);

		// Skill 1 Value
		$this->text(
			'skill_1_value',
			esc_html__( 'Skill 1 - Value', 'rocket' ),
			esc_html__( 'Enter number from 0 to 100.', 'rocket')
		);

		// Skill 1 Color
		$this->select(
			'skill_1_color',
			esc_html__( 'Skill 1 - Color', 'rocket' ),
			array(
				'primary'  => esc_html__( 'Primary', 'rocket' ),
				'alt'      => esc_html__( 'Primary Accent', 'rocket' ),
				'danger'   => esc_html__( 'Danger', 'rocket' ),
				'warning'  => esc_html__( 'Warning', 'rocket' ),
				'info'     => esc_html__( 'Info', 'rocket' ),
				'success'  => esc_html__( 'Success', 'rocket' ),
			),
			''
		);

		// Skill 1 Icon
		$this->text(
			'skill_1_icon',
			esc_html__( 'Skill 1 - Icon', 'rocket' ),
			esc_html__( 'Enter FontAwesome class name, e.g fa-info.', 'rocket')
		);



		// Skill 2 Label
		$this->text(
			'skill_2_label',
			esc_html__( 'Skill 2 - Label', 'rocket' ),
			esc_html__( 'Enter Skill Label, e.g Web Design.', 'rocket')
		);

		// Skill 2 Value
		$this->text(
			'skill_2_value',
			esc_html__( 'Skill 2 - Value', 'rocket' ),
			esc_html__( 'Enter number from 0 to 100.', 'rocket')
		);

		// Skill 2 Color
		$this->select(
			'skill_2_color',
			esc_html__( 'Skill 2 - Color', 'rocket' ),
			array(
				'primary'  => esc_html__( 'Primary', 'rocket' ),
				'alt'      => esc_html__( 'Primary Accent', 'rocket' ),
				'danger'   => esc_html__( 'Danger', 'rocket' ),
				'warning'  => esc_html__( 'Warning', 'rocket' ),
				'info'     => esc_html__( 'Info', 'rocket' ),
				'success'  => esc_html__( 'Success', 'rocket' ),
			),
			''
		);

		// Skill 2 Icon
		$this->text(
			'skill_2_icon',
			esc_html__( 'Skill 2 - Icon', 'rocket' ),
			esc_html__( 'Enter FontAwesome class name, e.g fa-info.', 'rocket')
		);




		// Skill 3 Label
		$this->text(
			'skill_3_label',
			esc_html__( 'Skill 3 - Label', 'rocket' ),
			esc_html__( 'Enter Skill Label, e.g Web Design.', 'rocket')
		);

		// Skill 3 Value
		$this->text(
			'skill_3_value',
			esc_html__( 'Skill 3 - Value', 'rocket' ),
			esc_html__( 'Enter number from 0 to 100.', 'rocket')
		);

		// Skill 3 Color
		$this->select(
			'skill_3_color',
			esc_html__( 'Skill 3 - Color', 'rocket' ),
			array(
				'primary'  => esc_html__( 'Primary', 'rocket' ),
				'alt'      => esc_html__( 'Primary Accent', 'rocket' ),
				'danger'   => esc_html__( 'Danger', 'rocket' ),
				'warning'  => esc_html__( 'Warning', 'rocket' ),
				'info'     => esc_html__( 'Info', 'rocket' ),
				'success'  => esc_html__( 'Success', 'rocket' ),
			),
			''
		);

		// Skill 3 Icon
		$this->text(
			'skill_3_icon',
			esc_html__( 'Skill 3 - Icon', 'rocket' ),
			esc_html__( 'Enter FontAwesome class name, e.g fa-info.', 'rocket')
		);




		// Skill 4 Label
		$this->text(
			'skill_4_label',
			esc_html__( 'Skill 4 - Label', 'rocket' ),
			esc_html__( 'Enter Skill Label, e.g Web Design.', 'rocket')
		);

		// Skill 4 Value
		$this->text(
			'skill_4_value',
			esc_html__( 'Skill 4 - Value', 'rocket' ),
			esc_html__( 'Enter number from 0 to 100.', 'rocket')
		);

		// Skill 4 Color
		$this->select(
			'skill_4_color',
			esc_html__( 'Skill 4 - Color', 'rocket' ),
			array(
				'primary'  => esc_html__( 'Primary', 'rocket' ),
				'alt'      => esc_html__( 'Primary Accent', 'rocket' ),
				'danger'   => esc_html__( 'Danger', 'rocket' ),
				'warning'  => esc_html__( 'Warning', 'rocket' ),
				'info'     => esc_html__( 'Info', 'rocket' ),
				'success'  => esc_html__( 'Success', 'rocket' ),
			),
			''
		);

		// Skill 4 Icon
		$this->text(
			'skill_4_icon',
			esc_html__( 'Skill 4 - Icon', 'rocket' ),
			esc_html__( 'Enter FontAwesome class name, e.g fa-info.', 'rocket')
		);

	?>
</div>
