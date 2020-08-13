<?php
/**
 * Rocket functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Rocket
 */

if ( ! function_exists( 'rocket_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rocket_setup() {

	/*
	 * Add Redux Framework
	 */
	if ( class_exists('ReduxFrameworkPlugin') ) {
		require get_template_directory() . '/admin/admin-init.php';
	}


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rocket, use a find and replace
	 * to change 'rocket' to the name of your theme in all the template files
	 */
	$locale = apply_filters( 'plugin_locale', get_locale(), 'rocket' );
	load_textdomain( 'rocket', WP_LANG_DIR . '/rocket-$locale.mo' );
	load_theme_textdomain( 'rocket', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for WooCommerce
	 */
	add_theme_support( 'woocommerce' );
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 370, 270, true ); // Normal post thumbnails
	add_image_size('rocket_post-thumbnail-lg', 870, 500, true); // Large post thumbnails
	add_image_size('rocket_post-thumbnail-widget', 270, 184, true); // Recent Post thumbnails
	add_image_size('rocket_portfolio-thumbnail', 770, 530, true); // Portfolio thumbnails
	add_image_size('rocket_portfolio-thumbnail-n', 389, 384, true); // Portfolio base thumbnails
	add_image_size('rocket_thumbnail-sm', 100, 100, true); // Thumbnail Small
	add_image_size('rocket_thumbnail-md', 170, 170, true); // Thumbnail Medium

	// This theme uses wp_nav_menu() in 2 locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'rocket' ),
		'onepage' => esc_html__( 'One Page', 'rocket' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif; // rocket_setup
add_action( 'after_setup_theme', 'rocket_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rocket_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rocket_content_width', 640 );
}
add_action( 'after_setup_theme', 'rocket_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rocket_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rocket' ),
		'id'            => 'rocket-sidebar',
		'description'   => esc_html__( 'Main Sidebar that appears on posts, pages, archives.', 'rocket' ),
		'before_widget' => '<aside id="%1$s" class="widget widget__sidebar %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title title-bordered border__solid"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'rocket' ),
		'id'            => 'rocket-footer-widget-1',
		'description'   => esc_html__( '1st Footer Widget Area.', 'rocket' ),
		'before_widget' => '<aside id="%1$s" class="widget widget__footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title title-bordered border__solid"><h4>',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'rocket' ),
		'id'            => 'rocket-footer-widget-2',
		'description'   => esc_html__( '2nd Footer Widget Area', 'rocket' ),
		'before_widget' => '<aside id="%1$s" class="widget widget__footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title title-bordered border__solid"><h4>',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'rocket' ),
		'id'            => 'rocket-footer-widget-3',
		'description'   => esc_html__( '3rd Footer Widget Area', 'rocket' ),
		'before_widget' => '<aside id="%1$s" class="widget widget__footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title title-bordered border__solid"><h4>',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'rocket' ),
		'id'            => 'rocket-footer-widget-4',
		'description'   => esc_html__( '4th Footer Widget Area', 'rocket' ),
		'before_widget' => '<aside id="%1$s" class="widget widget__footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title title-bordered border__solid"><h4>',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'rocket_widgets_init' );

function rocket_woo_widgets_init() {
	// Woocommerce Shop Sidebar
	if( rocket_woo_exists() == true ){
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'rocket' ),
			'id'            => 'rocket-shop-sidebar',
			'description'   => esc_html__( 'Shop Sidebar that appears on Shope Archive and Single Product pages.', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget widget__sidebar %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title title-bordered border__solid"><h3>',
			'after_title'   => '</h3></div>',
		));
	}
}
add_action( 'widgets_init', 'rocket_woo_widgets_init' );


/*
 * This theme styles the visual editor to resemble the theme style,
 * specifically font, colors, icons, and column width.
 */
add_editor_style( array( 'css/editor-style.css') );

/**
 * Enqueue scripts and styles.
 */
