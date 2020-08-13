<?php

$rocket_data = get_option('rocket_data');

if ( get_option( 'woo_first_activation' ) == false ){
	add_option( 'woo_first_activation', 'hotcake', '', 'no' );
}

if ( rocket_woo_exists() == true && get_option( 'woo_first_activation' ) !== 'activated' ) add_action( 'init', 'rocket_woocommerce_defaults', 1 );

/**
 * Define image sizes
 */
function rocket_woocommerce_defaults() {

  $catalog = array(
		'width' 	=> '264',	// px
		'height'	=> '314',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '424',	// px
		'height'	=> '544',	// px
		'crop'		=> 0 		// true
	);

	$thumbnail = array(
		'width' 	=> '104',	// px
		'height'	=> '104',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		  // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	update_option( 'woocommerce_frontend_css', false);
	update_option( 'woocommerce_enable_lightbox', false);
	update_option( 'woocommerce_single_image_crop', 'no');

	update_option( 'woo_first_activation', 'activated' );

}

// define the woocommerce_before_main_content callback
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Remove Breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Remove Sidebar from WooCommerce
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);



// Woocommerce share buttons
function rocket_wooshare(){
	echo rocket_share_box();
}
add_action( 'woocommerce_single_product_summary', 'rocket_wooshare', 10 );


// Change position of Meta information on Single Product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 10 );


// Add horizontal rule after Single Product tabs
function rocket_hr_single_product() {
	echo '<div class="hr-alt"></div>';
}
add_action( 'woocommerce_after_single_product_summary', 'rocket_hr_single_product', 15 );






// WooCommerce Product

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
/**
 * WooCommerce Loop Product Thumbs
 **/
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	}
}
/**
 * WooCommerce Product Thumbnail
 **/
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {

		global $post;

		if ( has_post_thumbnail() ) {

			$image_title 	 = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  	 = wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	 = get_the_post_thumbnail( $post->ID, apply_filters( 'product_loop_catalog_thumbnail_size', 'shop_catalog' ), array(
				'title'	=> $image_title,
				'alt'	  => $image_title,
				'class' => 'thumbnail'
				) );
			$product_link  = get_the_permalink();
			$product_title = get_the_title();

			echo apply_filters( 'woocommerce_product_loop_image_html', sprintf( '<figure class="product-thumbnail"><a href="%s">%s</a><span class="product-btn-group"><a href="%s" class="btn btn-primary btn-single-icon product-popup magnific-popup-link" title="%s"><i class="fa fa-plus"></i></a><a href="%s" class="btn btn-primary btn-single-icon product-link"><i class="fa fa-link"></i></a></span></figure>', $product_link, $image, $image_link, $product_title, $product_link ), $post->ID );

		} elseif ( wc_placeholder_img_src() ) {

			$product_link  = get_the_permalink();

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<figure class="product-thumbnail product-thumbnail__placeholder"><a href="%s"><img src="%s" alt="%s" class="thumbnail" /></a></figure>', $product_link, wc_placeholder_img_src(), esc_html__( 'Placeholder', 'rocket' ) ), $post->ID );
		}

	}
}

// Remove a link wrapping product thumbnail and data
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// Add Wrapper to Product Info
function rocket_wrap_before_product_desc() {
	echo '<div class="product-info">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'rocket_wrap_before_product_desc', 10);

function rocket_wrap_after_product_desc() {
	echo '</div>';
}
add_action( 'woocommerce_shop_loop_item_title', 'rocket_wrap_after_product_desc', 20);



// Removing 'Add to Cart' button from Product
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Adding 'Add to Cart' to Product Title
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15);


// Adding wrapper for Product price and rating
function rocket_wrap_before_product_footer() {
	echo '<footer class="product-footer">';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'rocket_wrap_before_product_footer', 5);

function rocket_wrap_after_product_footer() {
	echo '</footer>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'rocket_wrap_after_product_footer', 20);


// Move Product rating position after price
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );


// Change default placeholder image
add_filter( 'woocommerce_placeholder_img_src', 'rocket_custom_woocommerce_placeholder', 10 );
function rocket_custom_woocommerce_placeholder( $image_url ) {
  $image_url = get_template_directory_uri() . '/images/placeholder-264x314.jpg';
  return $image_url;
}




// Set the shop layout
add_filter( 'loop_shop_columns', 'rocket_woo_product_columns_frontend' );
function rocket_woo_product_columns_frontend() {
	global $woocommerce;
	$rocket_data = get_option('rocket_data');

	// Default Value also used for categories and sub_categories
	$columns = $rocket_data['rocket__shop-columns'];

	// Product List
	if ( is_product_category() ) :
		$columns = $rocket_data['rocket__shop-columns'];
	endif;

	// Related Products
	if ( is_product() ) :
		$columns = $rocket_data['rocket__shop-columns'];
	endif;

	// Cross Sells
	if ( is_checkout() ) :
		$columns = $rocket_data['rocket__shop-columns'];
	endif;

	return $columns;
}

