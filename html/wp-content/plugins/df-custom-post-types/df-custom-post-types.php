<?php
/*
Plugin Name: DF Custom Post Types
Plugin URI: http://themeforest.net/user/dan_fisher/portfolio
Description: This plugin creates a custom post types (Portfolio, Team, Partners) for the Rocket WordPress Theme.
Version: 1.1.0
Author: Dan Fisher
Author URI: http://themeforest.net/user/dan_fisher
Text Domain: df-custom-post-types
License: GPLv2
*/

/**
 * Register Portfolio Custom Post Type
 */
add_action('init', 'rocket_portfolio_custom_init');

function rocket_portfolio_custom_init(){

	global $rocket_data;

	if(isset($rocket_data['rocket__opt-portfolio-slug'])){
		$portfolio_slug = $rocket_data['rocket__opt-portfolio-slug'];
	} else {
		$portfolio_slug = 'project';
	}

	// Initialize Portfolio Custom Type Labels
	$labels = array(
		'name'               => _x('Portfolio', 'post type general name', 'rocket'),
		'singular_name'      => _x('Project', 'post type singular name', 'rocket'),
		'add_new'            => _x('Add New', 'Project', 'rocket'),
		'add_new_item'       => __('Add New Project', 'rocket'),
		'edit_item'          => __('Edit Project', 'rocket'),
		'new_item'           => __('New Project', 'rocket'),
		'view_item'          => __('View Project', 'rocket'),
		'search_items'       => __('Search Projects', 'rocket'),
		'not_found'          => __('No projects found', 'rocket'),
		'not_found_in_trash' => __('No projects found in Trash', 'rocket'),
		'parent_item_colon'  => '',
		'menu_name'          => __('Portfolio', 'rocket'),
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array( "slug" => $portfolio_slug ),
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-format-gallery',
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'comments'
		)
	);
	register_post_type( 'portfolio', $args );

	// Initialize New Categories Labels
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'category general name', 'rocket' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'rocket' ),
		'search_items'      => __( 'Search Category', 'rocket' ),
		'all_items'         => __( 'All Categories', 'rocket' ),
		'parent_item'       => __( 'Parent Category', 'rocket' ),
		'parent_item_colon' => __( 'Parent Category:', 'rocket' ),
		'edit_item'         => __( 'Edit Category', 'rocket' ),
		'update_item'       => __( 'Update Category', 'rocket' ),
		'add_new_item'      => __( 'Add New Category', 'rocket' ),
		'new_item_name'     => __( 'New Category Name', 'rocket' ),
	);

	// Custom taxonomy for Project Categories
	register_taxonomy( 'catportfolio', array('portfolio'), array(
		'hierarchical' => true,
		'public'       => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array(
			'slug' => 'cat-portfolio'
		),
	));

	// Initialize New Tags Labels
	$labels = array(
		'name'              => _x( 'Tags', 'taxonomy general name', 'rocket' ),
		'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'rocket' ),
		'search_items'      => __( 'Search Types', 'rocket' ),
		'all_items'         => __( 'All Tags', 'rocket' ),
		'parent_item'       => __( 'Parent Tag', 'rocket' ),
		'parent_item_colon' => __( 'Parent Tag:', 'rocket' ),
		'edit_item'         => __( 'Edit Tags', 'rocket' ),
		'update_item'       => __( 'Update Tag', 'rocket' ),
		'add_new_item'      => __( 'Add New Tag', 'rocket' ),
		'new_item_name'     => __( 'New Tag Name', 'rocket' ),
	);

	// Custom taxonomy for Project Tags
	register_taxonomy( 'tagportfolio', array('portfolio'), array(
		'hierarchical' => true,
		'public'       => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array(
			'slug' => 'tag-portfolio'
		),
	));

}

// Portfolio Custom Post Type meta box
add_action('admin_init','rocket_portfolio_meta_init');

function rocket_portfolio_meta_init() {
	// add a meta box for WordPress 'project' type
	add_meta_box(
		'portfolio_meta',
		'Project Info',
		'project',
		'side',
		'low'
	);
	// add a callback function to save any data a user enters in
	add_action('save_post','rocket_portfolio_meta_save');
}

