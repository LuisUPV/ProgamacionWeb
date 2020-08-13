<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="checkout-button btn btn-primary wc-forward btn-has-icon icon-right"><i class="fa fa-arrow-right"></i>
	<?php esc_html_e( 'Proceed to Checkout', 'rocket' ); ?>
</a>