if(!function_exists('rocket_scripts')) {
	function rocket_scripts() {
		global $post;

		// Register Styles
		wp_register_style( 'owl-carousel', get_template_directory_uri() . '/vendor/owl-carousel/assets/owl.carousel.css', array(), false );
		wp_register_style( 'vc-carousel', get_template_directory_uri() . '/vendor/js_composer/assets/lib/vc_carousel.min.css', array(), false );

		// Enqueue Styles
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.css', array(), false );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), false );
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css', array(), false );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css', '4.5.0', array(), false );

		/* If using a child theme, auto-load the parent theme style. */
    if ( is_child_theme() ) {
      wp_enqueue_style( 'rocket-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css' );
    }
    /* Always load active theme's style.css. */
    wp_enqueue_style( 'rocket_style', get_stylesheet_uri(), array(), false );

		// Register Scripts
		wp_register_script( 'flickr-feed', get_template_directory_uri() . '/vendor/jquery.flickrfeed.js', array('jquery'), '1.1', true );
		wp_register_script( 'jcountdown', get_template_directory_uri() . '/vendor/jcountdown/jquery.jcountdown.js', array('jquery'), '1.0.0', true );
		if ( is_page_template( 'template-coming-soon.php' ) || is_page_template( 'template-under-construction.php' ) ) {
			wp_enqueue_script('jcountdown');
		}
		wp_register_script( 'appear', get_template_directory_uri() . '/vendor/jquery.appear.js', array('jquery'), '0.3.6', true );
		wp_register_script( 'count-to', get_template_directory_uri() . '/vendor/jquery.countTo.js', array('jquery'), '1.0.0', true );
		wp_register_script( 'count-to-init', get_template_directory_uri() . '/vendor/jquery.countToInit.js', array('count-to'), '1.0.0', true );
		wp_register_script( 'count-to-init-counter', get_template_directory_uri() . '/vendor/jquery.countToInit-counter.js', array('count-to'), '1.0.0', true );
		wp_register_script( 'owl-carousel', get_template_directory_uri() . '/vendor/owl-carousel/owl.carousel.min.js', array(), '2.0.0', true );

		// Enqueue Scripts
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/vendor/bootstrap/bootstrap-scripts.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'easing', get_template_directory_uri() . '/vendor/jquery.easing.1.3.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/vendor/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'scroll-to', get_template_directory_uri() . '/vendor/jquery.scrollTo.min.js', array('jquery'), '2.1.0', true );
		wp_enqueue_script( 'local-scroll', get_template_directory_uri() . '/vendor/jquery.localScroll.min.js', array('jquery'), '1.4.0', true );
		wp_enqueue_script( 'viewport', get_template_directory_uri() . '/vendor/jquery.viewport.mini.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'rocket_scripts-init', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );

		// Conditional styles and scripts

		// Load Carousel styles and scripts if carousel-based shortcodes used
		if ( is_page() && (( preg_match( '#\[ *rocket_partners_carousel([^\]])*\]#i', $post->post_content )) || ( preg_match( '#\[ *rocket_team_carousel([^\]])*\]#i', $post->post_content )))) {
			wp_enqueue_style('owl-carousel');
			wp_enqueue_script('owl-carousel');
		}

		// Load Carousel styles and scripts if carousel-based shortcodes used
		if ( is_page() && ( preg_match( '#\[ *vc_images_carousel([^\]])*\]#i', $post->post_content )) ) {
			wp_enqueue_style('vc-carousel');
		}

		// Add styles if WooCommerce installed
		if( rocket_woo_exists() == true) {
			wp_enqueue_style( 'woocommerce-layout', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce-layout.css', array(), false);
			wp_enqueue_style( 'woocommerce-smallscreen', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce-smallscreen.css', array(), 'screen');
			wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css', array(), false);
		}
		// Add styles if Visual Composer installed
		if( rocket_vc_exists() == true) {
			wp_enqueue_style( 'js_composer', get_template_directory_uri() . '/css/js_composer.css', array(), false);
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'rocket_scripts' );
}

// Load Carousel scripts for Recent Posts Widget (hooked in inc/widgets/widget-recent-posts.php by wp_enqueue_scripts)
if(!function_exists('rocket_carousel_widget_load')) {
	function rocket_carousel_widget_load () {
		wp_enqueue_style('owl-carousel');
		wp_enqueue_script('owl-carousel');
	}
}


/**
 * Site Icon (favicon WP 4.3+)
 */
if(!function_exists('rocket_wp_site_icon')) {
	function rocket_wp_site_icon() {
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			echo '<link rel="shortcut icon" href="' . esc_url( get_template_directory_uri() ) . '/images/favicon.ico" type="image/x-icon" />' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="' . esc_url( get_template_directory_uri() ) .'/images/favicon-120.png">' . "\n";
			echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="' . esc_url( get_template_directory_uri() ) . '/images/favicon-152.png">' . "\n";
		}
	}
}
add_action('wp_head', 'rocket_wp_site_icon');



/**
 * Page Preloader
 */
if ( ! function_exists('rocket_page_preloader')) {
	function rocket_page_preloader() {
		$rocket_data = get_option('rocket_data');

		// Check if Preloader enabled
		if ( $rocket_data['rocket__opt-pageloader'] ) { ?>
		<div class="page-loader">
			<div class="loader-inner">
				<div class="dot1"></div>
	  		<div class="dot2"></div>
			</div>
		</div>
		<?php }
	}
}
add_action( 'rocket_before_body_content', 'rocket_page_preloader' );


/**
 * Back to Top
 */
if ( ! function_exists('rocket_back_to_top_btn')) {
	function rocket_back_to_top_btn() {

		if ( ! is_404() && ! is_page_template('template-coming-soon.php') && ! is_page_template('template-under-construction.php') ) :
			$rocket_data   = get_option('rocket_data');
			$back_to_top   = '';
			$contact_btn   = '';
			$contact_pages = array();
			$contact_url   = '';

			$contact_txt           = esc_html__( 'Contact Us', 'rocket' );
			$back_to_top           = $rocket_data['rocket__opt-back-to-top'];
			$contact_btn           = $rocket_data['rocket__opt-contact-btn'];
			$contact_btn_all_pages = $rocket_data['rocket__opt-contact-btn-all-pages'];

			if ( isset( $rocket_data['rocket__opt-contact-btn-pages'] )) {
				$contact_pages = $rocket_data['rocket__opt-contact-btn-pages'];
			}

			$contact_url   = $rocket_data['rocket__opt-contact-btn-link'];
			$contact_txt   = $rocket_data['rocket__opt-contact-btn-txt']; ?>

			<div id="back-top" class="back-top">

				<?php if ( $back_to_top != false ) : ?>
					<div class="link-holder scroll-local">
						<a href="#top" id="back-to-top-btn" class="top-link"><i class="fa fa-chevron-up"></i></a>
					</div>
				<?php endif; ?>

				<?php if ( $contact_btn_all_pages ) : ?>
					<div class="link-holder scroll-local">
						<a href="<?php echo esc_url( $contact_url ); ?>" id="email-contact-btn" class="contacts-link" data-toggle="tooltip" data-placement="left" title="<?php echo esc_attr( $contact_txt ); ?> "><i class="fa fa-envelope"></i></a>
					</div>
				<?php else : ?>
					<?php if ( $contact_btn != false && !empty($contact_pages) ) :
						foreach( $contact_pages as $key => $value){
							if ( is_page( $value )) { ?>

								<div class="link-holder scroll-local">
									<a href="<?php echo esc_url( $contact_url ); ?>" id="email-contact-btn" class="contacts-link" data-toggle="tooltip" data-placement="left" title="<?php echo esc_attr( $contact_txt ); ?> "><i class="fa fa-envelope"></i></a>
								</div>

							<?php }
						}
					endif; ?>
				<?php endif; ?>

			</div>
		<?php endif;
	}
}
add_action( 'wp_footer', 'rocket_back_to_top_btn', 99 );



/**
 * TGM alert styling fix
 */
if ( ! function_exists( 'rocket_custom_admin_css' ) ) {
	function rocket_custom_admin_css(){
		if( is_admin() ) {
			wp_enqueue_style( 'rocket_custom_admin', get_template_directory_uri(). '/admin/assets/css/df-admin.css', false, false);
		}
	}
}
add_action( 'admin_enqueue_scripts', 'rocket_custom_admin_css' );




/**
 * Included Plugins
 */

// Metaboxes
include_once get_template_directory() . '/inc/metaboxes/metaboxes.php';



/**
 * Custom Theme Functions
 */

// Share icons
include get_template_directory() . '/inc/functions/sharebox.php';

// WooCommerce Custom Functions
function rocket_woo_exists() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php');
	if ( is_plugin_active('woocommerce/woocommerce.php') ) {
		return true;
	}
	else {
		return false;
	}
}
if ( rocket_woo_exists() == true) {
	include get_template_directory() . '/inc/functions/woocommerce-functions.php';
}

// WPML Custom Functions
function rocket_wpml_exists() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php');
	if ( is_plugin_active('sitepress-multilingual-cms/sitepress.php') ) {
		return true;
	}
	else {
		return false;
	}
}


