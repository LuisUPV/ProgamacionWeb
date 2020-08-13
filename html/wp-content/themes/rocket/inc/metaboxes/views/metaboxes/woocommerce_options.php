<div class="rocket_metabox">

	<?php

		// Page Layout
		$this->select(
			'sidebar',
			esc_html__( 'Select Page Layout', 'rocket' ),
			array(
				'none'  => esc_html__('Page with No Sidebar (Full Width)', 'rocket'),
				'right' => esc_html__('Page with Right Sidebar', 'rocket'),
				'left'  => esc_html__('Page with Left Sidebar', 'rocket')
			),
			''
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
			esc_html__( 'Show title?', 'rocket' ),
			array(
				'yes' => esc_html__( 'Yes', 'rocket' ),
				'no'  => esc_html__( 'No', 'rocket' )
			),
			esc_html__('Show or hide Page Title on the page.', 'rocket')
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

	?>
</div>
