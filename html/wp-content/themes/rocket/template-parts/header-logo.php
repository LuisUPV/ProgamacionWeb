<?php
/**
 * Template part for Header Logo.
 *
 * @package Rocket
 * @since   2.6.1
 * @version 2.6.1
 */

$rocket_data   = get_option( 'rocket_data' );
$logo_standard = isset( $rocket_data['rocket__opt-logo-standard']['url'] ) ? esc_html( $rocket_data['rocket__opt-logo-standard']['url'] ) : '';
$logo_retina   = isset( $rocket_data['rocket__opt-logo-retina']['url'] ) ? esc_html( $rocket_data['rocket__opt-logo-retina']['url'] ) : '';
?>

<!-- Logo -->
<div class="logo">
  <?php if( !empty( $logo_standard ) ) { ?>

    <!-- Logo Standard -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php echo esc_url( $logo_standard ); ?>" <?php if ( !empty( $logo_retina ) ) { ?> srcset="<?php echo esc_url( $logo_retina ); ?> 2x" <?php } ?>  alt="<?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo('description') ); ?>">
    </a>

  <?php } else { ?>

    <!-- Logo Text Default -->
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>

  <?php } ?>
</div>
<!-- Logo / End -->