// Visual Composer Functions
function rocket_vc_exists() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php');
	if ( is_plugin_active('js_composer/js_composer.php')) {
	 return true;
	}
	else {
		return false;
	}
}

// Include Visual Composer custom functions
if( rocket_vc_exists() == true) {
	include get_template_directory() . '/inc/functions/vc-functions.php';

	add_action('wp_enqueue_scripts', 'rocket_vc_dequeue_function');
	function rocket_vc_dequeue_function() {
		wp_dequeue_style( array('js_composer_front', 'js_composer_front-css') );
		wp_deregister_style( array('js_composer_front', 'js_composer_front-css') );
	}
}

// Revolution Slider as theme
if ( function_exists( 'set_revslider_as_theme' )) {
	add_action( 'init', 'rocket__rev_setastheme' );
	function rocket__rev_setastheme() {
		set_revslider_as_theme();
	}
}


/**
 * Custom Widgets
 */

// Flickr Widget
include get_template_directory() . '/inc/widgets/widget-flickr.php';

// Recent Post (Slider) Widget
include get_template_directory() . '/inc/widgets/widget-recent-posts.php';

/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';

/**
 * Load theme styling
 */
require_once get_template_directory() . '/inc/custom-styling.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Update and Activation
 */
require get_template_directory() . '/admin/update/update-base.php';
require get_template_directory() . '/admin/update/update.php';
