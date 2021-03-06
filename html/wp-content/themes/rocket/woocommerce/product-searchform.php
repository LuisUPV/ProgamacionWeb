<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search search-form clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<label class="sr-only" for="s"><?php esc_html_e( 'Search for:', 'rocket' ); ?></label>
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'rocket' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="btn"><i class="fa fa-search"></i></button>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>
