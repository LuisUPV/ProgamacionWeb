<?php
/**
 * Template part for Header Top Bar.
 *
 * @package Rocket
 * @since Rocket 1.2.0
 */

$rocket_data = get_option('rocket_data'); ?>

<?php if ( isset( $rocket_data['rocket_opt-header-top-bar'] )) {
  if ( $rocket_data['rocket_opt-header-top-bar'] == 1 ) : ?>
    <!-- Header Top Bar -->
    <div id="header-top-bar" class="h-top-bar h-top-bar__layout1 h-top-bar__color1 h-top-bar__border-between-items h-top-bar__border-between-items__dashed">
      <div class="container">

        <?php if ( $rocket_data['rocket_opt-header-top-bar-phone'] == 1) { ?>
          <div class="h-top-bar_item h-top-bar_item__phone">
            <?php echo esc_html( $rocket_data['rocket_opt-header-top-bar-phone-number'] ); ?>
          </div>
        <?php } ?>

        <?php if ( $rocket_data['rocket_opt-header-top-bar-email'] == 1) { ?>
        <div class="h-top-bar_item h-top-bar_item__email">
          <a href="mailto:<?php echo esc_attr( $rocket_data['rocket_opt-header-top-bar-email-address'] ); ?>"><?php echo esc_html( $rocket_data['rocket_opt-header-top-bar-email-address'] ); ?></a>
        </div>
        <?php } ?>

        <?php if ( $rocket_data['rocket_opt-header-top-bar-custom-text-switch'] == 1) { ?>
        <div class="h-top-bar_item h-top-bar_item__custom-text">
          <?php echo $rocket_data['rocket_opt-header-top-bar-custom-text']; ?>
        </div>
        <?php } ?>

        <?php if ( $rocket_data['rocket_opt-header-top-bar-login'] == 1 && rocket_woo_exists() == true  ) { ?>
        <div class="h-top-bar_item h-top-bar_item__login">

          <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'My Account', 'rocket' ); ?>" class="h-top-bar_link h-top-bar_link__signed-in">
            <?php esc_attr_e( 'My Account', 'rocket' ); ?>
            </a>
          <?php } else { ?>

            <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'Login', 'rocket' ); ?>" class="h-top-bar_link h-top-bar_link__sign-in">
            <?php esc_attr_e( 'Login', 'rocket' ); ?>
            </a>

            <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
            <span class="h-top-bar_item__login-txt">or</span>

            <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e( 'Register', 'rocket' ); ?>" class="h-top-bar_link h-top-bar_link__sign-up">
            <?php esc_attr_e( 'Register', 'rocket' ); ?>
            </a>
            <?php endif; ?>

          <?php } ?>
        </div>
        <?php } ?>

        <?php
        //WMPL Language selector
        if ( isset( $rocket_data['rocket_opt-header-top-bar-wpml-switcher'] ) ) {
          if ( $rocket_data['rocket_opt-header-top-bar-wpml-switcher'] == 1 && rocket_wpml_exists() == true ) {
            echo '<div class="h-top-bar_item h-top-bar_item__lang">';
              do_action('wpml_add_language_selector');
            echo '</div>';
          }
        }?>

      </div>
    </div>
    <!-- Header Top Bar / End -->
  <?php endif;
} ?>
