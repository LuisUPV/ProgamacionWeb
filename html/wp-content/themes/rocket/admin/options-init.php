<?php

		/**
		 * For full documentation, please visit: http://docs.reduxframework.com/
		 * For a more extensive sample-config file, you may look at:
		 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
		 */

		if ( ! class_exists( 'Redux' ) ) {
				return;
		}

		// This is your option name where all the Redux data is stored.
		$opt_name = "rocket_data";

		/**
		 * ---> SET ARGUMENTS
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 * */

		$theme = wp_get_theme(); // For use with some settings. Not necessary.

		$args = array(
			'opt_name' => 'rocket_data',
			'dev_mode' => false,
			'use_cdn' => true,
			'display_name' => $theme->get( 'Name' ),
			'display_version' => $theme->get( 'Version' ),
			'page_slug' => '_options',
			'page_title' => esc_html__('Theme Options', 'rocket'),
			'admin_bar' => true,
			'menu_type' => 'menu',
			'menu_title' => esc_html__('Theme Options', 'rocket'),
			'admin_bar_icon' => 'dashicons-admin-generic',
			'allow_sub_menu' => true,
			'page_parent_post_type' => 'your_post_type',
			'customizer' => true,
			'hints' => array(
				'icon'          => 'el el-question-sign',
				'icon_position' => 'right',
				'icon_size'     => 'normal',
				'tip_style'     => array(
					'color' => 'dark',
				),
				'tip_position' => array(
					'my' => 'top left',
					'at' => 'bottom right',
				),
				'tip_effect' => array(
					'show' => array(
						'duration' => '500',
						'event'    => 'mouseover',
					),
					'hide' => array(
						'duration' => '500',
						'event'    => 'mouseleave unfocus',
					),
				),
			),
			'output' => true,
			'output_tag' => true,
			'settings_api' => true,
			'cdn_check_time' => '1440',
			'compiler' => true,
			'page_permissions' => 'manage_options',
			'save_defaults' => true,
			'show_import_export' => true,
			'transient_time' => '3600',
			'network_sites' => true,
			'disable_tracking' => true,
			'disable_demo' => true,
		);

		Redux::setArgs( $opt_name, $args );

		/*
		 * ---> END ARGUMENTS
		 */


		/*
		 *
		 * ---> START SECTIONS
		 *
		 */

		// General Settings
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'General Settings', 'rocket' ),
			'id'     => 'rocket__section-general',
			'icon'   => 'el el-cogs',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-logo-standard',
					'type'      => 'media',
					'url'       => true,
					'title'     => esc_html__('Logo Image', 'rocket'),
					'compiler'  => 'true',
					//'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
					'desc'      => esc_html__('Upload your image or remove image if you want to use text-based logo.', 'rocket'),
					'default'   => array( 
						'url' => get_template_directory_uri() . '/images/logo.png'
					),
					'width'     => '',
					'height'    => '',
				),
				array(
					'id'        => 'rocket__opt-logo-retina',
					'type'      => 'media',
					'url'       => true,
					'title'     => esc_html__( 'Logo Image @2x', 'rocket' ),
					'compiler'  => 'true',
					'desc'      => esc_html__( 'Upload your image for retina displays or specify the image URL. It should be x2 time bigger than standard logo image.', 'rocket' ),
				),
				array(
					'id'             => 'rocket__opt-logo-width',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),
					'units_extended' => 'false',
					'title'          => esc_html__( 'Logo width', 'rocket' ),
					'subtitle'       => esc_html__( 'Set your Logo width.', 'rocket' ),
					'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.', 'rocket' ),
					'height'         => false,
					'default'        => array(
						'width'  => 140
					)
				),
				array(
					'id'             => 'rocket__opt-logo-width-sticky',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),
					'units_extended' => 'false',
					'title'          => esc_html__( 'Logo width for Sticky Header', 'rocket' ),
					'subtitle'       => esc_html__( 'Set your Logo width for Sticky Header.', 'rocket' ),
					'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.', 'rocket' ),
					'height'         => false,
					'default'        => array(
						'width'  => 110
					)
				),
				array(
					'id'             => 'rocket__opt-logo-width-mobile',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),
					'units_extended' => 'false',
					'title'          => esc_html__( 'Logo width on Mobiles', 'rocket' ),
					'subtitle'       => esc_html__( 'Set your Logo width on Mobile devices.', 'rocket' ),
					'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.', 'rocket' ),
					'height'         => false,
					'default'        => array(
						'width'  => 88
					)
				),
				array(
					'id'            => 'rocket__opt-tracking_code',
					'type'          => 'textarea',
					'title'         => esc_html__('Tracking Code', 'rocket'),
					'subtitle'      => esc_html__('Google Analytics or similar', 'rocket'),
					'desc'          => esc_html__('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'rocket'),
					'validate'      => '',
					'default'       => '',
					'allowed_html'  => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
				),
				array(
					'id'        => 'rocket_opt-open-graphs',
					'type'      => 'switch',
					'title'     => esc_html__('Enable Open Graphs?', 'rocket'),
					'subtitle'  => esc_html__('Not affected on third-party plugins.', 'rocket'),
					'desc'      => esc_html__('The Open Graph protocol enables any web page to become a rich object in a social graph.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
			)
		) );


		// Header Settings
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Header', 'rocket' ),
			'id'     => 'rocket__section-header',
			'icon'   => 'el el-arrow-up',
			'fields' => array(
				array(
					'id'        => 'rocket_opt-header-spacing',
					'type'      => 'switch',
					'title'     => esc_html__('Adjust Header Paddings?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to customize the Header.', 'rocket'),
					'default'   => 0,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
				array(
					'id'             => 'rocket_opt-header-spacing-desktop',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Header Paddings - Desktop', 'rocket'),
					'subtitle'       => esc_html__('Set Header Paddings for Desktop.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Header. Applied only for desktop monitors.', 'rocket'),
					'default'            => array(
						'padding-top'     => '40px',
						'padding-bottom'  => '86px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-header-spacing', '=', '1'),
				),
				array(
					'id'             => 'rocket_opt-header-spacing-tablet',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Header Paddings - Tablet', 'rocket'),
					'subtitle'       => esc_html__('Set Header Paddings for Tablets.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Header. Applied only for tablets.', 'rocket'),
					'default'            => array(
						'padding-top'     => '24px',
						'padding-bottom'  => '56px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-header-spacing', '=', '1'),
				),
				array(
					'id'             => 'rocket_opt-header-spacing-mobile',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Header Paddings - Mobile', 'rocket'),
					'subtitle'       => esc_html__('Set Header Paddings for Mobile devices.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Header. Applied only for mobile devices.', 'rocket'),
					'default'            => array(
						'padding-top'     => '10px',
						'padding-bottom'  => '10px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-header-spacing', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-sticky-header',
					'type'      => 'switch',
					'title'     => esc_html__('Enable Sticky Header?', 'rocket'),
					'subtitle'  => esc_html__('The Header will remain in view at the top.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
			)
		) );


		// Header Top Bar
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Header Top Bar', 'rocket' ),
			'id'     => 'rocket__subsection-header-top-bar',
			'subsection' => true,
			'fields' => array(
				array(
					 'id'       => 'rocket_section-header-top-bar-content-start',
					 'type'     => 'section',
					 'title'    => __('Layout Options', 'rocket'),
					 'subtitle' => __('In section you can organize elements in the Header Top Bar.', 'rocket'),
					 'indent'   => true
				),
				array(
					'id'        => 'rocket_opt-header-top-bar',
					'type'      => 'switch',
					'title'     => esc_html__('Show Header Top Bar?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Top Bar in the top of the Header.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-phone',
					'type'      => 'switch',
					'title'     => esc_html__('Display phone number?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to display the phone number in the Header Top Bar.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-phone-number',
					'type'      => 'text',
					'title'     => esc_html__('Phone number', 'rocket'),
					'subtitle'  => esc_html__('Number to display next to the phone icon.', 'rocket'),
					'default'   => esc_html__('+1-234-567-8910', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar-phone', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-email',
					'type'      => 'switch',
					'title'     => esc_html__('Display Email Address?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to display the email address in the Header Top Bar.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-email-address',
					'type'      => 'text',
					'title'     => esc_html__('Email address', 'rocket'),
					'subtitle'  => esc_html__('Email address to display next to the envelope icon.', 'rocket'),
					'default'   => esc_html__('sales@dan-fisher.com', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar-email', '=', '1'),
				),

				array(
					'id'        => 'rocket_opt-header-top-bar-custom-text-switch',
					'type'      => 'switch',
					'title'     => esc_html__('Display Custom Text', 'rocket'),
					'subtitle'  => esc_html__('Turn on to display custom text in the Header Top Bar.', 'rocket'),
					'default'   => 0,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-custom-text',
					'type'      => 'text',
					'title'     => esc_html__('Custom text', 'rocket'),
					'subtitle'  => esc_html__('You enter your custom text or links here.', 'rocket'),
					'desc'      => esc_html__('HTML tags are allowed.', 'rocket'),
					'default'   => esc_html__('Your Custom Text Here', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar-custom-text-switch', '=', '1'),
				),

				array(
					'id'        => 'rocket_opt-header-top-bar-login',
					'type'      => 'switch',
					'title'     => esc_html__('Display "Login/Register"?', 'rocket'),
					'subtitle'  => esc_html__('Login/Register links in the Header Top Bar.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
					'hint'        => array(
						'title'   => esc_html__('WooCommerce Options', 'rocket'),
						'content' => esc_html__('The following options will are only available if you are using WooCommerce.', 'rocket'),
					),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-wpml-switcher',
					'type'      => 'switch',
					'title'     => esc_html__('Display Language Switcher?', 'rocket'),
					'subtitle'  => esc_html__('Language Switcher for WPML plugin.', 'rocket'),
					'default'   => 0,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
					'hint'        => array(
						'title'   => esc_html__('WPML Options', 'rocket'),
						'content' => esc_html__('The following options will are only available if you are using WPML plugin.', 'rocket'),
					),
				),

				array(
						'id'     => 'rocket_section-header-top-bar-content-end',
						'type'   => 'section',
						'indent' => false,
				),

				array(
					 'id'       => 'rocket_section-header-top-bar-styling-start',
					 'type'     => 'section',
					 'title'    => __('Styling Options', 'rocket'),
					 'subtitle' => __('In section you can customize styling of elements in the Header Top Bar.', 'rocket'),
					 'indent'   => true,
					 'required'  => array('rocket_opt-header-top-bar', '=', '1'),
				),
				array(
					'id'        => 'rocket_opt-header-top-bar-styling',
					'type'      => 'switch',
					'title'     => esc_html__('Customize Header Top Bar?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors for the Header Top Bar.', 'rocket'),
					'default'   => 'off',
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
					'required'  => array('rocket_opt-header-top-bar', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-top-bar-bg',
					'type'                  => 'background',
					'output'                => array('.h-top-bar'),
					'title'                 => esc_html__('Header Top Bar Background Color', 'rocket'),
					'subtitle'              => esc_html__('Pick a background color for the Header Top bar.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => '#36274c',
					),
					'required'              => array('rocket_opt-header-top-bar-styling', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-top-bar-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Header Top Bar Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options.', 'rocket' ),
					'desc'     => esc_html__('You can set width (top, right, bottom, left), color and type of the border.', 'rocket'),
					'all'      => false,
					'output'   => array( '.h-top-bar__color1' ),
					'default'  => array(
						'border-color'  => '#4a3d60',
						'border-style'  => 'solid',
						'border-top'    => '0',
						'border-bottom' => '1px',
						'border-left'   => '0',
						'border-right'  => '0',
					),
					'required' => array('rocket_opt-header-top-bar-styling', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-top-bar-txt-color',
					'type'        => 'color',
					'output'      => array( '.h-top-bar' ),
					'title'       => esc_html__( 'Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Applied only on text in the Header Top Bar', 'rocket' ),
					'default'     => '#d2d2dd',
					'required'    => array('rocket_opt-header-top-bar-styling', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-top-bar-link-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Links Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Colors for the links in the Header Top Bar.', 'rocket' ),
					'output'      => array( '.h-top-bar a, .h-top-bar #lang_sel ul a, .h-top-bar #lang_sel ul a.lang_sel_sel' ),
					'active'      => false,
					'default'     => array(
						'regular' => '#ffffff',
						'hover'   => '#ff7149',
					),
					'required' => array('rocket_opt-header-top-bar-styling', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-top-bar-icon-color',
					'type'        => 'color',
					'output'      => array( '.h-top-bar .h-top-bar_item:before, .h-top-bar #lang_sel ul a.lang_sel_sel > .icl_lang_sel_current:before' ),
					'title'       => esc_html__( 'Icons Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Applied to icons before elements in the Header Top Bar', 'rocket' ),
					'default'     => '#ff7149',
					'required'    => array('rocket_opt-header-top-bar-styling', '=', '1'),
				),

				array(
						'id'     => 'rocket_section-header-top-bar-styling-end',
						'type'   => 'section',
						'indent' => false,
				),
			)
		) );


		// Search Form
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Search Form', 'rocket' ),
			'id'     => 'rocket__subsection-header-search-form',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket_opt-header-search-form',
					'type'      => 'switch',
					'title'     => esc_html__('Show "Search" icon in the Header?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Search icon in the Header.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
				array(
					'id'        => 'rocket_opt-custom-header-search-form',
					'type'      => 'switch',
					'title'     => esc_html__('Customize Search Form?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors for Search Form.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket_opt-header-search-form', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-search-form-icon-bg',
					'type'                  => 'background',
					'output'                => array('.navbar-search .navbar-search-icon'),
					'title'                 => esc_html__('Icon Background Color', 'rocket'),
					'subtitle'              => esc_html__('Search Icon displayed in the Header Navigation.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => 'transparent',
					),
					'required'              => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-search-form-icon-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Icon Border', 'rocket' ),
					'subtitle' => esc_html__( 'Search Icon Border styling options.', 'rocket' ),
					'output'   => array( '.navbar-search .navbar-search-icon' ),
					'subtitle' => esc_html__('Search Icon displayed in the Header Navigation.', 'rocket'),
					'default'  => array(
						'border-color'  => '#836aa0',
						'border-style'  => 'solid',
						'border-width'   => '2px'
					),
					'required' => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-search-form-icon-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Icon Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Breadcrumbs links.', 'rocket' ),
					'output'      => array( '.navbar-search .navbar-search-icon' ),
					'active' => false,
					'default'     => array(
						'regular' => '#fff',
						'hover'   => '#836aa0',
					),
					'required' => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-search-form-bg',
					'type'                  => 'background',
					'output'                => array('.form-search__nav'),
					'title'                 => esc_html__('Search Form Background Color', 'rocket'),
					'subtitle'              => esc_html__('Search Form displayed in the Header Navigation.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => '#fff',
					),
					'required'              => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-search-form-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Search Form Input Border', 'rocket' ),
					'subtitle' => esc_html__( 'Search Form Input border options.', 'rocket' ),
					'output'   => array( '.form-search__nav input[type="text"]' ),
					'subtitle' => esc_html__('Search Form appears if click on Search Icon.', 'rocket'),
					'default'  => array(
						'border-color'  => '#d2d2dd',
						'border-style'  => 'solid',
						'border-width'   => '1px'
					),
					'required' => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-search-form-input-bg',
					'type'                  => 'background',
					'output'                => array('.form-search__nav input[type="text"]'),
					'title'                 => esc_html__('Search Form Input Background Color', 'rocket'),
					'subtitle'              => esc_html__('Search Form appears if click on Search Icon.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => 'transparent',
					),
					'required'              => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-search-form-input-txt-color',
					'type'        => 'color',
					'output'      => array( '.form-search__nav input[type="text"]' ),
					'title'       => esc_html__( 'Search Form Input Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes Search Form Input Text Color', 'rocket' ),
					'default'     => '#656269',
					'required'    => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-search-form-input-icon-color',
					'type'        => 'link_color',
					'output'      => array( '.form-search__nav .form-search__nav-submit' ),
					'title'       => esc_html__( 'Search Form Input Icon Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes Search Form Input Icon Color (magnifying glass)', 'rocket' ),
					'default'     => array(
						'regular' => '#656269',
						'hover'   => '#fff',
						'active'  => '#fff',
					),
					'required' => array('rocket_opt-custom-header-search-form', '=', '1'),
				),
			)
		) );

		// Shopping Cart Header
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Cart', 'rocket' ),
			'id'     => 'rocket__subsection-header-cart-header',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket_opt-notice-cart-header',
					'type'      => 'info',
					'notice'    => true,
					'icon'      => 'el el-icon-warning-sign',
					'style'     => 'warning',
					'title'     => esc_html__('WooCommerce Options', 'rocket'),
					'desc'      => esc_html__('The following options are available if WooCommerce installed.', 'rocket')
				),
				array(
					'id'        => 'rocket_opt-header-cart',
					'type'      => 'switch',
					'title'     => esc_html__('Show "Shopping" icon in the Header?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to display the Woocommerce cart icon.', 'rocket'),
					'default'   => true,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket_opt-custom-header-cart',
					'type'      => 'switch',
					'title'     => esc_html__('Customize Header Shopping Cart?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors for Shopping Cart in the Header.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket_opt-header-cart', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-cart-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Cart Border', 'rocket' ),
					'subtitle' => esc_html__( 'Cart border options.', 'rocket' ),
					'output'   => array( '.header-cart .cart-contents' ),
					'subtitle' => esc_html__('Border options for the Header Cart.', 'rocket'),
					'default'  => array(
						'border-color'  => '#836aa0',
						'border-style'  => 'solid',
						'border-width'  => '2px'
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-txt-color',
					'type'        => 'color',
					'output'      => array( '.header-cart .cart-contents' ),
					'title'       => esc_html__( 'Header Cart Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes the Header Cart text color.', 'rocket' ),
					'default'     => '#fff',
					'required'    => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-cart-icon-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Cart Icon Border', 'rocket' ),
					'subtitle' => esc_html__( 'Cart icon border options.', 'rocket' ),
					'subtitle' => esc_html__('Header Cart Icon border options.', 'rocket'),
					'default'  => array(
						'border-color'  => '#ff7149',
						'border-style'  => 'dashed',
						'border-top'    => '2px'
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-icon-bg-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Cart Icon Background Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes Cart Icon Background color.', 'rocket' ),
					'default'     => array(
						'regular' => '#836aa0',
						'hover'   => '#ff7149',
						'active'  => '#ff7149',
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-icon-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Cart Icon Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes Cart Icon color.', 'rocket' ),
					'output'      => array( '.header-cart .cart-contents .cart-icon' ),
					'default'     => array(
						'regular' => '#fff',
						'hover'   => '#fff',
						'active'  => '#fff',
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-cart-dropdown-bg-color',
					'type'                  => 'background',
					'output'                => array('.header-cart .header-cart-dropdown .widget_shopping_cart_content'),
					'title'                 => esc_html__('Dropdown Cart Background Color', 'rocket'),
					'subtitle'              => esc_html__('Dropdown Cart appears after hover over Cart Icon.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => '#fff',
					),
					'required'              => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-header-cart-dropdown-btns-section-bg-color',
					'type'                  => 'background',
					'output'                => array('.header-cart .header-cart-dropdown .widget_shopping_cart_content .buttons'),
					'title'                 => esc_html__('Dropdown Cart Buttons Section Background Color', 'rocket'),
					'subtitle'              => esc_html__('Dropdown Cart appears after hover over Cart Icon.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color'    => '#f1f2f4',
					),
					'required'              => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-dropdown-txt-color',
					'type'        => 'color',
					'output'      => array( '.header-cart .header-cart-dropdown' ),
					'title'       => esc_html__( 'Dropdown Cart Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Dropdown Cart appears after hover over Cart Icon.', 'rocket' ),
					'default'     => '#746981',
					'required'    => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-dropdown-product-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Dropdown Cart Product Name Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Changes Products Names Color.', 'rocket' ),
					'output'      => array( '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li a' ),
					'default'     => array(
						'regular' => '#746981',
						'hover'   => '#ff7149',
						'active'  => '#ff7149',
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-header-cart-dropdown-price-color',
					'type'        => 'color',
					'output'      => array( '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li .quantity .amount' ),
					'title'       => esc_html__( 'Dropdown Cart Product Price Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Dropdown Cart appears after hover over Cart Icon.', 'rocket' ),
					'default'     => '#ff7149',
					'required'    => array('rocket_opt-custom-header-cart', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-header-cart-dropdown-divider',
					'type'     => 'border',
					'title'    => esc_html__( 'Dropdown Cart Products Divider', 'rocket' ),
					'subtitle' => esc_html__( 'Changes divider between products and sections.', 'rocket' ),
					'all'      => false,
					'output'   => array( '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li, .header-cart .header-cart-dropdown .widget_shopping_cart_content .total, .header-cart .header-cart-dropdown .widget_shopping_cart_content .buttons' ),
					'default'  => array(
						'border-color'  => '#d2d2dd',
						'border-style'  => 'dashed',
						'border-top'    => '1px',
						'border-bottom' => '0',
						'border-left'   => '0',
						'border-right'  => '0',
					),
					'required' => array('rocket_opt-custom-header-cart', '=', '1'),
				),
			)
		) );

		// Header Separator & Background
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Background & Separator', 'rocket' ),
			'id'     => 'rocket__subsection-header-separator',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__opt-header-bg',
					'type'        => 'background',
					'output'      => array( '.top-wrapper' ),
					'title'       => esc_html__( 'Header Background', 'rocket' ),
					'subtitle'    => esc_html__( 'Header background options.', 'rocket' ),
					'default'     => array(
						'background-color'      => '#36274c',
						'background-image'      => get_template_directory_uri() . '/images/bg1.png',
						'background-repeat'     => 'no-repeat',
						'background-position'   => 'center top',
						'background-attachment' => 'inherit',
						'background-size'       => 'cover',
					),
				),

				array(
					'id'        => 'rocket__opt-header-separator',
					'type'      => 'image_select',
					'compiler'  => true,
					'title'     => esc_html__('Header Separator Type', 'rocket'),
					'subtitle'  => esc_html__('Select the Header separator type.', 'rocket'),
					'desc'      => esc_html__('Select one of the predefined separators type for the Header.', 'rocket'),
					'options'   => array(
						'none' => array(
								'alt' => esc_html__( 'None', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-none.jpg'),
						'waves_svg_separator' => array(
								'alt' => esc_html__( 'Wave', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-wave.jpg'),
						'tilt_left_svg_separator' => array(
								'alt' => esc_html__( 'Tilt Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-tilt-left.jpg'),
						'tilt_right_svg_separator' => array(
								'alt' => esc_html__( 'Tilt Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-tilt-right.jpg'),
						'curve_left_svg_separator' => array(
								'alt' => esc_html__( 'Curve Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-curve-left.jpg'),
						'curve_right_svg_separator' => array(
								'alt' => esc_html__( 'Curve Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-curve-right.jpg'),
						'big_triangle_center_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-big-triangle-center.jpg'),
						'big_triangle_left_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-big-triangle-left.jpg'),
						'big_triangle_right_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-big-triangle-right.jpg'),
						'triangle_center_svg_separator' => array(
								'alt' => esc_html__( 'Triangle Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-triangle-center.jpg'),
						'debris_svg_separator' => array(
								'alt' => esc_html__( 'Debris', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-debris.jpg'),
						'hills_svg_separator' => array(
								'alt' => esc_html__( 'Hills', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-hills.jpg'),
						'drops_svg_separator' => array(
								'alt' => esc_html__( 'Drops', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-drops.jpg'),
						'curve_inside_center_svg_separator' => array(
								'alt' => esc_html__( 'Curve Inside Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/header-separator-curve-inside-center.jpg'),
					),
					'default'   => 'waves_svg_separator'
				),

				array(
					'id'                    => 'rocket__opt-header-separator-color',
					'type'                  => 'background',
					'title'                 => esc_html__('Separator Color', 'rocket'),
					'subtitle'              => esc_html__('Choose Header separator color or leave it empty ( Main Background color will be used instead).', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'transparent'           => false,
				),

				array(
					'id'          => 'rocket__opt-header-sticky-bg',
					'type'        => 'color_rgba',
					'title'       => esc_html__( 'Sticky Header Background', 'rocket' ),
					'subtitle'    => esc_html__( 'Background color for Header on scroll.', 'rocket' ),
					'desc'        => esc_html__( 'This color will be applied for Sticky Header on Scroll.', 'rocket' ),
					'output'      => array('.header.affix'),
					'default'     => array(
						'color' => '#36274c',
						'alpha' => '.95'
					),
					'mode'        => 'background',
					//'validate' => 'colorrgba',
				),
			)
		) );


		// Page Heading
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Page Heading', 'rocket' ),
			'id'     => 'rocket__section-page-heading',
			'icon'   => 'el el-text-width',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-page-title-breadcrumbs-position',
					'type'      => 'select',
					'title'     => esc_html__('Page Title & Breadcrumbs position', 'rocket'),
					'subtitle'  => esc_html__('Select Page Title & Breadcrumbs.', 'rocket'),
					'options'   => array(
						'1'  => esc_html__( 'Both Centered', 'rocket' ),
						'2'  => esc_html__( 'Page Title - left, Breadcrumbs - right', 'rocket' ),
						'3'  => esc_html__( 'Page Title - right, Breadcrumbs - left', 'rocket' ),
					),
					'default'   => '1'
				),
				array(
					'id'        => 'rocket__opt-page-title-position',
					'type'      => 'select',
					'title'     => esc_html__('Page Heading Position', 'rocket'),
					'subtitle'  => esc_html__('Select Page Heading position.', 'rocket'),
					'desc'      => esc_html__('You can select position of the Page Heading.', 'rocket'),
					'options'   => array(
						'1'  => esc_html__( 'Inside the Main Content', 'rocket' ),
						'2'  => esc_html__( 'Inside the Header', 'rocket' ),
					),
					'default'   => '1'
				),
				array(
					'id'          => 'rocket__opt-page-title-overflow',
					'type'        => 'switch',
					'title'       => esc_html__('Cut overflowed Page Title?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to cut overflowed Page Title.', 'rocket'),
					'desc'        => esc_html__('This option determines how the Page Title is displayed. This option only affects title that is overflowing a block container element.', 'rocket'),
					'default'     => 1,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs-dots',
					'type'        => 'switch',
					'title'       => esc_html__('Show Page Heading Dots?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to show three dots.', 'rocket'),
					'desc'        => esc_html__('Three dots located at the bottom of Page Title by default.', 'rocket'),
					'default'     => 1,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__custom_page-title-breadcrumbs-dots',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Page Headings Dots?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to change colors of Page Heading dots.', 'rocket'),
					'required'    => array('rocket__opt-page-title-breadcrumbs-dots', '=', '1'),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs-dots-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Page Heading Dots color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Page Heading dots.', 'rocket' ),
					'default'     => '#ff7149',
					'transparent' => false,
					'required'    => array(
						array('rocket__opt-page-title-breadcrumbs-dots', '=', '1'),
						array('rocket__custom_page-title-breadcrumbs-dots', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-page-title-background-on',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Page Heading Background?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to customize backgrounds properties.', 'rocket'),
					'default'     => 0,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'                    => 'rocket__opt-page-title-background',
					'type'                  => 'background',
					'output'                => array('.page-title'),
					'title'                 => esc_html__('Page Heading Background', 'rocket'),
					'default'               => array(
						'background-color'    => 'none',
					),
					'required'    => array('rocket__opt-page-title-background-on', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-page-title-overlay-on',
					'type'        => 'switch',
					'title'       => esc_html__('Add Color Overlay on Page Heading Image?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to add color overlay.', 'rocket'),
					'default'     => 0,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-paget-title-overlay',
					'type'        => 'color_rgba',
					'title'       => esc_html__( 'Page Heading Image Overlay', 'rocket' ),
					'subtitle'    => esc_html__( 'Choose color for the Page Heading.', 'rocket' ),
					'desc'        => esc_html__( 'This color will be used on overlay element over Page Header Background Image.', 'rocket' ),
					'mode'        => 'background',
					'output'      => array('.section-title-overlay'),
					'default'     => array(
						'color' => '#fff',
						'alpha' => '.92'
					),
					'required'    => array('rocket__opt-page-title-overlay-on', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-page-title-border-on',
					'type'        => 'switch',
					'title'       => esc_html__('Add Page Heading Bottom Border?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to customize backgrounds properties.', 'rocket'),
					'default'     => 0,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-page-title-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Page Heading Bottom Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for the Page Title.', 'rocket' ),
					'desc'     => esc_html__( 'Enter border size (1), type (solid) and color.', 'rocket' ),
					'all'      => false,
					'left'     => false,
					'right'    => false,
					'output'   => array( '.section-title-decoration' ),
					'required' => array('rocket__opt-page-title-border-on', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-page-title-spacing-on',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Page Heading Padding?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to customize top padding.', 'rocket'),
					'default'     => 0,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'             => 'rocket__opt-page-title-spacing-desktop',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'bottom'         => false,
					'title'          => esc_html__('Page Headings Paddings - Desktop', 'rocket'),
					'subtitle'       => esc_html__('Set paddings for Desktop.', 'rocket'),
					'desc'           => esc_html__('You can set Top Paddings for the Page Headings. Applied only for desktop monitors.', 'rocket'),
					'default'            => array(
						'padding-top'     => '120px',
						'units'           => 'px',
					),
					'required'  => array('rocket__opt-page-title-spacing-on', '=', '1'),
				),
				array(
					'id'             => 'rocket__opt-page-title-spacing-tablet',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'bottom'         => false,
					'title'          => esc_html__('Page Headings Paddings - Tablet', 'rocket'),
					'subtitle'       => esc_html__('Set paddings for Tablets.', 'rocket'),
					'desc'           => esc_html__('You can set Top Paddings for the Page Headings. Applied only for tablets.', 'rocket'),
					'default'            => array(
						'padding-top'     => '60px',
						'units'           => 'px',
					),
					'required'  => array('rocket__opt-page-title-spacing-on', '=', '1'),
				),
				array(
					'id'             => 'rocket__opt-page-title-spacing-mobile',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'bottom'         => false,
					'title'          => esc_html__('Page Headings Paddings - Mobile', 'rocket'),
					'subtitle'       => esc_html__('Set paddings for Mobile devices.', 'rocket'),
					'desc'           => esc_html__('You can set Top Paddings for the Page Headings. Applied only for mobile devices.', 'rocket'),
					'default'            => array(
						'padding-top'     => '30px',
						'units'           => 'px',
					),
					'required'  => array('rocket__opt-page-title-spacing-on', '=', '1'),
				),
			)
		) );

		// Breadcrumbs
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Breadcrumbs', 'rocket' ),
			'id'     => 'rocket__subsection-page-heading-breadcrumbs',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs',
					'type'        => 'switch',
					'title'       => esc_html__('Show Breadcrumbs?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to show Breadcrumbs', 'rocket'),
					'default'     => 1,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-breadcrumbs-type',
					'type'      => 'select',
					'title'     => esc_html__('Breadcrumbs Type', 'rocket'),
					'subtitle'  => esc_html__('Select the Breadcrumbs type.', 'rocket'),
					'options'   => array(
						'1'  => esc_html__( 'Default', 'rocket' ),
						'2'  => esc_html__( 'Bordered', 'rocket' ),
					),
					'default'   => '1',
					'required'  => array('rocket__opt-page-title-breadcrumbs', '=', '1'),
				),
				array(
					'id'          => 'rocket__custom_breadcrumbs',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Breadcrumbs Colors?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to change colors for Breadcrumbs.', 'rocket'),
					'required'    => array('rocket__opt-page-title-breadcrumbs', '=', '1'),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Breadcrumbs Link Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Breadcrumbs links.', 'rocket' ),
					'output'      => array( '.breadcrumb > li > a' ),
					'default'     => array(
						'regular' => '#746981',
						'hover'   => '#ff7149',
						'active'  => '#fb3700',
					),
					'required'    => array(
						array ('rocket__opt-page-title-breadcrumbs', '=', '1',),
						array ('rocket__custom_breadcrumbs', '=', '1',),
					),
				),
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs-txt-color',
					'type'        => 'color',
					'output'      => array( '.breadcrumb > li.current' ),
					'title'       => esc_html__( 'Breadcrumbs Current Crumb Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Breadcrumbs Current text.', 'rocket' ),
					'default'     => '#c8c8c8',
					'required'    => array(
						array ('rocket__opt-page-title-breadcrumbs', '=', '1',),
						array ('rocket__custom_breadcrumbs', '=', '1',),
					),
				),
				array(
					'id'          => 'rocket__opt-page-title-breadcrumbs-sep-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Breadcrumbs Separator Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Breadcrumbs Separator.', 'rocket' ),
					'default'     =>  '#d5d6d9',
					'required'    => array(
						array('rocket__opt-page-title-breadcrumbs', '=', '1',),
						array('rocket__custom_breadcrumbs', '=', '1',),
					),
				),
			)
		) );

		// Page Heading Presets
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Presets', 'rocket' ),
			'id'     => 'rocket__subsection-page-heading-presets',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket__opt-page-title-preset',
					'type'      => 'image_select',
					'presets'   => true,
					'title'     => esc_html__('Page Heading Presets', 'rocket'),
					'subtitle'  => esc_html__('Select the Page Heading Preset.', 'rocket'),
					'desc'      => esc_html__('Select one of the predefined preset type for the Page Title & Breadcrumbs.', 'rocket'),
					'options'   => array(
						'page_title_preset_1' => array(
							'alt' => esc_html__( 'Preset 1', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/page-heading-1.jpg',
							'presets' => array(
								'rocket__custom_page_title_font' => 0,
								'rocket__opt-page-title-background-on' => 0,
								'rocket__opt-page-title-breadcrumbs-dots' => 1,
								'rocket__opt-page-title-breadcrumbs-position' => 1,
								'rocket__opt-page-title-border-on' => 0,
								'rocket__opt-header-separator' => 'waves_svg_separator',
								'rocket_opt-header-spacing' => 0,
								'rocket__opt-breadcrumbs-type' => 1,
								'rocket__opt-page-title-overlay-on' => 0,
								'rocket__opt-page-title-position' => 1,
								'rocket__custom_breadcrumbs' => 0,
							)
						),
						'page_title_preset_2' => array(
							'alt' => esc_html__( 'Preset 2', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/page-heading-2.jpg',
							'presets' => array(
								'rocket__opt-header-separator' => 'none',
								'rocket__custom_page_title_font' => 1,
								'rocket__opt-typography-page-title' => array(
									'color'       => '#4d306e',
									'font-weight' => '700',
									'font-family' => 'Open Sans',
									'google'      => true,
									'font-size'   => '36px',
								),
								'rocket__opt-page-title-background-on' => 1,
								'rocket__opt-page-title-background' => array(
									'background-image'      => '',
									'background-attachment' => '',
									'background-position'   => '',
									'background-repeat'     => '',
									'background-size'       => '',
									'background-color'      => 'none',
								),
								'rocket__opt-page-title-breadcrumbs-dots' => 0,
								'rocket__opt-page-title-breadcrumbs-position' => 2,
								'rocket__opt-page-title-border-on' => 1,
								'rocket__opt-page-title-border' => array(
									'border-top'    => '0px',
									'border-bottom' => '1px',
									'border-style'  => 'dashed',
									'border-color'  => '#d9d9d9',
								),
								'rocket_opt-header-spacing' => 1,
								'rocket_opt-header-spacing-desktop' => array(
									'padding-top' => '40px',
									'padding-bottom' => '50px'
								),
								'rocket_opt-header-spacing-tablet' => array(
									'padding-top' => '30px',
									'padding-bottom' => '40px'
								),
								'rocket__opt-breadcrumbs-type' => 1,
								'rocket__opt-page-title-overlay-on' => 0,
								'rocket__opt-page-title-position' => 1,
								'rocket__custom_breadcrumbs' => 0,
							)
						),
						'page_title_preset_3' => array(
							'alt' => esc_html__( 'Preset 3', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/page-heading-3.jpg',
							'presets' => array(
								'rocket__opt-header-separator' => 'none',
								'rocket__custom_page_title_font' => 1,
								'rocket__opt-typography-page-title' => array(
									'color'       => '#4d306e',
									'font-weight' => '700',
									'font-family' => 'Open Sans',
									'google'      => true,
									'font-size'   => '36px',
								),
								'rocket__opt-page-title-background-on' => 1,
								'rocket__opt-page-title-background' => array(
									'background-color'      => '#e6e8ec',
									'background-image'      => '',
									'background-attachment' => '',
									'background-position'   => '',
									'background-repeat'     => '',
									'background-size'       => '',
								),
								'rocket__opt-page-title-breadcrumbs-dots' => 0,
								'rocket__opt-page-title-breadcrumbs-position' => 2,
								'rocket__opt-page-title-border-on' => 0,
								'rocket_opt-header-spacing' => 1,
								'rocket_opt-header-spacing-desktop' => array(
									'padding-top'    => '40px',
									'padding-bottom' => '50px'
								),
								'rocket_opt-header-spacing-tablet' => array(
									'padding-top'    => '30px',
									'padding-bottom' => '40px'
								),
								'rocket__opt-breadcrumbs-type' => 2,
								'rocket__opt-page-title-overlay-on' => 0,
								'rocket__opt-page-title-position' => 1,
								'rocket__custom_breadcrumbs' => 0,
							)
						),
						'page_title_preset_4' => array(
							'alt' => esc_html__( 'Preset 4', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/page-heading-4.jpg',
							'presets' => array(
								'rocket__opt-header-separator' => 'none',
								'rocket__custom_page_title_font' => 1,
								'rocket__opt-typography-page-title' => array(
									'color'       => '#4d306e',
									'font-weight' => '700',
									'font-family' => 'Open Sans',
									'google'      => true,
									'font-size'   => '36px',
								),
								'rocket__opt-page-title-background-on' => 1,
								'rocket__opt-page-title-background' => array(
									'background-image'      => get_template_directory_uri() . '/images/page-heading-bg.jpg',
									'background-attachment' => 'inherit',
									'background-position'   => 'center center',
									'background-repeat'     => 'no-repeat',
									'background-size'       => 'cover',
									'background-color'      => '#e6e8ec',
								),
								'rocket__opt-page-title-breadcrumbs-dots' => 0,
								'rocket__opt-page-title-breadcrumbs-position' => 2,
								'rocket__opt-page-title-border-on' => 0,
								'rocket_opt-header-spacing' => 1,
								'rocket_opt-header-spacing-desktop' => array(
									'padding-top'    => '40px',
									'padding-bottom' => '50px'
								),
								'rocket_opt-header-spacing-tablet' => array(
									'padding-top'    => '30px',
									'padding-bottom' => '40px'
								),
								'rocket__opt-breadcrumbs-type' => 2,
								'rocket__opt-page-title-overlay-on' => 1,
								'rocket__opt-page-title-position' => 1,
								'rocket__custom_breadcrumbs' => 0,
							)
						),
						'page_title_preset_5' => array(
							'alt' => esc_html__( 'Preset 5', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/page-heading-5.jpg',
							'presets' => array(
								'rocket__opt-header-separator' => 'waves_svg_separator',
								'rocket__custom_page_title_font' => 1,
								'rocket__opt-typography-page-title' => array(
									'color'       => '#fff',
									'font-weight' => '700',
									'font-family' => 'Open Sans',
									'google'      => true,
									'font-size'   => '36px',
								),
								'rocket__opt-page-title-background-on' => 0,
								'rocket__opt-page-title-breadcrumbs-dots' => 0,
								'rocket__opt-page-title-breadcrumbs-position' => 2,
								'rocket__opt-page-title-border-on' => 1,
								'rocket__opt-page-title-border' => array(
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-style'  => 'dashed',
									'border-color'  => '#836b9f',
								),
								'rocket_opt-header-spacing' => 1,
								'rocket_opt-header-spacing-desktop' => array(
									'padding-top' => '40px',
									'padding-bottom' => '50px'
								),
								'rocket_opt-header-spacing-tablet' => array(
									'padding-top' => '30px',
									'padding-bottom' => '40px'
								),
								'rocket__opt-breadcrumbs-type' => 1,
								'rocket__opt-page-title-overlay-on' => 0,
								'rocket__opt-page-title-position' => 2,
								'rocket__custom_breadcrumbs' => 1,
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#fff',
									'hover'   => '#746981',
									'active'  => '#746981'
								),
								'rocket__opt-page-title-breadcrumbs-sep-color' => '#d5d6d9',
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#746981'
							)
						),
					),
					'default'   => 'page_title_preset_1'
				),
			)
		) );


		// Content Settings
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Content', 'rocket' ),
			'id'     => 'rocket__section-content',
			'icon'   => 'el el-align-justify',
			'fields' => array(
				array(
					'id'        => 'rocket_opt-content-spacing',
					'type'      => 'switch',
					'title'     => esc_html__('Adjust Content Paddings?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to customize Content padding.', 'rocket'),
					'default'   => 0,
					'on'        => esc_html__('Yes', 'rocket'),
					'off'       => esc_html__('No', 'rocket'),
				),
				array(
					'id'             => 'rocket_opt-content-spacing-desktop',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Content Paddings - Desktop', 'rocket'),
					'subtitle'       => esc_html__('Set Content Paddings for Desktop.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Content. Applied only for desktop monitors.', 'rocket'),
					'default'            => array(
						'padding-top'     => '100px',
						'padding-bottom'  => '100px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-content-spacing', '=', '1'),
				),
				array(
					'id'             => 'rocket_opt-content-spacing-tablet',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Content Paddings - Tablet', 'rocket'),
					'subtitle'       => esc_html__('Set Content Paddings for Tablets.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Content. Applied only for tablets.', 'rocket'),
					'default'            => array(
						'padding-top'     => '60px',
						'padding-bottom'  => '60px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-content-spacing', '=', '1'),
				),
				array(
					'id'             => 'rocket_opt-content-spacing-mobile',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array('px'),
					'units_extended' => 'false',
					'left'           => false,
					'right'          => false,
					'title'          => esc_html__('Content Paddings - Mobile', 'rocket'),
					'subtitle'       => esc_html__('Set Content Paddings for Mobile devices.', 'rocket'),
					'desc'           => esc_html__('You can set Top/Bottom Paddings for the Content. Applied only for mobile devices.', 'rocket'),
					'default'            => array(
						'padding-top'     => '30px',
						'padding-bottom'  => '30px',
						'units'           => 'px',
					),
					'required'  => array('rocket_opt-content-spacing', '=', '1'),
				),
			)
		) );


		// Footer Settings
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Footer', 'rocket' ),
			'id'     => 'rocket__section-footer',
			'icon'   => 'el el-arrow-down',
			'fields' => array(
				array(
					'id'          => 'rocket__custom-footer-colors',
					'type'        => 'switch',
					'title'       => esc_html__( 'Customize Footer Colors?', 'rocket' ),
					'subtitle'    => esc_html__( 'Turn on to change colors for text and links in the Footer.', 'rocket' ),
					'desc'        => esc_html__( 'Enables additional options for customization.', 'rocket' ),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-footer-text-color',
					'type'        => 'color',
					'output'      => array( '.footer-text' ),
					'title'       => esc_html__( 'Footer Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Pick a Footer Text color for the theme.', 'rocket' ),
					'default'     => '#fff',
					'transparent' => false,
					'required'    => array('rocket__custom-footer-colors', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-footer-link-color',
					'type'        => 'link_color',
					'title'       => esc_html__( 'Footer Links Color Option', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for links in Footer', 'rocket' ),
					'output'      => array( '.footer-text a' ),
					'default'     => array(
						'regular' => '#ff7149',
						'hover'   => '#fb3700',
						'active'  => '#fb3700',
					),
					'required'    => array('rocket__custom-footer-colors', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-social-in-footer',
					'type'      => 'switch',
					'title'     => esc_html__('Show Social Media Links?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the social links.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-footer-dots-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Copyright Dots Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Pick a Footer dots color for the theme.', 'rocket' ),
					'default'     => '#ff7149',
					'required'  => array(
						array('rocket__opt-copyright', '=', '1'),
						array('rocket__opt-footer-dots', '=', '1'),
						array('rocket__custom-footer-colors', '=', '1'),
					)
				),
				array(
					'id'        => 'rocket__opt-back-to-top',
					'type'      => 'switch',
					'title'     => esc_html__('Show Back To Top Button?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Back To Top button.', 'rocket'),
					'desc'      => esc_html__('Back To Top button appears at the bottom left corner when you scroll the page.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__custom_back-to-top',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Back to Top button?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to customize the Back to Top button.', 'rocket'),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
					'required'    => array('rocket__opt-back-to-top', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-back-to-top-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Back To Top Border', 'rocket' ),
					'subtitle' => esc_html__( 'Back To Top Border styling options.', 'rocket' ),
					'output'   => array( '#back-to-top-btn' ),
					'default'  => array(
						'border-color'  => '#e5e2e0',
						'border-style'  => 'solid',
						'border-width'   => '4px'
					),
					'required' => array('rocket__custom_back-to-top', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-back-to-top-bg-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Back To Top Background Color', 'rocket' ),
					'subtitle' => esc_html__( 'Background Colors for Back To Top button', 'rocket' ),
					'default'  => array(
						'regular' => 'transparent',
						'hover'   => '#ff7149',
						'active'  => '#ff7149',
					),
					'required' => array('rocket__custom_back-to-top', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-back-to-top-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Back To Top Icon Color', 'rocket' ),
					'subtitle' => esc_html__( 'Colors for Back To Top button', 'rocket' ),
					'output'   => array( '#back-to-top-btn' ),
					'default'  => array(
						'regular' => '#e5e2e0',
						'hover'   => '#fff',
						'active'  => '#fff',
					),
					'required' => array('rocket__custom_back-to-top', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-contact-btn',
					'type'      => 'switch',
					'title'     => esc_html__('Show Contact Button?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Contact Button.', 'rocket'),
					'desc'      => esc_html__('Contact Button appears at the bottom left corner when you scroll the page.', 'rocket'),
					'default'   => 2,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-contact-btn-all-pages',
					'type'      => 'switch',
					'title'     => esc_html__('Show Contact Button on all pages?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Contact Button.', 'rocket'),
					'desc'      => esc_html__('By default Contact Button appears only on selected pages.', 'rocket'),
					'default'   => 0,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'          => 'rocket__opt-contact-btn-pages',
					'type'        => 'select',
					'multi'       => true,
					'data'        => 'pages',
					'title'       => esc_html__('Pages where Contact Button displayed', 'rocket'),
					'subtitle'    => esc_html__('Choose pages with Contact Form.', 'rocket'),
					'desc'        => esc_html__('Select Pages on where do you want to show Contact Button. It\'s recommended to choose Home Page.', 'rocket'),
					'placeholder' => esc_html__('Select a page', 'rocket'),
					'width'       => '40%',
					'required'    => array(
						array( 'rocket__opt-contact-btn', '=', '1' ),
						array( 'rocket__opt-contact-btn-all-pages', '!=', '1' )
					),
				),
				array(
					'id'        => 'rocket__opt-contact-btn-link',
					'type'      => 'text',
					'title'     => esc_html__('Contact Button Link', 'rocket'),
					'subtitle'  => esc_html__('Enter section id of Contact Button or a link.', 'rocket'),
					'desc'      => wp_kses_post( __('To scroll to section with Contact Form enter your section ID, for example <em>#section-contacts</em>. Alternatively you can set up this button for sending email, in this case just enter <em>mailto:youremail@yourdomain.com</em>, where <em>youremail@yourdomain.com</em> is your email address.', 'rocket') ),
					'default'   => esc_html__('#section-contacts', 'rocket'),
					'required'  => array('rocket__opt-contact-btn', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-contact-btn-txt',
					'type'      => 'text',
					'title'     => esc_html__('Contact Button Tooltip Text', 'rocket'),
					'subtitle'  => esc_html__('Enter Text for Contact Button Tooltip.', 'rocket'),
					'desc'      => esc_html__('Tooltip appears when you hover over Contact Button.', 'rocket'),
					'default'   => esc_html__('Contact Us', 'rocket'),
					'required'  => array('rocket__opt-contact-btn', '=', '1'),
				),
				array(
					'id'          => 'rocket__custom_contact-btn',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Contact button?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to customize the Contact button.', 'rocket'),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
					'required'    => array('rocket__opt-contact-btn', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-contact-btn-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Contact Button Border', 'rocket' ),
					'subtitle' => esc_html__( 'Contact Button Border styling options.', 'rocket' ),
					'output'   => array( '#email-contact-btn' ),
					'default'  => array(
						'border-color'  => '#e5e2e0',
						'border-style'  => 'solid',
						'border-width'   => '4px'
					),
					'required' => array('rocket__custom_contact-btn', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-contact-btn-bg-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Contact Button Background Color', 'rocket' ),
					'subtitle' => esc_html__( 'Background Colors for Contact button', 'rocket' ),
					'default'  => array(
						'regular' => 'transparent',
						'hover'   => '#ff7149',
						'active'  => '#ff7149',
					),
					'required' => array('rocket__custom_contact-btn', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-contact-btn-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Contact Button Icon Color', 'rocket' ),
					'subtitle' => esc_html__( 'Colors for Contact button', 'rocket' ),
					'output'   => array( '#email-contact-btn' ),
					'default'  => array(
						'regular' => '#e5e2e0',
						'hover'   => '#fff',
						'active'  => '#fff',
					),
					'required' => array('rocket__custom_contact-btn', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-contact-btn-tooltip-color',
					'type'        => 'color',
					'mode'        => 'background-color',
					'title'       => esc_html__( 'Contact Button Tooltip Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Pick a color for Contact Button Tooltip.', 'rocket' ),
					'default'     => '#ff7149',
					'output'      => array( '.back-top .tooltip-inner' ),
					'required'    => array('rocket__custom_contact-btn', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-contact-btn-tooltip-txt-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Contact Button Tooltip Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Pick a color for Contact Button Tooltip Text.', 'rocket' ),
					'default'     => '#fff',
					'output'      => array( '.back-top .tooltip-inner' ),
					'required'    => array('rocket__custom_contact-btn', '=', '1'),
				),
			)
		) );

		// Footer Logo
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Footer Logo', 'rocket' ),
			'id'     => 'rocket__subsection-footer-logo',
			'subsection' => true,
			'fields' => array(
					array(
						'id'        => 'rocket__opt-footer-logo',
						'type'      => 'switch',
						'title'     => esc_html__('Show Footer Logo?', 'rocket'),
						'subtitle'  => esc_html__('Turn on to show the Footer Logo.', 'rocket'),
						'default'   => 2,
						'on'        => esc_html__( 'Yes', 'rocket' ),
						'off'       => esc_html__( 'No', 'rocket' ),
					),
					array(
						'id'        => 'rocket__opt-footer-logo-img',
						'type'      => 'media',
						'url'       => true,
						'title'     => esc_html__('Footer Logo Image', 'rocket'),
						'compiler'  => 'true',
						'desc'      => esc_html__('Upload your Footer Logo image or remove image if you want to use text-based logo.', 'rocket'),
						'default'   => array(
							'url'     => get_template_directory_uri() . '/images/logo.png'),
						'required'    => array('rocket__opt-footer-logo', '=', '1'),
					),
			)
		) );

		// Footer Widgets
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Footer Widgets', 'rocket' ),
			'id'     => 'rocket__subsection-footer-widgets',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket__opt-footer-widgets',
					'type'      => 'switch',
					'title'     => esc_html__('Footer Widgets', 'rocket'),
					'subtitle'  => esc_html__('Footer Widgets are displayed by default.', 'rocket'),
					'default'   => 2,
					'on'        => 'Enable',
					'off'       => 'Disable',
				),
				array(
					'id'        => 'rocket__opt-footer-widgets-layout',
					'type'      => 'image_select',
					'compiler'  => true,
					'title'     => esc_html__('Footer Widgets Layout', 'rocket'),
					'subtitle'  => esc_html__('Select footer widgets layout (not equal or equal).', 'rocket'),
					'options'   => array(
						'1' => array(
							'alt' => esc_html__( '4 Columns (equal)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols2.png'),
						'2' => array(
							'alt' => esc_html__('4 Columns', 'rocket'),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols1.png'),
						'3' => array(
							'alt' => esc_html__( '3 Columns (left wider)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols3.png'),
						'4' => array(
							'alt' => esc_html__( '3 Columns (right wider)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols4.png'),
						'5' => array(
							'alt' => esc_html__( '3 Columns (equal)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols5.png'),
						'6' => array(
							'alt' => esc_html__( '2 Columns (right wider)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols6.png'),
						'7' => array(
							'alt' => esc_html__( '2 Columns (left wider)', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/footer-cols7.png'),
					),
					'default'   => '1',
					'required'  => array('rocket__opt-footer-widgets', '=', '1'),
				),
			)
		) );

		// Footer Copyright
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Copyright', 'rocket' ),
			'id'     => 'rocket__subsection-footer-copyright',
			'subsection' => true,
			'fields' => array(
					array(
						'id'        => 'rocket__opt-copyright',
						'type'      => 'switch',
						'title'     => esc_html__('Show Footer Copyright?', 'rocket'),
						'subtitle'  => esc_html__('Turn on to show Footer Text Area(s)', 'rocket'),
						'default'   => 1,
						'on'        => esc_html__( 'Yes', 'rocket' ),
						'off'       => esc_html__( 'No', 'rocket' ),
					),
					array(
						'id'        => 'rocket__opt-copyright-area-col',
						'type'      => 'select',
						'title'     => esc_html__('Copyright columns number', 'rocket'),
						'subtitle'  => esc_html__('Select the Copyright number of columns.', 'rocket'),
						'required'  => array('rocket__opt-copyright', '=', '1'),
						'options'   => array(
							'1'  => esc_html__( '1 column', 'rocket' ),
							'2'  => esc_html__( '2 columns', 'rocket' ),
							'3'  => esc_html__( '3 columns', 'rocket' ),
						),
						'default'   => '3'
					),
					array(
						'id'      => 'rocket__opt-copyright-1',
						'type'    => 'textarea',
						'title'   => esc_html__( 'Copyright column 1', 'rocket' ),
						'default' => '&copy; All Right Reserved',
						'required'  => array('rocket__opt-copyright', '=', '1'),
					),
					array(
						'id'      => 'rocket__opt-copyright-2',
						'type'    => 'textarea',
						'title'   => esc_html__( 'Copyright column 2', 'rocket' ),
						'default' => 'Developed by <a href="http://themeforest.net/user/dan_fisher?ref=dan_fisher">Dan Fisher</a> <i class="fa fa-code"></i>',
						'required'  => array(
							array('rocket__opt-copyright', '=', '1'),
							array('rocket__opt-copyright-area-col', '>=', '2'),
						),
					),
					array(
						'id'      => 'rocket__opt-copyright-3',
						'type'    => 'textarea',
						'title'   => esc_html__( 'Copyright column 3', 'rocket' ),
						'default' => 'Designed by <a href="http://themeforest.net/user/wwwebinvader?ref=dan_fisher">wwwebinvader</a> <i class="fa fa-paint-brush"></i>',
						'required'  => array(
							array('rocket__opt-copyright', '=', '1'),
							array('rocket__opt-copyright-area-col', '=', '3'),
						),
					),

					array(
						'id'       => 'rocket__opt-footer-border',
						'type'     => 'border',
						'title'    => esc_html__( 'Copyright Border', 'rocket' ),
						'subtitle' => esc_html__( 'Footer Copyright border options.', 'rocket' ),
						'desc'     => esc_html__( 'Top Border is set by default (1px). ', 'rocket' ),
						'all'      => false,
						'output'   => array( '.footer-text' ),
						'default'  => array(
							'border-color'  => '#786e87',
							'border-style'  => 'dashed',
							'border-top'    => '1px',
							'border-right'  => '0px',
							'border-bottom' => '0px',
							'border-left'   => '0px'
						),
						'required'  => array(
							array('rocket__opt-copyright', '=', '1'),
							array('rocket__custom-footer-colors', '=', '1'),
						),
					),
					array(
						'id'        => 'rocket__opt-footer-dots',
						'type'      => 'switch',
						'title'     => esc_html__('Show Copyright Dots?', 'rocket'),
						'subtitle'  => esc_html__('Turn on to show three dots.', 'rocket'),
						'desc'      => esc_html__('Each dot appears at the top of the Footer column.', 'rocket'),
						'default'   => 1,
						'on'        => esc_html__( 'Yes', 'rocket' ),
						'off'       => esc_html__( 'No', 'rocket' ),
						'required'  => array('rocket__opt-copyright', '=', '1'),
					),
			)
		) );


		// Footer Separator
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Background & Separator', 'rocket' ),
			'id'     => 'rocket__subsection-footer-separator',
			'subsection' => true,
			'fields' => array(
				array(
					'id'       => 'rocket__opt-footer-bg',
					'type'     => 'background',
					'output'   => array( '.footer' ),
					'title'    => esc_html__( 'Footer Background', 'rocket' ),
					'subtitle' => esc_html__( 'Footer background options.', 'rocket' ),
					'default'     => array(
						'background-color'      => '#36274c',
						'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center top',
						'background-attachment' => 'inherit',
						'background-size'       => 'inherit',
					),
				),
				array(
					'id'        => 'rocket__opt-footer-separator',
					'type'      => 'image_select',
					'compiler'  => true,
					'title'     => esc_html__('Footer Separator Type', 'rocket'),
					'subtitle'  => esc_html__('Select the Footer separator type.', 'rocket'),
					'desc'      => esc_html__('Select one of the predefined separators type for the Footer.', 'rocket'),
					'options'   => array(
						'none' => array(
								'alt' => esc_html__( 'None', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-none.jpg'),
						'waves_svg_separator' => array(
								'alt' => esc_html__( 'Wave', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-wave.jpg'),
						'tilt_left_svg_separator' => array(
								'alt' => esc_html__( 'Tilt Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-tilt-left.jpg'),
						'tilt_right_svg_separator' => array(
								'alt' => esc_html__( 'Tilt Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-tilt-right.jpg'),
						'curve_left_svg_separator' => array(
								'alt' => esc_html__( 'Curve Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-curve-left.jpg'),
						'curve_right_svg_separator' => array(
								'alt' => esc_html__( 'Curve Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-curve-right.jpg'),
						'big_triangle_center_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-big-triangle-center.jpg'),
						'big_triangle_left_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Left', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-big-triangle-left.jpg'),
						'big_triangle_right_svg_separator' => array(
								'alt' => esc_html__( 'Big Triangle Right', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-big-triangle-right.jpg'),
						'triangle_center_svg_separator' => array(
								'alt' => esc_html__( 'Triangle Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-triangle-center.jpg'),
						'debris_svg_separator' => array(
								'alt' => esc_html__( 'Debris', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-debris.jpg'),
						'hills_svg_separator' => array(
								'alt' => esc_html__( 'Hills', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-hills.jpg'),
						'drops_svg_separator' => array(
								'alt' => esc_html__( 'Drops', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-drops.jpg'),
						'curve_inside_center_svg_separator' => array(
								'alt' => esc_html__( 'Curve Inside Center', 'rocket' ),
								'img' => get_template_directory_uri() . '/admin/images/footer-separator-curve-inside-center.jpg'),
					),
					'default'   => 'waves_svg_separator'
				),
			)
		) );


		// Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Typography', 'rocket' ),
			'id'     => 'rocket__section-typography',
			'icon'   => 'el el-font'
		) );

		// General Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'General', 'rocket' ),
			'id'     => 'rocket__subsection-typography-general',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_body_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Body font?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom fonts for the theme main text.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__body-font',
					'type'        => 'typography',
					'title'       => esc_html__('Body font', 'rocket'),
					'subtitle'    => esc_html__('Specify the Body font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('body'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_body_font', '=', '1'),
					'default'     => array(
						'color'         => '#656269',
						'font-size'     => '15px',
						'font-family'   => 'Open Sans',
						'google'        => true,
						'font-weight'   => '400',
					),
				),
				array(
					'id'          => 'rocket__custom_heading_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Headings?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom fonts, change color, line-height etc. for the theme Headings.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'typography-h1',
					'type'        => 'typography',
					'title'       => esc_html__('H1 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H1 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h1'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '46px',
						'font-family'   => 'Exo 2',
						'google'        => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'typography-h2',
					'type'        => 'typography',
					'title'       => esc_html__('H2 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H2 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h2'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '36px',
						'font-family'   => 'Exo 2',
						'google'        => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'typography-h3',
					'type'        => 'typography',
					'title'       => esc_html__('H3 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H3 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h3'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '28px',
						'font-family'   => 'Exo 2',
						'google'        => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'typography-h4',
					'type'        => 'typography',
					'title'       => esc_html__('H4 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H4 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h4'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '21px',
						'font-family'   => 'Exo 2',
						'google'        => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'typography-h5',
					'type'        => 'typography',
					'title'       => esc_html__('H5 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H5 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h5'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '18px',
						'font-family'   => 'Exo 2',
						'google' => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'typography-h6',
					'type'        => 'typography',
					'title'       => esc_html__('H6 Heading', 'rocket'),
					'subtitle'    => esc_html__('Specify the H6 heading font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('h6'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'required'    => array('rocket__custom_heading_font', '=', '1'),
					'default'     => array(
						'color'         => '#746981',
						'font-size'     => '15px',
						'font-family'   => 'Exo 2',
						'google'        => true,
						'font-weight'   => '600',
					),
				),
				array(
					'id'          => 'rocket__custom_buttons_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Buttons font?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font options for Buttons.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-custom_buttons_font',
					'type'        => 'typography',
					'title'       => esc_html__('Buttons', 'rocket'),
					'subtitle'    => esc_html__('Specify buttons font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('.btn, .tagcloud > a, #respond input#submit, .woocommerce-pagination > ul > li > .page-numbers, .add_to_cart_button, .added_to_cart, a.button, button.button, input.button'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'color'       => false,
					'font-size'   => false,
					'font-weight' => false,
					'text-transform' => true,
					'required'    => array('rocket__custom_buttons_font', '=', '1'),
					'default'     => array(
						'font-family'   => 'Exo 2',
						'google'        => true,
						'text-transform' => 'uppercase'
					),
				),
				array(
					'id'          => 'rocket__custom_form_control_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Form Elements font?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font options for inputs, textarea etc.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-custom_form_control_font',
					'type'        => 'typography',
					'title'       => esc_html__('Form Control', 'rocket'),
					'subtitle'    => esc_html__('Specify form elements font properties.', 'rocket'),
					'google'      => true,
					'output'      => array('.form-control, .input-text, .select-style'),
					'units'       => 'px',
					'line-height' => false,
					'text-align'  => false,
					'color'       => false,
					'font-size'   => false,
					'font-weight' => false,
					'text-transform' => true,
					'required'    => array('rocket__custom_form_control_font', '=', '1'),
					'default'     => array(
						'font-family'   => 'Exo 2',
						'google'        => true,
						'text-transform' => 'uppercase'
					),
				),
			)
		) );

		// Logo Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Logo', 'rocket' ),
			'id'     => 'rocket__subsection-typography-logo',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_logo_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font for Logo?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the theme Logo.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-logo-typography',
					'type'        => 'typography',
					'title'       => esc_html__( 'Logo Text Typography', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.header .logo h1 > a, .header .logo h2 > a' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Text based Logo.', 'rocket' ),
					'desc'        => __( 'This settings applied only if your Logo is Text Based. By default it\'s Image Based. To make it Text based go to <em>General Settings > Logo Image</em> and remove image.', 'rocket' ),
					'required'    => array('rocket__custom_logo_font', '=', '1'),
					'default'     => array(
						'color'       => '#fff',
						'font-weight' => '700',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '34px'
					),
					'hint'        => array(
						'content'   => esc_html__( 'For Text Based Logo', 'rocket' ),
					)
				),
			)
		) );

		// Page Header Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Page Heading', 'rocket' ),
			'id'     => 'rocket__subsection-typography-page-title',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_page_title_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font in the Page Heading?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the Page Title and Breadcrumbs.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-typography-page-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page Title font', 'rocket' ),
					'subtitle'    => esc_html__( 'Specify the Page Title font.', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-title .section-title.section-title__lg' ),
					'units'       => 'px',
					'required'    => array('rocket__custom_page_title_font', '=', '1'),
					'default'     => array(
						'color'       => '#4d306e',
						'font-weight' => '700',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '56px',
					)
				),
				array(
					'id'          => 'rocket__opt-typography-breadcrumbs',
					'type'        => 'typography',
					'title'       => esc_html__( 'Breadcrumbs font', 'rocket' ),
					'subtitle'    => esc_html__( 'Specify the Breadcrumbs font.', 'rocket' ),
					'color'       => false,
					'text-align'  => false,
					'output'      => array( '.breadcrumb > li' ),
					'units'       => 'px',
					'required'    => array('rocket__custom_page_title_font', '=', '1'),
					'default'     => array(
						'font-weight' => '600',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '15px',
						'line-height' => '18px'
					)
				),
			)
		) );


		// Page 404 Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( '404 Page', 'rocket' ),
			'id'     => 'rocket__subsection-typography-404',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_404_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font on 404 page?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the 404 page titles.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-404-typography-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page 404 Title', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'text-transform' => true,
					'output'      => array( '.page-404-main .page-404-notice' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Page 404 Title.', 'rocket' ),
					'required'    => array('rocket__custom_404_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '300',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '36px',
						'text-transform' => 'uppercase'
					)
				),
				array(
					'id'          => 'rocket__opt-404-typography-desc',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page 404 Description', 'rocket' ),
					'text-align'  => false,
					'output'      => array( '.page-404-desc' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Page 404 Description.', 'rocket' ),
					'required'    => array('rocket__custom_404_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '400',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '15px',
						'line-height' => '24px',
					)
				),
				array(
					'id'          => 'rocket__opt-404-typography-social-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page 404 Social Title', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'text-transform' => true,
					'output'      => array( '.page-404-footer-label' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Page 404 Social Title.', 'rocket' ),
					'required'    => array('rocket__custom_404_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '700',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '34px',
						'text-transform' => 'uppercase'
					)
				),
			)
		) );

		// Footer Widgets
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Footer Widget Headings', 'rocket' ),
			'id'     => 'rocket__subsection-footer-widgets-headings',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__opt-typography-footer-widget-heading',
					'type'        => 'switch',
					'title'       => esc_html__('Customize Footer Widgets Headings?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use customize font properties for Footer Widgets Headings.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-typography-footer-widget-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Footer Widgets Titles', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'text-transform' => true,
					'output'      => array( '.widget__footer .title-bordered h4' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Footer Widgets Titles.', 'rocket' ),
					'required'    => array('rocket__opt-typography-footer-widget-heading', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '600',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '24px',
						'text-transform' => 'none'
					)
				),
				array(
					'id'       => 'rocket__opt-typography-footer-widget-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Footer Widgets Titles Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for Footer Widgets titles.', 'rocket' ),
					'desc'     => esc_html__( 'Option for Footer Widgets Title. Bottom border is set by default (1px). ', 'rocket' ),
					'all'      => false,
					'top'      => false,
					'left'     => false,
					'right'    => false,
					'output'   => array( '.widget__footer .title-bordered' ),
					'default'  => array(
						'border-color'  => '#584c69',
						'border-style'  => 'solid',
						'border-bottom' => '1px',
					),
					'required' => array('rocket__opt-typography-footer-widget-heading', '=', '1'),
				),
			)
		) );

		// Footer Logo
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Footer Logo', 'rocket' ),
			'id'     => 'rocket__subsection-typography-logo-footer',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_logo_font-footer',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font for Logo?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the theme Logo.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-logo-typography-footer',
					'type'        => 'typography',
					'title'       => esc_html__( 'Footer Logo Text Typography', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'text-transform' => true,
					'output'      => array( '.logo-footer-text > a' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Footer Logo Text.', 'rocket' ),
					'desc'        => __( 'This settings applied only if your Footer Logo is Text Based. By default it\'s Image Based. To make it Text based go to <em>Footer > Footer Logo</em> and remove image.', 'rocket' ),
					'required'    => array('rocket__custom_logo_font-footer', '=', '1'),
					'default'     => array(
						'color'       => '#fff',
						'font-weight' => '700',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '34px',
						'text-transform' => 'uppercase',
					),
					'hint'        => array(
						'content'   => esc_html__( 'For Text Based Footer Logo', 'rocket' ),
					)
				),
			)
		) );


		// Coming Soon Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Coming Soon Page', 'rocket' ),
			'id'     => 'rocket__subsection-typography-coming',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_coming_soon_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font on Coming Soon page?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the Coming Soon page headings.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-coming-typography-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page Title', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-coming-soon-header h1' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Coming Soon Page Title.', 'rocket' ),
					'required'    => array('rocket__custom_coming_soon_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '700',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '64px',
					)
				),
				array(
					'id'          => 'rocket__opt-coming-typography-desc',
					'type'        => 'typography',
					'title'       => esc_html__( 'Description', 'rocket' ),
					'text-align'  => false,
					'output'      => array( '.page-coming-soon-desc' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Coming Soon Page Description.', 'rocket' ),
					'required'    => array('rocket__custom_coming_soon_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '400',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '15px',
						'line-height' => '24px',
					)
				),
				array(
					'id'          => 'rocket__opt-coming-typography-num',
					'type'        => 'typography',
					'title'       => esc_html__( 'Counter', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-template-template-coming-soon .countdown.countdown__color-circles .number' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Coming Soon Page Counter.', 'rocket' ),
					'required'    => array('rocket__custom_coming_soon_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '700',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '64px',
					)
				),
				array(
					'id'          => 'rocket__opt-coming-typography-num-label',
					'type'        => 'typography',
					'title'       => esc_html__( 'Counter Label', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-template-template-coming-soon .countdown.countdown__color-circles .desc' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Coming Soon Page Counter Label.', 'rocket' ),
					'required'    => array('rocket__custom_coming_soon_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '400',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '18px',
					)
				),
			)
		) );


		// Under Construction Typography
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Under Construction', 'rocket' ),
			'id'     => 'rocket__subsection-typography-under-construction',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_under_construction_font',
					'type'        => 'switch',
					'title'       => esc_html__('Customize font on the Under Construction page?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to use custom font for the Under Construction page headings.', 'rocket'),
					'default'     => false,
				),
				array(
					'id'          => 'rocket__opt-under-construction-typography-title',
					'type'        => 'typography',
					'title'       => esc_html__( 'Page Title', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-under-construction-header h1' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Under Constrsution Page Title.', 'rocket' ),
					'required'    => array('rocket__custom_under_construction_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '700',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '64px',
					)
				),
				array(
					'id'          => 'rocket__opt-under-construction-typography-desc',
					'type'        => 'typography',
					'title'       => esc_html__( 'Description', 'rocket' ),
					'text-align'  => false,
					'output'      => array( '.page-under-construction-desc' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Under Constrsution Page Description.', 'rocket' ),
					'required'    => array('rocket__custom_under_construction_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '400',
						'font-family' => 'Open Sans',
						'google'      => true,
						'font-size'   => '15px',
						'line-height' => '24px',
					)
				),
				array(
					'id'          => 'rocket__opt-under-construction-typography-num',
					'type'        => 'typography',
					'title'       => esc_html__( 'Counter', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-template-template-under-construction .countdown .number' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Under Constrsution Page Counter.', 'rocket' ),
					'required'    => array('rocket__custom_under_construction_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '700',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '64px',
					)
				),
				array(
					'id'          => 'rocket__opt-under-construction-typography-num-label',
					'type'        => 'typography',
					'title'       => esc_html__( 'Counter Label', 'rocket' ),
					'line-height' => false,
					'text-align'  => false,
					'output'      => array( '.page-template-template-under-construction .countdown .desc' ),
					'units'       => 'px',
					'subtitle'    => esc_html__( 'Typography option for Under Constrsution Page Counter Label.', 'rocket' ),
					'required'    => array('rocket__custom_under_construction_font', '=', '1'),
					'default'     => array(
						'color'       => '#ffffff',
						'font-weight' => '400',
						'font-family' => 'Exo 2',
						'google'      => true,
						'font-size'   => '18px',
					)
				),
			)
		) );


		// Styling
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Styling', 'rocket' ),
			'id'     => 'rocket__section-styling',
			'icon'   => 'el el-icon-brush',
			'fields' => array(
				array(
					'id'        => 'rocket__preset-colors',
					'type'      => 'image_select',
					'compiler'  => false,
					'presets'   => true,
					'title'     => esc_html__('Color Presets', 'rocket'),
					'desc'      => esc_html__('Choose color preset you want to use.', 'rocket'),
					'default'   => '1',
					'options'   => array(

						// Color Scheme: Default
						'1' => array(
							'alt' => esc_html__( 'Default', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-default.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f1f2f4',
								'rocket__opt_primary_color'    => '#ff7149',
								'rocket__opt_secondary_color'  => '#4d306e',
								'rocket__opt_tertiary_color'   => '#d44546',
								'rocket__opt_quaternary_color' => '#ffa76c',
								'rocket__opt_quinary_color'    => '#ea582f',
								'rocket__opt_senary_color'     => '#746981',
								'rocket__opt_septenary_color'  => '#f1f2f4',
								'rocket__opt_octonary_color'   => '#b59ecf',
								'rocket__opt_nonary_color'     => '#836aa0',
								'rocket__opt-content-section-bg1' => '#e3e3e8',
								'rocket__opt-content-section-bg2' => '#36274c',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#36274c',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#36274c',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#36274c'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#4a3d60',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#746981',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#ff7149',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#836aa0',
									'hover'   => '#ff7149',
									'active'  => '#ff7149',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#746981',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#746981',
									'hover'   => '#ff7149',
									'active'  => '#ff7149',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#ff7149',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#ff7149',
								),
								'rocket__opt-header-top-bar-icon-color' => '#ff7149',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#836aa0',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#836aa0',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#ff7149',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#746981',
									'hover'   => '#ff7149',
									'active'  => '#fb3700',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#36274c',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#ff7149',
									'hover'   => '#fb3700',
									'active'  => '#fb3700',
								),
								'rocket__opt-footer-dots-color' => '#ff7149',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#ff7149',
									'active'  => '#ff7149',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#ff7149',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#b59ecf',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#ff7149',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#746981',
									'hover'   => '#ff7149',
									'active'  => '#ff7149',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#ff7149',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#656269',
									'hover'   => '#ff7149',
									'active'  => '#fb3700',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#ffa76c',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#ff7149',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#ff5d2f',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#d44546',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#ffa76c',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#ff7149',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#36274c',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#ff7149',
								'rocket__opt-under-construction-days-border-color'   => '#836aa0',
								'rocket__opt-under-construction-hours-border-color'  => '#836aa0',
								'rocket__opt-under-construction-mins-border-color'   => '#836aa0',
								'rocket__opt-under-construction-secs-border-color'   => '#836aa0',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#786e87',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#36274c',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#ff7149',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#ffa76c',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#ff7149',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#ea582f',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#d44546',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#786e87',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#36274c',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),

						// Color Scheme: Blue
						'2' => array(
							'alt' => esc_html__( 'Blue', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-blue.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f7f7f7',
								'rocket__opt_primary_color'    => '#5ab6f7',
								'rocket__opt_secondary_color'  => '#1a2758',
								'rocket__opt_tertiary_color'   => '#2e3f82',
								'rocket__opt_quaternary_color' => '#74ddff',
								'rocket__opt_quinary_color'    => '#3c71f9',
								'rocket__opt_senary_color'     => '#6a6b80',
								'rocket__opt_septenary_color'  => '#d5d6d9',
								'rocket__opt_octonary_color'   => '#6a6b80',
								'rocket__opt_nonary_color'     => '#6a6b80',
								'rocket__opt-content-section-bg1' => '#e2e5eb',
								'rocket__opt-content-section-bg2' => '#1a2758',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#1a2758',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#1a2758',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#1a2758'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#2c3865',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#6a6b80',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#5ab6f7',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#6a6b80',
									'hover'   => '#5ab6f7',
									'active'  => '#5ab6f7',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#6a6b80',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#6a6b80',
									'hover'   => '#5ab6f7',
									'active'  => '#5ab6f7',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#5ab6f7',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#5ab6f7',
								),
								'rocket__opt-header-top-bar-icon-color' => '#5ab6f7',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#6a6b80',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#6a6b80',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#5ab6f7',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#6a6b80',
									'hover'   => '#5ab6f7',
									'active'  => '#3c71f9',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#1a2758',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#5ab6f7',
									'hover'   => '#2e3f82',
									'active'  => '#2e3f82',
								),
								'rocket__opt-footer-dots-color' => '#5ab6f7',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#5ab6f7',
									'active'  => '#5ab6f7',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#5ab6f7',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#6a6b80',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#5ab6f7',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#6a6b80',
									'hover'   => '#5ab6f7',
									'active'  => '#5ab6f7',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#5ab6f7',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#6a6b80',
									'hover'   => '#5ab6f7',
									'active'  => '#2e3f82',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#74ddff',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#5ab6f7',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#1a2758',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#2e3f82',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#74ddff',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#5ab6f7',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#1a2758',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#5ab6f7',
								'rocket__opt-under-construction-days-border-color'   => '#6a6b80',
								'rocket__opt-under-construction-days-border-color'   => '#6a6b80',
								'rocket__opt-under-construction-hours-border-color'  => '#6a6b80',
								'rocket__opt-under-construction-mins-border-color'   => '#6a6b80',
								'rocket__opt-under-construction-secs-border-color'   => '#6a6b80',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#d5d6d9',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#1a2758',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#5ab6f7',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#74ddff',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#5ab6f7',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#3c71f9',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#2e3f82',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#6a6b80',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#1a2758',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),

						// Color Scheme: Pink
						'3' => array(
							'alt' => esc_html__( 'Pink', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-pink.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f7f7f7',
								'rocket__opt_primary_color'    => '#c7166f',
								'rocket__opt_secondary_color'  => '#870044',
								'rocket__opt_tertiary_color'   => '#d24698',
								'rocket__opt_quaternary_color' => '#ff0080',
								'rocket__opt_quinary_color'    => '#aa0056',
								'rocket__opt_senary_color'     => '#aa0056',
								'rocket__opt_septenary_color'  => '#d5d5d5',
								'rocket__opt_octonary_color'   => '#806a76',
								'rocket__opt_nonary_color'     => '#aa0056',
								'rocket__opt-content-section-bg1' => '#f1e6eb',
								'rocket__opt-content-section-bg2' => '#870044',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#870044',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#870044',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#870044'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#870044',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#806a76',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#c7166f',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#806a76',
									'hover'   => '#c7166f',
									'active'  => '#c7166f',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#806a76',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#806a76',
									'hover'   => '#c7166f',
									'active'  => '#c7166f',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#c7166f',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#c7166f',
								),
								'rocket__opt-header-top-bar-icon-color' => '#c7166f',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#806a76',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#806a76',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#c7166f',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#806a76',
									'hover'   => '#c7166f',
									'active'  => '#aa0056',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#870044',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#c7166f',
									'hover'   => '#d24698',
									'active'  => '#d24698',
								),
								'rocket__opt-footer-dots-color' => '#c7166f',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#c7166f',
									'active'  => '#c7166f',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#c7166f',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#806a76',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#c7166f',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#806a76',
									'hover'   => '#c7166f',
									'active'  => '#c7166f',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#c7166f',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#806a76',
									'hover'   => '#c7166f',
									'active'  => '#d24698',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#ff0080',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#c7166f',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#870044',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#d24698',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#ff0080',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#c7166f',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#870044',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#c7166f',
								'rocket__opt-under-construction-days-border-color'   => '#806a76',
								'rocket__opt-under-construction-days-border-color'   => '#806a76',
								'rocket__opt-under-construction-hours-border-color'  => '#806a76',
								'rocket__opt-under-construction-mins-border-color'   => '#806a76',
								'rocket__opt-under-construction-secs-border-color'   => '#806a76',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#d5d5d5',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#870044',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#c7166f',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#ff0080',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#c7166f',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#aa0056',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#d24698',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#806a76',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#870044',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),


						// Color Scheme: Dark
						'4' => array(
							'alt' => esc_html__( 'Dark', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-dark.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f7f7f7',
								'rocket__opt_primary_color'    => '#bababa',
								'rocket__opt_secondary_color'  => '#333333',
								'rocket__opt_tertiary_color'   => '#898989',
								'rocket__opt_quaternary_color' => '#e1e1e1',
								'rocket__opt_quinary_color'    => '#717171',
								'rocket__opt_senary_color'     => '#838383',
								'rocket__opt_septenary_color'  => '#d5d5d5',
								'rocket__opt_octonary_color'   => '#d5d5d5',
								'rocket__opt_nonary_color'     => '#d5d5d5',
								'rocket__opt-content-section-bg1' => '#e1e1e1',
								'rocket__opt-content-section-bg2' => '#333333',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#333333',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#666',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#333333'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#444',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#838383',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#bababa',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#d5d5d5',
									'hover'   => '#bababa',
									'active'  => '#bababa',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#838383',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#838383',
									'hover'   => '#bababa',
									'active'  => '#bababa',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#bababa',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#bababa',
								),
								'rocket__opt-header-top-bar-icon-color' => '#bababa',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#d5d5d5',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#d5d5d5',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#bababa',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#838383',
									'hover'   => '#bababa',
									'active'  => '#717171',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#333333',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#bababa',
									'hover'   => '#717171',
									'active'  => '#717171',
								),
								'rocket__opt-footer-dots-color' => '#bababa',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#bababa',
									'active'  => '#bababa',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#bababa',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#d5d5d5',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#bababa',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#838383',
									'hover'   => '#bababa',
									'active'  => '#bababa',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#bababa',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#656269',
									'hover'   => '#bababa',
									'active'  => '#717171',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#e1e1e1',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#bababa',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#717171',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#898989',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#e1e1e1',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#bababa',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#666',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#bababa',
								'rocket__opt-under-construction-days-border-color'   => '#d5d5d5',
								'rocket__opt-under-construction-hours-border-color'  => '#d5d5d5',
								'rocket__opt-under-construction-mins-border-color'   => '#d5d5d5',
								'rocket__opt-under-construction-secs-border-color'   => '#d5d5d5',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#717171',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#333333',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#bababa',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#e1e1e1',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#bababa',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#717171',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#898989',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#717171',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#333333',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),



						// Color Scheme: Red
						'5' => array(
							'alt' => esc_html__( 'Red', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-red.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f1f2f4',
								'rocket__opt_primary_color'    => '#e22424',
								'rocket__opt_secondary_color'  => '#383838',
								'rocket__opt_tertiary_color'   => '#d2464a',
								'rocket__opt_quaternary_color' => '#ff4040',
								'rocket__opt_quinary_color'    => '#c11c1c',
								'rocket__opt_senary_color'     => '#984747',
								'rocket__opt_septenary_color'  => '#d5d5d5',
								'rocket__opt_octonary_color'   => '#984747',
								'rocket__opt_nonary_color'     => '#984747',
								'rocket__opt-content-section-bg1' => '#f1e6eb',
								'rocket__opt-content-section-bg2' => '#750000',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#750000',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#750000',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#750000'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#750000',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#984747',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#e22424',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#984747',
									'hover'   => '#e22424',
									'active'  => '#e22424',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#984747',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#984747',
									'hover'   => '#e22424',
									'active'  => '#e22424',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#e22424',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#e22424',
								),
								'rocket__opt-header-top-bar-icon-color' => '#e22424',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#984747',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#984747',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#e22424',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#984747',
									'hover'   => '#e22424',
									'active'  => '#c11c1c',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#750000',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#e22424',
									'hover'   => '#c11c1c',
									'active'  => '#c11c1c',
								),
								'rocket__opt-footer-dots-color' => '#e22424',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#e22424',
									'active'  => '#e22424',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#e22424',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#984747',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#e22424',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#984747',
									'hover'   => '#e22424',
									'active'  => '#e22424',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#e22424',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#656269',
									'hover'   => '#e22424',
									'active'  => '#c11c1c',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#ff4040',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#e22424',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#ff5d2f',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#d2464a',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#ff4040',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#e22424',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#750000',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#e22424',
								'rocket__opt-under-construction-days-border-color'   => '#984747',
								'rocket__opt-under-construction-hours-border-color'  => '#984747',
								'rocket__opt-under-construction-mins-border-color'   => '#984747',
								'rocket__opt-under-construction-secs-border-color'   => '#984747',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#984747',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#750000',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#e22424',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#ff4040',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#e22424',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#c11c1c',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#d2464a',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#984747',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#750000',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),



						// Color Scheme: Green
						'6' => array(
							'alt' => esc_html__( 'Green', 'rocket' ),
							'img' => get_template_directory_uri() . '/admin/images/pallete-green.png',
							'presets' => array(
								'rocket__opt_content_bg_color' => '#f7f7f7',
								'rocket__opt_primary_color'    => '#ffbe0f',
								'rocket__opt_secondary_color'  => '#007225',
								'rocket__opt_tertiary_color'   => '#139f48',
								'rocket__opt_quaternary_color' => '#27d368',
								'rocket__opt_quinary_color'    => '#10a942',
								'rocket__opt_senary_color'     => '#719675',
								'rocket__opt_septenary_color'  => '#f7f7f7',
								'rocket__opt_octonary_color'   => '#719675',
								'rocket__opt_nonary_color'     => '#719675',
								'rocket__opt-content-section-bg1' => '#e3e3e8',
								'rocket__opt-content-section-bg2' => '#007225',
								'rocket__opt-header-bg' => array(
									'background-color'      => '#007225',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
								'rocket__opt-header-sticky-bg' => array(
									'color' => '#007225',
									'alpha' => '.95'
								),

								// Header Top Bar
								'rocket__opt-header-top-bar-bg' => array(
									'background-color' => '#007225'
								),
								'rocket__opt-header-top-bar-border' => array(
									'border-color'  => '#ffbe0f',
									'border-style'  => 'solid',
									'border-top'    => '0',
									'border-bottom' => '1px',
									'border-left'   => '0',
									'border-right'  => '0',
								),

								// Header Cart
								'rocket__opt-header-cart-border' => array(
									'border-color'  => '#719675',
									'border-style'  => 'solid',
									'border-width'  => '2px'
								),
								'rocket__opt-header-cart-icon-border' => array(
									'border-color'  => '#ffbe0f',
									'border-style'  => 'dashed',
									'border-top'    => '2px'
								),
								'rocket__opt-header-cart-icon-bg-color' => array(
									'regular' => '#719675',
									'hover'   => '#ffbe0f',
									'active'  => '#ffbe0f',
								),
								'rocket__opt-header-cart-dropdown-txt-color' => '#719675',
								'rocket__opt-header-cart-dropdown-product-color' => array(
									'regular' => '#719675',
									'hover'   => '#ffbe0f',
									'active'  => '#ffbe0f',
								),
								'rocket__opt-header-cart-dropdown-price-color' => '#ffbe0f',
								'rocket__opt-header-cart-dropdown-divider' => array(
									'border-color'  => '#d2d2dd',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-bottom' => '0',
									'border-left'   => '0',
									'border-right'  => '0',
								),
								'rocket__opt-header-top-bar-txt-color' => '#d2d2dd',
								'rocket__opt-header-top-bar-link-color' => array(
									'regular' => '#ffffff',
									'hover'   => '#ffbe0f',
								),
								'rocket__opt-header-top-bar-icon-color' => '#ffbe0f',

								// Header Search Form
								'rocket__opt-header-search-form-icon-border' => array(
									'border-color'  => '#719675',
									'border-style'  => 'solid',
									'border-width'   => '2px'
								),
								'rocket__opt-header-search-form-icon-color' => array(
									'regular' => '#fff',
									'hover'   => '#719675',
								),

								// Page Heading
								'rocket__opt-page-title-breadcrumbs-dots-color' => '#ffbe0f',

								// Breadcrumbs
								'rocket__opt-page-title-breadcrumbs-color' => array(
									'regular' => '#719675',
									'hover'   => '#ffbe0f',
									'active'  => '#007225',
								),
								'rocket__opt-page-title-breadcrumbs-txt-color' => '#c8c8c8',

								// Footer
								'rocket__opt-footer-bg' => array(
									'background-color'      => '#007225',
									'background-image'      => get_template_directory_uri() . '/images/bg-footer.png',
									'background-repeat'     => 'repeat',
									'background-position'   => 'center top',
									'background-attachment' => 'inherit',
									'background-size'       => 'inherit',
								),
								'rocket__opt-footer-link-color' => array(
									'regular' => '#ffbe0f',
									'hover'   => '#007225',
									'active'  => '#007225',
								),
								'rocket__opt-footer-dots-color' => '#ffbe0f',
								'rocket__opt-back-to-top-bg-color' => array(
									'regular' => 'transparent',
									'hover'   => '#ffbe0f',
									'active'  => '#ffbe0f',
								),
								'rocket__opt-footer-social-bg-hover' => array(
									'background-color' => '#ffbe0f',
								),
								'rocket__opt-footer-social-links-border' => array(
									'border-color'  => '#719675',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),
								'rocket__opt-footer-social-links-border-hover' => array(
									'border-color'  => '#ffbe0f',
									'border-style'  => 'solid',
									'border-top'    => '2px',
									'border-right'  => '2px',
									'border-bottom' => '2px',
									'border-left'   => '2px'
								),

								// Blog
								'rocket__opt-post-title-color' => array(
									'regular' => '#719675',
									'hover'   => '#ffbe0f',
									'active'  => '#ffbe0f',
								),
								'rocket__opt-post-date-bg' => array(
									'background-color' => '#ffbe0f',
								),
								'rocket__opt-post-footer-more-link' => array(
									'regular' => '#656269',
									'hover'   => '#ffbe0f',
									'active'  => '#007225',
								),
								'rocket__opt-post-cat-bg-1' => array(
									'background-color' => '#27d368',
								),
								'rocket__opt-post-cat-bg-2' => array(
									'background-color' => '#ffbe0f',
								),
								'rocket__opt-post-cat-bg-3' => array(
									'background-color' => '#ffbe0f',
								),
								'rocket__opt-post-cat-bg-4' => array(
									'background-color' => '#139f48',
								),
								'rocket__opt-post-cat-bg-5' => array(
									'background-color' => '#27d368',
								),
								'rocket__opt-post-cat-bg-6' => array(
									'background-color' => '#ffbe0f',
								),

								// Under Construction
								'rocket__opt-under-construction-bg' => array(
									'background-color'      => '#007225',
									'background-image'      => get_template_directory_uri() . '/images/bg2.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-under-construction-title-divider-color' => '#ffbe0f',
								'rocket__opt-under-construction-days-border-color'   => '#719675',
								'rocket__opt-under-construction-hours-border-color'  => '#719675',
								'rocket__opt-under-construction-mins-border-color'   => '#719675',
								'rocket__opt-under-construction-secs-border-color'   => '#719675',
								'rocket__opt-under-construction-border' => array(
									'border-color'  => '#10a942',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// Coming Soon
								'rocket__opt-coming-bg' => array(
									'background-color'      => '#007225',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'fixed',
									'background-size'       => 'cover',
								),
								'rocket__opt-coming-title-divider-color' => '#ffbe0f',
								'rocket__opt-coming-days-bg' => array(
									'background-color' => '#27d368',
								),
								'rocket__opt-coming-hours-bg' => array(
									'background-color' => '#ffbe0f',
								),
								'rocket__opt-coming-mins-bg' => array(
									'background-color' => '#10a942',
								),
								'rocket__opt-coming-secs-bg' => array(
									'background-color' => '#139f48',
								),
								'rocket__opt-coming-border' => array(
									'border-color'  => '#10a942',
									'border-style'  => 'dashed',
									'border-top'    => '1px',
									'border-right'  => '0px',
									'border-bottom' => '0px',
									'border-left'   => '0px'
								),

								// 404
								'rocket__opt-404-bg' => array(
									'background-color'      => '#007225',
									'background-image'      => get_template_directory_uri() . '/images/bg1.png',
									'background-repeat'     => 'no-repeat',
									'background-position'   => 'center center',
									'background-attachment' => 'inherit',
									'background-size'       => 'cover',
								),
							)
						),

					)
				),
				array(
					'id'        => 'rocket__opt_content_bg_color',
					'type'      => 'color',
					'title'     => esc_html__('Main Background Color', 'rocket'),
					'subtitle'  => esc_html__('Background color for the content.', 'rocket'),
					'default'   => '#f1f2f4',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_primary_color',
					'type'      => 'color',
					'title'     => esc_html__('Primary Color', 'rocket'),
					'subtitle'  => esc_html__('Primary color used in the theme.', 'rocket'),
					'default'   => '#ff7149',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_secondary_color',
					'type'      => 'color',
					'title'     => esc_html__('Secondary Color', 'rocket'),
					'subtitle'  => esc_html__('Secondary color used in the theme.', 'rocket'),
					'default'   => '#4d306e',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_tertiary_color',
					'type'      => 'color',
					'title'     => esc_html__('Tertiary Color', 'rocket'),
					'subtitle'  => esc_html__('Tertiary color used in the theme.', 'rocket'),
					'default'   => '#d44546',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_quaternary_color',
					'type'      => 'color',
					'title'     => esc_html__('Quaternary Color', 'rocket'),
					'subtitle'  => esc_html__('Quaternary color used in the theme.', 'rocket'),
					'default'   => '#ffa76c',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_quinary_color',
					'type'      => 'color',
					'title'     => esc_html__('Quinary Color', 'rocket'),
					'subtitle'  => esc_html__('Quinary color used in the theme.', 'rocket'),
					'default'   => '#ea582f',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_senary_color',
					'type'      => 'color',
					'title'     => esc_html__('Senary Color', 'rocket'),
					'subtitle'  => esc_html__('Senary color used in the theme.', 'rocket'),
					'default'   => '#746981',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_septenary_color',
					'type'      => 'color',
					'title'     => esc_html__('Septenary Color', 'rocket'),
					'subtitle'  => esc_html__('Septenary color used in the theme.', 'rocket'),
					'default'   => '#d5d6d9',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_octonary_color',
					'type'      => 'color',
					'title'     => esc_html__('Octonary Color', 'rocket'),
					'subtitle'  => esc_html__('Octonary color used in the theme.', 'rocket'),
					'default'   => '#b59ecf',
					'validate'  => 'color',
				),
				array(
					'id'        => 'rocket__opt_nonary_color',
					'type'      => 'color',
					'title'     => esc_html__('Nonary Color', 'rocket'),
					'subtitle'  => esc_html__('Nonary color used in the theme.', 'rocket'),
					'default'   => '#836aa0',
					'validate'  => 'color',
				),

				array(
					'id'          => 'rocket__opt-content-section-bg1',
					'type'        => 'color',
					'title'       => esc_html__( 'Section Alternate Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Section.', 'rocket' ),
					'default'     => '#e3e3e8',
					'mode'        => 'background',
					'output'      => array( '.page-section__dark' ),
					'transparent' => false,
				),
				array(
					'id'          => 'rocket__opt-content-section-bg2',
					'type'        => 'color',
					'title'       => esc_html__( 'Section Dark Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Section.', 'rocket' ),
					'default'     => '#36274c',
					'mode'        => 'background',
					'output'      => array( '.page-section__darkest' ),
					'transparent' => false,
				),

			)
		) );


		// Styling: Layout
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Layout', 'rocket' ),
			'id'     => 'rocket__subsection-layout',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket__opt-layout',
					'type'      => 'select',
					'title'     => esc_html__('Layout Mode', 'rocket'),
					'desc'      => esc_html__('Choose your site\'s layout either Boxed or Full Width', 'rocket'),
					'options'   => array(
						'1' => 'Full Width',
						'2' => 'Boxed'
					),
					'default'   => '1'
				),

				array(
					'id'        => 'rocket__opt-layout-spacing',
					'type'      => 'spacing',
					'output'    => array('.rocket_layout_boxed .page-wrapper'),
					'mode'      => 'margin',
					'all'       => false,
					'left'      => false,
					'right'     => false,
					'units'     => 'px',
					'title'     => esc_html__('Wrapper Top/Bottom Margin', 'rocket'),
					'desc'      => esc_html__('You can set top and bottom margin for the site wrapper.', 'rocket'),
					'default'       => array(
						'margin-top'     => '30px',
						'margin-bottom'  => '30px'
					),
					'required'  => array('rocket__opt-layout', '=', '2'),
				),
				array(
					'id'        => 'rocket__layout-border-radius',
					'type'      => 'spinner',
					'title'     => esc_html__('Wrapper Border Radius', 'rocket'),
					'desc'      => esc_html__('You can set border radius for the site wrapper.', 'rocket'),
					'default'   => '0',
					'min'       => '0',
					'step'      => '1',
					'max'       => '50',
					'required'  => array('rocket__opt-layout', '=', '2'),
				),
			)
		) );



		// Blog Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Blog Options', 'rocket' ),
			'id'     => 'rocket__section-blog',
			'icon'   => 'el el-list',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-blog-title',
					'type'      => 'text',
					'title'     => esc_html__('Blog Page Title', 'rocket'),
					'subtitle'  => esc_html__('This title used on Blog Page', 'rocket'),
					'desc'      => esc_html__('Enter Your Blog Title used on Blog page.', 'rocket'),
					'default'   => esc_html__('Blog', 'rocket'),
				),
				array(
					'id'        => 'rocket__opt-blog-sidebar',
					'type'      => 'image_select',
					'compiler'  => true,
					'title'     => esc_html__('Sidebar Position', 'rocket'),
					'subtitle'  => esc_html__('Blog Sidebar Position.', 'rocket'),
					'desc'      => esc_html__('Select sidebar alignment for classic Blog.', 'rocket'),
					'options'   => array(
							'1' => array(
								'alt' => 'Right Sidebar',
								'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
							'2' => array(
								'alt' => 'Left Sidebar',
								'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
					),
					'default'   => '1'
				),
				array(
					'id'        => 'rocket__opt-blog-sidebar-width',
					'type'      => 'select',
					'title'     => esc_html__('Sidebar Width', 'rocket'),
					'subtitle'  => esc_html__('Select the width for the sidebar', 'rocket'),
					'options'   => array(
						'1' => '25%',
						'2' => '33%',
					),
					'default'   => '1'
				),
				array(
					'id'        => 'rocket__opt-blog-more-txt',
					'type'      => 'text',
					'title'     => esc_html__('Read More Text', 'rocket'),
					'desc'      => esc_html__('Enter text for the \'Read More\' post. Example <em>\'Read More\'</em>', 'rocket'),
					'validate'  => 'not_empty',
					'msg'       => esc_html__('Fill Read More button text', 'rocket'),
					'default'   => esc_html__('Read More', 'rocket'),
				),
			)
		) );

		// Single Post
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Single Post', 'rocket' ),
			'id'     => 'rocket__subsection-single-post',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket__opt-single-post-title',
					'type'      => 'switch',
					'title'     => esc_html__('Show Single Post Title?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Single Post Title.', 'rocket'),
					'desc'      => esc_html__('You can find Single Post Title under the featured image.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-thumb',
					'type'      => 'switch',
					'title'     => esc_html__('Show Featured Image?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show Featured Image.', 'rocket'),
					'desc'      => esc_html__('This option enable/disable Featured Image visibility only on Single Post page. Please note that you can still upload featured image to show it in widgets, shortcodes etc.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-nav',
					'type'      => 'switch',
					'title'     => esc_html__('Show Single Post Navigation?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post navigation.', 'rocket'),
					'desc'      => esc_html__('Post navigation displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-single-post-blog-page',
					'type'     => 'select',
					'data'     => 'pages',
					'title'    => esc_html__( 'Page for Turn Back button', 'rocket' ),
					'subtitle' => esc_html__( 'Sets the page for Turn Back button.', 'rocket' ),
					'desc'     => esc_html__('This option needed for setting up Turn Back button.', 'rocket'),
					'required' => array('rocket__opt-single-post-nav', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-single-post-social',
					'type'      => 'switch',
					'title'     => esc_html__('Show Social Sharing?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show social sharing buttons.', 'rocket'),
					'desc'      => esc_html__('Social sharing buttons displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-social-sorter',
					'type'      => 'sorter',
					'title'     => esc_html__( 'Social Sharing Sorter', 'rocket' ),
					'subtitle'  => esc_html__( 'Organize social sharing link.', 'rocket' ),
					'desc'      => esc_html__( 'Drag and drop social sharing links from "Disabled" to "Enabled" group to display them on Single Post Page.', 'rocket' ),
					'compiler'  => 'true',
					'options'   => array(
							'enabled'   => array(
								'social_facebook'    => esc_html__( 'Facebook', 'rocket' ),
								'social_linkedin'    => esc_html__( 'Linkedin', 'rocket' ),
								'social_twitter'     => esc_html__( 'Twitter', 'rocket' ),
								'social_google-plus' => esc_html__( 'Google+', 'rocket' ),
							),
							'disabled'  => array(
								'social_vk'          => esc_html__( 'VK', 'rocket' ),
								'social_ok'          => esc_html__( 'Odnoklassniki', 'rocket' ),
							),
					),
					'required'  => array('rocket__opt-single-post-social', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-single-post-date',
					'type'      => 'switch',
					'title'     => esc_html__('Show Date?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show single post date.', 'rocket'),
					'desc'      => esc_html__('Single Post date displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-footer',
					'type'      => 'switch',
					'title'     => esc_html__('Show Single Post Footer?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show single post footer.', 'rocket'),
					'desc'      => esc_html__('Single Post Footer displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-tags',
					'type'      => 'switch',
					'title'     => esc_html__('Show Single Post Tags?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show single post tags.', 'rocket'),
					'desc'      => esc_html__('Single Post Tags displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-post-author',
					'type'      => 'switch',
					'title'     => esc_html__('Show Post Author Box on Single Post?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post author box.', 'rocket'),
					'desc'      => esc_html__('Post Author Box contains name, email, avatar and description.', 'rocket'),
					'default'   => 2,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
			)
		) );


		// Blog Styling
		Redux::setSection ( $opt_name, array(
			'title'  => esc_html__( 'Styling', 'rocket' ),
			'id'     => 'rocket__subsection-blog-styling',
			'subsection' => true,
			'fields' => array(
				array(
					'id'          => 'rocket__custom_blog-styling',
					'type'        => 'switch',
					'title'       => esc_html__('Enable advanced post styling?', 'rocket'),
					'subtitle'    => esc_html__('Turn on to change appearance for the posts.', 'rocket'),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'rocket' ),
					'off'         => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'                    => 'rocket__opt-post-bg',
					'type'                  => 'background',
					'output'                => array('article.hentry'),
					'title'                 => esc_html__('Post Background Color', 'rocket'),
					'subtitle'              => esc_html__('Background color for Post.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#f8f9fa',
					),
					'required'              => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-single-post-content-color',
					'type'        => 'color',
					'output'      => array( 'article.hentry .entry-body .entry-content' ),
					'title'       => esc_html__( 'Single Post Content Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Text color for the post content text.', 'rocket' ),
					'default'     => '#656269',
					'transparent' => false,
					'required'    => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-post-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Post Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for post.', 'rocket' ),
					'desc'     => esc_html__( 'Option for the post. ', 'rocket' ),
					'output'   => array( 'article.hentry' ),
					'default'  => array(
						'border-color'  => '#d2d2dd',
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-left'   => '1px',
						'border-right'  => '1px',
						'border-bottom' => '1px',
					),
					'required' => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-post-title-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Post Title Link Color', 'rocket' ),
					'subtitle' => esc_html__( 'Colors for post title', 'rocket' ),
					'desc'     => esc_html__( 'Option for post title displayed on Blog page.', 'rocket' ),
					'output'   => array( 'article.hentry .entry-header h4 > a' ),
					'default'  => array(
						'regular' => '#746981',
						'hover'   => '#ff7149',
						'active'  => '#ff7149',
					),
					'required' => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-post-title-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Post Title Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for post title.', 'rocket' ),
					'desc'     => esc_html__( 'Option for post title displayed on Blog page. Bottom border is set by default (1px). ', 'rocket' ),
					'all'      => false,
					'top'      => false,
					'left'     => false,
					'right'    => false,
					'output'   => array( '.entry-header .title-bordered' ),
					'default'  => array(
						'border-color'  => '#d9d9d9',
						'border-style'  => 'solid',
						'border-bottom' => '1px',
					),
					'required' => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-post-date',
					'type'      => 'switch',
					'title'     => esc_html__('Show Post Date?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post date.', 'rocket'),
					'desc'      => esc_html__('Post date displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-post-date-bg',
					'type'                  => 'background',
					'output'                => array('article.hentry .entry-date'),
					'title'                 => esc_html__('Post Date Background Color', 'rocket'),
					'subtitle'              => esc_html__('Background color for Post Date.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff7149',
					),
					'required'              => array(
						array('rocket__opt-post-date', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-post-date-color',
					'type'        => 'color',
					'output'      => array( 'article.hentry .entry-date' ),
					'title'       => esc_html__( 'Post Date Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Text color for Post Date (including month and day).', 'rocket' ),
					'default'     => '#fff',
					'transparent' => false,
					'required'              => array(
						array('rocket__opt-post-date', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-post-excerpt-color',
					'type'        => 'color',
					'output'      => array( 'article.hentry .entry-body .entry-excerpt' ),
					'title'       => esc_html__( 'Excerpt Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Text color excerpt.', 'rocket' ),
					'default'     => '#656269',
					'transparent' => false,
					'required'    => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-post-footer',
					'type'      => 'switch',
					'title'     => esc_html__('Show Post Footer?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post footer.', 'rocket'),
					'desc'      => esc_html__('Post footer displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-post-footer-bg',
					'type'                  => 'background',
					'output'                => array('article.hentry .entry-footer'),
					'title'                 => esc_html__('Post Footer Background Color', 'rocket'),
					'subtitle'              => esc_html__('Background color for Post Footer.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#f1f2f4',
					),
					'required'              => array(
						array('rocket__opt-post-footer', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-post-footer-color',
					'type'        => 'color',
					'output'      => array( 'article.hentry .entry-footer' ),
					'title'       => esc_html__( 'Post Footer Text Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Text color for post footer text.', 'rocket' ),
					'default'     => '#656269',
					'transparent' => false,
					'required'              => array(
						array('rocket__opt-post-footer', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'       => 'rocket__opt-post-footer-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Post Footer Top Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for post title.', 'rocket' ),
					'desc'     => esc_html__( 'Option for Post Footer. Top border is set by default (1px). ', 'rocket' ),
					'all'      => false,
					'bottom'   => false,
					'left'     => false,
					'right'    => false,
					'output'   => array( 'article.hentry .entry-footer' ),
					'default'  => array(
						'border-color'  => '#d2d2dd',
						'border-style'  => 'dashed',
						'border-top' => '1px',
					),
					'required'              => array(
						array('rocket__opt-post-footer', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'        => 'rocket__opt-post-footer-author',
					'type'      => 'switch',
					'title'     => esc_html__('Show author name?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post author.', 'rocket'),
					'desc'      => __('<em>\'Posted by author\'</em> text displayed by default in the post footer.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'              => array(
						array('rocket__opt-post-footer', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'       => 'rocket__opt-post-footer-more-link',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Read More Link Color', 'rocket' ),
					'subtitle' => esc_html__( 'Colors option for Read More link.', 'rocket' ),
					'default'  => array(
						'regular' => '#656269',
						'hover'   => '#ff7149',
						'active'  => '#fb3700',
					),
					'required'              => array(
						array('rocket__opt-post-footer', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'        => 'rocket__opt-post-categories',
					'type'      => 'switch',
					'title'     => esc_html__('Show Post Categories?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show post categories.', 'rocket'),
					'desc'      => esc_html__('Post categories displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_blog-styling', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-1',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(odd) > a'),
					'title'                 => esc_html__('Post Categories Color 1', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ffa76c',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-2',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(even) > a'),
					'title'                 => esc_html__('Post Categories Color 2', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff7149',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-3',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(3n) > a, article.hentry .post-categories > li:nth-child(7) > a'),
					'title'                 => esc_html__('Post Categories Color 3', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff5d2f',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-4',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(4n) > a'),
					'title'                 => esc_html__('Post Categories Color 4', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#d44546',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-5',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(5n) > a'),
					'title'                 => esc_html__('Post Categories Color 5', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ffa76c',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'                    => 'rocket__opt-post-cat-bg-6',
					'type'                  => 'background',
					'output'                => array('article.hentry .post-categories > li:nth-child(6n) > a'),
					'title'                 => esc_html__('Post Categories Color 6', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff7149',
					),
					'required'              => array(
						array('rocket__opt-post-categories', '=', '1'),
						array('rocket__custom_blog-styling', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-post-cat-color',
					'type'        => 'color',
					'output'      => array( 'article.hentry .post-categories > li > a' ),
					'title'       => esc_html__( 'Post Categories Link Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Link color for post categories.', 'rocket' ),
					'default'     => '#fff',
					'transparent' => false,
					'required'    => array('rocket__custom_blog-styling', '=', '1'),
				),
			)
		) );


		// Portfolio Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Portfolio Options', 'rocket' ),
			'id'     => 'rocket__section-portfolio',
			'icon'   => 'el el-picture',
			'fields' => array(
				array(
					'id'       => 'rocket__opt-portfolio-page',
					'type'     => 'select',
					'data'     => 'pages',
					'title'    => esc_html__( 'Main Portfolio Page', 'rocket' ),
					'desc'     => esc_html__( 'Choose your Portfolio Page', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-portfolio-breadcrumbs-name',
					'type'      => 'text',
					'title'     => esc_html__('Portfolio Label (for Breadcrumbs)', 'rocket'),
					'subtitle'  => esc_html__('Portfolio Labeld in Breadcrumbs.', 'rocket'),
					'desc'      => esc_html__('Make sure breadcrumbs is enabled.', 'rocket'),
					'default'   => esc_html__('Portfolio', 'rocket'),
				),
				array(
					'id'        => 'rocket__opt-portfolio-slug',
					'type'      => 'text',
					'title'     => esc_html__('Portfolio Slug', 'rocket'),
					'subtitle'  => esc_html__('Change this option if you want to change default portfolio slug.', 'rocket'),
					'desc'      => esc_html__('After changing this slug go to Settings > Permalinks and resave it.', 'rocket'),
					'default'   => esc_html__('project', 'rocket'),
				),
			)
		) );

		// Single Project
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Single Project', 'rocket' ),
			'id'     => 'rocket__subsection-single-project',
			'subsection' => true,
			'fields' => array(
				array(
					'id'        => 'rocket__opt-single-project-layout',
					'type'      => 'image_select',
					'compiler'  => true,
					'title'     => esc_html__('Single Project Layout', 'rocket'),
					'subtitle'  => esc_html__('Select Layout for Single Project pages.', 'rocket'),
					'desc'      => esc_html__('You can select Right Description, Left Description, Full Width or Blank Layout. Note that you can also choose various layouts for various projects on the post page.', 'rocket'),
					'options'   => array(
							'right_desc' => array(
								'alt' => esc_html__( 'Project - Right Description', 'rocket'),
								'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
							),
							'left_desc' => array(
								'alt' => esc_html__( 'Project - Left Description', 'rocket'),
								'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
							),
							'full_width' => array(
								'alt' => esc_html__( 'Full width - No Sidebar', 'rocket'),
								'img' => get_template_directory_uri() . '/admin/images/portfolio-full-width.png'
							),
							'blank' => array(
								'alt' => esc_html__( 'Blank Layout', 'rocket'),
								'img' => ReduxFramework::$_url . 'assets/img/1col.png'
							),
					),
					'default'   => 'right_desc'
				),
				array(
					'id'        => 'rocket__opt-single-project-nav',
					'type'      => 'switch',
					'title'     => esc_html__('Show Single Project Navigation?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show project navigation.', 'rocket'),
					'desc'      => esc_html__('Project navigation displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-project-related',
					'type'      => 'switch',
					'title'     => esc_html__('Show Related Projects?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to show related projects.', 'rocket'),
					'desc'      => esc_html__('Related projects displayed by default.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-single-project-related-title',
					'type'      => 'text',
					'title'     => esc_html__('Related Projects Title', 'rocket'),
					'subtitle'  => esc_html__('Enter title for Related Projects.', 'rocket'),
					'desc'      => esc_html__('Depends on your work type, e.g. Related Projects, More Photos etc.', 'rocket'),
					'validate'  => 'not_empty',
					'msg'       => esc_html__('Fill Related Projects Title', 'rocket'),
					'default'   => esc_html__('View More Projects', 'rocket'),
					'required'              => array(
						array('rocket__opt-single-project-related', '=', '1'),
					),
				),
			)
		) );


		// Team Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Team Options', 'rocket' ),
			'id'     => 'rocket__section-team',
			'icon'   => 'el el-user',
			'fields' => array(
				array(
					'id'       => 'rocket__opt-team-page',
					'type'     => 'select',
					'data'     => 'pages',
					'title'    => esc_html__( 'Team Page', 'rocket' ),
					'desc'     => esc_html__( 'Choose your Team Page', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-team-breadcrumbs-name',
					'type'      => 'text',
					'title'     => esc_html__('Team Label (for Breadcrumbs)', 'rocket'),
					'subtitle'  => esc_html__('Team Label in Breadcrumbs.', 'rocket'),
					'desc'      => esc_html__('Make sure breadcrumbs is enabled.', 'rocket'),
					'default'   => esc_html__('Team', 'rocket'),
				),
				array(
					'id'        => 'rocket__opt-team-slug',
					'type'      => 'text',
					'title'     => esc_html__('Team Slug', 'rocket'),
					'subtitle'  => esc_html__('Change this option if you want to change default team slug.', 'rocket'),
					'desc'      => esc_html__('After changing this slug go to Settings > Permalinks and resave it.', 'rocket'),
					'default'   => esc_html__('member', 'rocket'),
				),
			)
		) );


		// WooCommerce Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'WooCommerce', 'rocket' ),
			'id'     => 'rocket__section-woocommerce',
			'icon'   => 'el el-shopping-cart',
			'fields' => array(
				array(
					'id'       => 'rocket__opt-shop-page',
					'type'     => 'select',
					'data'     => 'pages',
					'title'    => esc_html__( 'Shop Page', 'rocket' ),
					'desc'     => esc_html__( 'Choose your Shop Page', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-shop-breadcrumbs-name',
					'type'      => 'text',
					'title'     => esc_html__('Shop Label (for Breadcrumbs)', 'rocket'),
					'subtitle'  => esc_html__('Shop Label in Breadcrumbs.', 'rocket'),
					'desc'      => esc_html__('Make sure breadcrumbs is enabled.', 'rocket'),
					'default'   => esc_html__('Products', 'rocket'),
				),
				array(
					'id'        => 'rocket__shop-columns',
					'type'      => 'select',
					'title'     => esc_html__('Shop page layout', 'rocket'),
					'subtitle'  => esc_html__('Select the number of columns for the shop page', 'rocket'),
					'options'   => array(
						'2' => '2',
						'3' => '3',
						'4' => '4'
					),
					'default'   => '4'
				),
				array(
					'id'       => 'rocket__shop-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Products per page', 'rocket' ),
					'subtitle' => esc_html__( 'Number of products on Shop page.', 'rocket' ),
					'desc'     => esc_html__( 'Change the number of products to show per page.', 'rocket' ),
					'default'  => '12'
				),
				array(
					'id'        => 'rocket__shop-related-columns',
					'type'      => 'select',
					'title'     => esc_html__('Related products layout', 'rocket'),
					'subtitle'  => esc_html__('Select the number of columns for the related products', 'rocket'),
					'options'   => array(
						'2' => '2',
						'3' => '3',
						'4' => '4'
					),
					'default'   => '4'
				),
				array(
					'id'       => 'rocket__shop-related-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Related products per page', 'rocket' ),
					'subtitle' => esc_html__( 'Number of products of Related Products.', 'rocket' ),
					'desc'     => esc_html__( 'Change the number of products fore Related Products.', 'rocket' ),
					'default'  => '4'
				),
			)
		) );


		// Page Pre-Loader Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Page Pre-Loader', 'rocket' ),
			'id'     => 'rocket__section-pageloader',
			'icon'   => 'el el-repeat',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-pageloader',
					'type'      => 'switch',
					'title'     => esc_html__('Use Pager Pre-Loader?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to use page pre-loader.', 'rocket'),
					'desc'      => esc_html__('If turned on you will see spinner before content will be shown.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__custom_pageloader',
					'type'      => 'switch',
					'title'     => esc_html__('Enable styling for Pre-Loader?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors for the pre-loader.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__opt-pageloader', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-pageloader-bg',
					'type'                  => 'background',
					'output'                => array('.page-loader'),
					'title'                 => esc_html__('Page Pre-Loader Background', 'rocket'),
					'subtitle'              => esc_html__('Choose background color your pre-loader screen.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'transparent'           => false,
					'default'               => array(
						'background-color' => '#fefefe',
					),
					'required'              => array(
						array('rocket__opt-pageloader', '=', '1'),
						array('rocket__custom_pageloader', '=', '1'),
					),
				),
				array(
					'id'          => 'rocket__opt-pageloader-bar-color1',
					'type'        => 'color',
					'title'       => esc_html__( 'Spinning Bar Color Primary', 'rocket' ),
					'subtitle'    => esc_html__( 'Choose color for spinning bar.', 'rocket' ),
					'default'     => '#ff7149',
					'transparent' => false,
					'required'    => array(
						array('rocket__opt-pageloader', '=', '1'),
						array('rocket__custom_pageloader', '=', '1'),
					),
				),
				array(
					'id'             => 'rocket__opt-pageloader-spinner-size',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),
					'output'         => array('.page-loader .loader'),
					'units_extended' => 'false',
					'title'          => esc_html__( 'Spinner Size', 'rocket' ),
					'subtitle'       => esc_html__( 'Set up the spinner size.', 'rocket' ),
					'desc'           => esc_html__( 'Spinner size can be set in px.', 'rocket' ),
					'height'         => false,
					'default'        => array(
						'width'   => 60
					),
					'required'  => array(
						array('rocket__opt-pageloader', '=', '1'),
						array('rocket__custom_pageloader', '=', '1'),
					),
				),
			)
		) );


		// 404 Page Options
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( '404 Page Options', 'rocket' ),
			'id'     => 'rocket__section-404-page',
			'icon'   => 'el el-error',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-404-logo',
					'type'      => 'media',
					'url'       => true,
					'title'     => esc_html__('Page 404 Logo', 'rocket'),
					'subtitle'  => esc_html__('Separate Logo option for Page 404.', 'rocket'),
					'compiler'  => 'true',
					'desc'      => esc_html__('Upload your image or remove image if you want to use text-based logo.', 'rocket'),
					'default'   => array(
						'url'     => get_template_directory_uri() . '/images/logo.png'),
					'width'     => '',
					'height'    => '',
				),
				array(
					'id'       => 'rocket__opt-404-page-title-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Page 404 Title', 'rocket' ),
					'subtitle' => esc_html__( 'Change Page 404 Title.', 'rocket' ),
					'desc'     => esc_html__( 'This text appears above 404 number.', 'rocket' ),
					'default'  => 'Wrong way, my Dear friend'
				),
				array(
					'id'        => 'rocket__opt-404-image',
					'type'      => 'media',
					'url'       => true,
					'title'     => esc_html__('Page 404 Image', 'rocket'),
					'subtitle'  => esc_html__('Optional image for Page 404.', 'rocket'),
					'compiler'  => 'true',
					'desc'      => esc_html__('Upload an image if you want to replace default \'Rocket\' default image.', 'rocket'),
					'default'   => array(
						'url'     => get_template_directory_uri() . '/images/404-rocket.png'),
					'width'     => '',
					'height'    => '',
				),
				array(
					'id'      => 'rocket__opt-404-desc',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Page 404 Description', 'rocket' ),
					'default' => 'In hac habitasse platea dictumst. Curabitur a felis in nunc fringilla tristique. Nullam vel sem. Curabitur a felis in nunc fringilla tristique. Pellentesque libero tortor, tincidunt et, tincidunt eget. Pellentesque egestas, neque.',
				),
				array(
					'id'        => 'rocket__opt-404-btn',
					'type'      => 'switch',
					'title'     => esc_html__('Show Button?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to display button.', 'rocket'),
					'desc'      => esc_html__('This button linked to main page.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-404-btn-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Button Text', 'rocket' ),
					'subtitle' => esc_html__( 'Change Button text.', 'rocket' ),
					'desc'     => esc_html__( 'This button linked to main page.', 'rocket' ),
					'default'  => 'Back to main page',
					'required' => array('rocket__opt-404-btn', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-404-social',
					'type'      => 'switch',
					'title'     => esc_html__('Show Social Media Links?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the social links.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-404-social-title-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Page 404 Social Title', 'rocket' ),
					'subtitle' => esc_html__( 'Change Page 404 Social Title.', 'rocket' ),
					'desc'     => esc_html__( 'Social Title appears above the Social Media Links.', 'rocket' ),
					'default'  => 'Follow Us',
					'required' => array('rocket__opt-404-social', '=', '1'),
				),
			)
		) );


		// Page 404: Styling
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Styling', 'rocket' ),
			'id'     => 'rocket__subsection-styling-404',
			'subsection' => true,
			'fields' => array(
				array(
					'id'       => 'rocket__opt-404-bg',
					'type'     => 'background',
					'output'   => array( '.error404' ),
					'title'    => esc_html__( 'Page 404 Background', 'rocket' ),
					'subtitle' => esc_html__( 'Background Option for the Page 404.', 'rocket' ),
					'default'     => array(
						'background-color'      => '#36274c',
						'background-image'      => get_template_directory_uri() . '/images/bg1.png',
						'background-repeat'     => 'no-repeat',
						'background-position'   => 'center center',
						'background-attachment' => 'inherit',
						'background-size'       => 'cover',
					),
				),
				array(
					'id'        => 'rocket__custom_404',
					'type'      => 'switch',
					'title'     => esc_html__('Enable advanced styling for 404 Page?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors, borders, link etc. for the 404 Page.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-404-hr-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Horizontal Rules Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for horizontal rules.', 'rocket' ),
					'desc'     => esc_html__( 'Bottom border is set by default (1px). ', 'rocket' ),
					'all'      => false,
					'output'   => array( '.page-404-main .page-404-num, .page-404-header, .page-404-footer-label' ),
					'default'  => array(
						'border-color'  => '#786e87',
						'border-style'  => 'dashed',
						'border-top'    => '0px',
						'border-right'  => '0px',
						'border-bottom' => '1px',
						'border-left'   => '0px'
					),
					'required' => array('rocket__custom_404', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-404-hr-dots',
					'type'      => 'switch',
					'title'     => esc_html__('Add a dot on Horizontal Rule?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to add a dot.', 'rocket'),
					'desc'      => esc_html__('Each dot appears on the Horizontal Rule.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_404', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-404-dots-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Page 404 dot Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Pick a dots color displayed on Page 404.', 'rocket' ),
					'default'     => '#ff7149',
					'required'  => array(
						array('rocket__opt-404-hr-dots', '=', '1'),
						array('rocket__custom_404', '=', '1'),
					),
				),
				array(
					'id'       => 'rocket__opt-404-social-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Social Media Links Color', 'rocket' ),
					'subtitle' => esc_html__( 'Color for Social Media links.', 'rocket' ),
					'output'   => array( '.page-404-social > li a' ),
					'default'  => array(
						'regular' => '#fff',
						'hover'   => '#ff7149',
						'active'  => '#fb3700',
					),
					'required'  => array(
						array('rocket__opt-404-social', '=', '1'),
						array('rocket__custom_404', '=', '1'),
					),
				),
			)
		) );


		// Coming Soon Page
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Coming Soon Page', 'rocket' ),
			'id'     => 'rocket__section-coming-soon',
			'icon'   => 'el el-calendar',
			'fields' => array(
				array(
					'id'        => 'rocket__custom_coming_soon',
					'type'      => 'switch',
					'title'     => esc_html__('Enable advanced styling?', 'rocket'),
					'subtitle'  => esc_html__('Turn on to change colors, borders, link etc. for the Coming Soon Page.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'       => 'rocket__opt-coming-bg',
					'type'     => 'background',
					'title'    => esc_html__( 'Page Background', 'rocket' ),
					'subtitle' => esc_html__( 'Page background options for Coming Soon Page.', 'rocket' ),
					'default'     => array(
						'background-color'      => '#36274c',
						'background-image'      => get_template_directory_uri() . '/images/bg1.png',
						'background-repeat'     => 'no-repeat',
						'background-position'   => 'center center',
						'background-attachment' => 'fixed',
						'background-size'       => 'cover',
					),
				),
				array(
					'id'        => 'rocket__opt-coming-title-divider',
					'type'      => 'switch',
					'title'     => esc_html__('Show Page Title Dots?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the title dots.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-coming-title-divider-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Page Title Divider (dots) Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Page Title Divider.', 'rocket' ),
					'default'     => '#ff7149',
					'required'  => array(
						array('rocket__opt-coming-title-divider', '=', '1'),
						array('rocket__custom_coming_soon', '=', '1')
					),
				),
				array(
					'id'       => 'rocket__opt-coming-datepicker',
					'type'     => 'date',
					'title'    => esc_html__( 'Date', 'rocket' ),
					'subtitle' => esc_html__( 'Date used in Counter.', 'rocket' ),
					'desc'     => esc_html__( 'Select the release date.', 'rocket' ),
					'default'  => '05/25/2016',
				),
				array(
					'id'       => 'rocket__opt-coming-days-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Days', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Days counter.', 'rocket' ),
					'default'  => 'days'
				),
				array(
					'id'                    => 'rocket__opt-coming-days-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-coming-soon .countdown.countdown__color-circles .days-count'),
					'title'                 => esc_html__('Days Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Days Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ffa76c',
					),
					'required'              => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-coming-days-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Days Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Days Counter.', 'rocket' ),
					'default'     => '#fff',
					'required'    => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-coming-hours-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Hours', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Hours counter.', 'rocket' ),
					'default'  => 'hours'
				),
				array(
					'id'                    => 'rocket__opt-coming-hours-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-coming-soon .countdown.countdown__color-circles .hours-count'),
					'title'                 => esc_html__('Hours Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Hours Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff7149',
					),
					'required'              => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-coming-hours-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Hours Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Hours Counter.', 'rocket' ),
					'default'     => '#fff',
					'required'    => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-coming-mins-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Minutes', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Minutes counter.', 'rocket' ),
					'default'  => 'minutes'
				),
				array(
					'id'                    => 'rocket__opt-coming-mins-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-coming-soon .countdown.countdown__color-circles .mins-count'),
					'title'                 => esc_html__('Hours Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Hours Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ea582f',
					),
					'required'              => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-coming-mins-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Minutes Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Minutes Counter.', 'rocket' ),
					'default'     => '#fff',
					'required'    => array('rocket__custom_coming_soon', '=', '1'),
				),

				array(
					'id'       => 'rocket__opt-coming-secs-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Seconds', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Seconds counter.', 'rocket' ),
					'default'  => 'seconds'
				),
				array(
					'id'                    => 'rocket__opt-coming-secs-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-coming-soon .countdown.countdown__color-circles .secs-count'),
					'title'                 => esc_html__('Seconds Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Seconds Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#d44546',
					),
					'required'              => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-coming-secs-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Seconds Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Seconds Counter.', 'rocket' ),
					'default'     => '#fff',
					'required'    => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-coming-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Coming Soon Page Footer Border', 'rocket' ),
					'subtitle' => esc_html__( 'Footer Copyright border options.', 'rocket' ),
					'desc'     => esc_html__( 'Top Border is set by default (1px). ', 'rocket' ),
					'all'      => false,
					'output'   => array( '.page-coming-soon-footer' ),
					'default'  => array(
						'border-color'  => '#786e87',
						'border-style'  => 'dashed',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required'  => array('rocket__custom_coming_soon', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-social-in-footer-coming-soon',
					'type'      => 'switch',
					'title'     => esc_html__('Show Social Media Links?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the social links.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
			)
		) );


		// Under Construction Page
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Under Construction', 'rocket' ),
			'id'     => 'rocket__section-under-construction',
			'icon'   => 'el el-exclamation-sign',
			'fields' => array(
				array(
					'id'        => 'rocket__custom_under-construction',
					'type'      => 'switch',
					'title'     => esc_html__('Enable advanced styling?', 'rocket'),
					'subtitle'  => esc_html__('Add additional styling options.', 'rocket'),
					'desc'      => esc_html__('Turn on to change colors, borders, link etc. for the Under Construction Page.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-under-construction-bg',
					'type'      => 'background',
					'title'     => esc_html__( 'Page Background', 'rocket' ),
					'subtitle'  => esc_html__( 'Page background options for Under Construction.', 'rocket' ),
					'default'     => array(
						'background-color'      => '#36274c',
						'background-image'      => get_template_directory_uri() . '/images/bg2.png',
						'background-repeat'     => 'no-repeat',
						'background-position'   => 'center center',
						'background-attachment' => 'fixed',
						'background-size'       => 'cover',
					),
				),
				array(
					'id'        => 'rocket__opt-under-construction-divider',
					'type'      => 'switch',
					'title'     => esc_html__('Show Page Title Dots?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the title dots.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-under-construction-title-divider-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Page Title Divider (dots) Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Color for Page Title Divider.', 'rocket' ),
					'default'     => '#ff7149',
					'required'  => array(
						array('rocket__opt-under-construction-divider', '=', '1'),
						array('rocket__custom_under-construction', '=', '1'),
					),
				),

				array(
					'id'       => 'rocket__opt-under-construction-datepicker',
					'type'     => 'date',
					'title'    => esc_html__( 'Date', 'rocket' ),
					'subtitle' => esc_html__( 'Date used in Counter.', 'rocket' ),
					'desc'     => esc_html__( 'Select the release date.', 'rocket' ),
					'default'  => '05/25/2016'
				),
				array(
					'id'       => 'rocket__opt-under-construction-days-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Days', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Days counter.', 'rocket' ),
					'default'  => 'days'
				),
				array(
					'id'                    => 'rocket__opt-under-construction-days-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-under-construction .countdown .days-count'),
					'title'                 => esc_html__('Days Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Days Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => 'transparent',
					),
					'required'              => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-under-construction-days-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Days Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Days Counter.', 'rocket' ),
					'default'     => '#836aa0',
					'required'    => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-under-construction-hours-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Hours', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Hours counter.', 'rocket' ),
					'default'  => 'hours'
				),
				array(
					'id'                    => 'rocket__opt-under-construction-hours-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-under-construction .countdown .hours-count'),
					'title'                 => esc_html__('Hours Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Hours Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => 'transparent',
					),
					'required'              => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-under-construction-hours-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Hours Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Hours Counter.', 'rocket' ),
					'default'     => '#836aa0',
					'required'    => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-under-construction-mins-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Minutes', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Minutes counter.', 'rocket' ),
					'default'  => 'minutes'
				),
				array(
					'id'                    => 'rocket__opt-under-construction-mins-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-under-construction .countdown .mins-count'),
					'title'                 => esc_html__( 'Hours Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Hours Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => 'transparent',
					),
					'required'              => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-under-construction-mins-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Minutes Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Minutes Counter.', 'rocket' ),
					'default'     => '#836aa0',
					'required'    => array('rocket__custom_under-construction', '=', '1'),
				),

				array(
					'id'       => 'rocket__opt-under-construction-secs-txt',
					'type'     => 'text',
					'title'    => esc_html__( 'Text for Seconds', 'rocket' ),
					'subtitle' => esc_html__( 'Used for the Seconds counter.', 'rocket' ),
					'default'  => 'seconds'
				),
				array(
					'id'                    => 'rocket__opt-under-construction-secs-bg',
					'type'                  => 'background',
					'output'                => array('.page-template-template-under-construction .countdown .secs-count'),
					'title'                 => esc_html__( 'Seconds Counter Background Color', 'rocket'),
					'subtitle'              => esc_html__( 'Background Color for Seconds Counter.', 'rocket' ),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => 'transparent',
					),
					'required'              => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'          => 'rocket__opt-under-construction-secs-border-color',
					'type'        => 'color',
					'title'       => esc_html__( 'Seconds Counter Border Color', 'rocket' ),
					'subtitle'    => esc_html__( 'Border Color for Seconds Counter.', 'rocket' ),
					'default'     => '#836aa0',
					'required'    => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-under-construction-border',
					'type'      => 'border',
					'title'     => esc_html__( 'Footer Border', 'rocket' ),
					'subtitle'  => esc_html__( 'Footer Copyright border options.', 'rocket' ),
					'desc'      => esc_html__( 'Top Border is set by default (1px). ', 'rocket' ),
					'all'       => false,
					'output'    => array( '.page-under-construction-footer' ),
					'default'   => array(
						'border-color'  => '#786e87',
						'border-style'  => 'dashed',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required'  => array('rocket__custom_under-construction', '=', '1'),
				),
				array(
					'id'        => 'rocket__opt-social-in-footer-under-construction',
					'type'      => 'switch',
					'title'     => esc_html__('Show Social Media Links?', 'rocket'),
					'subtitle'  => esc_html__('Toggle whether or not to show the social links.', 'rocket'),
					'default'   => 1,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
					'required'  => array('rocket__custom_under-construction', '=', '1'),
				),
			)
		) );


		// Social Media
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Social Media', 'rocket' ),
			'id'     => 'rocket__section-footer--social-media',
			'icon'   => 'el el-globe',
			'fields' => array(
				array(
					'id'       => 'rocket__opt-social-media',
					'type'     => 'sortable',
					'title'    => esc_html__( 'Social Media Links', 'rocket' ),
					'subtitle' => esc_html__( 'Define and reorder these links however you want.', 'rocket' ),
					'desc'     => esc_html__( 'Leave empty a field if you don\'t want to display particular social media link.', 'rocket' ),
					'label'    => true,
					'mode'     => 'text',
					'options'  => array(
						esc_html__( 'Facebook URL', 'rocket' ) => '',
						esc_html__( 'Twitter URL', 'rocket' )   => '',
						esc_html__( 'LinkedIn URL', 'rocket' ) => '',
						esc_html__( 'Google+ URL', 'rocket' ) => '',
						esc_html__( 'Instagram URL', 'rocket' ) => '',
						esc_html__( 'Github URL', 'rocket' ) => '',
						esc_html__( 'VK URL', 'rocket' ) => '',
						esc_html__( 'YouTube URL', 'rocket' ) => '',
						esc_html__( 'Pinterest URL', 'rocket' ) => '',
						esc_html__( 'Tumblr URL', 'rocket' ) => '',
						esc_html__( 'Dribbble URL', 'rocket' ) => '',
						esc_html__( 'Vimeo URL', 'rocket' ) => '',
						esc_html__( 'Flickr URL', 'rocket' ) => '',
						esc_html__( 'Yelp URL', 'rocket' ) => '',
					),
					'default'  => array(
						esc_html__( 'Facebook URL', 'rocket' )   => '#',
						esc_html__( 'Twitter URL', 'rocket' )   => '#',
						esc_html__( 'LinkedIn URL', 'rocket' ) => '#',
						esc_html__( 'Google+ URL', 'rocket' ) => '#',
						esc_html__( 'Instagram URL', 'rocket' ) => '#',
						esc_html__( 'Github URL', 'rocket' ) => '#',
						esc_html__( 'VK URL', 'rocket' ) => '',
						esc_html__( 'YouTube URL', 'rocket' ) => '',
						esc_html__( 'Pinterest URL', 'rocket' ) => '',
						esc_html__( 'Tumblr URL', 'rocket' ) => '',
						esc_html__( 'Dribbble URL', 'rocket' ) => '',
						esc_html__( 'Vimeo URL', 'rocket' ) => '',
						esc_html__( 'Flickr URL', 'rocket' ) => '',
						esc_html__( 'Yelp URL', 'rocket' ) => '',
					),
				),
				array(
					'id'        => 'rocked__notice-social-styling',
					'type'      => 'info',
					'style'     => 'warning',
					'icon'      => 'el el-brush',
					'title'     => esc_html__('Styling', 'rocket'),
					'desc'      => esc_html__('The following styles affect on Social Links in Footer except 404 page.', 'rocket')
				),
				array(
					'id'        => 'rocket__custom_social-media',
					'type'      => 'switch',
					'title'     => esc_html__('Enable advanced styling?', 'rocket'),
					'subtitle'  => esc_html__('Add additional styling options.', 'rocket'),
					'desc'      => esc_html__('Turn on to change colors, borders, link etc. for the Social Media Links.', 'rocket'),
					'default'   => false,
					'on'        => esc_html__( 'Yes', 'rocket' ),
					'off'       => esc_html__( 'No', 'rocket' ),
				),
				array(
					'id'        => 'rocket__opt-social-media-style',
					'type'      => 'select',
					'title'     => esc_html__('Footer Social Media Icons Style', 'rocket'),
					'subtitle'  => esc_html__('Select the Social Media Icons style.', 'rocket'),
					'options'   => array(
						'rounded'  => 'Rounded Icons',
						'squared' => 'Squared Icons',
					),
					'default'   => 'rounded',
					'required'  => array('rocket__custom_social-media', '=', '1'),
				),
				array(
					'id'       => 'rocket__opt-footer-link-icon-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Footer Social Icon Color', 'rocket' ),
					'subtitle' => esc_html__( 'Color for Social Icons in Footer.', 'rocket' ),
					'active'    => false,
					'output'   => array( '.footer-social-links > li > a' ),
					'default'  => array(
						'regular' => '#fff',
						'hover'   => '#fff',
					),
					'required'  => array('rocket__custom_social-media', '=', '1'),
				),
				array(
					'id'                    => 'rocket__opt-footer-social-bg',
					'type'                  => 'background',
					'output'                => array('.footer-social-links > li > a'),
					'title'                 => esc_html__('Footer Social Icons Background Color', 'rocket'),
					'subtitle'              => esc_html__('Background color for Social Icons in Footer.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => 'transparent',
					),
					'required'              => array('rocket__custom_social-media', '=', '1'),
				),

				array(
					'id'                    => 'rocket__opt-footer-social-bg-hover',
					'type'                  => 'background',
					'output'                => array('.footer-social-links > li > a:hover'),
					'title'                 => esc_html__('Footer Social Icons Background on hover ', 'rocket'),
					'subtitle'              => esc_html__('Background color for Social Icons in Footer.', 'rocket'),
					'preview'               => false,
					'background-size'       => false,
					'background-repeat'     => false,
					'background-attachment' => false,
					'background-position'   => false,
					'background-image'      => false,
					'default'               => array(
						'background-color' => '#ff7149',
					),
					'required'              => array('rocket__custom_social-media', '=', '1'),
				),

				array(
					'id'       => 'rocket__opt-footer-social-links-border',
					'type'     => 'border',
					'title'    => esc_html__( 'Footer Social Icons Border', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for Social Icons in Footer.', 'rocket' ),
					'output'   => array( '.footer-social-links > li > a' ),
					'default'  => array(
						'border-color'  => '#b59ecf',
						'border-style'  => 'solid',
						'border-top'    => '2px',
						'border-right'  => '2px',
						'border-bottom' => '2px',
						'border-left'   => '2px'
					),
					'required' => array('rocket__custom_social-media', '=', '1'),
				),

				array(
					'id'       => 'rocket__opt-footer-social-links-border-hover',
					'type'     => 'border',
					'title'    => esc_html__( 'Footer Social Icons Border on hover', 'rocket' ),
					'subtitle' => esc_html__( 'Border options for Social Icons on hover in Footer.', 'rocket' ),
					'output'   => array( '.footer-social-links > li > a:hover' ),
					'default'  => array(
						'border-color'  => '#ff7149',
						'border-style'  => 'solid',
						'border-top'    => '2px',
						'border-right'  => '2px',
						'border-bottom' => '2px',
						'border-left'   => '2px'
					),
					'required' => array('rocket__custom_social-media', '=', '1'),
				),
			)
		) );


		// Custom CSS
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Custom CSS', 'rocket' ),
			'id'     => 'rocket__section-custom-css',
			'icon'   => 'el el-css',
			'fields' => array(
				array(
					'id'        => 'rocket__opt-custom-css',
					'type'      => 'ace_editor',
					'title'     => esc_html__('CSS Code', 'rocket'),
					'subtitle'  => esc_html__('Paste your CSS code here.', 'rocket'),
					'mode'      => 'css',
					'theme'     => 'monokai',
					'desc'      => 'Any custom CSS can be added here, it will override the theme CSS.',
					'default'   => ""
				),
			)
		) );

		if ( file_exists( get_template_directory() .'/readme.txt')) {
			Redux::setSection( $opt_name, array(
			'icon'      => 'el-icon-list-alt',
			'title'     => esc_html__('Theme Information', 'rocket'),
			'fields'    => array(
				array(
					'id'        => '17',
					'type'      => 'raw',
					'markdown'  => true,
					'content'   => file_get_contents( get_template_directory() . '/readme.txt')
				),
			),
		) );
		}

		/*
		 * <--- END SECTIONS
		 */
