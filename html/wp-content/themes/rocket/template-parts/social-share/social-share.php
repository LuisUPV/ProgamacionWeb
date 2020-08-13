<?php
/**
 * Social Sharing box
 *
 * @package Rocket
 * @version 1.6.0
 */

$rocket_data  = get_option('rocket_data');

$post_social  = $rocket_data['rocket__opt-single-post-social'];
$social_share = $rocket_data['rocket__opt-single-post-social-sorter']['enabled'];
?>

<?php if ( $post_social == 1 ) : ?>
<div class="entry-social">
  <button class="btn btn-lg btn-primary btn-single-icon entry-social-trigger">
    <i class="fa fa-share-alt"></i>
  </button>
  <ul>

    <?php // Social Sharing

    if ($social_share): foreach ($social_share as $key=>$value) {
      switch($key) {

        case 'social_facebook': get_template_part( 'template-parts/social-share/social_facebook' );
        break;

        case 'social_linkedin': get_template_part( 'template-parts/social-share/social_linkedin' );
        break;

        case 'social_twitter': get_template_part( 'template-parts/social-share/social_twitter' );
        break;

        case 'social_google-plus': get_template_part( 'template-parts/social-share/social_google-plus' );
        break;

        case 'social_vk': get_template_part( 'template-parts/social-share/social_vk' );
        break;

        case 'social_ok': get_template_part( 'template-parts/social-share/social_ok' );
        break;

      }
    }
    endif; ?>

  </ul>
</div><!-- .entry-social -->
<?php endif; ?>