function rocket_portfolio_meta_save($post_id) {
	// check nonce
	if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)){
		return $post_id;
	}
	// check capabilities
	if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
	}
	// exit on autosave
	if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
	}
	if(isset($_POST['_url'])) {
		update_post_meta($post_id, '_url', $_POST['_url']);
	} else {
		delete_post_meta($post_id, '_url');
	}
}



/**
 * Register Team Custom Post Type
 */
add_action('init', 'rocket_team_custom_init');

function rocket_team_custom_init(){

	global $rocket_data;
	if ( isset( $rocket_data['rocket__opt-team-slug'] ) ) {
		$team_slug = $rocket_data['rocket__opt-team-slug'];
	} else {
		$team_slug = "member";
	}

	$labels = array(
		'name'               => _x('Team', 'post type general name', 'rocket'),
		'singular_name'      => _x('Member', 'post type singular name', 'rocket'),
		'add_new'            => _x('Add New', 'Team' ,'rocket'),
		'add_new_item'       => __('Add New Team member', 'rocket'),
		'edit_item'          => __('Edit team member', 'rocket'),
		'new_item'           => __('New team member', 'rocket'),
		'view_item'          => __('View team member', 'rocket'),
		'search_items'       => __('Search team member', 'rocket'),
		'not_found'          => __('No team member found', 'rocket'),
		'not_found_in_trash' => __('No team member found in Trash', 'rocket'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Team'
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array(
			'slug' => $team_slug
		),
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-businessman',
		'supports'      => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		)
	);
	register_post_type('Team', $args);

	// Initialize New Taxonomy Labels for Team Categories
	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'rocket' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'rocket' ),
		'search_items'      => __( 'Search Groups', 'rocket' ),
		'all_items'         => __( 'All Groups', 'rocket' ),
		'parent_item'       => __( 'Parent Group', 'rocket' ),
		'parent_item_colon' => __( 'Parent Group:', 'rocket' ),
		'edit_item'         => __( 'Edit Groups', 'rocket' ),
		'update_item'       => __( 'Update Group', 'rocket' ),
		'add_new_item'      => __( 'Add New Group', 'rocket' ),
		'new_item_name'     => __( 'New Group Name', 'rocket' ),
	);

	// Custom taxonomy for Team
	register_taxonomy('teamgroups',array('team'), array(
		'hierarchical' => true,
		'public'       => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array(
			'slug' => 'team-group'
		),
	));

}



/**
 * Register Partners Custom Post Type
 */
add_action('init', 'rocket_partners_custom_init');

function rocket_partners_custom_init(){
	$labels = array(
		'name'               => _x('Partners', 'post type general name', 'rocket'),
		'singular_name'      => _x('Partner', 'post type singular name', 'rocket'),
		'add_new'            => _x('Add New', 'partner', 'rocket'),
		'add_new_item'       => __('Add New Partner', 'rocket'),
		'edit_item'          => __('Edit Partner', 'rocket'),
		'new_item'           => __('New Partner', 'rocket'),
		'view_item'          => __('View Partner', 'rocket'),
		'search_items'       => __('Search Partners', 'rocket'),
		'not_found'          => __('No Partners found', 'rocket'),
		'not_found_in_trash' => __('No Partners found in Trash', 'rocket'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Partners'
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'query_var'     => true,
		'rewrite'       => array(
			'slug' => 'partners'
		),
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-groups',
		'supports'      => array(
			'title',
			'excerpt',
			'thumbnail'
		)
	);
	register_post_type('partners', $args);

	// Initialize New Taxonomy Labels for Partners Custom Post Type
	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'rocket' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'rocket' ),
		'search_items'      => __( 'Search Groups', 'rocket' ),
		'all_items'         => __( 'All Groups', 'rocket' ),
		'parent_item'       => __( 'Parent Group', 'rocket' ),
		'parent_item_colon' => __( 'Parent Group:', 'rocket' ),
		'edit_item'         => __( 'Edit Groups', 'rocket' ),
		'update_item'       => __( 'Update Group', 'rocket' ),
		'add_new_item'      => __( 'Add New Group', 'rocket' ),
		'new_item_name'     => __( 'New Group Name', 'rocket' ),
	);

	// Custom taxonomy for Partners
	register_taxonomy('groups',array('partners'), array(
		'hierarchical' => true,
		'public'       => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array(
			'slug' => 'partners-group'
		),
	));
}
