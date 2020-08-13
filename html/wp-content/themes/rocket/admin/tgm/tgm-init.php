<?php

/**
 * TGM Init Class
 */

include_once get_template_directory() . '/admin/tgm/class-tgm-plugin-activation.php';

function rocket_register_required_plugins() {

	$plugins = array(
		array(
			'name' 	   => 'Redux Framework',
			'slug' 	   => 'redux-framework',
			'required' => true,
		),
		array(
			'name' 	   => 'Max Mega Menu',
			'slug' 	   => 'megamenu',
			'required' => true,
		),
		array(
			'name'      => 'DF Custom Post Types',
			'slug'      => 'df-custom-post-types',
			'source'    => 'https://danfisher-bucket-2.s3.eu-west-3.amazonaws.com/rocket/plugins/YLgaW3Xr/df-custom-post-types.zip',
			'required'  => true,
			'version'   => '1.1.0'
		),
		array(
			'name'      => 'Price Tables',
			'slug'      => 'pricetable',
			'source'    => 'https://danfisher-bucket-2.s3.eu-west-3.amazonaws.com/rocket/plugins/YLgaW3Xr/pricetable.zip',
			'required'  => true,
			'version'   => '0.2.4'
		),
		array(
			'name' 		  => 'Contact Form 7',
			'slug' 		  => 'contact-form-7',
			'required' 	=> true,
		),
		array(
			'name' 		  => 'WooCommerce',
			'slug' 		  => 'woocommerce',
			'required' 	=> false,
		),
		array(
			'name'      => 'WPBakery Page Builder',
			'slug'      => 'js_composer',
			'source'    => 'https://danfisher-bucket-2.s3.eu-west-3.amazonaws.com/rocket/plugins/YLgaW3Xr/js_composer.zip',
			'required'  => true,
			'version'   => '6.1'
		),
		array(
			'name'      => 'Slider Revolution',
			'slug'      => 'revslider',
			'source'    => 'https://danfisher-bucket-2.s3.eu-west-3.amazonaws.com/rocket/plugins/YLgaW3Xr/revslider.zip',
			'required'  => true,
			'version'   => '6.2.2'
		),
		array(
			'name'      => 'Visual Composer Maced Google Maps',
			'slug'      => 'visual-composer-maced-google-maps',
			'source'    => 'https://github.com/danfisher85/visual-composer-maced-google-maps/archive/v1.2.9.zip',
			'required'  => true,
			'version'   => '1.2.9'
		),
		array(
			'name' 		  => 'Easy Custom Sidebars',
			'slug' 		  => 'easy-custom-sidebars',
			'required' 	=> false,
		),
	);

	$config = array(
		'id'           => 'rocket',                // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',				   	           // Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'rocket_register_required_plugins' );
