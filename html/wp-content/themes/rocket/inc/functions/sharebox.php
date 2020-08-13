<?php 
	function rocket_share_box() {
    ob_start();
?>
    <div class="product-social clearfix">
      <span class="product-social-label"><?php esc_html_e('Share on :', 'rocket'); ?></span>
      <a target="_blank" id="rocket_facebook" onClick="popup = window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-primary btn-single-icon"><i class="fa fa-facebook"></i></a>
      <a target="_blank" id="rocket_twitter" onClick="popup = window.open('http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-primary btn-single-icon"><i class="fa fa-twitter"></i></a>
      <a target="_blank" id="rocket_google_plus" onClick="popup = window.open('http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-primary btn-single-icon"><i class="fa fa-google-plus"></i></a>
      <a target="_blank" id="rocket_linkedin" onClick="popup = window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-primary btn-single-icon"><i class="fa fa-linkedin"></i></a>
      <a target="_blank" id="rocket_tumblr" onClick="popup = window.open('http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php the_title(); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-primary btn-single-icon"><i class="fa fa-tumblr"></i></a>
    </div>
	
<?php 
  $output_string = ob_get_contents();
  ob_end_clean();

  echo !empty( $output_string ) ? $output_string : '';

}