// Add class to body depends on shop layout
add_filter( 'body_class', 'rocket_woo_shop_body_class' );
function rocket_woo_shop_body_class( $classes ) {
	global $woocommerce;
	$rocket_data = get_option('rocket_data');

	// Default Value also used for categories and sub_categories
	if ( is_shop() ) :
		$classes[] = 'columns-' . $rocket_data['rocket__shop-columns'];
	endif;

	// Product List
	if ( is_product_category() ) :
		$classes[] = 'columns-' . $rocket_data['rocket__shop-columns'];
	endif;

	// Related Products
	if ( is_product() ) :
		$classes[] = 'columns-' . $rocket_data['rocket__shop-related-columns'];
	endif;

	// Cross Sells
	if ( is_checkout() ) :
		$classes[] = 'columns-' . $rocket_data['rocket__shop-columns'];
	endif;

	return $classes;
}


// Set the number of item to show per page
add_filter( 'loop_shop_per_page', 'rocket_woo_product_perpage');
function rocket_woo_product_perpage() {
	$rocket_data = get_option('rocket_data');
	if( !isset($rocket_data["rocket__shop-per-page"])){
		$rocket_data["rocket__shop-per-page"] = 12;
		return $rocket_data["rocket__shop-per-page"];
	}
	else{
		return $rocket_data["rocket__shop-per-page"];
	}
}

// Shop
function rocket_shop_filter_begin() {
	$output = '<button class="btn btn-link filter-trigger" id="filterTrigger" data-toggle="collapse" data-target="#filterWrapper" aria-expanded="false" aria-controls="filterWrapper" data-text-swap="' . esc_html__('Hide Options', 'rocket') . '"><i class="fa fa-toggle-off"></i><span>' . esc_html__('Open Options', 'rocket') . '</span></button>';
	$output .= '<div class="filter-wrapper collapse" id="filterWrapper">';
	$output .= '<div class="gap-30"></div><div class="clearfix">';
	echo !empty( $output ) ? $output : '';
}
add_action ( 'woocommerce_before_shop_loop', 'rocket_shop_filter_begin', 10 );

function rocket_shop_filter_end() {
	$output  = '</div>';
	$output .= '</div>';
	$output .= '<hr>';
	echo !empty( $output ) ? $output : '';
}
add_action ( 'woocommerce_before_shop_loop', 'rocket_shop_filter_end', 50 );


// Change arrows for pagination
add_filter( 'woocommerce_pagination_args', 	'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {

	$args['prev_text'] = '<i class="fa fa-angle-left"></i>';
	$args['next_text'] = '<i class="fa fa-angle-right"></i>';

	return $args;
}


// Related Products
function woo_related_products_limit() {
  global $product, $rocket_data;

	$args['posts_per_page'] = $rocket_data['rocket__shop-related-per-page'];
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$rocket_data = get_option('rocket_data');

	$args['posts_per_page'] = $rocket_data['rocket__shop-related-per-page'];
	$args['columns'] = $rocket_data['rocket__shop-related-columns'];
	return $args;
}


// Cart Page
function rocket_woo_before_cart_table() {
	echo '<div class="table-responsive shop_table_wrapper">';
}
add_action ( 'woocommerce_before_cart_table', 'rocket_woo_before_cart_table', 0 );

function rocket_woo_after_cart_table() {
	echo '</div>';
}
add_action ( 'woocommerce_after_cart_table', 'rocket_woo_after_cart_table', 100 );

// Ajaxify cart in the Header
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {

	ob_start();
	?>
	<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'rocket' ); ?>">
	<span class="cart-total visible-md-inline-block visible-lg-inline-block"><?php echo WC()->cart->get_cart_total(); ?></span>
	<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
	<span class="cart-number visible-md-inline-block visible-lg-inline-block"><?php echo sprintf ('%d', WC()->cart->cart_contents_count, WC()->cart->cart_contents_count ); ?></span>
	</a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}


// Woocommerce Account
function rocket_woocommerce_account_navigation() {
	echo '<div class="row">';
}
add_action ( 'woocommerce_account_navigation', 'rocket_woocommerce_account_navigation', 0 );

function rocket_woocommerce_before_account_navigation() {
	echo '<div class="col-md-3">';
}
add_action ( 'woocommerce_before_account_navigation', 'rocket_woocommerce_before_account_navigation', 0 );

function rocket_woocommerce_after_account_navigation() {
	echo '</div>';
}
add_action ( 'woocommerce_after_account_navigation', 'rocket_woocommerce_after_account_navigation', 0 );
